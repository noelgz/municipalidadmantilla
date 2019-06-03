<?php //   About WP bfastFast Blog

// Add About WP bFast Blog
function newsmagz_about_page() {
	add_theme_page( esc_html__( 'About NewsmagZ', 'newsmagz' ), esc_html__( 'About NewsmagZ', 'newsmagz' ), 'edit_theme_options', 'about-newsmagz', 'newsmagz_about_page_output' );
}
add_action( 'admin_menu', 'newsmagz_about_page' );
	/* activation notice */
add_action( 'load-themes.php','newsmagz_activation_admin_notice');
	/**
	 * Adds an admin notice upon successful activation.
	 * 
	 */
	  function newsmagz_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', 'newsmagz_welcome_admin_notice',99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * 
	 */
	  function newsmagz_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our %2$swelcome page%3$s.', 'newsmagz' ), 'newsmagz', '<a href="' . esc_url( admin_url( 'themes.php?page=about-newsmagz' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=about-newsmagz' ) ); ?>" class="button" style="text-decoration: none;"><?php printf( __( 'Get started with %s', 'newsmagz' ), 'newsmagz' ); ?></a></p>
			</div>
		<?php
	}


// Render About Bfast Blog HTML
function newsmagz_about_page_output() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Welcome to NewsmagZ!', 'newsmagz' ); ?></h1>
		<p class="welcome-text">
			<?php esc_html_e( 'Our best Ultra Fast Blog magazine WordPress theme, newsmagz! Get the best experience using newsmagz and that is why we have created this page with all the necessary informations for you. ThemePacific team hopes that you will enjoy using newsmagz, as much as we enjoy creating it.', 'newsmagz' ); ?>
		</p>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'newsmagz_tab_1'; ?>  

		<div class="nav-tab-wrapper">
			<a href="?page=about-newsmagz&tab=newsmagz_tab_1" class="nav-tab <?php echo $active_tab == 'newsmagz_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'newsmagz' ); ?>
			</a>
			<a href="?page=about-newsmagz&tab=newsmagz_tab_2" class="nav-tab <?php echo $active_tab == 'newsmagz_tab_2' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Recommended Plugins', 'newsmagz' ); ?>
			</a>
			<a href="?page=about-newsmagz&tab=newsmagz_tab_3" class="nav-tab <?php echo $active_tab == 'newsmagz_tab_3' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'newsmagz' ); ?>
			</a>
			<a href="?page=about-newsmagz&tab=newsmagz_tab_4" class="nav-tab <?php echo $active_tab == 'newsmagz_tab_4' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Free vs Pro', 'newsmagz' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'newsmagz_tab_1' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Documentation', 'newsmagz' ); ?></h3>
					<p>
						<?php esc_html_e( 'We are Highly recommending you to begin with this, read the full theme documentation to understand the basics and even more details about how to use our theme.', 'newsmagz' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url('http://docs.themepacific.com/newsmagz/'); ?>" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'newsmagz' ); ?></a>
				</div>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Demo Content', 'newsmagz' ); ?></h3>
					<p>
						<?php esc_html_e( 'If you are a WordPress beginner it\'s highly recomended to install the Demo Content. This file includes: Menus, Posts, Pages, Widgets, etc. Read More about demo import in the ', 'newsmagz' ); ?>
						<a href="<?php echo esc_url('http://docs.themepacific.com/newsmagz/'); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation.', 'newsmagz' ); ?></a>
					</p>
					<a target="_blank" target="_blank" href="<?php echo esc_url('http://docs.themepacific.com/newsmagz/'); ?>" class="button button-primary"><?php esc_html_e( 'Download Import File', 'newsmagz' ); ?></a>
				</div>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'newsmagz' ); ?></h3>
					<p>
						<?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme. After reading the Theme Documentation we recommend you to open the Theme Customizer and play with some options.', 'newsmagz' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'newsmagz' ); ?></a>
				</div>

			</div>
			<div class="four-columns-wrap">

				<h2><?php esc_html_e( 'NewsmagZ Pro - Fastest Premium WP Theme', 'newsmagz' ); ?></h2>
				<p>
					<?php esc_html_e('NewsmagZ Pro is an Ultra Fast Responsive free WordPress theme for News, News Paper, Editorial Magazines, Tech blogs, Personal Blogs, Fashion blogs, Financial blogs and Photography, Photo gallery Blogs.','newsmagz');?>
					</p><p><?php
					esc_html_e( 'Theme is very responsive, highly customizable built with Bootstrap. It comes with the flat, minimalist, magazine style homepage Design with boxed layout, Featured Grid Slider, Multi Style Drop-down Menu.', 'newsmagz' ); ?>
					<a target="_blank" href="https://themepacific.com/newsmagz/"><?php esc_html_e( 'NewsmagZ Pro Theme', 'newsmagz' ); ?></a>
					<?php esc_html_e( 'More details in the theme Documentation.', 'newsmagz' ); ?>
				</p>
				<div class="theme">
								<a href="https://themepacific.com/">
									<div class="theme-screenshot">
 
									</div>

									</a><div class="theme-id-container"><a href="https://themepacific.com/">
										<h2 class="theme-name" id="newsmagz_pro-name">
										<?php esc_html_e( 'NewsmagZ Pro.', 'newsmagz' ); ?></h2>
										</a><div class="theme-actions"><a href="https://themepacific.com/newsmagz/">
											</a><a class="button button-primary customize load-customize hide-if-no-customize" href="https://themepacific.com/newsmagz/"><?php esc_html_e( 'Download Theme', 'newsmagz' ); ?></a>

										</div>
									</div>
								
							</div>
			</div>

		<?php elseif ( $active_tab == 'newsmagz_tab_2' ) : ?>
			
			<div class="three-columns-wrap">
				
				<br>
				<p><?php esc_html_e( 'Recommended Plugins are fully supported by NewsmagZ theme.', 'newsmagz' ); ?></p>
				<br>

				<?php

			
	 
					newsmagz_recommended_plugin( 'tiled-gallery-carousel-without-jetpack', 'jetpack-carousel', esc_html__( 'Tiled Gallery Carousel Without JetPack', 'newsmagz' ), esc_html__( 'Tiled Gallery with carousel will completely transform your galleries to new look and your users will love this.', 'newsmagz' ) );	
				 
					newsmagz_recommended_plugin( 'tp-postviews-count-popular-posts-widgets', 'tp_postviews', esc_html__( 'PostViews Count & Popular Posts Widgets', 'newsmagz' ), esc_html__( 'This Plugin based on Post Views will help sites to add post views and show Popular posts in Sidebar or anywhere. .', 'newsmagz' ) );		


					newsmagz_recommended_plugin( 'themepacific-review-lite', 'tpcrn_wpreview', esc_html__( ' WordPress Review', 'newsmagz' ), esc_html__( 'WordPress Review and User Rating Plugin (TP WP Reviews) will help sites to add reviews to get more users without affecting page load speed.  ', 'newsmagz' ) );
						// WooCommerce
				newsmagz_recommended_plugin( 'woocommerce', 'woocommerce', esc_html__( 'WooCommerce', 'newsmagz' ), esc_html__( 'WooCommerce is a powerful, extendable eCommerce plugin that helps you sell anything. Beautifully.', 'newsmagz' ) );

				?>


			</div>

		<?php elseif ( $active_tab == 'newsmagz_tab_3' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-sos"></span>
						<?php esc_html_e( 'Forums', 'newsmagz' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Use Our Dedicated Support forums to ask your questions. Before Posting Questions, try the forum search to get the answers.', 'newsmagz' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://themepacific.com/support/forum/wordpress-theme-support/'); ?>"><?php esc_html_e( 'Go to Support Forums', 'newsmagz' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Documentation', 'newsmagz' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Need more details? Please check out Theme Documentation for detailed information.', 'newsmagz' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('http://docs.themepacific.com/newsmagz/'); ?>"><?php esc_html_e( 'Read Full Documentation', 'newsmagz' ); ?></a>
					</p>
				</div>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-admin-tools"></span>
						<?php esc_html_e( 'Changelog', 'newsmagz' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Stay always up to date, check for fixes, updates and some new feauters you should not miss.', 'newsmagz' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://themepacific.com/newsmagz/'); ?>"><?php esc_html_e( 'See Changelog', 'newsmagz' ); ?></a>
					</p>
				</div>
				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-star-filled"></span>
						<?php esc_html_e( 'Rating', 'newsmagz' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Are you enjoying newsmagz?
Rate our theme on WordPress.org. We\'d really appreciate it!', 'newsmagz' ); ?><p><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/newsmagz#postform/'); ?>"><?php esc_html_e( 'Post Review', 'newsmagz' ); ?></a>
					</p>
				</div>


			</div>

		<?php elseif ( $active_tab == 'newsmagz_tab_4' ) : ?>

			<br><br>
			<div class="features_table">
				<table class="free-vs-pro form-table">
					<thead>
						<tr>
							<th>
								<a href="<?php echo esc_url('https://themepacific.com/newsmagz/'); ?>" target="_blank" class="button button-primary button-hero">
									<?php esc_html_e( 'Get NewsmagZ Pro', 'newsmagz' ); ?>
								</a>

							</th>
							<th>
								<?php esc_html_e( 'Free', 'newsmagz' ); ?>
							</th>
							<th>
								<?php esc_html_e( 'Premium', 'newsmagz' ); ?>
							</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td class="feature">Use in unlimited domains</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Super Mega Menu</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Drag and Drop Page Builder</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Responsive layout</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Widgetized footer</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Documentation</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">All Custom Widgets</td>
							<td class="compare-icon">Limited</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Advanced Control Panel (WP Customizer)</td>
							<td class="compare-icon">Limited</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Infinite Scroll for Single Posts</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">HomePage Drag &amp; Drop Organizer</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Breaking News Ticker</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Unlimted Theme Skins</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Unlimited Background patterns (Upload yours)</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">800+ Google Fonts &amp; Colors</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">RTL (Right to left Language Support)</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Localization (Global Translation Support)</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Theme Update Alert</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">One Click Demo Installer</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Access to support forums</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature">Sample data (XML files)</td>
							<td class="compare-icon"><span class="dashicons-before dashicons-no"></span></td>
							<td class="compare-icon"><span class="dashicons-before dashicons-yes"></span></td>
						</tr>
						<tr>
							<td class="feature" colspan="3">
								<center>And Lot More</center>
							</td>
						</tr>
						<tr>
							<td>
								<a href="https://themepacific.com/newsmagz/" target="_blank" class="button button-primary button-hero">
								Get NewsmagZ Pro                    </a>

							</td>

						</tr>
					</tbody>
				</table>
			</div>

		<?php endif; ?>

	</div><!-- /.wrap -->
	<?php
} // end newsmagz_about_page_output

// Check if plugin is installed
function newsmagz_check_installed_plugin( $slug, $filename ) {
	return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
}

// Generate Recommended Plugin HTML
function newsmagz_recommended_plugin( $slug, $filename, $name, $description) {

	if ( $slug === 'facebook-pagelike-widget' ) {
		$size = '128x128';
	} else {
		$size = '256x256';
	}

	?>

	<div class="plugin-card">
		<div class="name column-name">
			<h3>
				<?php echo esc_html( $name ); ?>
				<img src="<?php echo esc_url('https://ps.w.org/'. $slug .'/assets/icon-'. $size .'.png') ?>" class="plugin-icon" alt="">
			</h3>
		</div>
		<div class="action-links">
			<?php if ( newsmagz_check_installed_plugin( $slug, $filename ) ) : ?>
				<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'newsmagz' ); ?></button>
			<?php else : ?>
				<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
					<?php esc_html_e( 'Install Now', 'newsmagz' ); ?>
				</a>							
			<?php endif; ?>
		</div>
		<div class="desc column-description">
			<p><?php echo esc_html( $description ); ?></p>
		</div>
	</div>

	<?php
}

// enqueue ui CSS/JS
function newsmagz_enqueue_about_page_scripts($hook) {

	if ( 'appearance_page_about-newsmagz' != $hook ) {
		return;
	}

	// enqueue CSS
	wp_enqueue_style( 'newsmagz-about-page-css', get_theme_file_uri( '/inc/about/css/about-newsmagz-page.css' ) );

}
add_action( 'admin_enqueue_scripts', 'newsmagz_enqueue_about_page_scripts' );