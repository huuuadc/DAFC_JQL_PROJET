<?php
/**
 * Default multicolumn template for the A-Z Listing plugin
 *
 * This template will be given the variable `$a_z_query` which is an instance
 * of `A_Z_Listing`.
 *
 * You can override this template by copying this file into your theme
 * directory.
 *
 * @package a-z-listing
 */

/**
 * This value indicates the number of posts to require before a second column
 * is created. However, due to the design of web browsers, the posts will flow
 * evenly between the available columns. E.g. if you have 11 items, a value of
 * 10 here will create two columns with 6 items in the first column and 5 items
 * in the second column.
 */
$a_z_listing_minpercol = 10;
?>
<div id="az-tabs">
<!--	<div class="title-with-button">-->
<!--		<h1>--><?php //_e('Brands', 'glamoutlet'); ?><!--</h1>-->
<!--		<div class="swiper-button-next"></div>-->
<!--		<div class="swiper-button-prev"></div>-->
<!--	</div>-->
<!--	<div id="letters">-->
<!--		-->
<!--		<div class="az-letters swiper">-->
<!--			--><?php //$a_z_query->the_letters(); ?>
<!--		</div>-->
<!--	</div>-->
    <strong>BRANDS LIST A-Z</strong>
	<?php if ( $a_z_query->have_letters() ) : ?>
	<div id="az-slider">
		<div id="inner-sliderr" style="display: inline-flex; flex-direction: column;flex-wrap: wrap; max-height: 100px;">
			<?php
            foreach ($a_z_query as $key => $value ){
                echo var_dump($key);
            }
//           echo var_dump( $a_z_query->have_items());
			while ( $a_z_query->have_letters() ) :
				$a_z_query->the_letter();

				?>

                <?php if ( $a_z_query->have_items() ) : ?>
					<?php
					$a_z_listing_item_count  = $a_z_query->get_the_letter_count();
					$a_z_listing_num_columns = ceil(
						$a_z_listing_item_count / $a_z_listing_minpercol
					);
					?>
            <?php
                    while ( $a_z_query->have_items() ) :
                        $a_z_query->the_item();
                        ?><div style="width: 100px;">
                            <a href="<?php $a_z_query->the_permalink(); ?>">
                                <?php $a_z_query->the_title(); ?>
                            </a>
                            <div>
                    <?php endwhile; ?>

					<?php
				endif;
			endwhile;
			?>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>
	@media(max-width: 1385px) {
		.page-title .entry-title {
			display: none;
		}
	}
</style>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".az-letters", {
	slidesPerView: 'auto',
	slidesPerGroupAuto: true,
	spaceBetween: 0,
	freeMode: true,
	navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
  });
  jQuery(document).ready(function(){
	var stickyTop = jQuery('#letters').offset().top;

	jQuery(window).scroll(function() {
		var windowTop = jQuery(window).scrollTop();
		if (stickyTop < windowTop) {
			jQuery('#letters').addClass('sticky');
		} else {
			jQuery('#letters').removeClass('sticky');
		}
	});
  });
</script>
<?php else : ?>
	<p>
		<?php
		esc_html_e(
			'There are no posts included in this index.',
			'a-z-listing'
		);
		?>
	</p>
	<?php
endif;
