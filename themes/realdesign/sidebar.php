<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 */
?>
<div id="rightsidebar">
	<div id="primary" class="widget-area" >
		<ul>
		<?php
			if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
				<li id="archives" class="widget-container">
					<h3 class="widget-title">
						<?php esc_html_e( 'Archives','realdesign'); ?>
                    </h3>
					<ul>
						<?php wp_get_archives( 'type=monthly' ); ?>
					</ul>
				</li>
				<li id="categories" class="widget-container">
					<h3 class="widget-title">
						<?php esc_html_e( 'Categories','realdesign'); ?>
                    </h3>
					<ul>
						<?php wp_list_categories(); ?>
					</ul>
				</li>                
				<li id="meta" class="widget-container">
					<h3 class="widget-title">
						<?php esc_html_e( 'Meta','realdesign' ); ?>
                    </h3>
					<ul>
						<?php wp_register(); ?>
						<li>
							<?php wp_loginout(); ?>
                       </li>
						<?php wp_meta(); ?>
					</ul>
				</li>
			<?php endif; // end primary widget area ?>
		</ul>
	</div>
	<?php
		// A second sidebar for widgets, just because.
		if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
			<div id="secondary" class="widget-area" >
				<ul>
					<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
				</ul>
			</div>
	<?php endif; ?>
</div>
