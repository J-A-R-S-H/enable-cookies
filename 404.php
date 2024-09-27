<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Enable_Cookies
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found full-bleed">
			<div>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops!', 'enable-cookies' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'That page can&rsquo;t be found.', 'enable-cookies' ); ?></p>
					<span>&#127850;</span>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="button order-button">Back to Home</a>
				</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
