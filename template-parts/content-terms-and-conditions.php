<section class="section bg-cover bg-bottom" style="background-image: url(<?php bloginfo('template_url'); ?>/images/legal/hero.jpg);">
  <div class="container mx-auto px-4 lg:px-0">
    <div class="grid grid-cols-12 gap-x-s6 py-s6 md:py-s8">
      <h1 class="heading-1 col-span-12">
        <?php the_title(); ?>
      </h1>
    </div>
  </div>
</section>

<section class="section">
  <div class="container mx-auto px-4 lg:px-0">
    <div class="content-wrapper max-w-full col-span-12 flex flex-col gap-s4 [&>h3]:text-h3Mobile md:[&>h3]:text-h3Tablet lg:[&>h3]:text-h3 [&>h4]:text-h4Mobile md:[&>h4]:text-h4Tablet lg:[&>h4]:text-h4 [&>h5]:text-h5Mobile md:[&>h5]:text-h5Tablet lg:[&>h5]:text-h5">
      <?php the_content(); ?>
    </div>
  </div>
</section>
