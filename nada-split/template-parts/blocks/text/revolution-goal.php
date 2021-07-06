<?php
$title = get_field('title');
$p = get_field('p');
$img = get_field('img');
?>
<section class="revolution-goal position-relative">
	<img class="bg-oval position-absolute" src="<?php echo get_theme_image_url('revolution/oval.png') ?>" alt="">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="revolution-goal__info">
					<h2 class="marker text-white"><?php echo $title ?></h2>
					<p class="text-white revolution-text"><?php echo $p ?></p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="revolution-goal__stand">
					<img class="d-flex m-auto img-fluid" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
				</div>
			</div>
		</div>
	</div>

</section>