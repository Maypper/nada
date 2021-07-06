<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product, $wp_query;

if ( ! comments_open() ) {
	return;
}

?>

	<div class="comments">

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
                <div class="span-line"></div>
			</ol>

<?php
//			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
//				echo '<nav class="woocommerce-pagination">';
//				paginate_comments_links(
//					apply_filters(
//						'woocommerce_comment_pagination_args',
//						array(
//							'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
//							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
//							'type'      => 'list',
//						)
//					)
//				);
//				echo '</nav>';
//			endif;
//
//            ?>
<!--		--><?php //else : ?>
<!--			<p class="woocommerce-noreviews">--><?php //esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?><!--</p>-->
		<?php endif; ?>
	</div>
	<div class="clear"></div>

