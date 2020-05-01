<?php
/*
 * Copyright (C) 2013. All rights reserved.
 * Template Name: Sitemap 
*/  

	//Header
	get_header(); 

	echo '<div id="right">';
	echo '<p id="sitename">';
	bloginfo('name');
	echo '</p>';
	echo '<p id="description">';
	bloginfo('description');
	echo '</p>';
	//Creates the desired content at the top of the sitemap. This contenet can be changed in the wordpress admin
	if (have_posts()) : while (have_posts()) : the_post();
		the_content();
	endwhile; endif; 
	//end post 

	echo '<p>&nbsp;</p>';
	echo '<table width="600" cellspacing="4" cellpadding="2" style="border:none;">';
	echo '<tr>';
	//Primary Menu
	echo '<td style="border:none; vertical-align:top; width:50%;">'; 
	echo '<ul class="sitemap">';
	wp_nav_menu( array('theme_location' => 'primary' )); 
	echo '</ul>';
	echo '</td>';
	//Secondary Menu
	echo '<td style="border:none; vertical-align:top; width:50%;">'; 
	echo '<ul class="sitemap">';
	wp_nav_menu( array('theme_location' => 'secondary' )); 
	echo '</ul>';
	echo '</td>';
	//Tertiary Menu
	//Only users that are logged in will see this menu
	if(is_user_logged_in()){
		echo '<td style="border:none; vertical-align:top; width:50%;">';
		echo '<ul class="sitemap">';
		wp_nav_menu( array('theme_location' => 'tertiary' )); 
		echo '</ul>';
		echo '</td>';
	}
	echo '</tr>';
	echo '</table>';
	echo '</div>';

	get_footer(); 
?>
