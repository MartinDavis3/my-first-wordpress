<?php 

/* If there are no posts to display, such as an empty archive page */ 
	if ( ! have_posts() ) {
		echo '<div>';
		echo '<h1>' ;
		esc_html_e( 'Not Found', 'realdesign' );
		echo '</h1>';
		echo '<div>';
		echo '<p>';
		esc_html_e( 'Apologies, but no results were found for the requested archive.','realdesign'); 
		echo '</p>';
		get_search_form();
		echo '</div>';
		echo '</div>';
	}
	
	while ( have_posts() ) { 
		the_post();
		if ( in_category( _x('gallery', 'gallery category slug' , 'realdesign') ) ) {
			echo '<h2>';
			?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' , 'realdesign' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php 
            the_title(); 
			echo '</a></h2>';
			
			realdesign_postinfo(); 
			
			}elseif ( in_category( _x('asides', 'asides category slug', 'realdesign') ) ) {
				echo '<div id="post'; 
				the_ID(); 
				echo '"';
				post_class();
				echo '>';
				
				if ( is_archive() || is_search() ) {
					the_excerpt(); 
					}else {
					the_content( __( '<span class="meta-nav-r">Continue reading </span>', 'realdesign') ); 
				}
				realdesign_postinfo(); 
			} else {
			
				echo '<div class="post">';
				echo '<h3>'; 
				the_title();
				echo '</h3>';
		
				realdesign_postinfo();
				
				$get_custom_options =  wp_get_attachment_image_src(get_post_meta($post->ID, '_thumbnail_id', true), '_wp_attachment_metadata', true);
				$image_url = $get_custom_options[0];
				
				echo '<a href="' .  esc_url($image_url) . '" class="thumb" rel="portfolio">' . the_post_thumbnail('blog_post_image') .'</a>';
	
				if ( is_archive() || is_search() ) {
					the_excerpt();
					} else {
						the_content( __( '<span class="meta-nav-r">Continue reading </span>', 'realdesign') ); 
						wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'realdesign'), 'after' => '</div>' ) ); 
					} 
				//This template tag displays a link to the tag or tags a post belongs to. 
				//If no tags are associated with the current entry, nothing is displayed.
				// http://codex.wordpress.org/Function_Reference/the_tags
				the_tags( __('Tags: ','realdesign'), ', ', '<br />');
				echo '<p class="continue"><a href="';
				the_permalink(); 
				echo '">';
				esc_html_e('Continue Reading', 'realdesign');
				echo '</a></p>';
				
				echo '</div>';//div post end
				comments_template( '', true );
			}
		}
		if (  $wp_query->max_num_pages > 1 ) {
			echo '<div>';
			echo '<div>' . next_posts_link( __( '<span class="meta-nav-l"> Older posts</span>', 'realdesign' ) ) . '</div>';
			echo '<div>' . previous_posts_link( __( '<span class="meta-nav-r">Newer posts </span>', 'realdesign') ) . '</div>';
			echo '</div>';
		}
?>