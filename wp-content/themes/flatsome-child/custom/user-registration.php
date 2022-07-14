<?php
function custom_user_registration_form_field_args($args, $key, $value) {
	if($key == 'user_email'){
		$args['required'] = false;
		$args['custom_attributes']['required'] = false;
		//var_dump($args);
	}
	return $args;
}
add_filter( 'user_registration_form_field_args', 'custom_user_registration_form_field_args', 10, 3 );

function custom_user_registration_validate_user_email( $single_form_field, $form_data, $filter_hook, $form_id ) {

	$email  = isset( $form_data->value ) ? $form_data->value : '';
	$status = is_email( $email );

	if ( ! $status ) {
		add_filter(
			$filter_hook,
			function ( $msg ) use ($email) {
				if($email != '') {
					return __( 'Invalid email address', 'user-registration' );
				}
			}
		);
	}

	if ( email_exists( $email ) ) {
		add_filter(
			$filter_hook,
			function ( $msg ) {
				return __( 'Email already exists.', 'user-registration' );
			}
		);
	}
}
add_action( 'user_registration_validate_user_email', 'custom_user_registration_validate_user_email', 11, 4 );


function setSMSOTP($phone_number) {
	session_start();
	$test = false; // true / false
	if($test) {
		$otp = '123456';
	}
	else {
		$otp = rand(100000, 999999);
		$sendOTPResult = sendSMSOTP($phone_number, $otp);
		if($sendOTPResult['StatusCode'] != "1" && $sendOTPResult['StatusCode'] != 1) {
			unset($_SESSION['session_smsotp']);
			return 0; //fail
		}
	}

	$_SESSION['session_smsotp'] = array(
		'code' => $otp,
		'phone' => $phone_number,
		'attempt' => 0,
		'expire' => time() + (2 * 60)
	);
	//var_dump($_SESSION['session_smsotp']);
	return 1; //success
}

function verifySMSOTP($phone_number, $code) {
	session_start();
	if(isset($_SESSION['session_smsotp'])) {
		if(time() > $_SESSION['session_smsotp']['expire']) {
			unset($_SESSION['session_smsotp']);
			return -2; //expire
		}
		elseif($_SESSION['session_smsotp']['attempt'] >= 3) {
			unset($_SESSION['session_smsotp']);
			return -1; //attempt
		}
		elseif($code == $_SESSION['session_smsotp']['code'] && $phone_number == $_SESSION['session_smsotp']['phone']) {
			unset($_SESSION['session_smsotp']);
			return 1; //success
		}
		else {
			$_SESSION['session_smsotp']['attempt']++;
			return 0; //fail
		}
	}
	else {
		return -99;
	}
}

function custom_user_registration_before_register_user_action( $valid_form_data, $form_id ) {
	session_start();
	$phone_number = $valid_form_data['user_login']->value;
	$code = isset($valid_form_data['sms_otp']) ? $valid_form_data['sms_otp']->value : '';
	if(!isset($_SESSION['session_smsotp']) || (isset($_POST['resend_smsotp']) && $_POST['resend_smsotp'] == 'resend')) {
		$setSMSOTPResult = setSMSOTP($phone_number);
		if($setSMSOTPResult == 1) {
			wp_send_json_error(
				array(
					'code' => 'sms_otp_sent',
					'message' => __( 'OTP Sent' . $phone_number, 'glamoutlet' ),
				)
			);
		}
		else {
			wp_send_json_error(
				array(
					'message' => __( 'Unable to send OTP', 'glamoutlet' ),
				)
			);
		}
	}
	else {
		$code = $_POST['value_smsotp'];
		$verifySMSOTPResult = verifySMSOTP($phone_number, $code);
		if($verifySMSOTPResult == -2) {
			wp_send_json_error(
				array(
					'code' => 'sms_otp_expired',
					'message' => __( 'OTP has expired', 'glamoutlet' ),
				)
			);
		}
		elseif($verifySMSOTPResult == -1) {
			wp_send_json_error(
				array(
					'code' => 'sms_otp_attempts',
					'message' => __( 'Too many phone number validation attempts', 'glamoutlet' ),
				)
			);
		}
		elseif($verifySMSOTPResult == 0) {
			wp_send_json_error(
				array(
					'code' => 'sms_otp_failed',
					'message' => __( 'OTP code is not correct!', 'glamoutlet' ),
				)
			);
		}
		elseif($verifySMSOTPResult == -99) {
			wp_send_json_error(
				array(
					'code' => 'sms_otp_error',
					'message' => __( 'An unknown error', 'glamoutlet' ),
				)
			);
		}
		else {

		}
	}
}
add_action( 'user_registration_before_register_user_action', 'custom_user_registration_before_register_user_action', 11, 2 );

function custom_user_registration_before_form_buttons($form_id) {
	// echo '<div class="form-row " id="sms_otp_field" data-priority="" > 
	// 	<span class="input-wrapper">
	// 		<input data-rules="" data-id="sms_otp" type="number" class="input-text without_icon input-number ur-frontend-field " name="sms_otp" id="sms_otp" placeholder="Enter SMS OTP"  value="" data-label="SMS OTP" step="1" />
	// 	</span>
	// </div>';
	echo '<style>
		.ur-submit-button {
			display: flex;
			justify-content: center;
			align-items: center;
			align-content: center;
			flex-direction: row;
			background-color: #262a2c !important;
		}
		.lds-ring {
			display: inline-block;
			position: relative;
			width: 26px;
			height: 26px;
			top: 2px;
		}
		.lds-ring div {
			box-sizing: border-box;
			display: block;
			position: absolute;
			width: 16px;
			height: 16px;
			margin: 4px;
			border: 4px solid #fff;
			border-radius: 50%;
			animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
			border-color: #fff transparent transparent transparent;
		}
		.lds-ring div:nth-child(1) {
			animation-delay: -0.45s;
		}
		.lds-ring div:nth-child(2) {
			animation-delay: -0.3s;
		}
		.lds-ring div:nth-child(3) {
			animation-delay: -0.15s;
		}
		@keyframes lds-ring {
			0% {
				transform: rotate(0deg);
			}
			100% {
				transform: rotate(360deg);
			}
		}
	</style>';
}
add_action( 'user_registration_before_form_buttons', 'custom_user_registration_before_form_buttons', 11, 1 );

function sendSMSOTP($phone_number, $code) {
	$url = 'https://apiv2.incomsms.vn/MtService/SendSms';

	$body = array(
		"Username" => "dafccskh",
		"Password" => "Accdacdavhpaifjusmz4tk",
		"PhoneNumber" => "$phone_number",
		"PrefixId" => "DAFC",
		"CommandCode" => "DAFC",
		"RequestId" => "0",
		"MsgContent" => "Ma xac thuc OTP DAFC cua Quy Khach la $code Quy Khach dang thanh toan giao dich tai HT DAFC. LH 19006972",
		"MsgContentTypeId" => "0",
		"FeeTypeId" => "0"
	);

    $request = json_encode($body);
	$added_id = addAPILog($url, 'POST', $request, '', 0);
	$response = wp_remote_post( $url, 
		array(
			'headers'   => array('Content-Type' => 'application/json; charset=utf-8'),
			'method'    => 'POST',
			'timeout' => 75,				    
			'body'		=> json_encode($body),
		)
	);

	$vars = json_decode($response['body'], true);
    updateAPILog($added_id, date('Y-m-d H:i:s'), $response['body'], 0, '', '');
	return $vars;
}

function unset_session_smsotp() {
	if ( is_page( 'sign-up' ) ) {
		session_start();
		unset($_SESSION['session_smsotp']);
	}
}
add_action( "template_redirect", "unset_session_smsotp" );

function custom_user_registration_after_register_user_action($valid_form_data, $form_id, $user_id) {
	$phone_number = $valid_form_data['user_login']->value;
	$dafc_member = _api_call_CheckMemberOutlet($phone_number);
	if($dafc_member && $dafc_member['Responcode'] == 1) {
		add_user_meta( $user_id, 'offline_id', $dafc_member['Model']['contact_no']);
		update_user_meta( $user_id, 'first_name', $dafc_member['Model']['first_name'] );
		update_user_meta( $user_id, 'last_name', $dafc_member['Model']['last_name'] );
	}
	else {
		$member = array(
			"LoginID" => $user_id,
			"Password" => $valid_form_data['user_pass']->value,
			"FirstName" => $valid_form_data['first_name']->value,
			"LastName" => $valid_form_data['last_name']->value,
			"DateOfBirth" => $valid_form_data['dob']->value,
			"Phone" => $phone_number,
			"Email" => $valid_form_data['user_email']->value,
			"Gender" => $valid_form_data['title']->value == 'Mr' ? 1 : 0
		);
		add_user_meta( $user_id, 'online_data', json_encode($member));
		$offline_data = _api_call_CreateMemberOutlet($member);
		if($offline_data) {
			add_user_meta( $user_id, 'offline_data', json_encode($offline_data));
			add_user_meta( $user_id, 'offline_id', $offline_data['Model']['membershipCard']['contactNo']);
		}
	}
}
add_action( 'user_registration_after_register_user_action', 'custom_user_registration_after_register_user_action', 11, 3 );


function _api_call_CheckMemberOutlet($phone_number) {
	try {
		$url = LS_API_URL . '/member/CheckMemberOutlet?Phone='.$phone_number.'&ClubCode=DAFC'; //DAFC //0978267699

		$body = array();

		$added_id = addAPILog($url, 'POST', '', '', 0);
		$response = wp_remote_post( $url, 
			array(
				'headers'   => array(
					'Content-Type' => 'application/json; charset=utf-8',
					'Authorization' => 'Bearer ' . LS_API_TOKEN
				),
				'method'    => 'POST',
				'timeout'   => 75,
				'body'		=> json_encode($body),
			)
		);

		$api_result = false;
		if(isJson($response['body'])) {
			$api_result = json_decode($response['body'], true);
			updateAPILog($added_id, date('Y-m-d H:i:s'), $response['body'], 0, '', '');
		}
		else {
			updateAPILog($added_id, date('Y-m-d H:i:s'), $response['body'], 0, '', '');
		}
		return $api_result;
	} catch (\Throwable $th) {
		//throw $th;
		return false;
	}
}

function _api_call_CreateMemberOutlet($member) {
	try {
		$url = LS_API_URL . '/member/MemberCreate';

		$body = array(
			"LoginID" => $member['LoginID'],
			"Password" => $member['Password'],
			"FirstName" => $member['FirstName'],
			"MiddleName" => "",
			"LastName" => $member['LastName'],
			"DateOfBirth" => $member['DateOfBirth'],
			"Phone" => $member['Phone'],
			"Address" => "",
			"PostCode" => "",
			"Email" => $member['Email'],
			"Gender" => $member['Gender'],
			"City" => "",
			"Distrist" => "",
			"Ward" => "",
			"Country" => "",
			"UserCreate" => "",
			"AgeGroup" => "",
			"Passport" => "",
			"Floor" => "",
			"Block" => "",
			"Name" => ""
		);
		$request = json_encode($body);

		$added_id = addAPILog($url, 'POST', $request, '', 0);
		$response = wp_remote_post( $url, 
			array(
				'headers'   => array(
					'Content-Type' => 'application/json; charset=utf-8',
					'Authorization' => 'Bearer ' . LS_API_TOKEN,
				),
				'method'    => 'POST',
				'timeout'   => 75,
				'body'		=> $request,
			)
		);
		$api_result = false;
		if(isJson($response['body'])) {
			$api_result = json_decode($response['body'], true);
			updateAPILog($added_id, date('Y-m-d H:i:s'), $response['body'], 0, '', '');
		}
		else {
			updateAPILog($added_id, date('Y-m-d H:i:s'), $response['body'], 0, '', '');
		}
		
		return $api_result;
	} catch (\Throwable $th) {
		//throw $th;
		writeAPIErrorLog('CreateMemberOutlet', $th->getMessage());
		return false;
	}
}

function _api_call_UpdateMemberOutlet( $user_id, $old_user_data ) {
	try {
		
		$user = get_userdata( $user_id );
		$offline_id = get_user_meta( $user_id, 'offline_id', true );

		$url = LS_API_URL . '/member/UpdateMember';

		$body = array(
			"ContactID" => $offline_id,
			"AccountID" => $offline_id,
			"Email" => $user->user_email,
			"FirstName" => $user->first_name,
			"LastName" => $user->last_name,
			"MiddleName" => "",
			"Gender" => 0,
			"Phone" => $user->user_login,
			"Address" => "",
			"City" => "",
			"PostCode" => "",
			"Country" => "",
			"DateOfBirth" => "2000-01-02 00:00:00.000"
		);
		$request = json_encode($body);

		$added_id = addAPILog($url, 'POST', $request, '', 0);
		$response = wp_remote_post( $url, 
			array(
				'headers'   => array(
					'Content-Type' => 'application/json; charset=utf-8',
					'Authorization' => 'Bearer ' . LS_API_TOKEN
				),
				'method'    => 'POST',
				'timeout'   => 75,
				'body'		=> json_encode($body),
			)
		);

		if(isJson($response['body'])) {
			update_user_meta( $user_id, 'offline_data', $response['body']);
		}
		updateAPILog($added_id, date('Y-m-d H:i:s'), $response['body'], 0, '', '');
	} catch (\Throwable $th) {
		//throw $th;
	}
}
add_action( 'profile_update', '_api_call_UpdateMemberOutlet', 10, 2 );


function custom_login_redirect($redirect_to, $user) {
	return '/my-account';
}
//add_filter( 'user_registration_login_redirect', 'custom_login_redirect', 99, 2 );

function custom_logout_redirect($redirect_to, $requested_redirect_to, $user) {
	return '/sign-in';
}
add_filter( 'logout_redirect', 'custom_logout_redirect', 99, 3 );

function retrieve_password_via_phone() {
	session_start();
	global $wpdb, $wp_hasher;

	$login = trim( $_POST['phone_number'] );

	if ( empty( $login ) ) {
		ur_add_notice( __( 'Enter a phone number.', 'glamoutlet' ), 'error' );
		return false;
	} else {
		// Check on username first, as customers can use emails as usernames.
		$user_data = get_user_by( 'login', $login );
	}

	$errors = new WP_Error();
	do_action( 'lostpassword_post', $errors, $user_data );

	if ( $errors->get_error_code() ) {
		ur_add_notice( $errors->get_error_message(), 'error' );
		return false;
	}

	if ( ! $user_data ) {
		ur_add_notice( __( 'Invalid phone number.', 'glamoutlet' ), 'error' );
		return false;
	}

	// Redefining user_login ensures we return the right case in the email.
	$user_login = $user_data->user_login;
	$phone_number = $user_login;
	do_action( 'retrieve_password', $user_login );
	// $allow = apply_filters( 'allow_password_reset', true, $user_data->ID );

	// if ( ! $allow ) {
	// 	ur_add_notice( __( 'Password reset is not allowed for this user', 'glamoutlet' ), 'error' );
	// 	return false;

	// } elseif ( is_wp_error( $allow ) ) {
	// 	ur_add_notice( $allow->get_error_message(), 'error' );
	// 	return false;
	// }

	//SEND OTP
	if(!isset($_SESSION['session_smsotp']) || (isset($_POST['resend_smsotp']) && $_POST['resend_smsotp'] == 'resend')) {
		$setSMSOTPResult = setSMSOTP($phone_number);
		if($setSMSOTPResult == 1) {
			ur_add_notice( __( 'OTP Sent', 'glamoutlet' ), 'success' );
			return false;
		}
		else {
			ur_add_notice( __( 'Unable to send OTP', 'glamoutlet' ), 'error' );
			return false;
		}
	}
	//VERIFY OTP
	else {
		$code = $_POST['sms_otp'];
		$verifySMSOTPResult = verifySMSOTP($phone_number, $code);
		if($verifySMSOTPResult == -2) {
			ur_add_notice( __( 'OTP has expired', 'glamoutlet' ), 'error' );
			return false;
		}
		elseif($verifySMSOTPResult == -1) {
			ur_add_notice( __( 'Too many phone number validation attempts', 'glamoutlet' ), 'error' );
			return false;
		}
		elseif($verifySMSOTPResult == 0) {
			ur_add_notice( __( 'OTP code is not correct!', 'glamoutlet' ), 'error' );
			return false;
		}
		elseif($verifySMSOTPResult == -99) {
			ur_add_notice( __( 'An unknown error', 'glamoutlet' ), 'error' );
			return false;
		}
		else { //SUCCESS - Forgot Password
			//ignore email verify
			add_filter( 'allow_password_reset', 'allow_password_reset_ignore_email_verify', 99, 2 );
			// Get password reset key (function introduced in WordPress 4.4).
			$key = get_password_reset_key( $user_data );
			//ur_add_notice( __( $key, 'glamoutlet' ), 'success' );
			return $key;
		}
	}
}
function process_lost_password_via_phone() {
	if ( isset( $_POST['ur_reset_password_via_phone'] ) && isset( $_POST['phone_number'] ) && isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'lost_password_via_phone' ) ) {
		$key = retrieve_password_via_phone();

		// If successful, redirect to my account with query arg set
		//http://local.glamoutlet.com.vn/sign-in/?action=rp&key=hAg7qJ2MidNMvRRgUYeN&login=admin
		if ( $key ) {
			if(is_wp_error($key)) {
				ur_add_notice( $key->get_error_message(), 'error' );
				return false;
			}
			elseif(is_string($key)) {
				wp_redirect('/sign-in/?action=rp&key='.$key.'&login='.$_POST['phone_number']);
			}
			exit;
		}
	}
}
add_action( 'wp_loaded', 'process_lost_password_via_phone', 20 );

function allow_password_reset_ignore_email_verify($result, $user_id) {
	return true;
}

?>