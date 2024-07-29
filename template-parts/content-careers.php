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
	// Fields main banner
	$bg_image_main = "";
	$main_title = "Join Us";
	$resume_text = "Working at Accumulus Synergy is more than a job, it’s a passion and a responsibility. We’re a community of diverse individuals driven by a common purpose — to accelerate the availability of therapies to patients through a global digital transformation.";
	$link_learn_more = get_field('link_learn_more');
?>

<section class="section w-full pt-0 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 text-neutral-fnude bg-secondary-carbon bg-case-for-change-mobile md:bg-case-for-change-tablet lg:bg-case-for-change-desktop bg-cover bg-no-repeat bg-center">

	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">

			<h1 class="col-span-12 text-h1Mobile md:text-h1Tablet lg:text-h1"><?php echo $main_title; ?></h1>

			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="text-b2 md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_learn_more; ?>" class="btn-secondary-inverted">Explore More</a>
      </div>

		</div>
	</div>

</section>

<section class="relative section w-full pt-s12 md:pt-s10 pb-s10 md:pb-s12 bg-secondary-lilac">
	<div class="container mx-auto px-s4 lg:px-0">
		<div class="flex flex-col gap-s8">
			<h2 class="w-full text-h2Mobile md:text-h2Tablet lg:text-h2">Open Roles</h2>
			<div class="relative w-full">
				<div class="related">
					<?php 

            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'event' ),
              'nopaging'               => true,
              'posts_per_page'         => '9',
            );

            // The Query
            $query = new WP_Query( $args );
            // The Loop
            if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
                $query->the_post();
                
            //for($i=1;$i<7;$i++): 
          ?>
						<div class="card relative w-full max-w-[370px] rounded-card overflow-hidden mx-2">

							<a href="#" class="absolute top-0 left-0 w-full h-full z-10"></a>

							<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square " style="background-image: url(<?php bloginfo('template_url'); ?>/images/home/thumb-slider.png)">

								<!-- <img src="<?php //bloginfo('template_url'); ?>/images/home/mini-logo.png" /> -->

                <?php if (has_post_thumbnail( get_the_ID() ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
                  <img class="block w-full h-full object-cover" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />
                <?php endif; ?>

							</div>

							<div class="flex flex-col p-7 gap-2 bg-neutral-nwhite">
								<div class="flex items-center gap-3 text-primary-violet uppercase">
									<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5.2189 4.95996H3.59375V6.58511H5.2189V4.95996Z" fill="#411693"/>
										<path d="M5.2189 8.20996H3.59375V9.83511H5.2189V8.20996Z" fill="#411693"/>
										<path d="M8.4689 8.20996H6.84375V9.83511H8.4689V8.20996Z" fill="#411693"/>
										<path d="M11.7169 8.20996H10.0918V9.83511H11.7169V8.20996Z" fill="#411693"/>
										<path d="M8.4689 4.95996H6.84375V6.58511H8.4689V4.95996Z" fill="#411693"/>
										<path d="M11.7169 4.95996H10.0918V6.58511H11.7169V4.95996Z" fill="#411693"/>
										<path d="M13.3425 1.71011H11.7174V0.0849609H10.0923V1.71011H5.218V0.0849609H3.59285V1.71011H1.9677C1.07177 1.71011 0.34375 2.43693 0.34375 3.33406V11.4586H1.9689V3.33526H13.3425V11.4598H3.59285V13.085H13.3425C14.2397 13.085 14.9677 12.3569 14.9677 11.4598V3.33526C14.9677 2.43813 14.2397 1.71011 13.3425 1.71011Z" fill="#411693"/>
									</svg>
									<span>Events</span>
								</div>
								<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"><?php the_title(); ?></h3>
							</div>

						</div>
						<?php 
              //endfor; 
                }
              } else {
                // no posts found
              }

              // Restore original Post Data
              wp_reset_postdata();
            ?>
				</div>
					
				<div class="max-xl:flex max-xl:items-center max-xl:justify-center max-xl:gap-4 max-sm:pt-s6 max-xl:pt-s10">
					<div class="prev xl:absolute xl:-left-20 xl:top-1/4 cursor-pointer">
						<img class="block w-[54px] h-[54px] aspect-square rotate-180" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
					</div>
					<div class="next xl:absolute xl:-right-20 xl:top-1/4 cursor-pointer">
						<img class="block w-[54px] h-[54px] aspect-square" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- Events carousel -->

<section>
  <div class="container mx-auto px-s2 flex flex-col items-stretch">
    <div class="flex flex-col items-stretch py-s6 gap-s6">
    <h2 class="heading-2">Our Culture Pillars</h2>
    <div class="grid grid-cols-2 gap-x-s6 gap-y-s6 [&>figure>img]:max-h-[330px]">
      <?php for($i=1;$i<5;$i++): ?>
      <figure class="flex flex-col items-start justify-normal gap-s2 col-span-2 md:col-span-1 lg:col-span-1">
        <div class="relative flex flex-row items-center justify-center">
          <svg width="153" height="132" viewBox="0 0 153 132" fill="none" xmlns="http://www.w3.org/2000/svg" class="z-10 absolute mix-blend-multiply">
          <g style="mix-blend-mode:multiply" clip-path="url(#clip0_3459_53732)">
          <path d="M101.536 58.6543H51.3232C42.2261 58.6543 34.8477 66.0289 34.8477 75.1213V131.259H51.4828V75.2686H101.376V131.259H118.011V75.1213C118.011 66.0289 110.633 58.6543 101.536 58.6543Z" fill="#00B4B3"/>
          <path d="M76.4271 50.1271C90.2017 50.1271 101.374 38.961 101.374 25.1934C101.374 11.4259 90.214 0.259766 76.4271 0.259766C62.6401 0.259766 51.4805 11.4259 51.4805 25.1934C51.4805 38.961 62.6524 50.1271 76.4271 50.1271ZM76.4271 16.2114C81.3869 16.2114 85.4138 20.2362 85.4138 25.1934C85.4138 30.1507 81.3869 34.1755 76.4271 34.1755C71.4672 34.1755 67.4404 30.1507 67.4404 25.1934C67.4404 20.2362 71.4672 16.2114 76.4271 16.2114Z" fill="#00B4B3"/>
          <path d="M135.959 58.6543H127.488V75.2808H135.8V131.271H152.435V75.1336C152.435 66.0411 145.056 58.6666 135.959 58.6666V58.6543Z" fill="#00B4B3"/>
          <path d="M135.802 25.1934C135.802 11.4259 124.63 0.259766 110.855 0.259766V16.2114C115.815 16.2114 119.842 20.2362 119.842 25.1934C119.842 30.1507 115.815 34.1755 110.855 34.1755V50.1271C124.63 50.1271 135.802 38.961 135.802 25.1934Z" fill="#00B4B3"/>
          <path d="M0.433594 75.1219V131.259H17.0688V75.2691H25.3802V58.6426H16.9092C7.812 58.6426 0.433594 66.0172 0.433594 75.1096V75.1219Z" fill="#00B4B3"/>
          <path d="M42.013 50.1271V34.1755C37.0532 34.1755 33.0263 30.1507 33.0263 25.1934C33.0263 20.2362 37.0532 16.2114 42.013 16.2114V0.259766C28.2384 0.259766 17.0664 11.4259 17.0664 25.1934C17.0664 38.961 28.2384 50.1271 42.013 50.1271Z" fill="#00B4B3"/>
          </g>
          <defs>
          <clipPath id="clip0_3459_53732">
          <rect width="152" height="131" fill="white" transform="translate(0.433594 0.259766)"/>
          </clipPath>
          </defs>
          </svg>
          <img class="block rounded-md top-0 left-0 right-0 bottom-0 z-0" src="<?php bloginfo('template_url'); ?>/images/careers/bg-block.png" />
        </div>
        <div class="flex flex-col items-start justify-normal gap-s2">
          <p class="body-1">
            Mission-Driven
          </p>
          <p class="body-2">
            We’re deeply motivated by our mission and the impact our work is making on citizens of the world. We strive to ensure our efforts produce tangible benefits that continually move our mission forward.
          </p>
        </div>
      </figure> 
      <?php endfor; ?>
    </div>
  </div>
</section>


<!-- BEGIN PARADIGM SHIFT -->
 <section class="section relative w-full py-s6 bg-neutral-offwhite">
		<div class="container mx-auto">
			<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:py-s6 md:py-s8">
				<h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1">
					<span class="block col-span-12">
            Why
					</span>
					<span class="block col-span-10 col-start-3 row-start-2">
						Accumulus
					</span>
				</h2>
			</div>
			<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s8 lg:py-s6 pt-s4 md:pt-0">
				<?php
					for ($i=0; $i < 3; $i++) { 
						?>
						<div class="col-span-12 md:col-span-12 lg:col-span-6">
							<div class="grid grid-cols-[64px, 1fr] gap-x-s2">
								<div class="flex flex-col items-center justify-center col-start-1 col-span-1">
									<svg class="w-s4 md:w-s8 h-s4 md:h-s8 aspect-square" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect x="0.03125" y="0.172852" width="64" height="64" rx="10.9714" fill="#E5E5E5"/>
										<path d="M32.5312 48.1696C41.0919 48.1696 48.0312 41.2302 48.0312 32.6696C48.0312 31.9178 47.9757 31.1791 47.8711 30.4567H43.2296C43.3767 31.1725 43.4551 31.9113 43.4551 32.6696C43.4551 38.6937 38.5554 43.5935 32.5312 43.5935C26.5071 43.5935 21.6074 38.6937 21.6074 32.6696C21.6074 27.4038 25.35 22.9976 30.3151 21.9712V34.8825H39.1699V30.4534H34.7409V17.1729H32.528C31.7762 17.1729 31.0375 17.2284 30.3151 17.333C22.8037 18.4084 17.0312 24.864 17.0312 32.6729C17.0312 41.2335 23.9706 48.1728 32.5312 48.1728V48.1696Z" fill="#444444"/>
									</svg>
								</div>
								<h3 class="heading-3 col-start-2 col-span-1">
								Meaningful Impact
								</h3>
								<p class="body-2 col-start-2 col-span-1 row-start-2">
                  Be a part of something bigger than yourself. We’re working to transform industries, challenge conventions, and positively impact patient lives. With every project you undertake, you’ll have the satisfaction of knowing that you’re working toward accelerating therapies to patients around the world. Together, we can shape the future.
								</p>
							</div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
 </section>
<!-- END PARADIGM SHIFT -->

<?php
  $args = array( 
		'bg_color' => 'bg-neutral-lfnude',
		'main_quote' => '“I’m excited and honored to do my part in bringing life-saving therapies to patients globally.”',
		'sub_quote' => 'I get to go to work and know that my contributions are impacting real people in a profound way.',
		'author' => 'Melody Chessia',
		'position' => 'Senior Product Manager',
		'image' => 'https://via.placeholder.com/224',
		'references' => array(
		),
  );
?>

<section class="section relative py-s6 <?php echo $args['bg_color']; ?>">
  <div class="container mx-auto">
    <div class="grid grid-cols-12">
      <div class="flex flex-row items-start justify-normal col-start-1 md:col-start-6 lg:col-start-6 col-span-12 md:col-span-6 lg:col-span-5 <?php echo $args['inverted'] ? 'row-start-1' : 'row-start-1' ?> gap-s2 pb-s6">
        <div class="relative w-40 md:w-[224px] aspect-square rounded-3xl bg-primary-glaciar overflow-hidden flex-shrink-0">
          <img class="w-full h-full" src="<?php echo $args['image']; ?>" alt="<?php echo $args['author']; ?>" />
          <svg class="absolute bottom-s3 right-s3" width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.03125" y="0.619141" width="52" height="52" rx="14" fill="#12D0FF"/>
            <path d="M37.6914 22.9769C37.543 22.9769 37.2686 22.99 37.1238 23.0107C33.6938 23.4167 29.839 21.0767 29.2884 16.5886C29.0196 14.352 27.1101 12.6191 24.8002 12.6191C22.3024 12.6191 20.2782 14.6433 20.2782 17.1411C20.2782 17.6298 20.3571 18.1034 20.5019 18.547C21.6709 22.1236 21.2198 24.9973 15.7769 26.7771C13.0216 27.6774 11.0312 30.2617 11.0312 33.3177C11.0312 37.118 14.1136 40.2003 17.9138 40.2003C21.7141 40.2003 24.7964 37.118 24.7964 33.3177C24.7964 32.2389 24.5427 31.2277 24.0992 30.3181C23.7721 29.6377 23.5316 29.0156 23.3568 28.4386C23.291 28.2694 23.2365 28.0909 23.1914 27.9123C23.1839 27.8785 23.1745 27.8409 23.1669 27.809C23.1463 27.7225 23.1294 27.6398 23.1124 27.5515C23.088 27.4274 23.0711 27.3109 23.0579 27.2075C23.0579 27.1793 23.0504 27.1493 23.0504 27.1211C23.0128 26.764 23.0297 26.5328 23.0297 26.5328C23.0222 25.5329 23.3417 24.6045 23.8887 23.8245C24.7964 22.4807 26.332 21.5936 28.078 21.5936C28.1362 21.5936 28.1945 21.6011 28.2528 21.6011C28.5272 21.6011 28.8053 21.6349 29.0816 21.6932C29.1267 21.7007 29.1681 21.7139 29.2151 21.727C29.3147 21.7515 29.4143 21.7721 29.5139 21.806C29.6379 21.8435 29.762 21.8887 29.8823 21.9338C29.9067 21.9413 29.9368 21.9507 29.9612 21.962C30.0533 21.9995 30.1398 22.0409 30.23 22.0822C30.7487 22.3191 31.243 22.6292 31.6809 22.9994C31.726 23.037 31.7674 23.0746 31.8144 23.1065C31.8595 23.1441 31.9102 23.1855 31.9516 23.2231C33.0999 24.2023 33.8592 25.5705 34.1505 27.0929C34.4531 28.698 35.8627 29.914 37.5599 29.914C39.4769 29.914 41.0312 28.3578 41.0312 26.4426C41.0312 24.5274 39.616 23.0201 37.6914 22.9825" fill="#FCFCFC"/>
            <path d="M31.5371 26.6377C31.5371 28.5491 29.9865 30.1015 28.0732 30.1015C26.1599 30.1015 24.6094 28.551 24.6094 26.6377C24.6094 24.7244 26.1599 23.1738 28.0732 23.1738C29.9865 23.1738 31.5371 24.7244 31.5371 26.6377Z" fill="#FCFCFC"/>
          </svg>
        </div>
        <div class="flex flex-col items-start gap-s2">
        <p class="heading-3 col-start-9 col-span-2 row-start-3">
          <?php echo $args['author']; ?>
        </p>
        <p class="body-3 col-start-9 col-span-2 row-start-3">
          <?php echo $args['position']; ?>
        </p>
        </div>
      </div>
      <h2 class="col-start-1 col-span-12 md:col-span-9 <?php echo $args['inverted'] ? 'row-start-2 heading-1' : 'heading-2' ?>">
        <?php echo $args['main_quote'] ?>
      </h2>
      <h3
        class="col-start-3 md:col-start-4 col-span-9 md:col-span-8 pt-s8 pb-s8 lg:pt-s6 lg:pb-s4 <?php echo $args['inverted'] ? 'row-start-3 body-1' : 'body-2' ?>">
        <?php echo $args['sub_quote'] ?>
      </h3>
    </div>
  </div>
</section>
