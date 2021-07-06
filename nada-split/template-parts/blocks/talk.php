<?php
$title = get_field('title');
$p = get_field('p');
$link = get_field('link');
$product_id = get_field('product');
$product_id = $product_id[0];
$product = new WC_Product($product_id);
$comquery = new WP_Comment_Query( array('post_id'=>$product_id, 'number' => 3) );
$average_rating = $product->get_average_rating();
$average_star_rating = wc_get_rating_html($average_rating);

?>
<section class="talk">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 talk__left">
				<div class="position-relative">
					<div class="talk__rating d-flex">
						<div class="talk__rating-stars">
							<?php echo $average_star_rating ?>
						</div>
						<p><?php echo $product->get_rating_count(); ?> review<?php if ($product->get_rating_count() > 1){echo 's';} ?></p>
					</div>
					<h2><?php echo $title ?></h2>
					<p class="talk__text"><?php echo $p ?></p>
					<?php if ($link): ?>
                        <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?></a>
                    <?php else: ?>
                        <a href="<?php echo $product->get_permalink() ?>">SEE MORE INFO
                    <?php endif; ?>
					<img class="talk__box position-absolute" src="<?php echo get_the_post_thumbnail_url( $product_id );?>" alt="NADA product">
				</div>
			</div>
			<div class="col-lg-6">
                <?php
                foreach( $comquery->comments as $comment ){
                    $comment_id = $comment->comment_ID;
                    $comment_rating = get_comment_meta($comment_id, 'rating', true);
	                $comment_star_rating = wc_get_rating_html($comment_rating);
	                $comment_title = get_comment_meta( $comment_id, 'comment_title', true );
	                $comment_text = get_comment_text($comment_id);
                    ?>
                    <div class="talk__card">
                        <?php echo $comment_star_rating ?>
                        <h3 class="marker"><?php echo $comment_title ?></h3>
                        <p><?php echo $comment_text ?></p>
                    </div>
                <?php
                } // endforeach
                ?>
			</div>
		</div>
	</div>
</section>
