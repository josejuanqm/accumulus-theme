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



/**
* 
* GET RESOURCES CMS
* 
*/


add_action('wp_ajax_nopriv_get_resources', 'getResources');
add_action('wp_ajax_get_resources', 'getResources');
function getResources() {
	$category = (int)$_REQUEST["c"];
	$offset = $_REQUEST["page"]-1;
	$per_page = 8;
	$args = array(
		'post_type' => 'resource-cms',
		'post_status' => 'publish',
		'offset' => $offset*$per_page,
		'posts_per_page' => $per_page,
		'order' => 'DESC',
	);

	if($category != 0) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'resources-taxonomies',
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

	// var_dump($posts);


	$s = $_REQUEST["s"];
	$offset = $_REQUEST["page"]-1;

	$html = "";
	$paginador = "";

	$destacados = array_slice($posts, 0, 1, true);
	$restantes = array_slice($posts, 1);

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
			<div class="card col-span-12 md:col-span-6 lg:col-span-8 relative lg:flex lg:items-stretch w-full rounded-card overflow-hidden ';
			if ($categorySlug == 'thought-leadership'): 
			$html .= 'bg-secondary-green text-neutral-nwhite';
			elseif ($categorySlug == 'media'): 
			$html .= 'bg-primary-glaciar text-neutral-dgray';
			elseif ($categorySlug == 'e-books-white-papers'): 
			$html .= 'bg-neutral-offwhite text-neutral-dgray'; 
			endif;
			$html .= '">

			<a href="'. get_permalink( $post->ID ). '" class="absolute top-0 left-0 w-full h-full z-10"></a>';

			if (has_post_thumbnail( $post->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			$html .= '<div class="relative w-full lg:w-1/2 flex items-center justify-center h-[275px] lg:h-full bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url('. $image[0] .')">
			</div>';

			endif;


			$html .= '<div class="flex flex-col lg:w-1/2 lg:justify-end p-7 gap-2">
			<div class="flex items-center gap-3 uppercase">';

			if ($categorySlug == 'thought-leadership'):
			$html.= '<svg width="15" height="13" viewBox="0 0 15 13" fill="none">
			<path d="M13.2773 2.88949V11.5558H11.8331V1.08477C11.8331 0.485348 11.3478 0 10.7484 0H1.36211C0.762687 0 0.277344 0.485348 0.277344 1.08477V11.5558C0.277344 12.3532 0.924114 13 1.72155 13H13.2773C14.0748 13 14.7215 12.3532 14.7215 11.5558V2.88949H13.2773ZM1.72155 11.5558V1.44421H10.3879V11.5547H1.72155V11.5558Z" class=" fill-current"/>
			<path d="M8.94196 8.66504H3.16406V10.1092H8.94196V8.66504Z" class="fill-current"/>
			<path d="M8.94196 5.77832H3.16406V7.22253H8.94196V5.77832Z" class="fill-current"/>
			<path d="M8.94196 2.8877H3.16406V4.3319H8.94196V2.8877Z" class="fill-current"/>
			</svg>';
			elseif ($categorySlug == 'media'):
			$html.= '<svg width="14" height="13" viewBox="0 0 14 13" fill="none">
			<path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
			<path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
			<path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
			<path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
			</svg>';
			elseif ($categorySlug == 'e-books-white-papers'): 
			$html.= '<svg width="10" height="13" viewBox="0 0 10 13" fill="none">
			<path d="M8.28059 11.1674H1.61382V1.83355H2.94737V0.5H1.56067C0.854038 0.5 0.28125 1.07279 0.28125 1.77942V11.131C0.28125 11.8869 0.894386 12.5 1.65023 12.5H8.24615C9.00199 12.5 9.61513 11.8869 9.61513 11.131V5.83322H8.28158V11.1664L8.28059 11.1674Z" class="fill-current"/>
			<path d="M9.37538 3.71823L6.15911 0.500977H4.27344H4.27442V5.8342H9.60764V3.94951L9.37538 3.71823ZM5.60699 4.50065V1.83453L6.95825 3.18678L8.27311 4.50065H5.60699Z" class="fill-current"/>
			</svg>';
			endif;
			$html .= '<span>'. $category .'</span>';

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

		$html .= '
		<div class="card col-span-12 md:col-span-6 lg:col-span-4 relative w-full rounded-card overflow-hidden ';
		if ($categorySlug == 'thought-leadership'): 
			$html .= 'bg-secondary-green text-neutral-nwhite';
		elseif ($categorySlug == 'media'): 
			$html .= 'bg-primary-glaciar text-neutral-dgray';
		elseif ($categorySlug == 'e-books-white-papers'): 
			$html .= 'bg-neutral-offwhite text-neutral-dgray'; 
		endif;
		$html .= '">

		<a href="'.get_permalink( $post->ID ).'" class="absolute top-0 left-0 w-full h-full z-10"></a>';

		if (has_post_thumbnail( $post->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			$html .= '<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url('. $image[0] .')">
			</div>';

		endif;


		$html .= '<div class="flex flex-col p-7 gap-2">
		<div class="flex items-center gap-3 uppercase">';

		if ($categorySlug == 'thought-leadership'):
			$html.= '<svg width="15" height="13" viewBox="0 0 15 13" fill="none">
			<path d="M13.2773 2.88949V11.5558H11.8331V1.08477C11.8331 0.485348 11.3478 0 10.7484 0H1.36211C0.762687 0 0.277344 0.485348 0.277344 1.08477V11.5558C0.277344 12.3532 0.924114 13 1.72155 13H13.2773C14.0748 13 14.7215 12.3532 14.7215 11.5558V2.88949H13.2773ZM1.72155 11.5558V1.44421H10.3879V11.5547H1.72155V11.5558Z" class=" fill-current"/>
			<path d="M8.94196 8.66504H3.16406V10.1092H8.94196V8.66504Z" class="fill-current"/>
			<path d="M8.94196 5.77832H3.16406V7.22253H8.94196V5.77832Z" class="fill-current"/>
			<path d="M8.94196 2.8877H3.16406V4.3319H8.94196V2.8877Z" class="fill-current"/>
			</svg>';
		elseif ($categorySlug == 'media'):
			$html.= '<svg width="14" height="13" viewBox="0 0 14 13" fill="none">
			<path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
			<path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
			<path d="M11.8366 0H1.72593C0.928423 0 0.28125 0.647175 0.28125 1.44468V13H1.72593V1.44468H11.8366V11.5553H3.16955V13H11.8366C12.6341 13 13.2812 12.3528 13.2812 11.5553V1.44468C13.2812 0.647175 12.6341 0 11.8366 0Z" class="fill-current"/>
			<path d="M5.96394 3.94824V3.95784H4.85938V9.09792H5.89464L9.04522 6.99753V6.00278L5.96394 3.94824ZM6.24542 5.80127L7.29348 6.49962L6.24542 7.19798V5.80021V5.80127Z" class="fill-current"/>
			</svg>';
		elseif ($categorySlug == 'e-books-white-papers'): 
			$html.= '<svg width="10" height="13" viewBox="0 0 10 13" fill="none">
			<path d="M8.28059 11.1674H1.61382V1.83355H2.94737V0.5H1.56067C0.854038 0.5 0.28125 1.07279 0.28125 1.77942V11.131C0.28125 11.8869 0.894386 12.5 1.65023 12.5H8.24615C9.00199 12.5 9.61513 11.8869 9.61513 11.131V5.83322H8.28158V11.1664L8.28059 11.1674Z" class="fill-current"/>
			<path d="M9.37538 3.71823L6.15911 0.500977H4.27344H4.27442V5.8342H9.60764V3.94951L9.37538 3.71823ZM5.60699 4.50065V1.83453L6.95825 3.18678L8.27311 4.50065H5.60699Z" class="fill-current"/>
			</svg>';
		endif;
		$html .= '<span>'. $category .'</span>';

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
		"paginador" => $paginador
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
	$category = (int)$_REQUEST["c"];
	$offset = $_REQUEST["page"]-1;
	$per_page = 8;
	$args = array(
		'post_type' => 'news',
		'post_status' => 'publish',
		'offset' => $offset*$per_page,
		'posts_per_page' => $per_page,
		'order' => 'DESC',
	);

	if($category != 0) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'news-categories',
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

	// var_dump($posts);


	$s = $_REQUEST["s"];
	$offset = $_REQUEST["page"]-1;

	$html = "";
	$paginador = "";

	$destacados = array_slice($posts, 0, 1, true);
	$restantes = array_slice($posts, 1);

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
			<div class="card col-span-12 md:col-span-6 lg:col-span-8 relative lg:flex lg:items-stretch w-full rounded-card overflow-hidden ';
			if ($categorySlug == 'media-coverage'): 
			$html .= 'bg-secondary-carbon text-neutral-nwhite';
			elseif ($categorySlug == 'new-releases'): 
			$html .= 'bg-secondary-aqua text-neutral-dgray';
			endif;
			$html .= '">';

			if ($categorySlug == 'media-coverage'):
				$html .= '<a href="'. $url_new_realice .'" target="_blank" class="absolute top-0 left-0 w-full h-full z-10"></a>';
			elseif ($categorySlug == 'new-releases'):
				$html .= '<a href="'.get_permalink( $post->ID ).'" class="absolute top-0 left-0 w-full h-full z-10"></a>';
			endif;

			if (has_post_thumbnail( $post->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			$html .= '<div class="relative w-full lg:w-1/2 flex items-center justify-center h-[275px] lg:h-full bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url('. $image[0] .')">
			</div>';

			endif;


			$html .= '<div class="flex flex-col lg:w-1/2 lg:justify-end p-7 gap-2">
			<div class="flex items-center gap-3 uppercase">';

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
			$html .= '<span>'. $category .'</span>';

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
		if ($categorySlug == 'media-coverage'): 
			$html .= 'bg-secondary-carbon text-neutral-nwhite';
		elseif ($categorySlug == 'new-releases'): 
			$html .= 'bg-secondary-aqua text-neutral-dgray';
		endif;
		$html .= '">';

		if ($categorySlug == 'media-coverage'):
			$html .= '<a href="'. $url_new_realice .'" target="_blank" class="absolute top-0 left-0 w-full h-full z-10"></a>';
		elseif ($categorySlug == 'new-releases'):
			$html .= '<a href="'.get_permalink( $post->ID ).'" class="absolute top-0 left-0 w-full h-full z-10"></a>';
		endif;


		if (has_post_thumbnail( $post->ID ) ):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

			$html .= '<div class="relative w-full flex items-center justify-center h-[275px] lg:h-[320px] bg-cover bg-no-repeat bg-center aspect-square" style="background-image: url('. $image[0] .')">
			</div>';

		endif;


		$html .= '<div class="flex flex-col p-7 gap-2">
		<div class="flex items-center gap-3 uppercase">';

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
		$html .= '<span>'. $category .'</span>';

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
		"paginador" => $paginador
	));
}