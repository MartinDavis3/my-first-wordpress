<?php
/**
 * Copyright (C) 2015. All rights reserved. 
 * Template Name: Search Page
*/  

	//Header
	get_header();

	echo '<div id="right">';
	
	echo '<h2>';
	printf( __( 'Search Results for: %s', 'realdesign' ), '<span>' . get_search_query() . '</span>');
	echo '</h2>';
	get_search_form();
	
	if ( have_posts() ) {
		get_template_part( 'loop', 'search' );
	} else {
		echo '<h3>';
		_e( 'Nothing Found','realdesign' ); 
		echo '</h3>';
		echo '<p>';
		esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'realdesign' );
		echo '</p>';
		
	}
	
	//End Main Content
	echo '</div>';	

	//Footer
	get_footer();	
?>