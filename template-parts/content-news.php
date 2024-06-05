<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */

?>



<section class="section w-full pt-s14 md:pt-s16 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s13 bg-secondary-aqua bg-cover bg-top" style="background-image:url(<?php bloginfo('template_url'); ?>/images/news/bg-texture-main-banner.png)">

	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-0">

        <div class="relative col-span-12 lg:col-span-7 flex flex-col justify-between gap-s12 md:gap-s4 lg:gap-s3 lg:pr-9">

          <div class="flex flex-col gap-s4">
            <h4 class="text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase">COMPANY</h4>
            <h1 class="text-h1Mobile md:text-h1Tablet lg:text-h1">Latest<br />News</h1>
          </div>

          <p class="text-b2Mobile md:text-b2Tablet lg:text-b2">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id nec aliquet risus nunc amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id nec aliquet risus nunc amet. 
          </p>

        </div>
        <!-- Large post -->

      <!-- Main post -->

      <div class="col-span-12 lg:col-span-5 lg:col-start-8 flex flex-col gap-s4">

        <div class="grid grid-cols-12 gap-s2">

          <?php 
            $i = 0;

            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'news' ),
              'posts_per_page'         => '4',
              // 'offset'                 => '1',
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
                    $categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
                  endforeach;
                endif;
                $url_new_realice = get_field('url_new_realice');
          ?>

          <div class="relative col-span-12 md:col-span-6 lg:col-span-12 flex flex-col-reverse md:flex-row items-stretch md:justify-between bg-secondary-deepAqua text-neutral-dgray rounded-miniCard overflow-hidden <?php echo $categorySlug; ?>">
            
            <?php if ($categorySlug == 'media-coverage'): ?>
              <a href="<?php echo $url_new_realice; ?>" target="_blank" class="absolute top-0 left-0 w-full h-full z-10"></a>
            <?php elseif ($categorySlug == 'new-releases'): ?>
              <a href="<?php the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>
            <?php endif; ?>
            <div class="relative flex flex-col gap-s2 py-s2 pl-s7 pr-s2">
              <span class="absolute top-s2 left-s2 flex items-center justify-center w-s3 h-s3 text-h5Mobile md:text-h5Tablet lg:text-h5 rounded-full aspect-square bg-secondary-lilac"><?php echo $i+1; ?></span>
              <span class="flex items-center gap-s1 pt-1 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase text-neutral-dgray <?php echo $categorySlug; ?>">
                <?php if ($categorySlug == 'media-coverage'): ?>
                  <svg width="11" height="13" viewBox="0 0 11 13" fill="none">
                    <path d="M8.88997 10.7377H2.22319V1.40386H3.55674V0.0703125H2.17005C1.46341 0.0703125 0.890625 0.6431 0.890625 1.34974V10.7013C0.890625 11.4572 1.50376 12.0703 2.2596 12.0703H8.85552C9.61137 12.0703 10.2245 11.4572 10.2245 10.7013V5.40354H8.89095V10.7368L8.88997 10.7377Z" class="fill-current"/>
                    <path d="M9.98744 3.28757L6.77117 0.0703125H4.8855H4.88648V5.40354H10.2197V3.51885L9.98744 3.28757ZM6.21905 4.06998V1.40386L7.57031 2.75612L8.88517 4.06998H6.21905Z" class="fill-current"/>
                  </svg>
                <?php elseif ($categorySlug == 'new-releases'): ?>
                  <svg width="15" height="13" viewBox="0 0 15 13" fill="none">
                    <path d="M12.8906 2.83909V10.8388H11.5575V1.1732C11.5575 0.619888 11.1095 0.171875 10.5562 0.171875H1.89195C1.33863 0.171875 0.890625 0.619888 0.890625 1.1732V10.8388C0.890625 11.5749 1.48764 12.1719 2.22374 12.1719H12.8906C13.6267 12.1719 14.2237 11.5749 14.2237 10.8388V2.83909H12.8906ZM2.22374 10.8388V1.50499H10.2234V10.8378H2.22374V10.8388Z" class="fill-current"/>
                  </svg>
                <?php endif; ?>
                <?php echo $category; ?>
              </span>
              <h3 class="text-h3Mobile md:text-h3"><?php the_title(); ?></h3>
            </div>
            <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
              <img class="w-full md:w-[175px] max-h-[144px] md:max-h-full" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
            <?php endif; ?>
            <!-- Thumbnail -->
          </div>
          <!-- Top stories item -->

          <?php
              $i++;
              }
            } else {
          ?>
            <div class="relative col-span-12 md:col-span-6 lg:col-span-12 flex flex-col">
              <h4 class="text-h4Mobile md:text-h4Tablet lg:text-h4">Not post found</h4>
            </div>          
          <?php
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
        
        <?php foreach($categories as $category): ?>
        <a href="javascript:void(0)" data-id="<?php echo $category->term_id; ?>" data-name="Latest <?php echo $category->name; ?>" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase btn-text-link"><?= $category->name ?></a>
        <?php endforeach; ?>

      </div>

      <!-- <div class="col-span-12 pt-0 pb-s4 md:pt-s1 md:pb-s10 lg:pb-s6">
        <h2 id="title-section" class="text-h2Mobile md:text-h2Tablet lg:text-h2">Latest Articles</h2>
      </div> -->
      <!-- Displaying data -->

      <div id="category-post-content">
      </div> 
      <div class="post-paginator">
          <ul class="pagination" id="paginador-blog">
          </ul>
      </div>
      <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a class="btn-secondary" href="#">See More</a>
      </div>

    </div>

  </div>

</section>

<!-- Grid posts news -->


