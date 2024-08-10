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

	<section class="section w-full pb-s4 md:pb-s7 lg:pb-s12 bg-primary-violet min-h-screen bg-404-mobile md:bg-404-tablet lg:bg-404-desktop bg-no-repeat bg-left-top bg-contain max-lg:h-screen">

		<div class="container mx-auto max-lg:h-[90%] pt-s5 md:pt-s10 lg:pt-s9">

			<div class="grid grid-cols-12 gap-x-4 gap-y-s6 max-lg:content-between max-lg:min-h-full">

				<div class="col-span-12 flex flex-col gap-s1">
					<h3 class="text-h8Mobile md:text-h8Tablet lg:text-h8 text-neutral-nwhite">404</h3>
					<h1 class="heading-2 text-neutral-nwhite">
						Oops!
						<br />
						Page not found
					</h1>
				</div>

				<div class="col-span-12 lg:col-span-4 lg:col-start-8 flex flex-col gap-s3 md:gap-s8 lg:gap-s4">
					<p class="body-2 text-neutral-nwhite max-lg:max-w-[380px]">This page has moved, is under construction, or doesn’t exist.</p>
					<a class="btn-secondary-inverted" href="<?php echo get_home_url(); ?>">Back to Home</a>
				</div>

			</div>

		</div>

	</section>

	</main><!-- #main -->

<?php
get_footer();
