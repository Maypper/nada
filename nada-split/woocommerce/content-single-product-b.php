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
$product_id=get_the_id();
$comments = get_comments(
	array(
		'post_id'=>$product_id,
		'post_type'=>'product'
	)
);
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
							<p><?php echo count($comments); ?> review<?php if (count($comments) > 1){echo 's';} ?></p>
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

$title_a = get_field('title_a');
$link_a = get_field('link_a');
$display_a = get_field('display_a');
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
$title = get_field('title_i');
$decor = get_field('display_decor');
$display_i = get_field('display_i');
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

$title = get_field('title_s');
$p = get_field('p_s');
$display_s = get_field('display_s');
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
	<section class="rating-product bgd-light" style="display: none">

		<div class="container">
			<?php if($comments){
				$comments_count=count($comments);
				$comment_rates=0;
				foreach ($comments as $comment){
					$comment_rates=+get_comment_meta( $comment->comment_ID, 'rating', true);
				}
				$comment_rates=$comment_rates/$comments_count;
				?>
				<a href="" class="review d-flex justify-content-end">WRITE A REVIEW</a>
				<h2 class="text-center"><?php echo round($comment_rates, 2); ?></h2>
				<div class="product__rating-stars"><img class="d-flex m-auto" src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/home/infocards/stars.png" alt="rating">
				</div>
				<p class="text-center">Based on <?php echo $comments_count; ?> reviews</p>
				<a href="" class="most">Most Recent</a>
			<?php }else { ?>
				<p class="text-center">No reviews yet</p>
				<a href="" class="review d-flex justify-content-end">WRITE A REVIEW</a>
			<?php } ?>
		</div>

		<?php if($comments){ ?>
			<?php foreach ( $comments as $comment ) {
				$post_id=$comment->comment_post_ID;
				$comment_ID=$comment->comment_ID;
				$comments_photo=get_field('comments-photo', $comment);
				$comments_quality=get_field('comments-quality', $comment);
				$comments_functional=get_field('comments-functional', $comment);
				$comments_rate=get_field('comments-rate', $comment);
				?>
				<div class="span-line"></div>
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="rating-product-left-col">
								<div class="rating-product__user d-flex">
									<?php if($comments_photo){?>
										<div class="rating-product__avatar">
											<img src="<?php echo $comments_photo['url'];?>" alt="<?php echo $comments_photo['alt'];?>">
										</div>
									<?php } ?>
									<div class="rating-product__user-info">
										<p class="rating-product__user-info-name"><?php echo $comment->comment_author; ?></p>
										<?php if($comment->comment_approved==1){?>
											<p class="rating-product__user-info-ver">Verified Buyer</p>
										<?php } ?>
									</div>
								</div>
								<?php if($post_id){?>
									<div class="rating-product__product d-flex">
										<div class="rating-product__img">
											<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/product/product-photo.png" alt="">
										</div>
										<div class="rating-product__product-info">
											<p class="rating-product-respect">Reviewing</p>
											<p class="rating-product__product-info-text"><?php echo get_the_title($post_id);?></p>
										</div>
									</div>
									<p class="recommend">I recommend this product!</p>
								<?php } ?>
							</div>
						</div>
						<div class="span-line"></div>
						<div class="col-lg-8">
							<div class="rating-product-reviews d-flex justify-content-between">
								<div class="rating-product-stars">

									<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/home/infocards/stars.png" alt="rating">
								</div>
								<p class="rating-product-respect">3 days ago</p>
							</div>
							<div class="rating-product-respect-text">
								<?php echo $comment->comment_content; ?>
							</div>
							<p class="rating-product-respect">Love this product!</p>

							<div class="row">
								<div class="col-md-6">
									<?php if($comments_quality){?>
										<p class="rating-product-respect">QUALITY</p>
										<div class="rating-product-quality">
											<div class="progress">
												<div class="progress-bar" role="progressbar" style="width: <?php echo $comments_quality;?>%" aria-valuenow="<?php echo $comments_quality;?>" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<div class="d-flex justify-content-between">
												<p class="rating-product-respect-scale">Not Bad</p>
												<p class="rating-product-respect-scale">Very Good!</p>
											</div>
										</div>
									<?php } ?>
									<?php if($comments_functional){?>
										<p class="rating-product-respect">FUNCTIONAL</p>
										<div class="rating-product-quality">
											<div class="progress progress-2">
												<div class="progress-bar" role="progressbar" style="width: <?php echo $comments_functional; ?>%" aria-valuenow="<?php echo $comments_functional; ?>" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
											<div class="d-flex justify-content-between">
												<p class="rating-product-respect-scale">Not Bad</p>
												<p class="rating-product-respect-scale">Very Good!</p>
											</div>
										</div>
									<?php } ?>
								</div>
								<div class="col-lg-6 rating-product-helpful">
									<p class="rating-product-helpful-text">Was this helpful?</p>
									<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/product/like-black.svg" alt="">
									<p>1</p>
									<img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/product/dislike.svg" alt="">
									<p>0</p>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>

			<div class="span-line"></div>
			<div class="container">
				<button class="button light-btn">SHOW MORE REVIEWS</button>
			</div>
		<?php } ?>
	</section>

<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
//do_action( 'woocommerce_after_single_product_summary' );
woocommerce_output_related_products(); ?>

<?php
do_action( 'woocommerce_after_single_product' ); ?>