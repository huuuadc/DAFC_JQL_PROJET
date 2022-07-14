<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>
<a id="triggerLoginPopup" data-open="#login-form-popup" style="display:none"></a>
<div id="login-form-popup" class="lightbox-content mfp-hide" style="max-width: 500px;">
	<div class="lightbox-inner">
		<p><?php _e("If you'd like, you can login and save your details for your feature purchases at the end of purchase process.", "glamoutlet"); ?></p>
		<input id="loginBeforeCheckout" type="radio" name="login_before_checkout" value="1" checked="checked"/>
		<label for="loginBeforeCheckout">Login</label>
		<?php echo do_shortcode('[user_registration_my_account]'); ?>
		<input id="continueAsGuest" type="radio" name="login_before_checkout" value="0"/>
		<label for="continueAsGuest">Continue as Guest</label>
	</div>
</div>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		jQuery(document).ready(
			function(){
				jQuery('#triggerLoginPopup').trigger('click');
				jQuery('#continueAsGuest').click(function(){
					jQuery('.mfp-close').trigger('click');
				});
			}
		);
	});
</script>
