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
	$bg_image_for_desktop = get_field('bg_image_for_desktop');
	$bg_image_for_tablet = get_field('bg_image_for_tablet');
	$bg_image_for_mobile = get_field('bg_image_for_mobile');
	$title_tag = get_field('title_tag');
	$main_title = get_field('main_title');
	$resume_text = get_field('resume_text');
	$text_cta = get_field('text_cta');
	$link_learn_more = get_field('link_learn_more');
	$text_cta = get_field('text_cta');
?>

<section class="translucent-navigation light relative section w-full pb-s12 md:pb-s7 lg:pb-s12 text-neutral-fnude bg-secondary-carbon">

	<picture class="absolute top-0 left-0 w-full h-full">
		<source media="(min-width:1024px)" srcset="<?php echo $bg_image_for_desktop; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $bg_image_for_tablet; ?>">
		<img src="<?php echo $bg_image_for_mobile; ?>" alt="Flowers" class="w-full h-full">
	</picture>

	<div class="relative container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

			<h4 class="col-span-12 heading-4 uppercase pt-s1 text-neutral-nude"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 heading-1 text-neutral-nude"><?php echo $main_title; ?></h1>

			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2 md:max-w-550 lg:max-w-full text-neutral-nwhite"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_learn_more; ?>" class="btn-secondary-inverted"><?php echo $text_cta; ?></a>
			</div>

		</div>
	</div>

</section>

<!-- Main banner -->


<section class="bg-neutral-nude">

<?php 

$get_started_content = get_field('get_started_content');

foreach($get_started_content as $row) :

?>

<!-- Join us -->


<?php 

if($row['acf_fc_layout'] == 'join_the_forum_layout') :

$join_the_forum = $row['join_the_forum'];

if($join_the_forum):

?>

<section class="relative section w-full pt-s8 md:pt-s10 pb-s8 md:pb-s12 bg-neutral-nwhite">
	<div class="container mx-auto px-s2 md:px-0">
		<div class="grid grid-cols-6 md:grid-cols-12 lg:grid-cols-12 gap-y-s5 gap-x-s2 md:gap-x-s2 md:gap-s10 lg:gap-s12">

      <h2 class="heading-1 font-normal col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s2 pb-s3 md:pb-0 lg:pb-s1">
        <span class="col-span-6 md:col-span-12">
          <?php echo $join_the_forum['first_line_title']; ?>
        </span>
        <span class="col-span-6 md:col-span-10 lg:col-span-10 col-start-2 md:col-start-2 lg:col-start-2">
          <?php echo $join_the_forum['second_line_title']; ?>
        </span>
      </h2>

      <?php foreach($join_the_forum['steps_join'] as $item) : ?>
      <div class="col-span-6 md:col-span-7 lg:col-span-7 col-start-1 md:col-start-5 lg:col-start-6 flex items-start gap-s3">
        <img class="w-[55px] md:w-[64px] aspect-square" src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>" />
        <div class="description-wysiwyg w-auto">
          <h3 class="heading-2 pb-s2"><?php echo $item['title']; ?></h3>
          <?php echo $item['description']; ?>
        </div>
      </div>
      <?php endforeach; ?>

			<div class="col-span-6 md:col-span-12 lg:col-span-2 col-start-1 lg:col-start-6 pt-s3 md:pt-0">
				<a class="btn-secondary" href="<?php echo $join_the_forum['link_cta']; ?>"><?php echo $join_the_forum['text_cta']; ?></a>
			</div>

    </div>
  </div>
</section>

<?php endif; ?>

<?php endif; ?>

<!-- end Join us -->


<!-- Discover -->

<?php 

if($row['acf_fc_layout'] == 'benefits_layout') :

	$benefits = $row['benefits'];

	if($benefits):
?>

<section class="section relative w-full bg-neutral-nude">
	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s4 pt-s10 md:pt-s12 md:pb-s6">
			<h2 class="flex flex-col md:grid md:grid-cols-12 md:grid-rows-2 col-span-12 md:gap-s2 heading-1 justify-start items-start">
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
				<img class="w-full md:w-[64px] lg:min-w-[64px] aspect-square self-end col-span-1" src="<?php echo $item['icon'] ?>" alt="<?php echo $item['title'] ?>" />
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

<!-- End Discover -->


<?php

if($row['acf_fc_layout'] == 'ready_to_join_us_layout') :

?>

<!-- Get statted section -->

<section class="relative section w-full pt-s12 pb-s12 bg-neutral-nude bg-get-started-section-mobile md:bg-get-started-section-tablet lg:bg-get-started-section-desktop bg-cover bg-no-repeat bg-center mt-s8 md:mt-s12">
	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s3 md:gap-y-s6">

			<h6 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase"><?php echo $row['eyebrown']; ?></h6>
			<h2 class="col-span-12 text-h2Mobile md:text-h2Tablet lg:text-h2"><?php echo $row['title']; ?></h2>
			<p class="col-span-12 md:col-span-6 lg:col-span-4 text-b3Mobile md:text-b3Tablet lg:text-b3 py-s2 md:py-0"><?php echo $row['resume']; ?></p>
			<div class="col-span-12 flex justify-start">
				<a href="<?php echo $row['link_cta']; ?>" class="btn-tertiary"><?php echo $row['text_cta']; ?></a>
			</div>

		</div>

	</div>
</section>

<?php 
endif; 
?>

<!-- End Get statted section -->

<?php endforeach; ?>

</section>




<!-- Form Module -->
<?php
  get_template_part(
    'template-parts/content',
    'form-module'
  );
?>
<!-- End form module -->
