<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */

?>

<!-- Main banner -->

<?php
  $main_banner = get_field('main_banner');
  if($main_banner):
?>

<section class="translucent-navigation light section relative isolate overflow-hidden w-full pb-s8 md:pb-s10 lg:pb-s12 text-neutral-fnude bg-primary-violet bg-cover bg-no-repeat bg-center">
	<picture class="absolute top-0 left-0 w-full h-full -z-10">
		<source media="(min-width:1024px)" srcset="<?php echo $main_banner['bg_banner_desktop']; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $main_banner['bg_banner_tablet']; ?>">
		<img src="<?php echo $main_banner['bg_banner_mobile']; ?>" alt="<?php echo $main_banner['title']; ?>" class="w-full h-full">
	</picture>
	<div class="container mx-auto pt-s5 md:pt-s8 lg:pt-s9">
		<div class="grid grid-cols-12 gap-x-s2 lg:justify-end">
      <h4 class="heading-4 uppercase"><?php echo $main_banner['eyebrown']; ?></h4>
			<h1 class="col-span-12 text-neutral-fnude heading-1 mt-s3 md:mt-s4 lg:mt-s6 mb-s3 md:mb-s15 lg:mb-[12rem]"><?php echo $main_banner['title']; ?></h1>
			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 mt-s10 md:mt-0 mb-s5 md:mb-s9 lg:mb-s4">
				<p class="body-2 text-neutral-nwhite md:max-w-550 lg:max-w-full"><?php echo $main_banner['resume']; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $main_banner['cta_link']; ?>" class="btn-secondary-inverted"><?php echo $main_banner['cta_text']; ?></a>
      </div>
		</div>
	</div>
</section>

<?php endif; ?>

<!-- end Main banner -->


<!-- Our culture pillars -->


<?php
  $culture_pillars = get_field('culture_pillars');
  if($culture_pillars):
?>

<section class="section">
  <div class="container mx-auto px-s2 flex flex-col items-stretch">
    <div class="flex flex-col items-stretch py-s8 md:py-s12 gap-s4 md:gap-s6">
      <h2 class="heading-1"><?php echo $culture_pillars['title']; ?></h2>
      <div class="grid grid-cols-2 gap-x-s6 md:gap-x-s10 lg:gap-x-s6 gap-y-s4 md:gap-y-s10 lg:gap-y-s6 [&>figure>img]:max-h-[330px]">

        <?php foreach($culture_pillars['list_items'] as $item): ?>
        <figure class="flex flex-col items-start justify-normal gap-s4 md:gap-s3 col-span-2 md:col-span-1 lg:col-span-1">
          <div class="relative flex flex-row items-center justify-center">
            <img class="block rounded-md top-0 left-0 right-0 bottom-0 z-0" src="<?php echo $item['image']; ?>" />
          </div>
          <div class="flex flex-col items-start justify-normal gap-s2 lg:gap-s3">
            <p class="heading-3">
              <?php echo $item['title']; ?>
            </p>
            <p class="body-2"><?php echo $item['description']; ?></p>
          </div>
        </figure> 
        <?php endforeach; ?>

      </div>
    </div>
</section>

<?php endif; ?>

<!-- end of Our culture pillars -->


<!-- BEGIN Why Accumulus -->

<?php
  $why_accumulus = get_field('why_accumulus');
  if($why_accumulus):
?>

 <section class="section relative w-full py-s8 md:py-s10 lg:py-s12 bg-neutral-offwhite">
		<div class="container mx-auto">
			<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 pb-s8 md:pb-s6">
				<h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1 text-neutral-dgray">
					<span class="block col-span-12">
            <?php echo $why_accumulus['title_first_line']; ?>
					</span>
					<span class="block col-span-10 col-start-2 row-start-2">
            <?php echo $why_accumulus['title_second_line']; ?>
					</span>
				</h2>
			</div>
			<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s10 lg:gap-y-s8">

        <?php 
          $i = 0;
          foreach($why_accumulus['list_items'] as $item): 
          $i++;
        ?>
        <?php if($i % 2 == 1): ?>
        <div class="col-span-12 md:col-span-6 lg:col-span-5">
          <div class="grid grid-cols-[64px, 1fr] gap-x-s2 gap-y-s3">
            <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
              <img src="<?php echo $item['icon']; ?>" alt="<?php echo strip_tags($item['title']); ?>" class="w-[39px] md:w-[64px]" />
            </div>
            <h3 class="heading-3 col-start-2 col-span-1 text-neutral-dgray">
              <?php echo $item['title'] ?>
            </h3>
            <p class="body-2 col-start-2 col-span-1 row-start-2 text-neutral-600">
              <?php echo $item['description'] ?>
            </p>
          </div>
        </div>
        <?php else : ?>
        <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-7">
          <div class="grid grid-cols-[64px, 1fr] gap-x-s2 gap-y-s3">
            <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
              <img src="<?php echo $item['icon']; ?>" alt="<?php echo strip_tags($item['title']); ?>" class="w-[39px] md:w-[64px]" />
            </div>
            <h3 class="heading-3 col-start-2 col-span-1 text-neutral-dgray">
              <?php echo $item['title'] ?>
            </h3>
            <p class="body-2 col-start-2 col-span-1 row-start-2 text-neutral-600">
              <?php echo $item['description'] ?>
            </p>
          </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

			</div>
      <div class="flex items-center justify-center pt-s5 md:pt-s6 lg:pt-s10">
        <a href="<?php echo $why_accumulus['link_cta']; ?>" class="btn-tertiary"><?php echo $why_accumulus['text_cta']; ?></a>
      </div>
		</div>
 </section>

 <?php endif; ?>

<!-- END Why Accumulus -->


<!-- Testimonials -->

<?php

	$testimonials = get_field('testimonials');
	if($testimonials):

?>

<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 bg-neutral-nwhite">
  <div class="relative container mx-auto">
    
    <h4 class="heading-4 pb-s4 md:pb-s6">TESTIMONIALS</h4>
    <div class="general-slide">
      <?php foreach($testimonials['list_testimonials'] as $slide): ?>
        <div class="general-slide__item">
          <div class="grid grid-cols-6 md:grid-cols-12 gap-s8 md:gap-x-s2 md:gap-y-s10">
            <h3 class="col-span-6 md:col-span-10 lg:col-span-9 heading-3 text-neutral-dgray">
							“<?php echo $slide['text_testimonial'] ?>”
            </h3>
            <div class="col-span-6 md:col-span-7 lg:col-span-5 md:col-start-6 lg:col-start-6 flex items-start justify-start gap-s2">

              <?php 
                if($slide['photo_user']): 
              ?>
                  <img class="max-w-[145px] md:max-w-full rounded-3xl" src="<?php echo $slide['photo_user']; ?>" alt="<?php echo $slide['name_user']; ?>" />
                <?php else: ?>
                  <img class="max-w-[145px] md:max-w-full rounded-3xl" src="<?php bloginfo('template_url'); ?>/images/thumb-user.png" alt="<?php echo $slide['name_user']; ?>" />
              <?php endif; ?>

              <div class="flex flex-col gap-s2">
                <h4 class="heading-3 text-neutral-dgray w-full md:max-w-[195px]"><?php echo $slide['name_user']; ?></h4>
                <p class="body-3"><?php echo $slide['position_user']; ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="flex items-center justify-center gap-4 max-sm:pt-s6 max-xl:pt-s10">
      <div class="prev xl:absolute xl:-left-20 xl:top-[200px] cursor-pointer">
        <img class="block w-[54px] h-[54px] aspect-square rotate-180" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
      </div>
      <div class="next xl:absolute xl:-right-20 xl:top-[200px] cursor-pointer">
        <img class="block w-[54px] h-[54px] aspect-square" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
      </div>
    </div>

  </div>
</section>

<?php endif; ?>

<!-- end Testimonials -->


<!-- Join us -->

<section class="section bg-neutral-900 py-s8 md:py-s12 relative isolate overflow-hidden">
	<picture class="absolute top-0 left-0 w-full h-full -z-10">
		<source media="(min-width:1024px)" srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg.jpg"; ?>">
		<source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-tablet.jpg"; ?>">
		<img src="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-mobile.jpg"; ?>" alt="Flowers" class="w-full h-full">
	</picture>
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 items-start gap-y-s3 md:gap-y-s6">
      <h4 class="heading-4 text-neutral-offwhite uppercase col-span-12">Careers</h4>
      <h2 class="heading-2 text-neutral-offwhite col-span-12 md:col-span-10 lg:col-span-9 row-start-2 pb-s2 md:pb-0">Join Us</h2>
      <p class="body-3 text-neutral-offwhite col-span-12 md:col-span-6 lg:col-span-7 md:row-start-3">Join our diverse and ambitious team driven to pave the way for advancements in the regulatory ecosystem through creative and innovative solutions.<br />Whether you’re an experienced professional, or just starting your career journey, if you’re motivated to make a difference, we want to hear from you.*</p>
      <p class="body-4 text-secondary-aqua col-span-12 md:col-span-4 lg:col-span-3 md:col-start-9 lg:col-start-9 md:row-start-3 lg:pt-s1">*Please review our <a href="https://www.accumulus.org/global-applicant-privacy-notice/" target="_blank">Global Applicant Privacy Notice</a> for more information on how we use your job application data.</p>
      <a href="/careers" class="btn btn-tertiary-white col-span-12 md:col-span-12  lg:col-auto lg:row-start-4 mt-s2 md:mt-0"><?php echo $args['cta'] ?? 'Join Our Team'; ?></a>
    </div>
  </div>
</section>

<!-- end Join us -->


<!-- Form Module -->
<?php
  get_template_part(
    'template-parts/content',
    'form-module'
  );
?>
<!-- End form module -->
