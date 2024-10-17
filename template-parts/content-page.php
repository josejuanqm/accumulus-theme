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

$website_sections = get_field('website_sections');

foreach($website_sections as $row) :

?>

<?php //if($row['acf_fc_layout'] == '') : ?>
<?php //endif; ?>

<!-- Main banner marquee -->

<?php if($row['acf_fc_layout'] == 'main_banner_with_marquee_layout') : ?>

<section
  class="translucent-navigation section w-full pb-s12 md:pb-s7 lg:pb-s12 bg-cover bg-no-repeat bg-center bg-neutral-offwhite"
  style="background-image: url(<?php echo $row['main_banner_with_marquee_group']['bg_image_main']; ?>)">

  <div class="container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

      <h4 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase pt-s1">
        <?php echo $row['main_banner_with_marquee_group']['title_tag']; ?></h4>
      <h1 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1">
        <?php echo $row['main_banner_with_marquee_group']['main_title']; ?></h1>

      <div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
        <p class="body-2 md:max-w-550 lg:max-w-full">
          <?php echo $row['main_banner_with_marquee_group']['resume_text']; ?></p>
      </div>
      <div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">

        <?php if($row['main_banner_with_marquee_group']['link_demo']): ?>
        <a target="<?php echo $row['main_banner_with_marquee_group']['link_demo']['target'] ? $row['main_banner_with_marquee_group']['link_demo']['target'] : '_self'; ?>"
          href="<?php echo  $row['main_banner_with_marquee_group']['link_demo']['url']; ?>" class="btn-secondary">
          <?php echo  $row['main_banner_with_marquee_group']['link_demo']['title']; ?>
        </a>
        <?php endif; ?>

        <?php if($row['main_banner_with_marquee_group']['link_learn_more']): ?>
        <a target="<?php echo $row['main_banner_with_marquee_group']['link_learn_more']['target'] ? $row['main_banner_with_marquee_group']['link_learn_more']['target'] : '_self'; ?>"
          href="<?php echo  $row['main_banner_with_marquee_group']['link_learn_more']['url']; ?>" class="btn-tertiary">
          <?php echo  $row['main_banner_with_marquee_group']['link_learn_more']['title']; ?>
        </a>
        <?php endif; ?>

      </div>

    </div>
  </div>

  <!-- Marquee -->

  <section class="flex flex-col gap-s2 md:gap-s4 lg:gap-s7 w-full pt-s6 md:pb-s10 lg:pb-s11">

    <div class="container mx-auto">
      <h4 class="text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase">Supported by</h4>
    </div>
    <div class="w-full">
      <div>
        <div class="scroll w-full">
          <?php 
								$arr = [1,2];
								foreach( $arr as $item ): 
							?>

          <div>

            <?php 
								$arr = [1,2];
								foreach( $arr as $item ): 
							?>
            <?php foreach( $row['main_banner_with_marquee_group']['marquee_images'] as $logo ): ?>
            <figure class="inline-block align-middle px-7">
              <img src="<?php echo $logo['logo']; ?>" alt="<?php echo $logo['name']; ?>" />
            </figure>
            <?php endforeach; ?>
            <?php endforeach; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </section>

  <!-- End marquee -->

</section>

<?php endif; ?>

<!-- End Main banner marquee -->


<!-- Main banner without marquee -->

<?php if($row['acf_fc_layout'] == 'main_banner_home_layout') : ?>

<section
  class="translucent-navigation section w-full pb-s12 md:pb-s7 lg:pb-s12 bg-cover bg-no-repeat bg-center bg-neutral-offwhite"
  style="background-image: url(<?php echo $row['main_banner_group']['bg_image_main']; ?>)">

  <div class="container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

      <h4 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase pt-s1">
        <?php echo $row['main_banner_group']['title_tag']; ?></h4>
      <h1 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1">
        <?php echo $row['main_banner_group']['main_title']; ?></h1>

      <div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
        <p class="body-2 md:max-w-550 lg:max-w-full"><?php echo $row['main_banner_group']['resume_text']; ?></p>
      </div>
      <div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">

        <?php if($row['main_banner_group']['link_demo']): ?>
        <a target="<?php echo $row['main_banner_group']['link_demo']['target'] ? $row['main_banner_group']['link_demo']['target'] : '_self'; ?>"
          href="<?php echo  $row['main_banner_group']['link_demo']['url']; ?>" class="btn-secondary">
          <?php echo  $row['main_banner_group']['link_demo']['title']; ?>
        </a>
        <?php endif; ?>

        <?php if($row['main_banner_group']['link_learn_more']): ?>
        <a target="<?php echo $row['main_banner_group']['link_learn_more']['target'] ? $row['main_banner_group']['link_learn_more']['target'] : '_self'; ?>"
          href="<?php echo  $row['main_banner_group']['link_learn_more']['url']; ?>" class="btn-tertiary">
          <?php echo  $row['main_banner_group']['link_learn_more']['title']; ?>
        </a>
        <?php endif; ?>

      </div>

    </div>
  </div>

</section>

<?php endif; ?>

<!-- End Main banner without marquee -->


<!-- Main banner platform -->

<?php if($row['acf_fc_layout'] == 'main_banner_platform_layout') : ?>

<section
  class="translucent-navigation relative section w-full pb-s10 md:pb-s12 lg:pb-s12 text-neutral-dgray bg-neutral-white md:overflow-hidden">

  <picture class="absolute top-0 left-0 w-full h-full -z-[1]">
    <source media="(min-width:1024px)" srcset="<?php echo $row['main_banner_group']['bg_image_desktop']; ?>">
    <source media="(min-width:768px)" srcset="<?php echo  $row['main_banner_group']['bg_image_tablet']; ?>">
    <img src="<?php echo  $row['main_banner_group']['bg_image_mobile']; ?>"
      alt="<?php echo  $row['main_banner_group']['title']; ?>" class="w-full h-full">
  </picture>

  <div class="container mx-auto z-10 pt-s5 md:pt-s10 lg:pt-s9">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

      <h4 class="col-span-6 md:col-span-12 lg:row-start-1 heading-4 uppercase">
        <?php echo  $row['main_banner_group']['flag_title']; ?></h4>

      <h1 class="col-span-5 md:col-span-12 lg:col-span-8 lg:row-start-2 heading-1">
        <?php echo  $row['main_banner_group']['title']; ?></h1>

      <div class="col-span-6 md:col-span-12 lg:absolute lg:-right-[80px] xl:right-0 flex justify-end">
        <picture class="relative max-lg:max-w-[75%] max-md:max-w-full">
          <source media="(min-width:1025px)" srcset="<?php echo  $row['main_banner_group']['image']; ?>">
          <source media="(min-width:768px)" srcset="<?php echo  $row['main_banner_group']['image_tablet']; ?>">
          <img src="<?php echo  $row['main_banner_group']['image_mobile']; ?>"
            alt="<?php echo  $row['main_banner_group']['title']; ?>" class="w-full h-full">
        </picture>
      </div>

      <div
        class="col-span-6 md:col-span-6 lg:col-span-4 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 md:pt-s2 lg:pt-0">
        <p class="body-2"><?php echo  $row['main_banner_group']['first_resume']; ?></p>
      </div>
      <div
        class="col-span-6 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-5 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 md:pt-s2 lg:pt-0">
        <p class="body-2"><?php echo  $row['main_banner_group']['second_resume']; ?></p>
      </div>
      <div class="col-span-6 md:col-span-12 lg:row-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">

        <?php if($row['main_banner_group']['text_first_cta'] !== ''): ?>
        <a href="<?php echo  $row['main_banner_group']['link_first_cta']; ?>"
          class="btn-secondary"><?php echo  $row['main_banner_group']['text_first_cta']; ?></a>
        <?php endif; ?>

        <?php if($row['main_banner_group']['text_second_cta'] !== ''): ?>
        <a href="<?php echo  $row['main_banner_group']['link_second_cta']; ?>"
          class="btn-tertiary"><?php echo  $row['main_banner_group']['text_second_cta']; ?></a>
        <?php endif; ?>

      </div>

    </div>
  </div>

</section>

<?php endif; ?>

<!-- End Main banner platform -->


<!-- Main banner core capabilities -->

<?php if($row['acf_fc_layout'] == 'main_banner_core_capabilities_layout') : ?>

<section
  class="translucent-navigation light section w-full relative pb-s12 md:pb-s7 lg:pb-s12 text-neutral-nwhite bg-secondary-green">

  <picture class="absolute top-0 left-0 w-full h-full">
    <source media="(min-width:1024px)" srcset="<?php echo $row['main_banner_group']['bg_image_for_desktop']; ?>">
    <source media="(min-width:768px)" srcset="<?php echo $row['main_banner_group']['bg_image_for_tablet']; ?>">
    <img src="<?php echo $row['main_banner_group']['bg_image_for_mobile']; ?>"
      alt="<?php echo $row['main_banner_group']['title']; ?>" class="w-full h-full">
  </picture>

  <div class="relative container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

      <h4 class="col-span-6 md:col-span-12 lg:row-start-1 heading-4 uppercase">
        <?php echo $row['main_banner_group']['flag_title']; ?></h4>

      <h1 class="col-span-5 md:col-span-6 lg:col-span-7 lg:row-start-2 heading-1">
        <?php echo $row['main_banner_group']['title']; ?></h1>

      <div class="col-span-6 md:col-span-6 lg:col-span-5 lg:row-start-2 text-end">
        <img class="relative inline-block" src="<?php echo $row['main_banner_group']['image']; ?>"
          alt="<?php echo $row['main_banner_group']['title']; ?>" />
      </div>

      <div
        class="col-span-6 md:col-span-6 lg:col-span-4 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
        <p class="body-2"><?php echo $row['main_banner_group']['first_resume']; ?></p>
      </div>
      <div class="col-span-6 md:col-span-12 lg:row-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
        <a href="<?php echo $row['main_banner_group']['link_cta']; ?>" class="btn-secondary">More about the platform</a>
      </div>

    </div>
  </div>

</section>

<?php endif; ?>

<!-- End Main banner core capabilities -->


<!-- Main banner inner pages -->

<?php if($row['acf_fc_layout'] == 'main_banner_inner_pages_layout') : ?>

<section
  class="translucent-navigation light relative section w-full pb-s12 md:pb-s7 lg:pb-s12 text-neutral-fnude bg-secondary-carbon">

  <picture class="absolute top-0 left-0 w-full h-full">
    <source media="(min-width:1024px)"
      srcset="<?php echo $row['main_banner_inner_pages_group']['bg_image_for_desktop']; ?>">
    <source media="(min-width:768px)"
      srcset="<?php echo $row['main_banner_inner_pages_group']['bg_image_for_tablet']; ?>">
    <img src="<?php echo $row['main_banner_inner_pages_group']['bg_image_for_mobile']; ?>" alt="Flowers"
      class="w-full h-full">
  </picture>

  <div class="relative container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

      <h4 class="col-span-12 heading-4 uppercase pt-s1 text-neutral-nude">
        <?php echo $row['main_banner_inner_pages_group']['title_tag']; ?></h4>
      <h1 class="col-span-12 heading-1 text-neutral-nude">
        <?php echo $row['main_banner_inner_pages_group']['main_title']; ?></h1>

      <div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
        <p class="body-2 md:max-w-550 lg:max-w-full text-neutral-nwhite">
          <?php echo $row['main_banner_inner_pages_group']['resume_text']; ?></p>
      </div>
      <?php
				$titlePage = str_replace(' ', '-', strtolower(get_the_title())); 
			?>
      <div
        class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4 <?php if($titlePage === 'about-us') { echo 'pb-s8 md:pb-s10'; } ?>">

        <?php if($row['main_banner_inner_pages_group']['link_demo']): ?>
        <a target="<?php echo $row['main_banner_inner_pages_group']['link_demo']['target'] ? $row['main_banner_inner_pages_group']['link_demo']['target'] : '_self'; ?>"
          href="<?php echo  $row['main_banner_inner_pages_group']['link_demo']['url']; ?>"
          class="btn-secondary-inverted">
          <?php echo  $row['main_banner_inner_pages_group']['link_demo']['title']; ?>
        </a>
        <?php endif; ?>

        <?php if($row['main_banner_inner_pages_group']['link_learn_more']): ?>
        <a target="<?php echo $row['main_banner_inner_pages_group']['link_learn_more']['target'] ? $row['main_banner_inner_pages_group']['link_learn_more']['target'] : '_self'; ?>"
          href="<?php echo  $row['main_banner_inner_pages_group']['link_learn_more']['url']; ?>" class="btn-tertiary">
          <?php echo  $row['main_banner_inner_pages_group']['link_learn_more']['title']; ?>
        </a>
        <?php endif; ?>

      </div>

    </div>
  </div>

</section>

<?php endif; ?>

<!-- End Main banner inner pages -->


<!-- Statics home -->

<?php if($row['acf_fc_layout'] == 'statics_home_layout') : ?>

<section class="section relative w-full pt-s10 lg:pt-s12 bg-neutral-nude">
  <div class="container mx-auto">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s4 md:pb-s6">
      <h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1">
        <span class="block col-span-12">
          <?php echo $row['statistics_group']['title_first_line']; ?>
        </span>
        <span class="block col-span-10 col-start-3 row-start-2">
          <?php echo $row['statistics_group']['title_second_line']; ?>
        </span>
      </h2>
      <p class="col-start-1 col-span-12 md:col-start-5 md:col-span-7 lg:col-span-7 lg:col-start-6 body-2">
        <?php echo $row['statistics_group']['resume']; ?>
    </div>
    <!-- Title -->


    <div class="grid grid-cols-12 gap-x-s2 gap-y-s7 md:gap-y-s9 lg:py-s6 pt-s4 md:pt-0">

      <?php 
				foreach($row['statistics_group']['data_list'] as $item): 
			?>
      <div class="col-span-12 md:col-span-6 lg:col-span-4">
        <div class="grid grid-cols-6 gap-y-s2 lg:gap-y-s6 gap-x-s2">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1 lg:min-w-[64px]">
            <img class="w-[39px] md:w-[64px] lg:min-2-[64px] lg:-ml-s2 aspect-square" src="<?php echo $item['icon'] ?>"
              alt="<?php echo $item['title'] ?>" />
          </div>
          <h3 class="heading-2 col-start-2 col-span-5 lg:col-span-5"><?php echo $item['title'] ?></h3>
          <p class="body-2 col-span-5 lg:col-span-5 col-start-2 lg:col-start-2 row-start-2">
            <?php echo $item['resume'] ?></p>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
    <!-- Items -->

</section>

<section class="relative section w-full pt-s7 md:pt-s8 lg:pt-0 pb-s10 md:pb-s10 lg:pb-s12 bg-neutral-nude">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s5 md:gap-y-s4 lg:gap-y-s6">
      <p
        class="col-span-6 md:col-span-8 lg:col-span-8 col-start-2 md:col-start-3 lg:col-start-4 md:pt-s4 lg:pt-0 md:pb-s4 lg:pb-0 body-2">
        <?php echo $row['statistics_group']['resume_testimonial']; ?></p>
      <div
        class="col-span-6 md:col-span-7 lg:col-span-4 md:col-start-6 lg:col-start-6 flex items-center justify-start pt-s3 md:pt-0">
        <img class="max-w-[145px] md:max-w-full" src="<?php echo $row['statistics_group']['photo_testimonial']; ?>"
          alt="<?php echo $row['statistics_group']['name_testimonial']; ?>" />
        <div class="flex flex-col pl-s2 md:pl-s6 lg:pl-s2 md:pr-s3 lg:pr-0 gap-s2">
          <h4 class="heading-3 text-neutral-dgray w-full md:max-w-[195px]">
            <?php echo $row['statistics_group']['name_testimonial']; ?></h4>
          <p class="body-3"><?php echo $row['statistics_group']['position_testimonial']; ?></p>
        </div>
      </div>
      <div class="col-span-6 md:col-span-10 lg:col-span-11 md:col-start-2 lg:col-start-2 lg:pb-s10">
        <?php foreach($row['statistics_group']['relation_items'] as $key => $item): ?>
        <div class="body-4 flex items-center justify-start gap-2"><?php echo $key+1; ?>.
          <?php echo $item['list_relations'] ?></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- End Statics home -->


<!-- Quote home -->

<?php if($row['acf_fc_layout'] == 'quote_home_layout') : ?>

<section
  class="relative section py-s10 lg:py-s20 bg-quote-home-mobile md:bg-quote-home-tablet lg:bg-quote-home-desktop bg-no-repeat bg-cover bg-center">
  <div class="container max-w-[1170px] mx-auto">
    <h2 class="heading-2"><?php echo $row['quote_group']['resume'] ?></h2>
  </div>
</section>

<?php endif; ?>

<!-- End Quote home -->


<!-- How it works home -->

<?php if($row['acf_fc_layout'] == 'how_it_works_home_layout') : ?>

<section
  class="relative section py-s8 md:py-s12 lg:py-s10 bg-secondary-carbon bg-how-works-home-mobile md:bg-how-works-home-tablet lg:bg-how-works-home-desktop bg-no-repeat bg-center bg-cover">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s5 md:gap-y-s6 lg:gap-y-s13 text-neutral-nwhite">
      <h2 class="col-span-6 md:col-span-12 heading-1"><?php echo $row['how_it_works_group']['title']; ?></h2>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s4">

        <div class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 flex flex-col">
          <?php foreach($row['how_it_works_group']['steps'] as $key => $value): ?>
          <h3 class="heading-3"><?php echo $key+1; ?>. <?php echo $value['title']; ?></h3>
          <?php endforeach; ?>
        </div>

        <p class="body-2 col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2">
          <?php echo $row['how_it_works_group']['resume']; ?></p>

        <div
          class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 grid grid-cols-12 gap-x-s2 lg:gap-x-s10 gap-y-s7">

          <?php 
						foreach($row['how_it_works_group']['how_it_works_list'] as $value): 
					?>
          <div class="col-span-12 md:col-span-6">
            <div class="grid grid-cols-6 gap-y-s2 lg:gap-y-s6 gap-x-s2">
              <div class="col-span-1 col-start-1 flex flex-col items-start">
                <img class="min-w-[55px] md:min-w-[64px] aspect-square" src="<?php echo $value['icon'] ?>" alt="Icon" />
              </div>
              <p class="col-span-5 lg:col-span-5 col-start-2 body-2 pl-s2 md:pl-0"><?php echo $value['description']; ?>
              </p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <div
          class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 pt-s5 md:pt-s8 lg:pt-s3 flex flex-col lg:flex-row items-center justify-center gap-s3 md:gap-s4 lg:gap-s2">

          <?php if($row['how_it_works_group']['link_request_a_demo']): ?>
          <a target="<?php echo $row['how_it_works_group']['link_request_a_demo']['target'] ? $row['how_it_works_group']['link_request_a_demo']['target'] : '_self'; ?>"
            href="<?php echo  $row['how_it_works_group']['link_request_a_demo']['url']; ?>"
            class="btn-secondary-inverted">
            <?php echo  $row['how_it_works_group']['link_request_a_demo']['title']; ?>
          </a>
          <?php endif; ?>

          <?php if($row['how_it_works_group']['link_learn_more']): ?>
          <a target="<?php echo $row['how_it_works_group']['link_learn_more']['target'] ? $row['how_it_works_group']['link_learn_more']['target'] : '_self'; ?>"
            href="<?php echo  $row['how_it_works_group']['link_learn_more']['url']; ?>" class="btn-tertiary-white">
            <?php echo  $row['how_it_works_group']['link_learn_more']['title']; ?>
          </a>
          <?php endif; ?>

        </div>

        <div class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 pt-s4 md:pt-s1 lg:pt-s6">
          <p class="body-4"><?php echo $row['how_it_works_group']['note']; ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- End How it works home -->


<!-- Single testimonial -->

<?php if($row['acf_fc_layout'] == 'single_testimonial_home_layout') : ?>

<section class="relative section w-full pt-s8 md:pt-s12 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s8 md:gap-x-s2 md:gap-y-s10">
      <h3 class="col-span-6 md:col-span-10 lg:col-span-9 heading-3 text-neutral-dgray">
        <?php echo $row['testimonial_group']['testimonial']; ?>
      </h3>
      <div
        class="col-span-6 md:col-span-7 lg:col-span-5 md:col-start-6 lg:col-start-6 lg:pl-s6 flex items-center justify-start">
        <img class="max-w-[145px] md:max-w-full" src="<?php echo $row['testimonial_group']['image']; ?>"
          alt="<?php echo $row['testimonial_group']['name']; ?>" />
        <div class="flex flex-col pl-s2 gap-s2">
          <?php if($row['testimonial_group']['name'] !== ''): ?>
          <h4 class="text-h3Mobile md:text-h3Tablet lg:text-h3 text-neutral-dgray w-full md:max-w-[195px]">
            <?php echo $row['testimonial_group']['name']; ?></h4>
          <?php endif; ?>
          <p class="text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $row['testimonial_group']['position']; ?></p>
        </div>
      </div>

      <!-- <p class="col-span-5 md:col-span-8 lg:col-span-9 md:col-start-3 lg:col-start-3 body-1"><?php //echo $row['testimonial_group']['resume_text']; ?></p> -->
    </div>
  </div>
</section>

<?php endif; ?>

<!-- End single testimonial -->


<!-- What we do home -->

<?php if($row['acf_fc_layout'] == 'what_we_do_home_layout') : ?>

<section
  class="what-we-do-home relative z-10 section w-full pt-s10 md:pt-s16 lg:pt-s20 pb-s14 lg:pb-s12 -mt-s10 lg:-mt-s12 bg-cover bg-no-repeat bg-center bg-what-we-do-mobile md:bg-what-we-do-tablet lg:bg-what-we-do-desktop bg-transparent">

  <div class="container mx-auto md:pt-s14 lg:pt-s14 lg:pb-s14">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6">

      <h4
        class="col-span-12 md:col-span-12 col-start-1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-nwhite uppercase">
        <?php echo $row['what_we_do_group']['title_tag']; ?></h4>
      <h2
        class="col-span-12 md:col-span-11 lg:col-span-11 col-start-1 text-h2Mobile md:text-h2Tablet lg:text-h2 text-neutral-nwhite">
        <?php echo $row['what_we_do_group']['main_title']; ?></h2>
      <p class="col-span-12 md:col-span-6 lg:col-span-4 lg:col-start-4 text-neutral-nwhite body-2">
        <?php echo $row['what_we_do_group']['first_description']; ?></p>
      <p class="col-span-12 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-8 text-neutral-nwhite body-2">
        <?php echo $row['what_we_do_group']['second_description']; ?></p>
      <div class="col-span-12 lg:col-span-3 lg:col-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">

        <?php if($row['what_we_do_group']['link_request_a_demo']): ?>
        <a target="<?php echo $row['what_we_do_group']['link_request_a_demo']['target'] ? $row['what_we_do_group']['link_request_a_demo']['target'] : '_self'; ?>"
          href="<?php echo  $row['what_we_do_group']['link_request_a_demo']['url']; ?>" class="btn-secondary-inverted">
          <?php echo  $row['what_we_do_group']['link_request_a_demo']['title']; ?>
        </a>
        <?php endif; ?>

        <?php if($row['what_we_do_group']['link_learn_more']): ?>
        <a target="<?php echo $row['what_we_do_group']['link_learn_more']['target'] ? $row['what_we_do_group']['link_learn_more']['target'] : '_self'; ?>"
          href="<?php echo  $row['what_we_do_group']['link_learn_more']['url']; ?>" class="btn-tertiary-white">
          <?php echo  $row['what_we_do_group']['link_learn_more']['title']; ?>
        </a>
        <?php endif; ?>

      </div>

    </div>

  </div>

</section>

<?php endif; ?>

<!-- End What we do home -->


<!-- Mission challenges platform -->

<?php if($row['acf_fc_layout'] == 'mission_challenges_layout'): ?>

<section class="relative section w-full pt-s12 md:pt-s10 lg:pb-s6 bg-neutral-nude">
  <div class="container mx-auto">

    <?php if($row['acf_fc_layout'] == 'mission_challenges_layout') : ?>
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s4 md:gap-y-s6">

      <h2 class="heading-1 font-normal col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s2 lg:pb-s1">
        <span class="col-span-6 md:col-span-12">
          <?php echo $row['mission_challenges_group']['title_first_row']; ?>
        </span>
        <span class="col-span-6 md:col-span-10 lg:col-span-10 col-start-2 md:col-start-2 lg:col-start-2">
          <?php echo $row['mission_challenges_group']['title_second_row']; ?>
        </span>
      </h2>

      <p class="body-2 col-span-6 md:col-span-7 md:col-start-5 lg:col-span-6 lg:col-start-6 pb-s2 lg:pb-s6">
        <?php echo $row['mission_challenges_group']['resume']; ?></p>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-y-s6 md:gap-y-s8">

        <?php foreach($row['mission_challenges_group']['list_items'] as $item) : ?>
        <div
          class="col-span-6 md:col-span-7 lg:col-span-5 col-start-1 md:col-start-5 lg:col-start-6 flex items-start gap-s2">
          <img class="w-[39px] md:w-[64px] aspect-square" src="<?php echo esc_url($item['icon']); ?>"
            alt="<?php echo $item['title']; ?>" />
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

<!-- End Mission challenges platform -->


<!-- Better way platform -->

<?php if( $row['acf_fc_layout'] == 'better_way_platform_layout'): ?>

<section class="relative section w-full pt-s10 md:pt-s12 pb-s10 bg-neutral-nude">
  <div class="container mx-auto">

    <?php if($row['acf_fc_layout'] == 'better_way_platform_layout') : ?>
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s4">

      <h2 class="heading-1 font-normal col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s2 lg:pb-s1">
        <span class="col-span-6 md:col-span-12">
          <?php echo $row['better_way_group']['title_first_row']; ?>
        </span>
        <span class="col-span-6 md:col-span-10 lg:col-span-10 col-start-2 md:col-start-2 lg:col-start-2">
          <?php echo $row['better_way_group']['title_second_row']; ?>
        </span>
      </h2>

      <p class="body-2 col-span-6 md:col-span-7 md:col-start-5 lg:col-span-6 lg:col-start-6 pb-s2 md:pb-s2 lg:pb-s6">
        <?php echo $row['better_way_group']['resume']; ?>
      </p>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-y-s6 md:gap-y-s8 md:gap-x-s2">
        <?php foreach($row['better_way_group']['list_items'] as $item) : ?>
        <div class="col-span-6 md:col-span-4 lg:col-span-4 flex items-start gap-3">
          <img class="w-[39px] md:w-[60px] aspect-square" src="<?php echo $item['icon']; ?>"
            alt="<?php echo $item['title']; ?>" />
          <div class="description-wysiwyg w-auto lg:pr-s1">
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

<!-- End Better way platform -->


<!-- Case study platform -->

<?php if($row['acf_fc_layout'] == 'case_study_platform_layout') : ?>

<section class="section relative w-full py-s10 bg-secondary-aqua flex flex-col gap-s9">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:py-s6 md:py-s8">
      <h4 class="col-span-12 heading-4 uppercase"><?php echo $row['case_study_group']['eyebrown']; ?></h4>
      <h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1">
        <span class="block col-span-12">
          <?php echo $row['case_study_group']['title_first_row']; ?>
        </span>
        <span class="block col-span-12">
          <?php echo $row['case_study_group']['title_second_row']; ?>
        </span>
      </h2>
    </div>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s8 lg:py-s6 pt-s4 md:pt-0">

      <?php 
			$i = 0;
			foreach($row['case_study_group']['list_items'] as $item): 
				$i++;
			?>

      <?php if($i % 2 == 1): ?>
      <div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-5 lg:col-start-1">

        <div style="grid-template-columns: 64px 1fr" class="grid gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
            <img class="w-[55px] lg:w-[64px]" src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>" />
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
            <?php echo $item['title']; ?>
          </h3>
          <div class="col-start-2 col-span-1 row-start-2">
            <p class="body-2 lg:max-w-[368px]">
              <?php echo $item['resume']; ?>
            </p>
          </div>
        </div>

      </div>
      <?php else : ?>
      <div class="col-span-12 md:col-span-10 lg:col-span-7 md:col-start-2 lg:col-start-7">

        <div style="grid-template-columns: 64px 1fr" class="grid gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
            <img class="w-[55px] lg:w-[64px]" src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>" />
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
            <?php echo $item['title']; ?>
          </h3>
          <div class="col-start-2 col-span-1 row-start-2">
            <p class="body-2 lg:max-w-[368px]">
              <?php echo $item['resume']; ?>
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

    <?php if($row['case_study_group']['cta_text']): ?>
    <a target="<?php echo $row['case_study_group']['cta_text']['target'] ? $row['case_study_group']['cta_text']['target'] : '_self'; ?>"
      href="<?php echo  $row['case_study_group']['cta_text']['url']; ?>" class="btn btn-tertiary">
      <?php echo  $row['case_study_group']['cta_text']['title']; ?>
    </a>
    <?php endif; ?>

  </div>
</section>

<?php endif; ?>

<!-- End Case study platform -->


<!-- Benefits platform -->

<?php if($row['acf_fc_layout'] == 'benefits_platform_layout') : ?>

<section
  class="relative section w-full pt-s8 md:pt-s12 pb-s8 md:pb-s12 bg-primary-glaciar bg-benefits-mobile md:bg-benefits-tablet lg:bg-benefits-desktop bg-cover bg-no-repeat bg-left-bottom">
  <div class="container mx-auto flex flex-col gap-s8 md:gap-s10 lg:gap-s8">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s4">

      <h4 class="col-span-6 md:col-span-12 heading-4 uppercase"><?php echo $row['benefits_group']['title_flag']; ?></h4>

      <h2 class="col-span-6 md:col-span-4 lg:col-span-4 heading-2 pt-s2 lg:pt-0">
        <?php echo $row['benefits_group']['title']; ?></h2>

      <div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 pt-s2 md:pt-s6 lg:pt-s20 pb-s1 lg:pb-0">
        <p class="body-2"><?php echo $row['benefits_group']['resume']; ?></p>
      </div>

    </div>
  </div>
</section>

<?php endif; ?>

<!-- End benefits platform -->


<!-- Key features platform -->

<?php if($row['acf_fc_layout'] == 'key_features_platform_layout') : ?>

<section class="relative section py-s8 md:py-s12 lg:py-s10 bg-primary-violet ">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s5 md:gap-y-s6 lg:gap-y-s13 text-neutral-nwhite">
      <h2 class="col-span-6 md:col-span-12 heading-1"><?php echo $row['key_features_group']['title']; ?></h2>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s4">

        <div
          class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 grid grid-cols-12 gap-x-s2 lg:gap-x-s10 gap-y-s7">

          <?php 
						foreach($row['key_features_group']['key_features_list'] as $value): 
					?>
          <div class="col-span-12 md:col-span-6 md:pr-s2">
            <div class="grid grid-cols-6 gap-y-s2 lg:gap-y-s4 md:gap-x-s2">
              <div class="col-span-1 col-start-1">
                <img class="w-[55px] md:w-[64px] aspect-square" src="<?php echo $value['icon'] ?>" alt="Icon" />
              </div>
              <h3 class="heading-3 col-start-2 col-span-5 lg:col-span-5 max-md:pl-s2"><?php echo $value['title']; ?>
              </h3>
              <p class="body-2 col-span-5 lg:col-span-5 col-start-2 lg:col-start-2 row-start-2 max-md:pl-s2">
                <?php echo $value['description']; ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <div
          class="col-span-6 md:col-span-12 lg:col-span-11 lg:col-start-2 pt-s5 md:pt-s8 lg:pt-s3 flex flex-col lg:flex-row items-center justify-center gap-s3 md:gap-s4 lg:gap-s2">

          <?php if($row['key_features_group']['link_request_a_demo']): ?>
          <a target="<?php echo $row['key_features_group']['link_request_a_demo']['target'] ? $row['key_features_group']['link_request_a_demo']['target'] : '_self'; ?>"
            href="<?php echo  $row['key_features_group']['link_request_a_demo']['url']; ?>"
            class="btn-secondary-inverted">
            <?php echo  $row['key_features_group']['link_request_a_demo']['title']; ?>
          </a>
          <?php endif; ?>

          <?php if($row['key_features_group']['link_learn_more']): ?>
          <a target="<?php echo $row['key_features_group']['link_learn_more']['target'] ? $row['key_features_group']['link_learn_more']['target'] : '_self'; ?>"
            href="<?php echo  $row['key_features_group']['link_learn_more']['url']; ?>" class="btn-tertiary-white">
            <?php echo  $row['key_features_group']['link_learn_more']['title']; ?>
          </a>
          <?php endif; ?>

        </div>

      </div>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- end key features platform -->


<!-- Values title -->

<?php if($row['acf_fc_layout'] == 'value_proposition_platform_layout') : ?>

<section class="relative section w-full pt-s13 md:pt-s12 lg:pt-s8 pb-s4 md:pb-s6 lg:pb-s12">

  <div class="container mx-auto">
    <?php if($row['value_propositions_group']) : ?>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-0">
      <h4 class="col-span-12 md:col-span-12 col-start-1 pb-s6 heading-4 uppercase">
        <?php echo $row['value_propositions_group']['flag_title']; ?></h4>
      <h2 class="col-span-12 grid grid-cols-12 heading-1 !font-normal">
        <span class="col-span-12 "><?php echo $row['value_propositions_group']['title_first_line']; ?></span>
        <span class="col-span-12"><?php echo $row['value_propositions_group']['title_second_line']; ?></span>
        <?php if($row['value_propositions_group']['title_third_line'] !== ''): ?>
        <span
          class="col-span-10 lg:col-span-9 md:col-start-2 lg:col-start-3"><?php echo $row['value_propositions_group']['title_third_line']; ?></span>
        <?php endif; ?>
      </h2>
    </div>
    <?php endif; ?>
  </div>

</section>

<?php endif; ?>

<!-- end values title -->


<!-- Values list -->

<?php if($row['acf_fc_layout'] == 'values_list_platform_layout') : ?>

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

    <div
      class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap lg:gap-y-0 pb-s6 md:pb-s10 lg:pb-s12 last-of-type:max-md:pb-s8 last-of-type:lg:!pb-0">
      <div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col items-start gap-s3">

        <?php  foreach($row['card_item'] as $card) : ?>

        <?php if($card['acf_fc_layout'] == 'title') : ?>
        <h3 class="heading-10"><?php echo $card['title']; ?></h3>
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
        <!-- <img src="<?php //echo $card['image']; ?>"  /> -->
        <img src="<?php echo $card['image']; ?>"
          class="max-lg:min-h-[445px] max-md:min-h-[290px] max-lg:object-cover max-lg:rounded-card" />
        <?php endif; ?>

        <?php endforeach; ?>

      </div>
    </div>
    <!-- text left - img right -->

    <?php else: ?>

    <div
      class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 md:pb-s10 lg:pb-s12 last-of-type:max-md:pb-s8 last-of-type:lg:!pb-0">
      <div class="col-span-12 md:col-span-6">

        <?php foreach($row['card_item'] as $card) : ?>

        <?php if ($card['acf_fc_layout'] == 'image') : ?>
        <!-- <img src="<?php //echo $card['image']; ?>"  /> -->
        <img src="<?php echo $card['image']; ?>"
          class="max-lg:min-h-[445px] max-md:min-h-[290px] max-lg:object-cover max-lg:rounded-card" />
        <?php endif; ?>

        <?php endforeach; ?>

      </div>
      <div
        class="col-span-12 md:col-span-5 lg:col-span-4 md:col-start-8 lg:col-start-8 flex flex-col items-start gap-s3">

        <?php foreach($row['card_item'] as $card) : ?>

        <?php if($card['acf_fc_layout'] == 'title') : ?>
        <h3 class="heading-10"><?php echo $card['title']; ?></h3>
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
		?>

  </div>

</section>

<?php endif; ?>

<!-- end values list -->


<!-- Envision about -->

<?php if($row['acf_fc_layout'] == 'envision_block_about_us_layout') : ?>

<section
  class="relative section w-full pt-s5 md:pt-s10 pb-s8 md:pb-s12 -mt-[2.3rem] md:-mt-s10 lg:-mt-s10  bg-primary-glaciar bg-about-envision-mobile md:bg-about-envision-tablet lg:bg-about-envision-desktop bg-cover bg-no-repeat bg-left-bottom">
  <div class="container mx-auto flex flex-col gap-s8 md:gap-s10 lg:gap-s8">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s6">

      <h2 class="col-span-6 md:col-span-12 lg:col-span-12 heading-2 pt-s8 md:pt-s12 lg:pt-s10">
        <?php echo $row['envision_section_group']['title']; ?></h2>

      <div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 pb-s1 lg:pb-0">
        <ul class="flex flex-col gap-s4 pb-s5">
          <?php foreach($row['envision_section_group']['bullets_description'] as $item): ?>
          <li class="relative pl-3 body-2">
            <span class="absolute left-0 top-3 block w-1 h-1 aspect-square bg-neutral-dgray rounded-full"></span>
            <?php echo $item['description']; ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <h3 class="heading-3"><?php echo $row['envision_section_group']['message']; ?></h3>
      </div>

    </div>
  </div>
</section>

<?php endif; ?>

<!-- End envision about -->


<!-- Case study about -->

<?php if($row['acf_fc_layout'] == 'case_study_about_us_layout') : ?>

<section id="case-study" class="relative section pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s10">
  <div class="container mx-auto">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2">
      <h4 class="col-span-6 heading-4 pb-s3 md:pb-s2 lg:pb-s4"><?php echo $row['case_study_group']['eyebrown']; ?></h4>
      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12">
        <h2 class="col-span-6 md:col-span-8 lg:col-span-8 heading-2 pb-s3 md:pb-s6">
          <?php echo $row['case_study_group']['title']; ?></h2>
      </div>
      <div class="col-span-6 md:col-span-12 lg:col-span-4 pb-s5 lg:pb-0">
        <picture class="w-full">
          <source media="(min-width:1025px)" srcset="<?php echo $row['case_study_group']['image_desktop']; ?>">
          <source media="(min-width:768px)" srcset="<?php echo $row['case_study_group']['image_tablet']; ?>">
          <img src="<?php echo $row['case_study_group']['image_mobile']; ?>"
            alt="<?php echo $row['case_study_group']['title']; ?>" class="h-full w-full">
        </picture>
      </div>
      <div class="col-span-6 md:col-span-12 lg:col-span-7 lg:col-start-6">
        <p class="body-2"><?php echo $row['case_study_group']['resume']; ?></p>
      </div>
      <div class="col-span-6 md:col-span-12 lg:col-span-4 lg:col-start-6 pt-s5 md:pt-s8 lg:pt-s10">

        <?php if($row['case_study_group']['cta_link']): ?>
        <a target="<?php echo $row['case_study_group']['cta_link']['target'] ? $row['case_study_group']['cta_link']['target'] : '_self'; ?>"
          href="<?php echo  $row['case_study_group']['cta_link']['url']; ?>" class="btn-secondary">
          <?php echo  $row['case_study_group']['cta_link']['title']; ?>
        </a>
        <?php endif; ?>

      </div>
      <div class="col-span-6 md:col-span-12 lg:col-span-9 lg:col-start-2 pt-s5 md:pt-s6 lg:pt-s6">
        <ul>
          <?php foreach($row['case_study_group']['credits'] as $key => $value): ?>
          <li class="relative body-4 pl-s4">
            <span class="absolute left-0 top-0"><?php echo $key+1; ?>.</span>
            <?php echo $value['data'] ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

  </div>
</section>

<?php endif; ?>

<!-- End Case study about -->


<!-- What we do about -->

<?php if($row['acf_fc_layout'] == 'what_we_do_about_us_layout') : ?>

<section
  class="what-we-do-home relative z-10 section w-full pt-s10 md:pt-s20 lg:pt-s20 pb-s14 md:pb-s20 lg:pb-s12 -mt-s10 lg:-mt-s12 bg-cover bg-no-repeat bg-center bg-what-we-do-mobile md:bg-what-we-do-about-tablet lg:bg-what-we-do-desktop bg-transparent">

  <div class="container mx-auto md:pt-s1 lg:pt-s18 pb-s1 lg:pb-s18">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6">

      <h4
        class="col-span-12 md:col-span-12 col-start-1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-nwhite uppercase">
        <?php echo $row['what_we_do_group']['what_title_tag']; ?></h4>
      <h2
        class="col-span-12 md:col-span-11 lg:col-span-11 col-start-1 text-h2Mobile md:text-h2Tablet lg:text-h2 text-neutral-nwhite">
        <?php echo $row['what_we_do_group']['what_main_title']; ?></h2>
      <p class="col-span-12 md:col-span-6 lg:col-span-4 lg:col-start-4 text-neutral-nwhite body-2">
        <?php echo $row['what_we_do_group']['what_first_description']; ?></p>
      <p class="col-span-12 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-8 text-neutral-nwhite body-2">
        <?php echo $row['what_we_do_group']['what_second_description']; ?></p>

    </div>

  </div>

</section>

<?php endif; ?>

<!-- End what we do about -->


<!-- Culture pillars careers -->

<?php if($row['acf_fc_layout'] == 'culture_pillars_careers_layout') : ?>

<section class="section">
  <div class="container mx-auto px-s2 flex flex-col items-stretch">
    <div class="flex flex-col items-stretch py-s8 md:py-s12 gap-s4 md:gap-s6">
      <h2 class="heading-1"><?php echo $row['culture_pillars_group']['title']; ?></h2>
      <div
        class="grid grid-cols-2 gap-x-s6 md:gap-x-s10 lg:gap-x-s6 gap-y-s4 md:gap-y-s10 lg:gap-y-s6 [&>figure>img]:max-h-[330px]">

        <?php foreach($row['culture_pillars_group']['list_items'] as $item): ?>
        <figure
          class="flex flex-col items-start justify-normal gap-s4 md:gap-s3 col-span-2 md:col-span-1 lg:col-span-1">
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

<!-- End Culture pillars careers -->


<!-- Why accumulus careers -->

<?php if($row['acf_fc_layout'] == 'why_accumulus_careers_layout') : ?>

<section class="section relative w-full py-s8 md:py-s10 lg:py-s12 bg-neutral-offwhite">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 pb-s8 md:pb-s6">
      <h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1 text-neutral-dgray">
        <span class="block col-span-12">
          <?php echo $row['why_accumulus_group']['title_first_line']; ?>
        </span>
        <span class="block col-span-10 col-start-2 row-start-2">
          <?php echo $row['why_accumulus_group']['title_second_line']; ?>
        </span>
      </h2>
    </div>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s10 lg:gap-y-s8">

      <?php 
        $i = 0;
        foreach($row['why_accumulus_group']['list_items'] as $item): 
        $i++;
      ?>
      <?php if($i % 2 == 1): ?>
      <div class="col-span-12 md:col-span-6 lg:col-span-5">
        <div class="grid grid-cols-[64px, 1fr] gap-x-s2 gap-y-s3">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
            <img src="<?php echo $item['icon']; ?>" alt="<?php echo strip_tags($item['title']); ?>"
              class="w-[39px] md:w-[64px]" />
          </div>
          <h3 class="heading-3 col-start-2 col-span-1 text-neutral-dgray">
            <?php echo $item['title'] ?>
          </h3>
          <p class="body-2 col-start-2 col-span-1 row-start-2 text-neutral-dgray">
            <?php echo $item['description'] ?>
          </p>
        </div>
      </div>
      <?php else : ?>
      <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-7">
        <div class="grid grid-cols-[64px, 1fr] gap-x-s2 gap-y-s3">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
            <img src="<?php echo $item['icon']; ?>" alt="<?php echo strip_tags($item['title']); ?>"
              class="w-[39px] md:w-[64px]" />
          </div>
          <h3 class="heading-3 col-start-2 col-span-1 text-neutral-dgray">
            <?php echo $item['title'] ?>
          </h3>
          <p class="body-2 col-start-2 col-span-1 row-start-2 text-neutral-dgray">
            <?php echo $item['description'] ?>
          </p>
        </div>
      </div>
      <?php endif; ?>
      <?php endforeach; ?>

    </div>
    <div class="flex items-center justify-center pt-s5 md:pt-s6 lg:pt-s10">

      <?php if($row['why_accumulus_group']['cta_link']): ?>
      <a target="<?php echo $row['why_accumulus_group']['cta_link']['target'] ? $row['why_accumulus_group']['cta_link']['target'] : '_self'; ?>"
        href="<?php echo  $row['why_accumulus_group']['cta_link']['url']; ?>" class="btn-tertiary">
        <?php echo  $row['why_accumulus_group']['cta_link']['title']; ?>
      </a>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php endif; ?>

<!-- End Why accumulus careers -->


<!-- Slider testimonial -->

<?php if($row['acf_fc_layout'] == 'testimonial_slider_careers_layout') : ?>

<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 bg-neutral-nwhite">
  <div class="relative container mx-auto">

    <h4 class="heading-4 pb-s4 md:pb-s6">TESTIMONIALS</h4>
    <div class="general-slide">
      <?php foreach($row['testimonials_group']['list_testimonials'] as $slide): ?>
      <div class="general-slide__item">
        <div class="grid grid-cols-6 md:grid-cols-12 gap-s8 md:gap-x-s2 md:gap-y-s10">
          <h3 class="col-span-6 md:col-span-10 lg:col-span-9 heading-3 text-neutral-dgray">
            “<?php echo $slide['text_testimonial'] ?>”
          </h3>
          <div
            class="col-span-6 md:col-span-7 lg:col-span-5 md:col-start-6 lg:col-start-6 flex items-start justify-start gap-s2">

            <?php 
                if($slide['photo_user']): 
              ?>
            <img class="max-w-[145px] md:max-w-full rounded-3xl" src="<?php echo $slide['photo_user']; ?>"
              alt="<?php echo $slide['name_user']; ?>" />
            <?php else: ?>
            <img class="max-w-[145px] md:max-w-full rounded-3xl"
              src="<?php bloginfo('template_url'); ?>/images/thumb-user.png" alt="<?php echo $slide['name_user']; ?>" />
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
        <img class="block w-[54px] h-[54px] aspect-square rotate-180"
          src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
      </div>
      <div class="next xl:absolute xl:-right-20 xl:top-[200px] cursor-pointer">
        <img class="block w-[54px] h-[54px] aspect-square" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
      </div>
    </div>

  </div>
</section>

<?php endif; ?>

<!-- Slider testimonial -->


<!-- Citations case for change -->

<?php if($row['acf_fc_layout'] == 'citations_case_for_change_layout') : ?>

<section
  class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 bg-neutral-dgray text-neutral-nwhite bg-citation-mobile md:bg-citation-tablet lg:bg-citation-desktop bg-no-repeat bg-contain bg-right-top">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s4 md:gap-y-s10 lg:gap-y-s6">

      <h3 class="col-span-6 md:col-span-12 heading-2">Citations</h3>

      <?php foreach($row['citations_group']['citation'] as $key => $item ): ?>

      <div
        class="relative col-span-6 md:col-span-6 lg:col-span-5 <?php if($key+1 % 2 == 2 ): ?>lg:col-start-8<?php endif; ?> text-b3Mobile md:text-b3Tablet lg:text-b3 pl-s2 break-all text-wrap">
        <span class="absolute top-0 left-0 text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $key + 1 ?>.</span>
        <?php echo $item['resume']; ?>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php endif; ?>

<!-- End Citations case for change -->


<!-- Contact form -->

<?php if($row['acf_fc_layout'] == 'contact_form_contact_us_layout') : ?>

<section
  class="translucent-navigation relative section w-full pb-s8 md:pb-s7 lg:pb-s12 min-h-full bg-cover lg:bg-contain bg-left-bottom lg:bg-left-top bg-no-repeat"
  style="background-image: url(<?php bloginfo( 'template_url' ); ?>/images/contact/bg-contact.png);">

  <div class="container mx-auto px-s4 lg:px-0 min-h-full pt-s5 md:pt-s10 lg:pt-s9">

    <div class="grid lg:grid-cols-12 lg:items-stretch gap-4">

      <div class="col-span-12 md:col-span-12 lg:col-span-7 lg:flex lg:flex-col lg:justify-between">

        <h1 class="heading-1">
          Contact Us
        </h1>

        <div class="col-span-12 pt-s4 lg:pt-0 lg:col-span-3 hidden lg:flex items-end gap-4">
          <p class="body-2 leading-6">
            <?php if($row['contact_group']['phone_number'] !== ''): ?>
            <a
              href="tel:<?php echo $row['contact_group']['phone_number'] ?>"><?php echo $row['contact_group']['phone_number'] ?></a>
            <?php endif; ?>
            <br />
            <?php if($row['contact_group']['contact_email'] !== ''): ?>
            <a
              href="mailto: <?php echo $row['contact_group']['contact_email']; ?>"><?php echo $row['contact_group']['contact_email']; ?></a>
            <?php endif; ?>
          </p>
          <?php 
					if($row['contact_group']['linkedin'] !== ''): 
					?>
          <p class="body-2 -mb-[1px]">
            <a href="<?php echo $row['contact_group']['linkedin']; ?>" class="leading-6">LinkedIn</a>
          </p>
          <?php endif; ?>
        </div>
      </div>


      <div class="col-span-12 md:col-span-12 lg:col-span-5 pt-s2 md:pt-s8 lg:pt-0">
        <h2 class="heading-2 max-lg:pl-[35%] max-md:pl-0">Say Hello</h2>
        <?php echo do_shortcode( $row['contact_group']['form_shortcut'] ); ?>
      </div>

      <div class="col-span-12 pt-s4 flex lg:hidden items-end gap-4">
        <p class="body-2 leading-6">
          <?php if($row['contact_group']['phone_number'] !== ''): ?>
          <a
            href="tel:<?php echo $row['contact_group']['phone_number'] ?>"><?php echo $row['contact_group']['phone_number'] ?></a>
          <?php endif; ?>
          <br />
          <?php if($row['contact_group']['contact_email'] !== ''): ?>
          <a
            href="mailto: <?php echo $row['contact_group']['contact_email']; ?>"><?php echo $row['contact_group']['contact_email']; ?></a>
          <?php endif; ?>
        </p>
        <?php 
				if($row['contact_group']['linkedin'] !== ''): 
				?>
        <p class="body-2 -mb-[1px]">
          <a href="<?php echo $row['contact_group']['linkedin']; ?>" class="leading-6">LinkedIn</a>
        </p>
        <?php endif; ?>
      </div>

    </div>
    <!-- Grid -->

  </div>
  <!-- Container -->

</section>

<?php endif; ?>

<!-- End contact form -->


<!-- Benefits core capabilities -->

<?php if($row['acf_fc_layout'] == 'benefits_core_capabilities_layout') : ?>

<section
  class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-secondary-lilac max-lg:!pr-0 max-md:!pr-s2">
  <div class="container mx-auto px-s4 md:px-0 lg:px-0">
    <div class="flex flex-col gap-s8">
      <h2 class="w-full heading-1">Benefits</h2>
      <div class="relative w-full">
        <div class="benefits-slide">
          <?php 

            foreach($row['benefits_group']['benefits'] as $benefit):
          ?>
          <div class="card relative w-full max-w-[370px] mx-s1">

            <div class="relative w-full flex items-center justify-center">
              <img class="block w-full h-full object-cover" src="<?php echo $benefit['image']; ?>"
                alt="<?php echo $benefit['title']; ?>" />
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
          <div class="benefit-prev xl:absolute xl:-left-20 xl:top-1/4 cursor-pointer">
            <img class="block w-[54px] h-[54px] aspect-square rotate-180"
              src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
          </div>
          <div class="benefit-next xl:absolute xl:-right-20 xl:top-1/4 cursor-pointer">
            <img class="block w-[54px] h-[54px] aspect-square"
              src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- Benefits core capabilities -->


<!-- Join the forum get started -->

<?php 

if($row['acf_fc_layout'] == 'join_the_forum_get_started_layout') :

$join_the_forum = $row['join_the_forum_group'];

if($join_the_forum):

?>

<section class="relative section w-full pt-s8 md:pt-s10 pb-s8 md:pb-s12 bg-neutral-nwhite">
  <div class="container mx-auto px-s2 md:px-0">
    <div class="grid grid-cols-6 md:grid-cols-12 lg:grid-cols-12 gap-y-s5 gap-x-s2 md:gap-x-s2 md:gap-s10 lg:gap-s12">

      <h2
        class="heading-1 font-normal col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s2 pb-s3 md:pb-0 lg:pb-s1">
        <span class="col-span-6 md:col-span-12">
          <?php echo $join_the_forum['first_line_title']; ?>
        </span>
        <span class="col-span-6 md:col-span-10 lg:col-span-10 col-start-2 md:col-start-2 lg:col-start-2">
          <?php echo $join_the_forum['second_line_title']; ?>
        </span>
      </h2>

      <?php foreach($join_the_forum['steps_join'] as $item) : ?>
      <div
        class="col-span-6 md:col-span-7 lg:col-span-7 col-start-1 md:col-start-5 lg:col-start-6 flex items-start gap-s3">
        <img class="w-[55px] md:w-[64px] aspect-square" src="<?php echo $item['icon']; ?>"
          alt="<?php echo $item['title']; ?>" />
        <div class="description-wysiwyg w-auto">
          <h3 class="heading-2 pb-s2"><?php echo $item['title']; ?></h3>
          <?php echo $item['description']; ?>
        </div>
      </div>
      <?php endforeach; ?>

      <div class="col-span-6 md:col-span-12 lg:col-span-2 col-start-1 lg:col-start-6 pt-s3 md:pt-0">
        <a class="btn-secondary"
          href="<?php echo $join_the_forum['link_cta']; ?>"><?php echo $join_the_forum['text_cta']; ?></a>
      </div>

    </div>
  </div>
</section>

<?php endif; ?>

<?php endif; ?>

<!-- end Join the forum get started -->


<!-- Benefits get started -->

<?php 

if($row['acf_fc_layout'] == 'benefits_get_started_layout') :

	$benefits = $row['benefits_group'];

	if($benefits):
?>

<section class="section relative w-full bg-neutral-nude">
  <div class="container mx-auto">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s4 pt-s10 md:pt-s12 md:pb-s6">
      <h2
        class="flex flex-col md:grid md:grid-cols-12 md:grid-rows-2 col-span-12 md:gap-s2 heading-1 justify-start items-start">
        <span class="col-span-12">
          <?php echo $benefits['title_first_line']; ?>
        </span>
        <span class="col-span-10 col-start-2 md:col-start-3 max-md:pl-s6">
          <?php echo $benefits['title_second_line']; ?>
        </span>
      </h2>
    </div>
    <!-- Title -->


    <div class="grid grid-cols-6 md:grid-cols-12 grid-rows-auto  gap-x-s2 gap-y-s6 md:gap-y-s10 pt-s4 lg:pt-s6 md:pt-0">

      <?php 
				foreach($benefits['benefit_list'] as $item): 
			?>
      <img class="w-full md:w-[64px] lg:min-w-[64px] aspect-square self-end col-span-1"
        src="<?php echo $item['icon'] ?>" alt="<?php echo $item['title'] ?>" />
      <h3 class="heading-7 col-span-5 md:col-span-3"><?php echo $item['title'] ?></h3>
      <?php endforeach; ?>

      <p class="col-span-6 md:col-span-7 lg:col-span-6 md:col-start-6 lg:col-start-6 body-2">
        <?php echo $benefits['resume']; ?>
      </p>
    </div>
    <!-- Items -->

  </div>
</section>

<?php 
	endif;
endif; 
?>

<!-- End Benefits get started -->


<!-- Join us get started -->

<?php

if($row['acf_fc_layout'] == 'ready_to_join_us_get_started_layout') :
?>

<section
  class="relative section w-full pt-s12 pb-s12 bg-neutral-nude bg-get-started-section-mobile md:bg-get-started-section-tablet lg:bg-get-started-section-desktop bg-cover bg-no-repeat bg-center">
  <div class="container mx-auto">

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s3 md:gap-y-s6">

      <h6 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase">
        <?php echo $row['ready_to_join_us_group']['eyebrown']; ?></h6>
      <h2 class="col-span-12 text-h2Mobile md:text-h2Tablet lg:text-h2">
        <?php echo $row['ready_to_join_us_group']['title']; ?></h2>
      <p class="col-span-12 md:col-span-6 lg:col-span-4 text-b3Mobile md:text-b3Tablet lg:text-b3 py-s2 md:py-0">
        <?php echo $row['ready_to_join_us_group']['resume']; ?></p>
      <div class="col-span-12 flex justify-start">
        <?php if($row['ready_to_join_us_group']['cta_link']): ?>
        <a target="<?php echo $row['ready_to_join_us_group']['cta_link']['target'] ? $row['ready_to_join_us_group']['cta_link']['target'] : '_self'; ?>"
          href="<?php echo  $row['ready_to_join_us_group']['cta_link']['url']; ?>" class="btn-tertiary">
          <?php echo  $row['ready_to_join_us_group']['cta_link']['title']; ?>
        </a>
        <?php endif; ?>
      </div>

    </div>

  </div>
</section>

<?php 
endif;
?>

<!-- End Join us get started -->


<!-- Quote regulator forum -->

<?php if($row['acf_fc_layout'] == 'quote_regulator_forum_layout') : ?>

<?php 

$quote = $row['quote_group'];
if($quote):
?>

<section
  class="relative section py-s8 md:py-s12 lg:py-s10 bg-purple-300 bg-regulator-quote-mobile md:bg-regulator-quote-tablet lg:bg-regulator-quote-desktop bg-cover bg-current bg-no-repeat">
  <div class="container mx-auto px-s2 lg:px-0">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s2">
      <h2 class="col-span-6 md:col-span-10 lg:col-span-11 heading-2 text-cta-dark"><?php echo $quote['text'] ?></h2>
    </div>
  </div>
</section>

<?php 
	endif; 
endif; 
?>

<!-- end Quote regulator forum -->



<!-- Regulatory authorities regulator forum -->


<?php if($row['acf_fc_layout'] == 'regulatory_authorities_regulator_forum_layout') : ?>

<?php 

$regulatory_authorities = $row['regulatory_authorities_group'];

$observers = $row['observers_group'];

if($regulatory_authorities): 

$repeater = $regulatory_authorities['list_authorities'];
$order = array();

?>
<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-neutral-offwhite">
  <div class="container mx-auto px-s2 lg:px-0">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s2 md:gap-s6">

      <h4 class="heading-4 col-span-6 md:col-span-12 uppercase">
        <?php echo $regulatory_authorities['flag_title_regulatory_authorities']; ?></h4>

      <h2 class="col-span-6 md:col-span-10 lg:col-span-12 col-start-1 md:col-start-1 heading-1">
        <?php echo $regulatory_authorities['title_regulatory_authorities']; ?></h2>

      <div
        class="col-span-6 md:col-span-12 flex flex-wrap items-center justify-start gap-y-s2 gap-s4 md:gap-x-s6 lg:gap-x-s7 py-s6 md:py-s3">
        <?php foreach($regulatory_authorities['flags'] as $flag): ?>
        <img src="<?php echo $flag['flag'] ?>" alt="<?php echo $flag['name'] ?>" />
        <?php endforeach; ?>
      </div>

      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 md:grid-rows-5 md:grid-flow-col gap-s5">

        <?php 
					foreach($repeater as $item => $row) {
						$order[$item] = $row['title'];
					}

					array_multisort($order, SORT_STRING, $repeater);

					foreach($repeater as $item => $row) : 
					
				?>

        <div class="relative col-span-3 md:col-span-4 lg:col-span-4">
          <div class="flex flex-col gap-s4">
            <h4 class="heading-7 color-neutral-dgray"><?php echo $row['title']; ?></h4>
            <p class="body-2"><?php echo $row['description']; ?></p>
          </div>
        </div>

        <?php endforeach; ?>

      </div>


      <?php if($observers): ?>

      <h2 class="heading-1 col-span-6 md:col-span-12 pt-s8"><?php echo $observers['title']; ?></h2>

      <ul class="col-span-6 md:col-span-7 md:col-start-6 lg:col-start-6 flex flex-col gap-s3">
        <?php foreach($observers['observers'] as $item): ?>
        <li class="heading-7"><?php echo $item['title'] ?></li>
        <?php endforeach; ?>
      </ul>

      <p class="col-span-6 md:col-span-6 md:col-start-6 lg:col-start-6 body-4">
        <?php echo $observers['description']; ?>
      </p>

      <?php endif; ?>

    </div>
  </div>
</section>
<?php 
	endif; 
endif; 
?>


<!-- Regulatory authorities regulator forum -->


<!-- Participation looks like -->

<?php if($row['acf_fc_layout'] == 'participation_looks_regulator_forum_layout') : ?>

<?php 

$participation_looks = $row['participation_looks_group'];

if($participation_looks): 

?>
<section class="relative section w-full pt-s8 md:pt-s12 lg:pt-s14 pb-s10 md:pb-s12">
  <div class="container mx-auto px-s2 md:px-0">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s8 md:gap-y-s11">

      <h2 class="col-span-6 md:col-span-12 lg:col-span-12 heading-1 max-md:pr-s4">
        <?php echo $participation_looks['title_section']; ?></h2>

      <div class="col-span-6 md:col-span-12 grid grid-cols-12 gap-s2 gap-y-s4 md:gap-y-s11">

        <?php foreach($participation_looks['list_participation'] as $item) : ?>

        <div class="card relative col-span-12 md:col-span-6 lg:col-span-3">
          <div class="relative w-full flex items-center justify-center">
            <img class="block w-full h-full object-cover" src="<?php echo $item['image']; ?>"
              alt="<?php echo $item['title']; ?>" />
          </div>
          <div class="flex flex-col pt-s2">
            <h3 class="heading-3 color-neutral-dgray"><?php echo $item['title']; ?></h3>
          </div>
        </div>

        <?php endforeach; ?>

      </div>

    </div>
  </div>
</section>
<?php 
	endif; 
endif; 
?>

<!-- End Participation looks like -->


<?php if($row['acf_fc_layout'] == 'join_the_forum_regulator_forum_layout') : ?>

<?php 

$join_the_forum = $row['join_the_forum_group'];

if($join_the_forum):

?>

<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-neutral-nwhite">
  <div class="container mx-auto px-s2 md:px-0">
    <div class="grid grid-cols-6 md:grid-cols-12 lg:grid-cols-12 gap-s2 md:gap-x-s2 md:gap-s10 lg:gap-s12">

      <h2 class="heading-1 font-normal col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s2 lg:pb-s1">
        <span class="col-span-6 md:col-span-12">
          <?php echo $join_the_forum['first_line_title']; ?>
        </span>
        <span class="col-span-6 md:col-span-10 lg:col-span-10 col-start-2 md:col-start-2 lg:col-start-2">
          <?php echo $join_the_forum['second_line_title']; ?>
        </span>
      </h2>

      <?php foreach($join_the_forum['steps_join'] as $item) : ?>
      <div
        class="col-span-6 md:col-span-7 lg:col-span-5 col-start-1 md:col-start-5 lg:col-start-6 flex items-start gap-s3">
        <img class="w-[55px] md:w-[64px] aspect-square" src="<?php echo $item['icon']; ?>"
          alt="<?php echo $item['title']; ?>" />
        <div class="description-wysiwyg  w-auto">
          <h3 class="heading-2 pb-s2"><?php echo $item['title']; ?></h3>
          <?php echo $item['description']; ?>
        </div>
      </div>
      <?php endforeach; ?>

      <?php if($join_the_forum['cta']): ?>
      <div class="col-span-6 md:col-span-12">
        <a href="<?php echo $join_the_forum['cta']['url']; ?>"
          target="<?php echo $join_the_forum['cta']['target'] ? $join_the_forum['cta']['target'] : '_self' ?>" download
          class="btn-secondary max-w-[360px] mx-auto"><?php echo $join_the_forum['cta']['title']; ?></a>
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>

<?php 
	endif; 
endif; 
?>

<!-- Join the forum -->


<?php if($row['acf_fc_layout'] == 'leadership_team_layout') : ?>

<?php 
	$teamHeadingLeadership = $row['leadership_section_group'];
  $teamLeadership = get_field('team-list', 'option');
?>

<section class="section py-s8 md:py-s10 lg:py-s13">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s4 lg:gap-y-s10">

      <div class="flex flex-col items-start gap-s4 lg:gap-s3 col-span-12 md:col-span-9 lg:col-span-6">
        <h2 class="heading-1 font-normal"><?php echo $teamHeadingLeadership['title']; ?></h2>
        <p class="body-2 pb-s2 lg:pb-0">
          <?php echo $teamHeadingLeadership['description']; ?>
        </p>
      </div>
      <div class="hidden md:block md:col-span-3 lg:col-span-6"></div>
      <?php
        foreach($teamLeadership as $key => $team_member) {
      ?>
      <figure data-post="<?php echo $key; ?>"
        class="select-none member [&>div>.open]:!flex flex flex-col items-start justify-stretch gap-s2 col-span-6 md:col-span-4 lg:col-span-3">
        <img class="aspect-square w-full rounded-[40px] bg-[#EBEBEB] mb-s1" src="<?php echo $team_member['image']; ?>"
          alt="<?php echo $team_member['name']; ?>">
        <div class="flex flex-row items-center justify-between w-full">
          <h3 class="heading-6"><?php echo $team_member['name']; ?></h3>
          <!-- <svg style="display:none;" class="open" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M7.83008 3.32325V4.95453V6.58461V8.21589V9.84717V11.4785V13.1085V14.7398V16.3711H9.46136V14.7398V13.1085V11.4785V9.84717V8.21589V6.58461V4.95453V3.32325V1.69197H7.83008V3.32325Z" fill="#444444"/>
              <path d="M14.3467 8.21484H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84612H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21484H14.3467Z" fill="#444444"/>
            </svg> -->
          <!-- <svg style="display:none;" class="close" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M14.3467 8.21094H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84222H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21094H14.3467Z" fill="#444444"/>
            </svg> -->
        </div>
        <span class="body-4 text-neutral-sgray"><?php echo $team_member['position']; ?></span>
        <!-- <div style="display:none;" class="summary flex-col items-start gap-s2 col-span-2"> -->
        <div style="display:block;" class="summarys flex-col items-start gap-s2 col-span-2">
          <!-- <p class="body-4 text-neutral-sgray">
              <?php // echo $team_member['description']; ?>
            </p> -->
          <a href="<?php echo $team_member['linkedin']; ?>" target="_blank">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path
                d="M0.738907 5.15332H3.92293V15.3947H0.738907V5.15332ZM2.331 0.0625C3.34866 0.0625 4.17568 0.889524 4.17568 1.90888C4.17568 2.92722 3.34866 3.75424 2.331 3.75424C1.31096 3.75424 0.486328 2.92722 0.486328 1.90888C0.486328 0.889524 1.31096 0.0625 2.331 0.0625Z"
                fill="#444444" />
              <path
                d="M5.91797 5.15399H8.9711V6.55444H9.01461C9.43956 5.74892 10.4782 4.90039 12.0263 4.90039C15.2495 4.90039 15.8445 7.02086 15.8445 9.7784V15.3954H12.6628V10.415C12.6628 9.22699 12.6422 7.6994 11.0088 7.6994C9.35235 7.6994 9.0996 8.99421 9.0996 10.3296V15.3954H5.91797V5.15399Z"
                fill="#444444" />
            </svg>
          </a>
        </div>
      </figure>
      <?php } ?>

    </div>
  </div>
</section>

<?php endif; ?>


<?php if($row['acf_fc_layout'] == 'directors_team_layout') : ?>

<?php 
	$teamHeadingDirectors = $row['directors_section_-_group'];
  $teamDirectors = get_field('team-directors', 'option');
?>

<section class="section py-s8 md:py-s10 bg-neutral-offwhite">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s4 lg:gap-y-s10">
      <div class="flex flex-col items-start gap-s4 lg:gap-s3 col-span-12 md:col-span-9 lg:col-span-6">
        <h2 class="heading-1 font-normal"><?php echo $teamHeadingDirectors['title']; ?></h2>
        <p class="body-2 pb-s2 lg:pb-0">
          <?php echo $teamHeadingDirectors['description']; ?>
        </p>
      </div>
      <div class="hidden md:block md:col-span-3 lg:col-span-6"></div>
      <?php
        foreach($teamDirectors as $key => $team_member) {
      ?>
      <figure data-post="<?php echo $key; ?>"
        class="select-none member [&>div>.open]:!flex flex flex-col items-start justify-stretch gap-s2 col-span-6 md:col-span-4 lg:col-span-3">
        <img class="aspect-square w-full rounded-[40px] bg-[#EBEBEB] mb-s1" src="<?php echo $team_member['image']; ?>"
          alt="<?php echo $team_member['name']; ?>">
        <div class="flex flex-row items-center justify-between w-full">
          <h3 class="heading-6"><?php echo $team_member['name']; ?></h3>
          <!-- <svg style="display:none;" class="open" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M7.83008 3.32325V4.95453V6.58461V8.21589V9.84717V11.4785V13.1085V14.7398V16.3711H9.46136V14.7398V13.1085V11.4785V9.84717V8.21589V6.58461V4.95453V3.32325V1.69197H7.83008V3.32325Z" fill="#444444"/>
              <path d="M14.3467 8.21484H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84612H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21484H14.3467Z" fill="#444444"/>
            </svg> -->
          <!-- <svg style="display:none;" class="close" width="17" height="18" viewBox="0 0 17 18" fill="none">
              <path d="M14.3467 8.21094H12.7154H11.0853H9.45403H7.82275H6.19147H4.56139H2.93011H1.29883V9.84222H2.93011H4.56139H6.19147H7.82275H9.45403H11.0853H12.7154H14.3467H15.978V8.21094H14.3467Z" fill="#444444"/>
            </svg> -->
        </div>
        <span class="body-4 text-neutral-sgray"><?php echo $team_member['position']; ?></span>
        <!-- <div style="display:none;" class="summary flex-col items-start gap-s2 col-span-2"> -->
        <div style="display:block;" class="summarys flex-col items-start gap-s2 col-span-2">
          <!-- <p class="body-4 text-neutral-sgray">
              <?php //echo $team_member['description']; ?>
            </p> -->
          <a href="<?php echo $team_member['linkedin']; ?>" target="_blank">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path
                d="M0.738907 5.15332H3.92293V15.3947H0.738907V5.15332ZM2.331 0.0625C3.34866 0.0625 4.17568 0.889524 4.17568 1.90888C4.17568 2.92722 3.34866 3.75424 2.331 3.75424C1.31096 3.75424 0.486328 2.92722 0.486328 1.90888C0.486328 0.889524 1.31096 0.0625 2.331 0.0625Z"
                fill="#444444" />
              <path
                d="M5.91797 5.15399H8.9711V6.55444H9.01461C9.43956 5.74892 10.4782 4.90039 12.0263 4.90039C15.2495 4.90039 15.8445 7.02086 15.8445 9.7784V15.3954H12.6628V10.415C12.6628 9.22699 12.6422 7.6994 11.0088 7.6994C9.35235 7.6994 9.0996 8.99421 9.0996 10.3296V15.3954H5.91797V5.15399Z"
                fill="#444444" />
            </svg>
          </a>
        </div>
      </figure>
      <?php } ?>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- Team -->


<?php if($row['acf_fc_layout'] == 'form_get_free_pdf_section_layout') : ?>

<?php 
$form_access_content = $row['form_access_group'];
?>

<section id="get-free-pdf" class="relative w-full bg-primary-violet">
  <div class="grid grid-cols-6 md:grid-cols-12 gap-x-4">
    <div class="col-span-6 md:col-span-12 lg:col-span-4">
      <picture class="block w-full h-full">
        <source media="(min-width:1025px)"
          srcset="<?php bloginfo('template_url'); ?>/images/home/form-module-desktop.png">
        <source media="(min-width:768px)"
          srcset="<?php bloginfo('template_url'); ?>/images/home/form-module-tablet.png">
        <img src="<?php bloginfo('template_url'); ?>/images/home/form-module-mobile.png"
          class="w-full h-full object-cover" />
      </picture>
    </div>

    <div
      class="form-module col-span-6 md:col-span-12 lg:col-span-7 lg:col-start-6 px-s2 lg:px-0 pt-s4 md:pt-s8 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 text-neutral-nwhite">
      <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:max-w-[655px]">
        <h4 class="heading-4 col-span-6 md:col-span-12"><?php echo $form_access_content['eyebrown_form_access']; ?></h4>
        <h2 class="heading-2 col-span-6 md:col-span-12"><?php echo $form_access_content['title_form_access']; ?></h2>
        <div class="body-3 col-span-6 md:col-span-12"><?php echo $form_access_content['description_form_access']; ?>
        </div>
        <div class="form-module col-span-6 md:col-span-12 lg:col-span-8">
          <?php echo do_shortcode($form_access_content['shortcut_form']); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- Get free pdf  -->


<?php if($row['acf_fc_layout'] == 'join_our_team_careers_layout') : ?>

<?php 
  $carreers_footer = $row['join_our_team_group'];
  if($carreers_footer):
?>

<section class="section bg-neutral-900 py-s7 md:py-s12 relative isolate overflow-hidden">
  <picture class="absolute top-0 left-0 w-full h-full -z-10">
    <source media="(min-width:1024px)"
      srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg.jpg"; ?>">
    <source media="(min-width:768px)"
      srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-tablet.jpg"; ?>">
    <img src="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-mobile.jpg"; ?>"
      alt="Flowers" class="w-full h-full">
  </picture>
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 items-start gap-y-s6">
      <h4 class="heading-4 text-neutral-100 uppercase col-span-12"><?php echo $carreers_footer['eyebrown'] ?></h4>
      <h2 class="heading-2 text-neutral-100 col-span-12 md:col-span-10 lg:col-span-9 row-start-2">
        <?php echo $carreers_footer['title'] ?></h2>
      <div class="body-3 text-neutral-100 col-span-12 md:col-span-5 row-start-3">
        <?php echo $carreers_footer['resume'] ?>
      </div>
      <?php if($carreers_footer['cta_link']): ?>
      <a target="<?php echo $carreers_footer['cta_link']['target'] ? $carreers_footer['cta_link']['target'] : '_self'; ?>"
        href="<?php echo  $carreers_footer['cta_link']['url']; ?>"
        class="btn btn-tertiary-white row-start-4 col-span-12 md:col-span-12 lg:col-auto">
        <?php echo  $carreers_footer['cta_link']['title']; ?>
      </a>
      <?php endif; ?>
      <!-- <a href="<?php echo $carreers_footer['cta_link']['url']; ?>" class="btn btn-tertiary-white row-start-4 col-span-12 md:col-span-12 lg:col-auto"><?php echo $carreers_footer['cta_link']['title'] ?></a> -->
    </div>
  </div>
</section>
<?php 
	endif; 
endif; 
?>

<?php 
endforeach;
?>