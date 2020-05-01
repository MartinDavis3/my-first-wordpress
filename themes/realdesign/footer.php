<?php

	echo '<div id="footer">';
    wp_nav_menu( array('theme_location' => 'secondary' , 'container_class' => 'menu-footer' )); 
	printf( __( 'Copyright &#169; %1$s. %2$s. All Rights Reserved.',  'realdesign' ), date_i18n( 'Y' ), get_bloginfo( 'name' ) );  

	if (get_option( 'poweredby-option' ) == '') {
	}else {
		esc_html_e(' Powered by', 'realdesign');
		$apmurl = 'http://www.allpraisemedia.com'; 
		?>
        <a href="<?php echo esc_url($apmurl); ?>" title='<?php esc_attr_e(' All Praise Media LLP', 'realdesign');?>' ><?php esc_attr_e(' All Praise Media LLP', 'realdesign'); ?></a>
        <?php
		echo "</a>";
	}
	echo '<br/>';
	//End footer
	echo '</div>';
	echo '</div>';

	//Menu will appear when users successfully log in
	if(is_user_logged_in()){
		
		if ( has_nav_menu( 'tertiary' ) ) {
			echo '<div class="usermenu" >';
			echo '<h3>';
			esc_html_e('User Menu', 'realdesign');
			echo '</h3>'; 
			wp_nav_menu( array( 'theme_location' => 'tertiary' ) );
			echo '</div>';
		}
	}
	//Footer
	wp_footer();	
?>
</body>
</html>