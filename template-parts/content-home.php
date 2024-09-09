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
	$bg_image_main = get_field('bg_image_main');
	$title_tag = get_field('title_tag');
	$main_title = get_field('main_title');
	$resume_text = get_field('resume_text');
	$text_cta_request_a_demo_home = get_field('text_cta_request_a_demo_home');
	$link_request_a_demo_home = get_field('link_request_a_demo_home');
	$text_cta_learn_more_home = get_field('text_cta_learn_more_home');
	$link_learn_more_home = get_field('link_learn_more_home');
	$marquee = get_field('marquee_images');

	echo $link_learn_more;
	echo $link_request_a_demo;
?>

<section class="translucent-navigation section w-full pb-s12 md:pb-s7 lg:pb-s12 bg-cover bg-no-repeat bg-center bg-neutral-offwhite" style="background-image: url(<?php echo $bg_image_main ?>)">

	<div class="container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

			<h4 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1"><?php echo $main_title; ?></h1>

			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="text-b2 md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_request_a_demo_home; ?>" class="btn-secondary"><?php echo $text_cta_request_a_demo_home; ?></a>
				<a href="<?php echo $link_learn_more_home; ?>" class="btn-tertiary"><?php echo $text_cta_learn_more_home; ?></a>
			</div>

		</div>
	</div>

	<section class="flex flex-col gap-s2 md:gap-s4 lg:gap-s7 w-full pt-s6 md:pb-s10 lg:pb-s11">

		<div class="container mx-auto">
			<h4 class="text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase">Supported by</h4>
		</div>
		<div class="w-full">
			<div id="logoMarqueeSection">
				<div class="relative overflow-hidden w-full">
					<div class="marquee">
							<?php for( $i=1;$i<3;$i++ ): ?>
								<?php foreach( $marquee as $logo ): ?>
									<div class="marquee-item inline-block align-middle px-7">
										<img src="<?php echo $logo['logo']; ?>" alt="<?php echo $logo['name']; ?>" />
									</div>
								<?php endforeach; ?>
							<?php endfor; ?>
						</div>
				</div>
			</div>
		</div>

	</section>

</section>

<!-- Main banner -->

<!-- BEGIN PARADIGM SHIFT -->


<?php 

$statistics = get_field('statistics');

if($statistics):
?>

<section class="section relative w-full pt-s10 lg:pt-s12 bg-neutral-nude">
	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s4 md:pb-s6">
			<h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1">
				<span class="block col-span-12">
					<?php echo $statistics['title_first_line']; ?>
				</span>
				<span class="block col-span-10 col-start-3 row-start-2">
					<?php echo $statistics['title_second_line']; ?>
				</span>
			</h2>
			<p class="col-start-1 col-span-12 md:col-start-5 md:col-span-7 lg:col-span-7 lg:col-start-6 body-2">
			<?php echo $statistics['resume']; ?>
		</div>
		<!-- Title -->


		<div class="grid grid-cols-12 gap-x-s2 gap-y-s7 md:gap-y-s9 lg:py-s6 pt-s4 md:pt-0">
			
			<?php 
				foreach($statistics['data_list'] as $item): 
			?>
			<div class="col-span-12 md:col-span-6 lg:col-span-4">
				<div class="grid grid-cols-6 gap-y-s2 lg:gap-y-s6 gap-x-s2">
					<div class="flex flex-col items-center justify-center col-start-1 col-span-1">
						<img class="w-s5 md:min-w-s8 h-s4 md:h-s8 aspect-square" src="<?php echo $item['icon'] ?>" alt="<?php echo $item['title'] ?>" />
					</div>
					<h3 class="heading-2 col-start-2 col-span-5 lg:col-span-5"><?php echo $item['title'] ?></h3>
					<p class="body-2 col-span-5 lg:col-span-5 col-start-2 row-start-2"><?php echo $item['resume'] ?></p>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
		<!-- Items -->

</section>

<section class="relative section w-full pt-s7 md:pt-s8 lg:pt-0 pb-s10 md:pb-s10 lg:pb-s12 bg-neutral-nude">
	<div class="container mx-auto">
		<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s5 md:gap-y-s4 lg:gap-y-s6">
			<p class="col-span-6 md:col-span-8 lg:col-span-8 col-start-2 md:col-start-3 lg:col-start-4 md:pt-s4 lg:pt-0 md:pb-s4 lg:pb-0 body-2"><?php echo $statistics['resume_testimonial']; ?></p>
			<div class="col-span-6 md:col-span-7 lg:col-span-4 md:col-start-6 lg:col-start-6 flex items-center justify-start pt-s3 md:pt-0">
				<img class="max-w-[145px] md:max-w-full" src="<?php echo $statistics['photo_testimonial']; ?>" alt="<?php echo $statistics['name_testimonial']; ?>" />
				<div class="flex flex-col pl-s2 md:pl-s6 lg:pl-s2 md:pr-s3 lg:pr-0 gap-s2">
					<h4 class="heading-3 text-neutral-dgray w-full md:max-w-[195px]"><?php echo $statistics['name_testimonial']; ?></h4>
					<p class="body-3"><?php echo $statistics['position_testimonial']; ?></p>
				</div>
			</div>
			<div class="col-span-6 md:col-span-10 lg:col-span-11 md:col-start-2 lg:col-start-2 lg:pb-s10">
				<?php foreach($statistics['relation_items'] as $key => $item): ?>
				<div class="body-4 flex items-center justify-start gap-2"><?php echo $key+1; ?>. <?php echo $item['list_relations'] ?></div>
				<?php endforeach; ?>
			</div>
		</div>
  </div>
</section>
<?php endif; ?>

<!-- END PARADIGM SHIFT -->

<?php
	// Fields what we do

	$what_title_tag = get_field('what_title_tag');
	$what_main_title = get_field('what_main_title');
	$what_first_description = get_field('what_first_description');
	$what_second_description = get_field('what_second_description');
	$text_cta_request_a_demo = get_field('text_cta_request_a_demo');
	$link_request_a_demo = get_field('link_request_a_demo');
	$text_cta_learn_more = get_field('text_cta_learn_more');
	$link_learn_more = get_field('link_learn_more');
?>
<section class="what-we-do-home relative z-10 section w-full pt-s10 md:pt-s16 lg:pt-s20 pb-s14 lg:pb-s12 -mt-s10 lg:-mt-s12 bg-cover bg-no-repeat bg-center bg-what-we-do-mobile md:bg-what-we-do-tablet lg:bg-what-we-do-desktop bg-transparent">

	<div class="container mx-auto md:pt-s14 lg:pt-s14 lg:pb-s14">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6">

			<h4 class="col-span-12 md:col-span-12 col-start-1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-nwhite uppercase"><?php echo $what_title_tag; ?></h4>
			<h2 class="col-span-12 md:col-span-11 lg:col-span-11 col-start-1 text-h2Mobile md:text-h2Tablet lg:text-h2 text-neutral-nwhite"><?php echo $what_main_title; ?></h2>
			<p class="col-span-12 md:col-span-6 lg:col-span-4 lg:col-start-4 text-neutral-nwhite text-b2"><?php echo $what_first_description; ?></p>
			<p class="col-span-12 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-8 text-neutral-nwhite text-b2"><?php echo $what_second_description; ?></p>
			<div class="col-span-12 lg:col-span-3 lg:col-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_request_a_demo; ?>" class="btn-secondary-inverted"><?php echo $text_cta_request_a_demo; ?></a>
				<a href="<?php echo $link_learn_more; ?>" class="btn-tertiary-white"><?php echo $text_cta_learn_more; ?></a>
			</div>

		</div>

	</div>

</section>

<!-- What we do -->


<?php
// Fields why accumulus

$why_title_tag = get_field('why_title_tag');
$why_first_line_title = get_field('why_first_line_title');
$why_second_line_title = get_field('why_second_line_title');
$why_values = get_field('why_values');

?>


<section class="relative section w-full pt-s12 md:pt-s10 lg:pb-s12">

	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-0 pb-s10 lg:pb-s8">
			<h4 class="col-span-12 md:col-span-12 col-start-1 pb-s6 heading-4 uppercase"><?php echo $why_title_tag; ?></h4>
			<h2 class="col-span-12 heading-1 grid grid-cols-12">
				<span class="col-span-12"><?php echo $why_first_line_title; ?></span>
				<span class="col-span-10 col-start-2 lg:col-start-3"><?php echo $why_second_line_title; ?></span>
			</h2>
		</div>
		
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

<!-- Why accumulus -->


<!-- Quote -->
<?php 
$quote_home = get_field('quote_home');
if($quote_home):
?>
<section class="relative section py-s10 lg:py-s20 bg-quote-home-mobile md:bg-quote-home-tablet lg:bg-quote-home-desktop bg-no-repeat bg-cover bg-center">
	<div class="container max-w-[1170px] mx-auto">
			<h2 class="heading-2"><?php echo $quote_home['resume'] ?></h2>
	</div>
</section>
<?php 
	endif;
?>
<!-- End quote -->


<!-- How it works -->

<?php 
$how_it_works = get_field('how_it_works');

if($how_it_works):
?>
<section class="relative section py-s8 md:py-s12 lg:py-s10 bg-secondary-carbon ">
	<div class="container mx-auto">
		<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s5 md:gap-y-s6 lg:gap-y-s13 text-neutral-nwhite">
			<h2 class="col-span-6 md:col-span-12 heading-2"><?php echo $how_it_works['title']; ?></h2>

			<div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s4">

				<div class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 flex flex-col">
						<?php foreach($how_it_works['steps'] as $key => $value): ?>
						<h3 class="heading-3"><?php echo $key+1; ?>. <?php echo $value['title']; ?></h3>
						<?php endforeach; ?>
				</div>

				<p class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2"><?php echo $how_it_works['resume']; ?></p>

				<div class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 grid grid-cols-12 gap-x-s2 lg:gap-x-s10 gap-y-s7">

					<?php 
						foreach($how_it_works['how_it_works_list'] as $value): 
					?>
					<div class="col-span-12 md:col-span-6">
						<div class="grid grid-cols-6 gap-y-s2 lg:gap-y-s6 gap-x-s2">
							<div class="col-span-1 col-start-1 flex flex-col items-start">
								<img class="min-w-[55px] md:min-w-[64px] aspect-square" src="<?php echo $value['icon'] ?>" alt="Icon" />
							</div>
							<p class="col-span-5 lg:col-span-5 col-start-2 body-2 pl-s2 md:pl-0"><?php echo $value['description']; ?></p>
						</div>
					</div>
					<?php endforeach; ?>	
				</div>

				<div class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 pt-s5 md:pt-s8 lg:pt-s3 flex flex-col lg:flex-row items-center justify-center gap-s3 md:gap-s4 lg:gap-s2">
					<a href="<?php echo $how_it_works['link_cta_request_a_demo']; ?>" class="btn-secondary-inverted"><?php echo $how_it_works['text_cta_request_a_demo']; ?></a>
					<a href="<?php echo $how_it_works['link_cta_learn_more']; ?>" class="btn-tertiary-white"><?php echo $how_it_works['text_cta_learn_more']; ?></a>
				</div>

				<div class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 pt-s4 md:pt-s1 lg:pt-s6">
					<p class="body-4"><?php echo $how_it_works['note']; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- End How it works -->


<!-- Testimonials -->


<?php
  get_template_part(
    'template-parts/component/content',
    'single-testimonial'
  );
?>

<!-- End Testimonials -->

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

<!-- Events carousel -->

<?php
  get_template_part(
    'template-parts/content',
    'careers-footer'
  );
?>


<!-- Form Module -->
<?php
  get_template_part(
    'template-parts/content',
    'form-module'
  );
?>
<!-- End form module -->