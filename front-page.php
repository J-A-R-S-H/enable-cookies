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
        the_post(); ?>

        <header>
            <?php
            if (function_exists('get_field')) :
                $hero_image_id = get_field('hero_image');

                if ($hero_image_id) :
                    echo wp_get_attachment_image($hero_image_id, 'large');
                endif;
            endif; ?>
        </header>

        <section id="cookies" class="cookies">
            <?php
            if (function_exists('get_field')) :
                $cookies_heading_1 = get_field('cookies_heading_1');
                $cookies_heading_2 = get_field('cookies_heading_2');

                if ($cookies_heading_1 || $cookies_heading_2) : ?>
                    <h2>
                        <?php echo $cookies_heading_1;
                        if ($cookies_heading_2) : ?>
                            <span><?php echo $cookies_heading_2; ?></span>
                        <?php endif; ?>
                    </h2>
            <?php endif;
            endif;

            if (is_plugin_active('woocommerce/woocommerce.php')) :
                // Query products from a specific category
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'product_cat',
                            'field'     => 'slug',
                            'terms'     => 'cookies',
                        ),
                    ),
                    'orderby'   => 'menu_order',
                    'order'     => 'ASC',
                );

                $products = new WP_Query($args);

                if ($products->have_posts()) :
                    echo '<ul class="products">';
                    while ($products->have_posts()) : $products->the_post();

                        ob_start();

                        wc_get_template_part('content', 'product');

                        if (function_exists('get_field')) :
                            $cookie = ob_get_clean();

                            $cookie_text_colour = get_field('cookie_text_colour', get_the_ID());

                            $cookie = str_replace('<h2 class="woocommerce-loop-product__title">', '<h2 class="woocommerce-loop-product__title" style="color:' . $cookie_text_colour . ';">', $cookie);
                        endif;

                        echo $cookie;
                    endwhile;
                    echo '</ul>';
                    wp_reset_postdata();
                else :
                    echo 'No products found in this category.';
                endif;
            endif;
            ?>
        </section>

        <section id="about" class="about">
            <?php
            if (function_exists('get_field')) :
                $about_heading_1 = get_field('about_heading_1');
                $about_heading_2 = get_field('about_heading_2');
                $about_image_id = get_field('about_image');
                $about_text     = get_field('about_text');

                if ($about_heading_1 || $about_heading_2) : ?>
                    <h2>
                        <?php echo $about_heading_1;
                        if ($about_heading_2) : ?>
                            <span><?php echo $about_heading_2; ?></span>
                        <?php endif; ?>
                    </h2>
                <?php endif;

                if ($about_image_id || $about_text) : ?>
                    <div>
                        <?php
                        if ($about_image_id) :
                            echo wp_get_attachment_image($about_image_id, 'large');
                        endif;

                        if ($about_text) : ?>
                            <p><?php echo $about_text; ?></p>
                        <?php endif; ?>
                    </div>
            <?php endif;
            endif; ?>
        </section>
        <section class="business-proposition">

            <?php
            if (function_exists('get_field')) :
                $bp_heading_1    = get_field('bp_heading_1');
                $bp_heading_2    = get_field('bp_heading_2');
                $bp_text        = get_field('bp_text');
                $bp_main_point_1   = get_field('bp_main_point_1');
                $bp_main_point_2   = get_field('bp_main_point_2');
                $bp_main_point_3   = get_field('bp_main_point_3');
                $bp_bullet_point_1 = get_field('bp_bullet_point_1');
                $bp_bullet_point_2 = get_field('bp_bullet_point_2');
                $bp_bullet_point_3 = get_field('bp_bullet_point_3');

                if ($bp_heading_1 || $bp_heading_2 || $bp_text) : ?>
                    <div><?php

                            if ($bp_heading_1 || $bp_heading_2) : ?>
                            <h2>
                                <?php echo $bp_heading_1;
                                if ($bp_heading_2) : ?>
                                    <span><?php echo $bp_heading_2; ?></span>
                                <?php endif; ?>
                            </h2>
                        <?php endif;

                            if ($bp_text) :
                                echo $bp_text;
                            endif;
                        ?>
                    </div><?php
                        endif;

                        if ($bp_main_point_1 || $bp_bullet_point_1) :
                            ?><ol><?php
                            if ($bp_main_point_1 || $bp_bullet_point_1) : ?>
                            <li><?php
                                if ($bp_main_point_1) : ?>
                                    <h3><?php echo $bp_main_point_1; ?></h3>
                                <?php endif;
                                if ($bp_bullet_point_1) : ?>
                                    <p><?php echo $bp_bullet_point_1; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif;
                        if ($bp_main_point_2 || $bp_bullet_point_2) : ?>
                            <li><?php
                                if ($bp_main_point_2) : ?>
                                <h3><?php echo $bp_main_point_2; ?></h3>
                            <?php endif;
                                if ($bp_bullet_point_2) : ?>
                                    <p><?php echo $bp_bullet_point_2; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif;
                        if ($bp_main_point_3 || $bp_bullet_point_3) : ?>
                            <li><?php
                                if ($bp_main_point_3) : ?>
                            <h3><?php echo $bp_main_point_3; ?></h3>
                        <?php endif;
                                if ($bp_bullet_point_3) : ?>
                                    <p><?php echo $bp_bullet_point_3; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    </ol>
            <?php endif;
                    endif; ?>
        </section>
        <section id="packs" class="packs">
            <?php
            if (function_exists('get_field')) :
                $packs_heading_1 = get_field('packs_heading_1');
                $packs_heading_2 = get_field('packs_heading_2');

                if ($packs_heading_1 || $packs_heading_2) : ?>
                    <h2>
                        <?php echo $packs_heading_1;
                        if ($packs_heading_2) : ?>
                            <span><?php echo $packs_heading_2; ?></span>
                        <?php endif; ?>
                    </h2>
            <?php endif;
            endif;

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
                'orderby'   => 'menu_order',
                'order'     => 'ASC',
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
        </section>
        <section id="order" class="order">
            <?php
            if (function_exists( 'get_field' )) :
                $order_heading_1 = get_field( 'order_heading_1' );
                $order_heading_2 = get_field( 'order_heading_2' );
                $order_reminder = get_field( 'order_reminder' );
                $order_form     = get_field( 'order_form' );
                $instruction_1  = get_field( 'instruction_1' );
                $instruction_2  = get_field( 'instruction_2' );
                $instruction_3  = get_field( 'instruction_3' );
                $instruction_details_1  = get_field( 'instruction_details_1' );
                $instruction_details_2  = get_field( 'instruction_details_2' );
                $instruction_details_3  = get_field( 'instruction_details_3' );
                $contact_instruction = get_field( 'contact_instruction' );
                $phone_number   = get_field( 'phone_number' );
                $business_email = get_field( 'business_email' );
                $facebook       = get_field( 'facebook' );
                $instagram      = get_field( 'instagram' );
                
                if ($order_heading_1 || $order_heading_2): ?>
                    <h2>
                        <?php echo $order_heading_1;
                        if ($order_heading_2) : ?>
                            <span><?php echo $order_heading_2; ?></span>
                        <?php endif; ?>
                    </h2>
                <?php endif;

                if ($instruction_1 || $instruction_details_1) :?>
                    <ol><?php
                        if ($instruction_1 || $instruction_details_1) : ?>
                            <li><?php
                                if ($instruction_1) : ?>
                                    <h3><?php echo $instruction_1; ?></h3>
                                <?php endif;
                                if ($instruction_details_1) : ?>
                                    <p><?php echo $instruction_details_1; ?></p>
                                <?php endif;
                                if ($order_form) : 
                                    $order_form_url = $order_form['url'];
                                    $order_form_title = $order_form['title'];
                                    $order_form_target = $order_form['target'] ? $order_form['target'] : '_self'; ?>
                                    <a class="button" href="<?php echo esc_url( $order_form_url ); ?>" target="<?php echo esc_attr( $order_form_target ); ?>"><?php echo esc_html( $order_form_title ); ?></a>
                                <?php endif;
                                if ($contact_instruction || $phone_number || $business_email || $facebook || $instagram) : ?>
                                    <div class="contact">
                                        <?php if($contact_instruction) : ?>
                                            <p><?php echo $contact_instruction; ?></p>
                                        <?php endif; 
                                        if ($phone_number || $business_email || $facebook || $instagram) : ?>
                                            <div>
                                                <?php if($phone_number) :
                                                    $phone_number_url = $phone_number['url'];
                                                    $phone_number_title = $phone_number['title'];
                                                    $phone_number_target = $phone_number['target'] ? $phone_number['target'] : '_self'; ?>
                                                    <a href="<?php echo esc_url( $phone_number_url ); ?>" target="<?php echo esc_attr( $phone_number_target ); ?>"><?php echo esc_html( $phone_number_title ); ?></a>
                                                <?php endif;
                                                if($business_email) : ?>
                                                    <a href="<?php echo $business_email; ?>"><?php echo $business_email; ?></a>
                                                <?php endif;
                                                if($facebook) :
                                                    $facebook_url = $facebook['url'];
                                                    $facebook_title = $facebook['title'];
                                                    $facebook_target = $facebook['target'] ? $facebook['target'] : '_self'; ?>
                                                    <a href="<?php echo esc_url( $facebook_url ); ?>" target="<?php echo esc_attr( $facebook_target ); ?>"><?php echo esc_html( $facebook_title ); ?></a>
                                                <?php endif;
                                                if($instagram) :
                                                    $instagram_url = $instagram['url'];
                                                    $instagram_title = $instagram['title'];
                                                    $instagram_target = $instagram['target'] ? $instagram['target'] : '_self'; ?>
                                                    <a href="<?php echo esc_url( $instagram_url ); ?>" target="<?php echo esc_attr( $instagram_target ); ?>"><?php echo esc_html( $instagram_title ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </li>
                        <?php endif;
                        if ($instruction_2 || $instruction_details_2) : ?>
                            <li><?php
                                if ($instruction_2) : ?>
                                <h3><?php echo $instruction_2; ?></h3>
                            <?php endif;
                                if ($instruction_details_2) : ?>
                                    <p><?php echo $instruction_details_2; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif;
                        if ($instruction_3 || $instruction_details_3) : ?>
                            <li><?php
                                if ($instruction_3) : ?>
                            <h3><?php echo $instruction_3; ?></h3>
                        <?php endif;
                                if ($instruction_details_3) : ?>
                                    <p><?php echo $instruction_details_3; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    </ol>
            <?php endif;
            endif; ?>
        </section>
        <section class="faq">
            <?php
            if (function_exists('get_field')) :
                $faq_heading_1   = get_field('faq_heading_1');
                $faq_heading_2   = get_field('faq_heading_2');
                $question_1     = get_field('question_1');
                $question_2     = get_field('question_2');
                $question_3     = get_field('question_3');
                $question_4     = get_field('question_4');
                $answer_1       = get_field('answer_1');
                $answer_2       = get_field('answer_2');
                $answer_3       = get_field('answer_3');
                $answer_4       = get_field('answer_4');


                if ($faq_heading_1 || $faq_heading_2) : ?>
                    <h2>
                        <?php echo $faq_heading_1;
                        if ($faq_heading_2) : ?>
                            <span><?php echo $faq_heading_2; ?></span>
                        <?php endif; ?>
                    </h2>
                <?php endif;

                if ($question_1 && $answer_1) :
                    ?><ul><?php
                        if ($question_1 && $answer_1) : ?>
                            <li><?php
                                if ($question_1) : ?>
                                    <h3><?php echo $question_1; ?></h3>
                                <?php endif;
                                if ($answer_1) : ?>
                                    <p><?php echo $answer_1; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif;
                        if ($question_2 && $answer_2) : ?>
                            <li><?php
                                if ($question_2) : ?>
                                <h3><?php echo $question_2; ?></h3>
                            <?php endif;
                                if ($answer_2) : ?>
                                    <p><?php echo $answer_2; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif;
                        if ($question_3 && $answer_3) : ?>
                            <li><?php
                                if ($question_3) : ?>
                            <h3><?php echo $question_3; ?></h3>
                        <?php endif;
                                if ($answer_3) : ?>
                                    <p><?php echo $answer_3; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif;
                        if ($question_4 && $answer_4) : ?>
                            <li><?php
                                if ($question_4) : ?>
                        <h3><?php echo $question_4; ?></h3>
                    <?php endif;
                                if ($answer_4) : ?>
                                    <p><?php echo $answer_4; ?></p>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif;
            endif;
            ?>
        </section>

    <?php
    endwhile; // End of the loop.
    ?>



</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
