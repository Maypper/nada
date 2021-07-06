<?php
$title = get_field('title');
$p = get_field('p');
$btn = get_field('btn');
?>
<section class="sustainability-title position-relative">
	<img src="<?php echo get_theme_image_url('sustainability/boxes.png')?>" alt="Box" class="position-absolute img-left">
	<img src="<?php echo get_theme_image_url('sustainability/capsule+box.png')?>" alt="Capsule-Box" class="position-absolute img-right">
	<div class="sustainability-title__overlay position-relative">
		<h1 class="text-center m-auto"><?php echo $title ?></h1>
		<p class="text-center"><?php echo $p ?></p>
		<?php if ($btn) : ?><a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="button light-btn m-auto"><?php echo $btn['title']; ?></a> <?php endif; ?>
	</div>
</section>
