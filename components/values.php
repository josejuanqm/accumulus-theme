<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 lg:pb-s12">
  <div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col gap-s3">
    <h3 class="text-h3Mobile lg:text-h3">Regulatory Influencers</h3>
    <p class="b2">Thanks to our team’s deep regulatory expertise, we’re well-positioned to engage with Health Authorities to shape policies and priorities that favorably impact public health.</p>
  </div>
  <div class="row-start-1 col-span-12 md:col-span-6 md:col-start-7">
    <img src="<?php bloginfo('template_url'); ?>/images/home/regulatory-influencers.png" alt="Nonprofit" />
  </div>
</div>
<!-- Regulatory Influencers -->

<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 lg:pb-s12">
  <div class="col-span-12 md:col-span-6">
    <img src="<?php bloginfo('template_url'); ?>/images/home/technology-developers.png" alt="Nonprofit" />
  </div>
  <div class="col-span-12 md:col-span-5 lg:col-span-4 md:col-start-8 lg:col-start-8 flex flex-col gap-s3">
    <h3 class="text-h3Mobile lg:text-h3">Technology Developers</h3>
    <p class="b2">With our data exchange SaaS platform, we’re pushing the boundaries of what’s currently possible, creating transformative changes and industry improvements.</p>
  </div>
</div>
<!-- Technology developers -->


<!-- Resources List -->

<div class="card col-span-12 md:col-span-6 lg:col-span-8 relative lg:flex lg:items-stretch w-full rounded-card overflow-hidden bg-primary-glaciar">
  <a href="#" class="absolute top-0 left-0 w-full h-full z-10"></a>
  <div class="relative w-full lg:w-1/2 flex items-center justify-center h-[275px] lg:h-full bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url(<?php bloginfo('template_url'); ?>/images/resources/mask-group8.png)">
    <!-- <img src="<?php bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->
  </div>
  <div class="flex flex-col lg:w-1/2 lg:justify-end p-7 gap-2">
    <div class="flex items-center gap-3 text-neutral-dgray uppercase">
      <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.8327 0H1.72202C0.924517 0 0.277344 0.647175 0.277344 1.44468V13H1.72202V1.44468H11.8327V11.5553H3.16564V13H11.8327C12.6302 13 13.2773 12.3528 13.2773 11.5553V1.44468C13.2773 0.647175 12.6302 0 11.8327 0Z" fill="#444444"/>
        <path d="M5.9615 3.94824V3.95784H4.85693V9.09792H5.8922L9.04278 6.99753V6.00278L5.9615 3.94824ZM6.24297 5.80127L7.29104 6.49962L6.24297 7.19798V5.80021V5.80127Z" fill="#444444"/>
        <path d="M11.8327 0H1.72202C0.924517 0 0.277344 0.647175 0.277344 1.44468V13H1.72202V1.44468H11.8327V11.5553H3.16564V13H11.8327C12.6302 13 13.2773 12.3528 13.2773 11.5553V1.44468C13.2773 0.647175 12.6302 0 11.8327 0Z" fill="#444444"/>
        <path d="M5.9615 3.94824V3.95784H4.85693V9.09792H5.8922L9.04278 6.99753V6.00278L5.9615 3.94824ZM6.24297 5.80127L7.29104 6.49962L6.24297 7.19798V5.80021V5.80127Z" fill="#444444"/>
      </svg>
      <span>Events</span>
    </div>
    <h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray">Lorem Ipsum Dolor Lorem Ipsum Dolor</h3>
  </div>
</div>

<?php for($i=1;$i<=7;$i++): ?>
<div class="<?php echo $i; ?> card col-span-12 md:col-span-6 lg:col-span-4 relative w-full rounded-card overflow-hidden <?php if ($i===1 || $i === 6): ?> bg-secondary-green text-neutral-nwhite <?php elseif ($i===2 || $i===4): ?> bg-primary-glaciar text-neutral-dgray <?php elseif ($i===3 || $i===5 || $i===7): ?> bg-neutral-offwhite text-neutral-dgray<?php endif; ?>">
  <a href="#" class="absolute top-0 left-0 w-full h-full z-10"></a>
  <div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url(<?php bloginfo('template_url'); ?>/images/resources/mask-group<?php echo $i; ?>.png)">
    <!-- <img src="<?php bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->
  </div>
  <div class="flex flex-col p-7 gap-2">
    <div class="flex items-center gap-3 uppercase">
      <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.2773 2.88949V11.5558H11.8331V1.08477C11.8331 0.485348 11.3478 0 10.7484 0H1.36211C0.762687 0 0.277344 0.485348 0.277344 1.08477V11.5558C0.277344 12.3532 0.924114 13 1.72155 13H13.2773C14.0748 13 14.7215 12.3532 14.7215 11.5558V2.88949H13.2773ZM1.72155 11.5558V1.44421H10.3879V11.5547H1.72155V11.5558Z" class=" fill-current"/>
        <path d="M8.94196 8.66504H3.16406V10.1092H8.94196V8.66504Z" class="fill-current"/>
        <path d="M8.94196 5.77832H3.16406V7.22253H8.94196V5.77832Z" class="fill-current"/>
        <path d="M8.94196 2.8877H3.16406V4.3319H8.94196V2.8877Z" class="fill-current"/>
      </svg>
      <span>Category</span>
    </div>
    <h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray">Lorem Ipsum Dolor Lorem Ipsum Dolor</h3>
  </div>
</div>
<?php endfor; ?>



<!-- top stories -->

<div class="col-span-12 md:col-span-6 lg:col-span-12 flex flex-col-reverse md:flex-row items-stretch md:justify-between bg-secondary-deepLilac rounded-miniCard overflow-hidden">
  <div class="relative flex flex-col gap-s2 py-s2 pl-s7 pr-s2">
      <span class="absolute top-s2 left-s2 flex items-center justify-center w-s3 h-s3 text-h5Mobile md:text-h5Tablet lg:text-h5 rounded-full aspect-square bg-secondary-lilac">4</span>
      <span class="flex items-center gap-s1 pt-1 text-h4Mobile md:text-h4Tablet lg:text-h4 uppercase">
        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.442 0H2.3314C1.53389 0 0.886719 0.647175 0.886719 1.44468V13H2.3314V1.44468H12.442V11.5553H3.77502V13H12.442C13.2395 13 13.8867 12.3528 13.8867 11.5553V1.44468C13.8867 0.647175 13.2395 0 12.442 0Z" fill="#444444"/>
          <path d="M6.57088 3.94824V3.95784H5.46631V9.09792H6.50158L9.65215 6.99753V6.00278L6.57088 3.94824ZM6.85235 5.80127L7.90041 6.49962L6.85235 7.19798V5.80021V5.80127Z" fill="#444444"/>
          <path d="M12.442 0H2.3314C1.53389 0 0.886719 0.647175 0.886719 1.44468V13H2.3314V1.44468H12.442V11.5553H3.77502V13H12.442C13.2395 13 13.8867 12.3528 13.8867 11.5553V1.44468C13.8867 0.647175 13.2395 0 12.442 0Z" fill="#444444"/>
          <path d="M6.57088 3.94824V3.95784H5.46631V9.09792H6.50158L9.65215 6.99753V6.00278L6.57088 3.94824ZM6.85235 5.80127L7.90041 6.49962L6.85235 7.19798V5.80021V5.80127Z" fill="#444444"/>
        </svg>
        Media
      </span>
      <h3 class="text-h3Mobile md:text-h3Tablet lg:text-h3">Lorem ipsum dolor sit amet</h3>
  </div>
  <img class="w-full md:w-[175px] max-h-[144px] md:max-h-full" src="<?php bloginfo('template_url'); ?>/images/resources/4-mini-thumb.png" alt="" />
</div>