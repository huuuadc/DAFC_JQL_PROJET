<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();
$wc_address_book = WC_Address_Book::get_instance();
?>

<h1 class="account-page-title">Address Book</h1>

<div class="u-columns woocommerce-Addresses col2-set addresses">
	<?php 
		$address = ''; 
		$billing_first_name = get_user_meta( $customer_id, 'billing_first_name', true );
		$billing_last_name = get_user_meta( $customer_id, 'billing_last_name', true );
		$billing_phone = get_user_meta( $customer_id, 'billing_phone', true );
		$billing_email = get_user_meta( $customer_id, 'billing_email', true );
		$billing_address_1 = get_user_meta( $customer_id, 'billing_address_1', true );
		$billing_district = get_user_meta( $customer_id, 'billing_district', true );
		$billing_city = get_user_meta( $customer_id, 'billing_city', true );
		$address = '
			<ul>
				<li><span class="key">Name</span><span class="value">'. $billing_first_name . ' ' . $billing_last_name . '</span></li>
				<li><span class="key">Phone</span><span class="value">'. ( $billing_phone ? $billing_phone : ' - ' ) .'</span></li>
				<li><span class="key">Email</span><span class="value">'. ( $billing_email ? $billing_email : ' - ' ) .'</span></li>
				<li><span class="key">Address</span><span class="value">'. ($billing_address_1 . '<br/>' . $billing_district . '<br/>' . $billing_city) .'</span></li>
			</ul>
		';
		$has_address = ($billing_first_name && $billing_last_name && $billing_email);
	?>
	<div class="u-column1 woocommerce-Address">
		<header class="woocommerce-Address-title  title">
			<h2>Billing Address</h2>
			<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', 'billing' ) ); ?>" class="edit"><?php echo $has_address ? esc_html__( 'Edit', 'woocommerce' ) : esc_html__( 'Add New Address', 'woocommerce' ); ?></a>
		</header>
		<address>
			<?php
				echo $has_address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' );
			?>
		</address>
	</div>

	<?php 
		$address = ''; 
		$shipping_first_name = get_user_meta( $customer_id, 'shipping_first_name', true );
		$shipping_last_name = get_user_meta( $customer_id, 'shipping_last_name', true );
		$shipping_address_1 = get_user_meta( $customer_id, 'shipping_address_1', true );
		$shipping_district = get_user_meta( $customer_id, 'shipping_district', true );
		$shipping_city = get_user_meta( $customer_id, 'shipping_city', true );
		$shipping_phone = get_user_meta( $customer_id, 'shipping_phone', true );
		$address = '
			<ul>
				<li><span class="key">Name</span><span class="value">'. $shipping_first_name . ' ' . $shipping_last_nameg_first_name . '</span></li>
				<li><span class="key">Phone</span><span class="value">'. ( $shipping_phone ? $shipping_phone : ' - ' ) .'</span></li>
				<li><span class="key">Address</span><span class="value">'. ($shipping_address_1 . '<br/>' . $shipping_district . '<br/>' . $shipping_city) .'</span></li>
			</ul>
		';
		$has_address = ($shipping_first_name && $shipping_last_name && $shipping_address_1);
	?>
	<div class="u-column2 woocommerce-Address">
		<header class="woocommerce-Address-title  title">
			<h2>Shipping Address</h2>
			<?php 
				if($has_address) {
					$wc_address_book->add_additional_address_button();
				}
				else {
					echo '<a href="' . esc_url( wc_get_endpoint_url( 'edit-address', 'shipping' ) ) . '" class="button secondary edit">+ ADD NEW ADDRESS</a>';
				}
			?>
		</header>
		<address>
			<?php
				if($has_address) {
					echo '<a href="'.esc_url( wc_get_endpoint_url( 'edit-address', 'shipping' ) ) . '" class="edit">' . esc_html__( 'Edit', 'woocommerce' ) . '</a>';
					echo wp_kses_post( $address );
				}
				else {
					esc_html_e( 'You have no saved addresses.', 'glamoutlet' );
					echo '<br/>';
					esc_html_e( 'Add an address for a fast checkout.', 'glamoutlet' );
					echo '<br/><a href="/my-account/edit-address/shipping/" style="text-decoration: underline">Add a new address</a>';
				}
			?>
		</address>
	</div>

</div>