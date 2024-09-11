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
	$link_learn_more = get_field('link_learn_more');
	$text_cta = get_field('text_cta');
?>

<section class="translucent-navigation relative section w-full pb-s12 md:pb-s7 lg:pb-s12 text-neutral-dgray bg-primary-violet">

	<picture class="absolute top-0 left-0 w-full h-full">
		<source media="(min-width:1024px)" srcset="<?php echo $bg_image_for_desktop; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $bg_image_for_tablet; ?>">
		<img src="<?php echo $bg_image_for_mobile; ?>" alt="Flowers" class="w-full h-full">
	</picture>

	<div class="relative container mx-auto pt-s5 md:pt-s10 lg:pt-s9">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end">

			<h4 class="col-span-12 heading-4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 heading-1"><?php echo $main_title; ?></h1>

			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2 md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 md:col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col md:items-end lg:items-start">
				<a class="btn-secondary" href="<?php echo $link_learn_more; ?>"><?php echo $text_cta; ?></a>
			</div>

		</div>
	</div>

</section>

<!-- Main banner -->



<!-- Quote -->

<?php 

$quote = get_field('quote');
if($quote):
?>

<section class="relative section py-s8 md:py-s12 lg:py-s10 bg-purple-300 bg-regulator-quote-mobile md:bg-regulator-quote-tablet lg:bg-regulator-quote-desktop bg-cover bg-current bg-no-repeat">
	<div class="container mx-auto px-s2 lg:px-0">
		<div class="grid grid-cols-6 md:grid-cols-12 gap-s2">
			<h2 class="col-span-6 md:col-span-10 lg:col-span-11 heading-2 text-cta-dark"><?php echo $quote['text'] ?></h2>
		</div>
	</div>
</section>

<?php endif; ?>

<!-- end Quote -->



<?php 

$regulatory_authorities = get_field('regulatory_authorities');

$observers = get_field('observers');

if($regulatory_authorities): 

$repeater = $regulatory_authorities['list_authorities'];
$order = array();

?>
<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-neutral-offwhite">
	<div class="container mx-auto px-s2 lg:px-0">
		<div class="grid grid-cols-6 md:grid-cols-12 gap-s2 md:gap-s6">

      <h4 class="heading-4 col-span-6 md:col-span-12 uppercase"><?php echo $regulatory_authorities['flag_title_regulatory_authorities']; ?></h4>

			<h2 class="col-span-6 md:col-span-10 lg:col-span-12 col-start-1 md:col-start-1 heading-1"><?php echo $regulatory_authorities['title_regulatory_authorities']; ?></h2>

			<div class="col-span-6 md:col-span-12 flex flex-wrap items-center justify-start gap-y-s2 gap-s4 md:gap-x-s6 lg:gap-x-s7 py-s6 md:py-s3">
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
<?php endif; ?>

<!-- Regulator forum -->


<section class="relative section w-full pt-s12 md:pt-s10 lg:pb-s12">

	<div class="container mx-auto">
		
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
								<!-- <img src="<?php //echo $card['image']; ?>"  /> -->
								<img src="<?php echo $card['image']; ?>" class="max-lg:min-h-[445px] max-md:min-h-[290px] max-lg:object-cover max-lg:rounded-card"  />
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
								<!-- <img src="<?php //echo $card['image']; ?>"  /> -->
								<img src="<?php echo $card['image']; ?>" class="max-lg:min-h-[445px] max-md:min-h-[290px] max-lg:object-cover max-lg:rounded-card"  />
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

<!-- Values -->


<!-- Testimonials -->

<?php

	$testimonials = get_field('testimonials');
	if($testimonials):

?>

<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 bg-neutral-nwhite">
  <div class="relative container mx-auto">

    <div class="general-slide">
      <?php foreach($testimonials['list_testimonials'] as $slide): ?>
        <div class="general-slide__item">
          <div class="grid grid-cols-6 md:grid-cols-12 gap-s8 md:gap-x-s2 md:gap-y-s10">
            <h3 class="col-span-6 md:col-span-10 lg:col-span-9 heading-3 text-neutral-dgray">
							“<?php echo $slide['text_testimonial'] ?>”
            </h3>
            <div class="col-span-6 md:col-span-7 lg:col-span-5 md:col-start-6 lg:col-start-6 flex items-start justify-between gap-s2">
              <img class="max-w-[145px] md:max-w-full rounded-3xl" src="<?php echo $slide['photo_user']; ?>" alt="<?php echo $slide['name_user']; ?>" />
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



<?php 

$participation_looks = get_field('participation_looks');

if($participation_looks): 

?>
<section class="relative section w-full pt-s8 md:pt-s12 lg:pt-s14 pb-s10 md:pb-s12">
	<div class="container mx-auto px-s2 md:px-0">
		<div class="grid grid-cols-6 md:grid-cols-12 gap-s8 md:gap-y-s11">

			<h2 class="col-span-6 md:col-span-12 lg:col-span-12 heading-1 max-md:pr-s4"><?php echo $participation_looks['title_section']; ?></h2>

			<div class="col-span-6 md:col-span-12 grid grid-cols-12 gap-s2 gap-y-s4 md:gap-y-s11">
        
        <?php foreach($participation_looks['list_participation'] as $item) : ?>

        <div class="card relative col-span-12 md:col-span-6 lg:col-span-3">
          <div class="relative w-full flex items-center justify-center">
              <img class="block w-full h-full object-cover" src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" />
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
<?php endif; ?>

<!-- Participation looks like -->



<?php

  $categories = array();
  $args = array(
    'taxonomy' => 'news-categories',
    'style' => 'list',
    'hide_empty' => 1,
  );
  
  $result = get_categories($args);
  
  // var_dump($result);
  if (count($result) > 0 ){
    $categories = $result;
  }

?>
  
<section class="section w-full pt-s8 pb-s8 md:pb-s10 md:pt-s10 lg:pt-s8 lg:pb-s8 bg-neutral-nwhite">
  
  <div class="container mx-auto">
  
    <div class="grid grid-cols-12 gap-s2">
  
			<div class="filters col-span-12 pt-0 pb-s8 md:pt-s2 md:pb-s10 lg:pt-s4 lg:pb-s8 flex justify-center w-full flex-wrap gap-s2 md:gap-s4 text-neutral-sgray">
			
				<input type="hidden" id="category" value="0" data-catName="Last Articles">
				
				<a href="javascript:void(0)" data-id="0" data-name="All" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s3 heading-4 text-center rounded-button uppercase bg-neutral-dgray active-filter">All</a>
				<a href="javascript:void(0)" data-id="1" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s2 lg:px-s3 heading-4 text-center rounded-button uppercase btn-text-link text-neutral-sgray">Past events</a>
				<a href="javascript:void(0)" data-id="2" class="col-span-6 w-auto flex items-center justify-center h-[38px] px-s2 lg:px-s3 heading-4 text-center rounded-button uppercase btn-text-link text-neutral-sgray">Upcoming events</a>
					
			</div>


			<div id="category-post-content">
			</div>
      <div class="col-span-12 flex justify-center pt-s5 md:pt-s8">
        <a id="btn-events-see-more" class="btn-secondary" href="#">See More</a>
      </div>
        <input type="hidden" value="1" id="current-page"/>
    </div>
      
  </div>
      
</section>


<!-- Grid events -->



<?php 

$join_the_forum = get_field('join_the_forum');

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
      <div class="col-span-6 md:col-span-7 lg:col-span-5 col-start-1 md:col-start-5 lg:col-start-6 flex items-start gap-s3">
        <img class="w-[55px] md:w-[64px] aspect-square" src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>" />
        <div class="description-wysiwyg  w-auto">
          <h3 class="heading-2 pb-s2"><?php echo $item['title']; ?></h3>
          <?php echo $item['description']; ?>
        </div>
      </div>
      <?php endforeach; ?>
			
			<div class="col-span-6 md:col-span-12">
				<a href="#" target="_blank" download class="btn-secondary max-w-[360px] mx-auto">Download Regulator Forum Flyer</a>
			</div>
    </div>
  </div>
</section>

<?php endif; ?>

<!-- Join the forum -->


<!-- Form Module -->
<?php
  get_template_part(
    'template-parts/content',
    'form-module'
  );
?>
<!-- End form module -->
