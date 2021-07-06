<?php
$title = get_field('title');
$p = get_field('p');
?>
<section class="solving">
	<div class="container">
		<h2 class="marker text-center"><?php echo $title ?></h2>
		<div class="solving__info">
			<p class="revolution-text"><?php echo $p ?></p>
		</div>
	</div>
</section>