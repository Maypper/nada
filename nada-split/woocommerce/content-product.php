<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;


remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);




// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-sm-6 col-lg-4">
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
//	do_action( 'woocommerce_before_shop_loop_item' );
//	do_action( 'woocommerce_after_shop_loop_item' );
//
//	/**
//	 * Hook: woocommerce_before_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_show_product_loop_sale_flash - 10
//	 * @hooked woocommerce_template_loop_product_thumbnail - 10
//	 */
//	do_action( 'woocommerce_before_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_template_loop_product_title - 10
//	 */
	?>
    <div class="infocard">
        <div class="infocard__img">
            <a href="<?php the_permalink(); ?>"><img class="img-fluid" src='<?php echo get_the_post_thumbnail_url(); ?>'></a>
            <div class="infocard__buttons">
                <a class="button card-light-btn" href="<?php the_permalink(); ?>">KNOW MORE</a>
                <?php do_action('woocommerce_after_shop_loop_item'); ?>
            </div>
        </div>
        <div class="infocard__text">
            <div class="infocard__name-price d-flex justify-content-between">
                <p class="infocard__name-product text-left"><?php echo get_the_title(); ?></p>
                <p class="infocard__price-product text-right"><?php echo $product->get_price(); echo get_woocommerce_currency_symbol()?></p>
            </div>
            <p class="infocard__complement text-left"><?php echo get_the_excerpt(); ?></p>
            <div class="infocard__rating d-flex">
                <div class="infocard__rating-stars"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></div>
                <p><?php echo $product->get_rating_count(); ?> reviews</p>
            </div>
        </div>
    </div>
    <?php
//	do_action( 'woocommerce_shop_loop_item_title' );
//
//	/**
//	 * Hook: woocommerce_after_shop_loop_item_title.
//	 *
//	 * @hooked woocommerce_template_loop_rating - 5
//	 * @hooked woocommerce_template_loop_price - 10
//	 */
//
//	/**
//	 * Hook: woocommerce_after_shop_loop_item.
//	 *
//	 * @hooked woocommerce_template_loop_product_link_close - 5
//	 * @hooked woocommerce_template_loop_add_to_cart - 10
//	 */
	?>
</div>
