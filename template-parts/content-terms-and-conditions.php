<section class="section bg-cover bg-bottom" style="background-image: url(<?php bloginfo('template_url'); ?>/images/legal/hero.jpg);">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 lg:gap-x-s6 gap-y-s6 py-s6 md:py-s8">
      <h3 class="heading-4 col-span-12">ACCUMULUS SYNERGY</h3>
      <h1 class="heading-1 col-span-12">
        <?php the_title(); ?>
      </h1>
    </div>
  </div>
</section>

<section class="section py-s8 md:py-s12 lg:py-s14">
  <div class="container mx-auto">
    <div class="legal-texts content-wrapper max-w-full col-span-12 flex flex-col gap-s4 md:gap-s6 [&>h3]:heading-3 [&>h4]:heading-4 [&>h5]:heading-5 [&>.wp-block-columns]:!flex-row [&>.wp-block-columns]:lg:pl-s6 [&>.wp-block-columns]:lg:!mb-0 [&>.wp-block-columns]:!gap-s3 [&>.wp-block-columns]:md:!gap-s10 [&>.wp-block-columns]:lg:!gap-s14 [&>.wp-block-separator]:lg:ml-s6">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<style>

.wp-block-column {
  flex-basis: 50% !important;
}
</style>
