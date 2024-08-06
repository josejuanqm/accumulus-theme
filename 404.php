<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package accumulus-website
 */

get_header();
?>

	<main id="primary" class="site-main">

	<section class="section w-full pt-s11 lg:pt-s8 pb-s12 md:pb-s7 lg:pb-s12 bg-primary-violet min-h-screen bg-no-repeat bg-left-top bg-contain bg-cover" style="background-image: url(<?php bloginfo( 'template_url' ); ?>/images/bg-404.png);">

		<div class="container mx-auto">

			<div class="grid grid-cols-12 gap-x-4 gap-y-s6">

				<div class="col-span-12 flex flex-col gap-s1">
					<h3 class="text-h8Mobile md:text-h8Tablet lg:text-h8 text-neutral-nwhite">404</h3>
					<h1 class="text-h9Mobile md:text-h9Tablet lg:text-h9 text-neutral-nwhite">
						Oops!
						<br />
						Page not found
					</h1>
				</div>

				<div class="col-span-12 lg:col-span-4 lg:col-start-8 flex flex-col gap-s8 lg:gap-s4">
					<p class="text-b2 text-neutral-nwhite max-lg:max-w-[380px]">This page has moved, is under construction, or doesn’t exist.</p>
					<a class="btn-tertiary-white" href="<?php echo get_home_url(); ?>">Back to Home</a>
				</div>

			</div>

		</div>

	</section>

	</main><!-- #main -->

<?php
get_footer();
