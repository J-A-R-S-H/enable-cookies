<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Enable_Cookies
 */

?>

	<footer id="colophon" class="site-footer full-bleed">
		<div>
			<div class="site-info">
				<div class="contact">
					<?php 
					the_custom_logo(); 
					if (function_exists('get_field')) :
						$social_media_link_1    = get_field('social_media_link_1', 2);
						$social_media_link_2    = get_field('social_media_link_2', 2);
						$social_media_link_3    = get_field('social_media_link_3', 2);
						$social_media_link_4    = get_field('social_media_link_4', 2);
						$social_media_icon_1    = get_field('social_media_icon_1', 2);
						$social_media_icon_2    = get_field('social_media_icon_2', 2);
						$social_media_icon_3    = get_field('social_media_icon_3', 2);
						$social_media_icon_4    = get_field('social_media_icon_4', 2);

						if ($social_media_link_1 || $social_media_link_2 || $social_media_link_3 || $social_media_link_4) : ?>
							<?php if ($social_media_link_1 || $social_media_link_2 || $social_media_link_3 || $social_media_link_4) : ?>
								<div class="contact-links">
									<?php if ($social_media_link_1) :
										$social_media_link_1_url = $social_media_link_1['url'];
										$social_media_link_1_title = $social_media_link_1['title'];
										$social_media_link_1_target = $social_media_link_1['target'] ? $social_media_link_1['target'] : '_self';

										if ($social_media_icon_1) :
											$social_media_icon_1_type = $social_media_icon_1['type'];
											$social_media_icon_1_value = $social_media_icon_1['value'];
										endif; ?>

										<a href="<?php echo esc_url($social_media_link_1_url); ?>" target="<?php echo esc_attr($social_media_link_1_target); ?>"><?php
											if ('dashicons' === $social_media_icon_1_type) :
												?><span class="dashicons <?php echo esc_attr($social_media_icon_1_value); ?>"></span><?php
											elseif ('media_library' === $social_media_icon_1_type) :
												$image_html = wp_get_attachment_image($social_media_icon_1_value, $icon_size);
												echo wp_kses_post($image_html);
											elseif ('url' === $social_media_icon_1_type) :
												?><img src="<?php echo esc_url($social_media_icon_1_value); ?>" alt=""><?php
											endif; ?>
										</a>
									<?php endif;
									if ($social_media_link_2) :
										$social_media_link_2_url = $social_media_link_2['url'];
										$social_media_link_2_title = $social_media_link_2['title'];
										$social_media_link_2_target = $social_media_link_2['target'] ? $social_media_link_2['target'] : '_self';

										if ($social_media_icon_2) :
											$social_media_icon_2_type = $social_media_icon_2['type'];
											$social_media_icon_2_value = $social_media_icon_2['value'];
										endif; ?>

										<a href="<?php echo esc_url($social_media_link_2_url); ?>" target="<?php echo esc_attr($social_media_link_2_target); ?>"><?php
											if ('dashicons' === $social_media_icon_2_type) :
												?><span class="dashicons <?php echo esc_attr($social_media_icon_2_value); ?>"></span><?php
											elseif ('media_library' === $social_media_icon_2_type) :
												$image_html = wp_get_attachment_image($social_media_icon_2_value, $icon_size);
												echo wp_kses_post($image_html);
											elseif ('url' === $social_media_icon_2_type) :
												?><img src="<?php echo esc_url($social_media_icon_2_value); ?>" alt=""><?php
											endif; ?>
										</a>
									<?php endif;
									if ($social_media_link_3) :
										$social_media_link_3_url = $social_media_link_3['url'];
										$social_media_link_3_title = $social_media_link_3['title'];
										$social_media_link_3_target = $social_media_link_3['target'] ? $social_media_link_3['target'] : '_self';

										if ($social_media_icon_3) :
											$social_media_icon_3_type = $social_media_icon_3['type'];
											$social_media_icon_3_value = $social_media_icon_3['value'];
										endif; ?>

										<a href="<?php echo esc_url($social_media_link_3_url); ?>" target="<?php echo esc_attr($social_media_link_3_target); ?>"><?php
											if ('dashicons' === $social_media_icon_3_type) :
												?><span class="dashicons <?php echo esc_attr($social_media_icon_3_value); ?>"></span><?php
											elseif ('media_library' === $social_media_icon_3_type) :
												$image_html = wp_get_attachment_image($social_media_icon_3_value, $icon_size);
												echo wp_kses_post($image_html);
											elseif ('url' === $social_media_icon_3_type) :
												?><img src="<?php echo esc_url($social_media_icon_3_value); ?>" alt=""><?php
											endif; ?>
										</a>
									<?php endif;
									if ($social_media_link_4) :
										$social_media_link_4_url = $social_media_link_4['url'];
										$social_media_link_4_title = $social_media_link_4['title'];
										$social_media_link_4_target = $social_media_link_4['target'] ? $social_media_link_4['target'] : '_self';

										if ($social_media_icon_4) :
											$social_media_icon_4_type = $social_media_icon_4['type'];
											$social_media_icon_4_value = $social_media_icon_4['value'];
										endif; ?>

										<a href="<?php echo esc_url($social_media_link_4_url); ?>" target="<?php echo esc_attr($social_media_link_4_target); ?>"><?php
											if ('dashicons' === $social_media_icon_4_type) :
												?><span class="dashicons <?php echo esc_attr($social_media_icon_4_value); ?>"></span><?php
											elseif ('media_library' === $social_media_icon_4_type) :
												$image_html = wp_get_attachment_image($social_media_icon_4_value, $icon_size);
												echo wp_kses_post($image_html);
											elseif ('url' === $social_media_icon_4_type) :
												?><img src="<?php echo esc_url($social_media_icon_4_value); ?>" alt=""><?php
											endif; ?>
										</a>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endif;
					endif; ?>
				</div>

				<nav id="footer-navigation" class="footer-navigation">
					<ul id="footer-menu" class="menu nav-menu">
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
							<li id="menu-item-faq" class="menu-item menu-item-post_type menu-item-object-page menu-item-order">
								<a href="#faq"><abbr title="Frequently Asked Questions">FAQ</abbr></a>
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
							<li id="menu-item-faq" class="menu-item menu-item-post_type menu-item-object-page menu-item-order">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>#faq"><abbr title="Frequently Asked Questions">FAQ</abbr></a>
							</li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>

		
			<div class="site-credits">
				<p>
				<?php
				/* translators: 1: Theme author. */
				printf( esc_html__( 'Website by %1$s', 'enable-cookies' ), '<a href="https://ariellemarin.com/">Arielle M.</a> &amp; John S.' );
				?>
				</p>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
