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



/*
*
* ACF fields
*
*/



add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_6625c9e3f2b2c',
	'title' => 'Contact',
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
	'key' => 'group_666200ea823a4',
	'title' => 'Events',
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
	'key' => 'group_666785a13b672',
	'title' => 'Main banner - ALL PAGES',
	'fields' => array(
		array(
			'key' => 'field_666785a13ed87',
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
			'required' => 1,
			'conditional_logic' => 0,
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
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-get-started.php',
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
			'default_value' => '',
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
			'default_value' => '',
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
			'default_value' => '',
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
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_66175a71b13db',
			'label' => 'Marquee images',
			'name' => 'marquee_images',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
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
	'key' => 'group_665d32031bdca',
	'title' => 'News Post type',
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
	'title' => 'Values',
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
							'label' => 'Description',
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
			'default_value' => '',
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
			'default_value' => '',
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
			'default_value' => '',
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
			'default_value' => '',
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
			'default_value' => '',
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
			'default_value' => '',
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
			'default_value' => '',
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

