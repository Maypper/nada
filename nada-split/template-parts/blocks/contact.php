<?php
$title = get_field('title');
$form = get_field('form');
?>
<section class="contact">
	<div class="container">
		<div class="contact__box mx-auto">
			<h1><?php echo $title ?></h1>
			<?php echo do_shortcode('[contact-form-7 id="'. $form->ID .'" title="'. $form->post_title .'"]'); ?>
		</div>
	</div>
</section>

