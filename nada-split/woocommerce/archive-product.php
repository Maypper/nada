<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

$term    = get_queried_object();
$choices = get_field( 'style', $term );
$p =  get_field('header_paragraph');
$id=get_option( 'woocommerce_shop_page_id' );
$shop_page=get_post($id);
$shop_page_content=strip_tags($shop_page->post_content);
?>
    <section class="<?php
	if ( $choices == 'starter_kits' ) {
		echo 'advertisement';
	} elseif ( $choices == 'refill_tablets' ) {
		echo 'advertisement-tablets';
	} elseif ( $choices == 'lifetime_bottles' ) {
		echo 'advertisement-bottles';
	}
	?> position-relative">
        <div class="container">
            <div class="advertisement__box">
                <h1><?php woocommerce_page_title(); ?></h1>
                <?php if(is_product_category()){?>
                <p class="advertisement__info"> <?php echo $term->description; ?></p>
                <?php } ?>
                <?php if(is_shop()){ ?>
                    <p class="advertisement__info"><?php echo $shop_page_content ?></p>
                <?php } ?>
            </div>
        </div>
		<?php
		if ( $choices == 'starter_kits' ) :
			?>
            <img class="position-absolute img-down-center" src="<?php echo get_theme_image_url( 'shop/bottle.png' ) ?>"
                 aria-hidden="true" alt="">
            <img class="position-absolute img-top" src="<?php echo get_theme_image_url( 'shop/capsule-box.png' ) ?>"
                 aria-hidden="true" alt="">
            <img class="position-absolute img-down-right" src="<?php echo get_theme_image_url( 'shop/boxes.png' ) ?>"
                 aria-hidden="true" alt="">
		<?php
        elseif ( $choices == 'refill_tablets' ) :
			?>
            <img class="position-absolute img-down-center" src="<?php echo get_theme_image_url( 'shop/sachets.png' ) ?>"
                 aria-hidden="true" alt="">
            <img class="position-absolute img-top" src="<?php echo get_theme_image_url( 'shop/capsule-box.png' ) ?>"
                 aria-hidden="true" alt="">
            <img class="position-absolute img-down-right" src="<?php echo get_theme_image_url( 'shop/box.png' ) ?>"
                 aria-hidden="true" alt="">
		<?php
        elseif ( $choices == 'lifetime_bottles' ) :
			?>
            <img class="position-absolute img-down-center" src="<?php echo get_theme_image_url( 'shop/bottle2.png' ) ?>"
                 aria-hidden="true" alt="">
            <img class="position-absolute img-down-right" src="<?php echo get_theme_image_url( 'shop/boxes2.png' ) ?>"
                 aria-hidden="true" alt="">
		<?php
		endif;
		?>
    </section>
    <section class="cards">
        <div class="row cards__row">
			<?php
			if ( wc_get_loop_prop( 'total' ) ) {
				$index = 1;
				while ( have_posts() ) {
					the_post();
                    if ($index == 7) {
                        kit();
                    }
                    wc_get_template_part( 'content', 'product' );
                    $index++;
				}
			}
			?>
        </div>
    </section>
<?php
get_footer();
