<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../wp-load.php");

//$product_id = $_GET['id'];
//update_lastpiece_task($product_id);

$myfile = fopen(__DIR__ . "/logs/update_lastpiece_".date('Y-m-d_H-i-s').".txt", "w") or die("Unable to open file!");
$txt = date('Y-m-d_H-i-s');
fwrite($myfile, $txt);
fclose($myfile);


$ps = $wpdb->get_results ( "SELECT `ID` FROM {$wpdb->prefix}posts WHERE `post_status` = 'publish' AND `post_type` = 'product'" );
foreach ( $ps as $p )
{
    update_lastpiece_task($p->ID);
}

function update_lastpiece_task($product_id) {
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