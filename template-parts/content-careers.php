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

<!-- Main banner -->

<section class="section relative isolate overflow-hidden w-full pb-s8 md:pb-s10 lg:pb-s12 text-neutral-fnude bg-primary-violet bg-cover bg-no-repeat bg-center">
	<picture class="absolute top-0 left-0 w-full h-full -z-10">
		<source media="(min-width:1024px)" srcset="<?php echo get_template_directory_uri() . "/images/careers/banner-bg.jpg"; ?>">
		<source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() . "/images/careers/banner-bg-tablet.jpg"; ?>">
		<img src="<?php echo get_template_directory_uri() . "/images/careers/bg-main-banner-mobile.png"; ?>" alt="Flowers" class="w-full h-full">
	</picture>
	<div class="container mx-auto pt-s5 md:pt-s8 lg:pt-s9">
		<div class="grid grid-cols-12 gap-x-s2 lg:justify-end">
      <h4 class="heading-4 uppercase">Careers</h4>
			<h1 class="col-span-12 text-neutral-fnude heading-1 mt-s3 md:mt-s4 lg:mt-s6 mb-s3 md:mb-s15 lg:mb-[12rem]"><?php echo $main_title; ?></h1>
			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 mt-s10 md:mt-0 mb-s5 md:mb-s9 lg:mb-s4">
				<p class="body-2 text-neutral-nwhite md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 lg:col-span-6 lg:col-start-6 flex flex-col lg:flex-row gap-s2 lg:gap-s4">
				<a href="<?php echo $link_learn_more; ?>" class="btn-secondary-inverted">Explore More</a>
      </div>
		</div>
	</div>
</section>

<!-- end Main banner -->


<!-- Our culture pillars -->

<section class="section">
  <div class="container mx-auto px-s2 flex flex-col items-stretch">
    <div class="flex flex-col items-stretch py-s8 md:py-s12 gap-s4 md:gap-s6">
      <h2 class="heading-1">Our Culture Pillars</h2>
      <div class="grid grid-cols-2 gap-x-s6 md:gap-x-s10 lg:gap-x-s6 gap-y-s4 md:gap-y-s10 lg:gap-y-s6 [&>figure>img]:max-h-[330px]">
        <figure class="flex flex-col items-start justify-normal gap-s4 md:gap-s3 col-span-2 md:col-span-1 lg:col-span-1">
          <div class="relative flex flex-row items-center justify-center">
            <img class="block rounded-md top-0 left-0 right-0 bottom-0 z-0" src="<?php bloginfo('template_url'); ?>/images/careers/Mission-Driven.png" />
          </div>
          <div class="flex flex-col items-start justify-normal gap-s2 lg:gap-s3">
            <p class="heading-3">
              Mission-Driven
            </p>
            <p class="body-2">
              We’re deeply motivated by our mission and the impact our work is making on citizens of the world. We strive to ensure our efforts produce tangible benefits that continually move our mission forward.
            </p>
          </div>
        </figure> 
        <figure class="flex flex-col items-start justify-normal gap-s4 md:gap-s3 col-span-2 md:col-span-1 lg:col-span-1">
          <div class="relative flex flex-row items-center justify-center">
            <img class="block rounded-md top-0 left-0 right-0 bottom-0 z-0" src="<?php bloginfo('template_url'); ?>/images/careers/Empowerment.png" />
          </div>
          <div class="flex flex-col items-start justify-normal gap-s2 lg:gap-s3">
            <p class="heading-3">
              Empowerment
            </p>
            <p class="body-2">
              Everyone works differently, and we empower our employees to structure their work efforts to suit their needs while recognizing and balancing the needs of the business. We trust our employees to meet their deadlines and achieve great results.
            </p>
          </div>
        </figure>
        <figure class="flex flex-col items-start justify-normal gap-s4 md:gap-s3 col-span-2 md:col-span-1 lg:col-span-1">
          <div class="relative flex flex-row items-center justify-center">
            <img class="block rounded-md top-0 left-0 right-0 bottom-0 z-0" src="<?php bloginfo('template_url'); ?>/images/careers/Collaboration.png" />
          </div>
          <div class="flex flex-col items-start justify-normal gap-s2 lg:gap-s3">
            <p class="heading-3">
              Collaboration
            </p>
            <p class="body-2">
              The best work is done collaboratively. We design our day-to-day efforts and decision-making processes around cross-functional collaboration and knowledge sharing.
            </p>
          </div>
        </figure>
        <figure class="flex flex-col items-start justify-normal gap-s4 md:gap-s3 col-span-2 md:col-span-1 lg:col-span-1">
          <div class="relative flex flex-row items-center justify-center">
            <img class="block rounded-md top-0 left-0 right-0 bottom-0 z-0" src="<?php bloginfo('template_url'); ?>/images/careers/Innovation.png" />
          </div>
          <div class="flex flex-col items-start justify-normal gap-s2 lg:gap-s3">
            <p class="heading-3">
              Innovation
            </p>
            <p class="body-2">
              We embody a mindset that challenges the status quo and embraces the unknown. We understand we’re venturing into uncharted territory and are driven to take calculated risks and work creatively. Responsible innovation is behind everything we do as we develop unprecedented solutions for a highly regulated industry.
            </p>
          </div>
        </figure>
      </div>
    </div>
</section>

<!-- end of Our culture pillars -->


<!-- BEGIN Why Accumulus -->

 <section class="section relative w-full py-s8 md:py-s10 lg:py-s12 bg-neutral-offwhite">
		<div class="container mx-auto">
			<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 pb-s8 md:pb-s6">
				<h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1 text-neutral-dgray">
					<span class="block col-span-12">
            Why
					</span>
					<span class="block col-span-10 col-start-2 row-start-2">
						Accumulus?
					</span>
				</h2>
			</div>
			<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s10 lg:gap-y-s8">
        <div class="col-span-12 md:col-span-6 lg:col-span-5">
          <div class="grid grid-cols-[64px, 1fr] gap-x-s2 gap-y-s3">
            <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
              <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.433594" y="0.613281" width="64" height="64" rx="10.9714" fill="white"/>
                <g clip-path="url(#clip0_4434_34448)">
                <path d="M43.0683 29.3615V25.4789L32.9364 21.2117L22.8046 25.4813V26.057H43.0608V29.3639H19.4414V23.3012L32.9364 17.6133L46.4314 23.2988V29.3615" fill="#444444"/>
                <path d="M24.4921 31.0273H21.1289V42.6433H24.4921V31.0273Z" fill="#444444"/>
                <path d="M44.7421 31.0273H41.3789V42.6433H44.7421V31.0273Z" fill="#444444"/>
                <path d="M37.9921 31.0273H34.6289V42.6433H37.9921V31.0273Z" fill="#444444"/>
                <path d="M31.2421 31.0273H27.8789V42.6433H31.2421V31.0273Z" fill="#444444"/>
                <path d="M46.4336 44.3047H19.4336V47.6116H46.4336V44.3047Z" fill="#444444"/>
                </g>
                <defs>
                <clipPath id="clip0_4434_34448">
                <rect width="27" height="30" fill="white" transform="translate(19.4336 17.6133)"/>
                </clipPath>
                </defs>
              </svg>
            </div>
            <h3 class="heading-3 col-start-2 col-span-1 text-neutral-dgray">
              Meaningful<br />Impact
            </h3>
            <p class="body-2 col-start-2 col-span-1 row-start-2 text-neutral-600">
              Be a part of something bigger than yourself. We’re working to transform industries, challenge conventions, and positively impact patient lives. With every project you undertake, you’ll have the satisfaction of knowing that you’re working toward accelerating therapies to patients around the world. Together, we can shape the future.
            </p>
          </div>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-7">
          <div class="grid grid-cols-[64px, 1fr] gap-x-s2 gap-y-s3">
            <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
              <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.861328" y="0.613281" width="64" height="64" rx="10.9714" fill="white"/>
                <g clip-path="url(#clip0_4434_34440)">
                <path d="M26.4179 31.2148H40.3048C42.8207 31.2148 44.8613 33.1852 44.8613 35.6144V35.6571H21.8613V35.6144C21.8613 33.1852 23.9019 31.2148 26.4179 31.2148Z" fill="#444444"/>
                <path d="M44.8604 35.6523H40.2598V50.6116H44.8604V35.6523Z" fill="#444444"/>
                <path d="M26.462 35.6523H21.8613V50.6116H26.462V35.6523Z" fill="#444444"/>
                <path d="M33.3622 19.8752C34.7339 19.8752 35.8476 20.9505 35.8476 22.275C35.8476 23.5994 34.7339 24.6747 33.3622 24.6747C31.9905 24.6747 30.8768 23.5994 30.8768 22.275C30.8768 20.9505 31.9905 19.8752 33.3622 19.8752ZM33.3622 15.6133C29.5526 15.6133 26.4629 18.5966 26.4629 22.275C26.4629 25.9533 29.5526 28.9366 33.3622 28.9366C37.1718 28.9366 40.2615 25.9533 40.2615 22.275C40.2615 18.5966 37.1718 15.6133 33.3622 15.6133Z" fill="#444444"/>
                <path d="M33.3612 40.3399C32.9571 40.0285 32.4648 39.8711 31.9759 39.8711C31.4055 39.8711 30.8385 40.0809 30.4039 40.5005C29.5347 41.3398 29.5347 42.7003 30.4039 43.5396L32.3562 45.4247L33.3612 46.3951L34.3662 45.4247L36.3185 43.5396C36.7531 43.12 36.9704 42.5692 36.9704 42.0217C36.9704 41.4742 36.7531 40.9235 36.3185 40.5038C35.5104 39.7236 34.2338 39.6678 33.3612 40.3432V40.3399Z" fill="#444444"/>
                </g>
                <defs>
                <clipPath id="clip0_4434_34440">
                <rect width="23" height="35" fill="white" transform="translate(21.8613 15.6133)"/>
                </clipPath>
                </defs>
              </svg>
            </div>
            <h3 class="heading-3 col-start-2 col-span-1 text-neutral-dgray">
              Growth &<br /> Development
            </h3>
            <p class="body-2 col-start-2 col-span-1 row-start-2 text-neutral-600">
              We value your development. At Accumulus, we aim to push the boundaries of what we can achieve together and strive to provide growth opportunities. As a part of our team, you’ll have the chance to collaborate and work on challenging projects. Additionally, we cultivate a culture that promotes leadership at all levels and have a rich pool of accomplished leaders who can mentor you at any stage of your career journey.
            </p>
          </div>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-5">
          <div class="grid grid-cols-[64px, 1fr] gap-x-s2 gap-y-s3">
            <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
              <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.433594" y="0.222656" width="64" height="64" rx="10.9714" fill="white"/>
                <g clip-path="url(#clip0_4434_34433)">
                <path d="M29.0331 17.2227H18.8341C16.9569 17.2227 15.4336 18.7158 15.4336 20.5557V27.2218C15.4336 29.0618 16.9569 30.5549 18.8341 30.5549H32.4336V20.5557C32.4336 18.7158 30.9103 17.2227 29.0331 17.2227ZM29.0331 27.2194H18.8341V20.5557H29.0331V27.2218V27.2194Z" fill="#444444"/>
                <path d="M25.631 33.8945C23.7538 33.8945 22.2305 35.3876 22.2305 37.2276V40.5607C22.2305 42.4006 23.7538 43.8937 25.631 43.8937H29.0315C30.9087 43.8937 32.432 42.4006 32.432 40.5607V33.8945H25.6335H25.631ZM29.0315 40.5607H25.631V37.2276H29.0315V40.5607Z" fill="#444444"/>
                <path d="M42.633 30.5539C44.5102 30.5539 46.0335 29.0608 46.0335 27.2208V23.8877C46.0335 22.0478 44.5102 20.5547 42.633 20.5547H39.2325C37.3554 20.5547 35.832 22.0478 35.832 23.8877V30.5539H42.633ZM39.2325 23.8877H42.633V27.2208H39.2325V23.8877Z" fill="#444444"/>
                <path d="M46.031 33.8931H35.832V43.8898C35.832 45.7298 37.3554 47.2229 39.2325 47.2229H46.0335C47.9107 47.2229 49.434 45.7298 49.434 43.8898V37.2237C49.434 35.3837 47.9107 33.8906 46.0335 33.8906L46.031 33.8931ZM46.031 43.8898H39.2325V37.2237H46.031V43.8898Z" fill="#444444"/>
                </g>
                <defs>
                <clipPath id="clip0_4434_34433">
                <rect width="34" height="30" fill="white" transform="translate(15.4336 17.2227)"/>
                </clipPath>
                </defs>
              </svg>
            </div>
            <h3 class="heading-3 col-start-2 col-span-1 text-neutral-dgray">
              Diversity &<br />Inclusion
            </h3>
            <p class="body-2 col-start-2 col-span-1 row-start-2 text-neutral-600">
              We believe people thrive when they’re respected and valued for being themselves. We celebrate diversity as a source of strength and innovation. At Accumulus, you’ll collaborate with talented individuals from various backgrounds, cultures, and experiences, creating a rich tapestry of global perspectives.
            </p>
          </div>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-7">
          <div class="grid grid-cols-[64px, 1fr] gap-x-s2 gap-y-s3">
            <div class="flex flex-col items-center justify-center col-start-1 col-span-1">
              <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.861328" y="0.222656" width="64" height="64" rx="10.9714" fill="white"/>
                <g clip-path="url(#clip0_4434_34457)">
                <path d="M34.2881 28.6728C35.4325 28.4294 36.469 27.8974 37.3172 27.1571C38.833 25.8395 39.759 23.8645 39.6511 21.6761C39.4805 18.258 36.7124 15.4523 33.2943 15.2365C29.3417 14.988 26.0566 18.1225 26.0566 22.0249C26.0566 24.0728 26.9626 25.9098 28.3981 27.1571C29.2463 27.8974 30.2828 28.4294 31.4272 28.6728C31.8889 28.7707 32.3658 28.8234 32.8576 28.8234C33.3495 28.8234 33.8263 28.7707 34.2881 28.6728ZM29.4446 22.0249C29.4446 20.2055 30.8726 18.7173 32.6669 18.6169C32.7297 18.6144 32.7949 18.6119 32.8576 18.6119C32.9204 18.6119 32.9856 18.6144 33.0484 18.6169C34.8427 18.7173 36.2707 20.2055 36.2707 22.0249C36.2707 22.7226 36.0599 23.3726 35.6985 23.9147C35.0837 24.8307 34.0397 25.4355 32.8576 25.4355C31.6756 25.4355 30.6316 24.8307 30.0168 23.9147C29.6554 23.3726 29.4446 22.7226 29.4446 22.0249Z" fill="#444444"/>
                <path d="M49.8467 42.8577C50.0927 38.905 46.9607 35.625 43.0583 35.625C42.5689 35.625 42.0896 35.6777 41.6303 35.7756C40.4859 36.019 39.4495 36.551 38.5987 37.2914C37.1657 38.5386 36.2598 40.3757 36.2598 42.4235C36.2598 46.3234 39.5423 49.4579 43.4924 49.2119C46.8779 49.0011 49.6334 46.2456 49.8442 42.8602L49.8467 42.8577ZM39.6477 42.4235C39.6477 41.7258 39.8585 41.0784 40.2199 40.5363C40.8322 39.6178 41.8762 39.013 43.0583 39.013C43.1235 39.013 43.1862 39.0155 43.2515 39.018C45.1889 39.1259 46.6997 40.8575 46.4437 42.8677C46.248 44.4061 44.9932 45.6408 43.4523 45.814C41.3969 46.0448 39.6477 44.4337 39.6477 42.4235Z" fill="#444444"/>
                <path d="M29.4508 42.7849C29.5637 40.5915 28.6377 38.6114 27.1219 37.2914C26.2711 36.551 25.2347 36.019 24.0903 35.7756C23.631 35.6777 23.1517 35.625 22.6623 35.625C18.9055 35.625 15.8613 38.6691 15.8613 42.4235C15.8613 46.1778 19.1364 49.4504 23.0839 49.2119C26.502 49.0062 29.2751 46.2055 29.4533 42.7849H29.4508ZM19.2769 42.8677C19.0209 40.8575 20.5317 39.1259 22.4691 39.018C22.5343 39.0155 22.5971 39.013 22.6623 39.013C23.8444 39.013 24.8883 39.6178 25.4982 40.5363C25.8621 41.0784 26.0729 41.7258 26.0729 42.4235C26.0729 44.4362 24.3237 46.0448 22.2683 45.814C20.7274 45.6408 19.4726 44.4061 19.2769 42.8677Z" fill="#444444"/>
                <path d="M22.6639 39.0118C22.5987 39.0118 22.536 39.0118 22.4707 39.0168L24.0919 35.7744L28.4034 27.1565L30.0221 23.9141C30.6369 24.8301 31.6809 25.4349 32.8629 25.4349C34.045 25.4349 35.0889 24.8301 35.7038 23.9141L37.3225 27.1565L41.895 36.2964L38.9412 37.9703L34.2934 28.6723L32.8629 25.8113L27.1235 37.2902L25.4998 40.5351C24.89 39.6166 23.846 39.0118 22.6639 39.0118Z" fill="#444444"/>
                <path d="M39.6492 41.1641H26.0723V44.5043H39.6492V41.1641Z" fill="#444444"/>
                </g>
                <defs>
                <clipPath id="clip0_4434_34457">
                <rect width="34" height="34" fill="white" transform="translate(15.8613 15.2227)"/>
                </clipPath>
                </defs>
              </svg>
            </div>
            <h3 class="heading-3 col-start-2 col-span-1 text-neutral-dgray">
              Work-Life<br />Balance
            </h3>
            <p class="body-2 col-start-2 col-span-1 row-start-2 text-neutral-600">
              We understand that a well-balanced life leads to more creativity and productivity. At Accumulus, we’re people first and promote a healthy work-life balance. We also understand that when individuals thrive, Accumulus Synergy thrives, and transformational outcomes follow. Accumulus is a fully remote organization, and we intend to remain so.
            </p>
          </div>
        </div>
			</div>
      <div class="flex items-center justify-center pt-s5 md:pt-s6 md:pb-s4 lg:py-s10">
        <a href="#" class="btn-tertiary">Explore Roles</a>
      </div>
		</div>
 </section>

<!-- END Why Accumulus -->


<!-- Testimonials -->

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

  $slides = [1,2,3,4]
?>

<section class="relative section w-full pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s12 bg-neutral-nwhite">
  <div class="relative container mx-auto">

    <div class="general-slide">
      <?php foreach($slides as $slide): ?>
        <div class="general-slide__item">
          <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2 gap-y-s6">
            <div class="col-span-6 md:col-span-7 lg:col-span-5 md:col-start-6 lg:col-start-6 lg:pl-s6 flex items-center justify-start gap-s2">
              <img class="max-w-[145px] md:max-w-full rounded-3xl" src="<?php echo $args['image']; ?>" alt="<?php echo $args['author']; ?>" />
              <div class="flex flex-col gap-s2">
                <h4 class="text-h3Mobile md:text-h3Tablet lg:text-h3 text-neutral-dgray w-full md:max-w-[195px]"><?php echo $args['author']; ?></h4>
                <p class="text-b3Mobile md:text-b3Tablet lg:text-b3"><?php echo $args['position']; ?></p>
              </div>
            </div>
            <h2 class="col-span-6 md:col-span-10 lg:col-span-10 heading-2 text-neutral-dgray">
            <?php echo $args['main_quote'] ?>
            </h2>
            <p class="col-span-5 md:col-span-8 lg:col-span-8 col-start-2 md:col-start-3 lg:col-start-3 body-1"><?php echo $args['sub_quote'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="flex items-center justify-center gap-4 max-sm:pt-s6 max-xl:pt-s10">
      <div class="prev xl:absolute xl:-left-20 xl:top-[280px] cursor-pointer">
        <img class="block w-[54px] h-[54px] aspect-square rotate-180" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
      </div>
      <div class="next xl:absolute xl:-right-20 xl:top-[280px] cursor-pointer">
        <img class="block w-[54px] h-[54px] aspect-square" src="<?php bloginfo('template_url'); ?>/images/arrow.svg" />
      </div>
    </div>

  </div>
</section>

<!-- end Testimonials -->


<!-- Join us -->

<section class="section bg-neutral-900 py-s8 md:py-s12 relative isolate overflow-hidden">
	<picture class="absolute top-0 left-0 w-full h-full -z-10">
		<source media="(min-width:1024px)" srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg.jpg"; ?>">
		<source media="(min-width:768px)" srcset="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-tablet.jpg"; ?>">
		<img src="<?php echo get_template_directory_uri() . "/images/careers-footer/careers-footer-bg-mobile.jpg"; ?>" alt="Flowers" class="w-full h-full">
	</picture>
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 items-start gap-y-s3 md:gap-y-s6">
      <h4 class="heading-4 text-neutral-offwhite uppercase col-span-12">Careers</h4>
      <h2 class="heading-2 text-neutral-offwhite col-span-12 md:col-span-10 lg:col-span-9 row-start-2 pb-s2 md:pb-0">Join Us</h2>
      <p class="body-3 text-neutral-offwhite col-span-12 md:col-span-6 lg:col-span-7 md:row-start-3">Join our diverse and ambitious team driven to pave the way for advancements in the regulatory ecosystem through creative and innovative solutions.<br />Whether you’re an experienced professional, or just starting your career journey, if you’re motivated to make a difference, we want to hear from you.*</p>
      <p class="body-4 text-secondary-aqua col-span-12 md:col-span-4 lg:col-span-3 md:col-start-9 lg:col-start-9 md:row-start-3 lg:pt-s1">*Please review our <a href="https://www.accumulus.org/global-applicant-privacy-notice/" target="_blank">Global Applicant Privacy Notice</a> for more information on how we use your job application data.</p>
      <a href="/careers" class="btn btn-tertiary-white col-span-12 md:col-span-12  lg:col-auto lg:row-start-4 mt-s2 md:mt-0"><?php echo $args['cta'] ?? 'Join Our Team'; ?></a>
    </div>
  </div>
</section>

<!-- end Join us -->