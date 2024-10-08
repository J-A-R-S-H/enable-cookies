<?php

function enable_cookies_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );          	 	// Remove Posts link
		remove_menu_page( 'edit-comments.php' );  		// Remove Comments link
		remove_menu_page( 'edit.php?post_type=page' );	// Remove Pages link
		remove_menu_page( 'themes.php' );				// Remove Appearance
		remove_submenu_page( 'tools.php', 'wp-migrate-db-pro' );	// Remove WP Migrate
	}
}
add_action( 'admin_menu', 'enable_cookies_remove_admin_links' );

function enable_cookies_add_admin_links() {
	add_menu_page(
		__('Home Page', 'enable-cookies' ), 	// page title
		'Home Page', 							// menu title
		'manage_woocommerce', 						// capability
		'post.php?post=2&action=edit', // 'edit-home-page', // menu slug
		'',	 										// callback
		'dashicons-admin-page', 					// icon url
		21 											// position
	);

	add_menu_page(
		__('Site Logo', 'enable-cookies' ), 		// page title
		'Site Logo', 								// menu title
		'manage_woocommerce', 						// capability
		'customize.php',			 				// menu slug
		'',	 										// callback
		'dashicons-admin-appearance', 				// icon url
		61 											// position
	);	
}
add_action( 'admin_menu', 'enable_cookies_add_admin_links' );


/**
 * Remove default Dashboard Widgets
 */
function enable_cookies_remove_dashboard_widget() {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
	remove_meta_box ( 'wc_admin_dashboard_setup', 'dashboard', 'normal' );
	remove_meta_box ( 'wordfence_activity_report_widget', 'dashboard', 'normal' );
	remove_meta_box ( 'wpseo-dashboard-overview', 'dashboard', 'normal' );
	remove_meta_box ( 'wpseo-wincher-dashboard-overview', 'dashboard', 'normal' );
} 
add_action( 'wp_dashboard_setup', 'enable_cookies_remove_dashboard_widget' );

function enable_cookies_welcome_widget()
{
?>
	<p>Hello! To get started, read through the <a href="https://docs.google.com/document/d/1suV9bgiCvSdv2Kqqis9xX-8JLiEdTwSmD_TqtIX55fs/edit?usp=sharing">WordPress Guide</a> to learn how to navigate this admin area and edit the site's content.</p>
	<p>If you're looking to create designs that are consistent with the site, take a look at the <a href="https://docs.google.com/presentation/d/1HDDfWLwOk4rXBpACoNsN5nLhj7wmcwOGQSe3qvHEcD0/edit?usp=sharing">branding guide</a>.</p>
	<p>Confused or stuck? Have you run into any issues with the site? Don't hesitate to contact me at <a href="mailto:ariem.marii@gmail.com">ariem.marii@gmail.com</a> and I'll try to help as best as I can!</p>
	<p>Good luck! &#127850;</p>
<?php
}

function enable_cookies_add_dashboard_widgets()
{
    wp_add_dashboard_widget("enable_cookies_welcome", "Welcome to your dashboard!", "enable_cookies_welcome_widget");
}
add_action('wp_dashboard_setup', 'enable_cookies_add_dashboard_widgets');