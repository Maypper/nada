<?php
$title = get_field('title');
$p = get_field('p');
?>
<section class="scroll-title position-relative">
	<div class="scroll-title__overlay">
		<h1 class="marker"><?php echo $title ?></h1>
		<p><?php echo $p ?></p>
		<div class="scroll-title__buttons d-flex justify-content-between">
			<?php
            if (have_rows('btns')) :
                while (have_rows('btns')) :
                    the_row();
                    $btn = get_sub_field('btn');
                ?>
	                <?php if ($btn) : ?><a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="button white-btn"><?php echo $btn['title']; ?></a> <?php endif; ?>
            <?php endwhile; endif; ?>
		</div>
		<a href="#" class="scroll-down"></a>
	</div>
</section>
