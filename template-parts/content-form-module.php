<section class="relative w-full bg-primary-violet">
  <div class="grid grid-cols-6 md:grid-cols-12 gap-x-4">
    <div class="col-span-6 md:col-span-12 lg:col-span-4">
      <picture class="block w-full h-full">
        <source media="(min-width:1025px)" srcset="<?php bloginfo('template_url'); ?>/images/home/form-module-desktop.png">
        <source media="(min-width:768px)" srcset="<?php bloginfo('template_url'); ?>/images/home/form-module-tablet.png">
        <img src="<?php bloginfo('template_url'); ?>/images/home/form-module-mobile.png" class="w-full h-full object-cover" />
      </picture>
    </div>

    <div class="col-span-6 md:col-span-12 lg:col-span-7 lg:col-start-6 px-s2 lg:px-0 pt-s4 md:pt-s8 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 text-neutral-nwhite">
      <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6 lg:max-w-[655px]">
        <h4 class="heading-4 col-span-6 md:col-span-12">LEARN MORE</h4>
        <h2 class="heading-2 col-span-6 md:col-span-12">A New Era of Regulatory Connectivity</h2>
        <p class="body-3 col-span-6 md:col-span-12">Discover how the Accumulus platform can transform your regulatory interactions. Our overview highlights key features, benefits, and real-world applications that make the Accumulus platform an essential tool for your organization. Get the insights you need to make an informed decision—download now!​</p>
        <div class="form-module col-span-6 md:col-span-12 lg:col-span-8">
          <?php echo do_shortcode('[wpforms id="604"]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>