<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */

?>



<section class="w-full pt-s9 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 bg-secondary-lilac">

	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-0">
      <?php
        // WP_Query arguments
        $args = array(
          'post_type'              => array( 'resource-cms' ),
          'posts_per_page'         => '1',
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
                    $categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
              endforeach;
            endif;
      ?>

        <div class="relative col-span-12 lg:col-span-7 flex flex-col gap-s3 lg:pr-9">
          <a href="<?php the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>
          <div class="relative">
            <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
              <img class="block w-full max-lg:h-[416px] max-lg:object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
            <?php endif; ?>
            <h1 class="absolute bottom-s3 left-0 pl-s2 md:pl-s4 lg:pl-s6 pr-s2 lg:pr-s2 heading-1 text-neutral-nwhite md:w-[570px] lg:w-full"><?php the_title(); ?></h1>
          </div>
          <div class="flex flex-col gap-s3 px-s2 md:px-s4 lg:px-0">
            <div class="body-2"><?php the_excerpt(); ?></div>
            <div class="flex items-center max-lg:flex-wrap gap-s2">
              <span class="flex items-center gap-s1 heading-4 text-neutral-dgray uppercase">
                <?php if ($categorySlug == 'thought-leadership'): ?>
                  <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 3.38949V12.0558H11.5558V1.58477C11.5558 0.985348 11.0704 0.5 10.471 0.5H1.08476C0.485343 0.5 0 0.985348 0 1.58477V12.0558C0 12.8532 0.64677 13.5 1.4442 13.5H13C13.7974 13.5 14.4442 12.8532 14.4442 12.0558V3.38949H13ZM1.4442 12.0558V1.94421H10.1105V12.0547H1.4442V12.0558Z" class="fill-current"/>
                  </svg>
                  <?php elseif ($categorySlug == 'regulatory-insights'): ?>
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12.4646 5.07567H0.000976562V2.68595L6.23279 0.5L12.4646 2.68595V5.07567ZM1.38151 3.78419H11.0841V3.58138L6.23279 1.87949L1.38151 3.58138V3.78419Z" class="fill-current" />
                      <path d="M2.76823 6.37402H1.3877V10.9105H2.76823V6.37402Z" class="fill-current" />
                      <path d="M11.0807 6.37402H9.7002V10.9105H11.0807V6.37402Z" class="fill-current" />
                      <path d="M8.31022 6.37402H6.92969V10.9105H8.31022V6.37402Z" class="fill-current" />
                      <path d="M5.53971 6.37402H4.15918V10.9105H5.53971V6.37402Z" class="fill-current" />
                      <path d="M12.4688 12.208H0V13.4995H12.4688V12.208Z" class="fill-current" />
                    </svg>
                  <?php elseif ($categorySlug == 'e-books-white-papers'): ?>
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.66595 12.0564H1.44361V1.94468H2.88829V0.5H1.38604C0.62052 0.5 0 1.12052 0 1.88604V12.0169C0 12.8358 0.664231 13.5 1.48306 13.5H8.62864C9.44747 13.5 10.1117 12.8358 10.1117 12.0169V6.27766H8.66702V12.0553L8.66595 12.0564Z" class="fill-current"/>
                      <path d="M9.85523 3.98634L6.37093 0.500977H4.32812H4.32919V6.27864H10.1068V4.23689L9.85523 3.98634ZM5.77281 4.83396V1.94566L7.23668 3.4106L8.6611 4.83396H5.77281Z" class="fill-current"/>
                    </svg>
                  <?php elseif ($categorySlug == 'new-releases'): ?>
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.66335 13.5L8.66335 0.505463C9.46052 0.505463 10.1074 1.15237 10.1074 1.94954L10.1074 12.0559C10.1074 12.8531 9.46052 13.5 8.66335 13.5Z" class="fill-current" />
                      <path d="M1.44434 10.6025H0.000261068L0.000261068 1.94875C0.000261068 1.15158 0.647164 0.504676 1.44434 0.504676L1.44434 10.6025Z" class="fill-current" />
                      <path d="M0.000682831 13.5L8.66406 13.5V12.0453L0.000682831 12.0453V13.5Z" class="fill-current" />
                      <path d="M1.4428 1.95508L8.66211 1.95508V0.500347L1.4428 0.500347V1.95508Z" class="fill-current" />
                      <path d="M7.22081 9.15918H2.88965V10.6033H7.22081V9.15918Z" class="fill-current" />
                    </svg>
                  <?php elseif ($categorySlug == 'media-coverage'): ?>
                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10.3078 0.5H1.47285C0.659191 0.5 0 1.15919 0 1.97285V9.33491C0 10.1486 0.659191 10.8078 1.47285 10.8078H5.29094L5.90118 11.418L6.94218 12.459L7.98318 13.5L9.02418 12.459L7.98318 11.418L6.94218 10.377L5.90118 9.336L5.8903 9.34688V9.336H1.47285V1.97285H10.3078V9.33491H8.83491V10.8078H10.3078C11.1214 10.8078 11.7806 10.1486 11.7806 9.33491V1.97285C11.7806 1.15919 11.1214 0.5 10.3078 0.5Z" class="fill-current" />
                      <path d="M5.89003 4.91718H7.36179H8.83464V3.44434H7.36179H5.89003H4.41718H2.94434V4.91718H4.41718H5.89003Z" class="fill-current" />
                      <path d="M2.94434 7.86238H4.41718H5.89003H7.36179H8.83464V6.39062H7.36179H5.89003H4.41718H2.94434V7.86238Z" class="fill-current" />
                    </svg>
                  <?php elseif ($categorySlug == 'events'): ?>
                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.87515 4.875H3.25V6.50015H4.87515V4.875Z" class="fill-current" />
                      <path d="M4.87515 8.125H3.25V9.75015H4.87515V8.125Z" class="fill-current" />
                      <path d="M8.12515 8.125H6.5V9.75015H8.12515V8.125Z" class="fill-current" />
                      <path d="M11.3712 8.125H9.74609V9.75015H11.3712V8.125Z" class="fill-current" />
                      <path d="M8.12515 4.875H6.5V6.50015H8.12515V4.875Z" class="fill-current" />
                      <path d="M11.3712 4.875H9.74609V6.50015H11.3712V4.875Z" class="fill-current" />
                      <path d="M12.9988 1.62515H11.3737V0H9.7485V1.62515H4.87425V0H3.2491V1.62515H1.62395C0.728019 1.62515 0 2.35197 0 3.2491V11.3737H1.62515V3.2503H12.9988V11.3748H3.2491V13H12.9988C13.8959 13 14.624 12.272 14.624 11.3748V3.2503C14.624 2.35317 13.8959 1.62515 12.9988 1.62515Z" class="fill-current" />
                    </svg>
								<?php endif; ?>
                <?php echo $category; ?>
              </span>
              <span class="body-2 text-neutral-dgray !leading-none">|</span>
              <span class="flex items-center gap-s1 heading-4 text-neutral-dgray uppercase">
                By <?php echo get_the_author(); ?>
              </span>
            </div>
          </div>

        </div>
        <!-- Large post -->

      <?php
          }
        } else {
          // no posts found
        }
        // Restore original Post Data
        wp_reset_postdata();
      ?>
      <!-- Main post -->

      <div class="col-span-12 lg:col-span-5 lg:col-start-8 flex flex-col gap-s4 px-s2 md:px-s4 lg:px-0">

        <h2 class="heading-2">Top Stories</h2>

        <div class="grid grid-cols-12 gap-s2">

          <?php 
            $i = 0;

            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'resource-cms' ),
              'posts_per_page'         => '4',
              'offset'                 => '1',
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
          ?>

          <div class="relative col-span-12 md:col-span-6 lg:col-span-12 flex flex-col-reverse md:flex-row items-stretch md:justify-between bg-secondary-deepLilac text-neutral-dgray rounded-miniCard overflow-hidden <?php echo $categorySlug; ?>">
            <a href="<?php the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>
            <div class="relative flex flex-col gap-s2 py-s2 pl-s7 pr-s2">
              <span class="absolute top-s2 left-s2 flex items-center justify-center w-s3 h-s3 heading-5 rounded-full aspect-square bg-secondary-lilac"><?php echo $i+1; ?></span>
              <span class="flex items-start gap-s1 pt-1 heading-4 uppercase text-neutral-dgray <?php echo $categorySlug; ?>">
                <?php if ($categorySlug == 'thought-leadership'): ?>
                  <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 3.38949V12.0558H11.5558V1.58477C11.5558 0.985348 11.0704 0.5 10.471 0.5H1.08476C0.485343 0.5 0 0.985348 0 1.58477V12.0558C0 12.8532 0.64677 13.5 1.4442 13.5H13C13.7974 13.5 14.4442 12.8532 14.4442 12.0558V3.38949H13ZM1.4442 12.0558V1.94421H10.1105V12.0547H1.4442V12.0558Z" class="fill-current"/>
                  </svg>
                  <?php elseif ($categorySlug == 'regulatory-insights'): ?>
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12.4646 5.07567H0.000976562V2.68595L6.23279 0.5L12.4646 2.68595V5.07567ZM1.38151 3.78419H11.0841V3.58138L6.23279 1.87949L1.38151 3.58138V3.78419Z" class="fill-current" />
                      <path d="M2.76823 6.37402H1.3877V10.9105H2.76823V6.37402Z" class="fill-current" />
                      <path d="M11.0807 6.37402H9.7002V10.9105H11.0807V6.37402Z" class="fill-current" />
                      <path d="M8.31022 6.37402H6.92969V10.9105H8.31022V6.37402Z" class="fill-current" />
                      <path d="M5.53971 6.37402H4.15918V10.9105H5.53971V6.37402Z" class="fill-current" />
                      <path d="M12.4688 12.208H0V13.4995H12.4688V12.208Z" class="fill-current" />
                    </svg>
                  <?php elseif ($categorySlug == 'e-books-white-papers'): ?>
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.66595 12.0564H1.44361V1.94468H2.88829V0.5H1.38604C0.62052 0.5 0 1.12052 0 1.88604V12.0169C0 12.8358 0.664231 13.5 1.48306 13.5H8.62864C9.44747 13.5 10.1117 12.8358 10.1117 12.0169V6.27766H8.66702V12.0553L8.66595 12.0564Z" class="fill-current"/>
                      <path d="M9.85523 3.98634L6.37093 0.500977H4.32812H4.32919V6.27864H10.1068V4.23689L9.85523 3.98634ZM5.77281 4.83396V1.94566L7.23668 3.4106L8.6611 4.83396H5.77281Z" class="fill-current"/>
                    </svg>
                  <?php elseif ($categorySlug == 'new-releases'): ?>
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.66335 13.5L8.66335 0.505463C9.46052 0.505463 10.1074 1.15237 10.1074 1.94954L10.1074 12.0559C10.1074 12.8531 9.46052 13.5 8.66335 13.5Z" class="fill-current" />
                      <path d="M1.44434 10.6025H0.000261068L0.000261068 1.94875C0.000261068 1.15158 0.647164 0.504676 1.44434 0.504676L1.44434 10.6025Z" class="fill-current" />
                      <path d="M0.000682831 13.5L8.66406 13.5V12.0453L0.000682831 12.0453V13.5Z" class="fill-current" />
                      <path d="M1.4428 1.95508L8.66211 1.95508V0.500347L1.4428 0.500347V1.95508Z" class="fill-current" />
                      <path d="M7.22081 9.15918H2.88965V10.6033H7.22081V9.15918Z" class="fill-current" />
                    </svg>
                  <?php elseif ($categorySlug == 'media-coverage'): ?>
                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10.3078 0.5H1.47285C0.659191 0.5 0 1.15919 0 1.97285V9.33491C0 10.1486 0.659191 10.8078 1.47285 10.8078H5.29094L5.90118 11.418L6.94218 12.459L7.98318 13.5L9.02418 12.459L7.98318 11.418L6.94218 10.377L5.90118 9.336L5.8903 9.34688V9.336H1.47285V1.97285H10.3078V9.33491H8.83491V10.8078H10.3078C11.1214 10.8078 11.7806 10.1486 11.7806 9.33491V1.97285C11.7806 1.15919 11.1214 0.5 10.3078 0.5Z" class="fill-current" />
                      <path d="M5.89003 4.91718H7.36179H8.83464V3.44434H7.36179H5.89003H4.41718H2.94434V4.91718H4.41718H5.89003Z" class="fill-current" />
                      <path d="M2.94434 7.86238H4.41718H5.89003H7.36179H8.83464V6.39062H7.36179H5.89003H4.41718H2.94434V7.86238Z" class="fill-current" />
                    </svg>
                  <?php elseif ($categorySlug == 'events'): ?>
                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.87515 4.875H3.25V6.50015H4.87515V4.875Z" class="fill-current" />
                      <path d="M4.87515 8.125H3.25V9.75015H4.87515V8.125Z" class="fill-current" />
                      <path d="M8.12515 8.125H6.5V9.75015H8.12515V8.125Z" class="fill-current" />
                      <path d="M11.3712 8.125H9.74609V9.75015H11.3712V8.125Z" class="fill-current" />
                      <path d="M8.12515 4.875H6.5V6.50015H8.12515V4.875Z" class="fill-current" />
                      <path d="M11.3712 4.875H9.74609V6.50015H11.3712V4.875Z" class="fill-current" />
                      <path d="M12.9988 1.62515H11.3737V0H9.7485V1.62515H4.87425V0H3.2491V1.62515H1.62395C0.728019 1.62515 0 2.35197 0 3.2491V11.3737H1.62515V3.2503H12.9988V11.3748H3.2491V13H12.9988C13.8959 13 14.624 12.272 14.624 11.3748V3.2503C14.624 2.35317 13.8959 1.62515 12.9988 1.62515Z" class="fill-current" />
                    </svg>
								<?php endif; ?>
                <span class="-mt-[2px]"><?php echo $category; ?></span>
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
  $purpleSection = get_field('purple_section');
?>

<section class="section w-full pt-s8 md:pt-s10 lg:pt-s8 pb-s8 md:pb-s2 lg:pb-s4 bg-primary-violet text-neutral-nwhite bg-purple-section-mobile md:bg-purple-section-tablet lg:bg-purple-section-desktop bg-no-repeat bg-cover bg-left-top">

	<div class="container mx-auto">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-0">

      <h4 class="col-span-4 col-start-3 md:col-span-12 md:col-start-1 lg:col-span-3 lg:col-start-5 pt-s2 lg:pt-s4 heading-4 uppercase"><?php echo $purpleSection['eye_text']; ?></h4>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-s1 pt-s6 pb-s8 md:pt-s3 md:pb-s10 lg:pt-s6 lg:pb-s6">
        <h2 class="col-span-6 md:col-span-12 lg:col-span-10 lg:col-start-2 grid grid-cols-12 heading-2 capitalize gap-s2">
            <span class="col-span-12 md:col-span-12 lg:col-span-10 lg:col-start-2"><?php echo $purpleSection['first_line_title']; ?></span>
            <span class="col-span-6 md:col-span-5 lg:col-span-6 col-start-6 md:col-start-6 lg:col-start-7"><?php echo $purpleSection['second_line_title']; ?></span>
        </h2>
      </div>

      <p class="col-span-3 md:col-span-6 lg:col-span-3 lg:col-start-5 pt-s10 md:pt-s8 lg:pt-0 body-3 text-neutral-nwhite"><?php echo $purpleSection['first_paragraph']; ?></p>
      <p class="col-span-3 col-start-4 md:col-span-6 lg:col-span-3 md:col-start-7 lg:col-start-8 pt-s10 md:pt-s8 lg:pt-0 body-3 text-neutral-nwhite"><?php echo $purpleSection['second_paragraph']; ?></p>

      <div class="col-span-6 md:col-span-12 lg:col-span-2 lg:col-start-5 pt-s5 md:pt-s6 md:pb-s10 lg:pb-s8">
				<a href="<?php echo $purpleSection['url_cta']; ?>" class="btn-tertiary-white">Read More</a>
			</div>

    </div>

  </div>

</section>
<!-- Purple section -->


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

      <div class="filters col-span-12 pt-0 pb-s8 md:pt-s2 md:pb-s10 lg:pt-s4 lg:pb-s8 grid grid-cols-12 lg:flex lg:justify-center lg:w-full lg:flex-wrap gap-s2 lg:gap-s4 text-neutral-sgray">

        <input type="hidden" id="category" value="0" data-catName="Last Articles">

        <a href="javascript:void(0)" data-id="0" data-name="Latest Resources" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 heading-4 text-center rounded-button uppercase bg-neutral-dgray  active-filter">All</a>

        <?php foreach($categories as $category): ?>
        <a href="javascript:void(0)" data-id="<?php echo $category->term_id; ?>" data-name="Latest <?php echo $category->name; ?>" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 heading-4 text-center rounded-button uppercase btn-text-link !text-neutral-sgray"><?= $category->name ?></a>
        <?php endforeach; ?>

      </div>

      <div class="col-span-12 pt-0 pb-s4 md:pt-s1 md:pb-s10 lg:pb-s6">
        <h2 id="title-section" class="text-h2Mobile md:text-h2Tablet lg:text-h2">Latest Articles</h2>
      </div>
      <!-- Displaying data -->

      <div id="category-post-content">
      </div> 
<!--      <div class="post-paginator">-->
<!--          <ul class="pagination" id="paginador-blog">-->
<!--          </ul>-->
<!--      </div>-->
      <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a id="btn-see-more" class="btn-secondary text-cta md:text-ctaMobile" href="#">See More</a>
      </div>
            <input type="hidden" value="1" id="current-page"/>
    </div>

  </div>

</section>

<?php
  $eventSection = get_field('events_section');
?>

<section class="section w-full lg:pt-s8 pb-s8 md:pb-s10 lg:pb-s4 bg-secondary-carbon text-white relative">

	<div class="container mx-auto">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-4 lg:gap-y-0 pt-[320px] lg:pt-0">

      <img class="absolute top-0 left-0 w-full h-[320px] lg:max-w-[500px] lg:h-full" src="<?php echo $eventSection['image']; ?>" alt="Events" />

      <h4 class="col-span-4 col-start-1 md:col-span-12 md:col-start-1 lg:col-span-3 lg:col-start-6 pt-s4 md:pt-s8 lg:pt-s4 heading-4 uppercase">EVENTS</h4>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-s1 pt-s6 pb-s6 md:pt-s5 md:pb-s5">
        <h2 class="col-span-6 md:col-span-12 lg:col-span-7 lg:col-start-6 text-h2Mobile md:text-h2Tablet lg:text-h2 capitalize"><?php echo $eventSection['first_line_title']; ?></h2>
        <h2 class="col-span-3 md:col-span-6 lg:col-span-3 col-start-4 md:col-start-6 lg:col-start-10 text-h2Mobile md:text-h2Tablet lg:text-h2 capitalize"><?php echo $eventSection['second_line_title']; ?></h2>
      </div>

      <p class="col-span-3 md:col-span-6 lg:col-span-3 lg:col-start-6 body-3"><?php echo $eventSection['first_paragraph']; ?></p>
      <p class="col-span-3 col-start-4 md:col-span-6 lg:col-span-3 md:col-start-7 lg:col-start-9 body-3"><?php echo $eventSection['second_paragraph']; ?></p>
      
      <div class="col-span-6 md:col-span-12 lg:col-span-2 lg:col-start-6 pt-s5 lg:pb-s8 md:pt-s5">
				<a href="<?php echo $eventSection['link_cta']; ?>" class="btn-tertiary-white">Read More</a>
			</div>

    </div>

  </div>

</section>
<!-- Main events -->


<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-secondary-lilac">
	<div class="container mx-auto px-s4 lg:px-0">
		<div class="flex flex-col gap-s8">
			<h2 class="w-full text-h2Mobile md:text-h2Tablet lg:text-h2">Events</h2>
			<div class="relative w-full">
				<div class="related">
					<?php 

            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'event' ),
              'posts_per_page'         => '9',
            );

            // The Query
            $query = new WP_Query( $args );
            // The Loop
            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post();
                
            //for($i=1;$i<7;$i++): 
          ?>
						<div class="card relative w-full max-w-[370px] rounded-card overflow-hidden mx-2">

							<a href="#" class="absolute top-0 left-0 w-full h-full z-10"></a>

							<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square " style="background-image: url(<?php bloginfo('template_url'); ?>/images/home/thumb-slider.png)">

								<!-- <img src="<?php //bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->

                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
                  <img class="block w-full h-full object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
                <?php endif; ?>

							</div>

							<div class="flex flex-col p-7 gap-2 bg-neutral-nwhite">
								<div class="flex items-center gap-3 text-primary-violet uppercase">
									<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5.2189 4.95996H3.59375V6.58511H5.2189V4.95996Z" fill="#411693"/>
										<path d="M5.2189 8.20996H3.59375V9.83511H5.2189V8.20996Z" fill="#411693"/>
										<path d="M8.4689 8.20996H6.84375V9.83511H8.4689V8.20996Z" fill="#411693"/>
										<path d="M11.7169 8.20996H10.0918V9.83511H11.7169V8.20996Z" fill="#411693"/>
										<path d="M8.4689 4.95996H6.84375V6.58511H8.4689V4.95996Z" fill="#411693"/>
										<path d="M11.7169 4.95996H10.0918V6.58511H11.7169V4.95996Z" fill="#411693"/>
										<path d="M13.3425 1.71011H11.7174V0.0849609H10.0923V1.71011H5.218V0.0849609H3.59285V1.71011H1.9677C1.07177 1.71011 0.34375 2.43693 0.34375 3.33406V11.4586H1.9689V3.33526H13.3425V11.4598H3.59285V13.085H13.3425C14.2397 13.085 14.9677 12.3569 14.9677 11.4598V3.33526C14.9677 2.43813 14.2397 1.71011 13.3425 1.71011Z" fill="#411693"/>
									</svg>
									<span>Events</span>
								</div>
								<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"><?php the_title(); ?></h3>
							</div>

						</div>
						<?php 
              //endfor; 
                }
              } else {
                // no posts found
              }

              // Restore original Post Data
              wp_reset_postdata();
            ?>
				</div>

        <div class="max-lg:flex max-lg:items-center max-lg:justify-center max-lg:gap-4 max-sm:pt-s6 max-lg:pt-s10">
          <div class="prev lg:absolute lg:-left-20 lg:top-1/4 cursor-pointer">
            <img class="block w-[54px] h-[54px] aspect-square rotate-180" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
          </div>
          <div class="next lg:absolute lg:-right-20 lg:top-1/4 cursor-pointer">
            <img class="block w-[54px] h-[54px] aspect-square" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
          </div>
        </div>

        <div class="flex items-center justify-center pt-s5 md:pt-s10">
          <a href="<?php echo get_home_url(); ?>/events" class="btn-secondary">See all</a>
        </div>
					
			</div>
		</div>
	</div>
</section>
<!-- Events carousel -->


