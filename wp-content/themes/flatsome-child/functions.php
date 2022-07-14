<?php
// Add custom Theme Functions here

add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );


//CUSTOM API
include_once('api-custom/terms-product.php');
include_once('api-custom/class-wc-api-custom.php');
/*END CUSTOM API*/

//add_action('woocommerce_after_order_notes', 'g_recaptcha_field');
function g_recaptcha_field($checkout) {
	echo '<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">';
	echo '<script src="https://www.google.com/recaptcha/api.js?render=6LeeTh0cAAAAAMbyp-GE1iwz9KaPHGACpdpfArUZ"></script>';
	echo "<script>
			grecaptcha.ready(function() {
				grecaptcha.execute('6LeeTh0cAAAAAMbyp-GE1iwz9KaPHGACpdpfArUZ', {action: 'checkoutpage'}).then(function(token) {
					document.getElementById('g-recaptcha-response').value = token;
				});
			});
		</script>";
}

//add_action('woocommerce_checkout_process', 'g_recaptcha_field_process');
function g_recaptcha_field_process() {
	/*if (!$_POST['g-recaptcha-response']) {
		wc_add_notice(__('Invalid recaptcha') , 'error');
	}*/
	if(!recaptcha_validate($_POST['g-recaptcha-response'])) {
		wc_add_notice(__('Invalid recaptcha') , 'error');
	}
}

/**
 * Validate form with reCaptcha
 * Return true or false
 */
 function recaptcha_validate($token) {
     if (!isset($token)) {
        return false;
     }
     $siteverify = 'https://www.google.com/recaptcha/api/siteverify';
     $secret = '6LeeTh0cAAAAANghKxQFKc01ylKrEJ6zHSv9D3wh';
     $response = file_get_contents($siteverify . '?secret=' . $secret . '&response=' . $token);
     $response = json_decode($response, true);

     return $response['success'];
 }

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 );

// add_action( 'wp_ajax_nopriv_fma_lwp_set_session', 'my_ajax_fma_lwp_set_session' );
// add_action( 'wp_ajax_fma_lwp_set_session', 'my_ajax_fma_lwp_set_session' );

// function my_ajax_fma_lwp_set_session() {
// 	include 'custom/firebase-check-phone.php';
// 	$user = $auth->getUser($_POST['uid']);
//     // Make your response and echo it.
//     if($user && $user->phoneNumber != '') {
//         $user_name = str_replace('+84', '0', $user->phoneNumber);
//         $user_email = 'sdt' . str_replace('+84', '0', $user->phoneNumber) . '@glamoutlet.com.vn';
//         $user_id = username_exists( $user_name );
 
//         if ( ! $user_id && false == email_exists( $user_email ) ) {
//             $random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
//             $user_id = wp_create_user( $user_name, $random_password, $user_email );
//         } else {
//             $random_password = __( 'User already exists.  Password inherited.', 'textdomain' );
//         }
//         wp_set_auth_cookie($user_id);
//         echo json_encode(array(
//             'user_id' => $user_id,
//             'fma_login_status' => true,
//             'fma_login_message' => ''
//         ));
//     }
//     else {
//         echo json_encode(array(
//             'fma_login_status' => false,
//             'fma_login_message' => 'Authentication Failed'
//         ));
//     }
 	
//     // Don't forget to stop execution afterward.
//     wp_die();
// }

// Function that will return our Wordpress menu
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));
 
 
	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");

add_filter( 'woocommerce_get_price_html', 'my_woocommerce_get_price_html', 100, 2 );
function my_woocommerce_get_price_html( $price, $product ){
    return str_replace( '&nbsp;', '', $price );
}

function wc_get_product_brand_list( $product_id, $sep = ', ', $before = '', $after = '' ) {
	return get_the_term_list( $product_id, 'brand', $before, $sep, $after );
}

function my_flatsome_woocommerce_shop_loop_category() {
	if ( ! flatsome_option( 'product_box_category' ) ) {
		return;
	}
	?>
	<p class="brand uppercase no-text-overflow product-brand">
		<?php
		global $product;
		$product_brand = wc_get_product_brand_list( get_the_ID(), '\n', '', '' );
		//$product_brand = strip_tags( $product_brand );

		if ( $product_brand ) {
			list( $first_part ) = explode( '\n', $product_brand );
			echo $first_part;
		}
		?>
	</p>
	<?php
}
add_action( 'woocommerce_shop_loop_item_title', 'my_flatsome_woocommerce_shop_loop_category', 0 );

function add_category_link_flatsome_woocommerce_shop_loop_category( $first_part, $product ) {
	$product_categories = $product->get_category_ids();
	if($product_categories) {
		list( $category_id ) = $product->get_category_ids();
		$category_link = get_term_link( $category_id, 'product_cat' );
		$first_part = '<a href="'.$category_link.'">'.$first_part.'</a>';
	}
	echo $first_part;
}
add_filter( 'flatsome_woocommerce_shop_loop_category', 'add_category_link_flatsome_woocommerce_shop_loop_category', 10, 2 );


 // Register new status
function register_custom_order_status() {
    register_post_status( 'wc-order-confirmed', array(
        'label'                     => 'Order Confirmed',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Order Confirmed (%s)', 'Order Confirmed (%s)' )
    ) );

	register_post_status( 'wc-payment-completed', array(
        'label'                     => 'Payment Completed',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Payment Completed (%s)', 'Payment Completed (%s)' )
    ) );

	register_post_status( 'wc-in-shipping', array(
        'label'                     => 'In Shipping',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'In Shipping (%s)', 'In Shipping (%s)' )
    ) );
}
add_action( 'init', 'register_custom_order_status' );


// Add to list of WC Order statuses
function add_custom_status_to_order_statuses( $order_statuses ) {
 
    $new_order_statuses = array();
 
    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {
 
        $new_order_statuses[ $key ] = $status;
 
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-order-confirmed'] = 'Order Confirmed';
			$new_order_statuses['wc-payment-completed'] = 'Payment Completed';
			$new_order_statuses['wc-in-shipping'] = 'In Shipping';
        }
    }
 
    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_custom_status_to_order_statuses' );

function custom_woocommerce_format_order_statuses($status) {
	return str_replace('-', ' ', $status);
}

function custom_registration_form() {
    ob_start();
    include  (__DIR__.'/custom/login-with-phone.php');
    $form = ob_get_contents();
    ob_end_clean();
    return $form;
}
//add_shortcode( 'custom_registration_form', 'custom_registration_form' );

function custom_email_confirmation() {
    ob_start();
    include  (__DIR__.'/custom/email-confirmation.php');
    $page = ob_get_contents();
    ob_end_clean();
    return $page;
}
//add_shortcode( 'custom_email_confirmation', 'custom_email_confirmation' );




include_once('custom/user-registration.php');





function custom_woocommerce_product_cross_sells_products_heading() {
	return __( 'Recommend Product', 'glamoutlet');
}

add_filter( 'woocommerce_product_cross_sells_products_heading', 'custom_woocommerce_product_cross_sells_products_heading' );


function child_custom_actions() {
    remove_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );
	remove_action( 'woocommerce_before_cart_totals', 'flatsome_woocommerce_before_cart_totals' );
	remove_action( 'woocommerce_thankyou', 'woocommerce_order_details_table' );
}
add_action( 'wp_loaded' , 'child_custom_actions' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );


function custom_yith_wcwl_wishlist_title() {
	return '';
}
add_filter( 'yith_wcwl_wishlist_title', 'custom_yith_wcwl_wishlist_title', 99, 1 ); 

add_action( 'template_redirect', 'logout_confirmation' );
function logout_confirmation() {
    global $wp;
    if ( isset( $wp->query_vars['customer-logout'] ) ) {
        wp_redirect( str_replace( '&amp;', '&', wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) );
        exit;
    }
}

function my_enqueue_stuff() {
	if ( is_page( 'my-account' ) ) {
		wp_enqueue_script('inputmask', get_home_url() . '/wp-content/plugins/user-registration/assets/js/inputmask/jquery.inputmask.bundle.js?' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_stuff' );


/* My Account - Member Ratings */
/*
 * Step 1. Add Link (Tab) to My Account menu
 */
add_filter ( 'woocommerce_account_menu_items', 'custom_member_ratings_link', 40 );
function custom_member_ratings_link( $menu_links ){
	
	$menu_links = array_slice( $menu_links, 0, 5, true ) 
	+ array( 'member-ratings' => 'Member Ratings' )
	+ array_slice( $menu_links, 5, NULL, true );
	
	return $menu_links;

}
/*
 * Step 2. Register Permalink Endpoint
 */
add_action( 'init', 'custom_member_ratings_endpoint' );
function custom_member_ratings_endpoint() {

	// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
	add_rewrite_endpoint( 'member-ratings', EP_PAGES );

}
/*
 * Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
 */
add_action( 'woocommerce_account_member-ratings_endpoint', 'custom_member_ratings_endpoint_content' );
function custom_member_ratings_endpoint_content() {
?>
<div class="row vertical-tabs">
	<div class="large-2 col col-border">
		<ul id="my-account-nav" class="account-nav nav nav-line nav-uppercase nav-vertical mt-half">
			<?php wc_get_template('myaccount/account-links.php'); ?>
		</ul>
	</div>

	<div class="large-10 col member-ratings-content">
		<h3>Member ratings</h3>
		<ul>
			<li><span class="key">Remaining points:</span><span class="value">0</span></li>
			<li><span class="key">Point redeem:</span><span class="value">0</span></li>
			<li><span class="key">Point earn:</span><span class="value">0</span></li>
			<li><span class="key">Point value:</span><span class="value">0</span></li>
		</ul>
	</div>
</div>
<?php
}
/*
 * Step 4
 */
// Go to Settings > Permalinks and just push "Save Changes" button.
/* End - My Account - Member Ratings */

/* Redirect /my-account */
add_action( 'template_redirect', 'custom_my_account_page_redirect_if_user_not_logged_in' );
function custom_my_account_page_redirect_if_user_not_logged_in() {
    if ( is_page('my-account') && !is_user_logged_in() && !(isset($_GET['action']) && $_GET['action'] == 'rp') && !(isset($_GET['show-reset-form']) && $_GET['show-reset-form'] == 'true') ) {
        wp_redirect( '/sign-in' );
        exit;
    }
}

/* Redirect /sign-in */
add_action( 'template_redirect', 'custom_sign_in_page_redirect_if_user_logged_in' );
function custom_sign_in_page_redirect_if_user_logged_in() {
    if ( is_page('sign-in') && is_user_logged_in() ) {
		if(isset($_GET['ur_token'])) {
			wp_redirect( '/my-account/?ur_token=' .$_GET['ur_token'] );
		}
		else {
			wp_redirect( '/my-account' );
		}
        exit;
    }
}

/* Checkout Page - Coupon */
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form');
add_action( 'woocommerce_review_order_before_submit', 'woocommerce_checkout_coupon_form');

add_filter( 'woocommerce_coupon_validate_expiry_date', 'custom_woocommerce_coupon_validate_expiry_date', 99, 2 );
function custom_woocommerce_coupon_validate_expiry_date( $coupon, $that ){
	$start_time = $that->get_meta('coupon_start_time');
	$end_time = $that->get_meta('coupon_end_time');
	$now = date("Y-m-d H:i:s");

	if($start_time && $end_time) {
		return !($now >= $start_time && $now <= $end_time);
	}
	else if($start_time && !$end_time) {
		return !($now >= $start_time);
	}
	else if(!$start_time && $end_time) {
		return !($now <= $end_time);
	}

	return $coupon;
}


function custom_woocommerce_reduce_order_stock( $order ) { // you get an object $order as an argument
	$items = $order->get_items();

	$items_ids = array();
	foreach( $items as $item ) {
	  $items_ids[] = $item['product_id'];
	}
	die( print_r($items_ids) ); // it should break script while reduce stock
}
//add_action( 'woocommerce_reduce_order_stock', 'custom_woocommerce_reduce_order_stock' );


// On processed update product stock event
//add_action( 'woocommerce_updated_product_stock', 'wc_updated_product_stock_callback' );
// On admin single product creation/update
//add_action( 'woocommerce_process_product_meta', 'wc_updated_product_stock_callback' );
// On admin single product variation creation/update
//add_action( 'woocommerce_save_product_variation', 'wc_updated_product_stock_callback' );

add_action( 'added_post_meta', 'update_lastpiece_on_product_save', 10, 4 );
add_action( 'updated_post_meta', 'update_lastpiece_on_product_save', 10, 4 );
function update_lastpiece_on_product_save( $meta_id, $post_id, $meta_key, $meta_value ) {
    if ( $meta_key == '_edit_lock' ) { // we've been editing the post
        if ( get_post_type( $post_id ) == 'product' ) { // we've been editing a product
            // do something with this product
			$product_id = $post_id;
			update_lastpiece($product_id);
        }
    }
}
function update_lastpiece($product_id) {
	$product = wc_get_product( $product_id );
	$stock_qty = 0;
	if($product->is_type('simple')) {
		$stock_qty = $product->get_stock_quantity();
	}
	elseif($product->is_type('variable')) { 
		$variations = $product->get_available_variations();
		foreach($variations as $variation){
			$variation_id = $variation['variation_id']; //echo $variation_id;
			$variation_obj = new WC_Product_variation($variation_id); //var_dump($variation_obj);
			$stock = $variation_obj->get_stock_quantity();
			if($stock > 0) {
				$stock_qty += $stock;
			}
		}
	}
	//echo $stock_qty;
	if($stock_qty == 1) {
		wp_set_object_terms($product_id, 'last-piece', 'product_shop');
	}
	else {
		wp_remove_object_terms($product_id, 'last-piece', 'product_shop');
	}
}

//Custom Filter
//add_filter('woof_get_request_data', 'my_woof_get_request_data');
function my_woof_get_request_data($data){
	if(isset($data['product_cat'])) {
	    $cat = explode(',', $data['product_cat']);
		if(count($cat) > 1) {
			array_shift($cat);
			$data['product_cat'] = implode(',', $cat);
		}
	}
	//var_dump($data);
    return $data;
}


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	global $wp_version;
	if ( $wp_version !== '4.7.1' ) {
		//return $data;
	}

	$filetype = wp_check_filetype( $filename, $mimes );

	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];

}, 10, 4 );

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
	echo '<style type="text/css">
		.attachment-266x266, .thumbnail img {
			width: 100% !important;
			height: auto !important;
		}
		</style>';
}
add_action( 'admin_head', 'fix_svg' );


add_filter( 'woocommerce_shipping_fields', 'custom_shipping_address_field', 20, 1 );
function custom_shipping_address_field( $address_fields ) {
	//print_r($address_fields);
	if ( ! isset( $address_fields['shipping_phone'] ) ) {
		$address_fields['shipping_phone'] = array(
			'label'        => __( 'Phone', 'glamoutlet' ),
			'required'     => true,
			'class'        => array( 'form-row-wide' ),
			'autocomplete' => 'off',
			'priority'     => 71,
			'value'        => '',
			'description'  => '',
			'validate'     => array( '' ),
		);
	}
	if ( ! isset( $address_fields['shipping_district'] ) ) {
		$address_fields['shipping_district'] = array(
			'label'        => __( 'District', 'glamoutlet' ),
			'required'     => true,
			'class'        => array( 'form-row-wide' ),
			'autocomplete' => 'off',
			'priority'     => 51,
			'value'        => '',
			'description'  => '',
			'validate'     => array( '' ),
		);
	}

	foreach ($address_fields as $key => $value) {
		if(strpos($key, 'shipping_postcode') !== false) {
			unset($address_fields[$key]);
		}
		elseif(strpos($key, 'shipping_company') !== false) {
			unset($address_fields[$key]);
		}
		elseif(strpos($key, 'shipping_country') !== false) {
			unset($address_fields[$key]);
		}
		elseif(strpos($key, 'shipping_address_2') !== false) {
			unset($address_fields[$key]);
		}
		elseif(strpos($key, 'shipping_city') !== false) {
			$address_fields[$key]['label'] = 'Province';
		}
	}

	return $address_fields;
}

add_filter( 'woocommerce_billing_fields', 'custom_billing_address_field', 20, 1 );
function custom_billing_address_field( $address_fields ) {
	//print_r($address_fields);
	if ( ! isset( $address_fields['billing_district'] ) ) {
		$address_fields['billing_district'] = array(
			'label'        => __( 'District', 'glamoutlet' ),
			'required'     => true,
			'class'        => array( 'form-row-wide' ),
			'autocomplete' => 'off',
			'priority'     => 51,
			'value'        => '',
			'description'  => '',
			'validate'     => array( '' ),
		);
	}

	foreach ($address_fields as $key => $value) {
		if(strpos($key, 'billing_postcode') !== false) {
			unset($address_fields[$key]);
		}
		elseif(strpos($key, 'billing_company') !== false) {
			unset($address_fields[$key]);
		}
		elseif(strpos($key, 'billing_country') !== false) {
			unset($address_fields[$key]);
		}
		elseif(strpos($key, 'billing_address_2') !== false) {
			unset($address_fields[$key]);
		}
		elseif(strpos($key, 'billing_city') !== false) {
			$address_fields[$key]['label'] = 'Province';
		}
	}

	return $address_fields;
}

// Save the custom field 'user_registration_dob' 
add_action( 'woocommerce_save_account_details', 'save_dob_account_details', 12, 1 );
function save_dob_account_details( $user_id ) {
    if( isset( $_POST['account_dob'] ) ) {
        update_user_meta( $user_id, 'user_registration_dob', sanitize_text_field( $_POST['account_dob'] ) );
	}
}

function action_redirect_woocommerce_save_account_details( $user_id ) { 
    wp_redirect("/my-account/edit-account/");
}; 
//add_action( 'woocommerce_save_account_details', 'action_redirect_woocommerce_save_account_details', 99, 1 ); //need review



// Rename, re-order my account menu items
function custom_reorder_my_account_menu($currentOrder) {
    $neworder = array(
        'dashboard'          => __( 'Your Account', 'woocommerce' ),
        'orders'             => __( 'My Orders', 'woocommerce' ),
        'wishlist'			 => __( 'Wishlist', 'woocommerce' ),
        'edit-address'       => __( 'Address Book', 'woocommerce' ),
        'edit-account'       => __( 'Account Details', 'woocommerce' ),
        'customer-logout'    => __( 'Logout', 'woocommerce' ),
    );
    return $neworder;
}
add_filter ( 'woocommerce_account_menu_items', 'custom_reorder_my_account_menu', 10, 1 );


function custom_woocommerce_order_button_text($text) {
	return 'Check Out';
}
add_filter ( 'woocommerce_order_button_text', 'custom_woocommerce_order_button_text', 10, 1 );


//Checkout Thank you
add_action( 'woocommerce_thankyou', 'custom_woocommerce_thankyou', 10, 1 );
function custom_woocommerce_thankyou( $order_id ) {
	if ( ! $order_id ) {
		return;
	}

	wc_get_template(
		'order/order-details-thankyou.php',
		array(
			'order_id' => $order_id,
		)
	);
}


function getProductBrand($product_id) {
	$terms = get_the_terms( $product_id, 'brand' );
	$brands = array();
	foreach ($terms as $term) {
		$brands[] .= $term->name;
	}
	return implode(', ', $brands);
}

//add_action( 'woocommerce_before_add_to_cart_quantity', 'add_label_woocommerce_before_add_to_cart_quantity' );
function add_label_woocommerce_before_add_to_cart_quantity() {
	echo '';
}

//add_action( 'woocommerce_after_add_to_cart_quantity', 'add_find_size_woocommerce_after_add_to_cart_quantity' );
//function add_find_size_woocommerce_after_add_to_cart_quantity(){
//	echo '<div class="find-size"><i class="icomoon-find-size"></i><a href="https://www.glamoutlet.com.vn/size-chart/"> Find your size</a></div>';
//}

//add_action( 'woocommerce_after_add_to_cart_form', 'add_delivery_woocommerce_after_add_to_cart_form' );
//function add_delivery_woocommerce_after_add_to_cart_form() {
//	echo '<div class="delivery-returns">
//			<div class="line1"><i class="icomoon-shipping"></i> <strong>Delivery and Returns</strong></div>
//			<p>Free Shipping and Return for order from <strong style="white-space: nowrap;">4,000,000 VND</strong></p>
//		</div>';
//}


//Write API Error Log
function writeAPIErrorLog($name, $error) {
	$name = $name . '_' . date('Y-m-d-H-i-s');
	$myfile = fopen(__DIR__."/api_error_logs/$name.txt", "w");
	fwrite($myfile, $error);
	fclose($myfile);
}

//Add API Log
function addAPILog($url, $method, $request, $response, $need_call) {
	$added_id = 0;
	global $wpdb;

	$table = 'api_schedule';
	$data = array('added' => date('Y-m-d H:i:s'), 'url' => $url, 'method' => $method, 'request' => $request, 'response' => $response, 'need_call' => $need_call);
	$format = array('%s', '%s', '%s', '%s', '%s', '%d');
	$wpdb->insert($table, $data, $format);
	$added_id = $wpdb->insert_id;

	//$sql = $wpdb->prepare("INSERT INTO `$table` (`url`, `method`, `request`, `response`, `need_call`) values (%s, %s, %s, %s, %d)", $url, $method, $request, $response, 0);
	//$wpdb->query($sql);

	return $added_id;
}

//Update API Log
function updateAPILog($id, $called, $response, $need_call, $status, $logs) {
	$updated_id = 0;
	global $wpdb;

	$table = 'api_schedule';
	$modified = date('Y-m-d H:i:s');
	$data = array('modified' => $modified, 'called' => $called, 'response' => $response, 'need_call' => $need_call, 'status' => $status, 'logs' => $logs);
	$format = array('%s', '%s', '%s', '%d', '%s', '%s');
	$where = array('id' => $id );
	$where_format = array('%d');
	$updated_id = $wpdb->update( $table, $data, $where, $format, $where_format );

	return $updated_id;
}

//Get API Log
function getAPILog($id) {
	global $wpdb;

	$table = 'api_schedule';
	$row = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE id = %d", $id ) );

	return $row;
}

function getAPINeedCall() {
	global $wpdb;

	$table = 'api_schedule';
	$results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE need_call = %d", 1 ) );

	return $results;
}

function isJson($string) {
	json_decode($string);
	return json_last_error() === JSON_ERROR_NONE;
}


//woocommerce_new_order
function custom_woocommerce_new_order( $order_id ) {
	$myfile = fopen(__DIR__."/logs/new_order.txt", "w");
	fwrite($myfile, $order_id);
	fclose($myfile);
}
add_action('woocommerce_new_order', 'custom_woocommerce_new_order', 10, 1);


//POST /api/transactions/Payment_Outlet
function _api_call_Payment_Outlet($paymentData) {
	try {
		$url = LS_API_URL . '/transactions/Payment_Outlet';

		$body = $paymentData;
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

//POST /api/transactions/Transaction_Outlet
function _api_call_Transaction_Outlet($transactionData) {
	try {
		$url = LS_API_URL . '/transactions/Transaction_Outlet';

		$body = $transactionData;
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

function getAvailableSerial($product_id, $qty) { //simple id or variation id
	$i = 0;
	$result = array();
	$meta_key = 'serials';
	$serials = get_post_meta($product_id, $meta_key, true);
	if(is_array($serials)) {
		foreach ($serials as $k => $v) {
			if($qty == $i) {
				break;
			}
			elseif($v['used'] == 0 && $v['serial'] != '') {
				$v['used'] = 1;
				$serials[$k] = $v;
				update_post_meta($product_id, $meta_key, $serials);
				$result[] = $v['serial'];
				$i++;
			}
		}
	}
	else {
		//need write log (serials)
	}

	return $result;
}

function setAvailableSerial($product_id, $item_serials, $used) { //simple id or variation id
	$meta_key = 'serials';
	$serials = get_post_meta($product_id, $meta_key, true);
	if(is_array($serials)) {
		foreach ($serials as $k => $v) {
			if(in_array($v['serial'], $item_serials)) {
				$v['used'] = $used;
				$serials[$k] = $v;
			}
		}
		//var_dump($serials); die();
		update_post_meta($product_id, $meta_key, $serials);
	}
}

function setOrderSerials($order_id, $used) {
	$order = wc_get_order( $order_id);

	// Loop through order line items
	foreach( $order->get_items() as $item ){
		$item_serials = array();

		$product_id = $item['product_id'];
		$variation_id = $item['variation_id'];
		$provar_id = $variation_id ? $variation_id : $product_id;
		
		// get order item meta data (in an unprotected array)
		$_serials = $item->get_meta('_serials');
		if($_serials) {
			foreach ($_serials as $key => $value) {
				array_push($item_serials, $value);
			}
		}

		setAvailableSerial($provar_id, $item_serials, $used);
	}
}

function customOrderCancelled($order_id) {
	setOrderSerials($order_id, 0);
}

function reverseOrderCancelled($order_id) {
	setOrderSerials($order_id, 1);
}

//Chuyen khoan ngan hang - status: processing
add_filter( 'woocommerce_bacs_process_payment_order_status','filter_bacs_process_payment_order_status_callback', 10, 2 );
function filter_bacs_process_payment_order_status_callback( $status, $order ) {
    return 'processing';
}

// define the woocommerce_order_status_changed callback 
function custom_woocommerce_order_status_changed( $order_id, $old_status, $new_status ) { 
	//CANCELLED
	if($old_status != 'pending' && $new_status == 'cancelled') {
		customOrderCancelled($order_id);
	}
	//reverse CANCELLED
	if($old_status == 'cancelled' && $new_status != 'pending') {
		reverseOrderCancelled($order_id);
	}
    /*
     * $old_status == 'pending' && ($new_status == 'processing' || $new_status == 'completed')
     *
     */

    if($old_status == 'processing' && $new_status == 'shipment') {
        global $wpdb;
        $myfile = fopen(__DIR__."/logs/order_".$order_id.'.txt', "w");
        fwrite($myfile, $order_id . ' / ' . $old_status . ' / ' . $new_status);

        // Order Setup Via WooCommerce
        $order = new WC_Order( $order_id );

        // {
        // 	"Transaction_No_": "2396",
        // 	"Receipt_No_": "2396",
        // 	"Tender_Type": 1,
        // 	"Amount_Tendered": 6103200,
        // 	"Amount_in_Currency": 6103200,
        // 	"Date": "2021-10-20",
        // 	"Time": "07:19:00",
        // 	"Quantity": 2,
        // 	"VAT_Buyer_Name": "Nam NGUYEN",
        // 	"VAT_Company_Name": "Home",
        // 	"VAT_Tax_Code": "",
        // 	"VAT_Address": "Nam NGUYEN",
        // 	"VAT_Payment_Method": "Cash",
        // 	"VAT_Bank_Account": "",
        // 	"Member_Phone": "0123456789",
        // 	"THENH": "",
        // 	"Cash": 6103200
        // }

        $Member_Card_No_ = "";
        $user_id = $order->get_user_id();
        $Member_Card_No_ = get_user_meta($user_id, 'offline_id', true);

        $LineNo = 30000;
        $Receipt_No_ = $order->get_id();
        $Transaction_No_ = $order->get_id();
        //$Tender_Type = $order->get_payment_method() == 'cod' ? 1 : 2;
        //$VAT_Payment_Method =  $order->get_payment_method() == 'cod' ? 'Cash' : 'Alepay';
        $Tender_Type = 0;
        $VAT_Payment_Method = '';
        switch ($order->get_payment_method()) {
            case 'cod':
                $Tender_Type = 1;
                $VAT_Payment_Method = 'TM/CK';
                break;

            case 'alepay':
                $Tender_Type = 2;
                $VAT_Payment_Method = 'TM/CK';
                break;

            case 'bacs':
                $Tender_Type = 14;
                $VAT_Payment_Method = 'TM/CK';
                break;

            default:
                # code...
                break;
        }

        $Amount_Tendered = $order->get_total();
        $Amount_in_Currency = $order->get_total();
        // $Date = $order->get_date_paid()->date('Y-m-d') . ' 00:00:00.000';
        // $Time = '1754-01-01 ' . $order->get_date_paid()->date('H:i:s.v');
        //
        //Ch&#7881;nh l&#7841;i l&#7845;y ng&#1072;y hi&#7879;n t&#7841;i - &#1041;p d&#7909;ng cho jql
        $Date = $order->get_date_created()->date('Y-m-d') . ' 00:00:00.000';
        $Time = '1754-01-01 ' . $order->get_date_created()->date('H:i:s.v');
        //$Quantity = $order->get_item_count();
        $Quantity = 1;
        $VAT_Buyer_Name = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
        $VAT_Company_Name = $order->get_billing_company();
        $VAT_Tax_Code = "";
        $VAT_Address = $order->get_billing_address_1();

        $VAT_Bank_Account = "";
        $Member_Phone = $order->get_billing_phone();
        $THENH = ""; //$order->get_payment_method() == 'cod' ? "" : "1111";
        if($order->get_payment_method() == "alepay") {
            $alepay_transaction_info = get_post_meta($order_id, '_alepay_transaction_info', true);
            if(isJson($alepay_transaction_info)) {
                $alepay_transaction_info = json_decode($alepay_transaction_info);
                $THENH = substr($alepay_transaction_info->cardNumber, -4);
            }
        }
        $Cash = $order->get_total();

        $Payment_Outlet = array(
            "LineNo" => $LineNo,
            "Transaction_No_" => $Transaction_No_,
            "Receipt_No_" => $Receipt_No_,
            "Tender_Type" => $Tender_Type,
            "Amount_Tendered" => $Amount_Tendered,
            "Amount_in_Currency" => $Amount_in_Currency,
            "Date" => $Date,
            "Time" => $Time,
            "Quantity" => $Quantity,
            "VAT_Buyer_Name" => $VAT_Buyer_Name,
            "VAT_Company_Name" => $VAT_Company_Name,
            "VAT_Tax_Code" => $VAT_Tax_Code,
            "VAT_Address" => $VAT_Address,
            "VAT_Payment_Method" => $VAT_Payment_Method,
            "VAT_Bank_Account" => $VAT_Bank_Account,
            "Member_Phone" => $Member_Phone,
            "THENH" => $THENH,
            "Cash" => $Cash
        );

        fwrite($myfile, "\r\n");
        fwrite($myfile, '//Payment_Outlet JSON');
        fwrite($myfile, "\r\n");
        fwrite($myfile, json_encode($Payment_Outlet));
        fwrite($myfile, "\r\n");

        //call LS API
        _api_call_Payment_Outlet($Payment_Outlet);


        fwrite($myfile, '//Transaction_Outlet JSON');
        fwrite($myfile, "\r\n");


        //var_dump($order); die();

        //////////////////
        /*Coupon*/
        $CouponCode = '';
        $CouponNo = '';
        $coupon = false;
        foreach( $order->get_coupons() as $order_item_coupon ) {
            // Get the WC_Coupon object
            //var_dump($order_item_coupon); die();
            $CouponCode = $order_item_coupon->get_code();
            //$CouponNo = $order_item_coupon->get_meta('CouponNo', true);

            $coupon = new WC_Coupon($CouponCode);
            $discount_type = $coupon->get_discount_type(); // Get coupon discount type
            $coupon_amount = $coupon->get_amount(); // Get coupon amount

            $CouponNo = $coupon->get_meta('CouponNo', true);
        }

        // Iterate Through Items
        $items = $order->get_items();
        $i = 1;
        $Transaction_Outlet = array();
        foreach ( $items as $item ) {	//var_dump(($item)); //die();
            $item_id = $item->get_id();
            // Store Product ID
            $product_id = $item['product_id'];
            //update_lastpiece
            update_lastpiece($product_id);
            $variation_id = $item['variation_id'];
            $provar_id = $variation_id ? $variation_id : $product_id;

            //$product = new WC_Product($item['product_id']);

            $product        = $item->get_product();
            $active_price   = $product->get_price(); // The product active raw price

            $sale_price  = $product->get_sale_price(); // The product raw sale price

            $regular_price     = $product->get_regular_price(); // The product raw regular price

            $product_name   = $item->get_name(); // Get the item name (product name)

            $item_quantity  = $item->get_quantity(); // Get the item quantity

            $item_subtotal  = $item->get_subtotal(); // Get the item line total non discounted

            $item_subto_tax = $item->get_subtotal_tax(); // Get the item line total tax non discounted

            $item_total     = $item->get_total(); // Get the item line total discounted

            $item_total_tax = $item->get_total_tax(); // Get the item line total  tax discounted

            $item_taxes     = $item->get_taxes(); // Get the item taxes array

            $item_tax_class = $item->get_tax_class(); // Get the item tax class

            $item_tax_status= $item->get_tax_status(); // Get the item tax status

            $item_downloads = $item->get_item_downloads(); // Get the item downloads

            // Check for "API" Category and Run

            $projectsku = $product->get_sku();

            // [
            // 	{
            // 	  "Receipt_No_": "string",
            // 	  "Transaction_No_": "string",
            // 	  "LineNo": "string",
            // 	  "Item_No_": "string",
            // 	  "SerialNo": "string",
            // 	  "Variant_Code": "string",
            // 	  "Trans_Date": "2021-10-22T05:00:19.889Z",
            // 	  "Quantity": 0,
            // 	  "UnitPrice": 0,
            // 	  "TotalPrice": 0,
            // 	  "DiscountRate": 0,
            // 	  "Disc": 0,
            // 	  "TotalAmt": 0,
            // 	  "Member_Card_No_": "string",
            // 	  "Offer_Online_ID": "string",
            // 	  "CouponCode": "string",
            // 	  "CouponNo": "string"
            // 	}
            // ]

            //Category_Online_ID



            /* Serial Used */
            $meta_key = '_serials';
            $order_item_serials = $item->get_meta($meta_key);
            if(is_array($order_item_serials) && count($order_item_serials) > 0) {

            }
            else {
                $serials_used = getAvailableSerial($provar_id, $item_quantity);
                if(wc_update_order_item_meta($item_id, $meta_key, $serials_used) == false) {
                    //need write log (wc_update_order_item_meta // _serials)

                }
                $order_item_serials = wc_get_order_item_meta($item_id, $meta_key, true);
            }

            /*Get Discount */
            $DiscountRate = 0; //default
            $Value_Type = 0; //kh&#1092;ng c&#1091; gi&#7843;m gi&#1073;
            $DiscountAmount = 0; //default

            $order_item_discounts = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."wdr_order_item_discounts WHERE item_id = " . $provar_id . " AND item_id != 0 AND order_id = " . $order->get_id() ) );
            //var_dump($order_item_discounts); die();
            if($order_item_discounts) {
                $wdr_rule = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$wpdb->prefix."wdr_rules WHERE id = " . $order_item_discounts->rule_id ) );
                if($wdr_rule) {
                    $wdr_rule_discount_type = $wdr_rule->discount_type;
                    switch ($wdr_rule_discount_type) {
                        case 'wdr_simple_discount':
                            $product_adjustments = json_decode($wdr_rule->product_adjustments, true);
                            if($product_adjustments['type'] == 'percentage') {
                                $Value_Type = 1;
                                $DiscountRate = $product_adjustments['value'];
                            }
                            elseif($product_adjustments['type'] == 'flat') {
                                $Value_Type = 2;
                                $DiscountAmount = $product_adjustments['value'];
                            }
                            break;

                        case 'wdr_cart_discount':
                            $cart_adjustments = json_decode($wdr_rule->cart_adjustments, true);
                            if($cart_adjustments['type'] == 'percentage') {
                                $Value_Type = 1;
                                $DiscountRate = $cart_adjustments['value'];
                            }
                            break;

                        default:
                            # code...
                            break;
                    }

                }
            }
            //var_dump($order_item_discounts); die();

            //Get Categories
            $product_cats_ids = wc_get_product_term_ids( $product_id, 'product_cat' );
            //var_dump($product_cats_ids); die();

            $Receipt_No_ = $order->get_id();
            $Transaction_No_ = $order->get_id();
            $Item_No_ = get_post_meta($product_id, 'offline_id', true);
            $SerialNo = $serials_used;
            //$Variant_Code = get_post_meta($variation_id, 'attribute_pa_size', true);
            $attr_color = $item->get_meta('pa_color');
            $attr_size = $item->get_meta('pa_size');
            $Variant_Code = $attr_size;

            //$Trans_Date = $order->get_date_paid()->date('Y-m-d H:i:s.v');
            $Trans_Date = $order->get_date_created()->date('Y-m-d H:i:s.v');
            $Quantity = $item_quantity*(-1);


            // if($order_item_discounts && $coupon) {
            // 	$UnitPrice = $order_item_discounts->item_price;
            // 	$TotalPrice = $order_item_discounts->item_price;
            // 	$DiscountRate = $DiscountRate;
            // 	$Disc = $order_item_discounts->item_price - $order_item_discounts->discounted_price;
            // 	$TotalAmt = $order_item_discounts->discounted_price;
            // 	$Offer_Online_ID = $order_item_discounts->rule_id;
            // }
            // else
            if($order_item_discounts) {
                $UnitPrice = $order_item_discounts->item_price;
                //$TotalPrice = $order_item_discounts->item_price * $item_quantity;
                $TotalPrice = $order_item_discounts->item_price;
                $DiscountRate = $DiscountRate;
                $DiscountAmount = 0;
                $Disc = $order_item_discounts->item_price - $order_item_discounts->discounted_price;
                $TotalAmt = $order_item_discounts->discounted_price;
                $Offer_Online_ID = $order_item_discounts->rule_id;
            }
            // elseif($coupon) {
            // 	$UnitPrice = $regular_price;
            // 	$TotalPrice = $item_subtotal;
            // 	$DiscountRate = 0;
            // 	$Disc = 0;
            // 	$TotalAmt = $item_total;
            // 	$Offer_Online_ID = "";
            // }
            else {
                $UnitPrice = $regular_price;
                $TotalPrice = $item_subtotal / $item_quantity;
                $DiscountRate = "";
                $Disc = "";
                $DiscountAmount = "";
                $TotalAmt = $item_total / $item_quantity;
                $Offer_Online_ID = "";
            }

            $Offer_Type = "";


            for($j = 0; $j < $item_quantity; $j++) {
                $LineNo = 10000 * $i;
                $i++;

                $Transaction_Outlet[] = array(
                    "Receipt_No_" => $Receipt_No_,
                    "Transaction_No_" => $Transaction_No_,
                    "LineNo" => $LineNo,
                    "LineNo_Online" => $item_id,
                    "Item_No_" => $Item_No_,
                    "SerialNo" => isset($order_item_serials[$j]) ? $order_item_serials[$j] : "",
                    //"SerialNo" => $order_item_serials,
                    "Variant_Code" => $Variant_Code,
                    "Trans_Date" => $Trans_Date,
                    "Quantity" => -1,
                    "UnitPrice" => $UnitPrice,
                    "TotalPrice" => $TotalPrice,
                    "Value_Type" => $Value_Type, //Lo&#7841;i gi&#7843;m gi&#1073; (0: kh&#1092;ng c&#1091; gi&#7843;m gi&#1073; | 1: percent | 2: flat / fixed_price )
                    "DiscountRate" => $DiscountRate,
                    "DiscountAmount" => $DiscountAmount,
                    "Disc" => $Disc,
                    "TotalAmt" => $TotalAmt,
                    "Member_Card_No_" => $Member_Card_No_,
                    "Offer_Online_ID" => $Offer_Online_ID,
                    "CouponCode" => $CouponCode,
                    "CouponNo" => $CouponNo,
                    "Category_Online_ID" => $product_cats_ids
                );
            }

            // $apikey 	= "KEY_GOES_HERE";

            // // API Callout to URL

            // $url = '##API URL##';

            // $body = array(
            // 	"Project"	=> $projectsku,
            // 	"Name" 		=> $name,
            // 	"Surname"  	=> $surname,
            // 	"Email"		=> $email,
            // 	"KEY"		=> $apikey
            // );

            // $response = wp_remote_post( $url,
            // 	array(
            // 		'headers'   => array('Content-Type' => 'application/json; charset=utf-8'),
            // 		'method'    => 'POST',
            // 		'timeout' => 75,
            // 		'body'		=> json_encode($body),
            // 	)
            // );

            // $vars = json_decode($response['body'],true);

            // // API Response Stored as Post Meta

            // update_post_meta( $order_id, 'meta_message_'.$projectsku, $vars['message'] );
            // update_post_meta( $order_id, 'meta_link_'.$projectsku, $vars['link']);
            // update_post_meta( $order_id, 'did-this-run','yes'); // just there as a checker variable for me
        }
        //die();

        $order_discounts = $wpdb->get_row( $wpdb->prepare( "SELECT oid.*, r.id AS rule_id, r.discount_type AS rule_discount_type, r.cart_adjustments AS rule_cart_adjustments FROM ".$wpdb->prefix."wdr_order_item_discounts oid INNER JOIN ".$wpdb->prefix."wdr_rules r ON oid.rule_id = r.id WHERE oid.item_id = 0 AND oid.order_id = " . $order->get_id() ) );
        //var_dump($order_discounts); die();

        if($order_discounts && $order_discounts->rule_discount_type == 'wdr_cart_discount') { //Ki&#7875;m tra Gi&#7843;m gi&#1073; gi&#7887; h&#1072;ng
            $Offer_Online_ID = $order_discounts->rule_id;
            $order_discounts->rule_cart_adjustments = json_decode($order_discounts->rule_cart_adjustments);
            if($order_discounts->rule_cart_adjustments->type == 'percentage') {
                //$order_discounts->od_discounts = json_decode($order_discounts->od_discounts);
                //var_dump($order_discounts->od_discounts); die();
                $Value_Type = 1;
                $DiscountRate = $order_discounts->rule_cart_adjustments->value;
                //$Disc = str_replace("-", "", $order_discounts->od_discounts->price);
                $UnitPrice = $TotalPrice = $order->get_subtotal();
                $Disc = $UnitPrice*$DiscountRate/100;
                $DiscountAmount = "";
                $TotalAmt = $TotalPrice - $Disc;
            }
            else {
                $Value_Type = 2;
                $DiscountRate = "";
                $Disc = "";

                $UnitPrice = "";
                $TotalPrice = "";
                $DiscountAmount = 0;
                $TotalAmt = "";

                if($order_discounts->rule_cart_adjustments->type == 'flat_in_subtotal') {
                    $Value_Type = 2;
                    $DiscountRate = "";
                    $Disc = "";

                    $UnitPrice = $TotalPrice = $order->get_subtotal();
                    $DiscountAmount = $order_discounts->rule_cart_adjustments->value;
                    $TotalAmt = $UnitPrice - $DiscountAmount;
                }
                elseif($order_discounts->rule_cart_adjustments->type == '000') {

                }
            }

            $LineNo = $i * 10000;
            $_cart_discount = array(
                "Receipt_No_" => $Receipt_No_,
                "Transaction_No_" => $Transaction_No_,
                "LineNo" => $LineNo,
                "LineNo_Online" => "",
                "Item_No_" => "",
                "SerialNo" => "",
                "Variant_Code" => "",
                "Trans_Date" => $Trans_Date,
                "Quantity" => "",
                "UnitPrice" => $UnitPrice,
                "TotalPrice" => $TotalPrice,
                "Value_Type" => $Value_Type, //Lo&#7841;i gi&#7843;m gi&#1073; (0: kh&#1092;ng c&#1091; gi&#7843;m gi&#1073; | 1: percent | 2: flat / fixed_price )
                "DiscountRate" => $DiscountRate,
                "DiscountAmount" => $DiscountAmount,
                "Disc" => $Disc,
                "TotalAmt" => $TotalAmt,
                "Member_Card_No_" => $Member_Card_No_,
                "Offer_Online_ID" => $Offer_Online_ID,
                "CouponCode" => "",
                "CouponNo" => "",
                "Category_Online_ID" => array()
            );
            //var_dump($_cart_discount); die();
            $Transaction_Outlet[] = $_cart_discount;
        }
        fwrite($myfile, json_encode($Transaction_Outlet));
        fwrite($myfile, "\r\n");

        //Call LS API
        _api_call_Transaction_Outlet($Transaction_Outlet);

        fclose($myfile);
    } //end if
}; 
         
// add the action 
add_action( 'woocommerce_order_status_changed', 'custom_woocommerce_order_status_changed', 10, 3 ); 

//$alepay_api = new WC_Alepay_API();

//Remove pagination trails from WooCommerce Breadcrumb
add_filter('woocommerce_get_breadcrumb',function($crumbs,$tthis){
    if(strpos($crumbs[count($crumbs)-1][0],'Page ')===0){
        unset($crumbs[count($crumbs)-1]);
        $args["breadcrumb"][count($crumbs)-1][1]='';
    }
    return $crumbs;
},10,2);

add_filter( 'https_ssl_verify', '__return_false' ); //namdeveloper //t&#7841;m th&#7901;i t&#7855;t &#273;&#7875; l&#7845;y image t&#7915; dafc //gi&#7843;i ph&#1073;p n&#1072;y kh&#1092;ng an to&#1072;n


function custom_woocommerce_catalog_orderby( $options ){
	$options[ 'menu_order' ] 	= 'Default';
	$options[ 'popularity' ] 	= 'Popularity';
	$options[ 'date' ]			= 'Latest';
	$options[ 'price' ] 		= 'Price: low to high';
	$options[ 'price-desc' ] 	= 'Price: high to low';
	return $options;
}
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );

function custom_advanced_woo_discount_rules_percentage_value_on_sale_badge($percentage_value_round, $percentage_value, $_product) {
	return floor($percentage_value);
}
add_filter('advanced_woo_discount_rules_percentage_value_on_sale_badge', 'custom_advanced_woo_discount_rules_percentage_value_on_sale_badge', 11, 3);

function custom_order_by_price_desc_post_clauses( $args ) {
	global $wpdb;
	$args['join'] .= " LEFT JOIN custom_product_meta_lookup ON $wpdb->posts.ID = custom_product_meta_lookup.product_id ";
	$args['orderby'] = ' custom_product_meta_lookup.max_price DESC, custom_product_meta_lookup.product_id DESC ';
	//var_dump($args);
	return $args;
}
function custom_order_by_price_asc_post_clauses( $args ) {
	global $wpdb;
	$args['join'] .= " LEFT JOIN custom_product_meta_lookup ON $wpdb->posts.ID = custom_product_meta_lookup.product_id ";
	$args['orderby'] = ' custom_product_meta_lookup.min_price ASC, custom_product_meta_lookup.product_id DESC ';
	//var_dump($args);
	return $args;
}
function custom_woocommerce_get_catalog_ordering_args ($args, $orderby, $order ) {
	if($orderby == 'price') {
		if($order == 'DESC') {
			add_filter( 'posts_clauses', 'custom_order_by_price_desc_post_clauses' );
		}
		else {
			add_filter( 'posts_clauses', 'custom_order_by_price_asc_post_clauses' );
		}
	}
	return $args;
}
add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args', 99, 3 );


function filter_the_title( $title, $id ) { 
	if(get_post_type($id) == 'product') {
		return '(ID: '.$id.') ' . $title;
	}
	else {
    	return $title;
	}
}; 
//add_filter( 'the_title', 'filter_the_title', 10, 2 ); 


//Force Login Before Checkout
/* Redirect /my-account */
add_action( 'template_redirect', 'custom_wc_force_login_before_checkout' );
function custom_wc_force_login_before_checkout() {
    if ( is_page('checkout') && !is_user_logged_in() ) {
        wp_redirect( '/sign-in?redirect_to=/checkout' );
        exit;
    }
}

add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url($url) {
    return home_url();
}

/*@ Change WordPress Admin Login Logo */
if ( !function_exists('tf_wp_admin_login_logo') ) :

    function tf_wp_admin_login_logo() { ?>
        <style type="text/css">
            body.login div#login h1 a {
                background-image: url('<?php echo flatsome_option('site_logo'); ?>');
                background-size: contain;
                height: 51px;
                width: auto;
            }
        </style>
    <?php }

    add_action( 'login_enqueue_scripts', 'tf_wp_admin_login_logo' );

endif;

include_once('salesadmin/salesadmin-order.php');
//include_once('salesadmin/salesadmin-view-order.php');

include_once('warehouseadmin/warehouseadmin-order.php');

include_once('accountantadmin/accountantadmin-order.php');

//
//function createOrder(){
//    global $wpdb;
//    $id = intval(sanitize_text_field($_POST['order_id']));
//    $wpdb->update( "glam_wc_order_stats",array("status"=>"wc-cancel"), array("order_id"=>$id) );
//}


add_action( "wp_ajax_cancelOrder", "cancelOrder" );
add_action( "wp_ajax_nopriv_cancelOrder", "cancelOrder" );

function cancelOrder(){
    global $wpdb;
    $id = intval(sanitize_text_field($_POST['order_id']));
    $product_id  = $wpdb->get_results("select product_id from glam_wc_order_product_lookup  where order_id = '16513' ");

    $wpdb->update( "glam_wc_order_stats",array("status"=>"wc-cancel"), array("order_id"=>$id) );
    $wpdb->update( "glam_posts",array("post_status"=>"wc-cancel"), array("id"=>$id) );
    return true;
}
//add_action( "wp_ajax_cencalOrder", "cencalOrder" );
//add_action( "wp_ajax_nopriv_cencalOrder", "cencalOrder" );
//
add_action( "wp_ajax_successDeliveryOrder", "successDeliveryOrder" );
add_action( "wp_ajax_nopriv_successDeliveryOrder", "successDeliveryOrder" );
function successDeliveryOrder(){
    global $wpdb;
    $id = intval(sanitize_text_field($_POST['order_id']));
    $wpdb->update( "glam_wc_order_stats",array("status"=>"wc-successDelivery"), array("order_id"=>$id) );
    $wpdb->update( "glam_posts",array("post_status"=>"wc-successDelivery"), array("id"=>$id) );
}

function shipmentOrder(){

    global $wpdb;
    $id = intval(sanitize_text_field($_POST['order_id']));
    custom_woocommerce_order_status_changed($id,"processing","shipment");
    $wpdb->update( "glam_wc_order_stats",array("status"=>"wc-shipment"), array("order_id"=>$id) );
    $wpdb->update( "glam_posts",array("post_status"=>"wc-shipment"), array("id"=>$id) );
}
add_action( "wp_ajax_shimentOrder", "shipmentOrder" );
add_action( "wp_ajax_nopriv_shimentOrder", "shipmentOrder" );


function confirmOrder(){

    global $wpdb;
    $id = intval(sanitize_text_field($_POST['order_id']));
    $wpdb->update( "glam_wc_order_stats",array("status"=>"wc-confirm"), array("order_id"=>$id) );
    $wpdb->update( "glam_posts",array("post_status"=>"wc-confirm"), array("id"=>$id) );
}
add_action( "wp_ajax_confirmOrder", "confirmOrder" );
add_action( "wp_ajax_nopriv_confirmOrder", "confirmOrder" );

function paymentOrder(){

    global $wpdb;
    $id = intval(sanitize_text_field($_POST['order_id']));
    $wpdb->update( "glam_wc_order_stats",array("payment_status"=>'paid'), array("order_id"=>$id) );
    $wpdb->update( "glam_posts",array("post_mime_type"=>"paid"), array("id"=>$id) );
}
add_action( "wp_ajax_paymentOrder", "paymentOrder" );
add_action( "wp_ajax_nopriv_paymentOrder", "paymentOrder" );

function returnOrder(){

    global $wpdb;
    $id = intval(sanitize_text_field($_POST['order_id']));
    $wpdb->update( "glam_wc_order_stats",array("status"=>"wc-return"), array("order_id"=>$id) );
    $wpdb->update( "glam_posts",array("post_status"=>"wc-return"), array("id"=>$id) );
}
add_action( "wp_ajax_returnOrder", "returnOrder" );
add_action( "wp_ajax_nopriv_returnOrder", "returnOrder" );


function viewOrder(){
    global $wpdb;
    $id = intval(sanitize_text_field($_POST['order_id']));
    //$list_order_product  = $wpdb->get_results("select * from glam_wc_order_product_lookup  where order_id = {$id};");
    $order = wc_get_order($id);
    //$list_product = $list_order_product;
    $items = $order->get_items();
    echo '
            <h1 class="modal-title" >Order: #'.$id.'</h1>
            <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Image</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>';
    foreach ( $items as $key ){
        echo '
                <tr>
                    <td>'.$key->get_name().'</td>
                    <td><img style="width: 20%; height:20%;" src="'.$key->img.'"/></td>
                    <td>'.$key->get_product_id().'</td>
                    <td>'.$key->get_variation_id().'</td>
                    <td>'.$key->get_variation_id().'</td>
                </tr>
               ';
    };

    echo ' </tbody>
                </table>';

}

add_action( "wp_ajax_viewOrder", "viewOrder" );
add_action( "wp_ajax_nopriv_viewOrder", "viewOrder" );


//add_filter( 'woocommerce_available_payment_gateways' , 'change_payment_gateway', 20, 1);

///**
// * remove cod gateway if cart total > 100000
// * @param $gateways
// * @return mixed
// */
//function change_payment_gateway( $gateways ){
//    // Compare cart subtotal (without shipment fees)
//    if( WC()->cart->subtotal > 0){
//         // then unset the 'cod' key (cod is the unique id of COD Gateway)
//         unset( $gateways['cod'] );
//    }
//    return $gateways;
//}

//add_action( 'woocommerce_single_product_summary', 'removing_variable_add_to_cart_template', 3 );
//function removing_variable_add_to_cart_template(){
//    global $product;
//
//    // Only for variable products
//    if( $product->is_type( 'variable' ) ){
//        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//    }
//}

?>









