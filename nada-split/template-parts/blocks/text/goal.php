<?php
$title = get_field('title');
$p = get_field('p');
$goal_count = get_field('goals');
$goal_count = count($goal_count);
$col = intdiv(12, $goal_count);
?>
<section class="goal">
    <div class="container">
        <h2 class="marker text-center"><?php echo $title ?></h2>
        <p class="text-center"><?php echo $p ?></p>
        <?php if (have_rows('goals')): ?>
        <div class="row">
            <?php while (have_rows('goals')):
                the_row();
                $img = get_sub_field('img');
                $title_g = get_sub_field('title_g');
                ?>
            <div class="col-sm-<?php echo $col ?>">
                <img class="d-flex m-auto" src="<?php echo $img ?>" alt="Cruelty Free">
                <h4 class="text-center"><?php echo $title_g ?></h4>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>