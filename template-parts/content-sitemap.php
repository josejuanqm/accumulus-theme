

<?php

$company_links = get_field('company_links');
$platform_links = get_field('platform_links');
$contact_links = get_field('contact_links');
$resources_links = get_field('resources_links');
$legal_links = get_field('legal_links');

?>


<section class="section bg-secondary-lilac pb-s8 md:pb-s13 lg:pb-s20">
  <div class="container mx-auto px-4 lg:px-0 pt-s5 md:pt-s13 lg:pt-s16">
    <div class="grid grid-cols-12 gap-x-s2 pb-s6 md:pb-s10 lg:pb-s15">
      <h1 class="heading-1 col-span-12  md:col-span-5 lg:col-span-5 col-start-1 md:col-start-1 lg:col-start-2 pb-s8 lg:pb-0">
        <?php the_title(); ?>
      </h1>

      <div class="flex flex-row justify-between col-span-6 md:col-span-3 lg:col-span-2 col-start-1 md:col-start-6 lg:col-start-8">
        <ul class="flex flex-col items-start gap-s2 list-none">
          <li><p class="text-neutral-dgray heading-6 pb-s2">Company</p></li>
          <?php foreach($company_links as $link): ?>
          <li><a class="text-neutral-dgray body-3" href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target'] ? $link['link']['target'] : '_self' ?>"><?php echo $link['link']['title']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="flex flex-row justify-between col-span-6 md:col-span-3 lg:col-span-2 col-start-7 md:col-start-9 lg:col-start-10">
        <ul class="flex flex-col items-start gap-s2 list-none">
          <li><p class="text-neutral-dgray heading-6 pb-s2">Platform</p></li>
          <?php foreach($platform_links as $link): ?>
          <li><a class="text-neutral-dgray body-3" href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target'] ? $link['link']['target'] : '_self' ?>"><?php echo $link['link']['title']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6">
      <ul class="flex flex-col items-start gap-s2 list-none row-start-2 md:row-start-2 lg:row-start-1 col-span-6 md:col-span-3 lg:col-span-2 col-start-1 md:col-start-6 lg:col-start-2">
        <?php foreach($contact_links as $link): ?>
          <li><a class="text-neutral-dgray body-3" href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target'] ? $link['link']['target'] : '_self' ?>"><?php echo $link['link']['title']; ?></a></li>
          <?php endforeach; ?>
      </ul>

      <div class="flex flex-row justify-between row-start-1 col-span-6 md:col-span-3 lg:col-span-2 col-start-1 md:col-start-6 lg:col-start-8">
        <ul class="flex flex-col items-start gap-s2 list-none">
          <li><p class="text-neutral-dgray heading-6 pb-s2">Resources</p></li>
          <?php foreach($resources_links as $link): ?>
          <li><a class="text-neutral-dgray body-3" href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target'] ? $link['link']['target'] : '_self' ?>"><?php echo $link['link']['title']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="flex flex-row justify-between row-start-1 col-span-6 md:col-span-3 lg:col-span-2 col-start-7 md:col-start-10 lg:col-start-10">
        <ul class="flex flex-col items-start gap-s2 list-none">
          <li><p class="text-neutral-dgray heading-6 pb-s2">Legal</p></li>
          <?php foreach($legal_links as $link): ?>
          <li><a class="text-neutral-dgray body-3" href="<?php echo $link['link']['url']; ?>" target="<?php echo $link['link']['target'] ? $link['link']['target'] : '_self' ?>"><?php echo $link['link']['title']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
