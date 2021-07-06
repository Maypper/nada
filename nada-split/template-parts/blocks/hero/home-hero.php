<?php
$title = get_field('title');
$p = get_field('p');
$btn = get_field('btn');
?>
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-xl-6">
        <h1><?php echo $title ?></h1>
        <p class="hero__info"><?php echo $p ?></p>
        <?php if ($btn) : ?><a href="<?php echo $btn['url']; ?>" target="<?php echo $btn['target']; ?>" class="button light-btn"><?php echo $btn['title']; ?></a> <?php endif; ?>
      </div>
    </div>
  </div>
</section>