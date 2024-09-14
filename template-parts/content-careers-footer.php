
<?php 
  $carreers_footer = get_field('carreers_footer', 'option');
  if($carreers_footer):
?>

<section class="section bg-neutral-900 py-s7 md:py-s12 relative isolate overflow-hidden">
	<picture class="absolute top-0 left-0 w-full h-full -z-10">
		<source media="(min-width:1024px)" srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg.jpg"; ?>">
		<source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-tablet.jpg"; ?>">
		<img src="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-mobile.jpg"; ?>" alt="Flowers" class="w-full h-full">
	</picture>
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 items-start gap-y-s6">
      <h4 class="heading-4 text-neutral-100 uppercase col-span-12"><?php echo $carreers_footer['title_flag'] ?></h4>
      <h2 class="heading-2 text-neutral-100 col-span-12 md:col-span-10 lg:col-span-9 row-start-2"><?php echo $carreers_footer['title'] ?></h2>
      <div class="body-3 text-neutral-100 col-span-12 md:col-span-5 row-start-3">
        <?php echo $carreers_footer['content'] ?>
      </div>
      <a href="<?php echo $carreers_footer['cta']['url']; ?>" class="btn btn-tertiary-white row-start-4 col-span-12 md:col-span-12 lg:col-auto"><?php echo $carreers_footer['cta']['title'] ?></a>
    </div>
  </div>
</section>
<?php endif; ?>