<?php
get_header();
$title = get_field('title_faq', 'options');
$p = get_field('p_faq', 'options');
?>
<section class="faq">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 offset-sm-1">
				<div class="faq__title text-center">
					<h1><?php echo $title ?></h1>
					<p><?php echo $p ?></p>
				</div>
				<div class="faq__search position-relative mx-auto">
                    <form role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                        <input type="text" name="s" placeholder="Search for answers"/>
                        <input type="hidden" name="post_type" value="faq" /> <!-- // hidden 'products' value -->
                        <button type="submit"><svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                   xmlns="http://www.w3.org/2000/svg" value="Search">
                                <path
                                        d="M18.6176 20.032C16.8204 21.4678 14.5417 22.1609 12.2494 21.9691C9.95718 21.7772 7.82538 20.715 6.29185 19.0005C4.75832 17.286 3.93948 15.0494 4.00349 12.75C4.0675 10.4506 5.00951 8.26301 6.63604 6.63647C8.26258 5.00993 10.4502 4.06793 12.7496 4.00392C15.0489 3.93991 17.2856 4.75875 19.0001 6.29228C20.7146 7.82581 21.7768 9.95761 21.9687 12.2499C22.1605 14.5421 21.4673 16.8208 20.0316 18.618L27.7076 26.292C27.8953 26.4798 28.0008 26.7344 28.0008 27C28.0008 27.2656 27.8953 27.5202 27.7076 27.708C27.5198 27.8958 27.2651 28.0013 26.9996 28.0013C26.734 28.0013 26.4793 27.8958 26.2916 27.708L18.6196 20.032H18.6176ZM19.9996 13C19.9996 12.0807 19.8185 11.1705 19.4667 10.3212C19.1149 9.47194 18.5993 8.70026 17.9493 8.05025C17.2993 7.40024 16.5276 6.88462 15.6784 6.53284C14.8291 6.18106 13.9188 6 12.9996 6C12.0803 6 11.1701 6.18106 10.3208 6.53284C9.47151 6.88462 8.69983 7.40024 8.04982 8.05025C7.39981 8.70026 6.8842 9.47194 6.53241 10.3212C6.18063 11.1705 5.99957 12.0807 5.99957 13C5.99957 14.8565 6.73707 16.637 8.04982 17.9497C9.36258 19.2625 11.1431 20 12.9996 20C14.8561 20 16.6366 19.2625 17.9493 17.9497C19.2621 16.637 19.9996 14.8565 19.9996 13Z"
                                        fill="black" />
                            </svg>
                        </button>
                    </form>
				</div>
			</div>
		</div>
		<div class="faq__all">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ):
					the_post();
					get_template_part('template-parts/faq');
				endwhile;
			endif;
			?>
		</div>
	</div>
</section>
<?php
get_footer();