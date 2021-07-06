<?php
?>
<section class="benefits">
	<div class="container">
		<div class="row">
			<?php
			if ( have_rows( 'benefits' ) ):
				while ( have_rows( 'benefits' ) ):
					the_row();
					$img   = get_sub_field( 'img' );
					$title = get_sub_field( 'title' );
					$p     = get_sub_field( 'p' );
					?>
			<div class="col-sm-6"><img src="<?php echo $img['url'] ?>" aria-hidden="true" alt="<?php echo $img['alt'] ?>">
				<h3><?php echo $title ?></h3>
				<p><?php echo $p ?></p>
			</div>
				<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>
