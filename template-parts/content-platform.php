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
	$main_banner = get_field('main_banner');
?>

<?php if($main_banner): ?>
<section class="section w-full relative pt-0 md:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 text-neutral-dgray bg-neutral-white bg-main-platform-mobile md:bg-main-platform-tablet lg:bg-main-platform-desktop bg-cover bg-no-repeat bg-left-bottom">

	<div class="container mx-auto">

		<div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">

      <h4 class="col-span-6 md:col-span-12 lg:row-start-1 heading-4 uppercase"><?php echo $main_banner['flag_title']; ?></h4>

			<h1 class="col-span-5 md:col-span-12 lg:col-span-7 lg:row-start-2 heading-1"><?php echo $main_banner['title']; ?></h1>

      <div class="col-span-6 md:col-span-12 lg:absolute lg:right-0 flex justify-end">
        <img class="max-md:-mr-s4" src="<?php echo $main_banner['image']; ?>" alt="<?php echo $main_banner['title']; ?>" />
      </div>

			<div class="col-span-6 md:col-span-6 lg:col-span-4 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="text-b2"><?php echo $main_banner['first_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-5 lg:row-start-3 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="text-b2"><?php echo $main_banner['second_resume']; ?></p>
			</div>
			<div class="col-span-6 md:col-span-12 lg:row-start-4 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $main_banner['link_cta']; ?>" class="btn-secondary">Get Started</a>
			</div>

		</div>
	</div>

</section>
<?php endif; ?>

<!-- Main banner -->



