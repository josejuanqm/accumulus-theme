<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */


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

<section class="relative grid grid-cols-12 items-stretch gap-x-4 md:min-h-screen bg-secondary-carbon">
  <div class="col-span-12 md:col-span-6 lg:h-full">
    <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
      <img class="block w-full h-full object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
    <?php endif; ?>
    <?php //accumulus_website_post_thumbnail(); ?>
  </div>
  <div class="col-span-12 md:col-span-6 flex flex-col justify-between lg:h-full px-s4 lg:px-0 py-s6 md:pt-s14 lg:pt-52 2xl:pt-60 lg:pb-24 lg:pl-20">
    <h4 class="text-white text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase pt-s1 md:pt-s3"><?php echo $category; ?></h4>
    <div class="flex flex-col gap-s3 lg:gap-8 max-w-[465px] pt-s5 lg:pt-s3">
      <h1 class="text-white text-h2Mobile md:text-h2Tablet lg:text-h2"><?php the_title(); ?></h1>
      <span class="text-white uppercase text-h4 md:text-h4Tablet lg:text-h4">By <?php echo get_the_author(); ?></span>
    </div>
  </div>
</section>
<section class="relative section max-w-[1135px] pb-s8 md:pb-s12 lg:py-s16 flex flex-col mx-auto">
  <div class="relative z-10 pt-s8 pb-s10 md:pb-s7 md:pt-s10 lg:pt-s16 lg:absolute lg:top-0 lg:left-0">
    <ul class="flex items-center lg:items-start lg:flex-col justify-start gap-s6 md:gap-s14 lg:gap-s4">
      <li>
        <a href="#" class="flex items-center gap-4 text-h6Mobile md:text-h6Tablet lg:text-h6">
          <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="38.75" height="38.75" rx="7.26563" fill="#ACEFFF"/>
            <path d="M28.7843 22.4199V27.4002H11.3505V22.4199H8.85938V27.4002V29.8913H31.2754V27.4002V22.4199H28.7843Z" fill="#444444"/>
            <path d="M18.825 21.3875V9.9653H21.3143V21.382L24.8293 17.8669L26.5887 19.6263L21.3143 24.9026V24.9062H18.825L13.5469 19.6263L15.3063 17.8669L18.825 21.3875Z" fill="#444444"/>
          </svg>
          Download Asset
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center gap-4 text-h6Mobile md:text-h6Tablet lg:text-h6">
          <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="38.75" height="38.75" rx="7.26562" fill="#ACEFFF"/>
            <path d="M27.7904 9.6875H11.7799C10.517 9.6875 9.49219 10.7123 9.49219 11.9752V30.2734H11.7799V11.9752H27.7904V27.9857H14.0659V30.2734H27.7904C29.0533 30.2734 30.0781 29.2486 30.0781 27.9857V11.9752C30.0781 10.7123 29.0533 9.6875 27.7904 9.6875Z" fill="#444444"/>
            <path d="M18.4913 15.9414V15.9566H16.7422V24.0961H18.3816L23.3706 20.7701V19.1948L18.4913 15.9414ZM18.937 18.8757L20.5967 19.9816L18.937 21.0875V18.8741V18.8757Z" fill="#444444"/>
          </svg>
          Play
        </a>
      </li>
    </ul>
  </div>
  <div class="relative detail flex flex-col items-end gap-s4 md:gap-s10">
    <?php
      the_content(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'accumulus-website' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post( get_the_title() )
        )
      );
    ?>
  </div>
  <div class="relative pt-s8 md:pt-s10">
    <ul class="flex items-center lg:items-start lg:flex-col justify-start gap-s6 md:gap-s14 lg:gap-s4">
      <li>
        <a href="#" class="flex items-center gap-4 text-h6Mobile md:text-h6Tablet lg:text-h6">
          <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.78125" width="48" height="48" rx="6" fill="#411693"/>
            <path d="M33.3512 18.027L28.3565 13.0323C27.4372 12.1129 25.9461 12.1129 25.0268 13.0323L18.3672 19.6919L20.0321 21.3567L26.6917 14.6972L31.6863 19.6919L23.6052 27.773L25.2701 29.4379L33.3512 21.3567C34.2706 20.4374 34.2706 18.9463 33.3512 18.027Z" fill="#FCFCFC"/>
            <path d="M18.3661 29.6798L25.0257 23.0202L26.6906 21.3553L25.0257 19.6904L23.3608 21.3553L16.7012 28.0149C15.7819 28.9342 15.7819 30.4253 16.7012 31.3447L21.6959 36.3394L23.3608 34.6745L18.3661 29.6798Z" fill="#FCFCFC"/>
            <path d="M28.3549 29.6786L26.69 31.3435L25.0251 33.0084L23.3602 34.6732L21.6953 36.3381C22.6147 37.2575 24.1058 37.2575 25.0251 36.3381L26.69 34.6732L28.3549 33.0084L30.0198 31.3435L31.6847 29.6786L30.0198 28.0137L28.3549 29.6786Z" fill="#FCFCFC"/>
          </svg>
          Share
        </a>
      </li>
      <li>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink( get_the_ID() ); ?>" target="_blank" class="flex items-center gap-4 text-h6Mobile md:text-h6Tablet lg:text-h6">
          <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.78125" width="48" height="48" rx="6" fill="#411693"/>
            <path d="M35.2387 10.9707H15.6988C13.9006 10.9707 12.4414 12.4299 12.4414 14.2281V33.7704C12.4414 35.5686 13.9006 37.0278 15.6988 37.0278H35.2411C37.0393 37.0278 38.4985 35.5686 38.4985 33.7704V14.2281C38.4985 12.4299 37.0393 10.9707 35.2411 10.9707H35.2387ZM35.2387 34.285L15.1843 34.2874V13.716L35.7557 13.7136V34.2874L35.2387 34.285Z" fill="#FCFCFC"/>
            <path d="M20.3589 17.5908C19.9334 17.5908 19.58 17.7327 19.3011 18.0163C19.0222 18.3 18.8828 18.6558 18.8828 19.0837C18.8828 19.5116 19.0222 19.8506 19.3011 20.1415C19.58 20.4324 19.931 20.5766 20.3589 20.5766C20.7868 20.5766 21.1354 20.4324 21.407 20.1415C21.6787 19.8506 21.8157 19.4996 21.8157 19.0837C21.8157 18.6678 21.6787 18.3024 21.407 18.0163C21.1354 17.7327 20.7844 17.5908 20.3589 17.5908Z" fill="#FCFCFC"/>
            <path d="M21.7111 21.7666H18.9922V30.4042H21.7111V21.7666Z" fill="#FCFCFC"/>
            <path d="M30.4611 22.0428C29.9683 21.7399 29.4034 21.5908 28.7639 21.5908C28.1244 21.5908 27.5042 21.7303 26.9777 22.0091C26.7445 22.1317 26.5354 22.2832 26.3478 22.4539V21.7711H23.6289V30.4088H26.3478V25.4853C26.3478 25.1896 26.4128 24.9252 26.5426 24.6944C26.6724 24.4636 26.8503 24.2857 27.0763 24.1607C27.3022 24.0357 27.5619 23.9732 27.8576 23.9732C28.2831 23.9732 28.6365 24.1126 28.9153 24.3915C29.1942 24.6704 29.3336 25.0334 29.3336 25.4853V30.4088H32.0526V24.8819C32.0526 24.2905 31.9107 23.7448 31.6271 23.2472C31.3434 22.7496 30.9539 22.3505 30.4635 22.0476L30.4611 22.0428Z" fill="#FCFCFC"/>
          </svg>
          LinkedIn
        </a>
      </li>
    </ul>
  </div>
</section>
<!-- Detail content -->

<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-secondary-lilac">
	<div class="container mx-auto px-s4 lg:px-0">
		<div class="flex flex-col gap-s8">
			<h2 class="w-full text-h2Mobile md:text-h2Tablet lg:text-h2">Related Resources</h2>
			<div class="relative w-full">
				<div class="related">
					<?php 

            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'resource-cms' ),
              'nopaging'               => true,
              'posts_per_page'         => '9',
            );

            // The Query
            $query = new WP_Query( $args );
            // The Loop
            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
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
						<div class="card relative w-full max-w-[370px] rounded-card overflow-hidden mx-2">

							<a href="<?php the_permalink( get_the_ID() ); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>

							<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square " style="background-image: url(<?php bloginfo('template_url'); ?>/images/home/thumb-slider.png)">

								<!-- <img src="<?php //bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->

                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
                  <img class="block w-full h-full object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
                <?php endif; ?>

							</div>

							<div class="flex flex-col p-7 gap-2 bg-neutral-nwhite">
								<div class="flex items-center gap-3 text-primary-violet uppercase">
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
									<span><?php echo $category; ?></span>
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
