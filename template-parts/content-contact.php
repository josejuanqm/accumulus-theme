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
// Contact fields 

$contact_form_shortcut = get_field('contact_form_shortcut');
$contact_phone_number = get_field('contact_phone_number');
$contact_email = get_field('contact_email');

?>

<section class="relative section w-full pt-s12 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 min-h-full bg-cover lg:bg-contain bg-left-bottom lg:bg-left-top bg-no-repeat" style="background-image: url(<?php bloginfo( 'template_url' ); ?>/images/contact/bg-contact.png);">

  <div class="container mx-auto px-s4 lg:px-0 min-h-full">

    <div class="grid lg:grid-rows-3 lg:grid-cols-5 gap-4 min-h-screen">

      <h1 class="col-span-12 lg:col-span-3 lg:row-start-1 lg:row-span-2 text-h1Mobile md:text-h1Tablet lg:text-h1">
        <?php the_title(); ?>
      </h1>

      <div class="col-span-12 md:max-lg:col-start-6 lg:col-span-2 lg:row-span-3 pt-s8 lg:pt-0">
        <h2 class="text-h2Mobile md:text-h2Tablet lg:text-h2">Say Hello</h2>
        <?php echo do_shortcode( $contact_form_shortcut ); ?>
      </div>
      
      <div class="col-span-12 pt-s4 lg:pt-0 lg:col-span-3 lg:row-start-3 flex items-end gap-4">
        <p class="text-b2 leading-6">
          <a href="#"><?php echo $contact_phone_number ?></a>
          <br />
          <a href="#"><?php echo $contact_email; ?></a>
        </p>
        <p class="text-b2">
          <a href="#">LinkdIn</a>
        </p>
      </div>

    </div>
    <!-- Grid -->

  </div>
  <!-- Container -->

</section>
