<?php
$p = get_field('p');
$img = get_field('img');
?>
<section class="zero_waste">
	<div class="container">
		<p class="text-center text-white"><?php echo $p ?></p>
		<img class="img-fluid" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
	</div>
</section>