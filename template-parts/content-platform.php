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
	$main_banner = get_field('main_banner');
?>

<?php if($main_banner): ?>
<section class="relative section w-full pt-s3 md:pt-s14 lg:pt-52 2xl:pt-60 pb-s10 md:pb-s12 lg:pb-s12 text-neutral-dgray bg-neutral-white">

	<picture class="absolute top-0 left-0 w-full h-full -z-[1]">
		<source media="(min-width:1024px)" srcset="<?php echo $main_banner['bg_image_desktop']; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $main_banner['bg_image_tablet']; ?>">
		<img src="<?php echo $main_banner['bg_image_mobile']; ?>" alt="<?php echo $main_banner['title']; ?>" class="w-full h-full">
	</picture>

	<div class="container mx-auto z-10">

		<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">

      <h4 class="col-span-6 md:col-span-12 lg:row-start-1 heading-4 uppercase"><?php echo $main_banner['flag_title']; ?></h4>

			<h1 class="col-span-5 md:col-span-12 lg:col-span-7 lg:row-start-2 heading-1"><?php echo $main_banner['title']; ?></h1>

      <div class="col-span-6 md:col-span-12 lg:absolute lg:right-0 flex justify-end">
				<picture class="relative max-lg:max-w-[75%] max-md:max-w-full">
					<source media="(min-width:1025px)" srcset="<?php echo $main_banner['image']; ?>">
					<source media="(min-width:768px)" srcset="<?php echo $main_banner['image_tablet']; ?>">
					<img src="<?php echo $main_banner['image_mobile']; ?>" alt="<?php echo $main_banner['title']; ?>" class="w-full h-full">
				</picture>
        <!-- <img class="relative" src="<?php //echo $main_banner['image']; ?>" alt="<?php //echo $main_banner['title']; ?>" /> -->
      </div>

			<div class="col-span-6 md:col-span-6 lg:col-span-4 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2"><?php echo $main_banner['first_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-5 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2"><?php echo $main_banner['second_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-12 lg:row-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $main_banner['link_cta']; ?>" class="btn-secondary">Get Started</a>
			</div>

		</div>
	</div>

</section>
<?php endif; ?>

<!-- Main banner -->


<?php 

$video = get_field('video');

?>

<?php if($video): ?>
<section class="relative section w-full md:pt-s12 md:pb-s12 lg:pt-s16 lg:pb-s16">
  <div class="container mx-auto video-container">
    <?php echo $video; ?>
  </div>
</section>
<?php endif; ?>

<!-- Video -->


<?php 

$value_propositions = get_field('value_propositions');

?>

<section class="relative section w-full pt-s12 md:pt-s12 lg:pb-s12">

	<div class="container mx-auto">
    <?php if($value_propositions) : ?>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-0 pb-s10 lg:pb-s16 lg:mb-s2">
			<h4 class="col-span-12 md:col-span-12 col-start-1 pb-s6 heading-4 uppercase"><?php echo $value_propositions['flag_title']; ?></h4>
			<h2 class="col-span-12 grid grid-cols-12 heading-1 gap-4 !font-normal">
        <span class="col-span-12 "><?php echo $value_propositions['title_first_line']; ?></span>
        <span class="col-span-12"><?php echo $value_propositions['title_second_line']; ?></span>
        <span class="col-span-10 lg:col-span-9 col-start-2 lg:col-start-3"><?php echo $value_propositions['title_third_line']; ?></span>
      </h2>
		</div>
    <?php endif; ?>
		
		<?php
			// Values view

			$values_row = get_field('values_row');

			$i = 0;		
			
			foreach($values_row as $row) :
				$i++;

				if($i % 2 == 1): 	
			?>

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 lg:pb-s12 last-of-type:lg:!pb-0">
					<div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col items-start gap-s3">

						<?php  foreach($row['card_item'] as $card) : ?>

							<?php if($card['acf_fc_layout'] == 'title') : ?>
								<h3 class="text-h3Mobile md:text-h3Tablet lg:text-h3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="body-2"><?php echo $card['description']; ?></p>
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
								<p class="body-2"><?php echo $card['description']; ?></p>
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

<!-- Values -->


<?php 
	$key_features = get_field('key_features');
?>

<?php if($key_features): ?>
<section class="relative section w-full pt-s8 md:pt-s12 pb-s8 md:pb-s6 lg:pb-s12 bg-neutral-nude">
	<div class="container mx-auto">
		<div class="grid grid-cols-12 gap-x-s2 gap-y-0 pb-s7">
			<h4 class="col-span-12 md:col-span-12 col-start-1 heading-4 uppercase">KEY FEATURES
			</h4>
		</div>

		<div class="key-features">
			<?php
				// Values view

				$values_row = $key_features['slider_items'];
				foreach($values_row as $row) :
			?>

					<div class="key-features__item relative">
						<div class="grid grid-cols-12 gap-x-s2 gap-y-s4  md:gap-y-s6 lg:gap-y-0 lg:pb-s12 last-of-type:lg:!pb-0">
							<div class="col-span-12 md:col-span-6 lg:col-span-7">
	
								<?php foreach($row['slide_item'] as $card) : ?>
	
									<?php if ($card['acf_fc_layout'] == 'image') : ?>
										<img src="<?php echo $card['image']; ?>" class="max-lg:h-full"  />
									<?php endif; ?>
	
								<?php endforeach; ?>
	
							</div>
							<div class="col-span-12 md:col-span-6 lg:col-start-8 flex flex-col items-start gap-s2">
	
								<?php foreach($row['slide_item'] as $card) : ?>
	
									<?php if($card['acf_fc_layout'] == 'title') : ?>
										<h3 class="heading-3"><?php echo $card['title']; ?></h3>
									<?php endif; ?>
	
									<?php if($card['acf_fc_layout'] == 'description'): ?>
										<p class="body-2"><?php echo $card['description']; ?></p>
									<?php endif; ?>
									
									<?php if($card['acf_fc_layout'] == 'bullet_list'): ?>
										<ul class="flex flex-col gap-2 body-3">
	
											<?php foreach($card['bullet_list'] as $item): ?>
											<li class="relative body-3 pl-3">
												<span class="absolute left-0 top-2 block w-1 h-1 aspect-square bg-neutral-dgray rounded-full"></span>
												<?php echo $item['item']; ?>
											</li>
											<?php endforeach; ?>
	
										</ul>
									<?php endif; ?>
	
									<?php if($card['acf_fc_layout'] == 'cta'): ?>
										<a class="btn-secondary mt-s6 max-lg:hidden" href="<?php echo $card['link']; ?>"><?php echo $card['text_link']; ?></a>
									<?php endif; ?>
									
									<?php endforeach; ?>
									
							</div>
							<div class="col-span-12 max-md:pt-s1 lg:hidden">
								<?php foreach($row['slide_item'] as $card) : ?>
										<?php if($card['acf_fc_layout'] == 'cta'): ?>
											<a class="btn-secondary" href="<?php echo $card['link']; ?>"><?php echo $card['text_link']; ?></a>
										<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
						
			<?php
				endforeach;
			?>
		</div>
		<div class="relative flex lg:grid lg:grid-cols-12 gap-4 lg:-mt-14 pt-s6 lg:pt-0">
			<div class="flex items-center justify-center w-full lg:justify-start gap-4 lg:col-span-5 lg:col-start-8">
				<div class="prev-key cursor-pointer">
					<img class="block w-[54px] h-[54px] aspect-square rotate-180" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
				</div>
				<div class="next-key cursor-pointer">
					<img class="block w-[54px] h-[54px] aspect-square" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
				</div>
			</div>
		</div>

	</div>
</section>
<?php endif; ?>


<?php 

  // Fields from testimonial

  $testimonial_platform = get_field('testimonial_platform');

?>

<?php if($testimonial_platform) : ?>
<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 bg-neutral-nwhite">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6">
      <div class="col-span-6 md:col-span-7 lg:col-span-6 md:col-start-6 lg:col-start-6 lg:pl-s6 flex items-center justify-between">
        <img class="max-w-[145px] md:max-w-full rounded-large" src="<?php echo $testimonial_platform['image']; ?>" alt="<?php echo $testimonial_platform['name']; ?>" />
        <div class="flex flex-col pl-s2 gap-s2">
          <h4 class="heading-3 text-neutral-dgray w-full md:max-w-[195px]"><?php echo $testimonial_platform['name']; ?></h4>
          <p class="body-3"><?php echo $testimonial_platform['position']; ?></p>
        </div>
      </div>
      <h2 class="col-span-6 md:col-span-10 lg:col-span-9 heading-2 text-neutral-dgray">
      <?php echo $testimonial_platform['testimonial']; ?>
      </h2>
      <p class="col-span-5 md:col-span-8 md:col-start-3 text-b1Mobile md:text-b1Tablet lg:text-b1"><?php echo $testimonial_platform['resume_text']; ?></p>
    </div>
  </div>
</section>
<?php endif; ?>
<!-- Testimonial -->

<?php 
  $benefits = get_field('benefits');

  if($benefits) :
?>
<section class="relative section w-full pt-s8 md:pt-s12 pb-s8 md:pb-s12 bg-primary-glaciar bg-benefits-mobile md:bg-benefits-tablet lg:bg-benefits-desktop bg-cover bg-no-repeat bg-left-bottom">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s4">

      <h4 class="col-span-6 md:col-span-12 heading-4 uppercase"><?php echo $benefits['title_flag']; ?></h4>

      <h2 class="col-span-6 md:col-span-12 lg:col-span-4 heading-2 pt-s2 lg:pt-0"><?php echo $benefits['title']; ?></h2>
			
			<div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 pt-s16 lg:pt-s20 md:pb-s10 lg:pb-0">
				<p class="body-2"><?php echo $benefits['resume']; ?></p>
			</div>

      <div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 flex flex-col lg:flex-row pt-s1 md:pt-s20 lg:pt-s4">
				<a href="<?php echo $benefits['link_cta']; ?>" class="btn-secondary">CTA</a>
			</div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Benefits -->




