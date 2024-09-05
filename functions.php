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
            'library' => 'uploadedTo',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
            'preview_size' => 'medium',
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
// add_mega_menu_items();


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

	// require get_template_directory() . '/template-parts/acf/general-custom-fields.php';

	include_once get_stylesheet_directory() .'template-parts/acf/general-custom-fields.php';

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
	'page_title' => 'Configure Form to access free PDF',
	'menu_slug' => 'configure-form-to-access-free-pdf',
	'icon_url' => 'dashicons-media-spreadsheet',
	'position' => '',
	'redirect' => false,
) );

	acf_add_options_page( array(
	'page_title' => 'Team',
	'menu_slug' => 'team-members',
	'icon_url' => 'dashicons-admin-users',
	'menu_title' => 'Team Members',
	'position' => '',
	'redirect' => false,
) );
} );




/* 

* Gravity forms

*/

add_filter( 'gform_confirmation', function ( $confirmation, $form, $entry, $ajax ) {
	GFCommon::log_debug( 'gform_confirmation: running.' );

	$forms = array( 1, 2 ); // Target forms with id 3, 6 and 7. Change this to fit your needs.

	if ( ! in_array( $form['id'], $forms ) || empty( $confirmation['redirect'] ) ) {
			return $confirmation;
	}

	$url = esc_url_raw( $confirmation['redirect'] );
	GFCommon::log_debug( __METHOD__ . '(): Redirect to URL: ' . $url );
	$confirmation = 'Thanks for contacting us! We will get in touch with you shortly.';
	$confirmation .= GFCommon::get_inline_script_tag( "window.open('$url', '_blank');" );

	return $confirmation;
}, 10, 4 );