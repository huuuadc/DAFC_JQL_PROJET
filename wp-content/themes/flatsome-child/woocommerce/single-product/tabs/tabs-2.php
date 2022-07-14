
<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$tabs_style = get_theme_mod( 'product_display', 'tabs' );

// Get sections instead of tabs if set.
if ( $tabs_style == 'sections' ) {
    wc_get_template_part( 'single-product/tabs/sections' );

    return;
}

// Get accordion instead of tabs if set.
if ( $tabs_style == 'accordian' || $tabs_style == 'accordian-collapsed' ) {
    wc_get_template_part( 'single-product/tabs/accordian' );

    return;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$tab_count   = 0;
$panel_count = 0;

if ( ! empty( $product_tabs ) ) : ?>
    <div class="woocommerce-tabs wc-tabs-wrapper container tabbed-content">
        <div class="navigation" id="mainNav">
            <a class="navigation__link" href="#description">Thông Tin Sản Phẩm</a>
            <a class="navigation__link" href="#reviews">Đánh Giá</a>
            <a class="navigation__link" href="#question">Đặt Câu Hỏi</a>
            <a class="navigation__link" href="#other">Có Thể Bạn Quan Tâm</a>
        </div>
        <div class="page-section hero" id="description">
            <h2>Thông Tin Sản Phẩm</h2>
            <?php
            if(isset($product_tabs['description']['callback'])){
                echo  call_user_func( $product_tabs['description']['callback'], 0, $product_tabs['description'] );
            } else {
                echo "Sản phẩm chưa có thông tin chi tiết...";
            }

            ?>
        </div>
        <div class="page-section" id="reviews">
            <h2>Đánh Giá</h2>
            <?php
            if (isset($product_tabs['reviews']['callback']))  {
                echo  call_user_func( $product_tabs['reviews']['callback'], 0, $product_tabs['reviews'] );
            } else {
                echo "Sản phẩm chưa có thông tin đánh giá...";
            }
            //                 echo  call_user_func( $product_tabs['reviews']['callback'], 0, $product_tabs['reviews'] );
            ?>
        </div>
        <div class="page-section" id="question">
            <h2>Đặt Câu Hỏi</h2>
        </div>
        <div class="page-section" id="other">
            <h2>Có Thể Bạn Quan Tâm</h2>
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            jQuery('a[href*=#]').bind('click', function(e) {
                e.preventDefault(); // prevent hard jump, the default behavior

                var target = jQuery(this).attr("href"); // Set the target as variable

                // perform animated scrolling by getting top-position of target-element and set it as scroll target
                jQuery('html, body').stop().animate({
                    scrollTop: jQuery(target).offset().top
                }, 600, function() {
                    location.hash = target; //attach the hash (#jumptarget) to the pageurl
                });

                return false;
            });
        });

        jQuery(window).scroll(function() {
            var scrollDistance = jQuery(window).scrollTop();
            jQuery('.page-section').each(function(i) {
                if (jQuery(this).position().top <= scrollDistance) {
                    jQuery('.navigation a.active').removeClass('active');
                    jQuery('.navigation a').eq(i).addClass('active');
                }
            });
        }).scroll();

        window.onscroll = function() {scrollMenu()};

        var header = document.getElementById("mainNav");
        var sticky = header.offsetTop;

        function scrollMenu() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }

    </script>

<?php endif; ?>
