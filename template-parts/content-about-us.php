<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/MotionPathPlugin.min.js"></script>
<script>
  gsap.registerPlugin(MotionPathPlugin);
</script>

<?php
  $banner = get_field('banner_section');
  $bg_image = $banner['bg_image'];
  $title_tag = $banner['eyebrow_text'];
  $main_title = $banner['main_title'];
  $paragraph_text = $banner['paragraph'];
?>

<section class="section w-full pt-0 lg:pt-52 2xl:pt-60 pb-s12 md:pb-s7 lg:pb-s12 bg-cover bg-no-repeat bg-center" style="background-image: url(<?php echo $bg_image ?>)">
	<div class="container mx-auto">
		<div class="grid grid-cols-12 gap-x-s2 gap-y-s6 lg:justify-end pt-s10 md:pt-0 lg:pt-0">
			<h4 class="col-span-12 body-3 uppercase pt-s1"><?php echo $title_tag; ?></h4>
			<h1 class="col-span-12 heading-1"><?php echo $main_title; ?></h1>
			<div class="col-span-12 md:col-span-6 md:col-start-6 flex flex-col md:items-end lg:items-start gap-s8 lg:gap-s4">
				<p class="body-2 md:max-w-550 lg:max-w-full"><?php echo $paragraph_text; ?></p>
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
      <div class="grid grid-cols-12 gap-x-s2 gap-y-[9rem]">
        <div class="relative flex flex-col col-span-12 md:col-span-8 lg:col-span-6 items-start gap-s3">
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
        
        <div class="grid grid-cols-12 gap-s2 md:gap-s2 lg:gap-s7 col-span-12 items-center justify-between">
          <button onclick="animatePrev()" class="col-span-2 lg:col-span-1 row-start-2 md:row-start-1 min-w-s7 lg:min-w-0">
            <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-neutral-500">
              <path d="M28.8623 55.7519C43.7885 55.7519 55.8886 43.6518 55.8886 28.7256C55.8886 13.7993 43.7885 1.69922 28.8623 1.69922C13.936 1.69922 1.83594 13.7993 1.83594 28.7256C1.83594 43.6518 13.936 55.7519 28.8623 55.7519Z" stroke-width="1.86732" stroke-miterlimit="10"/>
              <path d="M33.1451 39.7941L22.0781 28.7271L33.1451 17.6602" stroke-width="1.86732" stroke-miterlimit="10"/>
            </svg>
          </button>

          <span id="slider-prev-label" class="body-3 text-neutral-500 col-span-2 lg:col-span-1 row-start-2 md:row-start-1">
            <?php echo $years[0]['year']; ?>
          </span>

          <div class="overflow-hidden relative flex-1 md:h-full col-span-12 md:col-span-9 row-start-1 h-s6" style="
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

          <span id="slider-next-label" class="text-right body-3 text-neutral-500 col-span-2 lg:col-span-1 row-start-2 md:row-start-1 col-start-9 md:col-start-auto">
            <?php echo $years[count($years ) - 1]['year']; ?>
          </span>

          <button onclick="animateNext()" class="col-span-2 lg:col-span-1 row-start-2 md:row-start-1 col-start-11 md:col-start-auto min-w-s7 lg:min-w-0">
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
