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

<section class="translucent-navigation relative section w-full pb-s8 md:pb-s7 lg:pb-s12 min-h-full bg-cover lg:bg-contain bg-left-bottom lg:bg-left-top bg-no-repeat" style="background-image: url(<?php bloginfo( 'template_url' ); ?>/images/contact/bg-contact.png);">

  <div class="container mx-auto px-s4 lg:px-0 min-h-full pt-s5 md:pt-s10 lg:pt-s9">

    <div class="grid lg:grid-cols-12 lg:items-stretch gap-4">

      <div class="col-span-12 md:col-span-12 lg:col-span-7 lg:flex lg:flex-col lg:justify-between">
        <h1 class="heading-1">
          <?php the_title(); ?>
        </h1>

        <div class="col-span-12 pt-s4 lg:pt-0 lg:col-span-3 hidden lg:flex items-end gap-4">
          <p class="body-2 leading-6">
            <a href="#"><?php echo $contact_phone_number ?></a>
            <br />
            <a href="#"><?php echo $contact_email; ?></a>
          </p>
          <p class="body-2 lg:-mb-[1px]">
            <a href="#">LinkedIn</a>
          </p>
        </div>
      </div>

      
      <div class="col-span-12 md:col-span-12 lg:col-span-5 pt-s2 md:pt-s8 lg:pt-0">
        <h2 class="heading-2 max-lg:pl-[35%] max-md:pl-0">Say Hello</h2>
        <?php echo do_shortcode( $contact_form_shortcut ); ?>
      </div>
      
      <div class="col-span-12 pt-s4 flex lg:hidden items-end gap-4">
        <p class="body-2 leading-6">
          <a href="#"><?php echo $contact_phone_number ?></a>
          <br />
          <a href="#"><?php echo $contact_email; ?></a>
        </p>
        <p class="body-2 -mb-[1px]">
          <a href="#" class="leading-6">LinkedIn</a>
        </p>
      </div>

    </div>
    <!-- Grid -->

  </div>
  <!-- Container -->

</section>
