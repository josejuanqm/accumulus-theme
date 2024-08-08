<!-- BEGIN QUOTE -->
<section class="section relative py-s6 <?php echo $args['bg_color']; ?>">
  <div class="container mx-auto">
    <div class="grid grid-cols-12">
      <?php if (array_key_exists('main_quote', $args)) { ?>
        <h2 class="col-start-1 col-span-12 md:col-span-9 <?php echo array_key_exists('titled', $args) ? 'heading-2 pb-s7' : 'heading-3'; ?> <?php echo array_key_exists('inverted', $args) ? 'row-start-2 heading-2' : ''; ?>">
          <?php echo $args['main_quote'] ?>
        </h2>
      <?php } ?>
      <h3
        class="col-span-9 md:col-span-8 pb-s8 lg:pb-s4 <?php !array_key_exists('main_quote', $args) ? 'col-start-3 md:col-start-4' : 'col-start-1 md:col-start-1 pt-s8 lg:pt-s6' ?> <?php echo array_key_exists('inverted', $args) ? 'row-start-3 body-1' : 'body-2' ?>">
        <?php echo $args['sub_quote'] ?>
      </h3>
      <div class="flex items-start justify-normal <?php echo array_key_exists('stacked-author', $args) ? 'flex-col col-start-2 md:col-start-7 lg:col-start-7 col-end-11 md:col-end-9 lg:col-end-10' : 'flex-row col-start-1 md:col-start-6 lg:col-start-6 col-end-12 md:col-end-12 lg:col-end-12' ?> <?php echo array_key_exists('inverted', $args) ? 'row-start-1' : 'row-start-3' ?> gap-s2 <?php array_key_exists('references', $args) && 'pb-s6'; ?>">
        <div class="relative w-40 md:w-[224px] aspect-square rounded-3xl bg-primary-glaciar overflow-hidden flex-shrink-0">
          <img class="w-full h-full" src="<?php echo $args['image']; ?>" alt="<?php echo $args['author']; ?>" />
          <svg class="absolute bottom-s3 right-s3" width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.03125" y="0.619141" width="52" height="52" rx="14" fill="#12D0FF"/>
            <path d="M37.6914 22.9769C37.543 22.9769 37.2686 22.99 37.1238 23.0107C33.6938 23.4167 29.839 21.0767 29.2884 16.5886C29.0196 14.352 27.1101 12.6191 24.8002 12.6191C22.3024 12.6191 20.2782 14.6433 20.2782 17.1411C20.2782 17.6298 20.3571 18.1034 20.5019 18.547C21.6709 22.1236 21.2198 24.9973 15.7769 26.7771C13.0216 27.6774 11.0312 30.2617 11.0312 33.3177C11.0312 37.118 14.1136 40.2003 17.9138 40.2003C21.7141 40.2003 24.7964 37.118 24.7964 33.3177C24.7964 32.2389 24.5427 31.2277 24.0992 30.3181C23.7721 29.6377 23.5316 29.0156 23.3568 28.4386C23.291 28.2694 23.2365 28.0909 23.1914 27.9123C23.1839 27.8785 23.1745 27.8409 23.1669 27.809C23.1463 27.7225 23.1294 27.6398 23.1124 27.5515C23.088 27.4274 23.0711 27.3109 23.0579 27.2075C23.0579 27.1793 23.0504 27.1493 23.0504 27.1211C23.0128 26.764 23.0297 26.5328 23.0297 26.5328C23.0222 25.5329 23.3417 24.6045 23.8887 23.8245C24.7964 22.4807 26.332 21.5936 28.078 21.5936C28.1362 21.5936 28.1945 21.6011 28.2528 21.6011C28.5272 21.6011 28.8053 21.6349 29.0816 21.6932C29.1267 21.7007 29.1681 21.7139 29.2151 21.727C29.3147 21.7515 29.4143 21.7721 29.5139 21.806C29.6379 21.8435 29.762 21.8887 29.8823 21.9338C29.9067 21.9413 29.9368 21.9507 29.9612 21.962C30.0533 21.9995 30.1398 22.0409 30.23 22.0822C30.7487 22.3191 31.243 22.6292 31.6809 22.9994C31.726 23.037 31.7674 23.0746 31.8144 23.1065C31.8595 23.1441 31.9102 23.1855 31.9516 23.2231C33.0999 24.2023 33.8592 25.5705 34.1505 27.0929C34.4531 28.698 35.8627 29.914 37.5599 29.914C39.4769 29.914 41.0312 28.3578 41.0312 26.4426C41.0312 24.5274 39.616 23.0201 37.6914 22.9825" fill="#FCFCFC"/>
            <path d="M31.5371 26.6377C31.5371 28.5491 29.9865 30.1015 28.0732 30.1015C26.1599 30.1015 24.6094 28.551 24.6094 26.6377C24.6094 24.7244 26.1599 23.1738 28.0732 23.1738C29.9865 23.1738 31.5371 24.7244 31.5371 26.6377Z" fill="#FCFCFC"/>
          </svg>
        </div>
        <div class="flex flex-col items-start gap-s2">
          <p class="<?php echo array_key_exists('stacked-author', $args) ? 'heading-6' : 'heading-3' ?>">
            <?php echo $args['author']; ?>
          </p>
          <p class="<?php echo array_key_exists('stacked-author', $args) ? 'body-4' : 'body-3' ?>">
            <?php echo $args['position']; ?>
          </p>
        </div>
      </div>
      <?php if (array_key_exists('references', $args)) { ?>
      <ul class="flex flex-col items-start col-start-1 md:col-start-2 col-span-12 md:col-span-10 <?php echo array_key_exists('inverted', $args) ? 'row-start-4' : '' ?>">
        <?php
          for ($i=0; $i < count($args['references']); $i++) { 
            ?>
              <p class="body-4">
                <span>
                  <?php echo $i + 1; ?>.
                </span>
                <span>
                <?php echo $args['references'][$i + 1]; ?>
                </span>
              </p>
            <?php
          }
        ?>
      </ul>
      <?php } ?>
    </div>
  </div>
</section>
<!-- END QUOTE -->
