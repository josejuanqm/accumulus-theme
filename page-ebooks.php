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

/*Template name: Ebooks */

get_header();
?>

<main id="primary" class="site-main">

  <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', 'ebooks');

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_footer();
?>

<?php 
    $category = get_term_by( 'slug', 'e-books-white-papers', 'resources-taxonomies' );
?>

<script>
(function($) {
  // Click en el botón de ver más
  $('#btn-see-more').on('click', function(e) {
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
        'c': "<?php echo $category->term_id; ?>",
        't': 'resources-taxonomies'
      }
    }).done(function(response) {
      if (isCategory) {
        $("#category-post-content").html(response.html);
      } else {
        $("#category-post-content").append(response.html);
      }

      if (!response.morePagesAvailable) {
        $('#btn-see-more').css('pointer-events', 'none');
        $('#btn-see-more').css('opacity', '.5');
      } else {
        $('#btn-see-more').css('pointer-events', 'auto');
      }

      // Actualizar el valor de la página actual
      $('#current-page').val(page);

    }).fail(function() {

    });
  }

  get_list_resources(1);
})(jQuery);
</script>