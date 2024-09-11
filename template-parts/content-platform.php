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

$platform_row = get_field('platform');

foreach($platform_row as $row) :

?>

<!-- Main banner -->

<?php if($row['acf_fc_layout'] == 'main_banner_layout') : ?>

<section class="translucent-navigation relative section w-full pb-s10 md:pb-s12 lg:pb-s12 text-neutral-dgray bg-neutral-white md:overflow-hidden">

	<picture class="absolute top-0 left-0 w-full h-full -z-[1]">
		<source media="(min-width:1024px)" srcset="<?php echo $row['main_banner']['bg_image_desktop']; ?>">
		<source media="(min-width:768px)" srcset="<?php echo  $row['main_banner']['bg_image_tablet']; ?>">
		<img src="<?php echo  $row['main_banner']['bg_image_mobile']; ?>" alt="<?php echo  $row['main_banner']['title']; ?>" class="w-full h-full">
	</picture>

	<div class="container mx-auto z-10 pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

			<h4 class="col-span-6 md:col-span-12 lg:row-start-1 heading-4 uppercase"><?php echo  $row['main_banner']['flag_title']; ?></h4>

			<h1 class="col-span-5 md:col-span-12 lg:col-span-8 lg:row-start-2 heading-1"><?php echo  $row['main_banner']['title']; ?></h1>

			<div class="col-span-6 md:col-span-12 lg:absolute lg:-right-[80px] xl:right-0 flex justify-end">
				<picture class="relative max-lg:max-w-[75%] max-md:max-w-full">
					<source media="(min-width:1025px)" srcset="<?php echo  $row['main_banner']['image']; ?>">
					<source media="(min-width:768px)" srcset="<?php echo  $row['main_banner']['image_tablet']; ?>">
					<img src="<?php echo  $row['main_banner']['image_mobile']; ?>" alt="<?php echo  $row['main_banner']['title']; ?>" class="w-full h-full">
				</picture>
			</div>

			<div class="col-span-6 md:col-span-6 lg:col-span-4 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 md:pt-s2 lg:pt-0">
				<p class="body-2"><?php echo  $row['main_banner']['first_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-5 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 md:pt-s2 lg:pt-0">
				<p class="body-2"><?php echo  $row['main_banner']['second_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-12 lg:row-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">

				<?php if($row['main_banner']['text_first_cta'] !== ''): ?>
				<a href="<?php echo  $row['main_banner']['link_first_cta']; ?>" class="btn-secondary"><?php echo  $row['main_banner']['text_first_cta']; ?></a>
				<?php endif; ?>

				<?php if($row['main_banner']['text_second_cta'] !== ''): ?>
				<a href="<?php echo  $row['main_banner']['link_second_cta']; ?>" class="btn-tertiary"><?php echo  $row['main_banner']['text_second_cta']; ?></a>
				<?php endif; ?>

			</div>

		</div>
	</div>

</section>

<?php endif; ?>

<!-- end Main banner -->


<!-- Mission challenges and Better way -->

<?php if($row['acf_fc_layout'] == 'mission_challenges_layout'): ?>

<section class="relative section w-full pt-s12 md:pt-s10 lg:pb-s6 bg-neutral-nude">
	<div class="container mx-auto">
		
		<?php if($row['acf_fc_layout'] == 'mission_challenges_layout') : ?>
			<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s4 md:gap-y-s6">

				<h2 class="heading-1 font-normal col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s2 lg:pb-s1">
					<span class="col-span-6 md:col-span-12">
						<?php echo $row['mission_challenges']['title_first_row']; ?>
					</span>
					<span class="col-span-6 md:col-span-10 lg:col-span-10 col-start-2 md:col-start-2 lg:col-start-2">
						<?php echo $row['mission_challenges']['title_second_row']; ?>
					</span>
				</h2>

				<p class="body-2 col-span-6 md:col-span-7 md:col-start-5 lg:col-span-6 lg:col-start-6 pb-s2 lg:pb-s6"><?php echo $row['mission_challenges']['resume']; ?></p>

				<div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-y-s6 md:gap-y-s8">

					<?php foreach($row['mission_challenges']['list_items'] as $item) : ?>
					<div class="col-span-6 md:col-span-7 lg:col-span-5 col-start-1 md:col-start-5 lg:col-start-6 flex items-start gap-s2">
						<img class="w-[39px] md:w-[64px] aspect-square" src="<?php echo esc_url($item['icon']); ?>" alt="<?php echo $item['title']; ?>" />
						<div class="description-wysiwyg  w-auto">
							<h3 class="heading-3"><?php echo $item['title']; ?></h3>
						</div>
					</div>
					<?php endforeach; ?>

				</div>

			</div>
		<?php endif; ?>
		
		</div>
</section>

<?php endif; ?>


<?php if( $row['acf_fc_layout'] == 'better_way_layout'): ?>

<section class="relative section w-full pt-s10 md:pt-s12 pb-s10 bg-neutral-nude">
	<div class="container mx-auto">

		<?php if($row['acf_fc_layout'] == 'better_way_layout') : ?>
			<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s4">

				<h2 class="heading-1 font-normal col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s2 lg:pb-s1">
					<span class="col-span-6 md:col-span-12">
						<?php echo $row['better_way']['title_first_row']; ?>
					</span>
					<span class="col-span-6 md:col-span-10 lg:col-span-10 col-start-2 md:col-start-2 lg:col-start-2">
						<?php echo $row['better_way']['title_second_row']; ?>
					</span>
				</h2>

				<p class="body-2 col-span-6 md:col-span-7 md:col-start-5 lg:col-span-6 lg:col-start-6 pb-s2 md:pb-s2 lg:pb-s6">
					<?php echo $row['better_way']['resume']; ?>
				</p>

				<div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-y-s6 md:gap-y-s8">
					<?php foreach($row['better_way']['list_items'] as $item) : ?>
					<div class="col-span-6 md:col-span-4 lg:col-span-4 flex items-start gap-s2">
						<img class="w-[39px] md:w-[64px] aspect-square" src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>" />
						<div class="description-wysiwyg w-auto">
							<h3 class="heading-7"><?php echo $item['title']; ?></h3>
						</div>
					</div>
					<?php endforeach; ?>
				</div>

			</div>
		<?php endif; ?>
		
		</div>
</section>

<?php endif; ?>

<!-- end Mission challenges and Better way -->


<!-- Statistics -->

<?php if($row['acf_fc_layout'] == 'case_study_layout') : ?>

<section class="section relative w-full py-s10 bg-secondary-aqua flex flex-col gap-s9">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:py-s6 md:py-s8">
      <h4 class="col-span-12 heading-4 uppercase"><?php echo $row['case_study']['eyebrown']; ?></h4>
      <h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1">
        <span class="block col-span-12">
					<?php echo $row['case_study']['title_first_row']; ?>
        </span>
        <span class="block col-span-12">
					<?php echo $row['case_study']['title_second_row']; ?>
        </span>
      </h2>
    </div>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s8 lg:py-s6 pt-s4 md:pt-0">

			<?php 
				$i = 0;
				foreach($row['case_study']['list_items'] as $row): 
				$i++;
			?>
				<?php if($i % 2 == 1): ?>
					<div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-5 lg:col-start-1">
						
						<div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
							<div class="flex flex-col items-center justify-center col-start-1 col-span-1">
								<img class="w-[55px] lg:w-[64px]" src="<?php echo $row['icon']; ?>" alt="<?php echo $row['title']; ?>" />
							</div>
							<h3 class="heading-2 col-start-2 col-span-1">
								<?php echo $row['title']; ?>
							</h3>
							<div class="col-start-2 col-span-1 row-start-2">
								<p class="body-2 lg:max-w-[368px]">
									<?php echo $row['resume']; ?>
								</p>
							</div>
						</div>

					</div>
				<?php else : ?>
					<div class="col-span-12 md:col-span-10 lg:col-span-7 md:col-start-2 lg:col-start-7">
						<div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
							<div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
								<img class="w-[55px] lg:w-[64px]" src="<?php echo $row['icon']; ?>" alt="<?php echo $row['title']; ?>" />
							</div>
							<h3 class="heading-2 col-start-2 col-span-1">
								<?php echo $row['title']; ?>
							</h3>
							<div class="col-start-2 col-span-1 row-start-2">
								<p class="body-2 lg:max-w-[368px]">
									<?php echo $row['resume']; ?>
								</p>
							</div>
						</div>
					</div>
			<?php endif; ?>
			<?php 
				endforeach; 
			?>
    </div>
  </div>

  <div class="flex flex-col items-center text-center justify-stretch md:justify-normal gap-s4">
    <a href="#" class="btn btn-tertiary">Learn more</a>
  </div>
</section>

<?php endif; ?>

<!-- End statics -->


<!-- Key features -->

<?php if($row['acf_fc_layout'] == 'key_features_layout') : ?>

<section class="relative section py-s8 md:py-s12 lg:py-s10 bg-primary-violet ">
	<div class="container mx-auto">
		<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s5 md:gap-y-s6 lg:gap-y-s13 text-neutral-nwhite">
			<h2 class="col-span-6 md:col-span-12 heading-2"><?php echo $row['key_features']['title']; ?></h2>

			<div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s4">

				<div class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 grid grid-cols-12 gap-x-s2 lg:gap-x-s10 gap-y-s7">

					<?php 
						foreach($row['key_features']['key_features_list'] as $value): 
					?>
					<div class="col-span-12 md:col-span-6 md:pr-s2">
						<div class="grid grid-cols-6 gap-y-s2 lg:gap-y-s4 md:gap-x-s2">
							<div class="col-span-1 col-start-1">
								<img class="w-[55px] md:w-[64px] aspect-square" src="<?php echo $value['icon'] ?>" alt="Icon" />
							</div>
							<h3 class="heading-3 col-start-2 col-span-5 lg:col-span-5 max-md:pl-s2"><?php echo $value['title']; ?></h3>
							<p class="body-2 col-span-5 lg:col-span-5 col-start-2 lg:col-start-2 row-start-2 max-md:pl-s2"><?php echo $value['description']; ?></p>
						</div>
					</div>
					<?php endforeach; ?>	
				</div>

				<div class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 pt-s5 md:pt-s8 lg:pt-s3 flex flex-col lg:flex-row items-center justify-center gap-s3 md:gap-s4 lg:gap-s2">
					<a href="<?php echo $row['key_features']['link_cta_request_a_demo']; ?>" class="btn-secondary-inverted"><?php echo $row['key_features']['text_cta_request_a_demo']; ?></a>
					<a href="<?php echo $row['key_features']['link_cta_learn_more']; ?>" class="btn-tertiary-white"><?php echo $row['key_features']['text_cta_learn_more']; ?></a>
				</div>

			</div>
		</div>
	</div>
</section>

<?php endif; ?>

<!-- end key features -->


<!-- Benefits -->

<?php if($row['acf_fc_layout'] == 'benefits_layout') : ?>

<section class="relative section w-full pt-s8 md:pt-s12 pb-s8 md:pb-s12 bg-primary-glaciar bg-benefits-mobile md:bg-benefits-tablet lg:bg-benefits-desktop bg-cover bg-no-repeat bg-left-bottom">
  <div class="container mx-auto flex flex-col gap-s8 md:gap-s10 lg:gap-s8">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s4">

      <h4 class="col-span-6 md:col-span-12 heading-4 uppercase"><?php echo $row['benefits']['title_flag']; ?></h4>

      <h2 class="col-span-6 md:col-span-12 lg:col-span-4 heading-2 pt-s2 lg:pt-0"><?php echo $row['benefits']['title']; ?></h2>
			
			<div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 pt-s2 md:pt-s6 lg:pt-s20 pb-s1 lg:pb-0">
				<p class="body-2"><?php echo $row['benefits']['resume']; ?></p>
			</div>

    </div>
  </div>
</section>

<?php endif; ?>

<!-- End benefits -->

<!-- Values title -->

<?php if($row['acf_fc_layout'] == 'value_proposition_layout') : ?>

<section class="relative section w-full pt-s13 md:pt-s12 lg:pt-s8 pb-s4 md:pb-s6 lg:pb-s12">

	<div class="container mx-auto">
    <?php if($row['value_propositions']) : ?>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-0">
			<h4 class="col-span-12 md:col-span-12 col-start-1 pb-s6 heading-4 uppercase"><?php echo $row['value_propositions']['flag_title']; ?></h4>
			<h2 class="col-span-12 grid grid-cols-12 heading-1 !font-normal">
        <span class="col-span-12 "><?php echo $row['value_propositions']['title_first_line']; ?></span>
        <span class="col-span-12"><?php echo $row['value_propositions']['title_second_line']; ?></span>
        <span class="col-span-10 lg:col-span-9 md:col-start-2 lg:col-start-3"><?php echo $row['value_propositions']['title_third_line']; ?></span>
      </h2>
		</div>
    <?php endif; ?>
	</div>

</section>

<?php endif; ?>

<!-- end values title -->

<!-- Values -->

<?php if($row['acf_fc_layout'] == 'values_lists_layout') : ?>

<section class="relative section w-full pt-s10 lg:pb-s10">

	
	<?php if($row['eyebrown'] !== ''): ?>
	<div class="container mx-auto">
		<h4 class="heading-4 pb-s2 md:pb-s4 lg:pb-s6">
			<?php echo $row['eyebrown'] ?>
		</h4>
	</div>
	<?php endif; ?>

	<div class="container mx-auto">
		
		<?php
			// Values view

			$values_row = $row['values_row'];

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

<?php endif; ?>

<!-- end values -->

<?php 
endforeach;
?>

<!-- Form Module -->
<?php
  get_template_part(
    'template-parts/content',
    'form-module'
  );
?>
<!-- End form module -->