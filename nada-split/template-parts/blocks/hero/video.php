<?php
$title = get_field('title');
$p = get_field('p');
$title_v = get_field('title_v');
$p_v = get_field('p_v');
$btn = get_field('btn');
$video = get_field('video');
$video_image = get_field('video_image');
?>
<section class="product">
	<div class="product__title mx-auto text-center">
		<h1><?php echo $title ?></h1>
		<p><?php echo $p ?></p>
	</div>
	<div class="product__video position-relative">
		<video muted loop id="myVideo" onclick="myFunction()" poster="<?php echo $video_image ?>">
			<source src="<?php echo $video ?>" type="video/mp4">
		</video>
		<div class="content" id="myCont">
			<h2><?php echo $title_v ?></h2>
			<p><?php echo $p_v ?></p>
			<?php if ($btn) : ?><a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="button orange-btn"><?php echo $btn['title']; ?></a> <?php endif; ?>
			<!-- Use a button to pause/play the video with JavaScript -->
		</div>
		<button id="myBtn" onclick="myFunction()"><img src="<?php echo get_theme_image_url('home/product/play.svg')?>" alt="play"></button>
	</div>
</section>
