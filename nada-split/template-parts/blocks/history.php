<?php
$title = get_field('title');
?>
<section class="history">
	<div class="history__title mx-auto">
		<h2><?php echo $title ?></h2>
	</div>
	<?php if (have_rows('lines')): ?>
	<div class="container">
		<div class="history__table">
			<?php
			while (have_rows('lines')):
			the_row();
			$img = get_sub_field('img');
			$header = get_sub_field('header');
			$p = get_sub_field('p');
			?>
			<div class="history__line">
				<div class="history__img" style="background-image: url('<?php echo $img ?>');"></div>
				<div class="history__text">
					<b><?php echo $header ?></b>
					<p><?php echo $p ?></p>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
</section>