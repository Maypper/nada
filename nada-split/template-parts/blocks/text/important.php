<?php
$title = get_field('title');
$decor = get_field('display_decor');
?>
<section class="important">
    <?php if ($decor): ?><img class="important-decor position-absolute" src="<?php echo get_theme_image_url('sustainability/ovals.png')?>" alt="decor"> <?php endif; ?>
	<div class="important-bg"></div>
	<div class="container">
		<h2 class="marker text-center"><?php echo $title ?></h2>
		<div class="row">
			<?php
			if (have_rows('circles')):
                $index = 1;
				while (have_rows('circles')):
					the_row();
					$num = get_sub_field('num');
					$big_word = get_sub_field('big_word');
					$p = get_sub_field('p');
			?>
			<div class="col-md-4">
				<div class="important-circle important-circle-<?php echo $index ?>">
					<div class="important__img-box">
						<?php if ($num): ?><p class="marker big-p"><?php echo $num ?></p><?php endif; ?>
						<?php if ($big_word): ?><p class="marker small-p"><?php echo $big_word ?></p><?php endif; ?>
					</div>
					<?php if ($p): ?><p class="important-p"><?php echo $p ?></p><?php endif; ?>
				</div>
			</div>
                <?php
                    if ($index === 3) {
                        $index = 1;
                    }
                    ?>
			<?php $index++; endwhile; endif; ?>
		</div>
	</div>
</section>