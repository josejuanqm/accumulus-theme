<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package accumulus-website
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(is_user_logged_in() ? '[&>#wpadminbar]:hidden' : ''); ?>>
<?php wp_body_open(); ?>
<script>
	let navigation_state = {
		opened: false
	}

	function toggleNavigation() {
		navigation_state.opened = !navigation_state.opened
		const header = document.querySelector('header')
		const mobile_menu = document.querySelector('section.mobile-menu')
		const main_bar = document.querySelector('section.main-bar')
		mobile_menu.style.paddingTop = `${main_bar.clientHeight}px`
		if (navigation_state.opened) {
			header.classList.add('opened')
		} else {
			header.classList.remove('opened')
		}
	}
</script>
<div id="page" class="site relative [&>.opened]:fixed [&>.opened]:h-screen [&>.opened>section.mobile-menu]:block">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'accumulus-website' ); ?></a>

	<header class="fixed top-0 right-0 left-0 bg-neutral-nwhite z-50">
		<section class="section hidden lg:block py-s2 px-s2 md:px-s4 border-b border-b-neutral-200">
			<div class="container mx-auto">
				<div class="grid grid-cols-12 gap-x-s3">
					<div class="flex flex-row items-center justify-end col-span-12">
						<ul class="flex flex-row items-center gap-s3">
							<li>
								<a href="">
									Regulator Forum
								</a>
							</li>
							<li>
								<a href="">
									Contact Us
								</a>
							</li>
							<li>
								<a href="">
									Careers
								</a>
							</li>
							<li>
								<a href="">
									LinkedIn
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="section main-bar relative py-s2 z-50 px-s2 md:px-s4 border-b border-b-neutral-200">
			<div class="container mx-auto">
				<div class="grid grid-cols-12 gap-x-s3">
					<div class="logo-container col-span-8 lg:col-span-3">
						<svg width="241" height="38" viewBox="0 0 241 38" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_2010_8587)">
								<path d="M61.5254 8.4375L53.8115 30.7014H58.2819L59.7771 26.244H68.6105L70.1057 30.7014H74.5761L66.8622 8.4375H61.5331H61.5254ZM61.0807 22.2956L64.1708 13.1494L67.2609 22.2956H61.073H61.0807Z" fill="#444444"/>
								<path d="M84.6002 26.799C81.9778 26.799 79.8615 24.3775 79.8615 21.4547C79.8615 18.5319 81.9778 16.0025 84.6002 16.0025C86.3255 16.0025 87.7977 17.0821 88.4418 18.3469H93.5026C92.4291 14.1594 89.0552 11.6299 84.6002 11.6299C79.0333 11.6299 75.0537 16.0333 75.0537 21.4161C75.0537 26.799 79.0333 31.1253 84.6002 31.1253C89.0859 31.1253 92.4598 28.6344 93.5333 24.4083H88.4725C87.8667 25.7039 86.3561 26.7913 84.6002 26.7913V26.799Z" fill="#444444"/>
								<path d="M104.475 26.799C101.853 26.799 99.7365 24.3775 99.7365 21.4547C99.7365 18.5319 101.853 16.0025 104.475 16.0025C106.2 16.0025 107.673 17.0821 108.317 18.3469H113.378C112.304 14.1594 108.93 11.6299 104.475 11.6299C98.9083 11.6299 94.9287 16.0333 94.9287 21.4161C94.9287 26.799 98.9083 31.1253 104.475 31.1253C108.961 31.1253 112.335 28.6344 113.408 24.416H108.347C107.742 25.7116 106.231 26.799 104.475 26.799Z" fill="#444444"/>
								<path d="M226.118 19.043C223.817 18.6805 222.46 18.3566 222.46 17.3849C222.46 16.6986 223.357 15.9043 225.55 15.9043C227.306 15.9043 228.349 16.5906 228.64 17.4543H233.556C232.95 13.9532 229.791 11.6396 225.55 11.6396C220.206 11.6396 217.652 14.6704 217.652 17.5932C217.652 21.7421 222.069 22.6444 225.366 23.1534C228.594 23.6546 229.239 24.0942 229.239 25.143C229.239 26.1918 227.805 26.801 225.895 26.801C224.5 26.801 222.598 26.2226 221.946 24.634H217.139C217.714 28.6364 221.195 31.1351 225.895 31.1351C230.596 31.1351 234.008 28.5362 234.008 24.8577C234.008 20.809 230.711 19.8064 226.11 19.043" fill="#444444"/>
								<path d="M127.554 22.9753C127.554 24.0241 127.194 26.6153 124.104 26.6153H123.958C120.868 26.6153 120.507 24.0164 120.507 22.9753V12.1094H115.769V22.9753C115.769 27.8491 118.675 31.1344 123.053 31.1344H124.993C129.371 31.1344 132.277 27.8491 132.277 22.9753V12.1094H127.539V22.9753H127.546H127.554Z" fill="#444444"/>
								<path d="M157.2 11.6602H155.26C153.274 11.6602 151.594 12.3388 150.345 13.5341C149.102 12.3388 147.423 11.6602 145.43 11.6602H143.49C139.111 11.6602 136.205 14.9454 136.205 19.8192V30.6851H140.944V19.8192C140.944 18.7704 141.304 16.1793 144.394 16.1793H144.54C147.492 16.1793 147.945 18.5622 147.983 19.6804V30.6929H152.729V19.8269C152.729 19.773 152.729 19.7344 152.729 19.6804C152.76 18.5622 153.22 16.1793 156.172 16.1793H156.318C159.408 16.1793 159.768 18.7781 159.768 19.8192V30.6851H164.507V19.8192C164.507 14.9454 161.601 11.6602 157.223 11.6602" fill="#444444"/>
								<path d="M179.898 22.9753C179.898 24.0241 179.537 26.6153 176.447 26.6153H176.302C173.211 26.6153 172.851 24.0164 172.851 22.9753V12.1094H168.112V22.9753C168.112 27.8491 171.018 31.1344 175.397 31.1344H177.337C181.715 31.1344 184.621 27.8491 184.621 22.9753V12.1094H179.882V22.9753H179.89H179.898Z" fill="#444444"/>
								<path d="M209.448 22.9753C209.448 24.0241 209.087 26.6153 205.997 26.6153H205.851C202.761 26.6153 202.401 24.0164 202.401 22.9753V12.1094H197.662V22.9753C197.662 27.8491 200.568 31.1344 204.947 31.1344H206.887C211.265 31.1344 214.171 27.8491 214.171 22.9753V12.1094H209.432V22.9753H209.44H209.448Z" fill="#444444"/>
								<path d="M193.69 3.30176H188.951V30.7017H193.69V3.30176Z" fill="#444444"/>
								<path d="M36.2 14.7616C36.0006 14.7616 35.6249 14.777 35.4255 14.8079C30.7634 15.3631 25.534 12.1704 24.7825 6.03955C24.4145 2.98568 21.8227 0.618164 18.6866 0.618164C15.2974 0.618164 12.5446 3.37899 12.5446 6.79531C12.5446 7.46623 12.652 8.10631 12.8513 8.71554C14.4386 13.5971 13.8251 17.5224 6.43333 19.9516C2.70675 21.1855 0 24.7098 0 28.8896C0 34.0796 4.18665 38.2903 9.34712 38.2903C14.5076 38.2903 18.6942 34.0796 18.6942 28.8896C18.6942 27.4166 18.3492 26.0362 17.7511 24.7946C17.3064 23.8692 16.9766 23.0132 16.7466 22.2266C16.6546 21.9952 16.5856 21.7485 16.5242 21.5094C16.5166 21.4631 16.5012 21.4169 16.4936 21.3706C16.4629 21.2549 16.4399 21.1392 16.4169 21.0159C16.3862 20.8462 16.3632 20.6842 16.3402 20.5454C16.3402 20.5069 16.3325 20.4683 16.3325 20.4298C16.2789 19.9439 16.3019 19.6277 16.3019 19.6277C16.2942 18.2627 16.7236 16.9903 17.4674 15.9261C18.7019 14.0907 20.7876 12.8799 23.1569 12.8799C23.2336 12.8799 23.318 12.8876 23.3946 12.8876C23.7627 12.8876 24.1461 12.9339 24.5218 13.011C24.5831 13.0187 24.6368 13.0419 24.7058 13.0573C24.8439 13.0881 24.9742 13.119 25.1122 13.1652C25.2809 13.2192 25.4496 13.2809 25.6106 13.3426C25.6413 13.3503 25.6873 13.3658 25.718 13.3812C25.8407 13.4352 25.9634 13.4891 26.0861 13.5431C26.7915 13.867 27.4586 14.2912 28.0567 14.7924C28.118 14.8464 28.1717 14.8927 28.2407 14.939C28.3021 14.9929 28.3711 15.0469 28.4247 15.1009C29.9813 16.435 31.0165 18.309 31.4075 20.3835C31.8216 22.5736 33.7309 24.2394 36.0389 24.2394C38.6383 24.2394 40.7547 22.1186 40.7547 19.4966C40.7547 16.8746 38.8377 14.8233 36.223 14.7693" fill="#444444"/>
								<path d="M27.8412 19.7596C27.8412 22.3739 25.7326 24.4869 23.1408 24.4869C20.5491 24.4869 18.4404 22.3661 18.4404 19.7596C18.4404 17.153 20.5491 15.0322 23.1408 15.0322C25.7326 15.0322 27.8412 17.153 27.8412 19.7596Z" fill="#444444"/>
								<path d="M234.949 12.6818H235.809V15.0145H236.536V12.6818H237.393V12.0518H234.949V12.6818Z" fill="#444444"/>
								<path d="M240.13 12.0518L239.53 13.9235L238.905 12.0865L238.893 12.0518H237.923V15.0145H238.611V13.2285L239.222 14.9798L239.234 15.0145H239.792L240.415 13.21V15.0145H241.103V12.0518H240.13Z" fill="#444444"/>
							</g>
							<defs>
								<clipPath id="clip0_2010_8587">
									<rect width="241" height="37" fill="white" transform="translate(0 0.983398)"/>
								</clipPath>
							</defs>
						</svg>
					</div>
					<div class="lg-menu-container col-span-7 hidden lg:flex flex-row items-center justify-center">
						<?php
						// wp_nav_menu(
						// 	array(
						// 		'theme_location' => 'menu-1',
						// 		'menu_id'        => 'primary-menu',
						// 		'menu_class'     => 'flex flex-row gap-s3 h-full items-center justify-center [&>ul]:h-full [&>ul>li]:h-full [&>ul>li>a]:h-full [&>ul>li]:flex [&>ul>li]:items-center [&>ul>li]:justify-center [&>ul>li>a]:flex [&>ul>li>a]:items-center [&>ul>li>A]:justify-center md:text-b3 text-b3Mobile',
						// 	)
						// );
						?>
						<ul class="flex flex-row gap-s3 items-center justify-center [&]:h-full [&>li]:h-full [&>li>a]:h-full [&>li]:flex [&>li]:items-center [&>li]:justify-center [&>li>a]:flex [&>li>a]:items-center [&>li>A]:justify-center md:text-b3 text-b3Mobile [&>li>a>span>svg>path]:stroke-black">
							<li>
								<a href="#" class="flex flex-row gap-s1">
									Platform
									<span>
										<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1.4502 0.841797L6.76582 6.15742L12.0814 0.841797" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</a>
							</li>
							<li>
								<a href="#">
								Case for Change
								</a>
							</li>
							<li>
								<a href="#" class="flex flex-row gap-s1">
								Resources
									<span>
										<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1.4502 0.841797L6.76582 6.15742L12.0814 0.841797" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</a>
							</li>
							<li>
								<a href="#" class="flex flex-row gap-s1">
								Company
									<span>
										<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1.4502 0.841797L6.76582 6.15742L12.0814 0.841797" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="col-span-4 lg:col-span-2 flex flex-row items-center justify-end">
						<button class="btn btn-primary hidden lg:block">Get Started</button>
						<button class="lg:hidden block" onclick="toggleNavigation()">
							<svg width="35" height="20" viewBox="0 0 35 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.4758 3.93832H15.3026H19.1293H22.956H26.7799H30.6067V0H26.7799H22.956H19.1293H15.3026H11.4758H7.65193H3.8252V3.93832H7.65193H11.4758Z" fill="#444444"/>
								<path d="M30.6082 7.87109H26.7815H22.9576H19.1308H15.3041H11.4774H7.65347H3.82673H0V11.8094H3.82673H7.65347H11.4774H15.3041H19.1308H22.9576H26.7815H30.6082H34.4349V7.87109H30.6082Z" fill="#444444"/>
								<path d="M22.956 15.7412H19.1293H15.3026H11.4758H7.65193H3.8252V19.6766H7.65193H11.4758H15.3026H19.1293H22.956H26.7799H30.6067V15.7412H26.7799H22.956Z" fill="#444444"/>
							</svg>
						</button>
					</div>
				</div>
			</div>
		</section>
		<section class="section px-s2 md:px-s4 hidden mobile-menu absolute top-0 left-0 right-0 bottom-0 z-40">
			<div class="container mx-auto h-full flex flex-col items-start justify-between py-s8">
				<?php
				// wp_nav_menu(
				// 	array(
				// 		'theme_location' => 'menu-1',
				// 		'menu_id'        => 'primary-menu',
				// 		'menu_class'     => 'flex flex-row gap-s3 h-full items-center justify-center [&>ul]:h-full [&>ul>li]:h-full [&>ul>li>a]:h-full [&>ul>li]:flex [&>ul>li]:items-center [&>ul>li]:justify-center [&>ul>li>a]:flex [&>ul>li>a]:items-center [&>ul>li>A]:justify-center md:text-b3 text-b3Mobile',
				// 	)
				// );
				?>
				<ul class="flex flex-col items-start justify-start gap-s3 [&]:w-full [&>li]:w-full [&>li>a]:w-full [&>li]:flex [&>li>a]:flex [&>li>a]:items-center [&>li>a]:justify-between lg:text-b3 text-h2Tablet font-medium [&>li>a>span>svg>path]:stroke-black">
					<li>
						<a href="#" class="flex flex-row gap-s1">
							Platform
							<span>
								<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1.4502 0.841797L6.76582 6.15742L12.0814 0.841797" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</span>
						</a>
					</li>
					<li>
						<a href="#">
						Case for Change
						</a>
					</li>
					<li>
						<a href="#" class="flex flex-row gap-s1">
						Resources
							<span>
								<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1.4502 0.841797L6.76582 6.15742L12.0814 0.841797" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</span>
						</a>
					</li>
					<li>
						<a href="#" class="flex flex-row gap-s1">
						Company
							<span>
								<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1.4502 0.841797L6.76582 6.15742L12.0814 0.841797" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</span>
						</a>
					</li>
				</ul>

				<button class="btn btn-primary w-full">Get Started</button>
			</div>
		</section>
	</header>
