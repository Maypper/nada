<?php
$title = get_field('title');
?>
<section class="development">
	<h2 class="development__title text-center"><?php echo $title ?></h2>
	<?php
	if (have_rows('products')):
		$index = 1;
		while (have_rows('products')):
			the_row();
			$title = get_sub_field('title');
			$p = get_sub_field('p');
			$link = get_sub_field('link');
			$img = get_sub_field('img');
			if($index % 2 == 0){
				$margin = 'l';
			}
			else{
				$margin = 'r';
			}
	?>
	<div class="development__info position-relative">
		<div class="container">
			<div class="development__info-text m<?php echo $margin ?>-auto development__info-text-<?php echo $index ?>">
				<h2 class="marker h2-<?php echo $index ?>"><?php echo $title ?></h2>
				<p><?php echo $p ?></p>
				<?php if ($link): ?><a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?></a><?php endif; ?>
			</div>
		</div>
		<img class="development__img-<?php echo $index ?> position-absolute" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
	</div>
			<?php $index ++;
			if ( $index === 5 ) {
				$index = 1;
			} endwhile; endif; ?>
</section>