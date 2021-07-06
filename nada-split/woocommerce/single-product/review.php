<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $comment;

$helpful_yes = get_comment_meta($comment->comment_ID, 'helpful_yes', true);
$helpful_no = get_comment_meta($comment->comment_ID, 'helpful_no', true);
$disabled_btn = get_comment_meta($comment->comment_ID, 'user_votes', true);
$current_user = wp_get_current_user();
$user_vote = $disabled_btn[$current_user->ID] ?? false;


$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
$comment_title = get_comment_meta( $comment->comment_ID, 'comment_title', true );

$comment_text = get_comment_text($comment->comment_ID);
$quality = intval(get_comment_meta($comment->comment_ID, 'quality', true)) . '0';
$functional = intval(get_comment_meta($comment->comment_ID, 'functional', true)) . '0';


$comment_date = sprintf( esc_html__( '%s ago', 'textdomain' ), human_time_diff(get_comment_date('U'), current_time( 'timestamp' ) ) );
?>
<div class="span-line"></div>
<div class="container product-review-<?php comment_ID(); ?>">
    <div class="row">
            <div class="col-lg-4">

                <div class="rating-product-left-col">
                    <div class="rating-product__user d-flex">
                        <div class="rating-product__avatar">
                            <?php do_action( 'woocommerce_review_before', $comment ); ?>
                        </div>
                        <div class="rating-product__user-info">
                            <p class="rating-product__user-info-name"><?php echo $comment->comment_author ?></p>
                        </div>
                    </div>
                    <div class="rating-product__product d-flex">
                        <div class="rating-product__img">
                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                        </div>
                        <div class="rating-product__product-info">
                            <p class="rating-product-respect">Reviewing</p>
                            <p class="rating-product__product-info-text"><?php echo get_the_title()?></p>
                        </div>
                    </div>
                    <?php if ($rating >= 4): ?>
                    <p class="recommend">I recommend this product!</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="span-line"></div>
            <div class="col-lg-8">
                <div class="rating-product-reviews d-flex justify-content-between">
                    <div class="rating-product-stars">
                       <?php do_action( 'woocommerce_review_before_comment_meta', $comment ); ?>
                    </div>
                    <p class="rating-product-respect"><?php echo $comment_date ?></p>
                </div>
                <?php if ($comment_title) : ?> <p class="rating-product-respect"><?php echo $comment_title ?></p> <?php endif; ?>
                <p class="rating-product-respect-text"><?php echo $comment_text ?></p>
                <div class="row">
                    <div class="col-md-6">
                        <p class="rating-product-respect">QUALITY</p>
                        <div class="rating-product-quality">
                            <div class="progress progress-1">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $quality ?>%" aria-valuenow="<?php echo $quality ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="rating-product-respect-scale">Not Bad</p>
                                <p class="rating-product-respect-scale">Very Good!</p>
                            </div>
                        </div>
                        <p class="rating-product-respect">FUNCTIONAL</p>
                        <div class="rating-product-quality">
                            <div class="progress progress-2">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $functional ?>%" aria-valuenow="<?php echo $functional ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="rating-product-respect-scale">Not Bad</p>
                                <p class="rating-product-respect-scale">Very Good!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rating-product-helpful">
                        <p class="rating-product-helpful-text">Was this helpful?</p>
                        <button class="helpful_button" data-value="+" data-id="<?php echo $comment->comment_ID ?>" <?php if ($user_vote == '+' || !is_user_logged_in()){ echo 'disabled';} ?>>
                            <img src="<?php echo get_theme_image_url( 'product/like-black.svg' ) ?>" alt="">
                        </button>
                        <p><?php echo $helpful_yes ?></p>
                        <button class="helpful_button" data-value="-" data-id="<?php echo $comment->comment_ID ?>" <?php if ($user_vote == '-' || !is_user_logged_in()){ echo 'disabled';} ?>>
                            <img src="<?php echo get_theme_image_url('product/dislike.svg')?>" alt="">
                        </button>
                        <p><?php echo $helpful_no ?></p>
                    </div>
                </div>
            </div>
    </div>
</div>
<style>
.product-review-<?php comment_ID(); ?> .rating-product-quality .progress-2::after {
    left: <?php echo $functional ?>% !important;
}
.product-review-<?php comment_ID(); ?> .rating-product-quality .progress-1::after {
    left: <?php echo $quality ?>% !important;
}
</style>