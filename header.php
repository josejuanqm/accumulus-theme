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

<body <?php body_class(is_user_logged_in() ? '' : ''); ?>>
<?php wp_body_open(); ?>
<?php 
  // switch url path
  $url_path = $_SERVER['REQUEST_URI'];
  $url_path = explode('/', $url_path);
  $url_path = $url_path[1];
  $primary_menu_items = wp_get_nav_menu_items('Primary');
  $secondary_menu_items = wp_get_nav_menu_items('Secondary');
?>
<div id="page" class="site relative [&>.opened]:fixed [&>.opened]:h-screen [&>.opened>section.mobile-menu]:block">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'accumulus-website' ); ?></a>
  <header id="navigation" class="lg:bg-auto fixed w-full z-[999999] text-neutral-sgray group">
    <div class="bg-white text-neutral-sgray stroke-cta-dark hidden lg:block section border-b-[1px] border-b-neutral-200 content transition-color duration-150">
      <div class="container mx-auto px-s2 py-s2">
        <div class="flex flex-row items-center justify-end">
          <ul class="flex flex-row items-center justify-end gap-s2 text-sm heading-5">
              <?php foreach ($secondary_menu_items as $menu_item) : ?>
	      <li><a class="hover:underline" href="<?php echo $menu_item->url; ?>" target="<?php echo $menu_item->title == "LinkedIn" ? "_blank" : ""; ?>"><?php echo $menu_item->title; ?></a></li>
              <?php endforeach; ?>
          </ul>
        </div> 
      </div>
    </div>
    <div class="section bg-white text-neutral-sgray stroke-cta-dark content transition-color duration-150 border-b-neutral-200">
      <div class="container mx-auto px-s2">
        <div class="flex flex-row items-center">
          <div class="flex flex-row items-center me-auto">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="py-s2 flex flex-row items-center relative isolate overflow-hidden">
              <svg width="241" height="61" viewBox="0 0 241 61" class="logo fill-white stroke-none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_4005_31882)">
              <path d="M61.5264 12.7661L53.8125 35.0301H58.2829L59.7781 30.5726H68.6115L70.1067 35.0301H74.5771L66.8632 12.7661H61.534H61.5264ZM61.0816 26.6242L64.1718 17.478L67.2619 26.6242H61.074H61.0816Z" />
              <path d="M84.6012 31.1276C81.9788 31.1276 79.8624 28.7061 79.8624 25.7833C79.8624 22.8605 81.9788 20.3311 84.6012 20.3311C86.3264 20.3311 87.7987 21.4107 88.4428 22.6755H93.5036C92.4301 18.488 89.0562 15.9585 84.6012 15.9585C79.0343 15.9585 75.0547 20.3619 75.0547 25.7448C75.0547 31.1276 79.0343 35.4539 84.6012 35.4539C89.0869 35.4539 92.4607 32.963 93.5342 28.7369H88.4734C87.8677 30.0325 86.3571 31.1199 84.6012 31.1199V31.1276Z"/>
              <path d="M104.476 31.1276C101.854 31.1276 99.7374 28.7061 99.7374 25.7833C99.7374 22.8605 101.854 20.3311 104.476 20.3311C106.201 20.3311 107.674 21.4107 108.318 22.6755H113.379C112.305 18.488 108.931 15.9585 104.476 15.9585C98.9093 15.9585 94.9297 20.3619 94.9297 25.7448C94.9297 31.1276 98.9093 35.4539 104.476 35.4539C108.962 35.4539 112.336 32.963 113.409 28.7446H108.348C107.743 30.0402 106.232 31.1276 104.476 31.1276Z"/>
              <path d="M226.12 23.3716C223.819 23.0091 222.462 22.6852 222.462 21.7135C222.462 21.0272 223.359 20.2329 225.552 20.2329C227.308 20.2329 228.351 20.9192 228.642 21.783H233.558C232.952 18.2818 229.793 15.9683 225.552 15.9683C220.208 15.9683 217.654 18.999 217.654 21.9218C217.654 26.0707 222.071 26.973 225.368 27.482C228.596 27.9832 229.241 28.4228 229.241 29.4716C229.241 30.5204 227.807 31.1296 225.897 31.1296C224.502 31.1296 222.6 30.5513 221.948 28.9626H217.141C217.716 32.965 221.197 35.4637 225.897 35.4637C230.598 35.4637 234.01 32.8648 234.01 29.1863C234.01 25.1376 230.713 24.135 226.112 23.3716" />
              <path d="M127.555 27.3039C127.555 28.3527 127.195 30.9439 124.104 30.9439H123.959C120.869 30.9439 120.508 28.345 120.508 27.3039V16.438H115.77V27.3039C115.77 32.1778 118.676 35.463 123.054 35.463H124.994C129.372 35.463 132.278 32.1778 132.278 27.3039V16.438H127.54V27.3039H127.547H127.555Z"/>
              <path d="M157.198 15.9888H155.258C153.272 15.9888 151.593 16.6674 150.343 17.8627C149.1 16.6674 147.421 15.9888 145.428 15.9888H143.488C139.109 15.9888 136.203 19.274 136.203 24.1478V35.0138H140.942V24.1478C140.942 23.099 141.302 20.5079 144.392 20.5079H144.538C147.49 20.5079 147.943 22.8908 147.981 24.009V35.0215H152.727V24.1556C152.727 24.1016 152.727 24.063 152.727 24.009C152.758 22.8908 153.218 20.5079 156.17 20.5079H156.316C159.406 20.5079 159.766 23.1068 159.766 24.1478V35.0138H164.505V24.1478C164.505 19.274 161.599 15.9888 157.221 15.9888"/>
              <path d="M179.899 27.3039C179.899 28.3527 179.538 30.9439 176.448 30.9439H176.303C173.212 30.9439 172.852 28.345 172.852 27.3039V16.438H168.113V27.3039C168.113 32.1778 171.019 35.463 175.398 35.463H177.338C181.716 35.463 184.622 32.1778 184.622 27.3039V16.438H179.883V27.3039H179.891H179.899Z"/>
              <path d="M209.45 27.3039C209.45 28.3527 209.089 30.9439 205.999 30.9439H205.853C202.763 30.9439 202.403 28.345 202.403 27.3039V16.438H197.664V27.3039C197.664 32.1778 200.57 35.463 204.949 35.463H206.888C211.267 35.463 214.173 32.1778 214.173 27.3039V16.438H209.434V27.3039H209.442H209.45Z" />
              <path d="M193.692 7.63037H188.953V35.0304H193.692V7.63037Z" />
              <path d="M36.2 19.0902C36.0006 19.0902 35.6249 19.1056 35.4255 19.1365C30.7634 19.6917 25.534 16.499 24.7825 10.3682C24.4145 7.3143 21.8227 4.94678 18.6866 4.94678C15.2974 4.94678 12.5446 7.7076 12.5446 11.1239C12.5446 11.7948 12.652 12.4349 12.8513 13.0442C14.4386 17.9257 13.8251 21.851 6.43333 24.2802C2.70675 25.5141 0 29.0384 0 33.2182C0 38.4082 4.18665 42.6189 9.34712 42.6189C14.5076 42.6189 18.6942 38.4082 18.6942 33.2182C18.6942 31.7453 18.3492 30.3648 17.7511 29.1232C17.3064 28.1978 16.9766 27.3418 16.7466 26.5552C16.6546 26.3239 16.5856 26.0771 16.5242 25.838C16.5166 25.7917 16.5012 25.7455 16.4936 25.6992C16.4629 25.5835 16.4399 25.4679 16.4169 25.3445C16.3862 25.1748 16.3632 25.0129 16.3402 24.874C16.3402 24.8355 16.3325 24.7969 16.3325 24.7584C16.2789 24.2725 16.3019 23.9563 16.3019 23.9563C16.2942 22.5914 16.7236 21.3189 17.4674 20.2547C18.7019 18.4193 20.7876 17.2085 23.1569 17.2085C23.2336 17.2085 23.318 17.2162 23.3946 17.2162C23.7627 17.2162 24.1461 17.2625 24.5218 17.3396C24.5831 17.3473 24.6368 17.3705 24.7058 17.3859C24.8439 17.4167 24.9742 17.4476 25.1122 17.4939C25.2809 17.5478 25.4496 17.6095 25.6106 17.6712C25.6413 17.6789 25.6873 17.6944 25.718 17.7098C25.8407 17.7638 25.9634 17.8178 26.0861 17.8717C26.7915 18.1956 27.4586 18.6198 28.0567 19.121C28.118 19.175 28.1717 19.2213 28.2407 19.2676C28.3021 19.3216 28.3711 19.3755 28.4247 19.4295C29.9813 20.7637 31.0165 22.6376 31.4075 24.7121C31.8216 26.9022 33.7309 28.568 36.0389 28.568C38.6383 28.568 40.7547 26.4473 40.7547 23.8252C40.7547 21.2032 38.8377 19.1519 36.223 19.0979" />
              <path d="M27.8422 24.0882C27.8422 26.7025 25.7335 28.8155 23.1418 28.8155C20.5501 28.8155 18.4414 26.6948 18.4414 24.0882C18.4414 21.4816 20.5501 19.3608 23.1418 19.3608C25.7335 19.3608 27.8422 21.4816 27.8422 24.0882Z"/>
              <path d="M234.949 17.0105H235.809V19.3431H236.536V17.0105H237.393V16.3804H234.949V17.0105Z"/>
              <path d="M240.129 16.3804L239.53 18.2521L238.904 16.4151L238.892 16.3804H237.922V19.3431H238.61V17.5571L239.221 19.3084L239.233 19.3431H239.791L240.414 17.5386V19.3431H241.102V16.3804H240.129Z" />
              </g>
              <path d="M164.049 50.0085L162.934 49.6358C162.506 49.5158 162.223 49.3643 162.072 49.2C161.933 49.0421 161.858 48.8716 161.858 48.6821C161.858 48.4168 161.978 48.1958 162.236 48.0063C162.494 47.8105 162.853 47.7157 163.293 47.7157C163.734 47.7157 164.219 47.8105 164.653 48.0063C165.094 48.2021 165.478 48.4042 165.78 48.6063L165.918 48.7011V46.2946L165.887 46.2693C165.597 46.0293 165.182 45.8082 164.647 45.625C164.118 45.4419 163.539 45.3408 162.916 45.3408C162.166 45.3408 161.487 45.4798 160.901 45.7514C160.316 46.0293 159.85 46.4083 159.529 46.8757C159.201 47.3557 159.038 47.9242 159.038 48.5621C159.038 49.2 159.183 49.7685 159.485 50.2359C159.781 50.7096 160.328 51.0823 161.096 51.3286L162.311 51.7581C162.733 51.8971 163.054 52.0423 163.268 52.1813C163.463 52.3076 163.558 52.4718 163.558 52.6929C163.558 52.9898 163.444 53.2108 163.199 53.375C162.947 53.5393 162.576 53.6277 162.11 53.6277C161.808 53.6277 161.461 53.5772 161.096 53.4824C160.725 53.3814 160.366 53.2614 160.02 53.1034C159.674 52.9519 159.378 52.7876 159.138 52.6171L159 52.5224V54.9099L159.038 54.9352C159.365 55.1878 159.862 55.4215 160.486 55.6299C161.115 55.8447 161.776 55.9457 162.45 55.9457C163.161 55.9457 163.822 55.8068 164.414 55.5226C165.005 55.2383 165.478 54.853 165.836 54.3667C166.189 53.8803 166.372 53.3056 166.372 52.6803C166.372 51.3475 165.591 50.4443 164.068 49.9896" />
              <path d="M172.846 51.77L170.088 45.5928H167.004L171.303 54.8523L168.282 60.3727H171.297L178.555 45.5928H175.521L172.846 51.77Z"/>
              <path d="M185.707 45.3408C185.027 45.3408 184.416 45.5239 183.888 45.884C183.453 46.1808 183.088 46.5029 182.805 46.8377V45.5871H180.148V55.6615H182.805V49.3326C183.069 48.96 183.39 48.6315 183.755 48.3536C184.121 48.0757 184.523 47.9367 184.945 47.9367C185.474 47.9367 185.902 48.0946 186.198 48.4041C186.494 48.7073 186.651 49.1936 186.651 49.8316L186.67 55.6615H189.327V49.4968C189.327 48.1199 188.98 47.0714 188.282 46.3766C187.595 45.6881 186.72 45.3281 185.694 45.3281" />
              <path d="M199.048 45.9792C198.343 45.556 197.486 45.335 196.511 45.335C195.535 45.335 194.654 45.5876 193.886 46.0866C193.124 46.5793 192.513 47.2425 192.079 48.0509C191.645 48.8594 191.418 49.7626 191.418 50.7353C191.418 51.708 191.663 52.6491 192.142 53.426C192.627 54.2029 193.275 54.8345 194.087 55.2767C194.899 55.7315 195.812 55.9588 196.794 55.9588C197.543 55.9588 198.242 55.8136 198.871 55.5293C199.495 55.2451 199.967 54.9609 200.294 54.6766L200.325 54.6514L200.351 52.0996L200.206 52.226C199.86 52.5165 199.394 52.8134 198.815 53.0976C198.242 53.3818 197.6 53.5208 196.901 53.5208C196.202 53.5208 195.541 53.325 195.044 52.9334C194.565 52.567 194.263 52.0744 194.125 51.4806H201.251V50.3311C201.251 49.3521 201.062 48.4804 200.684 47.7288C200.307 46.9772 199.759 46.3835 199.048 45.9603M196.448 47.6783C196.983 47.6783 197.486 47.8488 197.933 48.1773C198.361 48.4868 198.607 48.9668 198.67 49.5984H194.15C194.307 49.03 194.578 48.5689 194.956 48.2278C195.352 47.8678 195.85 47.6846 196.435 47.6846" />
              <path d="M208.774 45.3984C208.17 45.3984 207.622 45.6069 207.144 46.0111C206.747 46.3459 206.395 46.7564 206.086 47.2365V45.6006H203.43V55.6749H206.086V50.0851C206.369 49.5545 206.691 49.1061 207.056 48.746C207.414 48.3923 207.874 48.2155 208.422 48.2155C208.862 48.2155 209.29 48.3292 209.687 48.5565L209.819 48.6323V45.6195L209.762 45.5942C209.473 45.4742 209.133 45.4111 208.774 45.4111" />
              <path d="M218.552 46.5729C218.212 46.2255 217.79 45.935 217.305 45.7139C216.752 45.4613 216.191 45.335 215.65 45.335C214.787 45.335 214.001 45.556 213.289 45.9855C212.584 46.415 212.018 47.0403 211.596 47.8299C211.18 48.6257 210.973 49.5858 210.973 50.6911C210.973 51.7965 211.18 52.7502 211.59 53.5334C211.999 54.3166 212.553 54.923 213.233 55.3335C213.912 55.7441 214.668 55.9525 215.474 55.9525C216.216 55.9525 216.877 55.7504 217.438 55.3588C217.897 55.0367 218.269 54.6577 218.546 54.2282V55.6304C218.546 56.1167 218.42 56.5589 218.162 56.9442C217.903 57.3295 217.545 57.6263 217.098 57.8411C216.638 58.0558 216.122 58.1632 215.555 58.1632C214.989 58.1632 214.517 58.0874 214.108 57.9485C213.692 57.8095 213.314 57.6326 212.993 57.4305C212.666 57.2221 212.345 57.0263 212.043 56.8431L211.911 56.7547V59.3127L211.948 59.338C212.427 59.6728 212.962 59.9823 213.522 60.2412C214.089 60.5065 214.825 60.6392 215.713 60.6392C216.701 60.6392 217.62 60.4307 218.451 60.0138C219.282 59.597 219.956 58.9843 220.459 58.1948C220.957 57.4053 221.215 56.4326 221.215 55.2956V45.5623H218.558V46.5603L218.552 46.5729ZM214.026 49.3647C214.227 48.9542 214.504 48.6194 214.869 48.3604C215.222 48.1015 215.656 47.9751 216.153 47.9751C216.619 47.9751 217.054 48.0762 217.45 48.2846C217.841 48.4868 218.206 48.771 218.546 49.131V50.5079C218.546 51.089 218.432 51.588 218.199 51.9986C217.966 52.4091 217.664 52.7249 217.299 52.946C216.934 53.1671 216.525 53.2744 216.103 53.2744C215.392 53.2744 214.813 53.0218 214.385 52.5354C213.95 52.0428 213.73 51.4238 213.73 50.6974C213.73 50.2111 213.831 49.769 214.032 49.3521" />
              <path d="M231.316 45.5928L228.641 51.77L225.884 45.5928H222.793L227.092 54.8523L224.077 60.3727H227.092L234.344 45.5928H231.316Z" />
              <defs>
              <clipPath id="clip0_4005_31882">
              <rect width="241" height="37"  transform="translate(0 5.31201)"/>
              </clipPath>
              </defs>
              </svg>
              <svg width="241" height="61" viewBox="0 0 241 61" class="logo fill-cta-dark stroke-none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_4005_31882)">
              <path d="M61.5264 12.7661L53.8125 35.0301H58.2829L59.7781 30.5726H68.6115L70.1067 35.0301H74.5771L66.8632 12.7661H61.534H61.5264ZM61.0816 26.6242L64.1718 17.478L67.2619 26.6242H61.074H61.0816Z" />
              <path d="M84.6012 31.1276C81.9788 31.1276 79.8624 28.7061 79.8624 25.7833C79.8624 22.8605 81.9788 20.3311 84.6012 20.3311C86.3264 20.3311 87.7987 21.4107 88.4428 22.6755H93.5036C92.4301 18.488 89.0562 15.9585 84.6012 15.9585C79.0343 15.9585 75.0547 20.3619 75.0547 25.7448C75.0547 31.1276 79.0343 35.4539 84.6012 35.4539C89.0869 35.4539 92.4607 32.963 93.5342 28.7369H88.4734C87.8677 30.0325 86.3571 31.1199 84.6012 31.1199V31.1276Z"/>
              <path d="M104.476 31.1276C101.854 31.1276 99.7374 28.7061 99.7374 25.7833C99.7374 22.8605 101.854 20.3311 104.476 20.3311C106.201 20.3311 107.674 21.4107 108.318 22.6755H113.379C112.305 18.488 108.931 15.9585 104.476 15.9585C98.9093 15.9585 94.9297 20.3619 94.9297 25.7448C94.9297 31.1276 98.9093 35.4539 104.476 35.4539C108.962 35.4539 112.336 32.963 113.409 28.7446H108.348C107.743 30.0402 106.232 31.1276 104.476 31.1276Z"/>
              <path d="M226.12 23.3716C223.819 23.0091 222.462 22.6852 222.462 21.7135C222.462 21.0272 223.359 20.2329 225.552 20.2329C227.308 20.2329 228.351 20.9192 228.642 21.783H233.558C232.952 18.2818 229.793 15.9683 225.552 15.9683C220.208 15.9683 217.654 18.999 217.654 21.9218C217.654 26.0707 222.071 26.973 225.368 27.482C228.596 27.9832 229.241 28.4228 229.241 29.4716C229.241 30.5204 227.807 31.1296 225.897 31.1296C224.502 31.1296 222.6 30.5513 221.948 28.9626H217.141C217.716 32.965 221.197 35.4637 225.897 35.4637C230.598 35.4637 234.01 32.8648 234.01 29.1863C234.01 25.1376 230.713 24.135 226.112 23.3716" />
              <path d="M127.555 27.3039C127.555 28.3527 127.195 30.9439 124.104 30.9439H123.959C120.869 30.9439 120.508 28.345 120.508 27.3039V16.438H115.77V27.3039C115.77 32.1778 118.676 35.463 123.054 35.463H124.994C129.372 35.463 132.278 32.1778 132.278 27.3039V16.438H127.54V27.3039H127.547H127.555Z"/>
              <path d="M157.198 15.9888H155.258C153.272 15.9888 151.593 16.6674 150.343 17.8627C149.1 16.6674 147.421 15.9888 145.428 15.9888H143.488C139.109 15.9888 136.203 19.274 136.203 24.1478V35.0138H140.942V24.1478C140.942 23.099 141.302 20.5079 144.392 20.5079H144.538C147.49 20.5079 147.943 22.8908 147.981 24.009V35.0215H152.727V24.1556C152.727 24.1016 152.727 24.063 152.727 24.009C152.758 22.8908 153.218 20.5079 156.17 20.5079H156.316C159.406 20.5079 159.766 23.1068 159.766 24.1478V35.0138H164.505V24.1478C164.505 19.274 161.599 15.9888 157.221 15.9888"/>
              <path d="M179.899 27.3039C179.899 28.3527 179.538 30.9439 176.448 30.9439H176.303C173.212 30.9439 172.852 28.345 172.852 27.3039V16.438H168.113V27.3039C168.113 32.1778 171.019 35.463 175.398 35.463H177.338C181.716 35.463 184.622 32.1778 184.622 27.3039V16.438H179.883V27.3039H179.891H179.899Z"/>
              <path d="M209.45 27.3039C209.45 28.3527 209.089 30.9439 205.999 30.9439H205.853C202.763 30.9439 202.403 28.345 202.403 27.3039V16.438H197.664V27.3039C197.664 32.1778 200.57 35.463 204.949 35.463H206.888C211.267 35.463 214.173 32.1778 214.173 27.3039V16.438H209.434V27.3039H209.442H209.45Z" />
              <path d="M193.692 7.63037H188.953V35.0304H193.692V7.63037Z" />
              <path d="M36.2 19.0902C36.0006 19.0902 35.6249 19.1056 35.4255 19.1365C30.7634 19.6917 25.534 16.499 24.7825 10.3682C24.4145 7.3143 21.8227 4.94678 18.6866 4.94678C15.2974 4.94678 12.5446 7.7076 12.5446 11.1239C12.5446 11.7948 12.652 12.4349 12.8513 13.0442C14.4386 17.9257 13.8251 21.851 6.43333 24.2802C2.70675 25.5141 0 29.0384 0 33.2182C0 38.4082 4.18665 42.6189 9.34712 42.6189C14.5076 42.6189 18.6942 38.4082 18.6942 33.2182C18.6942 31.7453 18.3492 30.3648 17.7511 29.1232C17.3064 28.1978 16.9766 27.3418 16.7466 26.5552C16.6546 26.3239 16.5856 26.0771 16.5242 25.838C16.5166 25.7917 16.5012 25.7455 16.4936 25.6992C16.4629 25.5835 16.4399 25.4679 16.4169 25.3445C16.3862 25.1748 16.3632 25.0129 16.3402 24.874C16.3402 24.8355 16.3325 24.7969 16.3325 24.7584C16.2789 24.2725 16.3019 23.9563 16.3019 23.9563C16.2942 22.5914 16.7236 21.3189 17.4674 20.2547C18.7019 18.4193 20.7876 17.2085 23.1569 17.2085C23.2336 17.2085 23.318 17.2162 23.3946 17.2162C23.7627 17.2162 24.1461 17.2625 24.5218 17.3396C24.5831 17.3473 24.6368 17.3705 24.7058 17.3859C24.8439 17.4167 24.9742 17.4476 25.1122 17.4939C25.2809 17.5478 25.4496 17.6095 25.6106 17.6712C25.6413 17.6789 25.6873 17.6944 25.718 17.7098C25.8407 17.7638 25.9634 17.8178 26.0861 17.8717C26.7915 18.1956 27.4586 18.6198 28.0567 19.121C28.118 19.175 28.1717 19.2213 28.2407 19.2676C28.3021 19.3216 28.3711 19.3755 28.4247 19.4295C29.9813 20.7637 31.0165 22.6376 31.4075 24.7121C31.8216 26.9022 33.7309 28.568 36.0389 28.568C38.6383 28.568 40.7547 26.4473 40.7547 23.8252C40.7547 21.2032 38.8377 19.1519 36.223 19.0979" />
              <path d="M27.8422 24.0882C27.8422 26.7025 25.7335 28.8155 23.1418 28.8155C20.5501 28.8155 18.4414 26.6948 18.4414 24.0882C18.4414 21.4816 20.5501 19.3608 23.1418 19.3608C25.7335 19.3608 27.8422 21.4816 27.8422 24.0882Z"/>
              <path d="M234.949 17.0105H235.809V19.3431H236.536V17.0105H237.393V16.3804H234.949V17.0105Z"/>
              <path d="M240.129 16.3804L239.53 18.2521L238.904 16.4151L238.892 16.3804H237.922V19.3431H238.61V17.5571L239.221 19.3084L239.233 19.3431H239.791L240.414 17.5386V19.3431H241.102V16.3804H240.129Z" />
              </g>
              <path d="M164.049 50.0085L162.934 49.6358C162.506 49.5158 162.223 49.3643 162.072 49.2C161.933 49.0421 161.858 48.8716 161.858 48.6821C161.858 48.4168 161.978 48.1958 162.236 48.0063C162.494 47.8105 162.853 47.7157 163.293 47.7157C163.734 47.7157 164.219 47.8105 164.653 48.0063C165.094 48.2021 165.478 48.4042 165.78 48.6063L165.918 48.7011V46.2946L165.887 46.2693C165.597 46.0293 165.182 45.8082 164.647 45.625C164.118 45.4419 163.539 45.3408 162.916 45.3408C162.166 45.3408 161.487 45.4798 160.901 45.7514C160.316 46.0293 159.85 46.4083 159.529 46.8757C159.201 47.3557 159.038 47.9242 159.038 48.5621C159.038 49.2 159.183 49.7685 159.485 50.2359C159.781 50.7096 160.328 51.0823 161.096 51.3286L162.311 51.7581C162.733 51.8971 163.054 52.0423 163.268 52.1813C163.463 52.3076 163.558 52.4718 163.558 52.6929C163.558 52.9898 163.444 53.2108 163.199 53.375C162.947 53.5393 162.576 53.6277 162.11 53.6277C161.808 53.6277 161.461 53.5772 161.096 53.4824C160.725 53.3814 160.366 53.2614 160.02 53.1034C159.674 52.9519 159.378 52.7876 159.138 52.6171L159 52.5224V54.9099L159.038 54.9352C159.365 55.1878 159.862 55.4215 160.486 55.6299C161.115 55.8447 161.776 55.9457 162.45 55.9457C163.161 55.9457 163.822 55.8068 164.414 55.5226C165.005 55.2383 165.478 54.853 165.836 54.3667C166.189 53.8803 166.372 53.3056 166.372 52.6803C166.372 51.3475 165.591 50.4443 164.068 49.9896" />
              <path d="M172.846 51.77L170.088 45.5928H167.004L171.303 54.8523L168.282 60.3727H171.297L178.555 45.5928H175.521L172.846 51.77Z"/>
              <path d="M185.707 45.3408C185.027 45.3408 184.416 45.5239 183.888 45.884C183.453 46.1808 183.088 46.5029 182.805 46.8377V45.5871H180.148V55.6615H182.805V49.3326C183.069 48.96 183.39 48.6315 183.755 48.3536C184.121 48.0757 184.523 47.9367 184.945 47.9367C185.474 47.9367 185.902 48.0946 186.198 48.4041C186.494 48.7073 186.651 49.1936 186.651 49.8316L186.67 55.6615H189.327V49.4968C189.327 48.1199 188.98 47.0714 188.282 46.3766C187.595 45.6881 186.72 45.3281 185.694 45.3281" />
              <path d="M199.048 45.9792C198.343 45.556 197.486 45.335 196.511 45.335C195.535 45.335 194.654 45.5876 193.886 46.0866C193.124 46.5793 192.513 47.2425 192.079 48.0509C191.645 48.8594 191.418 49.7626 191.418 50.7353C191.418 51.708 191.663 52.6491 192.142 53.426C192.627 54.2029 193.275 54.8345 194.087 55.2767C194.899 55.7315 195.812 55.9588 196.794 55.9588C197.543 55.9588 198.242 55.8136 198.871 55.5293C199.495 55.2451 199.967 54.9609 200.294 54.6766L200.325 54.6514L200.351 52.0996L200.206 52.226C199.86 52.5165 199.394 52.8134 198.815 53.0976C198.242 53.3818 197.6 53.5208 196.901 53.5208C196.202 53.5208 195.541 53.325 195.044 52.9334C194.565 52.567 194.263 52.0744 194.125 51.4806H201.251V50.3311C201.251 49.3521 201.062 48.4804 200.684 47.7288C200.307 46.9772 199.759 46.3835 199.048 45.9603M196.448 47.6783C196.983 47.6783 197.486 47.8488 197.933 48.1773C198.361 48.4868 198.607 48.9668 198.67 49.5984H194.15C194.307 49.03 194.578 48.5689 194.956 48.2278C195.352 47.8678 195.85 47.6846 196.435 47.6846" />
              <path d="M208.774 45.3984C208.17 45.3984 207.622 45.6069 207.144 46.0111C206.747 46.3459 206.395 46.7564 206.086 47.2365V45.6006H203.43V55.6749H206.086V50.0851C206.369 49.5545 206.691 49.1061 207.056 48.746C207.414 48.3923 207.874 48.2155 208.422 48.2155C208.862 48.2155 209.29 48.3292 209.687 48.5565L209.819 48.6323V45.6195L209.762 45.5942C209.473 45.4742 209.133 45.4111 208.774 45.4111" />
              <path d="M218.552 46.5729C218.212 46.2255 217.79 45.935 217.305 45.7139C216.752 45.4613 216.191 45.335 215.65 45.335C214.787 45.335 214.001 45.556 213.289 45.9855C212.584 46.415 212.018 47.0403 211.596 47.8299C211.18 48.6257 210.973 49.5858 210.973 50.6911C210.973 51.7965 211.18 52.7502 211.59 53.5334C211.999 54.3166 212.553 54.923 213.233 55.3335C213.912 55.7441 214.668 55.9525 215.474 55.9525C216.216 55.9525 216.877 55.7504 217.438 55.3588C217.897 55.0367 218.269 54.6577 218.546 54.2282V55.6304C218.546 56.1167 218.42 56.5589 218.162 56.9442C217.903 57.3295 217.545 57.6263 217.098 57.8411C216.638 58.0558 216.122 58.1632 215.555 58.1632C214.989 58.1632 214.517 58.0874 214.108 57.9485C213.692 57.8095 213.314 57.6326 212.993 57.4305C212.666 57.2221 212.345 57.0263 212.043 56.8431L211.911 56.7547V59.3127L211.948 59.338C212.427 59.6728 212.962 59.9823 213.522 60.2412C214.089 60.5065 214.825 60.6392 215.713 60.6392C216.701 60.6392 217.62 60.4307 218.451 60.0138C219.282 59.597 219.956 58.9843 220.459 58.1948C220.957 57.4053 221.215 56.4326 221.215 55.2956V45.5623H218.558V46.5603L218.552 46.5729ZM214.026 49.3647C214.227 48.9542 214.504 48.6194 214.869 48.3604C215.222 48.1015 215.656 47.9751 216.153 47.9751C216.619 47.9751 217.054 48.0762 217.45 48.2846C217.841 48.4868 218.206 48.771 218.546 49.131V50.5079C218.546 51.089 218.432 51.588 218.199 51.9986C217.966 52.4091 217.664 52.7249 217.299 52.946C216.934 53.1671 216.525 53.2744 216.103 53.2744C215.392 53.2744 214.813 53.0218 214.385 52.5354C213.95 52.0428 213.73 51.4238 213.73 50.6974C213.73 50.2111 213.831 49.769 214.032 49.3521" />
              <path d="M231.316 45.5928L228.641 51.77L225.884 45.5928H222.793L227.092 54.8523L224.077 60.3727H227.092L234.344 45.5928H231.316Z" />
              <defs>
              <clipPath id="clip0_4005_31882">
              <rect width="241" height="37"  transform="translate(0 5.31201)"/>
              </clipPath>
              </defs>
              </svg>
            </a>
          </div>
          <div class="flex-row items-center hidden lg:flex">
            <ul class="flex flex-row items-center gap-s4">
              <?php foreach ($primary_menu_items as $menu_item) : ?>
                <?php $post_id = get_post_meta($menu_item->ID, '_menu_item_object_id', true ); ?>
                <?php
                  $fields = get_fields($menu_item); 
                ?>
                <li class="menu-item menu-item-dropdown flex flex-row items-center gap-s1" data-identifier="<?php echo $fields["identifier"]; ?>">
                  <a class="py-s2 body-3" href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
                  <?php if ($fields["menu_items"]) : ?>
                    <svg class="dropdown-arrow" width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.4502 0.825684L6.76582 6.14131L12.0814 0.825684" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="flex flex-row items-center ms-auto">
            <button onclick="setMobileMenuOpened()" class="block lg:hidden">
              <svg class="fill-white stroke-white stroke-0 hamburger" width="35" height="20" viewBox="0 0 35 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.4749 3.93832H15.3016H19.1283H22.9551H26.779H30.6057V0H26.779H22.9551H19.1283H15.3016H11.4749H7.65095H3.82422V3.93832H7.65095H11.4749Z" />
                <path d="M30.6082 7.87109H26.7815H22.9576H19.1308H15.3041H11.4774H7.65347H3.82673H0V11.8094H3.82673H7.65347H11.4774H15.3041H19.1308H22.9576H26.7815H30.6082H34.4349V7.87109H30.6082Z" />
                <path d="M22.9551 15.7412H19.1283H15.3016H11.4749H7.65095H3.82422V19.6766H7.65095H11.4749H15.3016H19.1283H22.9551H26.779H30.6057V15.7412H26.779H22.9551Z" />
              </svg>
              <svg class="fill-neutral-sgray stroke-cta-dark stroke-0 hamburger" width="35" height="20" viewBox="0 0 35 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.4749 3.93832H15.3016H19.1283H22.9551H26.779H30.6057V0H26.779H22.9551H19.1283H15.3016H11.4749H7.65095H3.82422V3.93832H7.65095H11.4749Z" />
                <path d="M30.6082 7.87109H26.7815H22.9576H19.1308H15.3041H11.4774H7.65347H3.82673H0V11.8094H3.82673H7.65347H11.4774H15.3041H19.1308H22.9576H26.7815H30.6082H34.4349V7.87109H30.6082Z" />
                <path d="M22.9551 15.7412H19.1283H15.3016H11.4749H7.65095H3.82422V19.6766H7.65095H11.4749H15.3016H19.1283H22.9551H26.779H30.6057V15.7412H26.779H22.9551Z" />
              </svg>
            </button>
            <a href="/get-started/" class="hidden lg:block my-s2 btn btn-primary">
              Get Started
            </a>
          </div>
        </div>  
      </div>
    </div>
    <?php foreach ($primary_menu_items as $menu_item) : ?>
      <?php $post_id = get_post_meta($menu_item->ID, '_menu_item_object_id', true ); ?>
      <?php
        $fields = get_fields($menu_item); 
      ?>
        <section class="fixed w-full bg-white shadow-md pb-s8 pt-s6 mm" style="display: none;" data-identifier="<?php echo $fields["identifier"]; ?>">
          <div class="container mx-auto px-s2">
            <ul class="dropdown-menu grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 items-center justify-start mx-auto">
              <?php foreach ($fields["menu_items"] as $menu_subitem) : ?>
                <li>
                  <a class="grid grid-cols-[auto_auto] gap-s2 max-w-[300px] p-s2 border-2 border-transparent hover:border-neutral-200 rounded-xl" href="<?php echo $menu_subitem["link"]; ?>">
                    <div class="p-s1 w-4 h-4 box-content rounded-md bg-secondary-glaciar col-start-1 col-end-2">
                      <img class="h-s2 w-s2 aspect-square <?php echo $menu_subitem["menu_class"]; ?>" src="<?php echo $menu_subitem['icon'] ?? (get_template_directory_uri() . '/images/icons/platform.svg') ?>" alt="platform icon" class="w-32 h-auto">
                    </div>
                    <div class="flex flex-col gap-s1">
                      <span class="body-3 !font-medium text-neutral-dgray"><?php echo $menu_subitem["title"]; ?></span>
                      <p class="body-4 text-neutral-sgray">
                        <span><?php echo $menu_subitem["description"]; ?></span>
                      </p>
                    </div>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </section>
    <?php endforeach; ?>
  </header> 
  <section id="mobile-menu" style="display: none;" class="section fixed bg-white lg:!hidden top-0 left-0 w-screen h-screen z-[999] pb-s4">
    <div class="container mx-auto w-full flex-col items-center justify-between h-full flex pt-s6">
      <ul class="w-full flex flex-col items-start gap-s5 md:gap-s2 body-1 px-s2">
        <?php foreach ($primary_menu_items as $menu_item) : ?>
          <?php $post_id = get_post_meta($menu_item->ID, '_menu_item_object_id', true ); ?>
          <?php
            $fields = get_fields($menu_item); 
          ?>
          <li class="menu-item-mobile menu-item-dropdown-mobile flex flex-col items-start gap-s1 w-full group" data-identifier="<?php echo $fields["identifier"]; ?>">
            <div class="flex flex-row items-center justify-between w-full group">
              <a class="md:py-s2 heading-2" href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a>
              <?php if ($fields["menu_items"]) : ?>
                <svg class="dropdown-arrow stroke-neutral-sgray" width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1.4502 0.825684L6.76582 6.14131L12.0814 0.825684" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              <?php endif; ?>
            </div>
            <section class="w-full bg-white hidden" data-identifier="<?php echo $fields["identifier"]; ?>">
              <div class="container mx-auto">
                <ul class="dropdown-menu grid grid-cols-1 lg:grid-cols-3 gap-s1 items-center justify-start mx-auto">
                  <?php foreach ($fields["menu_items"] as $menu_subitem) : ?>
                    <li>
		    <a class="grid grid-cols-[2rem_auto] gap-s2" href="<?php echo $menu_subitem["link"]; ?>">
                        <div class="p-s1 w-4 h-4 box-content rounded-md bg-secondary-glaciar col-start-1 col-end-2">
                          <img class="h-s2 w-s2 aspect-square bg-secondary-glaciar" src="<?php echo get_template_directory_uri(); ?>/images/icons/platform.svg" alt="platform icon" class="w-32 h-auto">
                        </div>
                        <div class="flex flex-col gap-s1">
                          <span class="heading-3 !font-medium text-neutral-dgray"><?php echo $menu_subitem["title"]; ?></span>
                          <p class="body-2 text-neutral-sgray">
                            <span><?php echo $menu_subitem["description"]; ?></span>
                          </p>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </section>
          </li>
        <?php endforeach; ?>
  	<hr class="w-full bg-gray-medium"/>
        <?php foreach ($secondary_menu_items as $menu_item) : ?>
          <li class="menu-item-mobile menu-item-dropdown-mobile flex flex-col items-start gap-s1 w-full group" data-identifier="<?php echo $fields["identifier"]; ?>">
            <div class="flex flex-row items-center justify-between w-full group">
              <a class="md:py-s2 heading-5 text-neutral-sgray" href="<?php echo $menu_item->url; ?>" target="<?php echo $menu_item->title == "LinkedIn" ? "_blank" : ""; ?>"><?php echo $menu_item->title; ?></a>
	    </div>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="flex flex-col items-center justify-between w-full">
        <a href="/get-started/" class="btn btn-primary w-full">
          Get Started
        </a>
      </div>
    </div>
  </section>

  <script>
    let lastScrollPosition = 0;
  let mobileOpened = false;
    function setMobileMenuOpened() {
      const mobileMenu = document.querySelector('#mobile-menu');
      const opened = mobileMenu.style.display === 'none';
      mobileOpened = !mobileOpened
      if (opened) {
        mobileMenu.style.display = 'block';
      } else {
        mobileMenu.style.display = 'none';
      }
    }

    function setMegaMenuOpened(opened, id) {
      const page = document.querySelector('#page > header');
      if (opened) {
        page.classList.add('mm-opened');
        page.dataset.mm_opened = id;
      } else {
        page.classList.remove('mm-opened');
        page.dataset.mm_opened = '';
      }

      reloadMegaMenu(id);
    }

    function reloadMegaMenu(id) {
      const page = document.querySelector('#page > header');

      if (!page.dataset.mm_opened) {
        document.querySelectorAll('.mm').forEach(function(mm) {
          mm.style.display = 'none';
        });
        return;
      }

      const mm = document.querySelector('.mm[data-identifier="' + page.dataset.mm_opened + '"]');
      console.log(mm, page.dataset);

      if (page.classList.contains('mm-opened')) {
        mm.style.display = 'block';
      } else {
        mm.style.display = 'none';
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      const page = document.querySelector('#page > header');
      page.dataset.mm_opened = '';
      page.classList.remove('mm-opened');
      reloadMegaMenu();
      let navigationItems = document.querySelectorAll('.menu-item-dropdown');
      navigationItems.forEach(function(item) {
        item.addEventListener('mouseenter', function(event) {
	  setMegaMenuOpened(false, null);
  	  page.querySelectorAll('.menu-item-dropdown').forEach(function(item) {
  	  	item.querySelector(".dropdown-arrow")?.classList.remove('rotate-180');
  	  });
          setMegaMenuOpened(true, event.target.dataset.identifier);  
          event.target.querySelector(".dropdown-arrow")?.classList.add('rotate-180');
        });
      });

      page.addEventListener('mouseleave', function(event) {
        setMegaMenuOpened(false, null);
	event.target.querySelectorAll('.menu-item-dropdown').forEach(function(item) {
	  item.querySelector(".dropdown-arrow")?.classList.remove('rotate-180');
	});
      });
    });

  // place bottom margin to the body to avoid the content to be hidden by the fixed header
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector("main#primary > *").style.paddingTop = document.querySelector('header#navigation').offsetHeight + 'px';
    document.querySelector('#mobile-menu').style.paddingTop = document.querySelector('header').offsetHeight + 'px';
  });

  // Also add a listener to the resize event to update the margin top
  window.addEventListener('resize', function() {
    document.querySelector("main#primary > *").style.paddingTop = document.querySelector('header#navigation').offsetHeight + 'px';
    document.querySelector('#mobile-menu').style.paddingTop = document.querySelector('header').offsetHeight + 'px';
  });

  function modifyNavigationColor() {
    let firstSection = document.querySelector('.translucent-navigation');
    let isLight = firstSection?.classList.contains('light') || false;
    let tint = !isLight ? 'neutral-sgray' : 'white';
    const header = document.querySelectorAll('header#navigation > .content');
    const lightLogo = document.querySelector('svg.logo.fill-white');
    const darkLogo = document.querySelector('svg.logo.fill-cta-dark');
    const menuLightLogo = document.querySelector('svg.hamburger.fill-white');
    const menuDarkLogo = document.querySelector('svg.hamburger.fill-neutral-sgray');
    const displayMode = window.scrollY > 0 && lastScrollPosition < window.scrollY && !mobileOpened ? 'hidden' : 'shown';

    if (!firstSection) {
      darkLogo.style.display = 'block';
      lightLogo.style.display = 'none';
      menuLightLogo.style.display = 'none';
      menuDarkLogo.style.display = 'block';
      header.forEach(function(h) {
	if (displayMode == 'hidden') {
		h.style = "transform: translateY(-200%);";
	} else {
		h.style = "transform: translateY(0%);";
	}
        h.classList.add('bg-white');
        h.classList.remove('bg-opacity-0');
        h.classList.remove('[&>*]:!text-white');
        h.classList.add('text-' + tint);
        h.classList.add('[&>*]:stroke-' + tint);
        h.classList.add('[&>*]:fill-' + tint);
        h.classList.remove('[&>*]:stroke-white');
      });
      lastScrollPosition = window.scrollY;
      return;
    }

    if (window.scrollY > 0) {
      darkLogo.style.display = 'block';
      lightLogo.style.display = 'none';
      menuDarkLogo.style.display = 'block';
      menuLightLogo.style.display = 'none';
      header.forEach(function(h) {
	if (displayMode == 'hidden') {
		h.style = "transform: translateY(-200%);";
	} else {
		h.style = "transform: translateY(0%);";
	}
        h.classList.add('bg-white');
        h.classList.remove('bg-opacity-0');
        h.classList.remove('[&>*]:!text-' + tint);
        h.classList.add('text-neutral-sgray');
        h.classList.add('[&>*]:stroke-neutral-sgray');
        h.classList.add('[&>*]:fill-neutral-sgray');
        h.classList.remove('[&>*]:stroke-' + tint);
      });
    } else {
      darkLogo.style.display = isLight ? 'none' : 'block';
      lightLogo.style.display = isLight ? 'block' : 'none';
      menuDarkLogo.style.display = isLight ? 'none' : 'block';
      menuLightLogo.style.display = isLight ? 'block' : 'none';
      header.forEach(function(h) {
	if (displayMode == 'hidden') {
		h.style = "transform: translateY(-200%);";
	} else {
		h.style = "transform: translateY(0%);";
	}
        h.classList.remove('bg-white');
        h.classList.remove('bg-' + tint)
        h.classList.add('bg-opacity-0');
        h.classList.add('[&>*]:!text-' + tint);
        h.classList.remove('text-' + tint);
        h.classList.remove('[&>*]:stroke-white');
        h.classList.remove('[&>*]:fill-white');
        h.classList.add('[&>*]:stroke-' + tint);
      });
    }

    lastScrollPosition = window.scrollY
	}

  // turn white the header when the user scrolls
  window.addEventListener('scroll', function() {
    modifyNavigationColor()
  });

  window.addEventListener('DOMContentLoaded', function(){
    modifyNavigationColor()
  });

  // open close mobile dropdowns
  document.addEventListener('DOMContentLoaded', function() {
    let navigationItems = document.querySelectorAll('.menu-item-dropdown-mobile');

    navigationItems.forEach(function(item) {
      item.addEventListener('click', function(event) {
        const opened = item.classList.contains('opened');
        navigationItems.forEach(function(item) {
          let dropdownArrow = item.querySelector('.dropdown-arrow');
          if (dropdownArrow) {
            dropdownArrow.classList.remove('rotate-180');
          }
          item.classList.remove('opened');
	  if (item.querySelector('section')) {
		  item.querySelector('section').style.display = 'none';
	  }
        });
        if (opened) {
          let dropdownArrow = item.querySelector('.dropdown-arrow');
          if (dropdownArrow) {
            dropdownArrow.classList.remove('rotate-180');
          }
          item.classList.remove('opened');
	  if (item.querySelector('section')) {
		  item.querySelector('section').style.display = 'none';
	  }
        } else {
          let dropdownArrow = item.querySelector('.dropdown-arrow');
          if (dropdownArrow) {
            dropdownArrow.classList.add('rotate-180');
          }
          item.classList.add('opened');
	  if (item.querySelector('section')) {
		  item.querySelector('section').style.display = 'block';
	  }
        }
      });
    });
  });
  </script>
