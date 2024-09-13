<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/MotionPathPlugin.min.js"></script>
<script>
  gsap.registerPlugin(MotionPathPlugin);
</script>

<?php
	// Fields main banner
	$bg_image_main = get_field('bg_image_main');
	$bg_image_for_desktop = get_field('bg_image_for_desktop');
	$bg_image_for_tablet = get_field('bg_image_for_tablet');
	$bg_image_for_mobile = get_field('bg_image_for_mobile');
	$title_tag = get_field('title_tag');
	$main_title = get_field('main_title');
	$resume_text = get_field('resume_text');
	$text_cta = get_field('text_cta');
	$link_learn_more = get_field('link_learn_more');
?>

<section class="relative section w-full pt-s3 md:pt-s14 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s10 lg:pb-s12 bg-neutral-nwhite">
	<picture class="absolute top-0 left-0 w-full h-full">
		<source media="(min-width:1024px)" srcset="<?php echo $bg_image_for_desktop; ?>">
		<source media="(min-width:768px)" srcset="<?php echo $bg_image_for_tablet; ?>">
		<img src="<?php echo $bg_image_for_mobile; ?>" alt="Flowers" class="w-full h-full">
	</picture>
	<div class="relative container mx-auto">
		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">
			<h4 class="col-span-12 heading-4 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 heading-1"><?php echo $main_title; ?></h1>
			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2 md:max-w-550 lg:max-w-full"><?php echo $resume_text; ?></p>
			</div>
			<div class="col-span-12 md:col-span-12 lg:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4 pb-s8 md:pb-s10">
        <a href="<?php echo $link_learn_more ?>" class="btn-secondary"><?php echo 	$text_cta; ?></a>
			</div>
		</div>
	</div>
</section>



<?php
	// Fields what we do

  $what_we_do = get_field('what_we_do_about');
  
  if($what_we_do):
?>
<section class="what-we-do-home relative z-10 section w-full pt-s10 md:pt-s20 lg:pt-s20 pb-s14 md:pb-s20 lg:pb-s12 -mt-s10 lg:-mt-s12 bg-cover bg-no-repeat bg-center bg-what-we-do-mobile md:bg-what-we-do-about-tablet lg:bg-what-we-do-desktop bg-transparent">

	<div class="container mx-auto md:pt-s1 lg:pt-s18 pb-s1 lg:pb-s18">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6">

			<h4 class="col-span-12 md:col-span-12 col-start-1 text-h4Mobile md:text-h4Tablet lg:text-h4 text-neutral-nwhite uppercase"><?php echo $what_we_do['what_title_tag']; ?></h4>
			<h2 class="col-span-12 md:col-span-11 lg:col-span-11 col-start-1 text-h2Mobile md:text-h2Tablet lg:text-h2 text-neutral-nwhite"><?php echo $what_we_do['what_main_title']; ?></h2>
			<p class="col-span-12 md:col-span-6 lg:col-span-4 lg:col-start-4 text-neutral-nwhite body-2"><?php echo $what_we_do['what_first_description']; ?></p>
			<p class="col-span-12 md:col-span-6 lg:col-span-4 md:col-start-7 lg:col-start-8 text-neutral-nwhite body-2"><?php echo $what_we_do['what_second_description']; ?></p>

		</div>

	</div>

</section>
<?php endif; ?>
<!-- What we do -->


<!-- Envision -->

<?php
  $envision_section = get_field('envision_section');
  
  if($envision_section):
?>

<section class="relative section w-full pt-s5 md:pt-s10 pb-s8 md:pb-s12 -mt-[2.3rem] md:-mt-s10 lg:-mt-s10  bg-primary-glaciar bg-about-envision-mobile md:bg-about-envision-tablet lg:bg-about-envision-desktop bg-cover bg-no-repeat bg-left-bottom">
  <div class="container mx-auto flex flex-col gap-s8 md:gap-s10 lg:gap-s8">
    <div class="grid grid-cols-6 md:grid-cols-12 gap-s6">

      <h2 class="col-span-6 md:col-span-12 lg:col-span-12 heading-2 pt-s8 md:pt-s12 lg:pt-s10"><?php echo $envision_section['title']; ?></h2>
			
			<div class="col-span-6 md:col-span-12 lg:col-span-6 lg:col-start-7 pb-s1 lg:pb-0">
        <ul class="flex flex-col gap-s4 pb-s5">
          <?php foreach($envision_section['bullets_description'] as $item): ?>
          <li class="relative pl-3 body-2">
            <span class="absolute left-0 top-3 block w-1 h-1 aspect-square bg-neutral-dgray rounded-full"></span>
              <?php echo $item['description']; ?>
          </li>
          <?php endforeach; ?>
        </ul>
				<h3 class="heading-3"><?php echo $envision_section['message']; ?></h3>
			</div>

    </div>
  </div>
</section>
<?php endif; ?>

<!-- End envision -->


<!-- Case study -->

<?php
  $case_study = get_field('case_study');
  
  if($case_study):
?>

<section id="case-study" class="relative section pt-s8 md:pt-s10 lg:pt-s12 pb-s8 md:pb-s10 lg:pb-s10">
  <div class="container mx-auto">

    <div class="grid grid-cols-6 md:grid-cols-12 gap-x-s2">
      <h4 class="col-span-6 heading-4 pb-s3 md:pb-s2 lg:pb-s4"><?php echo $case_study['eyebrown']; ?></h4>
      <div class="col-span-6 md:col-span-12 grid grid-cols-6 md:grid-cols-12">
        <h2 class="col-span-6 md:col-span-8 lg:col-span-8 heading-2 pb-s3 md:pb-s6"><?php echo $case_study['title']; ?></h2>
      </div>
      <div class="col-span-6 md:col-span-12 lg:col-span-4 pb-s5 lg:pb-0">
        <picture class="w-full">
          <source media="(min-width:1025px)" srcset="<?php echo $case_study['image_desktop']; ?>">
          <source media="(min-width:768px)" srcset="<?php echo $case_study['image_tablet']; ?>">
          <img src="<?php echo $case_study['image_mobile']; ?>" alt="<?php echo $case_study['title']; ?>" class="h-full w-full">
        </picture>
      </div>
      <div class="col-span-6 md:col-span-12 lg:col-span-7 lg:col-start-6">
        <p class="body-2"><?php echo $case_study['resume']; ?></p>
      </div>
      <div class="col-span-6 md:col-span-12 lg:col-span-4 lg:col-start-6 pt-s5 md:pt-s8 lg:pt-s10">
        <a class="btn-secondary" href="<?php echo $case_study['link_cta']; ?>"><?php echo $case_study['text_cta']; ?></a>
      </div>
      <div class="col-span-6 md:col-span-12 lg:col-span-9 lg:col-start-2 pt-s5 md:pt-s6 lg:pt-s6">
        <ul>
          <?php foreach($case_study['credits'] as $key => $value): ?>
          <li class="relative body-4 pl-s4">
            <span class="absolute left-0 top-0"><?php echo $key+1; ?>.</span>
            <?php echo $value['data'] ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

  </div>
</section>

<?php endif; ?>

<!-- End Case study -->


<?php
  $years = [
    [
      'year' => '2005',
      'paragraph' => 'We’re delivering a next-generation data exchange platform to improve collaboration and efficiency for the global regulatory ecosystem…',
    ],
    [
      'year' => '2014',
      'paragraph' => 'We’re delivering a next-generation data exchange platform to improve collaboration and efficiency for the global regulatory ecosystem…',
    ],
    [
      'year' => 'Today',
      'paragraph' => 'We’re delivering a next-generation data exchange platform to improve collaboration and efficiency for the global regulatory ecosystem…',
    ],
  ];
?>

<script>
  let years = <?php echo json_encode($years); ?>;
</script>

<section id="slider" class="translucent-navigation section w-full bg-primary-violet text-neutral-nwhite overflow-hidden py-s12">
    <div class="container mx-auto px-s2">
      <div class="grid grid-cols-12 gap-x-s2 gap-y-s6">
        <div class="relative flex flex-col col-span-12 lg:col-span-6 lg:col-span-6 items-start gap-s3">
          <h4 class="heading-4 uppercase pt-s1">Our Story</h4>
          <div class="flex flex-row flex-nowrap overflow-visible w-full">
            <div id="slider-content-container" class="flex flex-row items-start justify-start w-full basis-full shrink-0">
              <?php foreach ($years as $index=>$year) { ?>
                <div class="flex flex-col w-full lg:gap-s10 lg:gap-s6 gap-s2 basis-full shrink-0 slider-content-element">
                  <h2 id="slide-title-<?php echo $index; ?>" class="heading-1 slide-title" data-order="<?php echo $index; ?>"><?php echo $year['year']; ?></h2>
                  <p id="slide-paragraph-<?php echo $index; ?>" class="heading-3 slide-paragraph pe-s4" data-order="<?php echo $index; ?>"><?php echo $year['paragraph']; ?></p>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="col-span-12 lg:col-span-6 lg:col-span-6 items-start gap-s3">
          <video id="anim-video" class="mix-blend-screen" width="100%" muted playsinline>
            <source src="<?php echo get_template_directory_uri() . "/videos/about-us/video-anim.mp4"; ?>" type="video/mp4">
          </video>
        </div>
        
        <div class="grid grid-cols-12 gap-s2 lg:gap-x-s2 lg:gap-x-s2 col-span-12 items-center justify-between">
          <p class="col-span-12 row-start-1 text-center current-year-indicator heading-4 uppercase" style="transform: translateX(5px);">2005</p>
          <button onclick="animatePrev()" class="col-span-2 lg:col-span-1 row-start-3 lg:row-start-2 min-w-s7 lg:min-w-0">
            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-neutral-500">
              <path d="M28.8623 55.7519C43.7885 55.7519 55.8886 43.6518 55.8886 28.7256C55.8886 13.7993 43.7885 1.69922 28.8623 1.69922C13.936 1.69922 1.83594 13.7993 1.83594 28.7256C1.83594 43.6518 13.936 55.7519 28.8623 55.7519Z" stroke-width="1.86732" stroke-miterlimit="10"/>
              <path d="M33.1451 39.7941L22.0781 28.7271L33.1451 17.6602" stroke-width="1.86732" stroke-miterlimit="10"/>
            </svg>
          </button>

          <span id="slider-prev-label" class="heading-4 text-neutral-sgray col-span-2 lg:col-span-1 row-start-3 lg:row-start-2 uppercase">
            <?php echo $years[0]['year']; ?>
          </span>

          <div class="relative flex-1 lg:h-full col-span-12 lg:col-span-8 row-start-2 h-s6" style="
              -webkit-mask-image: linear-gradient(to right, transparent 0%, black 25%, black 75%, transparent 100%);
              mask-image: linear-gradient(to right, transparent 0%, black 25%, black 75%, transparent 100%);
            ">
            <div class="absolute top-0 left-0 container" id="timeline-container">
              <div id="slider-canvas" class="flex-1 h-s6 flex-row items-center justify-center flex-nowrap whitespace-nowrap overflow-visible [&>svg]:max-w-none [&>svg]:inline-block [&>svg]:w-full [&>svg]:h-full appearance-none no-scrollbar">
                <svg viewBox="0 0 789 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path id="timeline-path-0" d="M0.242188 24.8175H265.127 
                    C279.271 24.8175 293.374 23.3067 307.197 20.3108
                    L318.682 17.8216
                    C327.635 15.8811 336.988 17.2367 345.022 21.6393
                    V21.6393
                    C354.41 26.7841 366.147 24.3278 372.684 15.85
                    L377.068 10.1637
                    C385.935 -1.33502 403.189 -1.60835 412.416 9.60376
                    L418.142 16.5627
                    C424.828 24.6877 436.353 26.8984 445.571 21.8241
                    V21.8241
                    C453.776 17.3073 463.353 15.9568 472.488 18.0283
                    L482.258 20.2442
                    C495.66 23.2835 509.359 24.8175 523.101 24.8175
                    H788.539" class="stroke-neutral-nwhite stroke-1" />
                </svg>
                <svg viewBox="0 0 789 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path id="timeline-path" d="M0.242188 24.8175H265.127 
                    C279.271 24.8175 293.374 23.3067 307.197 20.3108
                    L318.682 17.8216
                    C327.635 15.8811 336.988 17.2367 345.022 21.6393
                    V21.6393
                    C354.41 26.7841 366.147 24.3278 372.684 15.85
                    L377.068 10.1637
                    C385.935 -1.33502 403.189 -1.60835 412.416 9.60376
                    L418.142 16.5627
                    C424.828 24.6877 436.353 26.8984 445.571 21.8241
                    V21.8241
                    C453.776 17.3073 463.353 15.9568 472.488 18.0283
                    L482.258 20.2442
                    C495.66 23.2835 509.359 24.8175 523.101 24.8175
                    H788.539" class="stroke-neutral-nwhite stroke-1" />
                </svg>
                <svg viewBox="0 0 789 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path id="timeline-path-2" d="M0.242188 24.8175H265.127 
                    C279.271 24.8175 293.374 23.3067 307.197 20.3108
                    L318.682 17.8216
                    C327.635 15.8811 336.988 17.2367 345.022 21.6393
                    V21.6393
                    C354.41 26.7841 366.147 24.3278 372.684 15.85
                    L377.068 10.1637
                    C385.935 -1.33502 403.189 -1.60835 412.416 9.60376
                    L418.142 16.5627
                    C424.828 24.6877 436.353 26.8984 445.571 21.8241
                    V21.8241
                    C453.776 17.3073 463.353 15.9568 472.488 18.0283
                    L482.258 20.2442
                    C495.66 23.2835 509.359 24.8175 523.101 24.8175
                    H788.539" class="stroke-neutral-nwhite stroke-1" />
                </svg>
              </div>
              <div id="ball" class="absolute top-1 left-0 w-3 h-3 rounded-full bg-white" data-title="2005"></div>
            </div>
          </div>

          <span id="slider-next-label" class="text-right heading-4 text-neutral-sgray col-span-2 lg:col-span-1 row-start-3 lg:row-start-2 col-start-9 col-end-11 lg:col-start-auto uppercase">
            <?php echo $years[count($years ) - 1]['year']; ?>
          </span>

          <button onclick="animateNext()" class="flex flex-row items-end justify-end col-span-2 lg:col-span-1 row-start-3 lg:row-start-2 col-start-11 lg:col-start-auto min-w-s7 lg:min-w-0">
            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-neutral-500">
              <path d="M28.917 55.7519C43.8432 55.7519 55.9433 43.6518 55.9433 28.7256C55.9433 13.7993 43.8432 1.69922 28.917 1.69922C13.9907 1.69922 1.89062 13.7993 1.89062 28.7256C1.89062 43.6518 13.9907 55.7519 28.917 55.7519Z" stroke-width="1.86732" stroke-miterlimit="10"/>
              <path d="M24.6328 17.6602L35.6998 28.7271L24.6328 39.7941" stroke-width="3" stroke-miterlimit="10"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
</section>

<script>
  let slider = document.getElementById('slider');
  let sliderCanvas = document.getElementById('slider-canvas');
  let svg = sliderCanvas.querySelector('svg');
  let path = document.getElementById('timeline-path');
  let ball = document.getElementById('ball');
  let animationDuration = 2;
  let selectedSlide = 0;
  let video = document.getElementById('anim-video');
  let videoPulseAnimation = TweenLite.to(video, 2, {currentTime: 2, repeat: -1, yoyo: true});

  function prepareLogo() {
    video.currentTime = 1;
    videoPulseAnimation.play();
  }

  document.addEventListener('DOMContentLoaded', prepareLogo);
  window.addEventListener('resize', resetAnimation);

  resetAnimation();
  updateSlide(selectedSlide, false);

  function disablePrevNextButtons() {
    document.querySelectorAll('button').forEach(button => {
      button.disabled = true;
    });
  }

  function enablePrevNextButtons() {
    document.querySelectorAll('button').forEach(button => {
      button.disabled = false;
    });
  }

  function resetAnimation() {
    resetBall();
    resetTimeline();
    prepareLogo();
  }

  function resetTimeline() {
    gsap.set("#timeline-container", {
      duration: 0,
      x: "-100%",
    });
    videoPulseAnimation.kill();
    videoPulseAnimation = TweenLite.to(video, 2, {currentTime: 2, repeat: -1, yoyo: true});
  }

  function resetBall() {
    gsap.to("#ball", {
      duration: 0,
      ease: 'power4.out',
      motionPath:{
        path: "#timeline-path",
        align: "#timeline-path",
        autoRotate: true,
        alignOrigin: [0.5, 0.5],
        start: 0,
        end: 0.5,
      }
    });
  }

  function updateSlide(index, timeline, animated = true) {
    let reverse = index < selectedSlide;
    let duration = animated ? animationDuration : 0
    if (index === selectedSlide) {
      animated = false;
    }
    selectedSlide = index;
    let sliderElements = Array.from(slider.getElementsByClassName('slider-content-element'));

    if (sliderElements.length > 0) {
      let container = sliderElements[0].parentElement;
      let width = container.getBoundingClientRect().width;
      (timeline || gsap).to(container, {
        x: -width * index,
        duration,
        ease: animated ? "pow4.inout" : "linear"
      }, timeline ? 0 : undefined);

      sliderElements.forEach((el, idx) => {
        (timeline || gsap).to(el, {
            opacity: idx == index ? 1 : 0,
            duration,
            ease: animated ? "pow4.inout" : "linear"
          }, timeline ? 0 : undefined)
      });

      document.querySelector('.current-year-indicator').innerText = years[selectedSlide].year;
    }
  }
  
  function animateNext(duration = animationDuration) {
    // update slide, loop if needed
    let currentIndex = years.findIndex(year => year.year === document.getElementById('slide-title-' + selectedSlide).innerText);
    let nextIndex = currentIndex + 1;
    if (nextIndex >= years.length) {
      return;
    }

    TweenLite.to(video, duration, {currentTime: video.duration * nextIndex / years.length, 
      onComplete: () => {
        videoPulseAnimation.kill();
        videoPulseAnimation = TweenLite.to(video, 2, {currentTime: (video.duration * nextIndex / years.length) + 2, repeat: -1, yoyo: true});
      }
    });

    return new Promise(
      (resolve) => {
        let timeline = gsap.timeline({
          onStart: disablePrevNextButtons,
          onComplete: () => {
            enablePrevNextButtons();
            resolve();
          },
        });

        updateSlide(nextIndex, timeline);

        timeline.fromTo("#timeline-container", {
          x: "-100%",
        }, {
          x: "-150%",
          duration: duration / 2,
          ease: 'power4.in',
        }, 0);

        timeline.to("#ball", {
          duration: duration / 2,
          ease: 'power4.in',
          motionPath:{
            path: "#timeline-path",
            align: "#timeline-path",
            autoRotate: true,
            alignOrigin: [0.5, 0.5],
            start: 0.5,
            end: 1,
          }
        }, 0);

        timeline.fromTo("#timeline-container", {
          x: "-150%",
        }, {
          x: "-200%",
          duration: duration / 2,
          ease: 'power4.out',
        }, duration / 2);

        timeline.to("#ball", {
          duration: duration / 2,
          ease: 'power4.out',
          motionPath:{
            path: "#timeline-path-2",
            align: "#timeline-path-2",
            autoRotate: true,
            alignOrigin: [0.5, 0.5],
            start: 0,
            end: 0.5,
          }
        }, duration / 2);
      }
    );
  }

  function animatePrev(duration = animationDuration) {
    // update slide, loop if needed
    let currentIndex = years.findIndex(year => year.year === document.getElementById('slide-title-' + selectedSlide).innerText);
    let prevIndex = currentIndex - 1;
    if (prevIndex < 0) {
      return;
    }

    let timeline = gsap.timeline({
      onStart: disablePrevNextButtons,
      onComplete: () => {
        enablePrevNextButtons();
      },
    });

    TweenLite.to(video, duration, {currentTime: video.duration * prevIndex / years.length,
      onComplete: () => {
        videoPulseAnimation.kill();
        videoPulseAnimation = TweenLite.to(video, 2, {currentTime: (video.duration * prevIndex / years.length) + 2, repeat: -1, yoyo: true});
      } 
    });

    updateSlide(prevIndex, timeline);

    timeline.fromTo("#timeline-container", {
      x: "-100%",
    }, {
      x: "-50%",
      duration: duration / 2,
      ease: 'linear',
    }, 0);

    timeline.to("#ball", {
      duration: duration / 2,
      ease: 'power4.in',
      motionPath:{
        path: "#timeline-path",
        align: "#timeline-path",
        autoRotate: true,
        alignOrigin: [0.5, 0.5],
        start: 0.5,
        end: 0,
      }
    }, 0);

    timeline.fromTo("#timeline-container", {
      x: "-50%",
    }, {
      x: "0%",
      duration: duration / 2,
      ease: 'power4.out',
    }, duration / 2);

    timeline.to("#ball", {
      duration: duration / 2,
      ease: 'power4.out',
      motionPath:{
        path: "#timeline-path-0",
        align: "#timeline-path-0",
        autoRotate: true,
        alignOrigin: [0.5, 0.5],
        start: 1,
        end: 0.5,
      }
    }, duration / 2);
  }
</script>


<!-- End timeline -->



<?php
// Fields why accumulus

$why_title_tag = get_field('why_title_tag');
$why_first_line_title = get_field('why_first_line_title');
$why_second_line_title = get_field('why_second_line_title');
$why_values = get_field('why_values');

?>


<section class="relative section w-full pt-s12 md:pt-s10 lg:pb-s12">

	<div class="container mx-auto">

		<div class="grid grid-cols-12 gap-x-s2 gap-y-0 pb-s10 lg:pb-s8">
			<h4 class="col-span-12 md:col-span-12 col-start-1 pb-s6 heading-4 uppercase"><?php echo $why_title_tag; ?></h4>
			<h2 class="col-span-12 heading-1 grid grid-cols-12">
				<span class="col-span-12"><?php echo $why_first_line_title; ?></span>
				<span class="col-span-10 col-start-2 lg:col-start-3"><?php echo $why_second_line_title; ?></span>
			</h2>
		</div>
		
		<?php
			// Values view

			$values_row = get_field('values_row');

			$i = 0;		
			
			foreach($values_row as $row) :
				$i++;

				if($i % 2 == 1): 	
			?>

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap lg:gap-y-0 pb-s6 md:pb-s10 lg:pb-s12 last-of-type:max-md:pb-s8 last-of-type:lg:!pb-0">
					<div class="row-start-2 md:row-start-1 col-span-12 md:col-span-5 lg:col-span-4 flex flex-col items-start gap-s3">

						<?php  foreach($row['card_item'] as $card) : ?>

							<?php if($card['acf_fc_layout'] == 'title') : ?>
								<h3 class="heading-3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="body-2"><?php echo $card['description']; ?></p>
							<?php endif; ?>
							
							<?php if($card['acf_fc_layout'] == 'bullet_list'): ?>
								<ul class="flex flex-col gap-2 text-b3Mobile md:text-b3Tablet lg:text-b3">

									<?php foreach($card['bullet_list'] as $item): ?>
									<li class="relative pl-3 body-3">
										<span class="absolute left-0 top-2 block w-1 h-1 aspect-square bg-neutral-dgray rounded-full"></span>
										<?php echo $item['item']; ?>
									</li>
									<?php endforeach; ?>

								</ul>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'cta'): ?>
								<a class="btn-tertiary" href="<?php echo $card['link']; ?>"><?php echo $card['text_link']; ?></a>
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
					<div class="row-start-1 col-span-12 md:col-span-6 md:col-start-7">

						<?php foreach($row['card_item'] as $card) : ?>

							<?php if ($card['acf_fc_layout'] == 'image') : ?>
								<img src="<?php echo $card['image']; ?>"  />
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
				</div>
				<!-- text left - img right -->

				<?php else: ?>

				<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:gap-y-0 pb-s6 md:pb-s10 lg:pb-s12 last-of-type:max-md:pb-s8 last-of-type:lg:!pb-0">
					<div class="col-span-12 md:col-span-6">

						<?php foreach($row['card_item'] as $card) : ?>

							<?php if ($card['acf_fc_layout'] == 'image') : ?>
								<img src="<?php echo $card['image']; ?>"  />
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
					<div class="col-span-12 md:col-span-5 lg:col-span-4 md:col-start-8 lg:col-start-8 flex flex-col items-start gap-s3">

						<?php foreach($row['card_item'] as $card) : ?>

							<?php if($card['acf_fc_layout'] == 'title') : ?>
								<h3 class="heading-3"><?php echo $card['title']; ?></h3>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'description'): ?>
								<p class="body-2"><?php echo $card['description']; ?></p>
							<?php endif; ?>
							
							<?php if($card['acf_fc_layout'] == 'bullet_list'): ?>
								<ul class="flex flex-col gap-2 text-b3Mobile md:text-b3Tablet lg:text-b3">

									<?php foreach($card['bullet_list'] as $item): ?>
									<li class="relative pl-3 body-3">
										<span class="absolute left-0 top-2 block w-1 h-1 aspect-square bg-neutral-dgray rounded-full"></span>
										<?php echo $item['item']; ?>
									</li>
									<?php endforeach; ?>

								</ul>
							<?php endif; ?>

							<?php if($card['acf_fc_layout'] == 'cta'): ?>
								<a class="btn-tertiary" href="<?php echo $card['link']; ?>"><?php echo $card['text_link']; ?></a>
							<?php endif; ?>

						<?php endforeach; ?>

					</div>
				</div>
				<!-- img left - text right -->

				<?php endif; ?>

		<?php
			endforeach;
		?>

	</div>

</section>


<!-- Why accumulus -->


<!-- Form Module -->
<?php
  get_template_part(
    'template-parts/content',
    'form-module'
  );
?>
<!-- End form module -->
