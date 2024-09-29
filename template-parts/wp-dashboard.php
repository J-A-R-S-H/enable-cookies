<?php

function enable_cookies_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );          	 	// Remove Posts link
		remove_menu_page( 'edit-comments.php' );  		// Remove Comments link
		remove_menu_page( 'edit.php?post_type=page' );	// Remove Pages link
		remove_menu_page( 'themes.php' );				// Remove Appearance
		remove_submenu_page( 'tools.php', 'wp-migrate-db-pro' );						// Remove WP Migrate
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
		__('Appearance', 'enable-cookies' ), 		// page title
		'Appearance', 								// menu title
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