<?php
/**
 * UserRegistrationWooCommerce Functions.
 *
 * General core functions available on both the front-end and admin.
 *
 * @author   WPEverest
 * @category Core
 * @package  UserRegistrationWooCommerce/Functions
 * @version  1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'user_registration_field_keys', 'ur_get_woocommerce_field_keys', 10, 2 );
add_filter( 'user_registration_one_time_draggable_form_fields', 'ur_get_woocommerce_all_fields_in_frontend', 10, 1 );
add_filter( 'user_registration_fields_without_prefix', 'ur_get_woocommerce_all_fields_in_frontend', 10, 1 );
add_filter( 'user_registration_registered_user_meta_fields', 'ur_get_woocommerce_all_fields_in_frontend', 10, 1 );
add_filter( 'user_registration_user_profile_field_only', 'ur_exclude_wc_fields_in_profile', 10, 1 );
add_filter( 'user_registration_after_register_user_action', 'urwc_copy_billing_address', 10, 3 );
add_filter( 'user_registration_sanitize_field', 'urwc_sanitize_fields', 10, 2 );
add_filter( 'user_registration_form_field_address_title', 'user_registration_woocommerce_title_fields_render', 10, 4 );

/**
 * Sanitize wooCommerce fields on frontend submit
 *
 * @param  array  $form_data
 * @param  string $field_key
 * @return array
 */
function urwc_sanitize_fields( $form_data, $field_key ) {

	if ( in_array( $field_key, ur_get_all_woocommerce_fields() ) ) {
		$form_data->value = sanitize_text_field( $form_data->value );
	}
	return $form_data;
}

/*
 Copy billing address to save to shipping address.
*/
function urwc_copy_billing_address( $form_data, $form_id, $user_id ) {

	$billing_fields = ur_get_woocommerce_billing_fields();
	$remove_keys    = array( 'billing_address_title', 'separate_shipping' );
	$billing_fields = array_diff( $billing_fields, $remove_keys );

	foreach ( $billing_fields as $field ) {
		$billing_field_value = get_user_meta( $user_id, $field, true );
		$field_name          = str_replace( 'billing_', '', $field );
		$exclude             = array( 'email', 'phone' );   // Shipping doesnot contain email and phone.

		if ( ! in_array( $field_name, $exclude ) ) {
			$user_meta = get_user_meta( $user_id, 'shipping_' . $field_name, true );

			if ( metadata_exists( 'user', $user_id, 'separate_shipping' ) && '1' != get_user_meta( $user_id, 'separate_shipping', true ) ) {
				update_user_meta( $user_id, 'shipping_' . $field_name, $billing_field_value );
			} elseif ( ! metadata_exists( 'user', $user_id, 'separate_shipping' ) && empty( $user_meta ) ) {
				update_user_meta( $user_id, 'shipping_' . $field_name, $billing_field_value );
			}
		}
	}
}

/**
 * Compatibility check
 *
 * @return string
 */
function urwc_is_compatible() {

	$plugins_path = WP_PLUGIN_DIR . URWC_DS . 'user-registration' . URWC_DS . 'user-registration.php';

	if ( ! file_exists( $plugins_path ) ) {
		return __( 'Please install <code>user-registration</code> plugin to use <code>user-registration-woocommerce</code> addon.', 'user-registration-woocommerce' );
	}

	$plugin_file_path = 'user-registration/user-registration.php';

	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( ! is_plugin_active( $plugin_file_path ) ) {
		return __( 'Please activate <code>user-registration</code> plugin to use <code>user-registration-woocommerce</code> addon.', 'user-registration-woocommerce' );
	}

	$wc_plugins_path = WP_PLUGIN_DIR . URWC_DS . 'woocommerce' . URWC_DS . 'woocommerce.php';

	if ( ! file_exists( $wc_plugins_path ) ) {
		return __( 'Please install <code>woocommerce</code> plugin to use <code>user-registration-woocommerce</code> addon.', 'user-registration-woocommerce' );
	}

	$wc_plugins_path = 'woocommerce/woocommerce.php';

	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( ! is_plugin_active( $wc_plugins_path ) ) {
		return __( 'Please activate <code>woocommerce</code> plugin to use <code>user-registration-woocommerce</code> addon.', 'user-registration-woocommerce' );
	}

	if ( function_exists( 'UR' ) ) {
		$user_registration_version = UR()->version;
	} else {
		$user_registration_version = get_option( 'user_registration_version' );
	}

	if ( version_compare( $user_registration_version, '1.4.1', '<' ) ) {
		return __( 'Please update your <code>user registration</code> plugin to at least 1.4.1 version to use <code>user-registration-woocommerce</code> addon.', 'user-registration-woocommerce' );
	}

	return 'YES';
}

/**
 * Admin notice for plugin compatibility
 */
function urwc_check_plugin_compatibility() {
	add_action( 'admin_notices', 'urwc_admin_notices', 10 );
}

/**
 * Exclude WooCommerce fields to display on admin profile
 *
 * @param  array $fields fields to display on admin profile
 * @return array $fields
 */
function ur_exclude_wc_fields_in_profile( $fields ) {
	$woo_commerce_fields = ur_get_all_woocommerce_fields();
	$fields              = array_diff( $fields, $woo_commerce_fields );
	return $fields;
}

/**
 * Assign field types to WooCommerce field keys
 *
 * @param  string    $field_type
 * @param  $field_key
 * @return $field_type
 */
function ur_get_woocommerce_field_keys( $field_type, $field_key ) {
	switch ( $field_key ) {
		case 'separate_shipping':
			$field_type = 'checkbox';
			break;
		case 'billing_email':
			$field_type = 'email';
			break;
		case 'billing_country':
		case 'shipping_country':
			$field_type = 'select';
			break;
		case 'billing_address_title':
		case 'shipping_address_title':
			$field_type = 'address_title';
			break;
	}

	return $field_type;
}

/**
 * Render frontend html for WooCoommerce billing and shipping addresses title
 *
 * @param  $field
 * @param  $key
 * @param  $args
 * @param  $value
 * @return void
 */
function user_registration_woocommerce_title_fields_render( $field, $key, $args, $value ) {
	if ( $args['label'] ) {
		$field_content  = '<h3 id="' . esc_attr( $args['id'] ) . '">' . esc_html( $args['label'] ) . '</h3>';
		$field_content .= '<span class="description">' . isset( $args['description'] ) ? $args['description'] : '' . '</span>';
		echo $field_content;
	}
}

/**
 * Admin Notices
 *
 * @return void
 */
function urwc_admin_notices() {
	$class   = 'notice notice-error';
	$message = urwc_is_compatible();

	if ( 'YES' !== $message ) {
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), ( $message ) );
	}
}

/**
 * User Registration WooCoomerce Account Details Settings
 *
 * @return array
 */
function urwc_woocommerce_settings() {

	$forms    = ur_get_all_user_registration_form();
	$forms[0] = __( 'None', 'user-registration-social-connect' );
	ksort( $forms );

	return apply_filters(
		'user_registration_woocommerce_settings',
		array(
			array(
				'title' => __( 'WooCommerce Sync', 'user-registration-woocommerce' ),
				'type'  => 'title',
				'desc'  => '',
				'id'    => 'user_registration_woocommerce_settings',
			),
			array(
				'title'    => __( 'Select Registration Form', 'user-registration-woocommerce' ),
				'desc'     => __( 'Choose registration form to sync with WooCommerce.', 'user-registration-woocommerce' ),
				'id'       => 'user_registration_woocommerce_settings_form',
				'default'  => 'None',
				'type'     => 'select',
				'class'    => 'ur-enhanced-select',
				'css'      => 'min-width: 350px;',
				'desc_tip' => true,
				'options'  => $forms,
			),
			array(
				'title'     => __( 'Replace registration page', 'user-registration' ),
				'desc_tip'  => __( 'Replace default WooCommerce login and registration form with User Registration form and login', 'user-registration' ),
				'desc'      => __( 'Check this option to replace default WooCommerce\'s login and registration page', 'user-registration' ),
				'id'        => 'user_registration_woocommrece_settings_replace_login_registration',
				'type'      => 'checkbox',
				'css'       => 'min-width: 350px;',
				'row_class' => ( get_option( 'user_registration_woocommerce_settings_form', '0' ) === '0' ) ? 'ur-setting-hidden' : '',
				'default'   => 'no',
			),
			array(
				'title'             => __( 'Sync checkout registration', 'user-registration' ),
				'desc_tip'          => __( 'This option lets you select registration form fields to be synced with WooCommerce Checkout page\'s registration form.', 'user-registration' ),
				'desc'              => __( 'Check this option to sync user registration form with Woocommerce checkout registration', 'user-registration' ),
				'id'                => 'user_registration_woocommrece_settings_sync_checkout',
				'type'              => 'checkbox',
				'css'               => 'min-width: 350px;',
				'row_class'         => ( get_option( 'user_registration_woocommerce_settings_form', '0' ) === '0' ) ? 'ur-setting-hidden' : '',
				'default'           => 'no',
				'custom_attributes' => array(
					'data-field_option_key' => 'user_registration_woocommerce_checkout_fields',
				),
			),
			array(
				'type' => 'sectionend',
				'id'   => 'user_registration_woocommerce_settings',
			),
		)
	);
}

/**
 * @param $path
 *
 * @return string
 */
function urwc_form_field_includes( $path ) {
	$core_path  = UR_ABSPATH;
	$addon_path = URWC_ABSPATH;
	$path       = str_replace( $core_path, $addon_path, $path );
	return $path;
}

/**
 * All WooCommerce fields
 *
 * @return array
 */
function ur_get_all_woocommerce_fields() {
	return array(
		'billing_address_title',
		'shipping_address_title',
		'billing_country',
		'billing_first_name',
		'billing_last_name',
		'billing_company',
		'billing_address_1',
		'billing_address_2',
		'billing_city',
		'billing_state',
		'billing_postcode',
		'billing_email',
		'billing_phone',
		'separate_shipping',
		'shipping_country',
		'shipping_first_name',
		'shipping_last_name',
		'shipping_company',
		'shipping_address_1',
		'shipping_address_2',
		'shipping_city',
		'shipping_state',
		'shipping_postcode',
	);
}

/**
 * Merge WooCommerce fields with all other fields
 */
function ur_get_woocommerce_all_fields_in_frontend( $fields ) {
	$woocommerce_fields = ur_get_all_woocommerce_fields();

	foreach ( $woocommerce_fields as $woo_fields ) {
		array_push( $fields, $woo_fields );
	}

	return $fields;
}

/**
 * All WooCommerce billing fields
 *
 * @return array
 */
function ur_get_woocommerce_billing_fields() {
	return apply_filters(
		'user_registration_woocommerce_billing_fields',
		array(
			'billing_address_title',
			'billing_country',
			'billing_first_name',
			'billing_last_name',
			'billing_company',
			'billing_address_1',
			'billing_address_2',
			'billing_city',
			'billing_state',
			'billing_postcode',
			'billing_email',
			'billing_phone',
			'separate_shipping',
		)
	);
}

/**
 * All WooCommerce Shipping fields
 *
 * @return array
 */
function ur_get_woocommerce_shipping_fields() {
	return apply_filters(
		'user_registration_woocommerce_shipping_fields',
		array(
			'shipping_address_title',
			'shipping_country',
			'shipping_first_name',
			'shipping_last_name',
			'shipping_company',
			'shipping_address_1',
			'shipping_address_2',
			'shipping_city',
			'shipping_state',
			'shipping_postcode',
		)
	);
}

/**
 * Template for myaccount page
 *
 * @return array
 */
function ur_woocommerce_template() {
	return apply_filters(
		'user_registration_woocommercetemplate',
		array(
			'vertical'   => __( 'Vertical', 'user-registration-woocommerce' ),
			'horizontal' => __( 'Horizontal', 'user-registration-woocommerce' ),
		)
	);
}

/**
 * get endpoint url
 *
 * @since 1.0.4
 *
 * @param  string $endpoint
 * @param  string $value
 * @param  string $url
 * @return string
 */
function ur_wc_get_endpoint_url( $endpoint, $value, $url ) {

	$permalink = ur_get_page_permalink( 'myaccount' );

		// Map endpoint to options
		$query_vars = WC()->query->get_query_vars();
		$endpoint   = ! empty( $query_vars[ $endpoint ] ) ? $query_vars[ $endpoint ] : $endpoint;

	if ( get_option( 'permalink_structure' ) ) {
		if ( strstr( $permalink, '?' ) ) {
			$query_string = '?' . parse_url( $permalink, PHP_URL_QUERY );
			$permalink    = current( explode( '?', $permalink ) );
		} else {
			$query_string = '';
		}
		$url = trailingslashit( $permalink ) . $endpoint . '/' . $value . $query_string;
	} else {
		$url = add_query_arg( $endpoint, $value, $permalink );
	}

		return $url;
}

/**
 * Get form fields.
 *
 * @param int $form_id Registration Form ID.
 * @return array|WP_Error
 */
function urwc_get_form_fields( $form_id ) {
	$form   = get_post( $form_id );
	$fields = array();

	if ( $form && 'user_registration' === $form->post_type ) {
		$form_field_array = json_decode( $form->post_content );

		if ( $form_field_array ) {

			foreach ( $form_field_array as $field_row ) {
				foreach ( $field_row as $field_column ) {
					foreach ( $field_column as $single_item ) {
						if ( ! in_array( $single_item->field_key, urwc_get_excluded_fields() ) ) {
							$fields[ $single_item->general_setting->field_name ] = array(
								'field_label' => $single_item->general_setting->label,
								'field_key'   => $single_item->field_key,
								'required'    => isset( $single_item->general_setting->required ) ? $single_item->general_setting->required : 'no',
								'plugin'      => 'User Registration',
							);
						}
					}
				}
			}
		}
	} else {
		return new WP_Error( 'form-not-found', __( 'Form not found!', 'user-registration-woocommerce' ) );
	}

	return apply_filters( 'user_registration_woocommerce_field_list', $fields );
}

/**
 * Get fields to exclude from field listing in settings.
 *
 * @return array
 */
function urwc_get_excluded_fields() {
	$excluded_fields = array(
		'display_name',
		'first_name',
		'last_name',
		'user_login',
		'user_pass',
		'user_confirm_password',
		'user_email',
		'user_confirm_email',
	);

	$excluded_fields = array_merge( $excluded_fields, ur_get_woocommerce_billing_fields() );
	$excluded_fields = array_merge( $excluded_fields, ur_get_woocommerce_shipping_fields() );

	return apply_filters( 'user_registration_woocommerce_excluded_fields', $excluded_fields );
}
