<?php
        function woocommerce_salesadmin_page()
        {
            if(!is_user_logged_in() && $pagenow != 'wp-login.php') {
                wp_redirect( '/sign-in', 302 );
            }
            defined( 'ABSPATH' ) || exit;

            wp_deregister_script( 'jquery' );
            global $wpdb;
            $getdata = $wpdb->get_results(
                "Select os.*, ct.*
                            from glam_wc_order_stats os
                                left join glam_wc_customer_lookup ct
                                    on os.customer_id = ct.customer_id;");
            $customer_orders = $getdata;

?>
<!--                Css And JS Include-->
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <div class="touch-scroll-table">
            <h2 class="customize-sales-admin__title">Sales Admin</h2>
                    <div class="salesadmin-report">
                        <div class="status-card">
                            <div class="status-card__icon">
                                <i class="fas fa-cubes"></i>
                            </div>
                            <div class="status-card__info">
                                <h4>Total Order</h4>
                                <span><?php echo count($customer_orders) ?></span>
                            </div>
                        </div>
                        <div class="status-card">
                            <div class="status-card__icon">
                                <i class="fas fa-coins"></i>
                            </div>
                            <div class="status-card__info">
                                <h4>Total Amount</h4>
                                <span><?php echo number_format(array_sum(array_column($customer_orders, 'total_sales')),0,'.',','); ?> VND</span>
                            </div>
                        </div>
                        <div class="status-card">
                            <div class="status-card__icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="status-card__info">
                                <h4>Total New Order</h4>
                                <span><?php echo  count(array_filter($customer_orders, function ($customer_orders){return $customer_orders->status == 'wc-processing';})) ?></span>
                            </div>
                        </div>
                        <div class="status-card">
                            <div class="status-card__icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="status-card__info">
                                <h4>Total Deliveried Order</h4>
                                <span><?php echo count(array_filter($customer_orders, function ($customer_orders){return $customer_orders->status == 'wc-successDelivery';})) ?></span>
                            </div>
                        </div>
                        <div class="status-card">
                            <div class="status-card__icon">
                                <i class="fas fa-undo"></i>
                            </div>
                            <div class="status-card__info">
                                <h4>Total Return Order</h4>
                                <span><?php echo count(array_filter($customer_orders, function ($customer_orders){return $customer_orders->status == 'wc-return';})) ?></span>
                            </div>
                        </div>
                    </div>
                <div class="status-container">
            <table id="myTable" class="tabledata">
            <thead>
                <tr>
                    <th class=""><span class="nobr">Index</span></th>
                    <th class=""><span class="nobr">Order ID</span></th>
                    <th class=""><span class="nobr">Order Date</span></th>
                    <th class=""><span class="nobr">Customer</span></th>
                    <th class=""><span class="nobr">Num Order</span></th>
                    <th class=""><span class="nobr">Total Sales</span></th>
                    <th class=""><span class="nobr">Payment Status</span></th>
                    <th class=""><span class="nobr">Shipment</span></th>
                    <th class=""><span class="nobr">Status</span></th>
                    <th class="">Actions</th>
                </tr>
            </thead>
            <tbody>

 <?php
            foreach ($customer_orders as $key => $value){
                $classTrash = "";
                $cod ="COD";
                $shipmentSuccess = "Success";
                if ($value->status == 'wc-trash') {
                    $classTrash = "woocommerce-order-trash";
                    $shipmentSuccess = "";
                    $cod ="";

                }

                if ($value->status == "wc-cancel"){
                    $disableBtnCancal = "disabled";
                }else {
                    $disableBtnCancal = "";
                }

                if ($value->status == "wc-successDelivery"){
                    $disableBtnCancal = "disabled";
                    $disableBtn = "disabled";
                    $checkedShipment = "checked";
                } else {
                    $disableBtn = "";
                    $checkedShipment = "";
                }

                $urlOrder = "/my-account/view-order/" .$value->order_id;

              echo '<tr class="'.$classTrash.'">
                                    <td>'. ($key + 1) .' </td>
                                    <td>#'.$value->order_id.' </td>
                                    <td>'.$value->date_created.' </td>
                                    <td>'.$value->first_name.' '.$value->last_name.' </td>
                                    <td style="text-align: center">'.$value->num_items_sold.' </td>
                                    <td>'.number_format($value->total_sales,0,'.',',').' </td>
                                    <td style="text-align: center">'. $value->payment_status.'</td>
                                    <td style="text-align: center"><input type="checkbox" id="myCheck" disabled '.$checkedShipment.' " /></td>
                                    <td style="text-align: center">'.$value->status.' </td> 
                                    <td style="display: flex;">
                                          <button type="button" class="btn btn-danger" value="'.$value->order_id.'" onclick="cancelOrder('.$value->order_id.')" '.$disableBtnCancal.' >Cancel</button>
                                          <button type="button" name="view" class="btn btn-secondary" onclick="viewOrder('.$value->order_id.')"  >View</button>
                                          <button type="button" class="btn btn-primary" onclick="successDeliveryOrder('.$value->order_id.')"  '.$disableBtn.' >Deliveried</button>
                                          <button type="button" class="btn btn-warning" value="'.$value->order_id.'" onclick="returnOrder('.$value->order_id.')" '.$disableBtnCancal.' >Return</button>
                                            
                                    </td>
                                </tr>'  ;
            } ?>

            </tbody>
                <tfoot></tfoot>
                </table>
                </div>
            </div>

<?php
            $dataPoints = array(
                array("label"=> "Core 1", "y"=> 20),
                array("label"=> "Core 2", "y"=> 65),
                array("label"=> "Core 3", "y"=> 11),
                array("label"=> "Core 4", "y"=> 5),
                array("label"=> "Core 5", "y"=> 48),
                array("label"=> "Core 6", "y"=> 8),
                array("label"=> "Core 7", "y"=> 2),
                array("label"=> "Core 8", "y"=> 18)
            );

            ?>

            <div class="status-container">
                <h2>Bi?u ?? B?n H?ng<h2>
                <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
            </div>



            <div class="modal fade" id="viewModalOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>




            <script>

                $(document).ready( function () {
                   $('#myTable').DataTable({
                       scrollX: true,
                       dom: 'Bfrtip',
                       buttons: [
                           'show','copy', 'csv', 'excel', 'pdf', 'print'
                       ]
                   });
                } );

                function cancelOrder($order_id){

                    // alert($order_id);
                    //$("#myTable").load(location.href + " #myTable");
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php');?>',
                        type: 'POST',
                        data:{
                            action: 'cancelOrder',
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
                            console.log(data);
                            //location.reload();
                        },

                    });

                };

                function returnOrder($order_id){

                    // alert($order_id);
                    //$("#myTable").load(location.href + " #myTable");
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php');?>',
                        type: 'POST',
                        data:{
                            action: 'returnOrder',
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

                function successDeliveryOrder($order_id){

                    // alert($order_id);

                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php');?>',
                        type: 'POST',
                        data:{
                            action: 'successDeliveryOrder',
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

                function viewOrder($order_id){
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php');?>',
                        type: 'POST',
                        data:{
                            action: 'viewOrder',
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
                            $.unblockUI()
                            $('#viewModalOrder').modal('show');
                            $('.modal-body').html(data);
                            $('.modal-footer').html( '<button type="button" class="btn btn-secondary" onClick=" " >Cancel</button>');

                        },
                        });
                };


            </script>


            <script>
                window.onload = function () {

                    var chart = new CanvasJS.Chart("chartContainer1", {

                        axisY: {
                            minimum: 0,
                            maximum: 100,
                            suffix: "%"
                        },
                        data: [{
                            type: "column",
                            yValueFormatString: "#,##0.00\"%\"",
                            indexLabel: "{y}",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });

                    function updateChart1() {
                        var color,deltaY, yVal;
                        var dps = chart.options.data[0].dataPoints;
                        for (var i = 0; i < dps.length; i++) {
                            deltaY = (2 + Math.random() * (-2 - 2));
                            yVal =  Math.min(Math.max(deltaY + dps[i].y, 0), 90);
                            color = yVal > 75 ? "#FF2500" : yVal >= 50 ? "#FF6000" : yVal < 50 ? "#41CF35" : null;
                            dps[i] = {label: "Core "+(i+1) , y: yVal, color: color};
                        }
                        chart.options.data[0].dataPoints = dps;
                        chart.render();
                    };
                    updateChart1();

                    setInterval(function () { updateChart1() }, 1000);

                }
            </script>



            <?php
        }

       add_shortcode('woocommerce_salesadmin', 'woocommerce_salesadmin_page');

?>

