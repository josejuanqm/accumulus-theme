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
          <div class="relative h-full w-full max-lg:h-[416px] flex items-center justify-center bg-resources-general bg-cover bg-no-repeat bg-center">
            <!-- <?php //if (has_post_thumbnail( get_the_ID() ) ): ?>
              <?php //$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
              <img class="block" src="<?php //echo $image[0]; ?>" alt="<?php //the_title(); ?>" />
            <?php //endif; ?> -->
            <h1 class="absolute bottom-s3 left-0 pl-s2 md:pl-s4 lg:pl-s6 pr-s2 lg:pr-s2 heading-3 text-neutral-nwhite md:w-[570px] lg:w-full"><?php truncate(get_the_title(), 140); ?></h1>
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
                  <?php elseif ($categorySlug == 'e-books--white-papers'): ?>
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.66595 12.0564H1.44361V1.94468H2.88829V0.5H1.38604C0.62052 0.5 0 1.12052 0 1.88604V12.0169C0 12.8358 0.664231 13.5 1.48306 13.5H8.62864C9.44747 13.5 10.1117 12.8358 10.1117 12.0169V6.27766H8.66702V12.0553L8.66595 12.0564Z" class="fill-current"/>
                      <path d="M9.85523 3.98634L6.37093 0.500977H4.32812H4.32919V6.27864H10.1068V4.23689L9.85523 3.98634ZM5.77281 4.83396V1.94566L7.23668 3.4106L8.6611 4.83396H5.77281Z" class="fill-current"/>
                    </svg>
								<?php endif; ?>
                <?php echo $category; ?>
              </span>
              <!-- <span class="body-2 text-neutral-dgray !leading-none">|</span> -->
              <!-- <span class="flex items-center gap-s1 heading-4 text-neutral-dgray uppercase">
                By <?php //echo get_the_author(); ?>
              </span> -->
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

        <h2 class="heading-2">Recent Stories</h2>

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
                    $categorySlugs = str_replace(' ', '-', strtolower($tax_name)); 
                    $categorySlug = str_replace('&amp;', '', strtolower($categorySlugs)); 
                  endforeach;
                endif;
          ?>

          <div class="relative col-span-12 md:col-span-6 lg:col-span-12 flex flex-col-reverse md:flex-row items-stretch md:justify-between text-neutral-dgray rounded-miniCard overflow-hidden <?php echo $categorySlug; ?>">
            <a href="<?php the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>
            <div class="relative flex flex-col md:w-2/3 gap-s2 py-s2 pl-s7 pr-s2 bg-secondary-deepLilac">
              <span class="absolute top-s2 left-s2 flex items-center justify-center w-s3 h-s3 leading-none text-h4Mobile md:text-h5 rounded-full aspect-square bg-secondary-lilac tracking-normal"><?php echo $i+1; ?></span>
              <span class="relative flex items-start gap-s1 pt-1 heading-4 uppercase text-neutral-dgray max-lg:pl-s3 <?php echo $categorySlug; ?>">
                <?php if ($categorySlug == 'thought-leadership'): ?>
                  <svg width="15" height="14" viewBox="0 0 15 14" fill="none"">
                    <path d="M13.2812 2.95199V11.6183H11.837V1.14727C11.837 0.547848 11.3517 0.0625 10.7523 0.0625H1.36601C0.766593 0.0625 0.28125 0.547848 0.28125 1.14727V11.6183C0.28125 12.4157 0.92802 13.0625 1.72545 13.0625H13.2812C14.0787 13.0625 14.7255 12.4157 14.7255 11.6183V2.95199H13.2812ZM1.72545 11.6183V1.50671H10.3918V11.6172H1.72545V11.6183Z" class="fill-current"/>
                    <path d="M8.94587 8.72754H3.16797V10.1717H8.94587V8.72754Z" class="fill-current"/>
                    <path d="M8.94587 5.84082H3.16797V7.28503H8.94587V5.84082Z" class="fill-current"/>
                    <path d="M8.94587 2.9502H3.16797V4.3944H8.94587V2.9502Z" class="fill-current"/>
                  </svg>
                  <?php elseif ($categorySlug == 'regulatory-insights'): ?>
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" class="max-lg:absolute max-lg:left-0 max-lg:top-1 ">
                      <path d="M12.4646 5.07567H0.000976562V2.68595L6.23279 0.5L12.4646 2.68595V5.07567ZM1.38151 3.78419H11.0841V3.58138L6.23279 1.87949L1.38151 3.58138V3.78419Z" class="fill-current" />
                      <path d="M2.76823 6.37402H1.3877V10.9105H2.76823V6.37402Z" class="fill-current" />
                      <path d="M11.0807 6.37402H9.7002V10.9105H11.0807V6.37402Z" class="fill-current" />
                      <path d="M8.31022 6.37402H6.92969V10.9105H8.31022V6.37402Z" class="fill-current" />
                      <path d="M5.53971 6.37402H4.15918V10.9105H5.53971V6.37402Z" class="fill-current" />
                      <path d="M12.4688 12.208H0V13.4995H12.4688V12.208Z" class="fill-current" />
                    </svg>
                  <?php elseif ($categorySlug == 'e-books--white-papers'): ?>
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" class="max-lg:absolute max-lg:left-0 max-lg:top-1 ">
                      <path d="M8.66595 12.0564H1.44361V1.94468H2.88829V0.5H1.38604C0.62052 0.5 0 1.12052 0 1.88604V12.0169C0 12.8358 0.664231 13.5 1.48306 13.5H8.62864C9.44747 13.5 10.1117 12.8358 10.1117 12.0169V6.27766H8.66702V12.0553L8.66595 12.0564Z" class="fill-current"/>
                      <path d="M9.85523 3.98634L6.37093 0.500977H4.32812H4.32919V6.27864H10.1068V4.23689L9.85523 3.98634ZM5.77281 4.83396V1.94566L7.23668 3.4106L8.6611 4.83396H5.77281Z" class="fill-current"/>
                    </svg>
								<?php endif; ?>
                <span class="-mt-[2px]"><?php echo $category; ?></span>
              </span>
              <h3 class="heading-5"><?php truncate(get_the_title(), 140); ?></h3>
            </div>
            <?php if (has_post_thumbnail( get_the_ID() ) ): ?>

              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
              <div class="w-full md:w-1/3 h-[144px] md:h-full object-cover flex items-center justify-center bg-events-general">
                <img class="w-full md:w-full h-[144px] md:h-full object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
              </div>

              <?php 
              else :
                if ($categorySlug === 'e-books--white-papers'): 
              ?>

                <div class="w-full md:w-1/3 h-[144px] md:h-full object-cover flex items-center justify-center bg-events-general">
                <img src="<?php bloginfo('template_url') ?>/images/resources/thumb-ebooks.png" class="w-full md:w-full h-[144px] md:h-full object-cover"   />
                </div>

                <?php elseif ($categorySlug == 'regulatory-insights'): ?>

                <div class="w-full md:w-1/3 h-[144px] md:h-full object-cover flex items-center justify-center bg-events-general">
                <img src="<?php bloginfo('template_url') ?>/images/resources/thumb-regulatory-insights.png" class="w-full md:w-full h-[144px] md:h-full object-cover"   />
                </div>

                <?php elseif ($categorySlug == 'thought-leadership'): ?>

                <div class="w-full md:w-1/3 h-[144px] md:h-full object-cover flex items-center justify-center bg-events-general">
                <img src="<?php bloginfo('template_url') ?>/images/resources/thumb-thought-leadership.png" class="w-full md:w-full h-[144px] md:h-full object-cover"   />
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
  $purpleSection = get_field('purple_section');
?>

<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s8 pb-s8 md:pb-s2 lg:pb-s4 bg-primary-violet text-neutral-nwhite bg-purple-section-mobile md:bg-purple-section-tablet lg:bg-purple-section-desktop bg-no-repeat bg-cover bg-left-top isolate">

	<div class="absolute top-0 left-0 right-0 bottom-0 bg-primary-violet -z-10 opacity-70"></div>
	<div class="container mx-auto">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-0">

      <!-- <h4 class="col-span-4 col-start-3 md:col-span-12 md:col-start-1 lg:col-span-3 lg:col-start-5 pt-s2 lg:pt-s4 heading-4 uppercase"><?php //echo $purpleSection['eye_text']; ?></h4> -->
      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-s1 pt-s6 pb-s8 md:pt-s3 md:pb-s10 lg:pt-s6 lg:pb-s6">
        <h2 class="col-span-12 md:col-span-12 lg:col-span-12 grid grid-cols-12 heading-2 capitalize gap-s2 lg:pt-s6">
            <?php if($purpleSection['first_line_title']): ?>
            <span class="col-span-12 md:col-span-12 lg:col-span-12"><?php echo $purpleSection['first_line_title']; ?></span>
            <?php endif; ?>
            <?php if($purpleSection['second_line_title']): ?>
              <span class="col-span-12 md:col-span-12 lg:col-span-12"><?php echo $purpleSection['second_line_title']; ?></span>
            <?php endif; ?>
        </h2>
      </div>

      <p class="col-span-3 md:col-span-6 lg:col-span-3 lg:col-start-5 pt-s10 md:pt-s8 lg:pt-0 body-3 text-neutral-nwhite"><?php echo $purpleSection['first_paragraph']; ?></p>
      <p class="col-span-3 col-start-4 md:col-span-6 lg:col-span-3 md:col-start-7 lg:col-start-8 pt-s10 md:pt-s8 lg:pt-0 body-3 text-neutral-nwhite"><?php echo $purpleSection['second_paragraph']; ?></p>

      <div class="col-span-6 md:col-span-12 lg:col-span-2 lg:col-start-5 pt-s5 md:pt-s6 md:pb-s10 lg:pb-s8">
        <a href="<?php echo $purpleSection['url_cta']['url']; ?>" class="btn-tertiary-white" target="<?php echo $purpleSection['url_cta']['target'] ? $purpleSection['url_cta']['target'] : '_self' ?>"><?php echo $purpleSection['url_cta']['title']; ?></a>
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

      <div class="filters col-span-12 pt-0 pb-s8 md:pt-s2 md:pb-s10 lg:pt-s4 lg:pb-s8 flex justify-center w-full flex-wrap gap-s2 md:gap-s4 text-neutral-sgray">

        <input type="hidden" id="category" value="0" data-catName="Last Articles">

        <a href="javascript:void(0)" data-id="0" data-name="Latest Resources" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s2 lg:px-s3 heading-4 text-center rounded-button uppercase btn-text-link  bg-neutral-dgray  active-filter">All</a>

        <?php foreach($categories as $category): ?>
        <a href="javascript:void(0)" data-id="<?php echo $category->term_id; ?>" data-name="Latest <?php echo $category->name; ?>" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s2 lg:px-s3 heading-4 text-center rounded-button uppercase btn-text-link text-neutral-sgray"><?= $category->name ?></a>
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

<!-- List posts resources -->

<?php
  $eventSection = get_field('events_section');
  if($eventSection):
?>

<section class="section w-full lg:pt-s8 pb-s8 md:pb-s10 lg:pb-s4 bg-secondary-carbon text-white relative">

	<div class="container mx-auto">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-4 lg:gap-y-0 pt-[320px] lg:pt-0">

      <img class="absolute top-0 left-0 w-full h-[320px] lg:max-w-[500px] lg:h-full" src="<?php echo $eventSection['image']; ?>" alt="Events" />

      <h4 class="col-span-4 col-start-1 md:col-span-12 md:col-start-1 lg:col-span-3 lg:col-start-6 pt-s4 md:pt-s8 lg:pt-s4 heading-4 uppercase">EVENTS</h4>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-s1 pt-s6 pb-s6 md:pt-s5 md:pb-s5">

        <h2 class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12">
          
          <?php if ($eventSection['first_line_title'] !== ''): ?>
          <span class="col-span-6 md:col-span-12 lg:col-span-7 lg:col-start-6 text-h2Mobile md:text-h2Tablet lg:text-h2 capitalize"><?php echo $eventSection['first_line_title']; ?></span>
          <?php endif; ?>
          <?php if ($eventSection['second_line_title'] !== ''): ?>
          <span class="col-span-3 md:col-span-6 lg:col-span-6 col-start-4 md:col-start-6 lg:col-start-6 text-h2Mobile md:text-h2Tablet lg:text-h2 capitalize"><?php echo $eventSection['second_line_title']; ?></span>
          <?php endif; ?>
          
        </h2>

      </div>

      <p class="col-span-3 md:col-span-6 lg:col-span-3 lg:col-start-6 body-3"><?php echo $eventSection['first_paragraph']; ?></p>
      <p class="col-span-3 col-start-4 md:col-span-6 lg:col-span-3 md:col-start-7 lg:col-start-9 body-3"><?php echo $eventSection['second_paragraph']; ?></p>
      
      <div class="col-span-6 md:col-span-12 lg:col-span-2 lg:col-start-6 pt-s5 lg:pb-s8 md:pt-s5">
				<a href="<?php echo $eventSection['link_cta']['url']; ?>" class="btn-tertiary-white" target="<?php echo $eventSection['link_cta']['target'] ? $eventSection['link_cta']['target'] : '_self' ?>"><?php echo $eventSection['link_cta']['title']; ?></a>
			</div>

    </div>

  </div>

</section>

<?php endif; ?>
<!-- Banner events -->


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

							<a href="<?php echo get_home_url() ?>/events" class="absolute top-0 left-0 w-full h-full z-10"></a>

							<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square " style="background-image: url(<?php bloginfo('template_url'); ?>/images/home/thumb-slider.png)">

								<!-- <img src="<?php //bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->

                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
                  <img class="block" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
                  <?php else: ?>
                    <img class="block" src="<?php bloginfo('template_url'); ?>/images/events/icon-calendar.png" alt="<?php the_title(); ?>" />
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
								<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"><?php truncate(get_the_title(), 140); ?></h3>
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


