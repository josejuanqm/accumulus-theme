<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */

?>

<?php
	// Fields main banner
	$bg_image_for_desktop = get_field('bg_image_for_desktop');
	$bg_image_for_tablet = get_field('bg_image_for_tablet');
	$bg_image_for_mobile = get_field('bg_image_for_mobile');
	$main_title = get_field('main_title');
	$resume_text = get_field('resume_text');
	$link_learn_more = get_field('link_learn_more');
?>

<section class="relative section w-full pb-s8 md:pb-s10 lg:pb-s12 text-neutral-fnude bg-primary-violet">

	<picture class="absolute top-0 left-0 w-full h-full">
		<source media="(min-width:1024px)" srcset="<?php echo $bg_image_for_desktop; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $bg_image_for_tablet; ?>">
		<img src="<?php echo $bg_image_for_mobile; ?>" alt="Flowers" class="w-full h-full">
	</picture>

	<div class="relative container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

			<h1 class="col-span-12 md:col-span-10 lg:col-span-8 heading-1 text-neutral-nwhite"><?php echo $main_title; ?></h1>

			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2 md:max-w-550 lg:max-w-full text-neutral-nwhite"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_learn_more; ?>" class="btn-secondary-inverted">Learn more</a>
			</div>

		</div>
	</div>

</section>

<!-- Main banner -->



<section class="relative section w-full pt-s12 md:pt-s10 lg:pb-s12">

	<div class="container mx-auto">
		
		<?php
			// Values view

			$values_row = get_field('values_row');

			$i = 0;		
			
			foreach($values_row as $row) :
				$i++;

				if($i % 2 == 1): 	
			?>

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap lg:gap-y-0 pb-s6 md:pb-s10 lg:pb-s12 last-of-type:max-md:pb-s8 last-of-type:lg:!pb-0">
					<div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col items-start gap-s3">

						<?php  foreach($row['card_item'] as $card) : ?>

							<?php if($card['acf_fc_layout'] == 'title') : ?>
								<h3 class="heading-3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="body-2"><?php echo $card['description']; ?></p>
							<?php endif; ?>
							
							<?php if($card['acf_fc_layout'] == 'bullet_list'): ?>
								<ul class="flex flex-col gap-2 text-b3Mobile md:text-b3Tablet lg:text-b3">

									<?php foreach($card['bullet_list'] as $item): ?>
									<li class="relative pl-3 body-3">
										<span class="absolute left-0 top-2 block w-1 h-1 aspect-square bg-neutral-dgray rounded-full"></span>
										<?php echo $item['item']; ?>
									</li>
									<?php endforeach; ?>

								</ul>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'cta'): ?>
								<a class="btn-tertiary" href="<?php echo $card['link']; ?>"><?php echo $card['text_link']; ?></a>
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
					<div class="row-start-1 col-span-12 md:col-span-6 md:col-start-7">

						<?php foreach($row['card_item'] as $card) : ?>

							<?php if ($card['acf_fc_layout'] == 'image') : ?>
								<img src="<?php echo $card['image']; ?>"  />
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
				</div>
				<!-- text left - img right -->

				<?php else: ?>

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 md:pb-s10 lg:pb-s12 last-of-type:max-md:pb-s8 last-of-type:lg:!pb-0">
					<div class="col-span-12 md:col-span-6">

						<?php foreach($row['card_item'] as $card) : ?>

							<?php if ($card['acf_fc_layout'] == 'image') : ?>
								<img src="<?php echo $card['image']; ?>"  />
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
					<div class="col-span-12 md:col-span-5 lg:col-span-4 md:col-start-8 lg:col-start-8 flex flex-col items-start gap-s3">

						<?php foreach($row['card_item'] as $card) : ?>

							<?php if($card['acf_fc_layout'] == 'title') : ?>
								<h3 class="heading-3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="body-2"><?php echo $card['description']; ?></p>
							<?php endif; ?>
							
							<?php if($card['acf_fc_layout'] == 'bullet_list'): ?>
								<ul class="flex flex-col gap-2 text-b3Mobile md:text-b3Tablet lg:text-b3">

									<?php foreach($card['bullet_list'] as $item): ?>
									<li class="relative pl-3 body-3">
										<span class="absolute left-0 top-2 block w-1 h-1 aspect-square bg-neutral-dgray rounded-full"></span>
										<?php echo $item['item']; ?>
									</li>
									<?php endforeach; ?>

								</ul>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'cta'): ?>
								<a class="btn-tertiary" href="<?php echo $card['link']; ?>"><?php echo $card['text_link']; ?></a>
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
				</div>
				<!-- img left - text right -->

				<?php endif; ?>

		<?php
			endforeach;
		?>

	</div>

</section>

<!-- Values -->


<?php 

  // Fields from testimonial

  $testimonial_coc = get_field('testimonial_coc');

?>

<?php if($testimonial_coc) : ?>
<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s8">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6">
      <div class="col-span-6 md:col-span-7 lg:col-span-6 md:col-start-6 lg:col-start-6 lg:pl-s6 flex items-center justify-between">
        <img class="max-w-[145px] md:max-w-full" src="<?php echo $testimonial_coc['image']; ?>" />
        <div class="flex flex-col pl-s2 gap-s2">
          <h4 class="text-h3Mobile md:text-h3Tablet lg:text-h3 text-neutral-dgray w-full md:max-w-[195px]"><?php echo $testimonial_coc['name']; ?></h4>
          <p class="text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $testimonial_coc['position']; ?></p>
        </div>
      </div>
      <h2 class="col-span-6 md:col-span-10 lg:col-span-9 text-h2Mobile md:text-h2Tablet lg:text-h2 text-neutral-dgray">
      <?php echo $testimonial_coc['testimonial']; ?>
      </h2>
      <p class="col-span-5 md:col-span-8 md:col-start-3 text-b1Mobile md:text-b1Tablet lg:text-b1"><?php echo $testimonial_coc['resume_text']; ?></p>
			<div class="col-span-6 md:col-span-12 flex items-center justify-center pt-s2 md:pt-s6 lg:pt-s14">
				<a class="btn-tertiary" href="<?php echo get_home_url(); ?>/platform">Learn more about our platform</a>
			</div>
    </div>
  </div>
</section>
<?php endif; ?>
<!-- Testimonial -->


<?php 

  // Fields from citations

  $citations = get_field('citations');

?>

<?php if($citations) : ?>
<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 bg-neutral-dgray text-neutral-nwhite bg-citation-mobile md:bg-citation-tablet lg:bg-citation-desktop bg-no-repeat bg-contain bg-right-top">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s4 md:gap-y-s10 lg:gap-y-s6">

      <h3 class="col-span-6 md:col-span-12 heading-2">Citations</h3>

      <?php foreach($citations['citation'] as $key => $item ): ?>

      <div class="relative col-span-6 md:col-span-6 lg:col-span-5 <?php if($key+1 % 2 == 2 ): ?>lg:col-start-8<?php endif; ?> text-b3Mobile md:text-b3Tablet lg:text-b3 pl-s2 break-all text-wrap">
        <span class="absolute top-0 left-0 text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $key + 1 ?>.</span>
        <?php echo $item['resume']; ?>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>
<?php endif; ?>
<!-- Citations -->



<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-secondary-lilac">
	<div class="container mx-auto">
		<div class="flex flex-col gap-s8">
			<h2 class="w-full heading-2">Related Resources</h2>
			<div class="relative w-full">
				<div class="related">
					<?php 

            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'resource-cms' ),
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

							<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url(<?php bloginfo('template_url'); ?>/images/home/thumb-slider.png)">

								<!-- <img src="<?php //bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->

                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
                  <!-- <img class="block w-full h-full object-cover" src="<?php //echo $image[0]; ?>" alt="<?php //the_title(); ?>" /> -->
                  <img class="block" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
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
