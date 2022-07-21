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
        <ul class="tabs wc-tabs product-tabs small-nav-collapse <?php flatsome_product_tabs_classes(); ?>" role="tablist">
            <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                <li class="product-item <?php echo esc_attr( $key ); ?>_tab <?php if ( $tab_count == 0 ) echo 'active'; ?>" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
                    <a href="#tab-<?php echo esc_attr( $key ); ?>">
                        <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                    </a>
                </li>
                <?php $tab_count++; ?>
            <?php endforeach; ?>
            <li class="product-item storafe_instructions_tab" id="tab-title-storafe_instructions" role="tab" aria-controls="tab-storafe_instructions">
                <a href="#tab-storafe_instructions">
                    <?php  echo __( 'Storafe Instructions', 'glamoutlet' ) ?>
                </a>
            </li>
            <li class="product-item return_policy_tab ?>" id="tab-title-return_policy" role="tab" aria-controls="tab-return_policy">
                <a href="#tab-return_policy">
                    <?php echo  __( 'Return Policy', 'glamoutlet' ) ?>
                </a>
            </li>
        </ul>
        <div class="tab-panels">
            <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content <?php if ( $panel_count == 0 ) echo 'active'; ?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
                    <?php if ( $key == 'description' && ux_builder_is_active() ) echo flatsome_dummy_text(); // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>
                    <?php
                    if ( isset( $product_tab['callback'] ) ) {
                        call_user_func( $product_tab['callback'], $key, $product_tab );
                    }
                    ?>
                </div>
                <?php $panel_count++; ?>
            <?php endforeach; ?>

            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--storafe_instructions panel entry-content" id="tab-storafe_instructions" role="tabpanel" aria-labelledby="tab-title-storafe_instructions">
                <p>
                    Đây là hướng dẫn bảo quản
                </p>
            </div>

            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--return_policy panel entry-content " id="tab-return_policy" role="tabpanel" aria-labelledby="tab-title-return_policy">
                <p>
                    Đây là chính sách đổi trả
                </p>
            </div>

            <?php do_action( 'woocommerce_product_after_tabs' ); ?>
        </div>
    </div>

<?php endif; ?>
