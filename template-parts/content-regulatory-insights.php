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



<section class="w-full pb-s12 md:pb-s7 lg:pb-s12 bg-secondary-lilac translucent-navigation">

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
                'terms' => 'regulatory-insights',
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

      <div class="relative col-span-12 lg:col-span-7 flex flex-col gap-s3 lg:pr-9 lg:min-h-[650px]">
        <a href="<?php the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>
        <div
          class="relative h-full w-full max-lg:h-[416px] flex items-center justify-center bg-regulatory-insights-general bg-cover bg-no-repeat bg-center lg:min-h-[550px]">
          <h1
            class="absolute bottom-s3 left-0 pl-s2 md:pl-s4 lg:pl-s6 pr-s2 lg:pr-s2 heading-3 text-neutral-dgray md:w-[570px] lg:w-full">
            <?php truncate(get_the_title(), 140); ?></h1>
        </div>
        <div class="flex flex-col gap-s3 px-s2 md:px-s4 lg:px-0">
          <div class="body-2"><?php the_excerpt(); ?></div>
          <div class="flex items-center max-lg:flex-wrap gap-s2">
            <span class="flex items-center gap-s1 heading-4 text-neutral-dgray uppercase">
              <svg width="13" height="14" viewBox="0 0 13 14" fill="none">
                <path d=" M12.4646 5.07567H0.000976562V2.68595L6.23279 0.5L12.4646 2.68595V5.07567ZM1.38151
                3.78419H11.0841V3.58138L6.23279 1.87949L1.38151 3.58138V3.78419Z" fill="#444444" />
                <path d="M2.76823 6.37402H1.3877V10.9105H2.76823V6.37402Z" class="fill-current" />
                <path d="M11.0807 6.37402H9.7002V10.9105H11.0807V6.37402Z" class="fill-current" />
                <path d="M8.31022 6.37402H6.92969V10.9105H8.31022V6.37402Z" class="fill-current" />
                <path d="M5.53971 6.37402H4.15918V10.9105H5.53971V6.37402Z" class="fill-current" />
                <path d="M12.4688 12.208H0V13.4995H12.4688V12.208Z" class="fill-current" />
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

        <h2 class="heading-2">Regulatory Insights</h2>

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
                    'terms' => 'regulatory-insights',
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
                <svg class="max-lg:absolute max-lg:left-0 max-lg:top-1" width="13" height="14" viewBox="0 0 13 14"
                  fill="none">
                  <path d=" M12.4646 5.07567H0.000976562V2.68595L6.23279 0.5L12.4646 2.68595V5.07567ZM1.38151
                  3.78419H11.0841V3.58138L6.23279 1.87949L1.38151 3.58138V3.78419Z" fill="#444444" />
                  <path d="M2.76823 6.37402H1.3877V10.9105H2.76823V6.37402Z" class="fill-current" />
                  <path d="M11.0807 6.37402H9.7002V10.9105H11.0807V6.37402Z" class="fill-current" />
                  <path d="M8.31022 6.37402H6.92969V10.9105H8.31022V6.37402Z" class="fill-current" />
                  <path d="M5.53971 6.37402H4.15918V10.9105H5.53971V6.37402Z" class="fill-current" />
                  <path d="M12.4688 12.208H0V13.4995H12.4688V12.208Z" class="fill-current" />
                </svg>
                <span class="-mt-[2px]"><?php echo $category; ?></span>
              </span>
              <h3 class="heading-5 break-all"><?php truncate(get_the_title(), 140); ?></h3>
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
                if ($categorySlug === 'regulatory-insights'): 
              ?>

            <div
              class="w-full md:w-1/3 h-[144px] md:h-full flex items-center justify-center bg-regulatory-bg-thumb bg-cover bg-no-repeat bg-center">
              <img src="<?php bloginfo('template_url') ?>/images/regulatory-bg-icon.svg" class="block" width="66"
                height="60" />
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
        <h2 id="title-section" class="text-h2Mobile md:text-h2Tablet lg:text-h2">Thought Leadership</h2>
      </div>
      <!-- Displaying data -->

      <div id="category-post-content">
      </div>
      <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a id="btn-see-more" class="btn-secondary text-ctaMobile md:text-ctaTablet lg:text-cta" href="#">See More</a>
      </div>
      <input type="hidden" value="1" id="current-page" />
    </div>

  </div>

</section>

<!-- List posts resources -->