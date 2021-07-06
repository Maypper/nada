<?php
$p = get_field('p');
$link = get_field('link');
$title_l = get_field('title_l');
$p_l = get_field('p_l');
$title_r = get_field('title_r');
$p_r = get_field('p_r');
$img_l = get_field('img_l');
$img_r = get_field('img_r');
$steps = get_field('steps');
$steps_count = count($steps);
$steps_count--;
?>
<section class="principle">
    <div class="container">
        <p class="principle__text-up text-center"><?php echo $p ?></p>
        <?php if ($link): ?><a class="d-block text-center blue-text" href="<?php echo $link['link'] ?>" target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?></a> <?php endif; ?>
        <div class="row">
            <div class="col-xl-6 column-left d-flex">
                <div class="principle__box order-md-first order-last">
                    <div class="principle__box-text">
                        <h2><?php echo $title_l ?></h2>
                        <p><?php echo $p_l ?></p>
                    </div>
                </div>
                <div class="principle__box order-md-last order-first position-relative">
                    <div class="principle__box-img overflow-hidden">
                        <svg class="svg-img" width="250" height="250" viewBox="0 0 250 250" fill=""
                             xmlns="http://www.w3.org/2000/svg">
                            <path class="backgr"
                                  d="M-912.351 723.944L-860.571 794.605L-853.98 789.697C-785.709 739.668 -836.68 692.597 -772.511 645.575C-708.342 598.552 -668.55 653.814 -607.822 609.313C-547.095 564.811 -581.95 505.931 -527.27 465.861C-472.589 425.791 -421.028 472.429 -362.245 429.353C-303.136 386.038 -323.654 318.664 -279.293 284.222C-216.467 240.149 -176.902 293.565 -116.897 249.593C-56.1594 205.084 -91.0242 146.211 -36.344 106.141C-28.2567 101.148 -24.5888 99.6908 -19.4775 98.8932C-14.3662 98.0956 2.23692 95.5811 14.0256 96.212C45.4518 97.8852 74.7144 109.226 117.27 78.0415C185.541 28.0121 134.57 -19.0586 198.739 -66.0815C262.908 -113.104 302.7 -57.8421 363.427 -102.343C424.155 -146.845 389.3 -205.725 443.98 -245.795C498.661 -285.865 550.222 -239.227 609.005 -282.303C668.114 -325.618 647.596 -392.992 691.957 -427.434C754.783 -471.507 794.348 -418.091 854.353 -462.063C915.091 -506.572 880.226 -565.445 934.906 -605.515C987.703 -644.204 1037.65 -602.012 1093.98 -637.965L1042.33 -708.451L-912.351 723.944Z"
                                  fill="#0D745B"/>
                        </svg>
                    </div>
                    <img class="position-absolute" src="<?php echo $img_l['url'] ?>" aria-hidden="true" alt="<?php echo $img_l['alt'] ?>">
                </div>
            </div>
            <div class="col-xl-6 column-right d-flex">
                <div class="principle__box position-relative">
                    <div class="principle__box-img overflow-hidden">
                        <svg class="svg-img" width="250" height="250" viewBox="0 0 250 250" fill=""
                             xmlns="http://www.w3.org/2000/svg">
                            <path class="backgr"
                                  d="M-912.351 723.944L-860.571 794.605L-853.98 789.697C-785.709 739.668 -836.68 692.597 -772.511 645.575C-708.342 598.552 -668.55 653.814 -607.822 609.313C-547.095 564.811 -581.95 505.931 -527.27 465.861C-472.589 425.791 -421.028 472.429 -362.245 429.353C-303.136 386.038 -323.654 318.664 -279.293 284.222C-216.467 240.149 -176.902 293.565 -116.897 249.593C-56.1594 205.084 -91.0242 146.211 -36.344 106.141C-28.2567 101.148 -24.5888 99.6908 -19.4775 98.8932C-14.3662 98.0956 2.23692 95.5811 14.0256 96.212C45.4518 97.8852 74.7144 109.226 117.27 78.0415C185.541 28.0121 134.57 -19.0586 198.739 -66.0815C262.908 -113.104 302.7 -57.8421 363.427 -102.343C424.155 -146.845 389.3 -205.725 443.98 -245.795C498.661 -285.865 550.222 -239.227 609.005 -282.303C668.114 -325.618 647.596 -392.992 691.957 -427.434C754.783 -471.507 794.348 -418.091 854.353 -462.063C915.091 -506.572 880.226 -565.445 934.906 -605.515C987.703 -644.204 1037.65 -602.012 1093.98 -637.965L1042.33 -708.451L-912.351 723.944Z"
                                  fill="#0D745B"/>
                        </svg>
                    </div>
                    <img class="position-absolute" src="<?php echo $img_r['url'] ?>" aria-hidden="true" alt="<?php echo $img_r['alt'] ?>">
                </div>
                <div class="principle__box">
                    <div class="principle__box-text">
                        <h2><?php echo $title_r ?></h2>
                        <p><?php echo $p_r ?></p>
                    </div>
                </div>
            </div>
            <?php if ($steps): ?>
            <div class="principle__step d-flex justify-content-around">
                <?php foreach ($steps as $index => $step):
                    $indexi = $index + 1;
                    ?>
                <div class="principle__step-box d-flex">
                    <img src="<?php echo get_theme_image_url('home/principle/circle'. $indexi .'.svg')?>" alt="step <?php echo $indexi ?>">
                    <p><?php echo $step['step']; ?></p>
                </div>
                <?php if ($index != $steps_count): ?>
                <div class="principle__step-arrow">
                    <img src="<?php echo get_theme_image_url('home/principle/arrow-right.svg')?>" alt="arrow">
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
