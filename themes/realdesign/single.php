<?php

	//Header
	get_header();
	
	echo '<div id="right">'; 
	echo '<div id="sidebar">';
	//added change
	if (get_option( 'search-option' ) == 'true' ) {
		echo '<div class="displaysearch">';
		get_search_form();
		echo '</div>';//displaysearch end
	}
	//end change		
	realdesign_loop();
	echo '</div>';//sidebar end
	//Sidebar
	if (get_option( 'sidebar-option' ) == 'true') { 
		get_sidebar();
	}
	//End div
	echo '</div>';//right end
	
	//Footer 
	get_footer(); 

?>