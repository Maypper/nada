<?php
$title = get_field('title');
$p = get_field('p');
?>
<section class="scroll-title position-relative">
    <img src="<?php echo get_theme_image_url('ingridients/Bottle.png')?>" alt="Bottle" class="img-1">
    <img src="<?php echo get_theme_image_url('ingridients/Capsule-Box.png')?>" alt="Capsule-Box" class="img-2">
    <img src="<?php echo get_theme_image_url('ingridients/klipartz.png')?>" alt="klipartz" class="img-3">
	<div class="scroll-title__overlay">
		<h1 class="marker"><?php echo $title ?></h1>
		<p><?php echo $p ?></p>
		<a href="#" class="scroll-down"></a>
	</div>
</section>
