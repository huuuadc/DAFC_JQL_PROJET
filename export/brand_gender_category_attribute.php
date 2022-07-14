<?php //die();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../wp-load.php");

$sql = "select t.term_id, t.name, t.slug, tm.meta_key, tm.meta_value
from ".$wpdb->prefix."term_taxonomy AS tt
left join ".$wpdb->prefix."terms AS t ON tt.term_id = t.term_id
left join ".$wpdb->prefix."termmeta AS tm ON t.term_id = tm.term_id
where tt.taxonomy = 'brand'
order by tm.meta_value";
$brands = $wpdb->get_results($sql);

//var_dump($brands);
?>
<table border="1" style="float:left">
	<caption>Brand</caption>
	<tr>
		<td>name</td>
		<td>id</td>
		<td>offline_id</td>
	</tr>
<?php
foreach($brands as $brand) {
	if($brand->meta_key == 'offline_id' || $brand->meta_key == '') {
		echo "<tr>
			<td>$brand->name</td>
			<td>$brand->term_id</td>
			<td>$brand->meta_value</td>
		</tr>";
	}
}
?>
</table>

<?php
$sql = "select t.term_id, t.name, t.slug, tm.meta_key, tm.meta_value
from ".$wpdb->prefix."term_taxonomy AS tt
left join ".$wpdb->prefix."terms AS t ON tt.term_id = t.term_id
left join ".$wpdb->prefix."termmeta AS tm ON t.term_id = tm.term_id
where tt.taxonomy = 'gender'
order by tm.meta_value";
$brands = $wpdb->get_results($sql);

//var_dump($brands);
?>
<table border="1" style="float:left; margin-left:20px">
	<caption>Gender</caption>
	<tr>
		<td>name</td>
		<td>id</td>
		<td>offline_id</td>
	</tr>
<?php
foreach($brands as $brand) {
	if($brand->meta_key == 'offline_id' || $brand->meta_key == '') {
		echo "<tr>
			<td>$brand->name</td>
			<td>$brand->term_id</td>
			<td>$brand->meta_value</td>
		</tr>";
	}
}
?>
</table>

<?php
$sql = "select t.term_id, t.name, t.slug, tm.meta_key, tm.meta_value
from ".$wpdb->prefix."term_taxonomy AS tt
left join ".$wpdb->prefix."terms AS t ON tt.term_id = t.term_id
left join ".$wpdb->prefix."termmeta AS tm ON t.term_id = tm.term_id
where tt.taxonomy = 'product_cat'
order by tm.term_id";
$brands = $wpdb->get_results($sql);

//var_dump($brands);
?>
<table border="1" style="float:left; margin-left:20px">
	<caption>Category</caption>
	<tr>
		<td>name</td>
		<td>id</td>
		<td>offline_id</td>
	</tr>
<?php
foreach($brands as $brand) {
	if($brand->meta_key == 'offline_id' || $brand->meta_key == '') {
		echo "<tr>
			<td>$brand->name</td>
			<td>$brand->term_id</td>
			<td>$brand->meta_value</td>
		</tr>";
	}
}
?>
</table>
<?php
$sql = "select wat.*, am.meta_key, am.meta_value
from ".$wpdb->prefix."woocommerce_attribute_taxonomies AS wat
left join attributemeta AS am ON wat.attribute_id = am.attribute_id AND am.meta_key = 'offline_id'";
$wats = $wpdb->get_results($sql);
?>

<table border="1" style="float:left; margin-left:20px">
	<caption>Attribute</caption>
	<tr>
		<td>name</td>
		<td>id</td>
		<td>offline_id</td>
	</tr>
<?php
	foreach($wats as $wat) {
	echo "<tr>
			<td>$wat->attribute_name</td>
			<td>$wat->attribute_id</td>
			<td>$wat->meta_value</td>
		</tr>";
	}
?>
</table>

<?php
$sql = "select wat.attribute_id, t.term_id, t.name, t.slug, tm.meta_key, tm.meta_value, tt.taxonomy
from ".$wpdb->prefix."term_taxonomy AS tt
inner join ".$wpdb->prefix."woocommerce_attribute_taxonomies wat ON tt.taxonomy = CONCAT('pa_', wat.attribute_name) 
left join ".$wpdb->prefix."terms AS t ON tt.term_id = t.term_id
left join ".$wpdb->prefix."termmeta AS tm ON t.term_id = tm.term_id
where tt.taxonomy LIKE 'pa_%'
order by wat.attribute_id";
$results = $wpdb->get_results($sql);

//var_dump($results);
?>
<table border="1" style="float:left; margin-left:20px">
	<caption>Attribute Terms</caption>
	<tr>
		<td>attribute id</td>
		<td>option</td>
	</tr>
<?php
foreach($results as $row) {
	echo "<tr>
			<td>$row->attribute_id</td>
			<td>$row->name</td>
		</tr>";
}
?>
</table>