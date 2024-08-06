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

<body <?php body_class(is_user_logged_in() ? '[&>#wpadminbar]:hidden !mb-0' : '!mb-0'); ?>>
<?php wp_body_open(); ?>
<?php 
  // switch url path
  $url_path = $_SERVER['REQUEST_URI'];
  $url_path = explode('/', $url_path);
  $url_path = $url_path[1];
  $primary_menu_items = wp_get_nav_menu_items('Primary');
?>
<div id="page" class="site relative [&>.opened]:fixed [&>.opened]:h-screen [&>.opened>section.mobile-menu]:block">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'accumulus-website' ); ?></a>
  <header id="navigation" class="fixed w-full z-[999999] text-neutral-sgray">
    <div class="hidden lg:block section bg-white border-b border-b-neutral-200">
      <div class="container mx-auto px-s2 py-s2">
        <div class="flex flex-row items-center justify-end">
          <ul class="flex flex-row items-center justify-end gap-s2 text-sm heading-5">
            <li><a class="hover:underline" href="">Regulator Forum</a></li>
            <li><a class="hover:underline" href="">Contact Us</a></li>
            <li><a class="hover:underline" href="">Careers</a></li>
            <li><a class="hover:underline" href="">LinkedIn</a></li>
          </ul>
        </div> 
      </div>
    </div>
    <div class="section bg-white shadow-md">
      <div class="container mx-auto px-s2">
        <div class="flex flex-row items-center">
          <div class="flex flex-row items-center me-auto">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="py-s2 flex flex-row items-center">
              <img class="h-s8" src="<?php echo get_template_directory_uri(); ?>/images/logo-navigation-light.svg" alt="Accumulus" class="w-32 h-auto">
            </a>
          </div>
          <div class="flex-row items-center hidden lg:flex text-cta-dark">
            <ul class="flex flex-row items-center gap-s4">
              <?php foreach ($primary_menu_items as $menu_item) : ?>
                <?php $post_id = get_post_meta($menu_item->ID, '_menu_item_object_id', true ); ?>
                <?php
                  $fields = get_fields($menu_item); 
                ?>
                <li class="menu-item menu-item-dropdown flex flex-row items-center gap-s1" data-identifier="<?php echo $fields["identifier"]; ?>">
                  <a class="py-s2" href="#"><?php echo $menu_item->title; ?></a>
                  <?php if ($fields["menu_items"]) : ?>
                    <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.4502 0.825684L6.76582 6.14131L12.0814 0.825684" stroke="#202020" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="flex flex-row items-center ms-auto">
            <button onclick="setMobileMenuOpened()" class="block lg:hidden">
              <svg width="35" height="20" viewBox="0 0 35 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.4749 3.93832H15.3016H19.1283H22.9551H26.779H30.6057V0H26.779H22.9551H19.1283H15.3016H11.4749H7.65095H3.82422V3.93832H7.65095H11.4749Z" fill="#444444"/>
                <path d="M30.6082 7.87109H26.7815H22.9576H19.1308H15.3041H11.4774H7.65347H3.82673H0V11.8094H3.82673H7.65347H11.4774H15.3041H19.1308H22.9576H26.7815H30.6082H34.4349V7.87109H30.6082Z" fill="#444444"/>
                <path d="M22.9551 15.7412H19.1283H15.3016H11.4749H7.65095H3.82422V19.6766H7.65095H11.4749H15.3016H19.1283H22.9551H26.779H30.6057V15.7412H26.779H22.9551Z" fill="#444444"/>
              </svg>
            </button>
            <button class="hidden lg:block my-s2 btn btn-primary">
              Get Started
            </button>
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
                  <a class="grid grid-cols-[auto_auto] gap-s2 max-w-[300px] p-s2 border-2 border-transparent hover:border-neutral-200 rounded-xl" href="#">
                    <div class="p-s1 w-4 h-4 box-content rounded-md bg-secondary-glaciar col-start-1 col-end-2">
                      <img class="h-s2 w-s2 aspect-square bg-secondary-glaciar" src="<?php echo get_template_directory_uri(); ?>/images/icons/platform.svg" alt="platform icon" class="w-32 h-auto">
                    </div>
                    <div class="flex flex-col gap-s1">
                      <span class="body-3 text-neutral-dgray"><b><?php echo $menu_subitem["title"]; ?></b></span>
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
      <ul class="w-full flex flex-col items-start gap-s1 md:gap-s2 body-1 px-s2">
        <?php foreach ($primary_menu_items as $menu_item) : ?>
          <?php $post_id = get_post_meta($menu_item->ID, '_menu_item_object_id', true ); ?>
          <?php
            $fields = get_fields($menu_item); 
          ?>
          <li class="menu-item-mobile menu-item-dropdown-mobile flex flex-col items-start gap-s1 w-full group" data-identifier="<?php echo $fields["identifier"]; ?>">
            <div class="flex flex-row items-center justify-between w-full peer">
              <a class="py-s2" href="#"><?php echo $menu_item->title; ?></a>
              <?php if ($fields["menu_items"]) : ?>
                <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1.4502 0.825684L6.76582 6.14131L12.0814 0.825684" stroke="#202020" stroke-width="1.18" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              <?php endif; ?>
            </div>
            <section class="w-full bg-white peer-hover:block hover:block hidden" data-identifier="<?php echo $fields["identifier"]; ?>">
              <div class="container mx-auto">
                <ul class="dropdown-menu grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 items-center justify-start mx-auto">
                  <?php foreach ($fields["menu_items"] as $menu_subitem) : ?>
                    <li>
                      <a class="grid grid-cols-[auto_auto] gap-s2 max-w-[300px]" href="#">
                        <div class="p-s1 w-4 h-4 box-content rounded-md bg-secondary-glaciar col-start-1 col-end-2">
                          <img class="h-s2 w-s2 aspect-square bg-secondary-glaciar" src="<?php echo get_template_directory_uri(); ?>/images/icons/platform.svg" alt="platform icon" class="w-32 h-auto">
                        </div>
                        <div class="flex flex-col gap-s1">
                          <span class="body-3 text-neutral-dgray"><b><?php echo $menu_subitem["title"]; ?></b></span>
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
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="flex flex-col items-center justify-between w-full">
        <div class="btn btn-primary w-full">
          Get Started
        </div>
      </div>
    </div>
  </section>

  <script>
    function setMobileMenuOpened() {
      const mobileMenu = document.querySelector('#mobile-menu');
      const opened = mobileMenu.style.display === 'none';
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
          setMegaMenuOpened(true, event.target.dataset.identifier);
        });
      });

      page.addEventListener('mouseleave', function(event) {
        setMegaMenuOpened(false, null);
      });
    });

    // place bottom margin to the body to avoid the content to be hidden by the fixed header
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelector("main#primary").style.paddingTop = document.querySelector('header#navigation').offsetHeight + 'px';
      document.querySelector('#mobile-menu').style.paddingTop = document.querySelector('header').offsetHeight + 'px';
    });

    // Also add a listener to the resize event to update the margin top
    window.addEventListener('resize', function() {
      document.querySelector("main#primary").style.paddingTop = document.querySelector('header#navigation').offsetHeight + 'px';
      document.querySelector('#mobile-menu').style.paddingTop = document.querySelector('header').offsetHeight + 'px';
    });
  </script>
