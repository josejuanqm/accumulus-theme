<?php
/**
* Template part for displaying page content in page.php
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package accumulus-website
*/

?>



<section class="section w-full pt-s14 md:pt-s16 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s13 bg-neutral-nwhite bg-news-banner-mobile md:bg-news-banner-tablet lg:bg-news-banner-desktop bg-no-repeat bg-cover bg-center">

  <div class="container mx-auto">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-0">

      <div class="relative col-span-12 md:col-span-6 ld:col-span-7 flex flex-col justify-between gap-s12 md:gap-s4 lg:gap-s3 lg:pr-9">

        <div class="flex flex-col gap-s4">
          <h4 class="text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase">COMPANY</h4>
          <h1 class="text-h1Mobile md:text-h1Tablet lg:text-h1"><?php the_title(); ?></h1>
        </div>

        <p class="text-b2Mobile md:text-b2Tablet lg:text-b2 lg:max-w-[460px]">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id nec aliquet risus nunc amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id nec aliquet risus nunc amet. 
        </p>

      </div>
      <!-- Large post -->

      <div class="col-span-12 md:col-span-6 lg:col-span-5 md:col-start-8 flex flex-col gap-s4">

        <div class="grid grid-cols-12 gap-s2">

          <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
            <img class="col-span-12" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
            <?php endif; ?>
            <!-- Top stories item -->
          
        </div>
  
      </div>
      <!-- Top stories -->
    
    </div>
    
  </div>
  
</section>
<!-- Main banner -->
  
  
<?php

  $categories = array();
  $args = array(
    'taxonomy' => 'news-categories',
    'style' => 'list',
    'hide_empty' => 1,
  );
  
  $result = get_categories($args);
  
  // var_dump($result);
  if (count($result) > 0 ){
    $categories = $result;
  }

?>
  
<section class="section w-full pt-s8 pb-s8 md:pb-s10 md:pt-s10 lg:pt-s8 lg:pb-s8 bg-white">
  
  <div class="container mx-auto">
  
    <div class="grid grid-cols-12 gap-s2">
  
      <div class="filters col-span-12 pt-0 pb-s8 md:pt-s2 md:pb-s10 lg:pt-s4 lg:pb-s8 grid grid-cols-12 lg:flex lg:justify-center lg:w-full lg:flex-wrap gap-s2 lg:gap-s4">
    
        <input type="hidden" id="category" value="0" data-catName="Last Articles">
        
        <a href="javascript:void(0)" data-id="0" data-name="All" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase bg-neutral-dgray text-neutral-nwhite">All</a>
        <a href="javascript:void(0)" data-id="1" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase btn-text-link">Past events</a>
        <a href="javascript:void(0)" data-id="1" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase btn-text-link">Upcoming events</a>
        
        <!-- <?php //foreach($categories as $category): ?>
          <a href="javascript:void(0)" data-id="<?php //echo $category->term_id; ?>" data-name="Latest <?php //echo $category->name; ?>" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase btn-text-link"><?php //$category->name ?></a>
        <?php //endforeach; ?> -->
          
      </div>

      <div class="col-span-12 grid grid-cols-12 gap-s2">
        <?php

          $posts = get_posts(array(
            'post_type' => 'event',
            'posts_per_page'    => '-1',
            'meta_key'  => 'date_event',
            'orderby'   => 'meta_value_num',
            'order'     => 'DESC'
          ));

          $group_posts = array();

          if( $posts ) {

            foreach( $posts as $post ) {
              $date = get_field('date_event', $post->ID, false);
              $date = new DateTime($date);
              $year = $date->format('Y');
              $month = $date->format('F');
              $group_posts[$year][$month][] = array($post, $date);
            }

            foreach ($group_posts as $yearKey => $years) {

              foreach ($years as $monthKey => $months) {

                echo '<h3 class="col-span-12 text-h3Mobile md:text-h3Tablet lg:text-h3 pt-s8 pb-s4 first-of-type:pt-0">'. $monthKey . ' ' . $yearKey .'</h3>';

                foreach ($months as $postKey => $posts):
                  // Get category by post
                  $category = '';
                  $categorySlug = '';
                  $post_type = get_post_type($posts[0]->ID);   
                  $taxonomies = get_object_taxonomies($post_type);   
                  $taxonomy_names = wp_get_object_terms($posts[0]->ID, $taxonomies,  array("fields" => "names")); 
                  if(!empty($taxonomy_names)) :
                    foreach($taxonomy_names as $tax_name) :
                      $category = $tax_name; 
                      $categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
                    endforeach;
                  endif;
                  
                  $today = date( 'Ymd' );
                  
                  $date = get_field( 'date_event', $posts[0]->ID );
                  $dateEvent = DateTime::createFromFormat( 'Ymd', $date );
                
                ?>
                <div class="relative col-span-12 max-md:flex max-md:flex-col md:grid md:grid-cols-12 md:gap-s2 items-center bg-neutral-offwhite text-neutral-dgray rounded-miniCard overflow-hidden <?php echo $categorySlug; ?> <?php print_r(($today <= $date) ? ' opacity-100' : ' opacity-50'); ?>">
                  <!-- <a href="<?php //the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a> -->
                  
                  <div class="max-md:w-full md:col-span-2 flex md:flex-col max-md:order-2 items-center justify-start md:justify-center gap-s2 text-center pt-s4 md:py-0 px-s4 md:px-0 md:pl-s2">
                    <h5 class="text-h2Mobile md:text-h2Tablet lg:text-h2"><?php echo $dateEvent->format( 'j' ) ?></h5>
                    <h6 class="text-h10"><?php echo $dateEvent->format( 'F' ); ?></h6>
                  </div>
                  
                  <div class="relative max-md:w-full md:col-span-6 flex flex-col max-md:order-3 gap-s1 lg:gap-s2 p-s4 md:py-s2 md:px-s2">
                    <span class="flex items-center gap-s1 pt-1 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase text-neutral-dgray <?php echo $categorySlug; ?>">
                      <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.83909V10.8388H10.6669V1.1732C10.6669 0.619888 10.2189 0.171875 9.66556 0.171875H1.00132C0.448009 0.171875 0 0.619888 0 1.1732V10.8388C0 11.5749 0.597018 12.1719 1.33311 12.1719H12C12.7361 12.1719 13.3331 11.5749 13.3331 10.8388V2.83909H12ZM1.33311 10.8388V1.50499H9.33278V10.8378H1.33311V10.8388Z" class="fill-current"/>
                        <path d="M7.99946 8.17188H2.66602V9.50499H7.99946V8.17188Z" class="fill-current"/>
                        <path d="M7.99946 5.50391H2.66602V6.83702H7.99946V5.50391Z" class="fill-current"/>
                        <path d="M7.99946 2.83594H2.66602V4.16905H7.99946V2.83594Z" class="fill-current"/>
                      </svg>
                      
                      <?php echo $category; ?>
                    </span>
                    <h3 class="text-h10"><?php the_title(); ?></h3>
                    <p class="text-b2Mobile md:text-b2Tablet lg:text-b2 lg:max-w-[460px]"><?php echo get_the_excerpt(); ?></p>
                  </div>
                  
                  <?php if (has_post_thumbnail( $posts[0]->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts[0]->ID ), 'full' ); ?>
                    <div class="max-md:w-full max-md:order-1 md:col-span-4">
                      <img class="w-full max-h-[144px] md:max-h-[200px] lg:max-h-[192px] object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title($posts[0]->ID); ?>" />
                    </div>
                  <?php endif; ?>
                  <!-- Thumbnail -->
                </div>
                <?php
                endforeach;
              }
            }
          } else {
            ?>
            <div class="relative col-span-12 md:col-span-6 lg:col-span-12 flex items-center justify-center pt-s6">
              <h4 class="text-h4Mobile md:text-h4Tablet lg:text-h4">Not post found</h4>
            </div>          
            <?php
          }
          wp_reset_postdata();
        ?>
      </div>
      <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a class="btn-secondary" href="#">See More</a>
      </div>
      
    </div>
      
  </div>
      
</section>
<!-- Grid posts news -->
      
      
      