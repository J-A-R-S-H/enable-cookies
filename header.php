<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Enable_Cookies
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'enable-cookies' ); ?></a>

	<header id="masthead" class="site-header full-bleed">
		<div>
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title screen-reader-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"
				aria-label="Menu Toggle">
					<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
						<title>Menu icon</title>
						<path d="M2 6h20"></path>
						<path d="M2 12h20"></path>
						<path d="M2 18h20"></path>
					</svg>
				</button>
				<div class="menu-header-menu-container">
					<ul id="header-menu" class="menu nav-menu">
						<?php if ( is_front_page() && is_home() ) : ?>
							<li id="menu-item-home" class="menu-item menu-item-post_type menu-item-object-page menu-item-home">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a>
							</li>
							<li id="menu-item-cookies" class="menu-item menu-item-post_type menu-item-object-page menu-item-cookies">
								<a href="#cookies">Cookies</a>
							</li>
							<li id="menu-item-packs" class="menu-item menu-item-post_type menu-item-object-page menu-item-packs">
								<a href="#packs">Packs</a>
							</li>
							<li id="menu-item-about" class="menu-item menu-item-post_type menu-item-object-page menu-item-about">
								<a href="#about">About</a>
							</li>
							<li id="menu-item-order" class="menu-item menu-item-post_type menu-item-object-page menu-item-order">
								<a href="#order">Order</a>
							</li>
						<?php else : ?>
							<li id="menu-item-home" class="menu-item menu-item-post_type menu-item-object-page menu-item-home">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Home</a>
							</li>
							<li id="menu-item-cookies" class="menu-item menu-item-post_type menu-item-object-page menu-item-cookies">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>#cookies">Cookies</a>
							</li>
							<li id="menu-item-packs" class="menu-item menu-item-post_type menu-item-object-page menu-item-packs">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>#packs">Packs</a>
							</li>
							<li id="menu-item-about" class="menu-item menu-item-post_type menu-item-object-page menu-item-about">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>#about">About</a>
							</li>
							<li id="menu-item-order" class="menu-item menu-item-post_type menu-item-object-page menu-item-order">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>#order">Order</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
