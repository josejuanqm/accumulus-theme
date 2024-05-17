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

      <div class="col-span-12 lg:col-span-7 flex flex-col gap-s3 lg:pr-9">

        <div class="relative">
          <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
            <img class="block w-full" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
          <?php endif; ?>

          <!-- <img class="block" src="<?php //bloginfo('template_url'); ?>/images/resources/thumb-main-resources.png" alt="title" /> -->
          <h1 class="absolute bottom-s3 left-0  pl-s6 text-h1Mobile md:text-h1Tablet lg:text-h1 text-neutral-nwhite"><?php the_title(); ?></h1>
        </div>

        <div class="flex flex-col gap-s3">
          <p class="text-b2Mobile md:text-b2Tablet lg:text-b2"><?php the_excerpt(); ?></p>
          <div class="flex gap-s2">
            <a href="#" class="flex items-center gap-s1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-dgray uppercase">
              <?php if ($categorySlug == 'article'): ?>
                <svg width="15" height="13" viewBox="0 0 15 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.2773 2.88949V11.5558H11.8331V1.08477C11.8331 0.485348 11.3478 0 10.7484 0H1.36211C0.762687 0 0.277344 0.485348 0.277344 1.08477V11.5558C0.277344 12.3532 0.924114 13 1.72155 13H13.2773C14.0748 13 14.7215 12.3532 14.7215 11.5558V2.88949H13.2773ZM1.72155 11.5558V1.44421H10.3879V11.5547H1.72155V11.5558Z" class=" fill-current"/>
                  <path d="M8.94196 8.66504H3.16406V10.1092H8.94196V8.66504Z" class="fill-current"/>
                  <path d="M8.94196 5.77832H3.16406V7.22253H8.94196V5.77832Z" class="fill-current"/>
                  <path d="M8.94196 2.8877H3.16406V4.3319H8.94196V2.8877Z" class="fill-current"/>
                </svg>
                <?php elseif ($categorySlug == 'media'): ?>
                <svg width="14" height="13" viewBox="0 0 14 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
                  <path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
                  <path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
                  <path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
                </svg>
                <?php elseif ($categorySlug == 'white-paper' || $categorySlug == 'e-books'): ?>
                <svg width="10" height="13" viewBox="0 0 10 13" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.28059 11.1674H1.61382V1.83355H2.94737V0.5H1.56067C0.854038 0.5 0.28125 1.07279 0.28125 1.77942V11.131C0.28125 11.8869 0.894386 12.5 1.65023 12.5H8.24615C9.00199 12.5 9.61513 11.8869 9.61513 11.131V5.83322H8.28158V11.1664L8.28059 11.1674Z" class="fill-current"/>
                  <path d="M9.37538 3.71823L6.15911 0.500977H4.27344H4.27442V5.8342H9.60764V3.94951L9.37538 3.71823ZM5.60699 4.50065V1.83453L6.95825 3.18678L8.27311 4.50065H5.60699Z" class="fill-current"/>
                </svg>
                <?php elseif ($categorySlug == 'podcast'): ?>
                <svg width="15" height="12" viewBox="0 0 15 12" fill="fill-current" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2.38681 11.9983H5.38589V5.99902H2.38681C1.55872 5.99902 0.886719 6.67102 0.886719 7.49911V10.4993C0.886719 11.3274 1.55872 11.9994 2.38681 11.9994V11.9983ZM2.38681 8.99921V7.49911H3.8869V10.4993H2.38681V8.99921Z" class="fill-current"/>
                  <path d="M11.3868 5.99916H9.88672V11.9984H12.8858C13.7139 11.9984 14.3859 11.3264 14.3859 10.4983V7.49814C14.3859 6.67004 13.7139 5.99805 12.8858 5.99805H11.3857L11.3868 5.99916ZM12.8869 8.99934V10.4994H11.3868V7.49925H12.8869V8.99934Z" class="fill-current"/>
                  <path d="M5.38153 0H3.88144C3.05335 0 2.38135 0.671998 2.38135 1.50009V4.50028H3.88144V1.50009H11.3808V4.50028H12.8809V1.50009C12.8809 0.671998 12.2089 0 11.3808 0H5.38153Z" class="fill-current"/>
                </svg>
              <?php endif; ?>
              <?php echo $category; ?>
            </a>
            <span class="text-b2 text-neutral-dgray">|</span>
            <a href="#" class="flex items-center gap-s1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-dgray uppercase">
              By Lorem Ipsum
            </a>
          </div>
        </div>

      </div>

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