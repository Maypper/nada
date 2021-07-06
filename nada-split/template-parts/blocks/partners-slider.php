<?php
$title = get_field('title');
$link = get_field('link');
?>
<section class="partners">
    <div class="slider d-flex">
        <div class="slider__box">
            <h4 class="m-auto"><?php echo $title ?></h4>
        </div>
        <?php
        if (have_rows('partners')):
            while(have_rows('partners')):
                the_row();
                $img = get_sub_field('img');
        ?>
        <div class="slider__box">
            <?php if ($link): ?>
                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>"><img class="m-auto" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>"></a>
            <?php else: ?>
                <img class="m-auto" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
            <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
    </div>
</section>
