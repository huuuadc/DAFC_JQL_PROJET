<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<?php
	$dob = get_user_meta($user->id, 'user_registration_dob', true);
	if($dob != '') {
		$dob_part = explode('/', $dob);
		$dob_db = $dob_part[2] . '-' . $dob_part[1] . '-' . $dob_part[0];
		$dob_display = date('M d, Y', strtotime($dob_db));
	}
	else {
		$dob_display = '';
	}

	$ur_confirm_email = get_user_meta($user->id, 'ur_confirm_email', true);

	$url      = ( ! empty( $_SERVER['HTTPS'] ) ) ? 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$url      = substr( $url, 0, strpos( $url, '?' ) );
	$instance = new UR_Email_Confirmation();
	$url      = wp_nonce_url( $url . '?ur_resend_id=' . $instance->crypt_the_string( $user->ID . '_' . time(), 'e' ) . '&ur_resend_token=true', 'ur_resend_token' );
?>
<h1 class="account-page-title">Account Details</h1>

<div class="account-section personal-information-section">
	<h2>Personal Information</h2>
	<div class="info">
		<div class="full-name"><?php echo esc_attr( $user->first_name ); ?> <?php echo esc_attr( $user->last_name ); ?></div>
		<div class="birthday">Born on <?php echo $dob_display; ?></div>
	</div>
	<div class="form"></div>
	<div class="action">
		<a href="#" class="edit">Edit</a>
		<a href="#" class="cancel">Cancel</a>
	</div>
</div>

<div class="account-section email-section">
	<h2>Email Address</h2>
	<div class="info">
		<div class="email">
			<?php if($user->user_email != '') : ?>
				<i class="icomoon-check round <?php echo  ($ur_confirm_email == 1) ? 'confirmed' : '' ; ?>"></i>
			<?php endif; ?>
			<?php echo $user->user_email ? esc_attr( $user->user_email ) : __('You have not added an email.', 'glamoutlet'); ?>
		</div>
	</div>
	<div class="form"></div>
	<div class="action">
		<a href="#" class="edit"><?php echo  $user->user_email ? 'Edit' : 'Add New'; ?></a>
		<?php if($ur_confirm_email == 0 && $user->user_email != '') : ?>
			&nbsp;&nbsp;&nbsp;<a href="<?php echo esc_url( $url ); ?>" class="verify">Verify</a>
		<?php endif; ?>
		<a href="#" class="cancel">Cancel</a>
	</div>
</div>

<div class="account-section password-section">
	<h2>Password</h2>
	<div class="info">
		<input id="fake-password" type="password" value="000000000000" disabled="disabled"/>
	</div>
	<div class="form"></div>
	<div class="action">
		<a href="#" class="edit">Edit</a>
		<a href="#" class="cancel">Cancel</a>
	</div>
</div>

<div class="original-form">
<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> style="display:none" >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<div class="custom-group personal-information-group">
		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
			<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
		</p>
		<div class="clear"></div>

		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
			<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
		</p>
		<div class="clear"></div>

		<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="display:none">
			<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span>
		</p>
		<div class="clear"></div>

		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
			<label for="account_dob"><?php esc_html_e( 'Date of birth', 'woocommerce' ); ?></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_dob" id="account_dob" value="<?php echo esc_attr( $dob ); ?>" placeholder="DD/MM/YYYY" />
		</p>
		<div class="clear"></div>
	</div>

	<div class="custom-group email-group">
		<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
			<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
		</p>
		<div class="clear"></div>
	</div>


	<div class="custom-group password-group">
		<fieldset>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="password_current"><?php esc_html_e( 'Current password', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
			</p>
		</fieldset>
		<div class="clear"></div>
	</div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<button type="submit" class="woocommerce-Button button secondary" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Update', 'woocommerce' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>


<style>
	.action .cancel {display: none;}
</style>
<script>
	jQuery(document).ready(function(){
		function pre_openEditAccountForm() {
			jQuery('.account-section .action .cancel').hide();
			jQuery('.account-section .action .edit').show();
			jQuery('.account-section .info').show();
			jQuery(".woocommerce-EditAccountForm").hide();
		}
		function pre_closeEditAccountForm() {
			jQuery(".woocommerce-EditAccountForm").hide();
		}
		function moveEditAccountForm($dest) {
			$src = ".woocommerce-EditAccountForm";
			if(jQuery($dest).html() == '' ) {
				jQuery($src).appendTo($dest);
			}
		}

		//Personal Info
		jQuery('.personal-information-section .action .edit').click(function(e){
			e.preventDefault();
			pre_openEditAccountForm();

			jQuery('.personal-information-section .action .cancel').show();
			moveEditAccountForm('.personal-information-section .form');
			jQuery(".personal-information-section .form .woocommerce-EditAccountForm").show();

			jQuery('.personal-information-section .action .edit').hide();
			jQuery('.personal-information-section .info').hide();

			jQuery('.custom-group').hide();
			jQuery('.personal-information-group').show();
		});
		jQuery('.personal-information-section .action .cancel').click(function(e){
			e.preventDefault();
			pre_closeEditAccountForm()

			jQuery('.personal-information-section .action .cancel').hide();
			jQuery('.personal-information-section .action .edit').show();
			jQuery('.personal-information-section .info').show();
		});

		//Email
		jQuery('.email-section .action .edit').click(function(e){
			e.preventDefault();
			pre_openEditAccountForm();

			jQuery('.email-section .action .cancel').show();
			moveEditAccountForm('.email-section .form');
			jQuery(".email-section .form .woocommerce-EditAccountForm").show();
			
			jQuery('.email-section .action .edit').hide();
			jQuery('.email-section .info').hide();

			jQuery('.custom-group').hide();
			jQuery('.email-group').show();
		});
		jQuery('.email-section .action .cancel').click(function(e){
			e.preventDefault();
			pre_closeEditAccountForm()

			jQuery('.email-section .action .cancel').hide();
			jQuery('.email-section .action .edit').show();
			jQuery('.email-section .info').show();
		});

		//Password
		jQuery('.password-section .action .edit').click(function(e){
			e.preventDefault();
			pre_openEditAccountForm();

			jQuery('.password-section .action .cancel').show();
			moveEditAccountForm('.password-section .form');
			jQuery(".password-section .form .woocommerce-EditAccountForm").show();
			jQuery('.password-section .action .edit').hide();
			jQuery('.password-section .info').hide();

			jQuery('.custom-group').hide();
			jQuery('.password-group').show();
		});
		jQuery('.password-section .action .cancel').click(function(e){
			e.preventDefault();
			pre_closeEditAccountForm()
			
			jQuery('.password-section .action .cancel').hide();
			jQuery('.password-section .action .edit').show();
			jQuery('.password-section .info').show();
		});

		//Date of Birth mask
		jQuery('#account_dob').inputmask({alias:"datetime", inputFormat: "dd/mm/yyyy", min: "01/01/1900", max: "31/12/2020"});
		jQuery('#account_dob').css({'text-transform': 'uppercase'});
	});
	
</script>