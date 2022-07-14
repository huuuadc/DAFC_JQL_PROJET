<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../wp-load.php");

$myfile = fopen(__DIR__ . "/logs/update_custom_product_lookup_".date('Y-m-d_H-i-s').".txt", "w") or die("Unable to open file!");
$txt = date('Y-m-d H:i:s');
fwrite($myfile, $txt);
fclose($myfile);

use Wdr\App\Helpers\Woocommerce;
use Wdr\App\Controllers\ManageDiscount;

// $variation = Woocommerce::getProduct(2393); //2393 //3676
// $prices = ManageDiscount::calculateInitialAndDiscountedPrice($variation, 1);
// var_dump($prices);

custom_wc_update_product_lookup_tables();

function custom_wc_update_product_lookup_tables() {
	global $wpdb;

	// $is_cli = Constants::is_true( 'WP_CLI' );

	// if ( ! $is_cli ) {
	// 	WC_Admin_Notices::add_notice( 'custom_regenerating_lookup_table' );
	// }
    $is_cli = true;

	// Note that the table is not yet generated.
	update_option( 'custom_product_lookup_table_is_generating', true );

	// Make a row per product in lookup table.
	$wpdb->query(
		"
		INSERT IGNORE INTO custom_product_meta_lookup (`product_id`)
		SELECT
			posts.ID
		FROM {$wpdb->prefix}posts posts
		WHERE
			posts.post_type IN ('product', 'product_variation')
		"
	);

    $ps = $wpdb->get_results ( "SELECT * FROM custom_product_meta_lookup" );
    foreach ( $ps as $p )
    {
        $product = Woocommerce::getProduct($p->product_id);
        $prices = ManageDiscount::calculateInitialAndDiscountedPrice($product, 1);
        // echo $p->product_id;
        // echo ' - ';
        // echo $prices['initial_price']; 
        // echo ' - ';
        // echo $prices['discounted_price']; 
        // echo '<br/>';

        $discounted_price = isset($prices['discounted_price']) ? $prices['discounted_price'] : $product->price;
        update_post_meta($p->product_id, '_discounted_price', $discounted_price);
    }

    // List of column names in the lookup table we need to populate.
	$columns = array(
		'min_max_price',
		'sku'
	);

	foreach ( $columns as $index => $column ) {
		if ( $is_cli ) {
			custom_update_product_lookup_tables_column( $column );
		} else {
			WC()->queue()->schedule_single(
				time() + $index,
				'custom_update_product_lookup_tables_column',
				array(
					'column' => $column,
				),
				'wc_update_product_lookup_tables'
			);
		}
	}
    
}

function custom_update_product_lookup_tables_column( $column ) {
	if ( empty( $column ) ) {
		return;
	}
	global $wpdb;
	switch ( $column ) {
		case 'min_max_price':
			$wpdb->query(
				"
				UPDATE
                    custom_product_meta_lookup lookup_table
					INNER JOIN (
						SELECT lookup_table.product_id, MIN( meta_value+0 ) as min_price, MAX( meta_value+0 ) as max_price
						FROM custom_product_meta_lookup lookup_table
						LEFT JOIN {$wpdb->prefix}postmeta meta1 ON lookup_table.product_id = meta1.post_id AND meta1.meta_key = '_discounted_price'
						WHERE
							meta1.meta_value <> ''
						GROUP BY lookup_table.product_id
					) as source on source.product_id = lookup_table.product_id
				SET
					lookup_table.min_price = source.min_price,
					lookup_table.max_price = source.max_price
				"
			);
			break;
		case 'sku':
            $meta_key = '_' . $column;
			$column = esc_sql( $column );
			// phpcs:disable WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			$wpdb->query(
				$wpdb->prepare(
					"
					UPDATE
                        custom_product_meta_lookup lookup_table
						LEFT JOIN {$wpdb->prefix}postmeta meta ON lookup_table.product_id = meta.post_id AND meta.meta_key = %s
					SET
						lookup_table.`{$column}` = meta.meta_value
					",
					$meta_key
				)
			);
			// phpcs:enable WordPress.DB.PreparedSQL.InterpolatedNotPrepared
			break;
	}

	// Final column - mark complete.
	if ( 'sku' === $column ) {
		delete_option( 'custom_product_lookup_table_is_generating' );
	}
}