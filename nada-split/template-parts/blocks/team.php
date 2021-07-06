<?php
$title = get_field('title');
?>
<section class="team">
	<div class="team__title mx-auto">
		<h2><?php echo $title ?></h2>
	</div>
	<?php if (have_rows('members')): ?>
	<div class="container">
		<div class="row">
			<?php
			while (have_rows('members')):
				the_row();
				$img = get_sub_field('img');
				$name = get_sub_field('name');
				$position = get_sub_field('position');
				$p = get_sub_field('p');
			?>
			<div class="col-sm-6 col-md-4">
				<div class="team__box">
					<div class="team__img" style="background-image: url('<?php echo $img ?>');"></div>
					<div class="team__info">
						<strong><?php echo $name ?></strong>
						<span><?php echo $position ?></span>
						<p><?php echo $p ?></p>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
</section>