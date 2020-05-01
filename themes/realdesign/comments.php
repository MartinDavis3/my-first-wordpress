<?php
	echo '<div id="comments">';
	if ( post_password_required() ) {
		echo '<p class="nopassword">';
		esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'realdesign');
		echo '</p>';
		echo '</div>';//div comments close
		return;
	}
	echo '</div>';
	if ( have_comments() || ! have_comments()) {
		
		echo '<h3 id="comments-title">';
		printf( esc_html(_n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'realdesign')),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
		echo '</h3>';
		
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			echo '<div>';
			echo '<div>';
			previous_comments_link( __( '<span class="meta-nav-l"> Older Comments</span>', 'realdesign') );
			echo '</div>';
			echo '<div>';
			next_comments_link( __( '<span class="meta-nav-r">Newer Comments </span>', 'realdesign' ) );
			echo '</div>';
			echo '</div>'; 
		}
		echo '<ol>';
		wp_list_comments( array( 'callback' => 'realdesign_comment' ) );
		echo '</ol>';
		
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			echo '<div>';
			echo '<div>';
			previous_comments_link( __( '<span class="meta-nav-l"> Older Comments</span>', 'realdesign') ); 
			echo '</div>';
			echo '<div>';
			next_comments_link( __( '<span class="meta-nav-r">Newer Comments </span>', 'realdesign') ); 
			echo '</div>';
			echo '</div>';
		} else { 
			if ( ! comments_open() ) {
				echo '<p class="nocomments">';
				esc_html_e( 'Comments are closed.', 'realdesign' );
				echo '</p>';
			}
		}
	}
	comment_form(); 
