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

/*Template name: Resources */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', 'resources');

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_footer();
?>

<script>
    (function ($) {
        // Click en el botón de ver más
        $('#btn-see-more').on('click', function (e) {
            var page = $('#current-page').val();
            e.preventDefault();
            get_list_resources(parseInt(page) + 1);
        });

        function get_list_resources(page, isCategory = false) {
            $s = $("#s").val();
            $c = $("#category").val();
            // console.log($c);
            $.ajax({
                url: "/wp-admin/admin-ajax.php?action=get_resources",
                method: 'POST',
                data: {
                    'page': page,
                    's': $s,
                    'c': $c,
                    't': 'resources-taxonomies'
                }
            }).done(function (response) {
                if (isCategory) {
                    $("#category-post-content").html(response.html);
                    // $("#paginador-blog").html(response.paginador);
                } else {
                    $("#category-post-content").append(response.html);
                    // $("#paginador-blog").html(response.paginador);
                }

                if (!response.morePagesAvailable) {
                    $('#btn-see-more').css('pointer-events', 'none');
                }else{
                    $('#btn-see-more').css('pointer-events', 'auto');
                }

                // Actualizar el valor de la página actual
                $('#current-page').val(page);

            }).fail(function () {

            });
        }

        get_list_resources(1);

        // $("#paginador-blog").on("click", ".btn-reclamos", function(){
        // 	page = $(this).data("num");
        // 	$("#content-blog").html('<td class="text-center" colspan="5">Cargando...</td>');
        // 	// console.log(page);
        // 	get_list_resources(page);
        // });

        // $(".btn-seach-blog").on("click", function(){
        // 	get_list_resources(1);
        // });

        // $("#s").keyup(function(e){
        // 	if(e.keyCode == 13){
        // 		get_list_resources(1);
        // 	}
        // });

        $(".filters a").on("click", function () {

            $filter = $(this).data("id");
            $cat = $(this).data("name");

            $("#category").val($filter);
            $("#title-section").html($cat);

            $(".filters a").removeClass("bg-neutral-dgray !text-neutral-nwhite hover:text-neutral-nwhite active-filter");
            $(this).addClass("bg-neutral-dgray !text-neutral-nwhite hover:text-neutral-nwhite active-filter");
            get_list_resources(1, true);

        });
    })(jQuery);
</script>