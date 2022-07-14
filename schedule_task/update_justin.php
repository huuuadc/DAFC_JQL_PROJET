<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../wp-load.php");

//$product_id = $_GET['id'];
//update_lastpiece_task($product_id);

$myfile = fopen(__DIR__ . "/logs/update_justin_".date('Y-m-d_H-i-s').".txt", "w") or die("Unable to open file!");
$txt = date('Y-m-d_H-i-s');
fwrite($myfile, $txt);
fclose($myfile);


$ps = $wpdb->get_results ( "SELECT `ID` FROM {$wpdb->prefix}posts WHERE `post_status` = 'publish' AND `post_type` = 'product'" );
foreach ( $ps as $p )
{
    update_lastpiece_task($p->ID);
}

function update_lastpiece_task($product_id) {
	wp_set_object_terms($product_id, 'just-in', 'product_shop');
}