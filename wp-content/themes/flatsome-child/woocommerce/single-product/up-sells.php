<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>

<div class="custom-product-upsells">
<div class="row">
	<div class="col large-6 pb-0">
		<div class="row">
			<div class="col large-2 pb-0"></div>
			<div class="col large-10 pb-0">
				<h3><?php  echo esc_html(__( 'Often bought with', 'custom' )); ?></h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col large-6">
		<div class="row">
			<div class="col large-10">
				<?php 
				$image = get_field('often_bought_with_image');
				if( !empty( $image ) ): ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
			</div>
			<div class="col large-2 pb-0"></div>
		</div>
	</div>
	<div class="col large-6 large-col-first pb-0">
		<div class="row">
			<div class="col large-2 pb-0"></div>
			<div class="col large-10">
				<ul class="product_list_widget">
					<?php foreach ( $upsells as $upsell ) : ?>

					<?php
					$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product-upsell' );
					?>

					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>	

<?php
endif;

wp_reset_postdata();
