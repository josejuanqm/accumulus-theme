<?php
/**
* accumulus-website functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package accumulus-website
*/

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function accumulus_website_setup() {
	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on accumulus-website, use a find and replace
	* to change 'accumulus-website' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'accumulus-website', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
	array(
		'menu-1' => esc_html__( 'Primary', 'accumulus-website' ),
		)
	);
		
	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			)
	);
			
	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'accumulus_website_custom_background_args',
		array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)
		)
	);
					
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	* Add support for core custom logo.
	*
	* @link https://codex.wordpress.org/Theme_Logo
	*/
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			)
		);
}
add_action( 'after_setup_theme', 'accumulus_website_setup' );

/**
* Set the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*/
function accumulus_website_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'accumulus_website_content_width', 640 );
}
add_action( 'after_setup_theme', 'accumulus_website_content_width', 0 );

/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function accumulus_website_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'accumulus-website' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'accumulus-website' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			)
		);
}
add_action( 'widgets_init', 'accumulus_website_widgets_init' );

/**
* Enqueue scripts and styles.
*/
function accumulus_website_scripts() {
	wp_enqueue_style( 'accumulus-website-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'accumulus-website-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'accumulus-website-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'accumulus_website_scripts' );

// JQuery
function accumulus_website_scripts_jquery() {
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'accumulus_website_scripts_jquery' );

// Slick slider
function accumulus_website_scripts_slick() {
	wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'accumulus_website_scripts_slick' );

// Code Accumulus
function accumulus_website_scripts_code_accumulus() {
	wp_enqueue_script( 'code-accumulus', get_template_directory_uri() . '/js/code-accumulus.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'accumulus_website_scripts_code_accumulus' );

/**
* Enqueue scripts and styles.
*/
function cg_your_theme_scripts() {
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick.css', array() );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array() );
	wp_enqueue_style( 'output', get_template_directory_uri() . '/css/accumulus.css', array() );
}
add_action( 'wp_enqueue_scripts', 'cg_your_theme_scripts' );

/**
* Implement the Custom Header feature.
*/
require get_template_directory() . '/inc/custom-header.php';

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Functions which enhance the theme by hooking into WordPress.
*/
require get_template_directory() . '/inc/template-functions.php';

/**
* Customizer additions.
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Load Jetpack compatibility file.
*/
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

// enable svg upload
function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );

/**
* 
* GET RESOURCES CMS
* 
*/


add_action('wp_ajax_nopriv_get_resources', 'getResources');
add_action('wp_ajax_get_resources', 'getResources');
function getResources() {
    $page = $_REQUEST["page"];
    $per_page = (int)$page === 1 ? 8 : 9;
    $category = (int)$_REQUEST["c"];
    $taxonomy = $_REQUEST["t"];
    $offset = ($page - 1) * $per_page;

	$args = array(
		'post_type' => 'resource-cms',
		'post_status' => 'publish',
        'offset' => $offset,
		'posts_per_page' => $per_page,
		'order' => 'DESC',
	);

	if($category != 0) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => $taxonomy, //resources-taxonomies
				'terms' => $category,
				'include_children' => false // Remove if you need posts from term 7 child terms
			)
		);
	}


	// var_dump($args);
	$posts = new WP_Query($args);
	// var_dump($posts);
	$pages = $posts->max_num_pages;
	$page = $offset+1;
	$posts = $posts->posts;
    $more_pages_available = (int)$_REQUEST["page"] < $pages;

	// var_dump($posts);


	$s = $_REQUEST["s"];
	$offset = $_REQUEST["page"]-1;

	$html = "";
	$paginador = "";

    if ($page == 1) {
        $destacados = array_slice($posts, 0, 1, true);
        $restantes = array_slice($posts, 1);
    } else {
        $destacados = [];
        $restantes = $posts;
    }

	foreach($destacados as $key => $post){
		$category = '';
		$categorySlug = '';
		$post_type = get_post_type($post->ID);   
		$taxonomies = get_object_taxonomies($post_type);   
		$taxonomy_names = wp_get_object_terms($post->ID, $taxonomies,  array("fields" => "names")); 
		if(!empty($taxonomy_names)) :
			foreach($taxonomy_names as $tax_name) : 
				$category = $tax_name; 
				$categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
			endforeach;
		endif;

		if($key == 0){
			// Large post
			$html .= '
			<div class="card col-span-12 md:col-span-12 lg:col-span-8 relative lg:flex lg:items-stretch w-full rounded-card overflow-hidden ';
			$html .= '">

			<a href="'. get_permalink( $post->ID ). '" class="absolute top-0 left-0 w-full h-full z-10"></a>';

			if (has_post_thumbnail( $post->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			$html .= '<div class="relative w-full lg:w-1/2 flex items-center justify-center h-[275px] md:h-[500px] lg:h-full bg-events-general bg-cover bg-no-repeat bg-center aspect-square">';
			$html .= '<img src="'. $image[0] .'" class="block"  />';
			$html .= '</div>';

			endif;


			$html .= '<div class="flex flex-col lg:w-1/2 lg:justify-end p-7 gap-2 ';
			if ($categorySlug == 'thought-leadership'): 
				$html .= 'bg-secondary-green text-neutral-nwhite';
				elseif ($categorySlug == 'regulatory-insights'): 
				$html .= 'bg-primary-glaciar text-neutral-dgray';
				elseif ($categorySlug == 'e-books-white-papers'): 
				$html .= 'bg-neutral-offwhite text-neutral-dgray'; 
				else:
				$html .= 'bg-neutral-offwhite text-neutral-dgray'; 
				endif;
			$html .= '">';

			$html .= '<div class="flex items-center gap-3 uppercase">';
			// Show icons
			if ($categorySlug == 'thought-leadership'):
			$html.= '<svg width="15" height="14" viewBox="0 0 15 14" fill="none"">
			<path d="M13 3.38949V12.0558H11.5558V1.58477C11.5558 0.985348 11.0704 0.5 10.471 0.5H1.08476C0.485343 0.5 0 0.985348 0 1.58477V12.0558C0 12.8532 0.64677 13.5 1.4442 13.5H13C13.7974 13.5 14.4442 12.8532 14.4442 12.0558V3.38949H13ZM1.4442 12.0558V1.94421H10.1105V12.0547H1.4442V12.0558Z" class="fill-current"/>
			</svg>
			';
			elseif ($categorySlug == 'regulatory-insights'):
			$html.= '<svg width="13" height="14" viewBox="0 0 13 14" fill="none"">
			<path d="M12.4646 5.07567H0.000976562V2.68595L6.23279 0.5L12.4646 2.68595V5.07567ZM1.38151 3.78419H11.0841V3.58138L6.23279 1.87949L1.38151 3.58138V3.78419Z" fill="#444444"/>
			<path d="M2.76823 6.37402H1.3877V10.9105H2.76823V6.37402Z" class="fill-current" />
			<path d="M11.0807 6.37402H9.7002V10.9105H11.0807V6.37402Z" class="fill-current" />
			<path d="M8.31022 6.37402H6.92969V10.9105H8.31022V6.37402Z" class="fill-current" />
			<path d="M5.53971 6.37402H4.15918V10.9105H5.53971V6.37402Z" class="fill-current" />
			<path d="M12.4688 12.208H0V13.4995H12.4688V12.208Z" class="fill-current" />
			</svg>
			';
			elseif ($categorySlug == 'e-books-white-papers'): 
			$html.= '<svg width="11" height="14" viewBox="0 0 11 14" fill="none"">
			<path d="M8.66595 12.0564H1.44361V1.94468H2.88829V0.5H1.38604C0.62052 0.5 0 1.12052 0 1.88604V12.0169C0 12.8358 0.664231 13.5 1.48306 13.5H8.62864C9.44747 13.5 10.1117 12.8358 10.1117 12.0169V6.27766H8.66702V12.0553L8.66595 12.0564Z" class="fill-current"/>
			<path d="M9.85523 3.98634L6.37093 0.500977H4.32812H4.32919V6.27864H10.1068V4.23689L9.85523 3.98634ZM5.77281 4.83396V1.94566L7.23668 3.4106L8.6611 4.83396H5.77281Z" class="fill-current"/>
			</svg>
			';
			elseif($categorySlug == 'new-releases'):
			$html.= '<svg width="11" height="14" viewBox="0 0 11 14" fill="none"">
			<path d="M8.66335 13.5L8.66335 0.505463C9.46052 0.505463 10.1074 1.15237 10.1074 1.94954L10.1074 12.0559C10.1074 12.8531 9.46052 13.5 8.66335 13.5Z" class="fill-current" />
			<path d="M1.44434 10.6025H0.000261068L0.000261068 1.94875C0.000261068 1.15158 0.647164 0.504676 1.44434 0.504676L1.44434 10.6025Z" class="fill-current" />
			<path d="M0.000682831 13.5L8.66406 13.5V12.0453L0.000682831 12.0453V13.5Z" class="fill-current" />
			<path d="M1.4428 1.95508L8.66211 1.95508V0.500347L1.4428 0.500347V1.95508Z" class="fill-current" />
			<path d="M7.22081 9.15918H2.88965V10.6033H7.22081V9.15918Z" class="fill-current" />
			</svg>
			';
			elseif($categorySlug == 'media-coverage'):
			$html.= '<svg width="12" height="14" viewBox="0 0 12 14" fill="none"">
			<path d="M10.3078 0.5H1.47285C0.659191 0.5 0 1.15919 0 1.97285V9.33491C0 10.1486 0.659191 10.8078 1.47285 10.8078H5.29094L5.90118 11.418L6.94218 12.459L7.98318 13.5L9.02418 12.459L7.98318 11.418L6.94218 10.377L5.90118 9.336L5.8903 9.34688V9.336H1.47285V1.97285H10.3078V9.33491H8.83491V10.8078H10.3078C11.1214 10.8078 11.7806 10.1486 11.7806 9.33491V1.97285C11.7806 1.15919 11.1214 0.5 10.3078 0.5Z" class="fill-current" />
			<path d="M5.89003 4.91718H7.36179H8.83464V3.44434H7.36179H5.89003H4.41718H2.94434V4.91718H4.41718H5.89003Z" class="fill-current" />
			<path d="M2.94434 7.86238H4.41718H5.89003H7.36179H8.83464V6.39062H7.36179H5.89003H4.41718H2.94434V7.86238Z" class="fill-current" />
			</svg>';
			elseif($categorySlug == 'events'):
			$html.= '<svg width="15" height="13" viewBox="0 0 15 13" fill="none"">
			<path d="M4.87515 4.875H3.25V6.50015H4.87515V4.875Z" class="fill-current" />
			<path d="M4.87515 8.125H3.25V9.75015H4.87515V8.125Z" class="fill-current" />
			<path d="M8.12515 8.125H6.5V9.75015H8.12515V8.125Z" class="fill-current" />
			<path d="M11.3712 8.125H9.74609V9.75015H11.3712V8.125Z" class="fill-current" />
			<path d="M8.12515 4.875H6.5V6.50015H8.12515V4.875Z" class="fill-current" />
			<path d="M11.3712 4.875H9.74609V6.50015H11.3712V4.875Z" class="fill-current" />
			<path d="M12.9988 1.62515H11.3737V0H9.7485V1.62515H4.87425V0H3.2491V1.62515H1.62395C0.728019 1.62515 0 2.35197 0 3.2491V11.3737H1.62515V3.2503H12.9988V11.3748H3.2491V13H12.9988C13.8959 13 14.624 12.272 14.624 11.3748V3.2503C14.624 2.35317 13.8959 1.62515 12.9988 1.62515Z" class="fill-current" />
			</svg>';
			endif;
			// Show icons
			$html .= '<span class="heading-4">'. $category .'</span>';

			$html.= '</div>';
			$html.= '<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"> '.$post->post_title.'</h3>';
			$html.= '</div>';

			$html.= '</div>';
		}
	}
	// Show large post

	foreach ($restantes as $key => $post) {
		$category = '';
		$categorySlug = '';
		$post_type = get_post_type($post->ID);   
		$taxonomies = get_object_taxonomies($post_type);   
		$taxonomy_names = wp_get_object_terms($post->ID, $taxonomies,  array("fields" => "names")); 

		if(!empty($taxonomy_names)) :
			foreach($taxonomy_names as $tax_name) : 
				$category = $tax_name; 
				$categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
			endforeach;
		endif;

		$html .= '
		<div class="card col-span-12 md:col-span-6 lg:col-span-4 relative w-full rounded-card overflow-hidden ';
		$html .= '">

		<a href="'.get_permalink( $post->ID ).'" class="absolute top-0 left-0 w-full h-full z-10"></a>';

		if (has_post_thumbnail( $post->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			$html .= '<div class="relative w-full flex items-center justify-center h-[150px] md:h-[300px] lg:h-[320px] bg-events-general bg-cover bg-no-repeat bg-center aspect-square">';
			$html .= '<img src="'. $image[0] .'" class="block max-h-full"  />';
			$html .= '</div>';

		endif;


		$html .= '<div class="flex flex-col p-7 gap-2 ';
		if ($categorySlug == 'thought-leadership'): 
			$html .= 'bg-secondary-green text-neutral-nwhite';
			elseif ($categorySlug == 'regulatory-insights'): 
			$html .= 'bg-primary-glaciar text-neutral-dgray';
			elseif ($categorySlug == 'e-books-white-papers'): 
			$html .= 'bg-neutral-offwhite text-neutral-dgray'; 
			else:
			$html .= 'bg-neutral-offwhite text-neutral-dgray'; 
			endif;
			$html .= '">';
		$html .= '<div class="flex items-center gap-3 uppercase">';
			// Show icons
			if ($categorySlug == 'thought-leadership'):
			$html.= '<svg width="15" height="14" viewBox="0 0 15 14" fill="none"">
				<path d="M13.2812 2.95199V11.6183H11.837V1.14727C11.837 0.547848 11.3517 0.0625 10.7523 0.0625H1.36601C0.766593 0.0625 0.28125 0.547848 0.28125 1.14727V11.6183C0.28125 12.4157 0.92802 13.0625 1.72545 13.0625H13.2812C14.0787 13.0625 14.7255 12.4157 14.7255 11.6183V2.95199H13.2812ZM1.72545 11.6183V1.50671H10.3918V11.6172H1.72545V11.6183Z" class="fill-current"/>
				<path d="M8.94587 8.72754H3.16797V10.1717H8.94587V8.72754Z" class="fill-current"/>
				<path d="M8.94587 5.84082H3.16797V7.28503H8.94587V5.84082Z" class="fill-current"/>
				<path d="M8.94587 2.9502H3.16797V4.3944H8.94587V2.9502Z" class="fill-current"/>
				</svg>';
			elseif ($categorySlug == 'regulatory-insights'):
			$html.= '<svg width="13" height="14" viewBox="0 0 13 14" fill="none"">
			<path d="M12.4646 5.07567H0.000976562V2.68595L6.23279 0.5L12.4646 2.68595V5.07567ZM1.38151 3.78419H11.0841V3.58138L6.23279 1.87949L1.38151 3.58138V3.78419Z" fill="#444444"/>
			<path d="M2.76823 6.37402H1.3877V10.9105H2.76823V6.37402Z" class="fill-current" />
			<path d="M11.0807 6.37402H9.7002V10.9105H11.0807V6.37402Z" class="fill-current" />
			<path d="M8.31022 6.37402H6.92969V10.9105H8.31022V6.37402Z" class="fill-current" />
			<path d="M5.53971 6.37402H4.15918V10.9105H5.53971V6.37402Z" class="fill-current" />
			<path d="M12.4688 12.208H0V13.4995H12.4688V12.208Z" class="fill-current" />
			</svg>
			';
			elseif ($categorySlug == 'e-books-white-papers'): 
			$html.= '<svg width="11" height="14" viewBox="0 0 11 14" fill="none"">
			<path d="M8.66595 12.0564H1.44361V1.94468H2.88829V0.5H1.38604C0.62052 0.5 0 1.12052 0 1.88604V12.0169C0 12.8358 0.664231 13.5 1.48306 13.5H8.62864C9.44747 13.5 10.1117 12.8358 10.1117 12.0169V6.27766H8.66702V12.0553L8.66595 12.0564Z" class="fill-current"/>
			<path d="M9.85523 3.98634L6.37093 0.500977H4.32812H4.32919V6.27864H10.1068V4.23689L9.85523 3.98634ZM5.77281 4.83396V1.94566L7.23668 3.4106L8.6611 4.83396H5.77281Z" class="fill-current"/>
			</svg>
			';
			elseif($categorySlug == 'new-releases'):
			$html.= '<svg width="11" height="14" viewBox="0 0 11 14" fill="none"">
			<path d="M8.66335 13.5L8.66335 0.505463C9.46052 0.505463 10.1074 1.15237 10.1074 1.94954L10.1074 12.0559C10.1074 12.8531 9.46052 13.5 8.66335 13.5Z" class="fill-current" />
			<path d="M1.44434 10.6025H0.000261068L0.000261068 1.94875C0.000261068 1.15158 0.647164 0.504676 1.44434 0.504676L1.44434 10.6025Z" class="fill-current" />
			<path d="M0.000682831 13.5L8.66406 13.5V12.0453L0.000682831 12.0453V13.5Z" class="fill-current" />
			<path d="M1.4428 1.95508L8.66211 1.95508V0.500347L1.4428 0.500347V1.95508Z" class="fill-current" />
			<path d="M7.22081 9.15918H2.88965V10.6033H7.22081V9.15918Z" class="fill-current" />
			</svg>
			';
			elseif($categorySlug == 'media-coverage'):
			$html.= '<svg width="12" height="14" viewBox="0 0 12 14" fill="none"">
			<path d="M10.3078 0.5H1.47285C0.659191 0.5 0 1.15919 0 1.97285V9.33491C0 10.1486 0.659191 10.8078 1.47285 10.8078H5.29094L5.90118 11.418L6.94218 12.459L7.98318 13.5L9.02418 12.459L7.98318 11.418L6.94218 10.377L5.90118 9.336L5.8903 9.34688V9.336H1.47285V1.97285H10.3078V9.33491H8.83491V10.8078H10.3078C11.1214 10.8078 11.7806 10.1486 11.7806 9.33491V1.97285C11.7806 1.15919 11.1214 0.5 10.3078 0.5Z" class="fill-current" />
			<path d="M5.89003 4.91718H7.36179H8.83464V3.44434H7.36179H5.89003H4.41718H2.94434V4.91718H4.41718H5.89003Z" class="fill-current" />
			<path d="M2.94434 7.86238H4.41718H5.89003H7.36179H8.83464V6.39062H7.36179H5.89003H4.41718H2.94434V7.86238Z" class="fill-current" />
			</svg>';
			elseif($categorySlug == 'events'):
			$html.= '<svg width="15" height="13" viewBox="0 0 15 13" fill="none"">
			<path d="M4.87515 4.875H3.25V6.50015H4.87515V4.875Z" class="fill-current" />
			<path d="M4.87515 8.125H3.25V9.75015H4.87515V8.125Z" class="fill-current" />
			<path d="M8.12515 8.125H6.5V9.75015H8.12515V8.125Z" class="fill-current" />
			<path d="M11.3712 8.125H9.74609V9.75015H11.3712V8.125Z" class="fill-current" />
			<path d="M8.12515 4.875H6.5V6.50015H8.12515V4.875Z" class="fill-current" />
			<path d="M11.3712 4.875H9.74609V6.50015H11.3712V4.875Z" class="fill-current" />
			<path d="M12.9988 1.62515H11.3737V0H9.7485V1.62515H4.87425V0H3.2491V1.62515H1.62395C0.728019 1.62515 0 2.35197 0 3.2491V11.3737H1.62515V3.2503H12.9988V11.3748H3.2491V13H12.9988C13.8959 13 14.624 12.272 14.624 11.3748V3.2503C14.624 2.35317 13.8959 1.62515 12.9988 1.62515Z" class="fill-current" />
			</svg>';
			endif;
			// Show icons
		$html .= '<span class="heading-4">'. $category .'</span>';

		$html.= '</div>';
		$html.= '<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"> '.$post->post_title.'</h3>';
		$html.= '</div>';

		$html.= '</div>';
	}
	// Show others posts

	if($pages > 1){
		if($page == 1):
			// $paginador .= '<li class="pagination-previous disabled"><span class="icon-Arrow"></span></li>';
			$paginador .= '<li class="pagination__previous disabled"><a href="javascript: void(0)"><span class="icon-chevron-back"></span></a></li>';
		else:
			// $paginador .= '<li class="pagination-previous"><a href="javascript: void(0)" class="btn-reclamos" data-num="'.($page-1).'" aria-label="Anterior"><span class="icon-Arrow"></span></a></li>';
			$paginador .= '<li class="pagination__previous"><a href="javascript: void(0)" class="btn-reclamos" data-num="'.($page-1).'"><span class="icon-chevron-back"></span></a></li>';
		endif;
		
		for ($i=0; $i < $pages ; $i++):
			$current_page = $i+1;
			if($page == $current_page):
				$class = "";
				if($page == $current_page)
				$class = 'class="pagination__active"';
				
				// $paginador .= '<li '.$class.'>'.$current_page.'</li>';
				$paginador .= '<li '.$class.'><a href="javascript: void(0)">'.$current_page.'</a></li>';
			else:
				// $paginador .= '<li><a href="javascript:void(0)" class="btn-reclamos" data-num="'.$current_page.'"  aria-label="Page '.$current_page.'">'.$current_page.'</a></li>';
				$paginador .= '<li><a href="javascript: void(0)"  class="btn-reclamos" data-num="'.$current_page.'">'.$current_page.'</a></li>';
			endif;
		endfor;
		
		if($page == $pages):
			// $paginador .= '<li class="pagination-next disabled"><span class="icon-Arrow"></span></li>';
			$paginador .= '<li class="pagination__next disabled"><a href="javascript: void(0)"><span class="icon-chevron-forward"></span></a></li>';
		else:
			// $paginador .= '<li class="pagination-next"><a href="javascript: void(0)" class="btn-reclamos" data-num="'.($page+1).'" aria-label="Siguiente"><span class="icon-Arrow"></span></a></li>';
			$paginador .= '<li class="pagination__next"><a href="javascript: void(0)" class="btn-reclamos" data-num="'.($page+1).'"><span class="icon-chevron-forward"></span></a></li>';
		endif;
	}

	$html = trim(preg_replace('/\s\s+/', ' ', $html));

	wp_send_json(array(
		"html" => $html,
		"paginador" => $paginador,
        "morePagesAvailable" => $more_pages_available,
        "pages" => $pages
	));
}																		
																		
																		
																		
/**
* 
* GET NEWS CMS
* 
*/
																		
																		
																		
add_action('wp_ajax_nopriv_get_news', 'getNews');
add_action('wp_ajax_get_news', 'getNews');
function getNews() {
    $page = $_REQUEST["page"];
    $per_page = (int)$page === 1 ? 8 : 9;
    $category = (int)$_REQUEST["c"];
    $taxonomy = $_REQUEST["t"];
    $offset = ($page - 1) * $per_page;
//	$category = (int)$_REQUEST["c"];
//	$offset = $_REQUEST["page"]-1;

    $args = array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $per_page,
        'order' => 'DESC',
    );

    if ($category != 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $taxonomy, //news-categories
                'terms' => $category,
                'include_children' => false
            )
        );
    }

	// var_dump($args);
    $posts_query = new WP_Query($args);
    $pages = $posts_query->max_num_pages;
    $posts = $posts_query->posts;
    $more_pages_available = (int)$_REQUEST["page"] < $pages;
	// var_dump($posts);


	$s = $_REQUEST["s"];
	$offset = $_REQUEST["page"]-1;

	$html = "";
	$paginador = "";

    if ($page == 1) {
        $destacados = array_slice($posts, 0, 1, true);
        $restantes = array_slice($posts, 1);
    } else {
        $destacados = [];
        $restantes = $posts;
    }

	foreach($destacados as $key => $post){
		$category = '';
		$categorySlug = '';
		$post_type = get_post_type($post->ID);   
		$taxonomies = get_object_taxonomies($post_type);   
		$taxonomy_names = wp_get_object_terms($post->ID, $taxonomies,  array("fields" => "names")); 

		if(!empty($taxonomy_names)) :
			foreach($taxonomy_names as $tax_name) : 
				$category = $tax_name; 
				$categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
			endforeach;
		endif;

		$url_new_realice = get_field('url_new_realice', $post->ID);

		if($key == 0){
			// Large post
			$html .= '
			<div class="card col-span-12 md:col-span-12 lg:col-span-8 relative lg:flex lg:items-stretch w-full rounded-card overflow-hidden ';
			$html .= '">';

			if ($categorySlug == 'media-coverage'):
				$html .= '<a href="'. $url_new_realice .'" target="_blank" class="absolute top-0 left-0 w-full h-full z-10"></a>';
			elseif ($categorySlug == 'new-releases'):
				$html .= '<a href="'.get_permalink( $post->ID ).'" class="absolute top-0 left-0 w-full h-full z-10"></a>';
			endif;

			if (has_post_thumbnail( $post->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			$html .= '<div class="relative w-full lg:w-1/2 flex items-center justify-center h-[275px] md:h-[500px] lg:h-full bg-events-general bg-cover bg-no-repeat bg-center aspect-square">';
			$html .= '<img src="'. $image[0] .'" class="block w-full h-[275px] md:h-[500px] lg:h-full object-cover"   />';
			$html .= '</div>';

			endif;


			$html .= '<div class="flex flex-col lg:w-1/2 lg:justify-end p-7 gap-2 ';
			if ($categorySlug == 'media-coverage'): 
				$html .= 'bg-secondary-carbon text-neutral-nwhite';
				elseif ($categorySlug == 'new-releases'): 
				$html .= 'bg-secondary-aqua text-neutral-dgray';
				endif;
			$html .= '">';

			$html .= '<div class="flex items-center gap-3 uppercase">';

			if ($categorySlug == 'media-coverage'):
			$html.= '<svg width="11" height="13" viewBox="0 0 11 13" fill="none">
			<path d="M8.88997 10.7377H2.22319V1.40386H3.55674V0.0703125H2.17005C1.46341 0.0703125 0.890625 0.6431 0.890625 1.34974V10.7013C0.890625 11.4572 1.50376 12.0703 2.2596 12.0703H8.85552C9.61137 12.0703 10.2245 11.4572 10.2245 10.7013V5.40354H8.89095V10.7368L8.88997 10.7377Z" class="fill-current"/>
			<path d="M9.98744 3.28757L6.77117 0.0703125H4.8855H4.88648V5.40354H10.2197V3.51885L9.98744 3.28757ZM6.21905 4.06998V1.40386L7.57031 2.75612L8.88517 4.06998H6.21905Z" class="fill-current"/>
			</svg>';
			elseif ($categorySlug == 'new-releases'):
			$html.= '<svg width="15" height="13" viewBox="0 0 15 13" fill="none">
			<path d="M12.8906 2.83909V10.8388H11.5575V1.1732C11.5575 0.619888 11.1095 0.171875 10.5562 0.171875H1.89195C1.33863 0.171875 0.890625 0.619888 0.890625 1.1732V10.8388C0.890625 11.5749 1.48764 12.1719 2.22374 12.1719H12.8906C13.6267 12.1719 14.2237 11.5749 14.2237 10.8388V2.83909H12.8906ZM2.22374 10.8388V1.50499H10.2234V10.8378H2.22374V10.8388Z" class="fill-current"/>
			</svg>';
			endif;
			$html .= '<span class="heading-4">'. $category .'</span>';

			$html.= '</div>';
			$html.= '<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"> '.$post->post_title.'</h3>';
			$html.= '</div>';

			$html.= '</div>';
		}
	}

	foreach ($restantes as $key => $post) {
		$category = '';
		$categorySlug = '';
		$post_type = get_post_type($post->ID);   
		$taxonomies = get_object_taxonomies($post_type);   
		$taxonomy_names = wp_get_object_terms($post->ID, $taxonomies,  array("fields" => "names")); 

		if(!empty($taxonomy_names)) :
			foreach($taxonomy_names as $tax_name) : 
				$category = $tax_name; 
				$categorySlug = str_replace(' ', '-', strtolower($tax_name)); 
			endforeach;
		endif;

		$url_new_realice = get_field('url_new_realice', $post->ID);

		$html .= '
		<div class="card col-span-12 md:col-span-6 lg:col-span-4 relative w-full rounded-card overflow-hidden ';
		$html .= '">';

		if ($categorySlug == 'media-coverage'):
			$html .= '<a href="'. $url_new_realice .'" target="_blank" class="absolute top-0 left-0 w-full h-full z-10"></a>';
		elseif ($categorySlug == 'new-releases'):
			$html .= '<a href="'.get_permalink( $post->ID ).'" class="absolute top-0 left-0 w-full h-full z-10"></a>';
		endif;


		if (has_post_thumbnail( $post->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			$html .= '<div class="relative w-full flex items-center justify-center h-[150px] md:h-[300px] lg:h-[320px] bg-events-general bg-cover bg-no-repeat bg-center aspect-square">';
			$html .= '<img src="'. $image[0] .'" class="block w-full max-h-full object-cover"  />';
			$html .= '</div>';

		endif;


		$html .= '<div class="flex flex-col p-7 gap-2 ';
		if ($categorySlug == 'media-coverage'): 
			$html .= 'bg-secondary-carbon text-neutral-nwhite';
		elseif ($categorySlug == 'new-releases'): 
			$html .= 'bg-secondary-aqua text-neutral-dgray';
		endif;
		$html .= '">';
		$html .= '<div class="flex items-center gap-3 uppercase">';

		if ($categorySlug == 'media-coverage'):
		$html.= '<svg width="11" height="13" viewBox="0 0 11 13" fill="none">
		<path d="M8.88997 10.7377H2.22319V1.40386H3.55674V0.0703125H2.17005C1.46341 0.0703125 0.890625 0.6431 0.890625 1.34974V10.7013C0.890625 11.4572 1.50376 12.0703 2.2596 12.0703H8.85552C9.61137 12.0703 10.2245 11.4572 10.2245 10.7013V5.40354H8.89095V10.7368L8.88997 10.7377Z" class="fill-current"/>
		<path d="M9.98744 3.28757L6.77117 0.0703125H4.8855H4.88648V5.40354H10.2197V3.51885L9.98744 3.28757ZM6.21905 4.06998V1.40386L7.57031 2.75612L8.88517 4.06998H6.21905Z" class="fill-current"/>
		</svg>';
		elseif ($categorySlug == 'new-releases'):
		$html.= '<svg width="15" height="13" viewBox="0 0 15 13" fill="none">
		<path d="M12.8906 2.83909V10.8388H11.5575V1.1732C11.5575 0.619888 11.1095 0.171875 10.5562 0.171875H1.89195C1.33863 0.171875 0.890625 0.619888 0.890625 1.1732V10.8388C0.890625 11.5749 1.48764 12.1719 2.22374 12.1719H12.8906C13.6267 12.1719 14.2237 11.5749 14.2237 10.8388V2.83909H12.8906ZM2.22374 10.8388V1.50499H10.2234V10.8378H2.22374V10.8388Z" class="fill-current"/>
		</svg>';
		endif;
		$html .= '<span class="heading-4">'. $category .'</span>';

		$html.= '</div>';
		$html.= '<h3 class="text-h3Mobile md:text-h6Tablet lg:text-h3 color-neutral-dgray"> '.$post->post_title.'</h3>';
		$html.= '</div>';

		$html.= '</div>';
	}

	if($pages > 1){
		if($page == 1):
			// $paginador .= '<li class="pagination-previous disabled"><span class="icon-Arrow"></span></li>';
			$paginador .= '<li class="pagination__previous disabled"><a href="javascript: void(0)"><span class="icon-chevron-back"></span></a></li>';
		else:
			// $paginador .= '<li class="pagination-previous"><a href="javascript: void(0)" class="btn-reclamos" data-num="'.($page-1).'" aria-label="Anterior"><span class="icon-Arrow"></span></a></li>';
			$paginador .= '<li class="pagination__previous"><a href="javascript: void(0)" class="btn-reclamos" data-num="'.($page-1).'"><span class="icon-chevron-back"></span></a></li>';
		endif;
		
		for ($i=0; $i < $pages ; $i++):
			$current_page = $i+1;
			if($page == $current_page):
				$class = "";
				if($page == $current_page)
				$class = 'class="pagination__active"';
				
				// $paginador .= '<li '.$class.'>'.$current_page.'</li>';
				$paginador .= '<li '.$class.'><a href="javascript: void(0)">'.$current_page.'</a></li>';
			else:
				// $paginador .= '<li><a href="javascript:void(0)" class="btn-reclamos" data-num="'.$current_page.'"  aria-label="Page '.$current_page.'">'.$current_page.'</a></li>';
				$paginador .= '<li><a href="javascript: void(0)"  class="btn-reclamos" data-num="'.$current_page.'">'.$current_page.'</a></li>';
			endif;
		endfor;
		
		if($page == $pages):
			// $paginador .= '<li class="pagination-next disabled"><span class="icon-Arrow"></span></li>';
			$paginador .= '<li class="pagination__next disabled"><a href="javascript: void(0)"><span class="icon-chevron-forward"></span></a></li>';
		else:
			// $paginador .= '<li class="pagination-next"><a href="javascript: void(0)" class="btn-reclamos" data-num="'.($page+1).'" aria-label="Siguiente"><span class="icon-Arrow"></span></a></li>';
			$paginador .= '<li class="pagination__next"><a href="javascript: void(0)" class="btn-reclamos" data-num="'.($page+1).'"><span class="icon-chevron-forward"></span></a></li>';
		endif;
	}

	$html = trim(preg_replace('/\s\s+/', ' ', $html));

	wp_send_json(array(
		"html" => $html,
		"paginador" => $paginador,
        "morePagesAvailable" => $more_pages_available,
	));
}

/**
* 
* GET EVENTS
* 
*/

add_action('wp_ajax_nopriv_get_events', 'getEvents');
add_action('wp_ajax_get_events', 'getEvents');
function getEvents() {
    $page = isset($_REQUEST["page"]) ? (int)$_REQUEST["page"] : 1;
    $category = isset($_REQUEST["c"]) ? (int)$_REQUEST["c"] : 0;

    $future_event_query = new WP_Query(array(
        'post_type' => 'event',
        'post_status' => 'publish',
        'posts_per_page' => '-1',
        'order' => 'DESC',
        'orderby' => 'meta_value_num',
        'meta_key' => 'date_event',
    ));

    $future_date = '';
    if ($future_event_query->have_posts()) {
        $future_event_query->the_post();
        $future_date = get_post_meta(get_the_ID(), 'date_event', true);
    }
    wp_reset_postdata();

    if (empty($future_date)) {
        $future_date = current_time('Ymd');
    }

    $months_per_page = 3;
    $months_ago = date('Ymd', strtotime($future_date . ' -' . (($page - 1) * $months_per_page + $months_per_page) . ' months'));

    $months_past = $page * 3;
    $months_to_past = date('Ymd', strtotime('-'.$months_past.' months'));

    $args = array(
        'post_type' => 'event',
        'post_status' => 'publish',
        'posts_per_page' => '-1',
        'order' => 'DESC',
        'orderby' => 'meta_value_num',
        'meta_key' => 'date_event',
    );

    switch ($category) {
        case 0:
            $args['meta_query'] = array(
                'relation' => 'OR',
                array(
                    'key' => 'date_event',
                    'value' => array($months_ago, $future_date),
                    'compare' => 'BETWEEN',
                    'type' => 'NUMERIC'
                ),
                array(
                    'key' => 'date_event',
                    'value' => $future_date,
                    'compare' => '>',
                    'type' => 'NUMERIC'
                ),
            );
            break;
        case 1:
            $args['meta_query'] = array(
                array(
                    'key' => 'date_event',
                    'value' => array($months_to_past, current_time('Ymd')),
                    'compare' => 'BETWEEN',
                    'type' => 'NUMERIC'
                ),
            );
            break;
        case 2:
            $args['meta_query'] = array(
                'key' => 'date_event',
                'value' => array($months_ago, $future_date),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            );
            break;
    }

    // var_dump($args);
    $posts_query = new WP_Query($args);
    $pages = $posts_query->max_num_pages;
    $posts = $posts_query->posts;
    $total_posts = $posts_query->found_posts;

// Inicialización de la estructura para agrupar eventos
    $group_posts = [];

    $current_date = new DateTime(current_time('Ymd'));

    foreach ($posts as $post) {
        $date = get_field('date_event', $post->ID, false);
        $dateEvent = new DateTime($date);
        $year = $dateEvent->format('Y');
        $month = $dateEvent->format('F');
        $isFutureEvent = $dateEvent >= $current_date;

        // Si category es igual a 2, solo considerar eventos futuros o del día actual
        if ($category == 2 && !$isFutureEvent) {
            continue; // Salta al siguiente post si este evento no cumple con la condición
        }

        $isExpired = $date < $future_date;
        // Verificar si el evento está vencido y limitar a 3 por mes
        if ($isExpired) {
            if (!isset($group_posts[$year][$month]) || count($group_posts[$year][$month]) < 3) {
                $group_posts[$year][$month][] = array($post, $dateEvent);
            }
        } else {
            $group_posts[$year][$month][] = array($post, $dateEvent);
        }
    }

    $html = "";

    foreach ($group_posts as $yearKey => $years) {

        foreach ($years as $monthKey => $months) {

            $html .= ' <h3 class="col-span-12 heading-3 pt-s8 pb-s4 first-of-type:pt-0">'. $monthKey . ' ' . $yearKey .'</h3>';

            foreach ($months as $postKey => $posts) {
                // Get category by post
                $category = '';
                $categorySlug = '';
                $post_type = get_post_type($posts[0]->ID);
                $taxonomies = get_object_taxonomies($post_type);
                $taxonomy_names = wp_get_object_terms($posts[0]->ID, $taxonomies,  array("fields" => "names"));
                if(!empty($taxonomy_names)) {
                    foreach($taxonomy_names as $tax_name) {
                        $category = $tax_name;
                        $categorySlug = str_replace(' ', '-', strtolower($tax_name));
                    }
                }

                $today = date( 'Ymd' );

                $date = get_field( 'date_event', $posts[0]->ID );
                $dateEvent = DateTime::createFromFormat( 'Ymd', $date );

                $html .= '<div class="relative col-span-12 max-md:flex max-md:flex-col md:grid md:grid-cols-12 md:gap-s2 items-center bg-neutral-offwhite text-neutral-dgray rounded-miniCard overflow-hidden '. $categorySlug . ' ' . (($today <= $date) ? ' opacity-100' : ' opacity-50') . '">';
                $html .= '<div class="max-md:w-full md:col-span-2 flex md:flex-col max-md:order-2 items-center justify-start md:justify-center gap-s2 text-center pt-s4 md:py-0 px-s4 md:px-0 md:pl-s2">';
                $html .= '<h5 class="text-h2Mobile md:text-h2Tablet lg:text-h2">'. $dateEvent->format( 'j' ) .'</h5>';
                $html .= '<h6 class="text-h10">'. $dateEvent->format( 'F' ) .'</h6>';
                $html .= '</div>';

                $html .= '<div class="relative max-md:w-full md:col-span-6 flex flex-col max-md:order-3 gap-s1 lg:gap-s2 p-s4 md:py-s2 md:px-s2">';
                $html .= '<span class="flex items-center gap-s1 pt-1 heading-4 uppercase text-neutral-dgray '. $categorySlug . '">';
                $html .= '<svg width="14" height="13" viewBox="0 0 14 13" fill="none"">';
                $html .= '<path d="M12 2.83909V10.8388H10.6669V1.1732C10.6669 0.619888 10.2189 0.171875 9.66556 0.171875H1.00132C0.448009 0.171875 0 0.619888 0 1.1732V10.8388C0 11.5749 0.597018 12.1719 1.33311 12.1719H12C12.7361 12.1719 13.3331 11.5749 13.3331 10.8388V2.83909H12ZM1.33311 10.8388V1.50499H9.33278V10.8378H1.33311V10.8388Z" class="fill-current"/>';
                $html .= '<path d="M7.99946 8.17188H2.66602V9.50499H7.99946V8.17188Z" class="fill-current"/>';
                $html .= '<path d="M7.99946 5.50391H2.66602V6.83702H7.99946V5.50391Z" class="fill-current"/>';
                $html .= '<path d="M7.99946 2.83594H2.66602V4.16905H7.99946V2.83594Z" class="fill-current"/>';
                $html .= '</svg>';
                $html .= $category;
                $html .= '</span>';
                $html .= '<h3 class="text-h10">'. get_the_title() .'</h3>';
                $html .= '<p class="body-2 lg:max-w-[460px]">'. get_the_excerpt() .'</p>';
                $html .= '</div>';

                if (has_post_thumbnail( $posts[0]->ID ) ) {
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts[0]->ID ), 'full' );
                    $html .= '<div class="max-md:w-full max-md:order-1 md:col-span-4 flex items-center justify-center bg-events-general bg-cover bg-no-repeat bg-center h-[144px] md:h-full lg:h-[192px]">';
                    $html .= '<img class="block" src="'. $image[0] .'" alt="'. get_the_title($posts[0]->ID) .'" />';
                    $html .= '</div>';
									} else {
									$html .= '<div class="max-md:w-full max-md:order-1 md:col-span-4 flex items-center justify-center bg-events-general h-[144px] md:h-full lg:h-[192px]">';
									$html .= '<img class="block" src="'. get_template_directory_uri() .'/images/events/icon-calendar.png" />';
									$html .= '</div>';
								}
                $html .= '</div>';
            }
        }
    }

    $html = trim(preg_replace('/\s\s+/', ' ', $html));

    wp_send_json(array(
        "html" => $html,
        "posts" => $posts,
        "totalPosts" => $total_posts
    ));
}


/**
* 
* MEGA MENU
* 
*/

function add_mega_menu_items() {
  acf_add_local_field_group( array(
    'key' => 'mega_menu_items',
    'title' => 'Mega Menu',
    'fields' => array(
      array(
        "key" => 'idenitifer',
        "label" => 'Identifier',
        "name" => 'identifier',
        "aria-label" => '',
        "type" => 'text',
        "instructions" => '',
        "required" => 0,
        "conditional_logic" => 0,
        "wrapper" => array(
          "width" => '',
          "class" => '',
          "id" => '',
        ),
      ),
      array(
        'key' => 'menu_items',
        'label' => 'Menu Items',
        'name' => 'menu_items',
        'aria-label' => '',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'layout' => 'table',
        'pagination' => 0,
        'min' => 0,
        'max' => 0,
        'collapsed' => '',
        'button_label' => 'Add Row',
        'rows_per_page' => 20,
        'sub_fields' => array(
          array(
            'key' => 'link',
            'label' => '',
            'name' => '',
            'aria-label' => '',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'parent_repeater' => 'menu_items',
          ),
          array(
            'key' => 'title',
            'label' => 'Title',
            'name' => 'title',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 'Title',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'parent_repeater' => 'menu_items',
          ),
          array(
            'key' => 'menu_class',
            'label' => 'Menu Class',
            'name' => 'menu_class',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'parent_repeater' => 'menu_items',
          ),
          array(
            'key' => 'description',
            'label' => 'Description',
            'name' => 'description',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'parent_repeater' => 'menu_items',
          ),
          array(
            'key' => 'icon',
            'label' => 'Icon',
            'name' => 'icon',
            'aria-label' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '<svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17.1405 0.519531H1.93663C0.865933 0.519531 0 1.38703 0 2.45616V11.3C0 12.3707 0.867496 13.2366 1.93663 13.2366H8.47804V11.1171H2.11951V2.63904H16.9576V11.1186H10.5991V13.2381H17.1405C18.2112 13.2381 19.0771 12.3707 19.0771 11.3015V2.45616C19.0771 1.38703 18.2097 0.519531 17.1405 0.519531Z" fill="#444444"/>
              <path d="M12.7202 15.3584H10.6007H8.48119H6.36168H4.2406H2.12109V17.4779H4.2406H6.36168H8.48119H10.6007H12.7202H14.8397H16.9592V15.3584H14.8397H12.7202Z" fill="#444444"/>
              <path d="M8.78804 9.87627L10.287 8.37729L11.786 6.87832L10.287 5.37935L8.78804 3.88037L7.28906 5.37935L8.78804 6.87832L7.28906 8.37729L8.78804 9.87627Z" fill="#444444"/>
            </svg>',
            'maxlength' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'parent_repeater' => 'menu_items',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'nav_menu_item',
          'operator' => '==',
          'value' => 'all',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ) );
}


/*
*
* ACF fields
*
*/


add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  add_mega_menu_items();

	acf_add_local_field_group( array(
		'key' => 'group_666baf7791435',
		'title' => 'Case of change Page - Fields',
		'fields' => array(
			array(
				'key' => 'field_666baf77ab3cc',
				'label' => 'Testimonial',
				'name' => 'testimonial_coc',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_666baf9bab3cd',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_666bafb1ab3ce',
						'label' => 'Name',
						'name' => 'name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_666bafb8ab3cf',
						'label' => 'Position',
						'name' => 'position',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_666bafd9ab3d0',
						'label' => 'Testimonial',
						'name' => 'testimonial',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_666bafecab3d1',
						'label' => 'Resume text',
						'name' => 'resume_text',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => 2,
						'placeholder' => '',
						'new_lines' => '',
					),
				),
			),
			array(
				'key' => 'field_666bb01aab3d2',
				'label' => 'Citations',
				'name' => 'citations',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_666bb02eab3d3',
						'label' => 'Citation',
						'name' => 'citation',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'row',
						'pagination' => 0,
						'min' => 1,
						'max' => 2,
						'collapsed' => '',
						'button_label' => 'Add citation',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_666bb13aab3d4',
								'label' => 'Resume',
								'name' => 'resume',
								'aria-label' => '',
								'type' => 'wysiwyg',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'tabs' => 'visual',
								'toolbar' => 'basic',
								'media_upload' => 0,
								'delay' => 1,
								'parent_repeater' => 'field_666bb02eab3d3',
							),
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-case-for-change.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
		acf_add_local_field_group( array(
		'key' => 'group_6625c9e3f2b2c',
		'title' => 'Contact Page - Fields',
		'fields' => array(
			array(
				'key' => 'field_6625c9e4adeda',
				'label' => 'Form shortcut',
				'name' => 'contact_form_shortcut',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'rows' => 2,
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_6625ca31adedb',
				'label' => 'Phone number',
				'name' => 'contact_phone_number',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_6625ca41adedc',
				'label' => 'Email',
				'name' => 'contact_email',
				'aria-label' => '',
				'type' => 'email',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-contact.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
		acf_add_local_field_group( array(
		'key' => 'group_667e28ffbfb48',
		'title' => 'Core Capabilities - Page',
		'fields' => array(
			array(
				'key' => 'field_667e29e19ac69',
				'label' => 'Main banner',
				'name' => 'main_banner',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_667e29e19ac6a',
						'label' => 'Flag title',
						'name' => 'flag_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Core Capabilities',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_667e29e19ac6b',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Effective Collaboration and Efficiency – Unlocked',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_667e29e19ac6c',
						'label' => 'First Resume',
						'name' => 'first_resume',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Technology that’s uniquely positioned between regulators and industry',
						'maxlength' => '',
						'rows' => 2,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_667e29e19ac6e',
						'label' => 'Link CTA',
						'name' => 'link_cta',
						'aria-label' => '',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'https://www.google.com/',
						'placeholder' => '',
					),
					array(
						'key' => 'field_66a874c136915',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_667e29e19ac6f',
						'label' => 'BG Image for Desktop',
						'name' => 'bg_image_for_desktop',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a8719c92d4a',
						'label' => 'BG Image for Tablet',
						'name' => 'bg_image_for_tablet',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a871a592d4b',
						'label' => 'BG Image for Mobile',
						'name' => 'bg_image_for_mobile',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
				),
			),
			array(
				'key' => 'field_667e295576ad4',
				'label' => 'Testimonial',
				'name' => 'testimonial_coc',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_667e295576ad5',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_667e295576ad6',
						'label' => 'Name',
						'name' => 'name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Roche',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_667e295576ad7',
						'label' => 'Position',
						'name' => 'position',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Senior Regulatory Submission Manager, Roche',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_667e295576ad8',
						'label' => 'Testimonial',
						'name' => 'testimonial',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '“The strength of Accumulus is the simplicity of the design.”',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_667e295576ad9',
						'label' => 'Resume text',
						'name' => 'resume_text',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '“You can hardly make a mistake. For a non-IT person, you simply perform the required task.”',
						'maxlength' => '',
						'rows' => 2,
						'placeholder' => '',
						'new_lines' => '',
					),
				),
			),
			array(
				'key' => 'field_668425a1e00ae',
				'label' => 'Benefits',
				'name' => 'benefits',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'row',
				'pagination' => 0,
				'min' => 0,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add benefit',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_668425aee00af',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
						'parent_repeater' => 'field_668425a1e00ae',
					),
					array(
						'key' => 'field_668425e2e00b0',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_668425a1e00ae',
					),
					array(
						'key' => 'field_668425e9e00b1',
						'label' => 'Resume',
						'name' => 'resume',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => '',
						'placeholder' => '',
						'new_lines' => '',
						'parent_repeater' => 'field_668425a1e00ae',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-core-capabilities.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
		acf_add_local_field_group( array(
		'key' => 'group_666200ea823a4',
		'title' => 'Events Post type - Fields',
		'fields' => array(
			array(
				'key' => 'field_666200ea1d3b7',
				'label' => 'Date event',
				'name' => 'date_event',
				'aria-label' => '',
				'type' => 'date_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'display_format' => 'm/d/Y',
				'return_format' => 'Ymd',
				'first_day' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'event',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
		acf_add_local_field_group( array(
		'key' => 'group_66175352040c8',
		'title' => 'Main banner - Home',
		'fields' => array(
			array(
				'key' => 'field_661753d51328a',
				'label' => 'Background image main banner',
				'name' => 'bg_image_main',
				'aria-label' => '',
				'type' => 'image',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'preview_size' => 'medium',
			),
			array(
				'key' => 'field_6617535213288',
				'label' => 'Title tag',
				'name' => 'title_tag',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => 'Text over the title',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'RESPONSIBLE INNOVATION',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_661753b113289',
				'label' => 'Main title',
				'name' => 'main_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => 'Principal title',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Advancing collaboration and data exchange in drug development',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_661754341328b',
				'label' => 'Resume text',
				'name' => 'resume_text',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => 'Text description',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'We’re a global, nonprofit industry association with a groundbreaking SaaS platform, built to expedite review and approval cycles between life science organizations and global regulators.',
				'maxlength' => '',
				'rows' => '',
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_6617546f1328c',
				'label' => 'Link learn more',
				'name' => 'link_learn_more',
				'aria-label' => '',
				'type' => 'url',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'https://google.com/',
				'placeholder' => '',
			),
			array(
				'key' => 'field_66175a71b13db',
				'label' => 'Marquee images',
				'name' => 'marquee_images',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'row',
				'pagination' => 0,
				'min' => 10,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_66175a89b13dc',
						'label' => 'Logo',
						'name' => 'logo',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
						'parent_repeater' => 'field_66175a71b13db',
					),
					array(
						'key' => 'field_66175a9eb13dd',
						'label' => 'Name',
						'name' => 'name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_66175a71b13db',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
		acf_add_local_field_group( array(
		'key' => 'group_666785a13b672',
		'title' => 'Main banner - Several Pages',
		'fields' => array(
			array(
				'key' => 'field_666785a13ed91',
				'label' => 'Title tag',
				'name' => 'title_tag',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => 'Text over the title',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_666785a13ed9a',
				'label' => 'Main title',
				'name' => 'main_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => 'Principal title',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_666785a13eda2',
				'label' => 'Resume text',
				'name' => 'resume_text',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => 'Text description',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'rows' => '',
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_666785a13eda9',
				'label' => 'Link learn more',
				'name' => 'link_learn_more',
				'aria-label' => '',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_66a87138ac992',
				'label' => 'BG image for Desktop',
				'name' => 'bg_image_for_desktop',
				'aria-label' => '',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'preview_size' => 'medium',
			),
			array(
				'key' => 'field_66a87153ac993',
				'label' => 'BG image for Tablet',
				'name' => 'bg_image_for_tablet',
				'aria-label' => '',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'preview_size' => 'medium',
			),
			array(
				'key' => 'field_66a87160ac994',
				'label' => 'BG image for Mobile',
				'name' => 'bg_image_for_mobile',
				'aria-label' => '',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'preview_size' => 'medium',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-get-started.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-case-for-change.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-regulator-forum.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-about-us.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
		acf_add_local_field_group( array(
		'key' => 'group_665d32031bdca',
		'title' => 'News Post type - Fields',
		'fields' => array(
			array(
				'key' => 'field_665d32670a73c',
				'label' => 'URL new realise',
				'name' => 'url_new_realice',
				'aria-label' => '',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_665d32030a73b',
							'operator' => '==',
							'value' => 'true',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'news',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
		acf_add_local_field_group( array(
		'key' => 'group_66732b5ce235b',
		'title' => 'Platform Page - Fields',
		'fields' => array(
			array(
				'key' => 'field_66732b5d8d0a4',
				'label' => 'Main banner',
				'name' => 'main_banner',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66732b948d0a5',
						'label' => 'Flag title',
						'name' => 'flag_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'OUR PLATFORM',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732ba38d0a6',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'A Pathway to Digital Transformation',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732bb08d0a7',
						'label' => 'First Resume',
						'name' => 'first_resume',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'A first-of-its-kind data and information exchange platform for the drug development lifecycle. Built for the process needs of today and the evolving life sciences–regulatory landscape of the future.',
						'maxlength' => '',
						'rows' => 2,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_66732bc58d0a8',
						'label' => 'Second resume',
						'name' => 'second_resume',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Our goal is to create a dynamic exchange of information and data between drug developers and health authorities. The Accumulus cloud-based platform paves the digital path to regulatory convergence.',
						'maxlength' => '',
						'rows' => 2,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_66732bf68d0a9',
						'label' => 'Link CTA',
						'name' => 'link_cta',
						'aria-label' => '',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'https://www.google.com/',
						'placeholder' => '',
					),
					array(
						'key' => 'field_6673553729fbe',
						'label' => 'Image Desktop',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a325b90c214',
						'label' => 'Image Tablet',
						'name' => 'image_tablet',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a325c30c215',
						'label' => 'Image Mobile',
						'name' => 'image_mobile',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a876b304b85',
						'label' => 'BG Image Desktop',
						'name' => 'bg_image_desktop',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a876a104b84',
						'label' => 'BG Image Tablet',
						'name' => 'bg_image_tablet',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a876ca04b86',
						'label' => 'BG Image Mobile',
						'name' => 'bg_image_mobile',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
				),
			),
			array(
				'key' => 'field_66732c8a74359',
				'label' => 'Video',
				'name' => 'video',
				'aria-label' => '',
				'type' => 'oembed',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'width' => '',
				'height' => '',
			),
			array(
				'key' => 'field_66732d5eae96f',
				'label' => 'Testimonial',
				'name' => 'testimonial_platform',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66732d5fae970',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66732d5fae971',
						'label' => 'Name',
						'name' => 'name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Hal Stern',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732d5fae972',
						'label' => 'Position',
						'name' => 'position',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'VP, Head of Technology R&D, at Janssen',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732d5fae973',
						'label' => 'Testimonial',
						'name' => 'testimonial',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '“We can have a faster, more collaborative review process that ideally brings medicines to market faster for patients. It’s always been important; now it’s possible.”',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_66732d5fae974',
						'label' => 'Resume text',
						'name' => 'resume_text',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => 2,
						'placeholder' => '',
						'new_lines' => '',
					),
				),
			),
			array(
				'key' => 'field_66732e491257c',
				'label' => 'Benefits',
				'name' => 'benefits',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66732e5d1257d',
						'label' => 'Title flag',
						'name' => 'title_flag',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'BENEFITS',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732e6c1257e',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Simplified Interactions, Accelerated Results',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732e7b1257f',
						'label' => 'Resume',
						'name' => 'resume',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'The Accumulus Platform enables a paradigm shift in the life sciences-regulatory ecosystem, from the exchange of single documents to structured content and data. And from one-to-one regulatory interactions to one-to-many and many-to-many. The Accumulus Platform eliminates the need for pharmaceutical companies to redo the same work for each global health regulator and leads to a more accelerated drug approval process.',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_66732e9712580',
						'label' => 'Link Cta',
						'name' => 'link_cta',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'https://www.google.com/',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66aafc9624727',
						'label' => 'Title Second Block',
						'name' => 'title_2',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Our Security Philosophy',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66aafc9e24728',
						'label' => 'Resume Second Block',
						'name' => 'resume_2',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'At Accumulus, we\'re committed to protecting our users and the data and information they exchange. That\'s why we’ve developed our platform with the most advanced Software as a Service (SaaS) security features. We’re also continually monitoring our cybersecurity defense infrastructure to ensure we apply the right tools and functional operations across our security pillars. This ensures rigorous data and information protection today and in the future, as we evolve to a global digital dossier.',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_66aafca224729',
						'label' => 'Link Cta Second Block',
						'name' => 'link_cta_2',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'https://www.google.com/',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
				),
			),
			array(
				'key' => 'field_66732eca18c1b',
				'label' => 'Key features',
				'name' => 'key_features',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_6679a3895e40f',
						'label' => 'Slider items',
						'name' => 'slider_items',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'row',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_6679a38961ccc',
								'label' => 'Slide item',
								'name' => 'slide_item',
								'aria-label' => '',
								'type' => 'flexible_content',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'layouts' => array(
									'layout_66564a721c14d' => array(
										'key' => 'layout_66564a721c14d',
										'name' => 'title',
										'label' => 'Title',
										'display' => 'block',
										'sub_fields' => array(
											array(
												'key' => 'field_6679a38964286',
												'label' => 'Title',
												'name' => 'title',
												'aria-label' => '',
												'type' => 'text',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'default_value' => '',
												'maxlength' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
											),
										),
										'min' => '',
										'max' => '',
									),
									'layout_66564a92e9602' => array(
										'key' => 'layout_66564a92e9602',
										'name' => 'description',
										'label' => 'Description',
										'display' => 'block',
										'sub_fields' => array(
											array(
												'key' => 'field_6679a38964290',
												'label' => 'Description',
												'name' => 'description',
												'aria-label' => '',
												'type' => 'textarea',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'default_value' => '',
												'maxlength' => '',
												'rows' => 3,
												'placeholder' => '',
												'new_lines' => '',
											),
										),
										'min' => '',
										'max' => '',
									),
									'layout_66569708ec87c' => array(
										'key' => 'layout_66569708ec87c',
										'name' => 'bullet_list',
										'label' => 'Bullet list',
										'display' => 'block',
										'sub_fields' => array(
											array(
												'key' => 'field_6679a38964298',
												'label' => 'Bullet list',
												'name' => 'bullet_list',
												'aria-label' => '',
												'type' => 'repeater',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'layout' => 'row',
												'min' => 1,
												'max' => 0,
												'collapsed' => '',
												'button_label' => 'Add Row',
												'rows_per_page' => 20,
												'sub_fields' => array(
													array(
														'key' => 'field_6679a389698d1',
														'label' => 'Item',
														'name' => 'item',
														'aria-label' => '',
														'type' => 'text',
														'instructions' => '',
														'required' => 0,
														'conditional_logic' => 0,
														'wrapper' => array(
															'width' => '',
															'class' => '',
															'id' => '',
														),
														'default_value' => '',
														'maxlength' => '',
														'placeholder' => '',
														'prepend' => '',
														'append' => '',
														'parent_repeater' => 'field_6679a38964298',
													),
												),
											),
										),
										'min' => '',
										'max' => '',
									),
									'layout_665696a1ec878' => array(
										'key' => 'layout_665696a1ec878',
										'name' => 'cta',
										'label' => 'Cta',
										'display' => 'block',
										'sub_fields' => array(
											array(
												'key' => 'field_6679a389642a0',
												'label' => 'Text link',
												'name' => 'text_link',
												'aria-label' => '',
												'type' => 'text',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'default_value' => '',
												'maxlength' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
											),
											array(
												'key' => 'field_6679a389642a8',
												'label' => 'Link',
												'name' => 'link',
												'aria-label' => '',
												'type' => 'link',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'return_format' => 'url',
											),
										),
										'min' => '',
										'max' => '',
									),
									'layout_66564ab7e9605' => array(
										'key' => 'layout_66564ab7e9605',
										'name' => 'image',
										'label' => 'Featured Image',
										'display' => 'block',
										'sub_fields' => array(
											array(
												'key' => 'field_6679a389642b0',
												'label' => 'Image',
												'name' => 'image',
												'aria-label' => '',
												'type' => 'image',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'return_format' => 'url',
												'library' => 'all',
												'min_width' => '',
												'min_height' => '',
												'min_size' => '',
												'max_width' => '',
												'max_height' => '',
												'max_size' => '',
												'mime_types' => '',
												'preview_size' => 'medium',
											),
										),
										'min' => '',
										'max' => '',
									),
								),
								'min' => '',
								'max' => '',
								'button_label' => 'Add Row',
								'parent_repeater' => 'field_6679a3895e40f',
							),
						),
					),
				),
			),
			array(
				'key' => 'field_66732cb07435a',
				'label' => 'Value Propositions',
				'name' => 'value_propositions',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66732cc57435b',
						'label' => 'Flag title',
						'name' => 'flag_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'VALUE PROPOSITIONS',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732cd97435c',
						'label' => 'Title - First line',
						'name' => 'title_first_line',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Responsible',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732cf77435d',
						'label' => 'Title - Second Line',
						'name' => 'title_second_line',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Innovation for',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66732d0c7435e',
						'label' => 'Title - Third Line',
						'name' => 'title_third_line',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Powerful Results',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-platform.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
	acf_add_local_field_group( array(
		'key' => 'group_6688c7820a896',
		'title' => 'Regulator Forum - Page',
		'fields' => array(
			array(
				'key' => 'field_6688c78340ef4',
				'label' => 'Related topics',
				'name' => 'related_topics',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_668b4e492f079',
						'label' => 'Title section',
						'name' => 'title_section',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Increase Feedback and Transparency on Accumulus Platform-Related Topics',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6688c7c040ef5',
						'label' => 'List items',
						'name' => 'list_items',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'row',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_6688c7d240ef7',
								'label' => 'Icon',
								'name' => 'icon',
								'aria-label' => '',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
								'preview_size' => 'medium',
								'parent_repeater' => 'field_6688c7c040ef5',
							),
							array(
								'key' => 'field_6688c7cb40ef6',
								'label' => 'Title',
								'name' => 'title',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'parent_repeater' => 'field_6688c7c040ef5',
							),
						),
					),
					array(
						'key' => 'field_66a9a57c7238d',
						'label' => 'BG Image Desktop',
						'name' => 'bg_image_desktop',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a9a64a910a1',
						'label' => 'BG Image Tablet',
						'name' => 'bg_image_tablet',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66a9a657910a2',
						'label' => 'BG Image Mobile',
						'name' => 'bg_image_mobile',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
				),
			),
			array(
				'key' => 'field_6688c7ff40ef8',
				'label' => 'Participation Looks',
				'name' => 'participation_looks',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'row',
				'sub_fields' => array(
					array(
						'key' => 'field_668b4e642f07a',
						'label' => 'Title section',
						'name' => 'title_section',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => '',
						'placeholder' => '',
						'new_lines' => 'br',
					),
					array(
						'key' => 'field_6688c86c40efb',
						'label' => 'List participation',
						'name' => 'list_participation',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'layout' => 'row',
						'pagination' => 0,
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_6688c81d40ef9',
								'label' => 'Image',
								'name' => 'image',
								'aria-label' => '',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
								'preview_size' => 'medium',
								'parent_repeater' => 'field_6688c86c40efb',
							),
							array(
								'key' => 'field_6688c82a40efa',
								'label' => 'Title',
								'name' => 'title',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'parent_repeater' => 'field_6688c86c40efb',
							),
						),
					),
				),
			),
			array(
				'key' => 'field_6688c93840efe',
				'label' => 'Regulatory Authorities',
				'name' => 'regulatory_authorities',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'row',
				'sub_fields' => array(
					array(
						'key' => 'field_6688c9ee40f03',
						'label' => 'Flag title',
						'name' => 'flag_title_regulatory_authorities',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'REGULATOR FORUM',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6688c9d340f02',
						'label' => 'Title',
						'name' => 'title_regulatory_authorities',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Participating National Regulatory Authorities',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6688c94e40eff',
						'label' => 'List Authorities',
						'name' => 'list_authorities',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'row',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_6688c96240f00',
								'label' => 'Title',
								'name' => 'title',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'parent_repeater' => 'field_6688c94e40eff',
							),
							array(
								'key' => 'field_6688c98e40f01',
								'label' => 'Description',
								'name' => 'description',
								'aria-label' => '',
								'type' => 'textarea',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'rows' => 3,
								'placeholder' => '',
								'new_lines' => 'br',
								'parent_repeater' => 'field_6688c94e40eff',
							),
						),
					),
				),
			),
			array(
				'key' => 'field_6688ca2740f04',
				'label' => 'Observers',
				'name' => 'observers',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_6688ca3c40f05',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Observers',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6688ca5940f06',
						'label' => 'Description',
						'name' => 'description',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '*Participation in this forum is optional and does not serve as a form of endorsement of Accumulus as an organization or of the Accumulus Platform.',
						'maxlength' => '',
						'rows' => '',
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_6688ca7040f07',
						'label' => 'Observers',
						'name' => 'observers',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'row',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_6688ca8240f08',
								'label' => 'Title',
								'name' => 'title',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'parent_repeater' => 'field_6688ca7040f07',
							),
						),
					),
				),
			),
			array(
				'key' => 'field_668b4cf5583d3',
				'label' => 'Join the forum',
				'name' => 'join_the_forum',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_668b4d0c583d4',
						'label' => 'First line title',
						'name' => 'first_line_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Join the',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_668b4d20583d5',
						'label' => 'Second line title',
						'name' => 'second_line_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Forum Today!',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_668b4d49583d6',
						'label' => 'Steps join',
						'name' => 'steps_join',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'row',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_668b4d5f583d7',
								'label' => 'Icon',
								'name' => 'icon',
								'aria-label' => '',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
								'preview_size' => 'medium',
								'parent_repeater' => 'field_668b4d49583d6',
							),
							array(
								'key' => 'field_668b4d9d583d9',
								'label' => 'Title',
								'name' => 'title',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'parent_repeater' => 'field_668b4d49583d6',
							),
							array(
								'key' => 'field_668b4d75583d8',
								'label' => 'Description',
								'name' => 'description',
								'aria-label' => '',
								'type' => 'wysiwyg',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'tabs' => 'visual',
								'toolbar' => 'basic',
								'media_upload' => 0,
								'delay' => 0,
								'parent_repeater' => 'field_668b4d49583d6',
							),
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-regulator-forum.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
	acf_add_local_field_group( array(
		'key' => 'group_6642e1ea9e53a',
		'title' => 'Resources Page - Fields',
		'fields' => array(
			array(
				'key' => 'field_6646bed7e51d7',
				'label' => 'Purple section',
				'name' => 'purple_section',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_6646bfe6e51d8',
						'label' => 'Eye text',
						'name' => 'eye_text',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6646c005e51d9',
						'label' => 'First line title',
						'name' => 'first_line_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6646c00fe51da',
						'label' => 'Second line title',
						'name' => 'second_line_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6646c021e51db',
						'label' => 'First paragraph',
						'name' => 'first_paragraph',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => 4,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_6646c03be51dc',
						'label' => 'Second paragraph',
						'name' => 'second_paragraph',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_6646c061e51dd',
						'label' => 'Url Cta',
						'name' => 'url_cta',
						'aria-label' => '',
						'type' => 'link',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
					),
				),
			),
			array(
				'key' => 'field_6646c0bbe51df',
				'label' => 'Events Section',
				'name' => 'events_section',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'row',
				'sub_fields' => array(
					array(
						'key' => 'field_6646c113e51e4',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_6646c0cae51e0',
						'label' => 'First line title',
						'name' => 'first_line_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6646c0dde51e1',
						'label' => 'Second line title',
						'name' => 'second_line_title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_6646c0e9e51e2',
						'label' => 'First paragraph',
						'name' => 'first_paragraph',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_6646c0fde51e3',
						'label' => 'Second paragraph',
						'name' => 'second_paragraph',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_6646c127e51e5',
						'label' => 'Link Cta',
						'name' => 'link_cta',
						'aria-label' => '',
						'type' => 'link',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-resources.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
	acf_add_local_field_group( array(
		'key' => 'group_66564927d29db',
		'title' => 'Values Component - Several pages',
		'fields' => array(
			array(
				'key' => 'field_66564a51e95ff',
				'label' => 'Values row',
				'name' => 'values_row',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'row',
				'pagination' => 0,
				'min' => 0,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_66564a69e9600',
						'label' => 'Card item',
						'name' => 'card_item',
						'aria-label' => '',
						'type' => 'flexible_content',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layouts' => array(
							'layout_66564a721c14d' => array(
								'key' => 'layout_66564a721c14d',
								'name' => 'title',
								'label' => 'Title',
								'display' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_66564a83e9601',
										'label' => 'Title',
										'name' => 'title',
										'aria-label' => '',
										'type' => 'text',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'default_value' => '',
										'maxlength' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
									),
								),
								'min' => '',
								'max' => '',
							),
							'layout_66564a92e9602' => array(
								'key' => 'layout_66564a92e9602',
								'name' => 'description',
								'label' => 'Description Plain Text',
								'display' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_66564a99e9604',
										'label' => 'Description',
										'name' => 'description',
										'aria-label' => '',
										'type' => 'textarea',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'default_value' => '',
										'maxlength' => '',
										'rows' => 3,
										'placeholder' => '',
										'new_lines' => '',
									),
								),
								'min' => '',
								'max' => '',
							),
							'layout_667e31d6d1920' => array(
								'key' => 'layout_667e31d6d1920',
								'name' => 'description_wysiwig',
								'label' => 'Description - Wysiwyg Editor',
								'display' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_667e3214d1922',
										'label' => 'wysiwyg',
										'name' => 'wysiwyg',
										'aria-label' => '',
										'type' => 'wysiwyg',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'default_value' => '',
										'tabs' => 'visual',
										'toolbar' => 'basic',
										'media_upload' => 0,
										'delay' => 0,
									),
								),
								'min' => '',
								'max' => '',
							),
							'layout_66569708ec87c' => array(
								'key' => 'layout_66569708ec87c',
								'name' => 'bullet_list',
								'label' => 'Bullet list',
								'display' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_66569711ec87e',
										'label' => 'Bullet list',
										'name' => 'bullet_list',
										'aria-label' => '',
										'type' => 'repeater',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'layout' => 'row',
										'min' => 1,
										'max' => 0,
										'collapsed' => '',
										'button_label' => 'Add Row',
										'rows_per_page' => 20,
										'sub_fields' => array(
											array(
												'key' => 'field_6656972eec87f',
												'label' => 'Item',
												'name' => 'item',
												'aria-label' => '',
												'type' => 'text',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'default_value' => '',
												'maxlength' => '',
												'placeholder' => '',
												'prepend' => '',
												'append' => '',
												'parent_repeater' => 'field_66569711ec87e',
											),
										),
									),
								),
								'min' => '',
								'max' => '',
							),
							'layout_665696a1ec878' => array(
								'key' => 'layout_665696a1ec878',
								'name' => 'cta',
								'label' => 'Cta',
								'display' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_665696e5ec87b',
										'label' => 'Text link',
										'name' => 'text_link',
										'aria-label' => '',
										'type' => 'text',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'default_value' => '',
										'maxlength' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
									),
									array(
										'key' => 'field_665696aaec87a',
										'label' => 'Link',
										'name' => 'link',
										'aria-label' => '',
										'type' => 'link',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'return_format' => 'url',
									),
								),
								'min' => '',
								'max' => '',
							),
							'layout_66564ab7e9605' => array(
								'key' => 'layout_66564ab7e9605',
								'name' => 'image',
								'label' => 'Featured Image',
								'display' => 'block',
								'sub_fields' => array(
									array(
										'key' => 'field_66564ac0e9607',
										'label' => 'Image',
										'name' => 'image',
										'aria-label' => '',
										'type' => 'image',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'return_format' => 'url',
										'library' => 'all',
										'min_width' => '',
										'min_height' => '',
										'min_size' => '',
										'max_width' => '',
										'max_height' => '',
										'max_size' => '',
										'mime_types' => '',
										'preview_size' => 'medium',
									),
								),
								'min' => '',
								'max' => '',
							),
						),
						'min' => '',
						'max' => '',
						'button_label' => 'Add Row',
						'parent_repeater' => 'field_66564a51e95ff',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-get-started.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-case-for-change.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-platform.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-core-capabilities.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-regulator-forum.php',
				),
			),
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-about-us.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
	acf_add_local_field_group( array(
		'key' => 'group_661b23ef6a60f',
		'title' => 'What we do - Home',
		'fields' => array(
			array(
				'key' => 'field_661b23ef3bf02',
				'label' => 'Title tag',
				'name' => 'what_title_tag',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'WHAT WE DO',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_661b24283bf03',
				'label' => 'Main Title',
				'name' => 'what_main_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Accumulus Synergy is on a mission to accelerate critical therapies to citizens of the world.',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_661b24423bf04',
				'label' => 'First description',
				'name' => 'what_first_description',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Together with key stakeholders in the life sciences-regulatory ecosystem, we’ve developed a first-of-its-kind platform that facilitates the secure, real-time exchange of data and information for regulatory submissions.',
				'maxlength' => '',
				'rows' => 5,
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_661b246f3bf05',
				'label' => 'Second description',
				'name' => 'what_second_description',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Our goal is to help move the industry toward a fully data-driven global dossier in the cloud.',
				'maxlength' => '',
				'rows' => 5,
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_661b248b3bf06',
				'label' => 'Link about',
				'name' => 'what_link_about',
				'aria-label' => '',
				'type' => 'page_link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'page',
				),
				'post_status' => '',
				'taxonomy' => '',
				'allow_archives' => 0,
				'multiple' => 0,
				'allow_null' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
	acf_add_local_field_group( array(
		'key' => 'group_661f406de42bf',
		'title' => 'Why Accumulus - Home',
		'fields' => array(
			array(
				'key' => 'field_661f406e42581',
				'label' => 'Title tag',
				'name' => 'why_title_tag',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'WHY ACCUMULUS',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_661f40ae42582',
				'label' => 'First line title',
				'name' => 'why_first_line_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'What Makes',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_661f40cf42583',
				'label' => 'Second line title',
				'name' => 'why_second_line_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'Us Different',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );

	acf_add_local_field_group( array(
		'key' => 'group_66c50e18ef8cd',
		'title' => 'Team - Directors',
		'fields' => array(
			array(
				'key' => 'field_66c50e19091e6',
				'label' => 'Team',
				'name' => 'team-directors',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'pagination' => 0,
				'min' => 0,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_66c50e190ab83',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
						'parent_repeater' => 'field_66c50e19091e6',
					),
					array(
						'key' => 'field_66c50e190ab8d',
						'label' => 'Name',
						'name' => 'name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_66c50e19091e6',
					),
					array(
						'key' => 'field_66c50e190ab9d',
						'label' => 'Position',
						'name' => 'position',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_66c50e19091e6',
					),
					array(
						'key' => 'field_66c50e190abc2',
						'label' => 'Description',
						'name' => 'description',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => 'Max characters 138',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => 138,
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
						'parent_repeater' => 'field_66c50e19091e6',
					),
					array(
						'key' => 'field_66c50e190ac47',
						'label' => 'LinkedIn',
						'name' => 'linkedin',
						'aria-label' => '',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'https://www.linkedin.com/',
						'placeholder' => '',
						'parent_repeater' => 'field_66c50e19091e6',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'team-members',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
	acf_add_local_field_group( array(
		'key' => 'group_66c50d2fbf4fc',
		'title' => 'Team - Leadership',
		'fields' => array(
			array(
				'key' => 'field_66c50d30c2138',
				'label' => 'Team Leadership',
				'name' => 'team-list',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'pagination' => 0,
				'min' => 0,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add Row',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_66c50d60c2139',
						'label' => 'Image',
						'name' => 'image',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
						'parent_repeater' => 'field_66c50d30c2138',
					),
					array(
						'key' => 'field_66c50d7cc213a',
						'label' => 'Name',
						'name' => 'name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_66c50d30c2138',
					),
					array(
						'key' => 'field_66c50d89c213b',
						'label' => 'Position',
						'name' => 'position',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_66c50d30c2138',
					),
					array(
						'key' => 'field_66c50d99c213c',
						'label' => 'Description',
						'name' => 'description',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => 'Max characters 138',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => 138,
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
						'parent_repeater' => 'field_66c50d30c2138',
					),
					array(
						'key' => 'field_66c50dcdc213d',
						'label' => 'LinkedIn',
						'name' => 'linkedin',
						'aria-label' => '',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'https://www.linkedin.com/',
						'placeholder' => '',
						'parent_repeater' => 'field_66c50d30c2138',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'team-members',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );

	acf_add_local_field_group( array(
		'key' => 'group_66c7b521f1c0c',
		'title' => 'Careers - Page',
		'fields' => array(
			array(
				'key' => 'field_66c7b522f09f2',
				'label' => 'Main Banner',
				'name' => 'main_banner',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66c7b550f09f3',
						'label' => 'Eyebrown',
						'name' => 'eyebrown',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Careers',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66c7b583f09f4',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Join Us',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66c7b598f09f5',
						'label' => 'Resume',
						'name' => 'resume',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Working at Accumulus Synergy is more than a job, it’s a passion and a responsibility. We’re a community of diverse individuals driven by a common purpose — to accelerate the availability of therapies to patients through a global digital transformation.',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_66c7b5aff09f6',
						'label' => 'CTA Text',
						'name' => 'cta_text',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Explore More',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66c7b5c7f09f7',
						'label' => 'CTA Link',
						'name' => 'cta_link',
						'aria-label' => '',
						'type' => 'url',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '/careers/',
						'placeholder' => '',
					),
					array(
						'key' => 'field_66c7b84cb324c',
						'label' => 'BG banner - Desktop',
						'name' => 'bg_banner_desktop',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66c7b869b324d',
						'label' => 'BG banner - Tablet',
						'name' => 'bg_banner_tablet',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66c7b879b324e',
						'label' => 'BG banner - Mobile',
						'name' => 'bg_banner_mobile',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
				),
			),
			array(
				'key' => 'field_66c7b616d1cdd',
				'label' => 'Culture Pillars',
				'name' => 'culture_pillars',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66c7b629d1cde',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Our Culture Pillars',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66c7b65ad1cdf',
						'label' => 'List items',
						'name' => 'list_items',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_66c7b68ad1ce2',
								'label' => 'Image',
								'name' => 'image',
								'aria-label' => '',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
								'preview_size' => 'medium',
								'parent_repeater' => 'field_66c7b65ad1cdf',
							),
							array(
								'key' => 'field_66c7b666d1ce0',
								'label' => 'Title',
								'name' => 'title',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'parent_repeater' => 'field_66c7b65ad1cdf',
							),
							array(
								'key' => 'field_66c7b675d1ce1',
								'label' => 'Description',
								'name' => 'description',
								'aria-label' => '',
								'type' => 'textarea',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'rows' => 3,
								'placeholder' => '',
								'new_lines' => '',
								'parent_repeater' => 'field_66c7b65ad1cdf',
							),
						),
					),
				),
			),
			array(
				'key' => 'field_66c7b6b7d1ce3',
				'label' => 'Why Accumulus',
				'name' => 'why_accumulus',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66c7b6c3d1ce4',
						'label' => 'Title - First Line',
						'name' => 'title_first_line',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Why',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66c7b6e2d1ce5',
						'label' => 'Title - Second Line',
						'name' => 'title_second_line',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Accumulus?',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66c7b6fdd1ce6',
						'label' => 'List Items',
						'name' => 'list_items',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_66c7b763d1ce9',
								'label' => 'Icon',
								'name' => 'icon',
								'aria-label' => '',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
								'preview_size' => 'medium',
								'parent_repeater' => 'field_66c7b6fdd1ce6',
							),
							array(
								'key' => 'field_66c7b739d1ce7',
								'label' => 'Title',
								'name' => 'title',
								'aria-label' => '',
								'type' => 'textarea',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'rows' => 2,
								'placeholder' => '',
								'new_lines' => 'br',
								'parent_repeater' => 'field_66c7b6fdd1ce6',
							),
							array(
								'key' => 'field_66c7b750d1ce8',
								'label' => 'Description',
								'name' => 'description',
								'aria-label' => '',
								'type' => 'textarea',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'rows' => 3,
								'placeholder' => '',
								'new_lines' => '',
								'parent_repeater' => 'field_66c7b6fdd1ce6',
							),
						),
					),
				),
			),
			array(
				'key' => 'field_66c7b780d1cea',
				'label' => 'Testimonials',
				'name' => 'testimonials',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66c7b78fd1ceb',
						'label' => 'List testimonials',
						'name' => 'list_testimonials',
						'aria-label' => '',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'pagination' => 0,
						'min' => 0,
						'max' => 0,
						'collapsed' => '',
						'button_label' => 'Add Row',
						'rows_per_page' => 20,
						'sub_fields' => array(
							array(
								'key' => 'field_66c7b7a0d1cec',
								'label' => 'Photo',
								'name' => 'photo',
								'aria-label' => '',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'url',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
								'preview_size' => 'medium',
								'parent_repeater' => 'field_66c7b78fd1ceb',
							),
							array(
								'key' => 'field_66c7b7afd1ced',
								'label' => 'Name',
								'name' => 'name',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'parent_repeater' => 'field_66c7b78fd1ceb',
							),
							array(
								'key' => 'field_66c7b7b5d1cee',
								'label' => 'Position',
								'name' => 'position',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'parent_repeater' => 'field_66c7b78fd1ceb',
							),
							array(
								'key' => 'field_66c7b7c4d1cef',
								'label' => 'Testimonial text',
								'name' => 'testimonial_text',
								'aria-label' => '',
								'type' => 'textarea',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'rows' => 3,
								'placeholder' => '',
								'new_lines' => '',
								'parent_repeater' => 'field_66c7b78fd1ceb',
							),
							array(
								'key' => 'field_66c7b7ecd1cf0',
								'label' => 'Alter text',
								'name' => 'alter_text',
								'aria-label' => '',
								'type' => 'textarea',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'rows' => 2,
								'placeholder' => '',
								'new_lines' => '',
								'parent_repeater' => 'field_66c7b78fd1ceb',
							),
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-careers.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
	acf_add_local_field_group( array(
		'key' => 'group_66c7ba68d3d89',
		'title' => 'Team - Page',
		'fields' => array(
			array(
				'key' => 'field_66c7ba8010ea6',
				'label' => 'Main Banner',
				'name' => 'main_banner',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66c7ba8010ea7',
						'label' => 'Eyebrown',
						'name' => 'eyebrown',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Careers',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66c7ba8010ea8',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Join Us',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66c7ba8010ea9',
						'label' => 'Resume',
						'name' => 'resume',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Working at Accumulus Synergy is more than a job, it’s a passion and a responsibility. We’re a community of diverse individuals driven by a common purpose — to accelerate the availability of therapies to patients through a global digital transformation.',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
					array(
						'key' => 'field_66c7ba8010eac',
						'label' => 'BG banner - Desktop',
						'name' => 'bg_banner_desktop',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66c7ba8010ead',
						'label' => 'BG banner - Tablet',
						'name' => 'bg_banner_tablet',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_66c7ba8010eae',
						'label' => 'BG banner - Mobile',
						'name' => 'bg_banner_mobile',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium',
					),
				),
			),
			array(
				'key' => 'field_66c7bac73ff9b',
				'label' => 'Leadership section',
				'name' => 'leadership_section',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66c7bad63ff9c',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Leadership',
						'maxlength' => '',
						'rows' => 2,
						'placeholder' => '',
						'new_lines' => 'br',
					),
					array(
						'key' => 'field_66c7baf03ff9d',
						'label' => 'Description',
						'name' => 'description',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'A first-of-its-kind data and information exchange platform for the drug development lifecycle. Built for the process needs of today and the evolving life sciences–regulatory landscape of the future.',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
				),
			),
			array(
				'key' => 'field_66c7bb113ff9e',
				'label' => 'Directors Section',
				'name' => 'directors_section',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66c7bb1c3ff9f',
						'label' => 'Title',
						'name' => 'title',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'The Board of
				Directors',
						'maxlength' => '',
						'rows' => 2,
						'placeholder' => '',
						'new_lines' => 'br',
					),
					array(
						'key' => 'field_66c7bb353ffa0',
						'label' => 'Description',
						'name' => 'description',
						'aria-label' => '',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id nec aliquet risus nunc amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut in morbi id.',
						'maxlength' => '',
						'rows' => 3,
						'placeholder' => '',
						'new_lines' => '',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-team.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );

} );

add_action( 'init', function() {
	register_taxonomy( 'events-categories', array(
		0 => 'event',
	), array(
		'labels' => array(
			'name' => 'Events Categories',
			'singular_name' => 'Event Category',
			'menu_name' => 'Events Categories',
			'all_items' => 'All Events Categories',
			'edit_item' => 'Edit Event Category',
			'view_item' => 'View Event Category',
			'update_item' => 'Update Event Category',
			'add_new_item' => 'Add New Event Category',
			'new_item_name' => 'New Event Category Name',
			'parent_item' => 'Parent Event Category',
			'parent_item_colon' => 'Parent Event Category:',
			'search_items' => 'Search Events Categories',
			'not_found' => 'No events categories found',
			'no_terms' => 'No events categories',
			'filter_by_item' => 'Filter by event category',
			'items_list_navigation' => 'Events Categories list navigation',
			'items_list' => 'Events Categories list',
			'back_to_items' => '← Go to events categories',
			'item_link' => 'Event Category Link',
			'item_link_description' => 'A link to a event category',
		),
	'public' => true,
	'hierarchical' => true,
	'show_in_menu' => true,
	'show_in_rest' => true,
	) );

	register_taxonomy( 'news-categories', array(
		0 => 'new',
	), array(
		'labels' => array(
			'name' => 'News CMS Categories',
			'singular_name' => 'New CMS Category',
			'menu_name' => 'News Taxonomies',
			'all_items' => 'All News Taxonomies',
			'edit_item' => 'Edit New Taxonom',
			'view_item' => 'View New Taxonom',
			'update_item' => 'Update New Taxonom',
			'add_new_item' => 'Add New New Taxonom',
			'new_item_name' => 'New New Taxonom Name',
			'parent_item' => 'Parent New CMS Category',
			'parent_item_colon' => 'Parent New CMS Category:',
			'search_items' => 'Search News Taxonomies',
			'not_found' => 'No news taxonomies found',
			'no_terms' => 'No news taxonomies',
			'filter_by_item' => 'Filter by new cms category',
			'items_list_navigation' => 'News Taxonomies list navigation',
			'items_list' => 'News Taxonomies list',
			'back_to_items' => '← Go to news taxonomies',
			'item_link' => 'New Taxonom Link',
			'item_link_description' => 'A link to a new taxonom',
		),
	'public' => true,
	'hierarchical' => true,
	'show_in_menu' => true,
	'show_in_rest' => true,
	'show_admin_column' => true,
) );

	register_taxonomy( 'resources-taxonomies', array(
	0 => 'resource-cms',
), array(
	'labels' => array(
		'name' => 'Resources Taxonomies',
		'singular_name' => 'Resource Taxonomy',
		'menu_name' => 'Resources Taxonomies',
		'all_items' => 'All Resources Taxonomies',
		'edit_item' => 'Edit Resource Taxonomy',
		'view_item' => 'View Resource Taxonomy',
		'update_item' => 'Update Resource Taxonomy',
		'add_new_item' => 'Add New Resource Taxonomy',
		'new_item_name' => 'New Resource Taxonomy Name',
		'search_items' => 'Search Resources Taxonomies',
		'not_found' => 'No resources taxonomies found',
		'no_terms' => 'No resources taxonomies',
		'items_list_navigation' => 'Resources Taxonomies list navigation',
		'items_list' => 'Resources Taxonomies list',
		'back_to_items' => '← Go to resources taxonomies',
		'item_link' => 'Resource Taxonomy Link',
		'item_link_description' => 'A link to a resource taxonomy',
	),
	'public' => true,
	'hierarchical' => true,
	'show_in_menu' => true,
	'show_in_rest' => true,
	'show_tagcloud' => false,
	'show_admin_column' => true,
	'meta_box_cb' => false,
	'sort' => true,
) );
} );

add_action( 'init', function() {
	register_post_type( 'event', array(
	'labels' => array(
		'name' => 'Events',
		'singular_name' => 'Event',
		'menu_name' => 'Events',
		'all_items' => 'All Events',
		'edit_item' => 'Edit Event',
		'view_item' => 'View Event',
		'view_items' => 'View Events',
		'add_new_item' => 'Add New Event',
		'add_new' => 'Add New Event',
		'new_item' => 'New Event',
		'parent_item_colon' => 'Parent Event:',
		'search_items' => 'Search Events',
		'not_found' => 'No events found',
		'not_found_in_trash' => 'No events found in Trash',
		'archives' => 'Event Archives',
		'attributes' => 'Event Attributes',
		'insert_into_item' => 'Insert into event',
		'uploaded_to_this_item' => 'Uploaded to this event',
		'filter_items_list' => 'Filter events list',
		'filter_by_date' => 'Filter events by date',
		'items_list_navigation' => 'Events list navigation',
		'items_list' => 'Events list',
		'item_published' => 'Event published.',
		'item_published_privately' => 'Event published privately.',
		'item_reverted_to_draft' => 'Event reverted to draft.',
		'item_scheduled' => 'Event scheduled.',
		'item_updated' => 'Event updated.',
		'item_link' => 'Event Link',
		'item_link_description' => 'A link to a event.',
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-calendar',
	'supports' => array(
		0 => 'title',
		1 => 'editor',
		2 => 'excerpt',
		3 => 'thumbnail',
	),
	'delete_with_user' => false,
	) );

	register_post_type( 'news', array(
	'labels' => array(
		'name' => 'News CMS',
		'singular_name' => 'New CMS',
		'menu_name' => 'News',
		'all_items' => 'All News',
		'edit_item' => 'Edit New',
		'view_item' => 'View New',
		'view_items' => 'View News',
		'add_new_item' => 'Add New New',
		'add_new' => 'Add New New',
		'new_item' => 'New New',
		'parent_item_colon' => 'Parent New:',
		'search_items' => 'Search News',
		'not_found' => 'No news found',
		'not_found_in_trash' => 'No news found in Trash',
		'archives' => 'New Archives',
		'attributes' => 'New Attributes',
		'insert_into_item' => 'Insert into new',
		'uploaded_to_this_item' => 'Uploaded to this new',
		'filter_items_list' => 'Filter news list',
		'filter_by_date' => 'Filter news by date',
		'items_list_navigation' => 'News list navigation',
		'items_list' => 'News list',
		'item_published' => 'New published.',
		'item_published_privately' => 'New published privately.',
		'item_reverted_to_draft' => 'New reverted to draft.',
		'item_scheduled' => 'New scheduled.',
		'item_updated' => 'New updated.',
		'item_link' => 'New Link',
		'item_link_description' => 'A link to a new.',
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_position' => 9,
	'menu_icon' => 'dashicons-admin-site-alt2',
	'supports' => array(
		0 => 'title',
		1 => 'author',
		2 => 'editor',
		3 => 'excerpt',
		4 => 'thumbnail',
	),
	'taxonomies' => array(
		0 => 'news-categories',
	),
	'delete_with_user' => false,
	) );

	register_post_type( 'resource-cms', array(
	'labels' => array(
		'name' => 'Resources CMS',
		'singular_name' => 'Resource CMS',
		'menu_name' => 'Resources CMS',
		'all_items' => 'All Resources CMS',
		'edit_item' => 'Edit Resource CMS',
		'view_item' => 'View Resource CMS',
		'view_items' => 'View Resources CMS',
		'add_new_item' => 'Add New Resource CMS',
		'add_new' => 'Add New Resource CMS',
		'new_item' => 'New Resource CMS',
		'parent_item_colon' => 'Parent Resource CMS:',
		'search_items' => 'Search Resources CMS',
		'not_found' => 'No resources cms found',
		'not_found_in_trash' => 'No resources cms found in Trash',
		'archives' => 'Resource CMS Archives',
		'attributes' => 'Resource CMS Attributes',
		'insert_into_item' => 'Insert into resource cms',
		'uploaded_to_this_item' => 'Uploaded to this resource cms',
		'filter_items_list' => 'Filter resources cms list',
		'filter_by_date' => 'Filter resources cms by date',
		'items_list_navigation' => 'Resources CMS list navigation',
		'items_list' => 'Resources CMS list',
		'item_published' => 'Resource CMS published.',
		'item_published_privately' => 'Resource CMS published privately.',
		'item_reverted_to_draft' => 'Resource CMS reverted to draft.',
		'item_scheduled' => 'Resource CMS scheduled.',
		'item_updated' => 'Resource CMS updated.',
		'item_link' => 'Resource CMS Link',
		'item_link_description' => 'A link to a resource cms.',
	),
	'public' => true,
	'show_in_rest' => true,
	'menu_icon' => 'dashicons-welcome-widgets-menus',
	'supports' => array(
		0 => 'title',
		1 => 'editor',
		2 => 'excerpt',
		3 => 'thumbnail',
	),
	'taxonomies' => array(
		0 => 'resources-taxonomies',
	),
	'delete_with_user' => false,
	) );

} );

add_action( 'acf/init', function() {
	acf_add_options_page( array(
		'page_title' => 'Team',
		'menu_slug' => 'team-members',
		'icon_url' => 'dashicons-admin-users',
		'menu_title' => 'Team Members',
		'position' => '',
		'redirect' => false,
	) );
} );

