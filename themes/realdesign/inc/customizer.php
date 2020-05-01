<?php
/****************************************
 * Theme Customizer	     
 ****************************************/

//Adds the individual sections, settings, and controls to the theme customizer
function realdesign_customize_register( $wp_customize ) {
	
	//Search Option
    // Add settings for output description
    $wp_customize->add_setting( 'search-option', array(
        'default'    		=> '',
        'type'       		=> 'option',
		'sanitize_callback' => 'realdesign_sanitize_checkbox',
    	) 
	);

    // Add control and output for select field
    $wp_customize->add_control( 'search-option', array(
        'label'      => __( 'Search Option', 'realdesign' ),
        'section'    => 'title_tagline',
        'settings'   => 'search-option',
        'type'       => 'checkbox',
    	) 
	);	
	
	//Powered By
    // Add settings for output description
    $wp_customize->add_setting( 'poweredby-option', array(
        'default'    		=> 'true',
        'type'       		=> 'option',
		'sanitize_callback' => 'realdesign_sanitize_checkbox',
    	) 
	);

    // Add control and output for select field
    $wp_customize->add_control( 'poweredby-option', array(
        'label'      => __( 'Display Powered by?', 'realdesign' ),
        'section'    => 'title_tagline',
        'settings'   => 'poweredby-option',
        'type'       => 'checkbox',
    	) 
	);	
	
	//Widgets Bar
    // Add settings for output description
    $wp_customize->add_setting( 'sidebar-option', array(
        'default'    		=> 'false',
        'type'       		=> 'option',
		'sanitize_callback' => 'realdesign_sanitize_checkbox',
    	) 
	);

    // Add control and output for select field
    $wp_customize->add_control( 'sidebar-option', array(
        'label'      => __( 'Add sidebar to posts pages?', 'realdesign' ),
        'section'    => 'title_tagline',
        'settings'   => 'sidebar-option',
        'type'       => 'checkbox',
    	) 
	);	
	
	//Foreground Color Customizer
	$wp_customize->add_setting(
    	'foreground-color',
    	array(
        	'default' 			=> '#000',
			'sanitize'  		=> 'sanitize_text_field',
			'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control(
        	$wp_customize,
        	'foreground-color',
        	array(
            	'label'    => __('Foreground Color', 'realdesign'),
            	'section'  => 'colors',
            	'settings' => 'foreground-color'
        	)
   		)
	);
	
	//Border Color Customizer
	$wp_customize->add_setting(
    	'border-color',
    	array(
        	'default'           => '#f5a439',
			'sanitize'  		=> 'sanitize_text_field',
			'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control(
        	$wp_customize,
        	'border-color',
        	array(
            	'label'    => __('Border Color', 'realdesign'),
            	'section'  => 'colors',
            	'settings' => 'border-color'
        	)
   		)
	);
	
	//Body Background Color
	$wp_customize->add_setting(
    	'bodybackground-color',
    	array(
        	'default'           => '#fff',
			'sanitize'  		=> 'sanitize_text_field',
			'sanitize_callback' => 'sanitize_hex_color',
    	)
	);
 
	$wp_customize->add_control(	
		new WP_Customize_Color_Control(
        	$wp_customize,
        	'bodybackground-color',
        	array(
            	'label'    => __('Body Background Color', 'realdesign'),
            	'section'  => 'colors',
            	'settings' => 'bodybackground-color'
        	)
   		)
	);
		
	//Follow US Customizer
    $wp_customize->add_section(
		'followus_settings', 
		array(
			'title' => __('Follow Us Settings', 'realdesign'),
        	'description' => __('Enter in the URL for the corresponding social media sites. Blank entries will not be displayed.','realdesign'),
        	'priority'    => 55,
        )
    );
	
	$wp_customize->add_setting(
		'facebook_link', 
		array(
        	'default' 			=> '',
			'sanitize'          => 'esc_url',
			'sanitize_database' => 'esc_url_raw',
			'sanitize_callback' => 'realdesign_sanitize_text',
    	)
	);
	
	$wp_customize->add_control(
		'facebook_link', 
		array(
        	'label' => __('Facebook Fan Page URL','realdesign'),
        	'section' => 'followus_settings',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
		'twitter_link', 
		array(
        	'default' 			=> '',
			'sanitize'          => 'esc_url',
			'sanitize_database' => 'esc_url_raw',
			'sanitize_callback' => 'realdesign_sanitize_text',
    	)
	);
	
	$wp_customize->add_control(
		'twitter_link', 
		array(
        	'label' => __('Twitter Page URL','realdesign'),
        	'section' => 'followus_settings',
        	'type' => 'text',
    	)
	);
	
	$wp_customize->add_setting(
		'linkedin_link', 
		array(
        	'default' 			=> '',
			'sanitize'          => 'esc_url',
			'sanitize_database' => 'esc_url_raw',
			'sanitize_callback' => 'realdesign_sanitize_text',
    	)
	);
	
	$wp_customize->add_control(
		'linkedin_link', 
		array(
        	'label' => __('LinkedIn Page URL','realdesign'),
        	'section' => 'followus_settings',
        	'type' => 'text',
    	)
	);	
}
add_action( 'customize_register', 'realdesign_customize_register' );

/****************************************
 * Sanitization Functions
 ****************************************/
function realdesign_sanitize_checkbox( $input ) {
    if ( $input == 'true' ) {
        return 'true';
    } else {
        return '';
    }
}

function realdesign_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function realdesign_sanitize_text_field( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
/****************************************
 * Customizer CSS
 ****************************************/
function realdesign_customize_css(){
?>
	<style type="text/css">
		#sitename a, #description, #left ul a, body .usermenu  {
			color:<?php if (display_header_text() == '') {
				echo ('#FFFFFF');
			} else { 
				echo header_textcolor();
			} ?>;
		}
		#title, #bannerright, .continue a:link, #reply-title, .widget-title,
		.widgettitle, .displaysearch {
			background-color: <?php if(get_theme_mod('border-color') == '') {
				echo ('#f5a439');
			}else{
				echo esc_html(get_theme_mod('border-color')); 
			}?>;
		}
		#title, .continue a:link, #reply-title {
			border: 1px solid <?php if(get_theme_mod('border-color') == '') {
				echo ('#f5a439');
			}else{
				echo esc_html(get_theme_mod('border-color')); 
			}?>;
		}
		#bannerleft {
			width:<?php if (get_option( 'search-option' ) == 'true' ) {
				echo ('92%');
			} else { 
				echo ('100%');
		 	} ?>;
		}
		#right {
			background-color:<?php if (get_theme_mod('bodybackground-color') == '') {
				echo ('#fff');
			}else{
				echo esc_html(get_theme_mod('bodybackground-color')); 
			}?>;
		}
		#primary, #secondary, #rightsidebar, #banner, #left, .usermenu {
			background-color:<?php if (get_theme_mod('foreground-color') == '') {
				echo ('#000');
			} else {
				echo esc_html(get_theme_mod('foreground-color'));
			} ?>;
		}
		<?php if ( ! is_front_page() && get_option( 'sidebar-option' ) == 'true') { ?>
			#sidebar {
				width:68%;
				float:left; 
			}
			.gallery {
    			width: 500px;
				overflow:hidden;
			}
			<?php } else { ?>
			.gallery {
				width:800px;
				overflow:hidden;
			}	
		<?php } ?>		
		<?php if (display_header_text() == '') {?>
			#sitename {
				text-indent: -9999px;
			}
		<?php } ?>			
	</style>
<?php
}
add_action( 'wp_head', 'realdesign_customize_css');
 

