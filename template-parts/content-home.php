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

<section class="section w-full pt-s11 lg:pt-s8 pb-s12 md:pb-s7 lg:pb-s12 bg-cover bg-no-repeat bg-center" style="background-image: url(<?php echo $bg_image_main ?>)">

	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">

			<h4 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1"><?php echo $main_title; ?></h1>

			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="text-b2 md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_learn_more; ?>" class="btn-secondary">Lear more</a>
				<a href="#" class="btn-tertiary">About Accumulus</a>
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
				<a href="<?php echo $what_link_about; ?>" class="btn-tertiary-white">About Accumulus</a>
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
			<h4 class="col-span-12 md:col-span-12 col-start-1 pb-s6 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase"><?php echo $why_title_tag; ?></h4>
			<h2 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1"><?php echo $why_first_line_title; ?></h2>
			<h2 class="col-span-10 col-start-2 lg:col-start-3 text-h1Mobile md:text-h1Tablet lg:text-h1"><?php echo $why_second_line_title; ?></h2>
		</div>
		
		<?php 
			$i = 0;		
			foreach($why_values as $value): 
			$i++;
		?>

		<?php if($i % 2 == 1): ?>

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 lg:pb-s12" data-i="<?php echo $i; ?>">
			<div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col gap-s3">
				<h3 class="text-h3Mobile md:text-h3Tablet lg:text-h3"><?php echo $value['title']; ?></h3>
				<p class="b2"><?php echo $value['description']; ?></p>
			</div>
			<div class="row-start-1 col-span-12 md:col-span-6 md:col-start-7">
				<img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" />
			</div>
		</div>
		<!-- text left - img right -->

		<?php else: ?>

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 lg:pb-s12 last-of-type:lg:!pb-0"  data-i="<?php echo $i; ?>">
			<div class="col-span-12 md:col-span-6">
				<img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" />
			</div>
			<div class="col-span-12 md:col-span-5 lg:col-span-4 md:col-start-8 lg:col-start-8 flex flex-col gap-s3">
				<h3 class="text-h3Mobile md:text-h3Tablet lg:text-h3"><?php echo $value['title']; ?></h3>
				<p class="b2"><?php echo $value['description']; ?></p>
			</div>
		</div>
		<!-- img left - text right -->

		<?php endif; ?>

		<?php endforeach; ?>

	</div>

</section>

<!-- Why accumulus -->

<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-secondary-lilac">
	<div class="container mx-auto">
		<div class="flex flex-col gap-s8">
			<h2 class="w-full text-h2Mobile md:text-h2Tablet lg:text-h2">Related Resources</h2>
			<div class="relative w-full">
				<div class="related">
					<?php for($i=1;$i<7;$i++): ?>
						<div class="card relative w-full max-w-[370px] rounded-card overflow-hidden mx-2">
							<a href="#" class="absolute top-0 left-0 w-full h-full z-10"></a>
							<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url(<?php bloginfo('template_url'); ?>/images/home/thumb-slider.png)">
								<img src="<?php bloginfo('template_url'); ?>/images/home/mini-logo.png" />
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
								<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray">Lorem Ipsum Dolor Lorem Ipsum Dolor</h3>
							</div>
						</div>
						<?php endfor; ?>
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

<!-- Related resources -->