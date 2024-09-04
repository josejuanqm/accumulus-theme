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
<section class="translucent-navigation relative section w-full pb-s10 md:pb-s12 lg:pb-s12 text-neutral-dgray bg-neutral-white md:overflow-hidden">

	<picture class="absolute top-0 left-0 w-full h-full -z-[1]">
		<source media="(min-width:1024px)" srcset="<?php echo $main_banner['bg_image_desktop']; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $main_banner['bg_image_tablet']; ?>">
		<img src="<?php echo $main_banner['bg_image_mobile']; ?>" alt="<?php echo $main_banner['title']; ?>" class="w-full h-full">
	</picture>

	<div class="container mx-auto z-10 pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

      <h4 class="col-span-6 md:col-span-12 lg:row-start-1 heading-4 uppercase"><?php echo $main_banner['flag_title']; ?></h4>

			<h1 class="col-span-5 md:col-span-12 lg:col-span-8 lg:row-start-2 heading-1"><?php echo $main_banner['title']; ?></h1>

      <div class="col-span-6 md:col-span-12 lg:absolute lg:-right-[80px] xl:right-0 flex justify-end">
				<picture class="relative max-lg:max-w-[75%] max-md:max-w-full">
					<source media="(min-width:1025px)" srcset="<?php echo $main_banner['image']; ?>">
					<source media="(min-width:768px)" srcset="<?php echo $main_banner['image_tablet']; ?>">
					<img src="<?php echo $main_banner['image_mobile']; ?>" alt="<?php echo $main_banner['title']; ?>" class="w-full h-full">
				</picture>
        <!-- <img class="relative" src="<?php //echo $main_banner['image']; ?>" alt="<?php //echo $main_banner['title']; ?>" /> -->
      </div>

			<div class="col-span-6 md:col-span-6 lg:col-span-4 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 md:pt-s2 lg:pt-0">
				<p class="body-2"><?php echo $main_banner['first_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-5 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 md:pt-s2 lg:pt-0">
				<p class="body-2"><?php echo $main_banner['second_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-12 lg:row-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $main_banner['link_cta']; ?>" class="btn-secondary">Request a demo</a>
				<a href="#" class="btn-tertiary">Learn More</a>
			</div>

		</div>
	</div>

</section>
<?php endif; ?>

<!-- Main banner -->


<!-- Statistics -->


<section class="section relative w-full py-s10 bg-secondary-aqua flex flex-col gap-s9">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:py-s6 md:py-s8">
      <h4 class="col-span-12 heading-4 uppercase">CASE STUDY STATISTICS</h4>
      <h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1">
        <span class="block col-span-12">
          Let's Talk
        </span>
        <span class="block col-span-12">
          Numbers
        </span>
      </h2>
    </div>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s8 lg:py-s6 pt-s4 md:pt-0">
      <div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-5 lg:col-start-1">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
						<svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.03125" y="0.0585938" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
							<path d="M43.285 21.172C39.1338 17.0208 32.3765 17.0208 28.2253 21.172L25.6321 23.7653L23.1051 26.2922L20.5119 28.8855C16.3606 33.0367 16.3606 39.7939 20.5119 43.9452C24.6631 48.0964 31.4203 48.0964 35.5716 43.9452L38.1648 41.3519L40.6918 38.825L43.285 36.2317C47.4362 32.0805 47.4362 25.3233 43.285 21.172ZM38.1266 36.2598L35.5996 38.7867L33.0064 41.38C30.2678 44.1186 25.8131 44.1186 23.0771 41.38C20.341 38.6414 20.3385 34.1867 23.0771 31.4507L25.6703 28.8574L28.1106 31.2977L30.6375 33.8246L33.1645 36.3516L35.6914 33.8246L33.1645 31.2977L30.6375 28.7707L28.1973 26.3305L30.7905 23.7372C33.5291 20.9986 37.9838 20.9986 40.7198 23.7372C43.4584 26.4758 43.4584 30.9305 40.7198 33.6665L38.1266 36.2598Z" fill="#444444"/>
						</svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
						1 Submission
          </h3>
          <div class="col-start-2 col-span-1 row-start-2">
            <p class="body-2 lg:max-w-[368px]">
							PAC Submission Project prepared by a leading biopharmaceutical company
            </p>
          </div>
        </div>
      </div>
      <div class="col-span-12 md:col-span-10 lg:col-span-7 md:col-start-2 lg:col-start-7">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
						<svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.03125" y="0.0585938" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
							<path d="M44.9178 28.2649H18.9102V22.9345L31.914 18.0586L44.9178 22.9345V28.2649ZM21.7909 25.3842H42.0371V24.9318L31.914 21.1356L21.7909 24.9318V25.3842Z" fill="#444444"/>
							<path d="M24.6815 31.1602H21.8008V41.279H24.6815V31.1602Z" fill="#444444"/>
							<path d="M42.0292 31.1602H39.1484V41.279H42.0292V31.1602Z" fill="#444444"/>
							<path d="M36.244 31.1602H33.3633V41.279H36.244V31.1602Z" fill="#444444"/>
							<path d="M30.4667 31.1602H27.5859V41.279H30.4667V31.1602Z" fill="#444444"/>
							<path d="M44.9245 44.1748H18.9062V47.0555H44.9245V44.1748Z" fill="#444444"/>
						</svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
						48 NRAs
          </h3>
          <div class="col-start-2 col-span-1 row-start-2">
            <p class="body-2 lg:max-w-[368px]">
							National Regulatory Authorities agree to participate in a Reliance project for the PAC submission
            </p>
          </div>
        </div>
      </div>
      <div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-5 lg:col-start-1">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
						<svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.03125" y="0.853516" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
							<path d="M26.2308 29.4766H22.3555V33.3519H26.2308V29.4766Z" fill="#444444"/>
							<path d="M26.2308 37.2275H22.3555V41.1029H26.2308V37.2275Z" fill="#444444"/>
							<path d="M33.9847 37.2275H30.1094V41.1029H33.9847V37.2275Z" fill="#444444"/>
							<path d="M41.7347 37.2275H37.8594V41.1029H41.7347V37.2275Z" fill="#444444"/>
							<path d="M33.9847 29.4766H30.1094V33.3519H33.9847V29.4766Z" fill="#444444"/>
							<path d="M41.7347 29.4766H37.8594V33.3519H41.7347V29.4766Z" fill="#444444"/>
							<path d="M45.6066 21.7289H41.7313V17.8535H37.8559V21.7289H26.2326V17.8535H22.3573V21.7289H18.4819C16.3454 21.7289 14.6094 23.4621 14.6094 25.6014V44.9754H18.4847V25.6043H45.6066V44.9783H22.3573V48.8537H45.6066C47.746 48.8537 49.482 47.1176 49.482 44.9783V25.6043C49.482 23.4649 47.746 21.7289 45.6066 21.7289Z" fill="#444444"/>
						</svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
						100 Weeks
          </h3>
          <div class="col-start-2 col-span-1 row-start-2">
            <p class="body-2 lg:max-w-[368px]">100 weeks saved from the average time</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col items-center text-center justify-stretch md:justify-normal gap-s4">
    <a href="#" class="btn btn-tertiary">Read More</a>
  </div>
</section>


<!-- End statics -->


<?php 

$value_propositions = get_field('value_propositions');

?>

<section class="relative section w-full pt-s12 md:pt-s12 lg:pb-s12">

	<div class="container mx-auto">
    <?php if($value_propositions) : ?>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-0 pb-s10 lg:pb-s16 lg:mb-s2">
			<h4 class="col-span-12 md:col-span-12 col-start-1 pb-s6 heading-4 uppercase"><?php echo $value_propositions['flag_title']; ?></h4>
			<h2 class="col-span-12 grid grid-cols-12 heading-1 !font-normal">
        <span class="col-span-12 "><?php echo $value_propositions['title_first_line']; ?></span>
        <span class="col-span-12"><?php echo $value_propositions['title_second_line']; ?></span>
        <span class="col-span-10 lg:col-span-9 md:col-start-2 lg:col-start-3"><?php echo $value_propositions['title_third_line']; ?></span>
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

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s4 lg:gap-y-0 pb-s6 md:pb-s12 lg:pb-s12 last-of-type:md:!pb-s12 last-of-type:lg:!pb-0">
					<div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col items-start gap-s2 md:gap-s3">

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

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s4 lg:gap-y-0 pb-s6 md:pb-s12 lg:pb-s12 last-of-type:md:!pb-s12 last-of-type:lg:!pb-0">
					<div class="col-span-12 md:col-span-6">

						<?php foreach($row['card_item'] as $card) : ?>

							<?php if ($card['acf_fc_layout'] == 'image') : ?>
								<img src="<?php echo $card['image']; ?>"  />
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
					<div class="col-span-12 md:col-span-5 lg:col-span-4 md:col-start-8 lg:col-start-8 flex flex-col items-start gap-s2 md:gap-s3">

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

if($key_features): 

?>
<section class="relative section w-full pt-s8 md:pt-s12 pb-s8 md:pb-s6 lg:pb-s12 bg-neutral-nude">
	<div class="container mx-auto">
		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 pb-s7">
			<h4 class="col-span-12 md:col-span-12 col-start-1 heading-4 uppercase">KEY FEATURES
			</h4>
			<p class="col-span-12 md:col-span-6 lg:col-span-5 body-2">We’re paving the way to a global dossier in the cloud and continuing to build on our core platform. Evolving features include:</p>
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
										<img src="<?php echo $card['image']; ?>" class="max-lg:h-full max-md:h-auto"  />
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
  $benefits = get_field('benefits');

  if($benefits) :
?>
<section class="relative section w-full pt-s8 md:pt-s12 pb-s8 md:pb-s12 bg-primary-glaciar bg-benefits-mobile md:bg-benefits-tablet lg:bg-benefits-desktop bg-cover bg-no-repeat bg-left-bottom">
  <div class="container mx-auto flex flex-col gap-s8 md:gap-s10 lg:gap-s8">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s4">

      <h4 class="col-span-6 md:col-span-12 heading-4 uppercase"><?php echo $benefits['title_flag']; ?></h4>

      <h2 class="col-span-6 md:col-span-12 lg:col-span-4 heading-2 pt-s2 lg:pt-0"><?php echo $benefits['title']; ?></h2>
			
			<div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 pt-s2 md:pt-s6 lg:pt-s20 pb-s1 lg:pb-0">
				<p class="body-2"><?php echo $benefits['resume']; ?></p>
			</div>

      <div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 flex flex-col lg:flex-row lg:pt-s4">
				<a href="<?php echo $benefits['link_cta']; ?>" class="btn-secondary">Accumulus overview</a>
			</div>
    </div>
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s4">

      <h2 class="col-span-6 md:col-span-12 lg:col-span-4 heading-2"><?php echo $benefits['title_2']; ?></h2>
			
			<div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 pt-s2 md:pt-s6 lg:pt-s20 pb-s1 lg:pb-0">
				<p class="body-2"><?php echo $benefits['resume_2']; ?></p>
			</div>

      <div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 flex flex-col lg:flex-row lg:pt-s4">
				<a href="<?php echo $benefits['link_cta_2']; ?>" class="btn-secondary">Our security program</a>
			</div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Benefits -->




<!-- Form Module -->
<?php
  get_template_part(
    'template-parts/content',
    'form-module'
  );
?>
<!-- End form module -->