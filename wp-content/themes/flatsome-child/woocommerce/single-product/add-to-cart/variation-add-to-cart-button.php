<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
<!--	--><?php //do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );
	?>
	<?php
//	woocommerce_quantity_input(
//		array(
//			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
//			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
//			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
//		)
//	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>
    <div style="width: 100%; text-decoration: underline; font-style: italic; text-align: right">
        <a class="btn" ><?php echo __( 'Find Size', 'glamoutlet' ) ?></a>
    </div>
	<div class="group-action">
        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

        <div class="group-action-buyNowAnhWishlist">
            <div class = "group-action-buynow">
                <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
            </div>
            <div class="group-action-space">
            </div>
            <div class="group-action-wishlist">
                <div class="wishlist-icon">
                    <button class="wishlist-button button icon" aria-label="<?php echo __( 'Wishlist', 'glamoutlet' ); ?>">
                        <?php
                        $product_id = $product->get_id();
                        $in_wishlist = false;
                        if ( function_exists( 'YITH_WCWL' ) ) {
                            $in_wishlist = YITH_WCWL()->is_product_in_wishlist($product_id);
                        }
                        if ($in_wishlist) {
                            echo '<span class="icomoon-heart-fill"> '. __( 'Added to wishlist', 'glamoutlet' ) .'</span>';
                        } else {
                            echo '<span class="icomoon-heart"> '. __( 'Add to wishlist', 'glamoutlet' ) .'</span>';
                        }
                        ?>
                    </button>
                    <div class="wishlist-popup dark">
                        <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
                    </div>
                </div>
            </div>
        </div>

	</div>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>

<div class="modal">
    <div class="modal-content">
        <span class="close">
        </span>
        <h4>FEMALE</h4>
        <img width="100%" height="30%" src="https://www.glamoutlet.com.vn/wp-content/uploads/2021/12/ASH-F-FOOTWEAR.jpg">
        <h4>MALE</h4>
        <img width="100%" height="30%" src="https://www.glamoutlet.com.vn/wp-content/uploads/2021/12/ASH-M-FOOTWEAR.jpg">
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        var modal = jQuery('.modal');
        var btn = jQuery('.btn');
        var span = jQuery('.close');

        btn.click(function () {
            modal.show();
        });

        span.click(function () {
            modal.hide();
        });

        jQuery(window).on('click', function (e) {
            if (jQuery(e.target).is('.modal')) {
                modal.hide();
            }
        });
    });
</script>
