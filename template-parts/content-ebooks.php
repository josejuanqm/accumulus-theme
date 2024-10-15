<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */

  function truncate($string, $length, $dots = "...", $display = true) {
    $result = (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
    if ($display) {
      echo $result;
    } else {
      return $result;
    }
  }
?>



<section class="w-full pb-s12 md:pb-s7 lg:pb-s12 bg-secondary-lilac">

  <div class="container mx-auto lg:pt-s9">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-0">
      <?php
        // WP_Query arguments
        $args = array(
          'post_type'              => array( 'resource-cms' ),
          'posts_per_page'         => '1',
          'tax_query' => array(
            array(
                'taxonomy' => 'resources-taxonomies',
                'field' => 'slug',
                'terms' => 'e-books-white-papers',
            )
          )
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
          while ($query->have_posts()) {
            $query->the_post();
          
            $category = '';
            $categorySlug = '';
            $post_type = get_post_type(get_the_ID());   
            $taxonomies = get_object_taxonomies($post_type);   
            $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
            if(!empty($taxonomy_names)) :
              foreach($taxonomy_names as $tax_name) : 
                    $category = $tax_name; 
                    $categorySlugs = str_replace(' ', '-', strtolower($tax_name)); 
                    $categorySlug = str_replace('&amp;', '', strtolower($categorySlugs));
              endforeach;
            endif;
      ?>

      <div class="relative col-span-12 lg:col-span-7 flex flex-col gap-s3 lg:pr-9">
        <a href="<?php the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>
        <div
          class="relative h-full w-full max-lg:h-[416px] flex items-center justify-center bg-ebooks-general bg-cover bg-no-repeat bg-center">
          <h1
            class="absolute bottom-s3 left-0 pl-s2 md:pl-s4 lg:pl-s6 pr-s2 lg:pr-s2 heading-3 text-neutral-dgray md:w-[570px] lg:w-full">
            <?php truncate(get_the_title(), 140); ?></h1>
        </div>
        <div class="flex flex-col gap-s3 px-s2 md:px-s4 lg:px-0">
          <div class="body-2"><?php the_excerpt(); ?></div>
          <div class="flex items-center max-lg:flex-wrap gap-s2">
            <span class="flex items-center gap-s1 heading-4 text-neutral-dgray uppercase">
              <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.66595 12.0564H1.44361V1.94468H2.88829V0.5H1.38604C0.62052 0.5 0 1.12052 0 1.88604V12.0169C0 12.8358 0.664231 13.5 1.48306 13.5H8.62864C9.44747 13.5 10.1117 12.8358 10.1117 12.0169V6.27766H8.66702V12.0553L8.66595 12.0564Z"
                  class="fill-current" />
                <path
                  d="M9.85523 3.98634L6.37093 0.500977H4.32812H4.32919V6.27864H10.1068V4.23689L9.85523 3.98634ZM5.77281 4.83396V1.94566L7.23668 3.4106L8.6611 4.83396H5.77281Z"
                  class="fill-current" />
              </svg>
              <?php echo $category; ?>
            </span>
          </div>
        </div>

      </div>
      <!-- Large post -->

      <?php
          }
        } else {
         echo 'No post found.';
        }
        // Restore original Post Data
        wp_reset_postdata();
      ?>
      <!-- Main post -->

      <div class="col-span-12 lg:col-span-5 lg:col-start-8 flex flex-col gap-s4 px-s2 md:px-s4 lg:px-0">

        <h2 class="heading-2">Featured eBooks & White Papers</h2>

        <div class="grid grid-cols-12 gap-s2">

          <?php 
            $i = 0;

            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'resource-cms' ),
              'posts_per_page'         => '4',
              'offset'                 => '1',
              'tax_query' => array(
                array(
                    'taxonomy' => 'resources-taxonomies',
                    'field' => 'slug',
                    'terms' => 'e-books-white-papers',
                )
              )
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post();
                
                // Get category by post
                $category = '';
                $categorySlug = '';
                $post_type = get_post_type(get_the_ID());   
                $taxonomies = get_object_taxonomies($post_type);   
                $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names"));
                if(!empty($taxonomy_names)) :
                  foreach($taxonomy_names as $tax_name) :
                    $category = $tax_name;
                    $categorySlugs = str_replace(' ', '-', strtolower($tax_name)); 
                    $categorySlug = str_replace('&amp;', '', strtolower($categorySlugs)); 
                  endforeach;
                endif;
          ?>

          <div
            class="relative col-span-12 md:col-span-6 lg:col-span-12 flex flex-col-reverse md:flex-row items-stretch md:justify-between text-neutral-dgray rounded-miniCard overflow-hidden <?php echo $categorySlug; ?>">
            <a href="<?php the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>
            <div class="relative flex flex-col md:w-2/3 gap-s2 py-s2 pl-s7 pr-s2 bg-secondary-deepLilac">
              <span
                class="absolute top-s2 left-s2 flex items-center justify-center w-s3 h-s3 leading-none text-h4Mobile md:text-h5 rounded-full aspect-square bg-secondary-lilac tracking-normal"><?php echo $i+1; ?></span>
              <span
                class="relative flex items-start gap-s1 pt-1 heading-4 uppercase text-neutral-dgray max-lg:pl-s3 <?php echo $categorySlug; ?>">
                <svg width="11" height="14" viewBox="0 0 11 14" fill="none"
                  class="max-lg:absolute max-lg:left-0 max-lg:top-1 ">
                  <path
                    d="M8.66595 12.0564H1.44361V1.94468H2.88829V0.5H1.38604C0.62052 0.5 0 1.12052 0 1.88604V12.0169C0 12.8358 0.664231 13.5 1.48306 13.5H8.62864C9.44747 13.5 10.1117 12.8358 10.1117 12.0169V6.27766H8.66702V12.0553L8.66595 12.0564Z"
                    class="fill-current" />
                  <path
                    d="M9.85523 3.98634L6.37093 0.500977H4.32812H4.32919V6.27864H10.1068V4.23689L9.85523 3.98634ZM5.77281 4.83396V1.94566L7.23668 3.4106L8.6611 4.83396H5.77281Z"
                    class="fill-current" />
                </svg>
                <span class="-mt-[2px]"><?php echo $category; ?></span>
              </span>
              <h3 class="heading-5"><?php truncate(get_the_title(), 140); ?></h3>
            </div>
            <?php if (has_post_thumbnail( get_the_ID() ) ): ?>

            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
            <div
              class="w-full md:w-1/3 h-[144px] md:h-full object-cover flex items-center justify-center bg-events-general">
              <img class="w-full md:w-full h-[144px] md:h-full object-cover" src="<?php echo $image[0]; ?>"
                alt="<?php the_title(); ?>" />
            </div>

            <?php 
              else :
                if ($categorySlug === 'e-books--white-papers'): 
              ?>

            <div
              class="w-full md:w-1/3 h-[144px] md:h-full object-cover flex items-center justify-center bg-events-general">
              <img src="<?php bloginfo('template_url') ?>/images/resources/thumb-ebooks.png"
                class="w-full md:w-full h-[144px] md:h-full object-cover" />
            </div>

            <?php endif; ?>

            <?php endif; ?>
            <!-- Thumbnail -->
          </div>
          <!-- Top stories item -->

          <?php
              $i++;
              }
            } else {
              echo 'Not post found.';
            }

            // Restore original Post Data
            wp_reset_postdata();
          ?>

          <!-- cat -->

        </div>

      </div>
      <!-- Top stories -->

    </div>
    <!-- Featured posts -->

  </div>

</section>
<!-- Main posts -->


<?php

$categories = array();
$args = array(
  'taxonomy' => 'resources-taxonomies',
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

      <div class="col-span-12 pt-0 pb-s4 md:pt-s1 md:pb-s10 lg:pb-s6">
        <h2 id="title-section" class="text-h2Mobile md:text-h2Tablet lg:text-h2">Top eBooks & White Papers</h2>
      </div>
      <!-- Displaying data -->

      <div id="category-post-content">
      </div>
      <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a id="btn-see-more" class="btn-secondary text-cta md:text-ctaMobile" href="#">See More</a>
      </div>
      <input type="hidden" value="1" id="current-page" />
    </div>

  </div>

</section>

<!-- List posts resources -->