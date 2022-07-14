<?php

function woocommerce_warehouseadmin_page()
{

    /*B&#7855;t &#273;&#7847;u ki&#7875;m tra n&#7871;u ch&#432;a &#273;&#259;ng nh&#7853;p th� b&#7855;t bu&#7897;c &#273;&#259;ng nh&#7853;p*/
    if(!is_user_logged_in() && $pagenow != 'wp-login.php') {
        wp_redirect( '/sign-in', 302 );
    }
    defined( 'ABSPATH' ) || exit;
    //do_action( 'woocommerce_before_account_orders', $has_orders );
    /*K&#7871;t th�c ki&#7875;m tra n&#7871;u ch&#432;a &#273;&#259;ng nh&#7853;p th� b&#7855;t bu&#7897;c &#273;&#259;ng nh&#7853;p*/

    /*Remove c�c b&#7843;n jquery tr&#432;&#7899;c &#273;�*/
    wp_deregister_script( 'jquery' );

    /*L&#7845;y d&#7919; li&#7879;u &#273;&#7887; v�o table*/

    global $wpdb;
    $getdata = $wpdb->get_results(
        "Select os.*, ct.*
from glam_wc_order_stats os
    left join glam_wc_customer_lookup ct
        on os.customer_id = ct.customer_id where os.status not in ('wc-successDelivery', 'wc-cancel') ;"
    );
    $customer_orders = $getdata;

    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

    <div class="touch-scroll-table">
        <h2 class="customize-sales-admin__title">Store/WH Admin</h2>
        <table id="myTable" class="">
            <thead>
            <tr>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number title_s�ze"><span class="nobr">Index</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number title_s�ze"><span class="nobr">Order ID</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number title_s�ze"><span class="nobr">Order Date</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number title_s�ze"><span class="nobr">Customer</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number title_s�ze"><span class="nobr">Address</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number title_s�ze"><span class="nobr">Num Order</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number title_s�ze"><span class="nobr">Location</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number title_s�ze"><span class="nobr">Payment Status</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status title_s�ze"><span class="nobr">Status</span></th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions title_s�ze">Actions</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($customer_orders as $key => $value){
                $disableReturn = 'disabled';
                if ($value->status == "wc-confirm"){
                    $disableBtnConfirm = "disabled";
                }else {
                    $disableBtnConfirm = "";
                }

                if ($value->status == "wc-shipment"){
                    $disableBtn = "disabled";
                    $disableReturn = '';
                } else {
                    $disableBtn = "";
                }

                $urlOrder = "/my-account/view-order/" .$value->order_id;

                echo '<tr>
                                    <td>'. ($key + 1) .' </td>
                                    <td>#'.$value->order_id.' </td>
                                    <td>#'.$value->date_created.' </td>
                                    <td>'.$value->first_name.' '.$value->last_name.' </td>
                                    <td>'.$value->city.' </td>
                                    <td style="text-align: center">'.$value->num_items_sold.' </td>
                                    <td>'.$value->country.' </td>
                                    <td style="text-align: center">'.$value->payment_status.'</td>
                                    <td style="text-align: center">'.$value->status.' </td>
                                    <td style="display: flex">   
                                        <button type="button" class="btn btn-success" onclick="confirmOrder('.$value->order_id.')"  '.$disableBtnConfirm.' '.$disableBtn.' >Confirm</button>
                                        <a href="'.$urlOrder.'"><button type="button"  class="btn btn-secondary">View</button></a>
                                        <button type="button"  class="btn btn-primary" onclick="shipmentOrder('.$value->order_id.')" '.$disableBtn.' >Shipment</button>
                                       
                                    </td>
                                </tr>
                                    ';
                               }
                           ?>
            </tbody>
        </table>
    </div>

    <div id="loading progressing" style="display: none">Loading</div>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                //scrollY: 1000 Cu&#7897;n b&#7843;ng
            });
        } );

        function confirmOrder($order_id){
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php');?>',
                type: 'POST',
                data:{
                    action: 'confirmOrder',
                    order_id: $order_id,
                },
                beforeSend : function (){
                    $.blockUI(
                        {
                            fadeIn: 1000,
                            message: '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loading.gif"/>',
                        }
                    );
                    //return true;
                },
                success: function( data ){
                    //console.log(data);
                    // alert("Records are successfully update");
                    location.reload();
                },
            });
        }

        function shipmentOrder($order_id){


            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php');?>',
                type: 'POST',
                data:{
                    action: 'shimentOrder',
                    order_id: $order_id,
                },
                beforeSend : function (){
                    $.blockUI(
                        {
                            fadeIn: 1000,
                            timeout:   5000,
                            message: '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loading.gif"/>',
                        }
                    );
                    //return true;
                },
                success: function( data ){
                    //console.log(data);
                    // alert("Records are successfully update");
                    location.reload();
                },
            });
        }
    </script>

    <?php
}

add_shortcode('woocommerce_warehouseadmin', 'woocommerce_warehouseadmin_page');

?>

