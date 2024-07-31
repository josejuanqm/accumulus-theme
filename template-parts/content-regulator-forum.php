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
?>

<section class="relative section w-full pt-s3 md:pt-s14 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 text-neutral-dgray bg-neutral-nude">

	<picture class="absolute top-0 left-0 w-full h-full">
		<source media="(min-width:1024px)" srcset="<?php echo $bg_image_for_desktop; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $bg_image_for_tablet; ?>">
		<img src="<?php echo $bg_image_for_mobile; ?>" alt="Flowers" class="w-full h-full">
	</picture>

	<div class="relative container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">

			<h4 class="col-span-12 heading-4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 heading-1"><?php echo $main_title; ?></h1>

			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2 md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>

		</div>
	</div>

</section>

<!-- Main banner -->


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



<?php 

$related_topics = get_field('related_topics');

if($related_topics):

?>

<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-secondary-aqua bg-increase-feedback-mobile md:increase-feedback-tablet lg:increase-feedback-desktop bg-left-bottom bg-no-repeat bg-contain">

	<picture class="absolute top-0 left-0">
		<source media="(min-width:1024px)" srcset="<?php echo $related_topics['bg_image_desktop']; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $related_topics['bg_image_tablet']; ?>">
		<img src="<?php echo $related_topics['bg_image_mobile']; ?>" alt="<?php echo $related_topics['title_section']; ?>" class="w-full h-full">
	</picture>

	<div class="relative container mx-auto px-s2 md:px-0">
		<div class="grid grid-cols-6 md:grid-cols-12 lg:grid-cols-10 gap-s2">
      <h2 class="heading-1 font-normal col-span-6 md:col-span-12 pb-s14 md:pb-s10"><?php echo $related_topics['title_section']; ?></h2>

      <?php foreach($related_topics['list_items'] as $item) : ?>
      <div class="col-span-5 md:col-span-7 lg:col-span-6 col-start-2 md:col-start-6 lg:col-start-7 flex items-center gap-s3 py-s3 md:py-s5 first-of-type:pt-0">
        <img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>" />
        <h3 class="heading-3 font-medium"><?php echo $item['title']; ?></h3>
      </div>
      <?php endforeach; ?>

    </div>
  </div>

</section>

<?php endif; ?>

<!-- Related topics -->



<?php 

$participation_looks = get_field('participation_looks');

if($participation_looks): 

?>
<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12">
	<div class="container mx-auto px-s2 md:px-0">
		<div class="grid grid-cols-6 md:grid-cols-12 gap-s8 md:gap-y-s11">

			<h2 class="col-span-6 md:col-span-12 lg:col-span-10 heading-1"><?php echo $participation_looks['title_section']; ?></h2>

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

			<h2 class="col-span-6 md:col-span-10 col-start-1 md:col-start-1 heading-1"><?php echo $regulatory_authorities['title_regulatory_authorities']; ?></h2>

			<div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 md:grid-rows-4 md:grid-flow-col gap-s5 pt-s6">
        
        <?php 
					foreach($repeater as $item => $row) {
						$order[$item] = $row['title'];
					}

					array_multisort($order, SORT_STRING, $repeater);

					foreach($repeater as $item => $row) : 
					
				?>

        <div class="relative col-span-3 md:col-span-6 lg:col-span-4">
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
  
      <div class="filters col-span-12 pt-0 pb-s8 md:pt-s2 md:pb-s10 lg:pt-s4 lg:pb-s8 grid grid-cols-12 lg:flex lg:justify-center lg:w-full lg:flex-wrap gap-s2 lg:gap-s4">
    
        <input type="hidden" id="category" value="0" data-catName="Last Articles">
        
        <a href="javascript:void(0)" data-id="0" data-name="All" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase bg-neutral-dgray text-neutral-nwhite">All</a>
        <a href="javascript:void(0)" data-id="1" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase btn-text-link">Past events</a>
        <a href="javascript:void(0)" data-id="2" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase btn-text-link">Upcoming events</a>
        
        <!-- <?php //foreach($categories as $category): ?>
          <a href="javascript:void(0)" data-id="<?php //echo $category->term_id; ?>" data-name="Latest <?php //echo $category->name; ?>" class="col-span-6 lg:w-auto flex items-center justify-center h-[38px] lg:px-s3 text-h4Mobile md:text-h4Tablet lg:text-h4 text-center rounded-button uppercase btn-text-link"><?php //$category->name ?></a>
        <?php //endforeach; ?> -->
          
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
		<div class="grid grid-cols-6 md:grid-cols-12 lg:grid-cols-12 gap-s2 md:gap-x-s2 md:gap-s8">

      <h2 class="heading-1 font-normal col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12 gap-s2">
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
        <div class="description-wysiwyg w-auto">
          <h3 class="heading-2 pb-s2"><?php echo $item['title']; ?></h3>
          <?php echo $item['description']; ?>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php endif; ?>

<!-- Related topics -->