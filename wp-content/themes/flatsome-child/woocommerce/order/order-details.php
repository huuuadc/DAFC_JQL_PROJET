<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
	return;
}

$order_status  		   = custom_woocommerce_format_order_statuses($order->get_status());
$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'processing','confirm','successDelivery','shipment','completed' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>
<section class="woocommerce-order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

	<h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Order', 'glamoutlet' ); ?> <span>#<?php echo $order->get_order_number(); ?></span> | <span class="order-status"><?php echo $order_status; ?></span></h2>
	<!--<p>
	<?php
	printf(
		/* translators: 1: order number 2: order date 3: order status */
		esc_html__( 'was placed on %2$s and is currently %3$s.', 'woocommerce' ),
		'<mark class="order-number">' . $order->get_order_number() . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'<mark class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
	?>
	</p>-->

	<div class="order-action">
	<?php
		$actions = wc_get_account_orders_actions( $order );

		if ( ! empty( $actions ) ) {
			foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				if($key != 'view') {
					echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . ' secondary">' . esc_html( $action['name'] ) . '</a>';
				}
			}
		}
	?>
	</div>

	<?php
		$step1_active = '';
		$step2_active = '';
		$step3_active = '';
		$step4_active = '';
		if($order_status == 'processing') {
			$step1_active = 'active';
		}
		elseif($order_status == 'confirm') {
			$step1_active = 'active';
			$step2_active = 'active';
		}
		elseif($order_status == 'shipment') {
			$step1_active = 'active';
			$step2_active = 'active';
			$step3_active = 'active';
		}
		elseif($order_status == 'successDelivery') {
			$step1_active = 'active';
			$step2_active = 'active';
			$step3_active = 'active';
			$step4_active = 'active';
		}
	?>

	<section class="step-indicator">
		<div class="step step1 <?php echo $step1_active; ?>">
			<div class="step-icon">1</div>
			<p>Order Pocessing</p>
		</div>
		<div class="indicator-line <?php echo $step2_active; ?>"></div>
		<div class="step step2 <?php echo $step2_active; ?>">
			<div class="step-icon">2</div>
			<p>Payment Comfirm</p>
		</div>
		<div class="indicator-line <?php echo $step3_active; ?>"></div>
		<div class="step step3 <?php echo $step3_active; ?>">
			<div class="step-icon">3</div>
			<p>In Shipping</p>
		</div>
		<div class="indicator-line <?php echo $step4_active; ?>"></div>
		<div class="step step3 <?php echo $step4_active; ?>">
			<div class="step-icon">4</div>
			<p>Completed</p>
		</div>
	</section>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
				<th class="woocommerce-table__product-quantity product-quantity"><?php esc_html_e( 'Quantity', 'Glamoutlet' ); ?></th>
				<th class="woocommerce-table__product-table product-total"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
            echo $order_status;
			do_action( 'woocommerce_order_details_before_order_table_items', $order );

			foreach ( $order_items as $item_id => $item ) {
				$product = $item->get_product();

				wc_get_template(
					'order/order-details-item.php',
					array(
						'order'              => $order,
						'item_id'            => $item_id,
						'item'               => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'      => $product ? $product->get_purchase_note() : '',
						'product'            => $product,
					)
				);
			}

			do_action( 'woocommerce_order_details_after_order_table_items', $order );
			?>
		</tbody>
		<tfoot>
			<?php
			foreach ( $order->get_order_item_totals() as $key => $total ) {
				if('payment_method' === $key) {
					continue;
				}
				?>
					<tr>
						<th scope="row" colspan="2">
							<span>
							<?php 
							if($key == 'order_total') {
								echo '<strong>' . __('Total', 'glamoutlet') . '</strong> (' . __('VAT included', 'glamoutlet') . '):';
							}
							else {
								echo esc_html( $total['label'] );
							}
							?>
							</span>
						</th>
						<td><?php echo ( 'payment_method' === $key ) ? esc_html( $total['value'] ) : wp_kses_post( $total['value'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
					</tr>
					<?php
			}
			?>
			<?php if ( $order->get_customer_note() ) : ?>
				<tr>
					<th colspan="2"><?php esc_html_e( 'Note:', 'woocommerce' ); ?></th>
					<td><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>
				</tr>
			<?php endif; ?>
		</tfoot>
	</table>

	<?php //do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action( 'woocommerce_after_order_details', $order );

if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}

echo '<a style="margin-top:30px" class="button-continue-shopping button secondary is-link" href="/my-account/orders/">&#8592;&nbsp;Back</a>';