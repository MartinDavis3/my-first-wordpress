<?php
/**
 * Template Name: Full-Page
*/  

	//Header
	get_header();
			
	echo '<div id="right">';	
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
					echo '" width="';
					echo '100%';
					echo '" height="';
					echo '100%';
					echo '" alt="" style="padding-top: 10px;"/>';
			
		endif; 
	}
	//Main Content
	if (have_posts()) : while (have_posts()) : the_post();
	echo '<h3 id="title">'; 
	the_title(); 
	echo '</h3>';
      		
	echo '<p>'; 
	the_content(__('(more...)', 'realdesign')); 
	'</p>';
	comments_template( '', true );
	endwhile; else:
	
	echo '<p>'; 
	esc_html_e('Sorry, no posts matched your criteria.','realdesign'); 
	echo '</p>'; 
	
	endif;

	//End Main Content
	echo '</div>';


	//Footer
    get_footer(); 
?>