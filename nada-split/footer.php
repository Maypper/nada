<?php
$p = get_field('paragraph_f', 'options');
$social_title = get_field('social_title', 'options');
?>
<footer class="site-footer" role="contentinfo">
    <div class="site-footer__instagram">
        <h2 class="marker text-center"><a href="">INSTAGRAM #NADA</a></h2>
        <div class="insta__slide">
            <div class="swiper-container" id="instaImg">
            </div>
            <?php
            echo do_shortcode('[instagram-feed]');
            ?>
        </div>
    </div>
    <div class="site-footer__info">
        <div class="row">
            <div class="col-lg-4">
                <div class="site-footer__logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo get_theme_mod( 'footer_logo' ) ?>" alt="">
                    </a>
                    <p><?php echo $p ?></p>
                </div>
            </div>
            <div class="col-md-8 col-lg-6">
                <?php
                wp_nav_menu( [
	                'theme_location'  => 'footer',
	                'menu_class' => 'footer-menu'
                ] );
                ?>
            </div>
            <div class="col-md-4 col-lg-2 d-flex justify-content-lg-end  justify-content-md-start">
                <div class="text-left">
                    <p><?php echo $social_title ?></p>
	                <?php
	                if ( have_rows( 'social_f', 'options' ) ):
		                ?>
                        <div class="social-link">
			                <?php
			                while ( have_rows( 'social_f', 'options' ) ) : the_row();
				                if ( get_row_layout() == 'facebook' ):
					                $link = get_sub_field( 'link' );
					                ?>
                                    <a href="<?php echo $link ?>"><img
                                                src="<?php echo get_theme_image_url( 'footer/facebook.svg' ) ?>"
                                                alt="facebook"></a>
				                <?php
                                elseif ( get_row_layout() == 'instagram' ):
					                $link = get_sub_field( 'link' );
					                ?>
                                    <a href="<?php echo $link ?>"><img
                                                src="<?php echo get_theme_image_url( 'footer/instagram.svg' ) ?>"
                                                alt="instagram"></a>
				                <?php
                                elseif ( get_row_layout() == 'twitter' ):
					                $link = get_sub_field( 'link' );
					                ?>
                                    <a href="<?php echo $link ?>"><img
                                                src="<?php echo get_theme_image_url( 'footer/twitter.svg' ) ?>"
                                                alt="twitter"></a>
				                <?php
				                endif;
			                endwhile;
			                ?>
                        </div>
	                <?php
	                endif;
	                ?>
                </div>
            </div>
        </div>
        <div class="site-footer__credits d-flex justify-content-between">
            <div class="site-footer__credits-policy d-flex">
                <a href="">Privacy Policy</a>
                <a href="">Cookie Policy</a>
                <p>© 2021 NADA TM. All rights reserved.</p>
            </div>
            <div class="site-footer__credits-payment d-flex">
                <p>Secure payment options</p>
                <div class="d-flex">
                    <a href="" class="d-flex"><img class="m-auto" src="<?php echo get_theme_image_url('footer/visa.svg')?>" alt="visa"></a>
                    <a href="" class="d-flex"><img class="m-auto" src="<?php echo get_theme_image_url('footer/mastercard.svg')?>" alt="master card"></a>
                    <a href="" class="d-flex"><img class="m-auto" src="<?php echo get_theme_image_url('footer/googlepay.svg')?>" alt="google pay"></a>
                    <a href="" class="d-flex"><img class="m-auto" src="<?php echo get_theme_image_url('footer/applepay.svg')?>" alt="apple pay"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    // Get the video
    var video = document.getElementById("myVideo");
    var cont = document.getElementById("myCont");
    // Get the button
    var btn = document.getElementById("myBtn");

    // Pause and play the video, and change the button text
    function myFunction() {
        if (video.paused) {
            video.play();
            btn.setAttribute("style", "display:none;");
            cont.setAttribute("style", "display:none;");
            video.setAttribute("style", "filter: brightness(1) blur(0); transform: scale(1)");
        } else {
            video.pause();
            video.load();
            btn.setAttribute("style", "display:block;");
            cont.setAttribute("style", "display:block;");
            // video.setAttribute("style", "filter: brightness(0.8) blur(5px); transform: scale(1.07)");
        }
    }
</script>
<?php wp_footer();
wp_deregister_style( 'storefront-style');
?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>
</html>