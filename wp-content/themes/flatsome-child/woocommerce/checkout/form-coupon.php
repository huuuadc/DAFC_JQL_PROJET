<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>
<div class="custom_checkout_coupon">

	<h4><?php esc_html_e( 'Coupon Code', 'woocommerce' ); ?></h4>
	<div class="coupon">
		<div class="flex-row medium-flex-wrap">
			<div class="flex-col flex-grow">
				<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" />
			</div>
			<div class="flex-col">
				<a  class="button expand secondary apply_coupon"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></a>
			</div>
		</div>
	</div>
</div>
