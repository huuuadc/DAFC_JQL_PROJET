<?php
session_start();
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion UserRegistration will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.wpeverest.com/user-registration/template-structure/
 * @author  WPEverest
 * @package UserRegistration/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

ur_print_notices(); ?>

<style>
	.forgot-password-method {

	}
	.forgot-password-method > div {
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
		align-items: center;
		align-content: center;
	}
	.forgot-password-method > div input,
	.forgot-password-method > div label {
		margin: 8px 10px 8px 0 !important;
		cursor: pointer;
	}
	.forgot-password-method > div label {
		font-size: 1rem;
		line-height: 1rem;
	}
	@media (min-width: 550px) {
		p.form-row-first, p.form-row-last, .forgot-password-by-phone {
			width: 100%;
			float: none;
			margin: 24px 0;
		}
	}
</style>
<div class="ur-frontend-form login" id="ur-frontend-form">
	<h3 class="form-title"><?php _e( 'Forgot Password', 'glamoutlet' ); ?></h3>
	<p style="padding: 0 10px;"><?php _e( 'Please enter your email or phone number below to access your account', 'glamoutlet' ); ?></p>
	<form method="post" class="user-registration-ResetPassword lost_reset_password lost_reset_password_via_email">
		<div class="ur-form-row">
			<div class="ur-form-grid">
				<div class="forgot-password-method">
					<div><input type="radio" name="forgot_password_method" value="phone" id="forgot_password_method_phone"/> <label for="forgot_password_method_phone">Phone Number</label></div>
					<div><input type="radio" name="forgot_password_method" value="email" id="forgot_password_method_email" checked="checked"/> <label for="forgot_password_method_email">Email Address</label></div>
				</div>
				
				<p class="user-registration-form-row user-registration-form-row--first form-row form-row-first forgot-password-by-email">
					<label for="user_login"><?php _e( 'Email Address', 'glamoutlet' ); ?></label>
					<input class="user-registration-Input user-registration-Input--text input-text" type="text" name="user_login" id="user_login" />
				</p>

				<div class="clear"></div>

				<?php do_action( 'user_registration_lostpassword_form' ); ?>

				<p class="user-registration-form-row form-row">
					<input type="hidden" name="ur_reset_password" value="true" />
					<input type="submit" class="user-registration-Button button secondary" value="<?php esc_attr_e( 'Reset password', 'glamoutlet' ); ?>" />
				</p>

				<?php wp_nonce_field( 'lost_password' ); ?>
			</div>
		</div>
	</form>
	<form method="post" class="user-registration-ResetPassword lost_reset_password lost_reset_password_via_phone" style="display:none">
		<div class="ur-form-row">
			<div class="ur-form-grid">
				<div class="forgot-password-method">
					<div><input type="radio" name="forgot_password_method" value="phone" id="forgot_password_method_phone" checked="checked"/> <label for="forgot_password_method_phone">Phone Number</label></div>
					<div><input type="radio" name="forgot_password_method" value="email" id="forgot_password_method_email"/> <label for="forgot_password_method_email">Email Address</label></div>
				</div>

				<p class="forgot-password-by-phone">
					<label for="phone_number"><?php _e( 'Phone Number', 'glamoutlet' ); ?></label>
					<input class="" type="number" name="phone_number" id="phone_number" value="<?php echo isset($_SESSION['session_smsotp']) ? $_SESSION['session_smsotp']['phone'] : '' ?>" />
				</p>

				<div class="clear"></div>

				<?php
					if(!isset($_SESSION['session_smsotp'])) :
				?>
					<p class="user-registration-form-row form-row">
						<input type="hidden" name="ur_reset_password_via_phone" value="true" />
						<input type="submit" class="user-registration-Button button secondary" value="<?php esc_attr_e( 'Reset password', 'glamoutlet' ); ?>" />
					</p>
				<?php
					else :
				?>
				<div class="otp-section">
					<p class="opt-verify">
						<label for="sms_otp"><?php _e( 'Enter Verification Code', 'glamoutlet' ); ?></label>
						<input class="" type="number" name="sms_otp" id="sms_otp" value="" />
					</p>
					<p class="otp-status">
						<a id="resendOTP" onclick="stopOTPTimer=true; resendOTP('form.lost_reset_password_via_phone')" >Resend OTP</a>
						<span id="otpTimeRemain"></span>
					</p>
					<p class="user-registration-form-row form-row">
						<input type="hidden" name="ur_reset_password_via_phone" value="true" />
						<input type="submit" class="user-registration-Button button secondary" value="<?php esc_attr_e( 'Verify OTP', 'glamoutlet' ); ?>" />
					</p>
					<input type="hidden" name="resend_smsotp" value="false" />
				</div>
				<?php
					endif;
				?>

				<?php wp_nonce_field( 'lost_password_via_phone' ); ?>
			</div>
		</div>
	</form>
</div>
<script>
	function setForgotPasswordMethod(method) {
		var d = new Date();
		d.setTime(d.getTime() + (60*60*1000)); //60 mins
		var expires = "expires="+d.toUTCString();
		document.cookie = "forgot_passsword_method=" + method + "; " + expires;
	}
	function getForgotPasswordMethod() {
		const name = 'forgot_passsword_method';
		const value = `; ${document.cookie}`;
		const parts = value.split(`; ${name}=`);
		if (parts.length === 2) {
			return parts.pop().split(';').shift();
		}
		else {
			return false;
		}
	}
	function loadFormForEmail() {
		jQuery('.lost_reset_password_via_phone').hide();
		jQuery('.lost_reset_password_via_email').show();
	}
	function loadFormForPhone() {
		jQuery('.lost_reset_password_via_phone').show();
		jQuery('.lost_reset_password_via_email').hide();
	}
	jQuery(document).ready(function() {
		const forgotPasswordMethod = getForgotPasswordMethod();
		if(forgotPasswordMethod == 'phone') {
			loadFormForPhone();
		}
		else {
			loadFormForEmail();
		}
		jQuery('input[name="forgot_password_method"]').click(function(){
			if(this.value == "phone") {
				setForgotPasswordMethod('phone');
				loadFormForPhone();
			}
			else {
				setForgotPasswordMethod('email');
				loadFormForEmail();
			}
		});

		/*OTP Time Remain*/
		otpTimer(120);
	});
</script>
