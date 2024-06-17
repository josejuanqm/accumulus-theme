<?php
  $bg_image_main = get_field('bg_image_main');
?>

<section class="section w-full pt-0 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 bg-cover bg-no-repeat bg-center" style="background-image: url(<?php echo $bg_image_main ?>)">
	<div class="container mx-auto">
		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">
			<h4 class="col-span-12 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1"><?php echo $main_title; ?></h1>
			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="text-b2 md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_learn_more; ?>" class="btn-secondary">Lear more</a>
				<a href="#" class="btn-tertiary">About Accumulus</a>
			</div>
		</div>
	</div>
</section>