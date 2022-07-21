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
    <div class="az-title">
        <strong> <?php echo __( 'BRANDS LIST A-Z', 'glamoutlet' ); ?></strong>
    </div>
    <hr width="100%">
	<?php if ( $a_z_query->have_letters() ) : ?>
	<div id="az-slider" class="az-slider" >
		<div id="inner-slider" class="inner-slider" >
			<?php
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
                        ?><div class="az-inner-item">
                            <a href="<?php $a_z_query->the_permalink(); ?>">
                                <?php $a_z_query->the_title(); ?>
                            </a>
                            </div>
                    <?php endwhile; ?>

					<?php
				endif;
			endwhile;
			?>
		</div>
	</div>
</div>
<style>
    .az-inner-item {
        width: 16.66%;
    }

    @media (max-width: 900px) {
        .az-inner-item {
            width: 25%;
        }
    }

    @media (max-width: 600px) {
        .az-inner-item {
            width: 50%;
        }
    }

	/*@media(max-width: 1385px) {*/
	/*	.page-title .entry-title {*/
	/*		display: none;*/
	/*	}*/
	/*}*/
</style>

<?php else : ?>
	<p>
		Hiện không có thương nhiệu nào được cài đặt.
	</p>
	<?php
endif;
