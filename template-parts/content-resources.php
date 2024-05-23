<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */

?>



<section class="section w-full pt-0 lg:pt-s14 pb-s12 md:pb-s7 lg:pb-s12 bg-secondary-lilac">

	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-0">

      <!-- <div class="col-span-12 lg:col-span-7 flex flex-col gap-s3 lg:pr-9">

        <div class="relative">
          <img class="block" src="<?php bloginfo('template_url'); ?>/images/resources/thumb-main-resources.png" alt="title" />
          <h1 class="absolute bottom-s3 left-0  pl-s6 text-h1Mobile md:text-h1Tablet lg:text-h1 text-neutral-nwhite">Lorem Ipsum Dolor</h1>
        </div>

        <div class="flex flex-col gap-s3">
          <p class="text-b2Mobile md:text-b2Tablet lg:text-b2">We’re a global, nonprofit industry association developing a groundbreaking SaaS platform to accelerate the exchange of information between those who develop medicines and those who review and approve them.</p>
          <div class="flex gap-s2">
            <a href="#" class="flex items-center gap-s1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-dgray uppercase">
              <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.41033 15.9983H6.40921V7.99902H2.41033C1.30618 7.99902 0.410156 8.89504 0.410156 9.9992V13.9996C0.410156 15.1037 1.30618 15.9997 2.41033 15.9997V15.9983ZM2.41033 11.9994V9.9992H4.41051V13.9996H2.41033V11.9994Z" fill="#444444"/>
                <path d="M14.4103 7.99855H12.4102V15.9978H16.409C17.5132 15.9978 18.4092 15.1018 18.4092 13.9976V9.99725C18.4092 8.89309 17.5132 7.99707 16.409 7.99707H14.4089L14.4103 7.99855ZM16.4105 11.9989V13.9991H14.4103V9.99872H16.4105V11.9989Z" fill="#444444"/>
                <path d="M6.4027 0H4.40252C3.29836 0 2.40234 0.896021 2.40234 2.00018V6.00054H4.40252V2.00018H14.4019V6.00054H16.4021V2.00018C16.4021 0.896021 15.5061 0 14.4019 0H6.4027Z" fill="#444444"/>
              </svg>
              PODCAST
            </a>
            <span class="text-b2 text-neutral-dgray">|</span>
            <a href="#" class="flex items-center gap-s1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-dgray uppercase">
              By Lorem Ipsum
            </a>
          </div>
        </div>

      </div> -->
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
              foreach($taxonomy_names as $tax_name) : ?>              
                  <?php 
                    $category = $tax_name; 
                    $categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
                  ?>
              <?php endforeach;
            endif;
      ?>

          <div class="col-span-12 lg:col-span-7 flex flex-col gap-s3 lg:pr-9">

            <div class="relative">
              <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
                <img class="block w-full" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
              <?php endif; ?>

              <!-- <img class="block" src="<?php //bloginfo('template_url'); ?>/images/resources/thumb-main-resources.png" alt="title" /> -->
              <h1 class="absolute bottom-s3 left-0  pl-s6 text-h1Mobile md:text-h1Tablet lg:text-h1 text-neutral-nwhite"><?php the_title(); ?></h1>
            </div>

            <div class="flex flex-col gap-s3">
              <p class="text-b2Mobile md:text-b2Tablet lg:text-b2"><?php the_excerpt(); ?></p>
              <div class="flex gap-s2">
                <a href="#" class="flex items-center gap-s1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-dgray uppercase">
                  <?php if ($categorySlug == 'article'): ?>
                    <svg width="15" height="13" viewBox="0 0 15 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.2773 2.88949V11.5558H11.8331V1.08477C11.8331 0.485348 11.3478 0 10.7484 0H1.36211C0.762687 0 0.277344 0.485348 0.277344 1.08477V11.5558C0.277344 12.3532 0.924114 13 1.72155 13H13.2773C14.0748 13 14.7215 12.3532 14.7215 11.5558V2.88949H13.2773ZM1.72155 11.5558V1.44421H10.3879V11.5547H1.72155V11.5558Z" class=" fill-current"/>
                      <path d="M8.94196 8.66504H3.16406V10.1092H8.94196V8.66504Z" class="fill-current"/>
                      <path d="M8.94196 5.77832H3.16406V7.22253H8.94196V5.77832Z" class="fill-current"/>
                      <path d="M8.94196 2.8877H3.16406V4.3319H8.94196V2.8877Z" class="fill-current"/>
                    </svg>
                    <?php elseif ($categorySlug == 'media'): ?>
                    <svg width="14" height="13" viewBox="0 0 14 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
                      <path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
                      <path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
                      <path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
                    </svg>
                    <?php elseif ($categorySlug == 'white-paper' || $categorySlug == 'e-books'): ?>
                    <svg width="10" height="13" viewBox="0 0 10 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.28059 11.1674H1.61382V1.83355H2.94737V0.5H1.56067C0.854038 0.5 0.28125 1.07279 0.28125 1.77942V11.131C0.28125 11.8869 0.894386 12.5 1.65023 12.5H8.24615C9.00199 12.5 9.61513 11.8869 9.61513 11.131V5.83322H8.28158V11.1664L8.28059 11.1674Z" class="fill-current"/>
                      <path d="M9.37538 3.71823L6.15911 0.500977H4.27344H4.27442V5.8342H9.60764V3.94951L9.37538 3.71823ZM5.60699 4.50065V1.83453L6.95825 3.18678L8.27311 4.50065H5.60699Z" class="fill-current"/>
                    </svg>
                    <?php elseif ($categorySlug == 'podcast'): ?>
                    <svg width="15" height="12" viewBox="0 0 15 12" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.38681 11.9983H5.38589V5.99902H2.38681C1.55872 5.99902 0.886719 6.67102 0.886719 7.49911V10.4993C0.886719 11.3274 1.55872 11.9994 2.38681 11.9994V11.9983ZM2.38681 8.99921V7.49911H3.8869V10.4993H2.38681V8.99921Z" class="fill-current"/>
                      <path d="M11.3868 5.99916H9.88672V11.9984H12.8858C13.7139 11.9984 14.3859 11.3264 14.3859 10.4983V7.49814C14.3859 6.67004 13.7139 5.99805 12.8858 5.99805H11.3857L11.3868 5.99916ZM12.8869 8.99934V10.4994H11.3868V7.49925H12.8869V8.99934Z" class="fill-current"/>
                      <path d="M5.38153 0H3.88144C3.05335 0 2.38135 0.671998 2.38135 1.50009V4.50028H3.88144V1.50009H11.3808V4.50028H12.8809V1.50009C12.8809 0.671998 12.2089 0 11.3808 0H5.38153Z" class="fill-current"/>
                    </svg>
                  <?php endif; ?>
                  <?php echo $category; ?>
                </a>
                <span class="text-b2 text-neutral-dgray">|</span>
                <a href="#" class="flex items-center gap-s1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-dgray uppercase">
                  By <?php echo get_the_author(); ?>
                </a>
              </div>
            </div>

          </div>

        <?php
          }
        } else {
          // no posts found
        }
        
        // Restore original Post Data
        wp_reset_postdata();
      ?>
      <!-- Main post -->

      <div class="col-span-12 lg:col-span-5 lg:col-start-8 flex flex-col gap-s4">

        <h2 class="text-h2Mobile md:text-h2Tablet lg:text-h2">Top Stories</h2>

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
                  foreach($taxonomy_names as $tax_name) : ?>              
                      <?php 
                        $category = $tax_name; 
                        $categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
                      ?>
                  <?php endforeach;
                endif;
          ?>

          <div class="col-span-12 md:col-span-6 lg:col-span-12 flex flex-col-reverse md:flex-row items-stretch md:justify-between bg-secondary-deepLilac text-neutral-dgray rounded-miniCard overflow-hidden <?php echo $categorySlug; ?>">
            <div class="relative flex flex-col gap-s2 py-s2 pl-s7 pr-s2">
              <span class="absolute top-s2 left-s2 flex items-center justify-center w-s3 h-s3 text-h5Mobile md:text-h5Tablet lg:text-h5 rounded-full aspect-square bg-secondary-lilac"><?php echo $i+1; ?></span>
              <span class="flex items-center gap-s1 pt-1 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase text-neutral-dgray <?php echo $categorySlug; ?>">
                <?php if ($categorySlug == 'article'): ?>
                  <svg width="15" height="13" viewBox="0 0 15 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.2773 2.88949V11.5558H11.8331V1.08477C11.8331 0.485348 11.3478 0 10.7484 0H1.36211C0.762687 0 0.277344 0.485348 0.277344 1.08477V11.5558C0.277344 12.3532 0.924114 13 1.72155 13H13.2773C14.0748 13 14.7215 12.3532 14.7215 11.5558V2.88949H13.2773ZM1.72155 11.5558V1.44421H10.3879V11.5547H1.72155V11.5558Z" class=" fill-current"/>
                    <path d="M8.94196 8.66504H3.16406V10.1092H8.94196V8.66504Z" class="fill-current"/>
                    <path d="M8.94196 5.77832H3.16406V7.22253H8.94196V5.77832Z" class="fill-current"/>
                    <path d="M8.94196 2.8877H3.16406V4.3319H8.94196V2.8877Z" class="fill-current"/>
                  </svg>
                  <?php elseif ($categorySlug == 'media'): ?>
                  <svg width="14" height="13" viewBox="0 0 14 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
                    <path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
                    <path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
                    <path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
                  </svg>
                  <?php elseif ($categorySlug == 'white-paper' || $categorySlug == 'e-books'): ?>
                  <svg width="10" height="13" viewBox="0 0 10 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.28059 11.1674H1.61382V1.83355H2.94737V0.5H1.56067C0.854038 0.5 0.28125 1.07279 0.28125 1.77942V11.131C0.28125 11.8869 0.894386 12.5 1.65023 12.5H8.24615C9.00199 12.5 9.61513 11.8869 9.61513 11.131V5.83322H8.28158V11.1664L8.28059 11.1674Z" class="fill-current"/>
                    <path d="M9.37538 3.71823L6.15911 0.500977H4.27344H4.27442V5.8342H9.60764V3.94951L9.37538 3.71823ZM5.60699 4.50065V1.83453L6.95825 3.18678L8.27311 4.50065H5.60699Z" class="fill-current"/>
                  </svg>
                  <?php elseif ($categorySlug == 'podcast'): ?>
                  <svg width="15" height="12" viewBox="0 0 15 12" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.38681 11.9983H5.38589V5.99902H2.38681C1.55872 5.99902 0.886719 6.67102 0.886719 7.49911V10.4993C0.886719 11.3274 1.55872 11.9994 2.38681 11.9994V11.9983ZM2.38681 8.99921V7.49911H3.8869V10.4993H2.38681V8.99921Z" class="fill-current"/>
                    <path d="M11.3868 5.99916H9.88672V11.9984H12.8858C13.7139 11.9984 14.3859 11.3264 14.3859 10.4983V7.49814C14.3859 6.67004 13.7139 5.99805 12.8858 5.99805H11.3857L11.3868 5.99916ZM12.8869 8.99934V10.4994H11.3868V7.49925H12.8869V8.99934Z" class="fill-current"/>
                    <path d="M5.38153 0H3.88144C3.05335 0 2.38135 0.671998 2.38135 1.50009V4.50028H3.88144V1.50009H11.3808V4.50028H12.8809V1.50009C12.8809 0.671998 12.2089 0 11.3808 0H5.38153Z" class="fill-current"/>
                  </svg>
                <?php endif; ?>
                <?php echo $category; ?>
              </span>

              <h3 class="text-h3Mobile md:text-h3Tablet lg:text-h3"><?php the_title(); ?></h3>
          </div>
          <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
            <img class="w-full md:w-[175px] max-h-[144px] md:max-h-full" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
          <?php endif; ?>
				  <!-- Thumbnail -->
        </div>

          <?php
              $i++;
              }
            } else {
              // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
          ?>
          
          <!-- cat -->

        </div>

      </div>
      <!-- Category -->

		</div>

	</div>

</section>
<!-- Main banner -->

<?php
  $purpleSection = get_field('purple_section');
?>

<section class="section w-full pt-s8 md:pt-s10 lg:pt-s8 pb-s8 md:pb-s2 lg:pb-s4 bg-primary-violet bg-no-repeat bg-cover bg-left-top text-white" style="background-image: url(<?php bloginfo('template_url'); ?>/images/resources/bg-purple.png);">

	<div class="container mx-auto">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-0">

      <h4 class="col-span-4 col-start-3 md:col-span-12 md:col-start-1 lg:col-span-3 lg:col-start-5 pt-s2 lg:pt-s4 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase"><?php echo $purpleSection['eye_text']; ?></h4>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-s1 pt-s6 pb-s8 md:pt-s3 md:pb-s10 lg:pt-s6 lg:pb-s6">
        <h2 class="col-span-6 md:col-span-12 lg:col-span-10 lg:col-start-2 text-h2Mobile md:text-h2Tablet lg:text-h2 capitalize"><?php echo $purpleSection['first_line_title']; ?></h2>
        <h2 class="col-span-3 md:col-span-5 col-start-4 md:col-start-6 text-h2Mobile md:text-h2Tablet lg:text-h2 capitalize"><?php echo $purpleSection['second_line_title']; ?></h2>
      </div>

      <p class="col-span-3 md:col-span-6 lg:col-span-3 lg:col-start-5 pt-s10 md:pt-s8 lg:pt-0 text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $purpleSection['first_paragraph']; ?></p>
      <p class="col-span-3 col-start-4 md:col-span-6 lg:col-span-3 md:col-start-7 lg:col-start-8 pt-s10 md:pt-s8 lg:pt-0 text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $purpleSection['second_paragraph']; ?></p>

      <div class="col-span-6 md:col-span-12 lg:col-span-2 lg:col-start-5 pt-s5 md:pt-s6 md:pb-s10 lg:pb-s8">
				<a href="<?php echo $purpleSection['url_cta']; ?>" class="btn-tertiary-white">Read More</a>
			</div>

    </div>

  </div>

</section>
<!-- Purple section -->


<section class="section w-full pt-s8 pb-s8 md:pb-s10 md:pt-s10 lg:pt-s8 lg:pb-s8 bg-white">

	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-s2">

      <!-- <div class="col-span-12 pt-0 pb-s8 md:pt-s2 md:pb-s10 lg:pt-s4 lg:pb-s8 grid grid-cols-12 gap-s2">

        <a class="col-span-6 lg:col-span-3 flex items-center justify-center h-[38px] text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase bg-neutral-dgray text-neutral-nwhite" href="#">All resources</a>
        <a class="col-span-6 lg:col-span-3 flex items-center justify-center h-[38px] text-h4Mobile md:text-h4Tablet lg:text-h4 text-center btn-text-link" href="#">EBOOKS & WHITE PAPERS</a>
        <a class="col-span-6 lg:col-span-3 flex items-center justify-center h-[38px] text-h4Mobile md:text-h4Tablet lg:text-h4 text-center btn-text-link" href="#">THOUGHT LEADERSHIP</a>
        <a class="col-span-6 lg:col-span-3 flex items-center justify-center h-[38px] text-h4Mobile md:text-h4Tablet lg:text-h4 text-center btn-text-link" href="#">MEDIA</a>

      </div> -->

      <?php echo do_shortcode('[searchandfilter id="85"]'); ?>

      <div class="col-span-12 pt-0 pb-s4 md:pt-s1 md:pb-s10 lg:pb-s6">
        <h2 class="text-h2Mobile md:text-h2Tablet lg:text-h2">Latest Articles</h2>
      </div>

      <?php echo do_shortcode('[searchandfilter id="85" show="results"]'); ?>
      <!-- Displaying data -->

      <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a class="btn-secondary" href="#">See More</a>
      </div>

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

      <h4 class="col-span-4 col-start-1 md:col-span-12 md:col-start-1 lg:col-span-3 lg:col-start-6 pt-s4 md:pt-s8 lg:pt-s4 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase">EVENTS</h4>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-4 gap-y-s1 pt-s6 pb-s6 md:pt-s5 md:pb-s5">
        <h2 class="col-span-6 md:col-span-12 lg:col-span-7 lg:col-start-6 text-h2Mobile md:text-h2Tablet lg:text-h2 capitalize"><?php echo $eventSection['first_line_title']; ?></h2>
        <h2 class="col-span-3 md:col-span-6 lg:col-span-3 col-start-4 md:col-start-6 lg:col-start-10 text-h2Mobile md:text-h2Tablet lg:text-h2 capitalize"><?php echo $eventSection['second_line_title']; ?></h2>
      </div>

      <p class="col-span-3 md:col-span-6 lg:col-span-3 lg:col-start-6 text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $eventSection['first_paragraph']; ?></p>
      <p class="col-span-3 col-start-4 md:col-span-6 lg:col-span-3 md:col-start-7 lg:col-start-9 text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $eventSection['second_paragraph']; ?></p>
      
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
              'post_type'              => array( 'events' ),
              'nopaging'               => true,
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
			</div>
		</div>
	</div>
</section>
<!-- Events carousel -->
