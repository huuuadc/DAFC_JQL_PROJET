<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

    <form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
        <?php do_action( 'woocommerce_before_variations_form' ); ?>

        <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
            <p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
        <?php else : ?>
            <table class="variations" cellspacing="0">
                <tbody>
                <td class="label" style="padding: 0em 0;"><label><?php echo __( 'Size', 'glamoutlet' ) ?></label></td>
                <?php foreach ( $attributes as $attribute_name => $options ) : ?>
                    <tr>
                        <td class="value">
                            <?php
                            wc_dropdown_variation_attribute_options(
                                array(
                                    'options'   => $options,
                                    'attribute' => $attribute_name,
                                    'product'   => $product,
                                )
                            );
                            echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="single_variation_wrap">
                <?php
                /**
                 * Single variation cart button
                 *
                 * @see https://docs.woocommerce.com/document/template-structure/
                 * @package WooCommerce\Templates
                 * @version 3.4.0
                 */

                defined( 'ABSPATH' ) || exit;

                global $product;
                ?>
                <div class="woocommerce-variation-add-to-cart variations_button">
                    <!--	--><?php //do_action( 'woocommerce_before_add_to_cart_button' ); ?>
                    <?php
                    do_action( 'woocommerce_before_add_to_cart_quantity' );
                    ?>
                    <?php
                    //	woocommerce_quantity_input(
                    //		array(
                    //			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                    //			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                    //			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                    //		)
                    //	);

                    do_action( 'woocommerce_after_add_to_cart_quantity' );
                    ?>
                    <div style="width: 100%; text-decoration: underline; font-style: italic; text-align: right">
                        <button class="btn" ><?php echo __( 'Find Size', 'glamoutlet' ) ?></button>
                    </div>
                    <div class="group-action">
                        <button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
<!--                        <div class="group-action-buyNowAnhWishlist">-->
                            <div class = "group-action-buynow">
                                <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
                            </div>
                            <div class="group-action-space">
                            </div>
                            <div class="group-action-wishlist">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button icon" aria-label="<?php echo __( 'Wishlist', 'glamoutlet' ); ?>">
                                        <?php
                                        $product_id = $product->get_id();
                                        $in_wishlist = false;
                                        if ( function_exists( 'YITH_WCWL' ) ) {
                                            $in_wishlist = YITH_WCWL()->is_product_in_wishlist($product_id);
                                        }
                                        if ($in_wishlist) {
                                            echo '<span class="icomoon-heart-fill"> '. __( 'Added to wishlist', 'glamoutlet' ) .'</span>';
                                        } else {
                                            echo '<span class="icomoon-heart"> '. __( 'Add to wishlist', 'glamoutlet' ) .'</span>';
                                        }
                                        ?>
                                    </button>
                                    <div class="wishlist-popup dark">
                                        <?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
                                    </div>
                                </div>
                            </div>
<!--                        </div>-->

                    </div>

                    <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
                    <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
                    <input type="hidden" name="variation_id" class="variation_id" value="0" />
                </div>

                <div class="modal">
                    <div class="modal-content">
        <span class="close">
        </span>
                        <h4>FEMALE</h4>
                        <img width="100%" height="30%" src="https://www.glamoutlet.com.vn/wp-content/uploads/2021/12/ASH-F-FOOTWEAR.jpg">
                        <h4>MALE</h4>
                        <img width="100%" height="30%" src="https://www.glamoutlet.com.vn/wp-content/uploads/2021/12/ASH-M-FOOTWEAR.jpg">
                    </div>
                </div>

                <script>
                    jQuery(document).ready(function () {
                        var modal = jQuery('.modal');
                        var btn = jQuery('.btn');
                        var span = jQuery('.close');

                        btn.click(function () {
                            modal.show();
                        });

                        span.click(function () {
                            modal.hide();
                        });

                        jQuery(window).on('click', function (e) {
                            if (jQuery(e.target).is('.modal')) {
                                modal.hide();
                            }
                        });
                    });
                </script>
            </div>
        <?php endif; ?>

        <?php do_action( 'woocommerce_after_variations_form' ); ?>
    </form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );
