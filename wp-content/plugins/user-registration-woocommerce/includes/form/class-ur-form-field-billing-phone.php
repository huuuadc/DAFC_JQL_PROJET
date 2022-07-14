<?php
/**
 * UserRegistrationWooCommerce Admin.
 *
 * @class    UR_Form_Field_Billing_Phone
 * @version  1.0.0
 * @package  UserRegistration/Form
 * @category Admin
 * @author   WPEverest
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * UR_Form_Field_Billing_Phone Class
 */
class UR_Form_Field_Billing_Phone extends UR_Form_Field {

	private static $_instance;


	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Hook in tabs.
	 */
	public function __construct() {

		$this->id = 'user_registration_billing_phone';

		$this->form_id = 1;

		$this->registered_fields_config = array(

			'label' => __( 'Phone', 'user-registration-woocommerce' ),

			'icon'  => 'ur-icon ur-icon-phone',
		);
		$this->field_defaults           = array(

			'default_label'      => __( 'Phone', 'user-registration-woocommerce' ),

			'default_field_name' => 'billing_phone',
		);

		add_filter( "{$this->id}_advance_class", array( $this, 'settings_override' ), 10, 1 );
	}

	public function settings_override( $file_path_override ) {
		$file_path_override['file_path'] = URWC_ABSPATH . 'includes' . UR_DS . 'form' . UR_DS . 'settings' . UR_DS . 'class-ur-setting-billing-phone.php';
		return $file_path_override;
	}

	public function get_registered_admin_fields() {

		return '<li id="' . $this->id . '_list "

				class="ur-registered-item draggable"

                data-field-id="' . $this->id . '"><span class="' . $this->registered_fields_config['icon'] . '"></span>' . $this->registered_fields_config['label'] . '</li>';
	}


	public function validation( $single_form_field, $form_data, $filter_hook, $form_id ) {
		// TODO: Implement validation() method.
	}
}

return UR_Form_Field_Billing_Phone::get_instance();
