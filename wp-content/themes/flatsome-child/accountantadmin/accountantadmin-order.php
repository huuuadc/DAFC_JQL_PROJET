
<?php
function woocommerce_accountantadmin_page()
{
            if(!is_user_logged_in() && $pagenow != 'wp-login.php') {
                wp_redirect( '/sign-in', 302 );
            }
            defined( 'ABSPATH' ) || exit;
//            do_action( 'woocommerce_before_account_orders', $has_orders );
    wp_deregister_script( 'jquery' );
    global $wpdb;
    $getdata = $wpdb->get_results(
        "Select os.*, ct.*
from glam_wc_order_stats os
    left join glam_wc_customer_lookup ct
        on os.customer_id = ct.customer_id where os.status in ('wc-processing', 'wc-shipment','wc-confirm','wc-successDelivery') ;"
    );
    $customer_orders = $getdata;;

    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>

    <div class="touch-scroll-table">
        <h2 class="customize-sales-admin__title">Accountant Admin</h2>
        <table id="myTable" class="">
            <thead>
            <tr>
                <th class=""><span class="nobr">Index</span></th>
                <th class=""><span class="nobr">Order ID</span></th>
                <th class=""><span class="nobr">Order Date</span></th>
                <th class=""><span class="nobr">Customer</span></th>
                <th class=""><span class="nobr">Address</span></th>
                <th class=""><span class="nobr">Net Total</span></th>
                <th class=""><span class="nobr">Total Sales</span></th>
                <th class=""><span class="nobr">Location</span></th>
                <th class=""><span class="nobr">Payment Method</span></th>
                <th class=""><span class="nobr">Payment Status</span></th>
                <th class=""><span class="nobr">Status</span></th>
                <th class="" style="text-align: center;">Actions</th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($customer_orders as $key => $value){

                $btnDisable = "";
                if ($value->payment_status == 'paid') {
                    $btnDisable = "disable";
                }

                $paymentStatus = "unpaid";
                if ($value->payment_status == "paid") {
                    $paymentStatus = "paid";
                }

                $urlOrder = "/my-account/view-order/" .$value->order_id;

                echo '<tr class="">
                                    <td>'.($key + 1).' </td>
                                    <td>#'.$value->order_id.' </td>
                                    <td>'.$value->date_created.' </td>
                                    <td>'.$value->first_name.' '.$value->last_name.' </td>
                                    <td>'.$value->city.' </td>
                                    <td style="text-align: center">'.$value->net_total.' </td>
                                    <td style="text-align: center">$ '.$value->total_sales.' </td>
                                    <td>'.$value->country.' </td>
                                    <td style="text-align: center">COD</td>
                                    <td style="text-align: center">'.$paymentStatus.'</td>
                                    <td style="text-align: center">'.$value->status.' </td>
                                    <td style="display: flex">
                                        <a href="'.$urlOrder.'"><button class="btn btn-secondary">View</button></a>
                                        <button class="btn btn-primary" onclick="paymentOrder('.$value->order_id.')" '.$btnDisable.' >Payment</button>                   
                                    </td>
                                </tr>'  ;
            }

            ?>

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({

            });
        } );

        function paymentOrder($order_id){
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php');?>',
                type: 'POST',
                data:{
                    action: 'paymentOrder',
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
                    location.reload();
                },
            });

        };

        // function showModal () {
        //     jQuery.('#myModal').modal('show');
        // }

        // $('.btn-action').click(function(){
        //    // var url = $(this).data("url");
        //     $('#myModal').modal('show');
        //     // $.ajax({
        //     //     type: "GET",
        //     //     url: url,
        //     //     dataType: 'json',
        //     //     success: function(res) {
        //     //
        //     //         // get the ajax response data
        //     //         var data = res.body;
        //     //         // update modal content
        //     //         $('.modal-body').text(data.someval);
        //     //         // show modal
        //     //
        //     //
        //     //     },
        //     //     error:function(request, status, error) {
        //     //         console.log("ajax call went wrong:" + request.responseText);
        //     //     }
        //     // });
        // });



    </script>

    <?php
}

add_shortcode('woocommerce_accountantadmin', 'woocommerce_accountantadmin_page');

?>

