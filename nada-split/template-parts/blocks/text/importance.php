<?php
$title = get_field('title');
$p = get_field('p');
$btn = get_field('btn');
?>
<section class="importance position-relative">
    <div class="container">
        <div class="importance__box">
            <h2 class="text-center"><?php echo $title ?></h2>
            <p class="text-center"><?php echo $p ?></p>
            <?php if ($btn) : ?><a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="button light-btn m-auto"><?php echo $btn['title']; ?></a> <?php endif; ?>
        </div>
    </div>
    <svg class="position-absolute img-oval-right" width="145" height="250" viewBox="0 0 145 250" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <circle class="backgr" cx="125" cy="125" r="125" fill="#d1c2dc"/>
    </svg>
    <img class="position-absolute img-left-top" src="<?php echo get_theme_image_url('home/importance/bottle.png')?>" aria-hidden="true" alt="">
    <img class="position-absolute img-right-down" src="<?php echo get_theme_image_url('home/importance/boxes.png')?>" aria-hidden="true" alt="">
    <img class="position-absolute img-oval-left" src="<?php echo get_theme_image_url('home/importance/oval.svg')?>" aria-hidden="true" alt="">
    <img class="position-absolute img-left-down" src="<?php echo get_theme_image_url('home/importance/group.png')?>" aria-hidden="true" alt="">
    <img class="position-absolute img-right-top" src="<?php echo get_theme_image_url('home/importance/group2.png')?>" aria-hidden="true" alt="">
</section>
