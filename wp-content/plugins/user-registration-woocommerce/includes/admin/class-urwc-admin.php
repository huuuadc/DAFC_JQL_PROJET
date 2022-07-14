<?php
/**
 * UserRegistrationWooCommerce Admin.
 *
 * @class    URWC_Admin
 * @version  1.0.0
 * @package  UserRegistrationWooCommerce/Admin
 * @category Admin
 * @author   WPEverest
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * URWC_Admin Class
 */
class URWC_Admin {

	/**
	 * URWC_Admin Constructor
	 */
	public function __construct() {
		$message = urwc_check_plugin_compatibility();
		$message = urwc_is_compatible();

		if ( $message !== 'YES' ) {
			return;
		}

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_filter( 'user_registration_query_vars', array( $this, 'user_registration_query_vars' ) );
		add_action( 'user_registration_extra_fields', array( $this, 'user_registration_woocommerce_fields' ) );
		add_filter( 'user_registration_get_settings_pages', array( $this, 'add_woocommerce_setting' ), 10, 1 );
		add_filter( 'user_registration_billing_country_advance_class', array( $this, 'urwc_country_field_advance_settings_class_path' ) );
		add_filter( 'user_registration_shipping_country_advance_class', array( $this, 'urwc_country_field_advance_settings_class_path' ) );

		$woocommerce_fields = ur_get_all_woocommerce_fields();

		foreach ( $woocommerce_fields as $field ) {
			add_filter( 'user_registration_' . $field . '_admin_template', array( $this, 'user_registration_wc_fields_admin_template_includes' ), 10, 1 );
		}
		add_filter( 'user_registration_field_options_general_settings', array( $this, 'field_settings' ), 10, 2 );
	}

	public function urwc_country_field_advance_settings_class_path( $file_path_array ) {
		$file_path_array['file_path'] = URWC_FORM_PATH . 'settings' . URWC_DS . 'class-ur-setting-' . $file_path_array['file_name'] . '.php';
		return $file_path_array;
	}

	/**
	 * Html for WooCommerece Address Fields
	 *
	 * @return void
	 */
	public function user_registration_woocommerce_fields() {
		echo '<h2 class="ur-toggle-heading">' . __( 'WooCommerce Billing Address', 'user-registration-woocommerce' ) . '</h2><hr/>';
		$this->get_woocommerce_billing_fields();
		echo '<h2 class="ur-toggle-heading">' . __( 'WooCommerce Shipping Address', 'user-registration-woocommerce' ) . '</h2><hr/>';
		$this->get_woocommerce_shipping_fields();
	}

	/**
	 * Billing Address fields
	 *
	 * @return void
	 */
	public function get_woocommerce_billing_fields() {
			$registered_form_fields = function_exists( 'ur_get_woocommerce_billing_fields' ) ? ur_get_woocommerce_billing_fields() : array();
			echo ' <ul id = "ur-draggabled" class="ur-registered-list ur-woocommerce-billing-fields" > ';
		foreach ( $registered_form_fields as $field ) {
			$get_list = new UR_Admin_Menus();
			$get_list->ur_get_list( $field );
		}
			echo ' </ul > ';
	}

	/**
	 * Shipping Address fields
	 *
	 * @return void
	 */
	public function get_woocommerce_shipping_fields() {
		$registered_form_fields = function_exists( 'ur_get_woocommerce_shipping_fields' ) ? ur_get_woocommerce_shipping_fields() : array();
		echo ' <ul id = "ur-draggabled" class="ur-registered-list ur-woocommerce-shipping-fields" > ';
		foreach ( $registered_form_fields as $field ) {
			$get_list = new UR_Admin_Menus();
			$get_list->ur_get_list( $field );
		}
		echo ' </ul > ';
	}

	/**
	 *  Modify general settings
	 *
	 *  @param array $general_settings Setting for field, string $id field
	 *  @return  array $general_settings
	 */
	public function field_settings( $general_settings, $id ) {

		switch ( $id ) {
			case 'user_registration_billing_address_title':
			case 'user_registration_shipping_address_title':
				$remove_keys = array( 'placeholder', 'required', 'hide_label' );
				foreach ( $remove_keys as $remove_key ) {
					unset( $general_settings[ $remove_key ] );
				}
				break;

			case 'user_registration_billing_country':
			case 'user_registration_separate_shipping':
			case 'user_registration_shipping_country':
				unset( $general_settings['placeholder'] );
				break;
		}

		return $general_settings;
	}

	/**
	 * Include WooCommerce Setting tab
	 *
	 * @param $settings
	 */
	function add_woocommerce_setting( $settings ) {
		if ( class_exists( 'UR_Settings_Page' ) ) {
			$settings[] = include 'settings/class-urwc-settings-woocommerce.php';
		}
	}

	public function user_registration_query_vars( $vars ) {
		$vars['wc-orders'] = get_option( 'woocommerce_myaccount_orders_endpoint', 'wc-orders' );
		return $vars;
	}

	/**
	 * Register Admin Styles
	 */
	public function admin_styles() {
		$screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';

		wp_register_style( 'user-registration-woocommerce-admin-style', URWC()->plugin_url() . '/assets/css/user-registration-woocommerce-admin-style.css', array(), URWC_VERSION );
		if ( 'user-registration_page_user-registration-settings' === $screen_id ) {
			wp_enqueue_style( 'user-registration-woocommerce-admin-style' );
		}
	}

	/**
	 * Register Admin Scripts
	 */
	public function admin_scripts() {
		$suffix    = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';

		wp_register_script( 'urwc-admin-script', URWC()->plugin_url() . '/assets/js/admin/urwc-admin' . $suffix . '.js', array(), URWC_VERSION );

		if ( 'user-registration_page_user-registration-settings' === $screen_id ) {
			wp_enqueue_script( 'urwc-admin-script' );
			wp_localize_script(
				'urwc-admin-script',
				'user_registration_woocommerce_params',
				array(
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'user_registration_woocommerce_form_field_listing' => wp_create_nonce( 'user_registration_woocommerce_form_field_listing_nonce' ),
				)
			);
		}
	}

	/**
	 * @param $path
	 *
	 * @return WooCommerce Path
	 */
	public function user_registration_wc_fields_admin_template_includes( $path ) {

		$core_path  = UR_ABSPATH;
		$addon_path = URWC_ABSPATH;
		$path       = str_replace( $core_path, $addon_path, $path );

		return $path;
	}
}

return new URWC_Admin();
