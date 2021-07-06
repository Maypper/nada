<?php
$img = get_field('img');
$title = get_field('title');
$p = get_field('p');
$btn = get_field('btn');
?>
<section class="revolution">
	<img class="img-fluid" src="<?php echo $img ?>" alt="">
	<div class="container-fluid">
		<h2 class="marker text-center"><?php echo $title ?></h2>
		<p class="m-auto text-center"><?php echo $p ?></p>
		<?php if ($btn) : ?><a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="button light-btn m-auto"><?php echo $btn['title']; ?></a> <?php endif; ?>
	</div>
</section>
