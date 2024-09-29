<?php

/**
 * Log In Customization
 */

// Load in custom login styles and scripts
function enable_cookies_login_stylesheet() {
    wp_enqueue_style( 
		'custom-login', // unique handle
		get_stylesheet_directory_uri() . '/style-login.css', // URL path
		array(), // dependencies
		_S_VERSION, // version
	);
}
add_action( 'login_enqueue_scripts', 'enable_cookies_login_stylesheet' );

// Custom login logo URL
function enable_cookies_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'enable_cookies_login_logo_url' );

// Custom login URL title
function enable_cookies_login_logo_url_title() {
    return 'enable cookies';
}
add_filter( 'login_headertext', 'enable_cookies_login_logo_url_title' );