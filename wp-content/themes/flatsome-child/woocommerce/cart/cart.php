<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

$row_classes     = array();
$main_classes    = array();
$sidebar_classes = array();

$auto_refresh  = get_theme_mod( 'cart_auto_refresh' );
$row_classes[] = 'row-large';
$row_classes[] = 'row-divided';

if ( $auto_refresh ) {
	$main_classes[] = 'cart-auto-refresh';
}


$row_classes     = implode( ' ', $row_classes );
$main_classes    = implode( ' ', $main_classes );
$sidebar_classes = implode( ' ', $sidebar_classes );


do_action( 'woocommerce_before_cart' ); ?>
<div class="woocommerce row <?php echo $row_classes; ?>">
<div class="col large-7 pb-0 <?php echo $main_classes; ?>">

<?php wc_print_notices(); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
<div class="cart-wrapper sm-touch-scroll">

	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<div class="thead">
			<div class="product-thumbnail" colspan="2"><?php esc_html_e( 'Product', 'woocommerce' ); ?></div>
			<div class="product-right">
				<div class="product-name">&nbsp;</div>
				<div class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></div>
				<div class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></div>
				<div class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
			</div>
		</div>
		<div class="tbody">
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="tr woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<div class="td product-thumbnail">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
						</div>

						<div class="td product-right">
							<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
								<div class="brands">
								<?php
									// $terms = get_the_terms( $cart_item['product_id'], 'brand' );
									// $brands = array();

									// foreach ($terms as $term) {
									// 	$brands[] .= $term->name;
									// }

									// echo implode(', ', $brands);
									echo getProductBrand($cart_item['product_id']);
								?>
								</div>
								<?php
								if ( ! $product_permalink ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
								} else {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
								}
								
								?>
								<div class="cart-item-attribute-edit">
								<div class="product-attribute">
									<span class="color"><?php echo (isset($cart_item['variation']) && isset($cart_item['variation']['attribute_pa_color'])) ? $cart_item['variation']['attribute_pa_color'] : ''; ?></span>
									<?php echo (isset($cart_item['variation']) && isset($cart_item['variation']['attribute_pa_color']) && isset($cart_item['variation']['attribute_pa_size'])) ? '<span class="divider">|</span>' : ''; ?>
									<span class="size"><?php echo (isset($cart_item['variation']) && isset($cart_item['variation']['attribute_pa_size'])) ? $cart_item['variation']['attribute_pa_size'] : ''; ?></span>
								</div>
								<?php
								/*add false remove button edit*/
								if ( false && $product_permalink && isset($cart_item['variation']) && count($cart_item['variation']) > 0) {
									echo wp_kses_post( sprintf( '<a class="edit-link" href="%s">%s</a>', esc_url( $product_permalink ), __('Edit', 'glamoutlet') ));
								}
								?>
								</div>
								<?php

								do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

								// Meta data.
								echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

								// Backorder notification.
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
								}

								// Mobile price.
								?>
							</div>

							<div class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
								<?php
									echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							</div>

							<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
							<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input(
									array(
										'input_name'   => "cart[{$cart_item_key}][qty]",
										'input_value'  => $cart_item['quantity'],
										'max_value'    => $_product->get_max_purchase_quantity(),
										'min_value'    => '0',
										'product_name' => $_product->get_name(),
									),
									$_product,
									false
								);
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
							?>
							</div>

							<div class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
								<div class="product-action">
									<?php
										echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											'woocommerce_cart_item_remove_link',
											sprintf(
												'<a href="%s" class="remove-link" aria-label="%s" data-product_id="%s" data-product_sku="%s">'.esc_html__( 'Delete', 'woocommerce' ).'</a><span> | </span> ',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												esc_html__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											),
											$cart_item_key
										);
									?>
									<div class="wishlist-icon">
										<a href="#"><?php echo __( 'Add to Wishlist', 'glamoutlet' ); ?></a>
										<div class="wishlist-popup dark">
											<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist product_id="'.$product_id.'"]' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<div class="tr">
				<td colspan="6" class="actions clear">

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<button type="submit" class="button primary mt-0 pull-left small" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</div>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</div>
		</div>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</div>
</form>
</div>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals large-5 col pb-0">
	<?php flatsome_sticky_column_open( 'cart_sticky_sidebar' ); ?>

	<div class="cart-sidebar col-inner <?php echo $sidebar_classes; ?>">
		<?php
			/**
			 * Cart collaterals hook.
			 *
			 * @hooked woocommerce_cross_sell_display
			 * @hooked woocommerce_cart_totals - 10
			 */
			do_action( 'woocommerce_cart_collaterals' );
		?>
		<?php if (false && wc_coupons_enabled() ) { ?>
		<form class="checkout_coupon mb-0 custom_checkout_coupon" method="post">
			<div class="coupon">
				<h3 class="widget-title"><?php esc_html_e( 'Coupon Code', 'woocommerce' ); ?></h3>
				<div class="flex-row medium-flex-wrap">
					<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" /> 
					<input type="submit" class="is-form expand apply_coupon" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
				</div>
               <?php do_action( 'woocommerce_cart_coupon' ); ?>
			</div>
		</form>
		<?php } ?>
		<?php do_action( 'flatsome_cart_sidebar' ); ?>
	</div>
	<?php flatsome_sticky_column_close( 'cart_sticky_sidebar' ); ?>
</div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
