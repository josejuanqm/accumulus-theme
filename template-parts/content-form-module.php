
<?php 

$form_access_content = get_field('form_access_content', 'option');
$show_form_free_pdf = get_field('pages_to_show','option');

$pageId = get_the_id();

if( $show_form_free_pdf ):
  foreach( $show_form_free_pdf as $post ):  
    if($post === $pageId):
      if($form_access_content):
?>

<section class="relative w-full bg-primary-violet">
  <div class="grid grid-cols-6 md:grid-cols-12 gap-x-4">
    <div class="col-span-6 md:col-span-12 lg:col-span-4">
      <picture class="block w-full h-full">
        <source media="(min-width:1025px)" srcset="<?php bloginfo('template_url'); ?>/images/home/form-module-desktop.png">
        <source media="(min-width:768px)" srcset="<?php bloginfo('template_url'); ?>/images/home/form-module-tablet.png">
        <img src="<?php bloginfo('template_url'); ?>/images/home/form-module-mobile.png" class="w-full h-full object-cover" />
      </picture>
    </div>

    <div class="col-span-6 md:col-span-12 lg:col-span-7 lg:col-start-6 px-s2 lg:px-0 pt-s4 md:pt-s8 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 text-neutral-nwhite">
      <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:max-w-[655px]">
        <h4 class="heading-4 col-span-6 md:col-span-12"><?php echo $form_access_content['eyebrown_form_access']; ?></h4>
        <h2 class="heading-2 col-span-6 md:col-span-12"><?php echo $form_access_content['title_form_access']; ?></h2>
        <p class="body-3 col-span-6 md:col-span-12"><?php echo $form_access_content['description_form_access']; ?></p>
        <div class="form-module col-span-6 md:col-span-12 lg:col-span-8">
          <?php echo do_shortcode($form_access_content['shortcut_form']); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
      endif;
    endif;
  endforeach;
endif;
?>