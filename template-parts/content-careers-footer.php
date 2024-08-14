<section class="section bg-neutral-900 py-s7 md:py-s12 relative isolate overflow-hidden">
	<picture class="absolute top-0 left-0 w-full h-full -z-10">
		<source media="(min-width:1024px)" srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg.jpg"; ?>">
		<source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-tablet.jpg"; ?>">
		<img src="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-mobile.jpg"; ?>" alt="Flowers" class="w-full h-full">
	</picture>
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 items-start gap-y-s6">
      <h4 class="heading-4 text-neutral-100 uppercase col-span-12">Careers</h4>
      <h2 class="heading-2 text-neutral-100 col-span-12 md:col-span-10 lg:col-span-9 row-start-2">Great achievements require great team members.</h2>
      <p class="body-3 text-neutral-100 col-span-12 md:col-span-5 row-start-3">We’re a group of passionate individuals driven by a common purpose — to accelerate delivery of medicines to patients around the globe. We’re excited to learn how you can help us!</p>
      <a href="/careers" class="btn btn-tertiary-white row-start-4 col-span-12 md:col-span-12 lg:col-auto"><?php echo $args['cta'] ?? 'Join Our Team'; ?></a>
    </div>
  </div>
</section>
