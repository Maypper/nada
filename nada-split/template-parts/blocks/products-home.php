<?php
$post_to_display = get_field('post_to_display');
$tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN', // or 'NOT IN' to exclude feature products
);
// The query
$query = new WP_Query( array(
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'posts_per_page'      => $post_to_display,
    'order'             => 'ASC',
    'tax_query'           => $tax_query // <===
) );

$title = get_field('title');
$p = get_field('p');
$link = get_field('link');
$title_v = get_field('title_v');
$p_v = get_field('p_v');
$btn = get_field('btn');
$video = get_field('video');
$video_image = get_field('video_image');
?>
<section class="product">
    <div class="product__bg">
        <div class="product__box-slider">
            <div class="product__box-info">
                <h2 class="marker position-relative"><?php echo $title ?><img class="position-absolute"
                                                                      src="<?php echo get_theme_image_url('home/product/line%20curve.png')?>"
                                                                      aria-hidden="true" alt="line"></h2>
                <p><?php echo $p ?></p>
                <?php if ($link): ?><a class="blue-text" href="<?php echo $link['link'] ?>" target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?></a> <?php endif; ?>
            </div>
            <?php
            while ( $query->have_posts() ) :
                $query->the_post();
            ?>
                <div class="product__box-slider-box">
                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url()?>" alt="Tablet Sachets">
                    <div class="product__box-slider-text">
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="button light-btn blue-text">SHOP NOW</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="container-fluid">
            <a href="<?php the_permalink(); ?>" class="button light-btn m-auto">SEE ALL PRODUCTS</a>
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
    </div>
</section>
