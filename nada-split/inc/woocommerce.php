<?php

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_image_size( 'woocommerce-thumbnail', 560, 510, true );
add_image_size( 'woocommerce-thumbnail-slide', 358, 280, true );

function kit() { ?>
    </div>
    </section>
    <section class="kit">
        <div class="kit__box">
            <div class="row">
                <div class="col-lg-6">
                    <div class="kit__box-info">
                        <p>2 x Lifetime Bottle; 6 x Cleaning Tablets</p>
                        <h2>All-In-One Cleaning Kit</h2>
                        <p>Nada packs all the cleaning power you need into one tiny tablet. Simply drop one tablet into
                            one of our
                            Lifetime Bottles (or your own), add water, give it a shake, and you’re armed with a super
                            effective,
                            eco-friendly cleaning product.</p>
                        <div class="infocard__rating d-flex">
                            <div class="infocard__rating-stars"><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/home/infocards/stars.png" alt="rating">
                            </div>
                            <p>0 reviews</p>
                        </div>
                        <button class="button blue-btn">SHOP NOW</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="kit__box-stand">
                        <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/shop/stand.png" alt="bottle + box">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cards">
        <div class="row cards__row">
    <?php
}

add_filter( 'body_class','my_body_classes' );

function my_body_classes( $classes )
{
    if (is_shop()) {
        $classes[] = 'shop';
    }
    return $classes;
}

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
    $args['posts_per_page'] = 3;
    return $args;
}
