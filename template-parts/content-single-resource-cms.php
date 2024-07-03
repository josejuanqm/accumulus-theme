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
              'post__not_in' => array( get_the_ID() )
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
									foreach($taxonomy_names as $tax_name) : ?>              
											<?php 
												$category = $tax_name; 
												$categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
											?>
									<?php endforeach;
								endif;
                
            //for($i=1;$i<7;$i++): 
          ?>
						<div class="card relative w-full max-w-[370px] rounded-card overflow-hidden mx-2">

							<a href="<?php the_permalink(); ?>" class="absolute top-0 left-0 w-full h-full z-10"></a>

							<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square " style="background-image: url(<?php bloginfo('template_url'); ?>/images/home/thumb-slider.png)">

								<!-- <img src="<?php //bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->

                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
                  <img class="block w-full h-full object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
                <?php endif; ?>

							</div>

							<div class="flex flex-col p-7 gap-2 bg-neutral-nwhite">
								<div class="flex items-center gap-3 text-primary-violet uppercase">
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
					
				<div class="max-xl:flex max-xl:items-center max-xl:justify-center max-xl:gap-4 max-sm:pt-s6 max-xl:pt-s10">
					<div class="prev xl:absolute xl:-left-20 xl:top-1/4 cursor-pointer">
						<img class="block w-[54px] h-[54px] aspect-square rotate-180" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
					</div>
					<div class="next xl:absolute xl:-right-20 xl:top-1/4 cursor-pointer">
						<img class="block w-[54px] h-[54px] aspect-square" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Related resources -->