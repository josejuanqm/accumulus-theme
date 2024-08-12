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

<section class="relative section w-full pt-s3 md:pt-s14 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 bg-secondary-carbon">
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
          <h4 class="text-b3 lg:heading-4 uppercase pt-s1">Our Story</h4>
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
      'sub_quote' => '“Filing a New Drug Application may have shifted from driving a truckload of paper to the relevant regulatory authority to FedEx-ing a CD-ROM to uploading a set of PDFs through the Electronic Submissions Gateway, but the underlying processes remain little changed. It’s long past time to play catchup.”',
      'author' => 'Francisco Nogueira',
      'position' => 'Chief Executive Officer, at Accumulus Synergy',
      'image' => 'https://via.placeholder.com/224',
      'stacked-author' => true,
    )
  ); ?>
</div>

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
      <div class="col-span-12 md:col-span-5">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
<svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.734375" y="0.734375" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
<path d="M33.2344 48.7311C41.795 48.7311 48.7344 41.7917 48.7344 33.2311C48.7344 32.4793 48.6788 31.7406 48.5742 31.0182H43.9327C44.0798 31.7341 44.1582 32.4728 44.1582 33.2311C44.1582 39.2553 39.2585 44.155 33.2344 44.155C27.2102 44.155 22.3105 39.2553 22.3105 33.2311C22.3105 27.9653 26.0531 23.5591 31.0182 22.5328V35.444H39.873V31.015H35.444V17.7344H33.2311C32.4793 17.7344 31.7406 17.7899 31.0182 17.8945C23.5068 18.9699 17.7344 25.4255 17.7344 33.2344C17.7344 41.795 24.6737 48.7344 33.2344 48.7344V48.7311Z" fill="#444444"/>
</svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
          13 Years
          </h3>
          <p class="body-2 col-start-2 col-span-1 row-start-2">
          It takes 13 years (on average) to bring a new drug to market after its initial discovery.¹
          </p>
        </div>
      </div>
      <div class="col-span-12 md:col-span-5 md:col-start-7">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
<svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.734375" y="0.734375" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
<path d="M23.6393 25.9883H18.2031V29.6133H23.6393V25.9883Z" fill="#444444"/>
<path d="M18.2031 38.6705C18.2031 39.6711 19.0137 40.4817 20.0143 40.4817C21.0148 40.4817 21.8255 39.6711 21.8255 38.6705C21.8255 37.67 21.0148 36.8594 20.0143 36.8594C19.0137 36.8594 18.2031 37.67 18.2031 38.6705Z" fill="#444444"/>
<path d="M34.5143 40.4817C35.5146 40.4817 36.3255 39.6708 36.3255 38.6705C36.3255 37.6703 35.5146 36.8594 34.5143 36.8594C33.514 36.8594 32.7031 37.6703 32.7031 38.6705C32.7031 39.6708 33.514 40.4817 34.5143 40.4817Z" fill="#444444"/>
<path d="M49.0143 40.4817C50.0146 40.4817 50.8255 39.6708 50.8255 38.6705C50.8255 37.6703 50.0146 36.8594 49.0143 36.8594C48.014 36.8594 47.2031 37.6703 47.2031 38.6705C47.2031 39.6708 48.014 40.4817 49.0143 40.4817Z" fill="#444444"/>
<path d="M38.1393 25.9883H32.7031V29.6133H38.1393V25.9883Z" fill="#444444"/>
<path d="M52.6315 25.9883H47.1953V29.6133H52.6315V25.9883Z" fill="#444444"/>
<path d="M16.3906 47.7318H23.638V44.1068H16.3906V22.3594H23.638V18.7344H16.3906C14.3895 18.7344 12.7656 20.3583 12.7656 22.3594V44.1068C12.7656 46.1079 14.3895 47.7318 16.3906 47.7318Z" fill="#444444"/>
<path d="M38.138 18.7383H30.8906C28.8895 18.7383 27.2656 20.3622 27.2656 22.3633V44.1107C27.2656 46.1118 28.8895 47.7357 30.8906 47.7357H38.138V44.1107H30.8906V22.3633H38.138V18.7383Z" fill="#444444"/>
<path d="M45.3828 18.7383C43.3817 18.7383 41.7578 20.3622 41.7578 22.3633V44.1107C41.7578 46.1118 43.3817 47.7357 45.3828 47.7357H52.6328V44.1107H45.3828V22.3633H52.6328V18.7383H45.3828Z" fill="#444444"/>
</svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
          2 Million
          </h3>
          <p class="body-2 col-start-2 col-span-1 row-start-2">
            If you stacked all the paperwork from one new drug application (2 million pages on average), the pile would be 200 meters tall.
          </p>
        </div>
      </div>
      <div class="col-span-12 md:col-span-5">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
<svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.734375" y="0.734375" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
<path d="M25.1955 32.7344H22.1953V41.7328H25.1955V32.7344Z" fill="#444444"/>
<path d="M43.2033 32.7344H40.2031V41.7328H43.2033V32.7344Z" fill="#444444"/>
<path d="M31.1955 32.7344C29.5393 32.7344 28.1953 34.0784 28.1953 35.7346V38.7348C28.1953 40.391 29.5393 41.735 31.1955 41.735H34.1957C35.8519 41.735 37.1959 40.391 37.1959 38.7348V35.7346C37.1959 34.0784 35.8519 32.7344 34.1957 32.7344H31.1955ZM34.1957 38.7326H31.1955V35.7324H34.1957V38.7326Z" fill="#444444"/>
<path d="M46.1928 22.2344H19.1953V25.2346H46.1928V22.2344Z" fill="#444444"/>
<path d="M41.6922 17.7344H23.6953V20.7346H41.6922V17.7344Z" fill="#444444"/>
<path d="M46.193 26.7344H19.1955C17.5393 26.7344 16.1953 28.0784 16.1953 29.7346V44.7334C16.1953 46.3896 17.5393 47.7337 19.1955 47.7337H49.1932V44.7334H19.1955V29.7346H46.193V41.7332H49.1932V29.7346C49.1932 28.0784 47.8492 26.7344 46.193 26.7344Z" fill="#444444"/>
</svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
          2 Million
          </h3>
          <p class="body-2 col-start-2 col-span-1 row-start-2">
It costs ~$2B to bring a pharmaceutical product to market.
          </p>
        </div>
      </div>
      <div class="col-span-12 md:col-span-5 md:col-start-7">
        <div class="grid grid-cols-[64px, 1fr] gap-y-s2 lg:gap-y-s6 gap-x-s2 items-start">
          <div class="flex flex-col items-center justify-center col-start-1 col-span-1">                
<svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="0.734375" y="0.734375" width="64" height="64" rx="10.9714" fill="#F5F5F5"/>
<path d="M43.9881 21.8478C39.8369 17.6966 33.0797 17.6966 28.9284 21.8478L26.3352 24.441L23.8082 26.968L21.215 29.5612C17.0638 33.7125 17.0638 40.4697 21.215 44.621C25.3662 48.7722 32.1235 48.7722 36.2747 44.621L38.8679 42.0277L41.3949 39.5008L43.9881 36.9075C48.1394 32.7563 48.1394 25.999 43.9881 21.8478ZM38.8297 36.9356L36.3027 39.4625L33.7095 42.0557C30.9709 44.7943 26.5162 44.7943 23.7802 42.0557C21.0441 39.3172 21.0416 34.8625 23.7802 32.1264L26.3734 29.5332L28.8137 31.9734L31.3406 34.5004L33.8676 37.0274L36.3945 34.5004L33.8676 31.9734L31.3406 29.4465L28.9004 27.0062L31.4936 24.413C34.2322 21.6744 38.6869 21.6744 41.4229 24.413C44.1615 27.1516 44.1615 31.6063 41.4229 34.3423L38.8297 36.9356Z" fill="#444444"/>
</svg>
          </div>
          <h3 class="heading-2 col-start-2 col-span-1">
          140 Health Authority
          </h3>
          <p class="body-2 col-start-2 col-span-1 row-start-2">
There are over 140 health authority jurisdictions that review and approve each product application.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-col items-center text-center justify-stretch md:justify-normal gap-s4">
    <h3 class="heading-3">Learn more about why a digital transformation is needed</h3>
    <a href="#" class="btn btn-tertiary">Read More</a>
  </div>
</section>

<?php
  get_template_part(
    'template-parts/content',
    'careers-footer'
  );
?>
