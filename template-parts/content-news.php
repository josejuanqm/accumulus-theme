<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */

?>



<section class="section w-full pb-s12 md:pb-s7 lg:pb-s13 bg-secondary-aqua bg-cover bg-top" style="background-image:url(<?php bloginfo('template_url'); ?>/images/news/bg-texture-main-banner.png)">

	<div class="container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-0">

        <div class="relative col-span-12 lg:col-span-7 flex flex-col justify-between gap-s12 md:gap-s4 lg:gap-s3 lg:pr-9">

          <div class="flex flex-col gap-s4">
            <h4 class="heading-4 uppercase">COMPANY</h4>
            <h1 class="heading-1">Latest<br />News</h1>
          </div>

          <p class="body-2">
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
              <span class="absolute top-s2 left-[10px] md:left-s2 flex items-center justify-center w-[30px] h-[30px] md:w-s3 md:h-s3 heading-5 rounded-full aspect-square bg-secondary-lilac"><?php echo $i+1; ?></span>
              <span class="flex items-center gap-s1 pt-1 heading-4 uppercase text-neutral-dgray <?php echo $categorySlug; ?>">
                <?php if ($categorySlug == 'media-coverage'): ?>
                  <svg width="12" height="14" viewBox="0 0 12 14" fill="none">
                    <path d="M10.3078 0.5H1.47285C0.659191 0.5 0 1.15919 0 1.97285V9.33491C0 10.1486 0.659191 10.8078 1.47285 10.8078H5.29094L5.90118 11.418L6.94218 12.459L7.98318 13.5L9.02418 12.459L7.98318 11.418L6.94218 10.377L5.90118 9.336L5.8903 9.34688V9.336H1.47285V1.97285H10.3078V9.33491H8.83491V10.8078H10.3078C11.1214 10.8078 11.7806 10.1486 11.7806 9.33491V1.97285C11.7806 1.15919 11.1214 0.5 10.3078 0.5Z" class="fill-current"/>
                    <path d="M5.89003 4.91718H7.36179H8.83464V3.44434H7.36179H5.89003H4.41718H2.94434V4.91718H4.41718H5.89003Z" class="fill-current"/>
                    <path d="M2.94434 7.86238H4.41718H5.89003H7.36179H8.83464V6.39062H7.36179H5.89003H4.41718H2.94434V7.86238Z" class="fill-current"/>
                  </svg>

                <?php elseif ($categorySlug == 'new-releases'): ?>
                  <svg width="11" height="14" viewBox="0 0 11 14" fill="none">
                    <path d="M9.23366 13.1719L9.23366 0.177338C10.0308 0.177338 10.6777 0.824241 10.6777 1.62141L10.6777 11.7278C10.6777 12.525 10.0308 13.1719 9.23366 13.1719Z" class="fill-current"/>
                    <path d="M2.01367 10.2734H0.569597L0.569597 1.61965C0.569597 0.822477 1.2165 0.175574 2.01367 0.175574L2.01367 10.2734Z" class="fill-current"/>
                    <path d="M0.570995 13.1719L9.23438 13.1719V11.7171L0.570995 11.7171V13.1719Z" class="fill-current"/>
                    <path d="M2.01312 1.625L9.23242 1.625V0.170268L2.01312 0.170268V1.625Z" class="fill-current"/>
                    <path d="M7.79014 8.83203H3.45898V10.2761H7.79014V8.83203Z" class="fill-current"/>
                  </svg>
                <?php endif; ?>
                <?php echo $category; ?>
              </span>
              <h3 class="heading-3"><?php the_title(); ?></h3>
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
              <h4 class="heading-4">Not post found</h4>
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

      <div class="filters col-span-12 pt-0 pb-s8 md:pt-s2 md:pb-s10 lg:pt-s4 lg:pb-s8 flex justify-center w-full flex-wrap gap-s2 md:gap-s4 text-neutral-sgray">

        <input type="hidden" id="category" value="0" data-catName="Last Articles">

        <a href="javascript:void(0)" data-id="0" data-name="All" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s3 heading-4 text-center rounded-button uppercase active-filter">All</a>
        
        <?php foreach($categories as $category): ?>
        <a href="javascript:void(0)" data-id="<?php echo $category->term_id; ?>" data-name="Latest <?php echo $category->name; ?>" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s2 lg:px-s3 heading-4 text-center rounded-button uppercase btn-text-link text-neutral-sgray"><?= $category->name ?></a>
        <?php endforeach; ?>

      </div>

      <!-- <div class="col-span-12 pt-0 pb-s4 md:pt-s1 md:pb-s10 lg:pb-s6">
        <h2 id="title-section" class="text-h2Mobile md:text-h2Tablet lg:text-h2">Latest Articles</h2>
      </div> -->
      <!-- Displaying data -->

      <div id="category-post-content">
      </div> 
<!--      <div class="post-paginator">-->
<!--          <ul class="pagination" id="paginador-blog">-->
<!--          </ul>-->
<!--      </div>-->
      <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a id="btn-news-see-more" class="btn-secondary" href="#">See More</a>
      </div>
            <input type="hidden" value="1" id="current-page"/>
    </div>

  </div>

</section>

<!-- Grid posts news -->


