<?php
/*
 * Template Name: 404 Page Template
*/

	get_header();
			
	echo '<div id="right">';
	echo '<h2>';
	esc_html_e( 'We Are Sorry!', 'realdesign' ); 
	echo '</h2>';
	//added change
	if (get_option( 'search-option' ) == 'true' ) {
		echo '<div class="displaysearch">';
		get_search_form();
		echo '</div>';
	}
	//end change
    echo '<h3>';
	esc_html_e( 'Error: 404', 'realdesign');
	echo '</h3>';
    echo '<p>';
	esc_html_e( 'Sorry, the page you requested may have been remove or deleted, 
		you may navigate the below links to go back to the home page or 
		you may contact us.', 'realdesign');
	echo '</p>';
	echo '<p>';
    echo '<ul>';
    echo '<li>';
	echo '<a href="' . esc_url(home_url()) . '">' . ( 'Back to homepage'); 
	echo '</a>';
	echo '</li>';
    echo '</ul>';
    echo '<p>';
	esc_html_e( 'Thank You!', 'realdesign'); 
	echo '<br />';
	esc_html_e( 'The Site Manager', 'realdesign'); 
	echo '</p>';
	echo '</div>';
	get_footer(); 
?>