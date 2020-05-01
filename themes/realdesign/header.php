<?php 
 // http://www.allpraisemedia.com
 // info@allpraisemedia.com
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    
    <?php //Viewport meta tag specify how the browser should display the page zoom level and dimensions. ?>
    <meta name="viewport" content="width=devrealdesign-width, initial-scale=1">
    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php 
		/*
	 	* Always have wp_head() just before the closing </head>
	 	* tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
	 	* as styles, scripts, and meta tags.
	 	*/
		wp_head(); 
		
	?>

</head>
<body <?php body_class(); ?>>
	<?php
		echo '<div id="wrapper">';
		echo '<div id="banner">';
		echo '<div id="bannerleft">';
		echo '<p id="sitename">'; 
		?>
		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php 
		echo '</p>';
		echo '<p id="description">';
		bloginfo( 'description' );
		echo '</p>';
		echo '</div>';
		//added change
		if (get_option( 'search-option' ) == 'true' ) {
			echo '<div id="bannerright">';
			echo '<a href="javascript://" class="searchbar">';
			echo '<img src="'.esc_url( get_template_directory_uri() ) .'/images/icons/search-white.png">';
			echo '</a>';
			echo '</div>';
		}
		//end change
		echo '</div>';
		echo '<div id="left">';

		//Menu
		wp_nav_menu( array( 'theme_location' => 'primary' , 'container_class' => 'menu-header' ) );
		echo '<p>&nbsp;</p>';
			
		//Social Media
		if (get_theme_mod('facebook_link') || get_theme_mod('twitter_link') || get_theme_mod('linkedin_link') != '') {
			echo '<div id="social">';
			echo '<p>';
			_e('Follow Us', 'realdesign');
			echo '</p>';
			if( get_theme_mod( 'facebook_link' ) != '') { ?>
			<a href="<?php echo esc_url( get_theme_mod('facebook_link')); ?>" >
        		<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/facebook_64.png" alt="Facebook" />
        	</a>
		<?php } 
		if( get_theme_mod( 'twitter_link' ) != '') { ?>
        	<a href="<?php echo esc_url( get_theme_mod('twitter_link')); ?>" >
				<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/twitter_64.png" alt="twitter" />
            </a>
		<?php } 
		if( get_theme_mod( 'linkedin_link' ) != '') { ?>
        	<a href="<?php echo esc_url( get_theme_mod('linkedin_link')); ?>" >
				<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/linkedin_64.png" alt="linkedin" />
			</a>
		<?php } 
		echo '</div>';
		}
	echo '</div>';
?>