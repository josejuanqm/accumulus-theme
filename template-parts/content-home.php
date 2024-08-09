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
	$link_learn_more = get_field('link_learn_more');
	$marquee = get_field('marquee_images');
?>

<section class="section w-full pb-s12 md:pb-s7 lg:pb-s12 bg-cover bg-no-repeat bg-center bg-neutral-offwhite" style="background-image: url(<?php echo $bg_image_main ?>)">

	<div class="container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

			<h4 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1"><?php echo $main_title; ?></h1>

			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="text-b2 md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_learn_more; ?>" class="btn-secondary">Get started</a>
				<a href="#" class="btn-tertiary">
					<svg width="16" height="16" viewBox="0 0 16 16" class="fill-inherit mr-2">
						<path d="M13.6407 0.393555H1.73275C0.79347 0.393555 0.03125 1.15578 0.03125 2.09505V15.7045H1.73275V2.09505H13.6407V14.003H3.433V15.7045H13.6407C14.58 15.7045 15.3422 14.9423 15.3422 14.003V2.09505C15.3422 1.15578 14.58 0.393555 13.6407 0.393555Z" class="fill-inherit" />
						<path d="M6.72573 5.04395V5.05525H5.4248V11.1091H6.64411L10.3548 8.6353V7.46372L6.72573 5.04395ZM7.05724 7.22638L8.29161 8.04888L7.05724 8.87138V7.22513V7.22638Z" class="fill-inherit" />
					</svg>
					About Accumulus
				</a>
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

<?php
	// Fields what we do

	$what_title_tag = get_field('what_title_tag');
	$what_main_title = get_field('what_main_title');
	$what_first_description = get_field('what_first_description');
	$what_second_description = get_field('what_second_description');
	$what_link_about = get_field('what_link_about');
?>
<section class="relative z-10 section w-full md:pt-s10 lg:pt-s11 pb-s14 lg:pb-s12 -mt-s10 lg:-mt-s12 bg-contain bg-no-repeat bg-center bg-what-we-do-mobile md:bg-what-we-do-tablet lg:bg-what-we-do-desktop bg-primary-violet">

	<div class="container mx-auto md:pt-s14 lg:pt-s14 lg:pb-s14">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6">

			<h4 class="col-span-12 md:col-span-12 col-start-1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-nwhite uppercase"><?php echo $what_title_tag; ?></h4>
			<h2 class="col-span-12 md:col-span-11 lg:col-span-11 col-start-1 text-h2Mobile md:text-h2Tablet lg:text-h2 text-neutral-nwhite"><?php echo $what_main_title; ?></h2>
			<p class="col-span-12 md:col-span-6 lg:col-span-4 lg:col-start-4 text-neutral-nwhite text-b2"><?php echo $what_first_description; ?></p>
			<p class="col-span-12 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-8 text-neutral-nwhite text-b2"><?php echo $what_second_description; ?></p>
			<div class="col-span-12 lg:col-span-3 lg:col-start-4">
				<a href="<?php echo $what_link_about; ?>" class="btn-tertiary-white">A Case for Change</a>
			</div>

		</div>

	</div>

</section>

<!-- What we do -->

<!-- BEGIN PARADIGM SHIFT -->
 <section class="section relative w-full py-s6 bg-neutral-nude">
		<div class="container mx-auto">
			<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:py-s6 md:py-s8">
				<h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1">
					<span class="block col-span-12">
						A Needed
					</span>
					<span class="block col-span-10 col-start-3 row-start-2">
						Paradigm Shift
					</span>
				</h2>
				<p class="col-start-1 col-span-12 md:col-start-5 md:col-span-7 lg:col-span-7 lg:col-start-6 body-2">
					Bringing an approved drug to market is inefficient and expensive.
				</p>
			</div>
			<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s8 lg:py-s6 pt-s4 md:pt-0">
				<?php
					for ($i=0; $i < 3; $i++) { 
						?>
						<div class="col-span-12 md:col-span-6 lg:col-span-4">
							<div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2">
								<div class="flex flex-col items-center justify-center col-start-1 col-span-1">
									<svg class="w-s4 md:w-s8 h-s4 md:h-s8 aspect-square" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.03125" y="0.172852" width="64" height="64" rx="10.9714" fill="#E5E5E5"/>
										<path d="M32.5312 48.1696C41.0919 48.1696 48.0312 41.2302 48.0312 32.6696C48.0312 31.9178 47.9757 31.1791 47.8711 30.4567H43.2296C43.3767 31.1725 43.4551 31.9113 43.4551 32.6696C43.4551 38.6937 38.5554 43.5935 32.5312 43.5935C26.5071 43.5935 21.6074 38.6937 21.6074 32.6696C21.6074 27.4038 25.35 22.9976 30.3151 21.9712V34.8825H39.1699V30.4534H34.7409V17.1729H32.528C31.7762 17.1729 31.0375 17.2284 30.3151 17.333C22.8037 18.4084 17.0312 24.864 17.0312 32.6729C17.0312 41.2335 23.9706 48.1728 32.5312 48.1728V48.1696Z" fill="#444444"/>
									</svg>
								</div>
								<h3 class="heading-2 col-start-2 col-span-1">
								13 Years
								</h3>
								<p class="body-2 col-start-2 col-span-1 row-start-2">
								It takes 13 years (on average) to bring a new drug to market after its initial discovery.¹
								</p>
							</div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
 </section>
<!-- END PARADIGM SHIFT -->

<?php get_template_part( 
	'template-parts/content', 
	'quote', 
	array( 
		'bg_color' => 'bg-neutral-nude',
		'main_quote' => 'It’s time for more sustainable and scalable collaboration and information exchange between life sciences organizations and global health authorities. It’s time for a moonshot!',
		'sub_quote' => '“Filing a New Drug Application may have shifted from driving a truckload of paper to the relevant regulatory authority to FedEx-ing a CD-ROM to uploading a set of PDFs through the Electronic Submissions Gateway, but the underlying processes remain little changed. It’s long past time to play catchup.”',
		'author' => 'Francisco Nogueira',
		'position' => 'Chief Executive Officer, at Accumulus Synergy',
		'image' => 'https://via.placeholder.com/224',
		'references' => array(
			'1' => 'The Pharmaceutical Industry in Figures, EFPIA, 2022. Available here',
			'2' => 'Nurturing growth: measuring the return from pharmaceutical innovation 2023. Deloitte. Available here',
		),
	)
); ?>

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

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 lg:pb-s12">
					<div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col items-start gap-s3">

						<?php  foreach($row['card_item'] as $card) : ?>

							<?php if($card['acf_fc_layout'] == 'title') : ?>
								<h3 class="text-h3Mobile md:text-h3Tablet lg:text-h3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="text-b2"><?php echo $card['description']; ?></p>
							<?php endif; ?>
							
							<?php if($card['acf_fc_layout'] == 'bullet_list'): ?>
								<ul class="flex flex-col gap-2 text-b3Mobile md:text-b3Tablet lg:text-b3">

									<?php foreach($card['bullet_list'] as $item): ?>
									<li class="relative pl-3">
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

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 lg:pb-s12 last-of-type:lg:!pb-0">
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
								<h3 class="text-h3Mobile md:text-h3Tablet lg:text-h3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="text-b2"><?php echo $card['description']; ?></p>
							<?php endif; ?>
							
							<?php if($card['acf_fc_layout'] == 'bullet_list'): ?>
								<ul class="flex flex-col gap-2 text-b3Mobile md:text-b3Tablet lg:text-b3">

									<?php foreach($card['bullet_list'] as $item): ?>
									<li class="relative pl-3">
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

<?php get_template_part( 
	'template-parts/content', 
	'quote', 
	array( 
		'inverted' => true,
		'bg_color' => 'bg-neutral-white',
		'main_quote' => '“The prospect of streamlining the regulatory approval process…holds immense promise.”',
		'sub_quote' => '“This advancement could potentially expedite access to cutting-edge medicines by nearly two years…”',
		'author' => 'Ralf Altenburger',
		'position' => 'Senior Vice President, Cell and Gene Therapy and Global Head of Pharma Technical Regulatory at Roche',
		'image' => 'https://via.placeholder.com/224'
	)
); ?>


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
