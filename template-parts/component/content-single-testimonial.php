<?php 

  // Fields from testimonial

  $testimonial_coc = get_field('testimonial_coc');

?>

<?php if($testimonial_coc) : ?>
<section class="relative section w-full pt-s8 md:pt-s12 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12">
  <div class="container mx-auto">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s8 md:gap-x-s2 md:gap-y-s10">
      <h3 class="col-span-6 md:col-span-10 lg:col-span-9 heading-3 text-neutral-dgray">
        <?php echo $testimonial_coc['testimonial']; ?>
      </h3>
      <div class="col-span-6 md:col-span-7 lg:col-span-5 md:col-start-6 lg:col-start-6 lg:pl-s6 flex items-center justify-start">
        <img class="max-w-[145px] md:max-w-full" src="<?php echo $testimonial_coc['image']; ?>" alt="<?php echo $testimonial_coc['name']; ?>" />
        <div class="flex flex-col pl-s2 gap-s2">
          <?php if($testimonial_coc['name'] !== ''): ?>
          <h4 class="text-h3Mobile md:text-h3Tablet lg:text-h3 text-neutral-dgray w-full md:max-w-[195px]"><?php echo $testimonial_coc['name']; ?></h4>
          <?php endif; ?>
          <p class="text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $testimonial_coc['position']; ?></p>
        </div>
      </div>

      <!-- <p class="col-span-5 md:col-span-8 lg:col-span-9 md:col-start-3 lg:col-start-3 body-1"><?php //echo $testimonial_coc['resume_text']; ?></p> -->
    </div>
  </div>
</section>
<?php endif; ?>
<!-- Testimonial -->

<!-- <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6">
  <div class="col-span-6 md:col-span-7 lg:col-span-5 md:col-start-6 lg:col-start-6 lg:pl-s6 flex items-center justify-start gap-s2">
    <img class="max-w-[145px] md:max-w-full rounded-3xl" src="<?php //echo $args['image']; ?>" alt="<?php //echo $args['author']; ?>" />
    <div class="flex flex-col gap-s2">
      <h4 class="heading-3 text-neutral-dgray w-full md:max-w-[195px]"><?php //echo $args['author']; ?></h4>
      <p class="body-3"><?php //echo $args['position']; ?></p>
    </div>
  </div>
  <h2 class="col-span-6 md:col-span-10 lg:col-span-10 heading-2 text-neutral-dgray">
  <?php //echo $args['main_quote'] ?>
  </h2>
  <p class="col-span-5 md:col-span-8 lg:col-span-8 col-start-2 md:col-start-3 lg:col-start-3 body-1"><?php //echo $args['sub_quote'] ?></p>
</div> -->