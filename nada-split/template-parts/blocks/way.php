<?php
$title = get_field('title');
$img = get_field('img');
$p = get_field('p');
$steps = get_field('steps');
$steps_count = count($steps);
$steps_count--;
$bottom_p = get_field('bottom_p');
$btn = get_field('btn');
?>
<section class="way position-relative">
	<img class="way-bottle position-absolute" src="<?php echo get_theme_image_url('revolution/bottle.png') ?>" alt="bottle">
	<img class="way-purpose position-absolute" src="<?php echo get_theme_image_url('revolution/purpose.png') ?>" alt="purpose">
	<div class="container">
		<h2 class="way__title text-center"><?php echo $title ?></h2>
		<img class="way__img d-flex m-auto img-fluid" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
		<p class="way__text revolution-text"><?php echo $p ?></p>
		<?php if ($steps): ?>
			<div class="principle__step d-flex justify-content-around">
				<?php foreach ($steps as $index => $step):
					$indexi = $index + 1;
					?>
					<div class="principle__step-box d-flex">
						<img src="<?php echo get_theme_image_url('home/principle/circle'. $indexi .'.svg')?>" alt="step <?php echo $indexi ?>">
						<p><?php echo $step['step']; ?></p>
					</div>
					<?php if ($index != $steps_count): ?>
					<div class="principle__step-arrow">
						<img src="<?php echo get_theme_image_url('home/principle/arrow-right.svg')?>" alt="arrow">
					</div>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="way__down">
			<p class="revolution-text"><?php echo $bottom_p ?></p>
			<?php if ($btn) : ?><a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="button light-btn"><?php echo $btn['title']; ?></a> <?php endif; ?>
		</div>
	</div>
</section>