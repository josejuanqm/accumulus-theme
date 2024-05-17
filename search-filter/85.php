<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$i = 0;

if ( $query->have_posts() )
{
	?>
	
	<?php
		while ($query->have_posts())
		{
			$query->the_post();
		
			$category = '';
			$categorySlug = '';
			$post_type = get_post_type(get_the_ID());   
			$taxonomies = get_object_taxonomies($post_type);   
			$taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
			if(!empty($taxonomy_names)) :
				foreach($taxonomy_names as $tax_name) : ?>              
						<?php 
							$category = $tax_name; 
							$categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
						?>
				<?php endforeach;
			endif;
	?>

		<?php if($i==0): ?>

			<div class="card col-span-12 md:col-span-6 lg:col-span-8 relative lg:flex lg:items-stretch w-full rounded-card overflow-hidden <?php if ($categorySlug == 'thought-leadership'): ?>bg-secondary-green text-neutral-nwhite<?php elseif ($categorySlug == 'media'): ?>bg-primary-glaciar text-neutral-dgray<?php elseif ($categorySlug == 'white-paper' || $categorySlug == 'e-books'): ?>bg-neutral-offwhite text-neutral-dgray <?php endif; ?>">

        <a href="#" class="absolute top-0 left-0 w-full h-full z-10"></a>

				<?php if (has_post_thumbnail( get_the_ID() ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
					<div class="relative w-full lg:w-1/2 flex items-center justify-center h-[275px] lg:h-full bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url('<?php echo $image[0]; ?>')">
						<!-- <img src="<?php bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->
					</div>
				<?php endif; ?>

				
        <div class="flex flex-col lg:w-1/2 lg:justify-end p-7 gap-2">
          <div class="flex items-center gap-3 text-neutral-dgray uppercase">
					<?php if ($categorySlug == 'thought-leadership'): ?>
							<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M13.2773 2.88949V11.5558H11.8331V1.08477C11.8331 0.485348 11.3478 0 10.7484 0H1.36211C0.762687 0 0.277344 0.485348 0.277344 1.08477V11.5558C0.277344 12.3532 0.924114 13 1.72155 13H13.2773C14.0748 13 14.7215 12.3532 14.7215 11.5558V2.88949H13.2773ZM1.72155 11.5558V1.44421H10.3879V11.5547H1.72155V11.5558Z" class=" fill-current"/>
								<path d="M8.94196 8.66504H3.16406V10.1092H8.94196V8.66504Z" class="fill-current"/>
								<path d="M8.94196 5.77832H3.16406V7.22253H8.94196V5.77832Z" class="fill-current"/>
								<path d="M8.94196 2.8877H3.16406V4.3319H8.94196V2.8877Z" class="fill-current"/>
							</svg>
							<?php elseif ($categorySlug == 'media'): ?>
								<svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
									<path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
									<path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
									<path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
								</svg>
							<?php elseif ($categorySlug == 'white-paper' || $categorySlug == 'e-books'): ?>
								<svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.28059 11.1674H1.61382V1.83355H2.94737V0.5H1.56067C0.854038 0.5 0.28125 1.07279 0.28125 1.77942V11.131C0.28125 11.8869 0.894386 12.5 1.65023 12.5H8.24615C9.00199 12.5 9.61513 11.8869 9.61513 11.131V5.83322H8.28158V11.1664L8.28059 11.1674Z" class="fill-current"/>
									<path d="M9.37538 3.71823L6.15911 0.500977H4.27344H4.27442V5.8342H9.60764V3.94951L9.37538 3.71823ZM5.60699 4.50065V1.83453L6.95825 3.18678L8.27311 4.50065H5.60699Z" class="fill-current"/>
								</svg>
						<?php endif; ?>
						<span><?php echo $category; ?></span>
          </div>
          <h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"><?php the_title(); ?></h3>
        </div>

      </div>

			<?php else: ?>

			<div class="card col-span-12 md:col-span-6 lg:col-span-4 relative w-full rounded-card overflow-hidden <?php if ($categorySlug == 'thought-leadership'): ?>bg-secondary-green text-neutral-nwhite<?php elseif ($categorySlug == 'media'): ?>bg-primary-glaciar text-neutral-dgray<?php elseif ($categorySlug == 'white-paper' || $categorySlug == 'e-books'): ?>bg-neutral-offwhite text-neutral-dgray <?php endif; ?>">

				<a href="#" class="absolute top-0 left-0 w-full h-full z-10"></a>

				<?php if (has_post_thumbnail( get_the_ID() ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
					<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url('<?php echo $image[0]; ?>')">
						<!-- <img src="<?php //bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->
					</div>
				<?php endif; ?>
				<!-- Thumbnail -->

				<div class="flex flex-col p-7 gap-2">
					<div class="flex items-center gap-3 uppercase">
						<?php if ($categorySlug == 'thought-leadership'): ?>
							<svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M13.2773 2.88949V11.5558H11.8331V1.08477C11.8331 0.485348 11.3478 0 10.7484 0H1.36211C0.762687 0 0.277344 0.485348 0.277344 1.08477V11.5558C0.277344 12.3532 0.924114 13 1.72155 13H13.2773C14.0748 13 14.7215 12.3532 14.7215 11.5558V2.88949H13.2773ZM1.72155 11.5558V1.44421H10.3879V11.5547H1.72155V11.5558Z" class=" fill-current"/>
								<path d="M8.94196 8.66504H3.16406V10.1092H8.94196V8.66504Z" class="fill-current"/>
								<path d="M8.94196 5.77832H3.16406V7.22253H8.94196V5.77832Z" class="fill-current"/>
								<path d="M8.94196 2.8877H3.16406V4.3319H8.94196V2.8877Z" class="fill-current"/>
							</svg>
							<?php elseif ($categorySlug == 'media'): ?>
								<svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
									<path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
									<path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
									<path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
								</svg>
							<?php elseif ($categorySlug == 'white-paper' || $categorySlug == 'e-books'): ?>
								<svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8.28059 11.1674H1.61382V1.83355H2.94737V0.5H1.56067C0.854038 0.5 0.28125 1.07279 0.28125 1.77942V11.131C0.28125 11.8869 0.894386 12.5 1.65023 12.5H8.24615C9.00199 12.5 9.61513 11.8869 9.61513 11.131V5.83322H8.28158V11.1664L8.28059 11.1674Z" class="fill-current"/>
									<path d="M9.37538 3.71823L6.15911 0.500977H4.27344H4.27442V5.8342H9.60764V3.94951L9.37538 3.71823ZM5.60699 4.50065V1.83453L6.95825 3.18678L8.27311 4.50065H5.60699Z" class="fill-current"/>
								</svg>
						<?php endif; ?>
						<span><?php echo $category; ?></span>
					</div>
					<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"><?php the_title(); ?></h3>
				</div>

			</div>

		<?php endif; ?>

		<?php
		$i++;
	}
	?>
	
	<?php
}
else {
	?>
	<div class="col-span-12 py-20 pt-20 pb-20 text-center text-neutral-dgray">
		No resources found
	</div>
<?php } ?>