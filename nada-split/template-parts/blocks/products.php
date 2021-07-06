<?php
$args = array(
	'post_type'      => 'product',
	'posts_per_page' => 12
);
$loop = new WP_Query( $args );
?>
<section class="cards">
    <div class="row cards__row">
		<?php
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		}
		wp_reset_postdata();
		?>
    </div>
</section>