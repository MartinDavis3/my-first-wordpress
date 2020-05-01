<?php 

	//Header
	get_header();
	
	echo '<div id="right">'; 
	echo '<div id="sidebar">';	
	//added change
	if (get_option( 'search-option' ) == 'true' ) {
		echo '<div class="displaysearch">';
		get_search_form();
		echo '</div>';
	}
	//end change
	if ( is_front_page()) {
		if ( 
			is_singular() && current_theme_supports( 'post-thumbnails' ) &&
			has_post_thumbnail( $post->ID ) &&
			( 
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
			$image[1] >= $header_image_width 
			) :

		echo get_the_post_thumbnail( $post->ID );
		elseif ( get_header_image() ) :

			echo '<img src="';
			header_image();
			switch ( get_option( 'sidebar-option' ) ) { 
				case 'true':
					echo '" width="';
					echo '100%';
					echo '" height="';
					echo '100%';
					echo '" alt="" style="padding-top: 10px;"/>'; 
					break;
				case 'false':
					echo '" width="';
					echo esc_attr( $header_image_width );
					echo '" height="';
					echo esc_attr( $header_image_height );
					echo '" alt="" style="padding: 0 18px;"/>'; 
					break;
				default:
					echo '" width="';
					echo esc_attr( $header_image_width );
					echo '" height="';
					echo esc_attr( $header_image_height );
					echo '" alt="" style="padding: 0 18px;"/>'; 
					break;
			}
			
		endif; 
	}
	//Main Content
	if (have_posts()) {
		get_template_part( 'loop' );
		} else {
			echo '<p>'; 
			esc_html_e('Sorry, no posts matched your criteria.','realdesign'); 
			echo '</p>';
		}
	echo '</div>';

	//Sidebar
	if (! is_front_page() && get_option( 'sidebar-option' ) == 'true') {
		get_sidebar();
	}
	
	//End Main Content
	echo '</div>';

	//Footer
    get_footer(); 
?>