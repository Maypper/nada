<?php
$p = get_field('p');
$stats_img = get_field('stats_img');
?>
<article class="stats position-relative">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">
				<div class="stats__info">
					<p class="revolution-text"><?php echo $p ?></p>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="stats__stand">
					<img class="d-flex m-auto img-fluid" src="<?php if ($stats_img): echo $stats_img; else: echo get_theme_image_url('revolution/stats.png'); endif; ?>" alt="stats">
				</div>
			</div>
		</div>
	</div>
	<img class="position-absolute stats-water img-fluid" src="<?php echo get_theme_image_url('revolution/wave.png') ?>" alt="wave">
	<img class="position-absolute stats-wave" src="<?php echo get_theme_image_url('revolution/union.svg') ?>" alt="union">
	<img class="position-absolute stats-fish" src="<?php echo get_theme_image_url('revolution/fish.png') ?>" alt="fish">
</article>
