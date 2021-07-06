<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

$content = get_the_content();
$content = str_replace('<p><strong>', '<p class="product__includes">', $content);
$content = str_replace('</strong></p>', '</p>', $content);
$content = str_replace('<p>', '<p class="product__data">', $content);
$currentcats = $product->get_category_ids();

?>
    <section id="product-<?php the_ID(); ?>" class="product__info bgd-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ?>" alt="product">
                </div>
                <div class="col-md-6">
                    <div class="product__info-text">
                        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Back to List</a>
                        <h2><?php echo get_the_title() ?></h2>
                        <div class="product__rating d-flex">
                            <div class="product__rating-stars"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></div>
                            <p><?php echo $product->get_rating_count(); ?> review<?php if ($product->get_rating_count() > 1){echo 's';} ?></p>
                        </div>
                        <p class="product__price"><?php echo get_woocommerce_currency_symbol(); echo $product->get_price();?></p>
                        <?php
                        echo $content;
                        ?>
                        <?php do_action( 'woocommerce_single_product_summary' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
$title_g = get_field('title_g', $product->get_id());
$p_g = get_field('p_g', $product->get_id());
$goal_count_g = get_field('goals_g', $product->get_id());
if ($goal_count_g) {
	$goal_count_g = count($goal_count_g);
	$col = intdiv(12, $goal_count_g);
}
$display_g = get_field('display_g', $product->get_id());
if ($display_g) :
?>
    <section class="goal">
        <div class="container">
            <h2 class="marker text-center"><?php echo $title_g ?></h2>
            <p class="text-center"><?php echo $p_g ?></p>
			<?php if (have_rows('goals_g')): ?>
                <div class="row">
					<?php while (have_rows('goals_g')):
						the_row();
						$img = get_sub_field('img');
						$title_g = get_sub_field('title_g');
						?>
                        <div class="col-sm-<?php echo $col ?>">
                            <img class="d-flex m-auto" src="<?php echo $img ?>" alt="Cruelty Free">
                            <h4 class="text-center"><?php echo $title_g ?></h4>
                        </div>
					<?php endwhile; ?>
                </div>
			<?php endif; ?>
        </div>
    </section>
<?php endif;

$title_a = get_field('title_a', $product->get_id());
$link_a = get_field('link_a', $product->get_id());
$display_a = get_field('display_a', $product->get_id());
if ($display_a) :
?>
    <section class="asset bgd-light position-relative">
        <div class="container">
            <div class="asset__info">
                <h2 class="marker"><?php echo $title_a ?></h2>
                <?php if (have_rows('list_a')): ?>
                <ul>
                    <?php
                    while (have_rows('list_a')):
                        the_row();
                        $item = get_sub_field('item');
                        ?>
                    <li><?php echo $item ?></li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php if ($link_a): ?><a class="know-more" href="<?php echo $link_a['url'] ?>" target="<?php echo $link_a['target'] ?>"><?php echo $link_a['title'] ?></a><?php endif; ?>
            </div>
            <div class="asset__img">
                <img class="position-absolute img-bottom" src="<?php echo get_theme_image_url('product/box.png') ?>" alt="box">
                <img class="position-absolute img-oval" src="<?php echo get_theme_image_url('product/oval.png') ?>" alt="oval">
                <img class="position-absolute img-capsule" src="<?php echo get_theme_image_url('product/capsule+box.png') ?>" alt="capsule+box">
                <img class="position-absolute img-top" src="<?php echo get_theme_image_url('product/bottle.png') ?>" alt="bottle">
            </div>
        </div>
    </section>
<?php endif; ?>
<?php
$title = get_field('title_i', $product->get_id());
$decor = get_field('display_decor', $product->get_id());
$display_i = get_field('display_i', $product->get_id());
if ($display_i) :
?>
    <section class="important">
		<?php if ($decor): ?><img class="important-decor position-absolute" src="<?php echo get_theme_image_url('sustainability/ovals.png')?>" alt="decor"> <?php endif; ?>
        <div class="important-bg"></div>
        <div class="container">
            <h2 class="marker text-center"><?php echo $title ?></h2>
            <div class="row">
				<?php
				if (have_rows('circles_i')):
					$index = 1;
					while (have_rows('circles_i')):
						the_row();
						$num = get_sub_field('num');
						$big_word = get_sub_field('big_word');
						$p = get_sub_field('p');
						?>
                        <div class="col-md-4">
                            <div class="important-circle important-circle-<?php echo $index ?>">
                                <div class="important__img-box">
									<?php if ($num): ?><p class="marker big-p"><?php echo $num ?></p><?php endif; ?>
									<?php if ($big_word): ?><p class="marker small-p"><?php echo $big_word ?></p><?php endif; ?>
                                </div>
								<?php if ($p): ?><p class="important-p"><?php echo $p ?></p><?php endif; ?>
                            </div>
                        </div>
						<?php
						if ($index === 3) {
							$index = 1;
						}
						?>
						<?php $index++; endwhile; endif; ?>
            </div>
        </div>
    </section>
<?php endif;

$title = get_field('title_s', $product->get_id());
$p = get_field('p_s', $product->get_id());
$display_s = get_field('display_s', $product->get_id());
if ($display_s) :
?>
    <section class="simile">
        <div class="container">
            <h2 class="marker"><?php echo $title ?></h2>
            <p class="simile__top-text"><?php echo $p ?></p>
			<?php if (have_rows('similes')): ?>
                <div class="row">
					<?php
					while (have_rows('similes')):
						the_row();
						$img = get_sub_field('img');
						$text = get_sub_field('text');
						$tm = get_sub_field('tm');
						?>
                        <div class="col-md-6">
                            <div class="simile__left d-flex flex-column">
                                <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
								<?php if ($tm): ?>
                                    <div class="d-flex m-auto">
                                        <p class="text-center"><?php echo $text ?></p>
                                        <p class="text-underline">TM</p>
                                    </div>
								<?php else: ?>
                                    <p class="text-center"><?php echo $text ?></p>
								<?php endif; ?>
                            </div>
                        </div>
					<?php endwhile; ?>
                </div>
			<?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */

$average_rating = $product->get_average_rating();
$average_star_rating = wc_get_rating_html($average_rating);
?>
    <div id="reviews" class="rating-product bgd-light">
        <div class="container">
            <a href="#" id="collapse_link" class="review d-flex justify-content-end">WRITE A REVIEW</a>
            <div class="review-form-collapse">
                <?php
                if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
                    <div id="review_form_wrapper">
                        <div id="review_form" class="contact__box review-form">
			                <?php
			                $commenter    = wp_get_current_commenter();
			                $comment_form = array(
				                /* translators: %s is product title */
				                'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
				                /* translators: %s is product title */
				                'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
				                'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
				                'title_reply_after'   => '</span>',
				                'comment_notes_after' => '',
				                'label_submit'        => esc_html__( 'Submit', 'woocommerce' ),
				                'logged_in_as'        => '',
				                'comment_field'       => '',
			                );

			                $name_email_required = (bool) get_option( 'require_name_email', 1 );
			                $fields              = array(
				                'author' => array(
					                'label'    => __( 'Name', 'woocommerce' ),
					                'type'     => 'text',
					                'value'    => $commenter['comment_author'],
					                'required' => $name_email_required,
				                ),
				                'email'  => array(
					                'label'    => __( 'Email', 'woocommerce' ),
					                'type'     => 'email',
					                'value'    => $commenter['comment_author_email'],
					                'required' => $name_email_required,
				                ),
			                );

			                $comment_form['fields'] = array();

			                foreach ( $fields as $key => $field ) {
				                $field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
				                $field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

				                if ( $field['required'] ) {
					                $field_html .= '&nbsp;<span class="required">*</span>';
				                }

				                $field_html .= '</label><input class="input" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

				                $comment_form['fields'][ $key ] = $field_html;
			                }

			                $account_page_url = wc_get_page_permalink( 'myaccount' );
			                if ( $account_page_url ) {
				                /* translators: %s opening and closing link tags respectively */
				                $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
			                }

			                if ( wc_review_ratings_enabled() ) {
				                $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
					</select></div>';
			                }

			                $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

			                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
			                ?>
                        </div>
                    </div>
                <?php else : ?>
                    <p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
                <?php endif; ?>
            </div>
            <h2 class="text-center"><?php echo $average_rating ?></h2>
            <div class="product__rating-stars">
                <?php echo $average_star_rating ?>
            </div>
            <p class="text-center">Based on <?php echo $product->get_rating_count(); ?> review<?php if ($product->get_rating_count() > 1){echo 's';} ?></p>
            <a href="" class="most">Most Recent</a>
        </div>
        <?php

comments_template();

$paged = get_query_var( 'cpage' ) ? get_query_var( 'cpage' ) : 1;

$max_pages = get_comment_pages_count();


if( $paged < $max_pages ) {?>
    <button id="loadmore_btn" class="button light-btn" data-max-pages="<?php echo $max_pages ?>" data-paged="<?php echo $paged ?>">SHOW MORE REVIEWS</button>
<?php } ?>
    </div>
<?php
$title_w = get_field('title_w', $product->get_id());
$products = get_field('products', $product->get_id());
$display_w = get_field('display_w', $product->get_id());
?>
    <section class="cards">
        <h2 class="marker text-center"><?php echo $title_w ?></h2>
        <div class="row cards__row">
            <?php foreach ($products as $post):
                setup_postdata($post);
	            wc_get_template_part( 'content', 'product' );
	            endforeach;
            wp_reset_postdata();
            ?>
        </div>
    </section>
<?php
do_action( 'woocommerce_after_single_product' ); ?>