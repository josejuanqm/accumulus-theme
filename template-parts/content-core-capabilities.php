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
<section class="section w-full relative pb-s12 md:pb-s7 lg:pb-s12 text-neutral-nwhite bg-secondary-green">

	<picture class="absolute top-0 left-0 w-full h-full">
		<source media="(min-width:1024px)" srcset="<?php echo $main_banner['bg_image_for_desktop']; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $main_banner['bg_image_for_tablet']; ?>">
		<img src="<?php echo $main_banner['bg_image_for_mobile']; ?>" alt="<?php echo $main_banner['title']; ?>" class="w-full h-full">
	</picture>

	<div class="relative container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

      <h4 class="col-span-6 md:col-span-12 lg:row-start-1 heading-4 uppercase"><?php echo $main_banner['flag_title']; ?></h4>

			<h1 class="col-span-5 md:col-span-6 lg:col-span-7 lg:row-start-2 heading-1"><?php echo $main_banner['title']; ?></h1>

      <div class="col-span-6 md:col-span-6 lg:col-span-5 lg:row-start-2 text-end">
        <img class="relative inline-block" src="<?php echo $main_banner['image']; ?>" alt="<?php echo $main_banner['title']; ?>" />
      </div>

			<div class="col-span-6 md:col-span-6 lg:col-span-4 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2"><?php echo $main_banner['first_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-12 lg:row-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $main_banner['link_cta']; ?>" class="btn-secondary">More about the platform</a>
			</div>

		</div>
	</div>

</section>
<?php endif; ?>

<!-- Main banner -->

<?php
	// Fields main banner
	$benefits = get_field('benefits');
?>
<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-secondary-lilac max-lg:!pr-0 max-md:!pr-s2">
	<div class="container mx-auto px-s4 md:px-0 lg:px-0">
		<div class="flex flex-col gap-s8">
			<h2 class="w-full heading-1">Benefits</h2>
			<div class="relative w-full">
				<div class="benefits-slide">
					<?php 

            foreach($benefits as $benefit):
          ?>
						<div class="card relative w-full max-w-[370px] mx-s1">

							<div class="relative w-full flex items-center justify-center">
                  <img class="block w-full h-full object-cover" src="<?php echo $benefit['image']; ?>" alt="<?php echo $benefit['title']; ?>" />
							</div>

							<div class="flex flex-col pt-s2 gap-2">
								<h3 class="heading-10 color-neutral-dgray"><?php echo $benefit['title']; ?></h3>
                <p class="body-2 md:body-3"><?php echo $benefit['resume']; ?></p>
							</div>

						</div>
						<?php 
              endforeach;
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
<!-- Benefits -->


<section class="relative section w-full pt-s12 md:pt-s10 lg:pb-s12">

	<div class="container mx-auto">
		
		<?php
			// Values view

			$values_row = get_field('values_row');

      if($values_row):

			$i = 0;		
			
			foreach($values_row as $row) :
				$i++;

				if($i % 2 == 1): 	
			?>

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 lg:pb-s12 last-of-type:lg:!pb-0">
					<div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col items-start gap-s3">

						<?php  foreach($row['card_item'] as $card) : ?>

							<?php if($card['acf_fc_layout'] == 'title') : ?>
								<h3 class="heading-3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="body-2"><?php echo $card['description']; ?></p>
							<?php endif; ?>

              <?php if($card['acf_fc_layout'] == 'description_wysiwig'): ?>
								<div class="description-wysiwyg"><?php echo $card['wysiwyg']; ?></div>
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
								<h3 class="heading-3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="body-2"><?php echo $card['description']; ?></p>
							<?php endif; ?>

              <?php if($card['acf_fc_layout'] == 'description_wysiwig'): ?>
								<div class="description-wysiwyg"><?php echo $card['wysiwyg']; ?></div>
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

      endif;
		?>

	</div>

</section>

<!-- Values -->


<?php 

  // Fields from testimonial

  $testimonial_coc = get_field('testimonial_coc');

?>

<?php if($testimonial_coc) : ?>
<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6">
      <div class="col-span-6 md:col-span-7 lg:col-span-6 md:col-start-6 lg:col-start-6 lg:pl-s6 flex items-center justify-between">
        <img class="max-w-[145px] md:max-w-full" src="<?php echo $testimonial_coc['image']; ?>" alt="<?php echo $testimonial_coc['name']; ?>" />
        <div class="flex flex-col pl-s2 gap-s2">
          <h4 class="heading-3 text-neutral-dgray w-full md:max-w-[195px]"><?php echo $testimonial_coc['name']; ?></h4>
          <p class="text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $testimonial_coc['position']; ?></p>
        </div>
      </div>
      <h2 class="col-span-6 md:col-span-10 lg:col-span-12 heading-2 text-neutral-dgray">
        <?php echo $testimonial_coc['testimonial']; ?>
      </h2>
      <p class="col-span-5 md:col-span-8 lg:col-span-9 md:col-start-3 lg:col-start-3 body-1"><?php echo $testimonial_coc['resume_text']; ?></p>
    </div>
  </div>
</section>
<?php endif; ?>
<!-- Testimonial -->





