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

/*Template name: News */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'news' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
?>

<script>
(function($){
  function get_list_news(page){
    $s = $("#s").val();
    $c = $("#category").val();
    // console.log($c);
    $.ajax( {
      url: "/wp-admin/admin-ajax.php?action=get_news"  ,
      method: 'POST',
      data:{
        'page' : page,
        's' : $s,
        'c' : $c
      }
    } ).done( function ( response ) {
      $("#category-post-content").html(response.html);
      $("#paginador-blog").html(response.paginador);
    }).fail(function(){

    });
  }

  get_list_news(1);

  // $("#paginador-blog").on("click", ".btn-reclamos", function(){
  // 	page = $(this).data("num");
  // 	$("#content-blog").html('<td class="text-center" colspan="5">Cargando...</td>');
  // 	// console.log(page);
  // 	get_list_news(page);
  // });

  // $(".btn-seach-blog").on("click", function(){
  // 	get_list_news(1);
  // });

  // $("#s").keyup(function(e){
  // 	if(e.keyCode == 13){
  // 		get_list_news(1);
  // 	}		
  // });

  $(".filters a").on("click", function() {

    $filter = $(this).data("id");
    $cat = $(this).data("name");

    $("#category").val($filter);
    $("#title-section").html($cat);

    $(".filters a").removeClass("bg-neutral-dgray text-neutral-nwhite hover:text-neutral-nwhite");
    $(this).addClass("bg-neutral-dgray text-neutral-nwhite hover:text-neutral-nwhite");
    get_list_news(1);

  });
})(jQuery);
</script>