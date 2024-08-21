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
	$link_learn_more = get_field('link_learn_more');
?>

<section class="relative section w-full pt-s3 md:pt-s14 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 bg-neutral-nwhite">
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
        <a href="<?php echo $link_learn_more ?>" class="btn-secondary">Learn Why</a>
			</div>
		</div>
	</div>
</section>

<?php
  get_template_part(
    'template-parts/content',
    'value-props'
  );

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

<section id="slider" class="section w-full bg-primary-violet text-neutral-nwhite overflow-hidden py-s12">
    <div class="container mx-auto px-s2">
      <div class="grid grid-cols-12 gap-x-s2 gap-y-s6">
        <div class="relative flex flex-col col-span-12 md:col-span-6 lg:col-span-6 items-start gap-s3">
          <h4 class="heading-4 uppercase pt-s1">Our Story</h4>
          <div class="flex flex-row flex-nowrap overflow-visible w-full">
            <div id="slider-content-container" class="flex flex-row items-start justify-start w-full basis-full shrink-0">
              <?php foreach ($years as $index=>$year) { ?>
                <div class="flex flex-col w-full lg:gap-s10 md:gap-s6 gap-s2 basis-full shrink-0 slider-content-element">
                  <h2 id="slide-title-<?php echo $index; ?>" class="heading-1 slide-title" data-order="<?php echo $index; ?>"><?php echo $year['year']; ?></h2>
                  <p id="slide-paragraph-<?php echo $index; ?>" class="heading-3 slide-paragraph pe-s4" data-order="<?php echo $index; ?>"><?php echo $year['paragraph']; ?></p>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="col-span-12 md:col-span-6 lg:col-span-6 items-start gap-s3">
          <img src="<?php echo get_template_directory_uri() . "/images/about-us/image-placeholder-animation.png"; ?>" alt=""> 
        </div>
        
        <div class="grid grid-cols-12 gap-s2 md:gap-x-s2 lg:gap-x-s2 col-span-12 items-center justify-between">
          <p class="col-span-12 row-start-1 text-center current-year-indicator heading-4">2005</p>
          <button onclick="animatePrev()" class="col-span-2 lg:col-span-1 row-start-3 md:row-start-2 min-w-s7 lg:min-w-0">
            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-neutral-500">
              <path d="M28.8623 55.7519C43.7885 55.7519 55.8886 43.6518 55.8886 28.7256C55.8886 13.7993 43.7885 1.69922 28.8623 1.69922C13.936 1.69922 1.83594 13.7993 1.83594 28.7256C1.83594 43.6518 13.936 55.7519 28.8623 55.7519Z" stroke-width="1.86732" stroke-miterlimit="10"/>
              <path d="M33.1451 39.7941L22.0781 28.7271L33.1451 17.6602" stroke-width="1.86732" stroke-miterlimit="10"/>
            </svg>
          </button>

          <span id="slider-prev-label" class="heading-4 text-neutral-sgray col-span-2 lg:col-span-1 row-start-3 md:row-start-2">
            <?php echo $years[0]['year']; ?>
          </span>

          <div class="relative flex-1 md:h-full col-span-12 md:col-span-8 row-start-2 h-s6" style="
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
              <div id="ball" class="absolute top-1 left-0 w-3 h-3 rounded-full bg-white"></div>
            </div>
          </div>

          <span id="slider-next-label" class="text-right heading-4 text-neutral-sgray col-span-2 lg:col-span-1 row-start-3 md:row-start-2 col-start-9 md:col-start-auto">
            <?php echo $years[count($years ) - 1]['year']; ?>
          </span>

          <button onclick="animateNext()" class="col-span-2 lg:col-span-1 row-start-3 md:row-start-2 col-start-11 md:col-start-auto min-w-s7 lg:min-w-0">
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
  }

  function resetTimeline() {
    gsap.set("#timeline-container", {
      duration: 0,
      x: "-100%",
    });
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
      nextIndex = 0;
      animatePrev();
      return;
    }

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
      prevIndex = years.length - 1;
      animateNext();
      return;
    }

    let timeline = gsap.timeline({
      onStart: disablePrevNextButtons,
      onComplete: () => {
        enablePrevNextButtons();
      },
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

<div class="py-s9 relative isolate overflow-hidden">  
  <svg class="absolute bottom-0 right-0" width="574" height="788" viewBox="0 0 574 788" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M946.726 370.449C941.515 370.449 931.694 370.853 926.483 371.659C804.622 386.172 667.93 302.72 648.288 142.466C638.668 62.6419 570.923 0.757812 488.948 0.757812C400.358 0.757812 328.405 72.9223 328.405 162.221C328.405 179.758 331.211 196.489 336.422 212.413C377.91 340.011 361.876 442.614 168.663 506.111C71.2551 538.363 0.503906 630.483 0.503906 739.738C0.503906 875.399 109.938 985.46 244.826 985.46C379.714 985.46 489.148 875.399 489.148 739.738C489.148 701.237 480.129 665.155 464.496 632.701C452.871 608.512 444.252 586.137 438.239 565.576C435.834 559.528 434.03 553.078 432.427 546.829C432.227 545.62 431.826 544.41 431.625 543.201C430.824 540.177 430.222 537.153 429.621 533.928C428.819 529.493 428.218 525.26 427.617 521.632C427.617 520.624 427.416 519.616 427.416 518.608C426.013 505.909 426.615 497.644 426.615 497.644C426.414 461.965 437.638 428.705 457.08 400.888C489.349 352.912 543.865 321.265 605.798 321.265C607.802 321.265 610.007 321.466 612.011 321.466C621.631 321.466 631.653 322.676 641.474 324.692C643.077 324.893 644.48 325.498 646.284 325.901C649.892 326.707 653.299 327.514 656.907 328.723C661.316 330.134 665.726 331.747 669.935 333.359C670.736 333.561 671.939 333.964 672.741 334.367C675.947 335.778 679.154 337.189 682.361 338.6C700.801 347.067 718.238 358.153 733.871 371.256C735.475 372.667 736.878 373.876 738.682 375.086C740.285 376.497 742.089 377.908 743.492 379.319C784.179 414.192 811.237 463.175 821.458 517.399C832.282 574.647 882.188 618.187 942.517 618.187C1010.46 618.187 1065.78 562.754 1065.78 494.218C1065.78 425.681 1015.67 372.062 947.327 370.651" fill="#F5F5F5"/>
  </svg>
  <?php get_template_part( 
    'template-parts/content', 
    'quote', 
    array( 
      'bg_color' => 'bg-transparent',
      'titled' => true,
      'main_quote' => 'Expert Excerpts',
      'sub_quote' => '“Whether you’re developing drugs or approving them, the regulatory industry has so much to offer. Connecting the ecosystem will only amplify our impact for both patients and users.”',
      'author' => 'Francisco Nogueira',
      'position' => 'Chief Executive Officer, at Accumulus Synergy',
      'image' => 'https://via.placeholder.com/224',
      'stacked-author' => true,
    )
  ); ?>
</div>

<!-- End expert excerpts -->


<section class="section relative w-full py-s10 bg-secondary-aqua flex flex-col gap-s9">
  <div class="container mx-auto">
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:py-s6 md:py-s8">
      <h4 class="col-span-12 heading-4 uppercase">STATISTICS</h4>
      <h2 class="grid grid-cols-12 grid-rows-2 col-span-12 heading-1">
        <span class="block col-span-12">
          Let's Talk
        </span>
        <span class="block col-span-12">
          Numbers
        </span>
      </h2>
    </div>
    <div class="grid grid-cols-12 gap-x-s2 gap-y-s6 md:gap-y-s8 lg:py-s6 pt-s4 md:pt-0">
      <div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-5 lg:col-start-1">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
            <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="0.390625" y="0.625" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
              <path d="M43.6444 21.7384C39.4931 17.5872 32.7359 17.5872 28.5847 21.7384L25.9914 24.3317L23.4645 26.8586L20.8712 29.4519C16.72 33.6031 16.72 40.3603 20.8712 44.5116C25.0225 48.6628 31.7797 48.6628 35.9309 44.5116L38.5242 41.9183L41.0511 39.3914L43.6444 36.7981C47.7956 32.6469 47.7956 25.8897 43.6444 21.7384ZM38.4859 36.8262L35.959 39.3531L33.3657 41.9464C30.6272 44.685 26.1725 44.685 23.4364 41.9464C20.7004 39.2078 20.6978 34.7531 23.4364 32.0171L26.0297 29.4238L28.4699 31.8641L30.9969 34.391L33.5238 36.918L36.0508 34.391L33.5238 31.8641L30.9969 29.3371L28.5566 26.8969L31.1499 24.3036C33.8885 21.565 38.3431 21.565 41.0792 24.3036C43.8178 27.0422 43.8178 31.4969 41.0792 34.2329L38.4859 36.8262Z" fill="#444444"/>
            </svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
            140 NRAs
          </h3>
          <div class="col-start-2 col-span-1 row-start-2">
            <p class="body-2 lg:max-w-[368px]">
              There are more than 140 national regulatory authority (NRA) jurisdictions that review and approve each drug application.
            </p>
          </div>
        </div>
      </div>
      <div class="col-span-12 md:col-span-10 lg:col-span-7 md:col-start-2 lg:col-start-7">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
            <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="0.890625" y="0.625" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
              <path d="M23.7955 25.8789H18.3594V29.5039H23.7955V25.8789Z" fill="#444444"/>
              <path d="M18.3594 38.5612C18.3594 39.5617 19.17 40.3723 20.1705 40.3723C21.1711 40.3723 21.9817 39.5617 21.9817 38.5612C21.9817 37.5606 21.1711 36.75 20.1705 36.75C19.17 36.75 18.3594 37.5606 18.3594 38.5612Z" fill="#444444"/>
              <path d="M34.6705 40.3723C35.6708 40.3723 36.4817 39.5614 36.4817 38.5612C36.4817 37.5609 35.6708 36.75 34.6705 36.75C33.6703 36.75 32.8594 37.5609 32.8594 38.5612C32.8594 39.5614 33.6703 40.3723 34.6705 40.3723Z" fill="#444444"/>
              <path d="M49.1705 40.3723C50.1708 40.3723 50.9817 39.5614 50.9817 38.5612C50.9817 37.5609 50.1708 36.75 49.1705 36.75C48.1703 36.75 47.3594 37.5609 47.3594 38.5612C47.3594 39.5614 48.1703 40.3723 49.1705 40.3723Z" fill="#444444"/>
              <path d="M38.2955 25.8789H32.8594V29.5039H38.2955V25.8789Z" fill="#444444"/>
              <path d="M52.7877 25.8789H47.3516V29.5039H52.7877V25.8789Z" fill="#444444"/>
              <path d="M16.5469 47.6224H23.7942V43.9974H16.5469V22.25H23.7942V18.625H16.5469C14.5458 18.625 12.9219 20.2489 12.9219 22.25V43.9974C12.9219 45.9985 14.5458 47.6224 16.5469 47.6224Z" fill="#444444"/>
              <path d="M38.2942 18.6289H31.0469C29.0458 18.6289 27.4219 20.2528 27.4219 22.2539V44.0013C27.4219 46.0024 29.0458 47.6263 31.0469 47.6263H38.2942V44.0013H31.0469V22.2539H38.2942V18.6289Z" fill="#444444"/>
              <path d="M45.5391 18.6289C43.538 18.6289 41.9141 20.2528 41.9141 22.2539V44.0013C41.9141 46.0024 43.538 47.6263 45.5391 47.6263H52.7891V44.0013H45.5391V22.2539H52.7891V18.6289H45.5391Z" fill="#444444"/>
            </svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
            Over 25% of NRAs
          </h3>
          <div class="col-start-2 col-span-1 row-start-2">
            <p class="body-2 lg:max-w-[368px]">
              Over 25% of NRAs across the globe have used the Accumulus platform.
            </p>
          </div>
        </div>
      </div>
      <div class="col-span-12 md:col-span-10 md:col-start-2 lg:col-span-5 lg:col-start-1">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
            <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="0.890625" y="0.625" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
              <path d="M33.3906 48.6217C41.9513 48.6217 48.8906 41.6824 48.8906 33.1217C48.8906 32.3699 48.8351 31.6312 48.7305 30.9088H44.089C44.236 31.6247 44.3145 32.3634 44.3145 33.1217C44.3145 39.1459 39.4148 44.0456 33.3906 44.0456C27.3665 44.0456 22.4668 39.1459 22.4668 33.1217C22.4668 27.8559 26.2094 23.4498 31.1745 22.4234V35.3346H40.0293V30.9056H35.6002V17.625H33.3874C32.6356 17.625 31.8968 17.6806 31.1745 17.7852C23.6631 18.8606 17.8906 25.3162 17.8906 33.125C17.8906 41.6856 24.83 48.625 33.3906 48.625V48.6217Z" fill="#444444"/>
            </svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
            2.5 YEARS to 6.5 MONTHS
          </h3>
          <div class="col-start-2 col-span-1 row-start-2">
            <p class="body-2 lg:max-w-[368px]">
            ​ The first CMC PAC Reliance pilot supported by the Accumulus platform reduced the global approval and implementation timelines for a major drug substance process change from 2.5 YEARS to 6.5 MONTHS.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col items-center text-center justify-stretch md:justify-normal gap-s4">
    <h3 class="heading-3">Learn more about why a digital transformation is needed</h3>
    <a href="#" class="btn btn-tertiary">Read More</a>
  </div>
</section>

<!-- End statics -->

<?php
  get_template_part(
    'template-parts/content',
    'careers-footer'
  );
?>
