<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package accumulus-website
 */

?>

<section class="bg-primary-violet">
<footer id="colophon" class="section body-3 text-neutral-nwhite py-s10 relative isolate overflow-hidden">
    <img class="block md:hidden mix-blend-color-dodge opacity-70 absolute left-0 right-0 bottom-0 w-full -z-10" src="<?php echo get_template_directory_uri() . '/images/footer-bg-mobile.png'; ?>" alt="">
    <img class="hidden md:block lg:hidden mix-blend-color-dodge opacity-70 absolute left-0 right-0 top-0 w-full -z-10" src="<?php echo get_template_directory_uri() . '/images/footer-bg-tablet.png'; ?>" alt="">
    <img class="hidden lg:block mix-blend-color-dodge opacity-70 absolute left-0 right-0 top-0 w-full -z-10" src="<?php echo get_template_directory_uri() . '/images/footer-bg.png'; ?>" alt="">
		<div class="container mx-auto px-4 lg:px-0">
			<div class="grid grid-cols-12 gap-x-s3">
				<div class="flex flex-col gap-y-s4 md:py-s5 md:gap-y-s8 col-span-12">
          <div class="flex-col items-start justify-between h-full gap-s7 hidden md:flex lg:hidden -mb-s4">
            <p class="flex-1 whitespace-nowrap">
              Accumulus Synergy <br/>
              A Nonprofit Industry  <br class="hidden lg:block"/>
              Association
            </p>
            <p>
              © Accumulus Synergy 2024
            </p>
          </div>
					<div class="flex flex-col md:flex-row items-start justify-between">
            <div class="flex flex-col items-start justify-between h-full gap-s7 opacity-100 md:opacity-0 lg:opacity-100">
							<p class="flex-1 whitespace-nowrap">
								Accumulus Synergy <br/>
								A Nonprofit Industry  <br class="hidden lg:block"/>
								Association
							</p>
							<p class=" pb-[33%]">
								© Accumulus Synergy 2024
							</p>
						</div>
						<div class="w-[80%] flex flex-row items-start justify-between lg:justify-end gap-s16 lg:gap-s3">
							<ul class="flex flex-basis-full flex-col items-start gap-s2 list-none">
								<li><p class="pb-s1 text-secondary-mpurple heading-6">Company</p></li>
								<li><a href="">About Us</a></li>
								<li><a href="">Our Team</a></li>
								<li><a href="">News</a></li>
								<li><a href="">Events</a></li>
								<li><a href="">Case For Change</a></li>
								<li><a href="">Regulator Forum</a></li>
								<li><a href="">Careers</a></li>
							</ul>
							<ul class="flex flex-basis-full flex-col items-start gap-s2 list-none">
								<li><p class="pb-s1 text-secondary-mpurple heading-6">Platform</p></li>
								<li><a href="">Accumulus Platform</a></li>
								<li><a href="">Core Capabilities</a></li>
							</ul>
						</div>
					</div>
					<div class="flex flex-row items-start justify-start order-last md:order-none pt-s13 lg:pt-0">
<svg class="md:w-[80%] w-full" viewBox="0 0 330 52" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M319.624 16.9373H321.073V20.8699H322.299V16.9373H323.744V15.8751H319.624V16.9373Z" fill="#FCFCFC"/>
<path d="M328.359 15.8751L327.348 19.0306L326.294 15.9337L326.274 15.8751H324.638V20.8699H325.798V17.859L326.829 20.8114L326.848 20.8699H327.789L328.84 17.8277V20.8699H330V15.8751H328.359Z" fill="#FCFCFC"/>
<g clip-path="url(#clip0_4223_8022)">
<path d="M83.0398 11.416L72.623 41.3983H78.6512L80.6733 35.3942H92.5953L94.6173 41.3983H100.646L90.2288 11.416H83.0363H83.0398ZM82.4404 30.078L86.6153 17.7657L90.7903 30.078H82.4438H82.4404Z" fill="#FCFCFC"/>
<path d="M114.186 36.1532C110.652 36.1532 107.793 32.8971 107.793 28.9601C107.793 25.0231 110.652 21.6218 114.186 21.6218C116.512 21.6218 118.496 23.0805 119.371 24.7811H126.198C124.744 19.1435 120.19 15.7422 114.186 15.7422C106.674 15.7422 101.3 21.6702 101.3 28.9186C101.3 36.1671 106.674 41.9948 114.186 41.9948C120.239 41.9948 124.793 38.6385 126.243 32.9559H119.415C118.596 34.7015 116.556 36.1601 114.183 36.1601L114.186 36.1532Z" fill="#FCFCFC"/>
<path d="M141.008 36.1532C137.473 36.1532 134.614 32.8971 134.614 28.9601C134.614 25.0231 137.473 21.6218 141.008 21.6218C143.333 21.6218 145.317 23.0805 146.192 24.7811H153.019C151.566 19.1435 147.012 15.7422 141.008 15.7422C133.495 15.7422 128.121 21.6702 128.121 28.9186C128.121 36.1671 133.495 41.9948 141.008 41.9948C147.06 41.9948 151.614 38.6385 153.064 32.9559H146.237C145.417 34.7015 143.378 36.1601 141.008 36.1601V36.1532Z" fill="#FCFCFC"/>
<path d="M305.193 25.7021C302.092 25.2147 300.249 24.7792 300.249 23.4657C300.249 22.5428 301.459 21.4747 304.417 21.4747C306.791 21.4747 308.196 22.3976 308.586 23.5659H315.223C314.404 18.8511 310.139 15.7402 304.421 15.7402C297.204 15.7402 293.763 19.8224 293.763 23.7595C293.763 29.3522 299.722 30.5655 304.18 31.2429C308.537 31.9204 309.412 32.5081 309.412 33.9218C309.412 35.3355 307.473 36.1582 304.903 36.1582C303.019 36.1582 300.449 35.3805 299.574 33.2443H293.081C293.856 38.6365 298.555 41.9929 304.896 41.9929C311.238 41.9929 315.844 38.4914 315.844 33.5416C315.844 28.094 311.39 26.7356 305.186 25.7159" fill="#FCFCFC"/>
<path d="M172.16 30.9949C172.16 32.4052 171.674 35.8998 167.506 35.8998H167.31C163.142 35.8998 162.656 32.3983 162.656 30.9949V16.3633H156.263V30.9949C156.263 37.5555 160.186 41.9799 166.094 41.9799H168.708C174.616 41.9799 178.539 37.5555 178.539 30.9949V16.3633H172.146V30.9949H172.16Z" fill="#FCFCFC"/>
<path d="M212.171 15.7578H209.557C206.873 15.7578 204.607 16.6738 202.929 18.2846C201.248 16.6738 198.982 15.7578 196.298 15.7578H193.684C187.776 15.7578 183.853 20.1822 183.853 26.7428V41.3744H190.246V26.7428C190.246 25.3325 190.732 21.8379 194.9 21.8379H195.096C199.081 21.8379 199.695 25.0422 199.739 26.5527V41.3848H206.14V26.7532C206.14 26.684 206.14 26.6218 206.133 26.5561C206.178 25.0456 206.794 21.8414 210.78 21.8414H210.976C215.144 21.8414 215.63 25.3429 215.63 26.7462V41.3779H222.023V26.7462C222.023 20.1857 218.1 15.7613 212.192 15.7613" fill="#FCFCFC"/>
<path d="M242.813 30.9949C242.813 32.4052 242.328 35.8998 238.159 35.8998H237.963C233.795 35.8998 233.309 32.3983 233.309 30.9949V16.3633H226.916V30.9949C226.916 37.5555 230.84 41.9799 236.747 41.9799H239.362C245.269 41.9799 249.193 37.5555 249.193 30.9949V16.3633H242.799V30.9949H242.813Z" fill="#FCFCFC"/>
<path d="M282.688 30.9949C282.688 32.4052 282.203 35.8998 278.034 35.8998H277.838C273.67 35.8998 273.184 32.3983 273.184 30.9949V16.3633H266.791V30.9949C266.791 37.5555 270.714 41.9799 276.622 41.9799H279.237C285.144 41.9799 289.068 37.5555 289.068 30.9949V16.3633H282.674V30.9949H282.688Z" fill="#FCFCFC"/>
<path d="M261.422 4.50586H255.028V41.4013H261.422V4.50586Z" fill="#FCFCFC"/>
<path d="M48.8628 19.9378C48.5907 19.9378 48.0877 19.962 47.8225 20C41.536 20.7467 34.4709 16.4432 33.4616 8.18895C32.969 4.07563 29.4692 0.888672 25.2357 0.888672C20.6577 0.888672 16.9478 4.6114 16.9478 9.20518C16.9478 10.1039 17.0925 10.9749 17.3577 11.7907C19.5003 18.3685 18.6736 23.6536 8.69782 26.927C3.64792 28.5827 0 33.3355 0 38.9559C0 45.9451 5.64927 51.6138 12.6144 51.6138C19.5796 51.6138 25.2288 45.9451 25.2288 38.9559C25.2288 36.9718 24.7638 35.1122 23.9509 33.4392C23.3515 32.1879 22.9106 31.0438 22.5902 29.9826C22.4696 29.6715 22.3698 29.3432 22.2871 29.0148C22.2733 28.9526 22.2561 28.8834 22.2423 28.8247C22.2044 28.6657 22.1734 28.5136 22.1424 28.3511C22.0976 28.123 22.0666 27.9087 22.0425 27.7186C22.0425 27.6667 22.0287 27.6114 22.0287 27.5596C21.9598 26.9028 21.9908 26.4777 21.9908 26.4777C21.9771 24.6388 22.5627 22.9312 23.5651 21.4967C25.2288 19.0253 28.0431 17.3938 31.2432 17.3938C31.35 17.3938 31.4568 17.4076 31.5636 17.4076C32.0665 17.4076 32.5763 17.4698 33.0827 17.577C33.1654 17.5908 33.2412 17.615 33.3273 17.6392C33.5098 17.6841 33.6924 17.7222 33.875 17.7844C34.1023 17.8535 34.3297 17.9365 34.5501 18.0194C34.5949 18.0333 34.65 18.0505 34.6948 18.0713C34.8636 18.1404 35.0221 18.2165 35.1874 18.2925C36.1381 18.728 37.0441 19.2984 37.8467 19.9793C37.9294 20.0484 38.0052 20.1176 38.0913 20.1763C38.1739 20.2455 38.2669 20.3215 38.3427 20.3906C40.4474 22.1915 41.8391 24.7079 42.373 27.5077C42.9276 30.4596 45.5111 32.696 48.6217 32.696C52.1352 32.696 54.984 29.834 54.984 26.3117C54.984 22.7895 52.3901 20.0173 48.8628 19.9482" fill="#FCFCFC"/>
<path d="M37.5809 26.6712C37.5809 30.1866 34.739 33.0417 31.2323 33.0417C27.7257 33.0417 24.8838 30.19 24.8838 26.6712C24.8838 23.1525 27.7257 20.3008 31.2323 20.3008C34.739 20.3008 37.5809 23.1525 37.5809 26.6712Z" fill="#FCFCFC"/>
</g>
<defs>
<clipPath id="clip0_4223_8022">
<rect width="315.836" height="50.7252" fill="white" transform="translate(0 0.888672)"/>
</clipPath>
</defs>
</svg>
					</div>
					<div class="flex flex-row items-start justify-between">
						<div class="hidden lg:flex flex-col items-start justify-between">
							<ul class="flex flex-col items-start gap-s2 list-none">
								<li><a href="">LinkedIn</a></li>
								<li><a href="">Contact Us</a></li>
							</ul>
						</div>
						<div class="w-[80%] flex flex-row items-start justify-between md:justify-end gap-s16">
							<ul class="flex flex-basis-full flex-col items-start gap-s2 list-none">
								<li><p class="pb-s1 text-secondary-mpurple heading-6">Resources</p></li>
								<li><a href="">eBooks and White Papers</a></li>
								<li><a href="">Thought Leadership</a></li>
								<li><a href="">Media</a></li>
							</ul>
							<ul class="flex flex-basis-full flex-col items-start gap-s2 list-none">
								<li><p class="pb-s1 text-secondary-mpurple heading-6">Legal</p></li>
								<li><a href="">Privacy Policy</a></li>
								<li><a href="">Terms & Conditions</a></li>
							</ul>
							<ul class="flex flex-col items-start gap-s2 list-none hidden md:flex lg:hidden">
								<li><p class="pb-s1 text-secondary-mpurple heading-6 opacity-0">&#0020</p></li>
								<li><a href="">LinkedIn</a></li>
								<li><a href="">Contact Us</a></li>
							</ul>
						</div>
					</div>
          <div class="md:hidden flex flex-row items-start justify-between pt-s8"> 
						<div class="flex flex-col items-start justify-between">
							<ul class="flex flex-col items-start gap-s2 list-none">
								<li><a href="">LinkedIn</a></li>
								<li><a href="">Contact Us</a></li>
							</ul>
						</div>
          </div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</section>
</div><!-- #page -->

<script>
  let showingCookies = true

  function hideCookies() {
    showingCookies = false
    let prompt = document.querySelector('#cookies-prompt')
    console.log(prompt)
    if (prompt) {
      prompt.remove()
    }
  }

  window.addEventListener('load', function() {
    if (showingCookies) {
      let prompt = document.querySelector('#cookies-prompt')
      if (prompt) {
        prompt.style.display = 'block'
        prompt.style.position = 'fixed'
      }
    }
  })
</script>

<section id="cookies-prompt" style="display: none;" class="bottom-0 left-0 right-0 py-s4 shadow-lg bg-white z-[999999]">
  <div class="container mx-auto px-s2">
    <div class="grid grid-cols-12 gap-s4">
      <h3 class="heading-3 col-span-12 md:col-span-5 lg:col-span-3">Our website uses cookies</h3>
      <p class="body-3 col-span-12 md:col-span-7 lg:col-span-7">
      Accumulus Synergy uses cookies to give you the best experience when visiting our website. By clicking “Accept,” you’re agreeing to the use of cookies as described in our privacy policy
      </p>
      <div class="flex flex-col items-center justify-stretch gap-s2 md:gap-s4 lg:gap-s2 w-full md:w-auto lg:w-auto col-span-12 lg:col-span-2">
        <button class="btn btn-secondary" id="cookie-prompt-primary-btn">
          Accept Cookies
        </button>
        <div class="btn btn-tertiary" id="cookie-prompt-secondary-btn">
          Decline
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  let primary = document.getElementById('cookie-prompt-primary-btn')
  if (primary) {
    primary.addEventListener('click', hideCookies)
  }

  let secondary = document.getElementById('cookie-prompt-secondary-btn')
  if (secondary) {
    secondary.addEventListener('click', hideCookies)
  }
</script>

<?php wp_footer(); ?>

</body>
</html>
