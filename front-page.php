<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Enable_Cookies
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        if (function_exists( 'get_field' )) :
            $about_header_1 = get_field( 'about_header_1' );
            $about_header_2 = get_field( 'about_header_2' );
            
            if ($about_header_1 || $about_header_2): ?>
                <h2>
                    <?php $about_header_1; 
                        if ($about_header_2): ?>
                            <span><?php $about_header_2; ?></span>
                        <?php endif; ?>
                </h2>
            <?php endif;
        endif; ?>

        <?php
        // Query products from a specific category
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'cookies',
                ),
            ),
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) :
            echo '<ul class="products">';
            while ($products->have_posts()) : $products->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        else :
            echo 'No products found in this category.';
        endif;
        ?>





        <h3>Placeholder Pls remove this</h3>
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'pack-of-cookies',
                ),
            ),
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) :
            echo '<ul class="products">';
            while ($products->have_posts()) : $products->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        else :
            echo 'No products found in this category.';
        endif;
        ?>

    <?php
        endwhile; // End of the loop.
    ?>
    


</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
