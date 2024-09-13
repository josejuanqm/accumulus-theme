<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package accumulus-website
 */

/*Template name: Regulator Forum */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'regulator-forum' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

?>

<script>
(function ($) {
	$('#btn-events-see-more').on('click', function (e) {
			var page = $('#current-page').val();
			e.preventDefault();
			get_list_events(parseInt(page) + 1);
	});

	function get_list_events(page, isCategory = false) {
			$s = $("#s").val();
			$c = $("#category").val();
			$pt = 'accumulus-hosted-forum';
			$.ajax({
					url: "/wp-admin/admin-ajax.php?action=get_events",
					method: 'POST',
					data: {
							'page': page,
							'c': $c,
							'pt': $pt
					}
			}).done(function (response) {
					console.log('response', response);
					$("#category-post-content").html(response.html);
					$('#current-page').val(page);
			}).fail(function () {

			});
	}

	get_list_events(1);


	$(".filters a").on("click", function () {

		$filter = $(this).data("id");
		$cat = $(this).data("name");

		console.log('filter click', $filter)

		$("#category").val($filter);
		$("#title-section").html($cat);

		$(".filters a").removeClass("bg-neutral-dgray text-neutral-nwhite hover:text-neutral-nwhite");
		$(this).addClass("bg-neutral-dgray text-neutral-nwhite hover:text-neutral-nwhite");
		get_list_events(1, true);

	});
})(jQuery);
</script>
