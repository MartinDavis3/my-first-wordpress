<?php

//Used to set the width of images and content. Should be equal to the width the theme
//is designed for, generally via the style.css stylesheet.
if ( ! isset( $content_width ) ) $content_width = 1100;

function realdesign_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	load_theme_textdomain('realdesign');
	
	//Adding Theme Support
	add_theme_support( 'title-tag' );
	
	//Enabling Support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	//Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'realdesign' ) );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'realdesign' ),
		'secondary' => __( 'Secondary in footer', 'realdesign' ),
		'tertiary'  => __( 'Tertiary for logged in users', 'realdesign' ),
	) );

	//Custom header is an image that is chosen as the representative image in the theme top header section.
	//http://codex.wordpress.org/Custom_Headers
	$headerdefaults = array(
		'default-image'          => get_template_directory_uri() . '/images/headers/CherryBlossom.jpg',
		'width'                  => 940,
		'height'                 => 198,
		'flex-height'            => false,
		'flex-width'             => false,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true, //Header Text Modification
		'default-text-color'     => '#FFFFFF', //Header Text Color
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		);
	add_theme_support( 'custom-header', $headerdefaults );
	
	set_post_thumbnail_size( $headerdefaults['width'], $headerdefaults['height'], true );
	
	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'rocks' => array(
			'url' => '%s/images/headers/rocks.jpg',
			'thumbnail_url' => '%s/images/headers/rocks-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Rocks', 'realdesign' )
		),
		'redflower' => array(
			'url' => '%s/images/headers/redflower.jpg',
			'thumbnail_url' => '%s/images/headers/redflower-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Red Flower', 'realdesign' )
		),
		'ice' => array(
			'url' => '%s/images/headers/ice.jpg',
			'thumbnail_url' => '%s/images/headers/ice-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Ice', 'realdesign' )
		),
		'geese' => array(
			'url' => '%s/images/headers/geese.jpg',
			'thumbnail_url' => '%s/images/headers/geese-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Geese', 'realdesign' )
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Fern', 'realdesign' )
		),
		'CherryBlossom' => array(
			'url' => '%s/images/headers/CherryBlossom.jpg',
			'thumbnail_url' => '%s/images/headers/CherryBlossom-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Cherry Blossom', 'realdesign' )
		),
		'ducks' => array(
			'url' => '%s/images/headers/ducks.jpg',
			'thumbnail_url' => '%s/images/headers/ducks-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Ducks', 'realdesign' )
		),
	) );
	
	//Custom Backgrounds is a theme feature that provides for customization of the background color and image. 
	//http://codex.wordpress.org/Custom_Backgrounds
	$backgrounddefaults = array(
		'default-color'          => 'F1F1F1', //Background Color
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
		);
	add_theme_support( 'custom-background', $backgrounddefaults );
}

add_action( 'after_setup_theme', 'realdesign_setup' );  
/****************************************
 * Enqueue scripts and styles	     
 ****************************************/

function realdesign_enqueue_style() { 
		// Load our main stylesheet.
	    wp_enqueue_style( 'realdesign-style', get_stylesheet_uri() );
		wp_enqueue_style( 'realdesign-menu', esc_url( get_template_directory_uri() ) . '/css/menu.css', false );
		wp_enqueue_style( 'realdesign-default', esc_url( get_template_directory_uri() ) . '/css/default.css', false );
		wp_enqueue_style( 'realdesign-advanced', esc_url( get_template_directory_uri() ) . '/css/advanced.css', false );
	}

function realdesign_enqueue_script() {
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
			 
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'jquery-effects-core');
	wp_enqueue_script( 'realdesign-search', esc_url( get_template_directory_uri() ) . '/js/search.js', false );
	
}

add_action( 'wp_enqueue_scripts', 'realdesign_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'realdesign_enqueue_script' );

/****************************************
 * Includes	     
 ****************************************/
require get_template_directory() . '/inc/customizer.php';

/****************************************
 * Wordpress Title	     
 ****************************************/
 
function realdesign_wp_title( $title )
{
  	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    	return ( bloginfo('name')  );
  	} else {
	  	return ( bloginfo('name') . ' | ' . get_the_title() ); 
  	}
  	return $title;
}
add_filter( 'wp_title', 'realdesign_wp_title' );

/****************************************
 * Wordpress Search	     
 ****************************************/
 if ( ! function_exists( 'realdesign_postinfo' ) ) :

function realdesign_postinfo() {	
	
	echo '<p>';
	// Translators: 1 is the post author, 2 is the post date.
 	printf( __( 'Written by %1$s on %2$s', 'realdesign' ), get_the_author(),
 	get_the_date() );
	echo '</p>';

}
endif;

/****************************************
 * Wordpress Comments    
 ****************************************/
 
if ( ! function_exists( 'realdesign_comment' ) ) {
	function realdesign_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) {
		case '' :
			
			echo '<li '; 
			comment_class(); 
			echo ' id="li-comment-';
			comment_ID();
			echo '">';
           
			echo '<div class="comment-author vcard">';
			echo get_avatar( $comment, 40 ); 
			printf( __( '%s <span class="says">says:</span>', 'realdesign' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );
			echo '</div>';
			if ( $comment->comment_approved == '0' ) { 
				echo '<em>';
				esc_html_e( 'Your comment is awaiting moderation.', 'realdesign'); 
				echo '</em>';
				echo '<br />';
			}
			
			echo '<div class="comment-meta commentmetadata"><a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '">';
			printf( __( '%1$s at %2$s', 'realdesign' ), get_comment_date(),  get_comment_time() ); 
			echo '</a>';
			edit_comment_link( __( '(Edit)', 'realdesign' ), ' ' );
			
			echo '</div>';
		
			echo '<div class="comment-body">';
			comment_text(); 
			echo '</div>';
		
			echo '<div class="reply">';
			comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 
			echo '</div>';
			//echo '</div>';
			
			break;
			
		case 'pingback'  :
		case 'trackback' :

			echo '<li class="post pingback">';
			echo '<p>';
			esc_html_e( 'Pingback:','realdesign' );
			comment_author_link();
			edit_comment_link( __('(Edit)', 'realdesign'), ' ' ); 
			echo '</p>';
	
		break;
		}
	}
}

/****************************************
 * Wordpress Single Post   
 ****************************************/
 
if ( ! function_exists( 'realdesign_loop' ) ) :
	function realdesign_loop() {	
 		echo '<h3>';
		the_title();
		echo '</h3>';
		echo '<p>';
		// Translators: 1 is the post author, 2 is the post date.
 		printf( __( 'Written by %1$s on %2$s', 'realdesign' ), get_the_author(),
 		get_the_date() );
		
		echo '</p>';	

		while ( have_posts() ) { 
			the_post();	
			if ( is_archive() || is_search() ) {
				the_excerpt(); 
			} else { 
				the_content( __( '<span class="meta-nav-r">Continue reading </span>', 'realdesign') ); 
				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'realdesign'), 'after' => '</div>' ) ); 
			} 
		
		comments_template( '', true );
	}
}
endif;

/****************************************
 * Wordpress Sidebar  
 ****************************************/

function realdesign_widgets_init() {
	//Primary sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget', 'realdesign' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Add widgets here to appear in your sidebar.', 'realdesign' ),
	) ); 
 	//Second sidebar
 	register_sidebar( array(
		'name' => __( 'Secondary Widget', 'realdesign' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'Optional secondary widget that displays below the primary widget in sidebar.', 'realdesign' ),
	) );
}
add_action( 'widgets_init', 'realdesign_widgets_init' );

?>