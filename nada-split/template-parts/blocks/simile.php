<?php
$title = get_field('title');
$p = get_field('p');
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