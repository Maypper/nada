<?php
$title = get_field('title');
?>
<section class="ingridients">
	<div class="ingridients__title">
		<h3><?php echo $title ?></h3>
	</div>
	<?php if (have_rows('ingridients')): ?>
	<div class="container">
		<div class="row">
			<?php
			while (have_rows('ingridients')):
			the_row();
			$img = get_sub_field('img');
			$header = get_sub_field('header');
			$p = get_sub_field('p');
			?>
			<div class="col-sm-6">
				<div class="ingridients__box">
					<div class="ingridients__img" style="background-image: url(<?php echo $img ?>);"></div>
					<div class="ingridients__info">
						<b><?php echo $header ?></b>
						<p><?php echo $p ?></p>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
</section>