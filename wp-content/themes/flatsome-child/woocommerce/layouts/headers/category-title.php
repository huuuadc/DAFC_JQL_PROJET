<?php if(is_tax( 'brand' )) : ?>
<div class="header-height-150"></div>
<div class="shop-page-title brand-page-title page-title <?php flatsome_header_title_classes() ?>">
    <div class="row">
        <?php  $image = get_field('brand_image', $wp_query->get_queried_object()); ?>
        <?php if( !empty( $image ) ): ?>
            <div class="col medium-12 small-12 large-5">
                <div class="col-inner">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="95%" height="95%" />
                </div>
            </div>
        <?php endif; ?>
        <?php if( !empty( $image ) ): ?>
            <div class="col medium-12 small-12 large-7">
        <?php else : ?>
            <div class="col medium-12 small-12 large-12">
        <?php endif; ?>
                <div class="col-inner">
                    <h1><?php  echo $wp_query->get_queried_object()->name; ?></h1>
                    <?php echo do_action( 'woocommerce_archive_description' ); ?>
                </div>
            </div>
    </div>
</div>
<?php endif; ?>


<?php if(is_tax( 'gender' ) || is_tax( 'product_cat' )) : ?>
    <div class="header-height-150"></div>
    <div class="shop-page-title category-page-title page-title <?php flatsome_header_title_classes() ?>">

        <div class="page-title-inner flex-row container medium-flex-wrap flex-has-center">
            <div class="flex-col">
                &nbsp;
            </div>
            <div class="flex-col flex-center text-center">
                <?php do_action('flatsome_category_title') ;?>
            </div>
            <div class="flex-col flex-right text-right medium-text-center form-flat">
                &nbsp;
            </div>
        </div>
        
        <?php $category_description = category_description();
        if($category_description != '') : ?>
            <div class="container">
                <div class="category-description"><?php echo category_description(); ?></div>
                </div>
        <?php endif; ?>
</div>
<?php endif; ?>

<?php if( is_shop() ) : ?>
    <?php 
        $paths = explode('/', $wp->request);
        if(isset($paths[0]) && $paths[0] == 'brand') :

            $brand = get_term_by('slug', $paths[1], 'brand');
    ?>
    <div class="header-height-150"></div>
    <div class="shop-page-title brand-page-title page-title">
        <div class="row">
            <?php  $image = get_field('brand_image', $brand);  ?>
            <?php if( !empty( $image ) ): ?>
                <div class="col medium-12 small-12 large-5">
                    <div class="col-inner">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="95%" height="95%" />
                    </div>
                </div>
            <?php endif; ?>
            <?php if( !empty( $image ) ): ?>
                <div class="col medium-12 small-12 large-7">
            <?php else : ?>
                <div class="col medium-12 small-12 large-12">
            <?php endif; ?>
                    <div class="col-inner">
                        <h1><?php  echo $brand->name; ?></h1>
                        <div class="term-description"><p><?php echo $brand->description; ?></p></div>
                    </div>
                </div>
        </div>
    </div>
    <?php else: ?>
    <div class="header-height-150"></div>
    <div class="shop-page-title category-page-title page-title">

        <div class="page-title-inner flex-row container medium-flex-wrap flex-has-center">
            <div class="flex-col">
                &nbsp;
            </div>
            <div class="flex-col flex-center text-center">
                <?php
                    $breadcrumb = array();
                    if(isset($paths[0]) && $paths[0] != '') {
                        array_push($breadcrumb, array(
                            'Home',
                            '/'
                        ));
                        switch ($paths[0]) {
                            case 'category':
                                if(isset($paths[1])) {
                                    $product_category = get_term_by('slug', $paths[1], 'product_cat');
                                    array_push($breadcrumb, array(
                                        $product_category->name,
                                        '/category/' . $paths[1]
                                    ));
                                    if(isset($paths[2])) {
                                        $product_category = get_term_by('slug', $paths[2], 'product_cat');
                                        array_push($breadcrumb, array(
                                            $product_category->name,
                                            '/category/' . $paths[1] . '/' . $paths[2]
                                        ));
                                    }
                                }
                                break;

                            case 'gender':
                                if(isset($paths[1])) {
                                    $product_category = get_term_by('slug', $paths[1], 'gender');
                                    array_push($breadcrumb, array(
                                        $product_category->name,
                                        '/gender/' . $paths[1]
                                    ));
                                }
                                break;
                            
                            default:
                                # code...
                                break;
                        }
                    }
                ?>
                <?php //do_action('flatsome_category_title') ;?>
                <nav class="woocommerce-breadcrumb breadcrumbs uppercase">
                    <?php
                    foreach ( $breadcrumb as $key => $crumb ) {

                        if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
                            echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
                        } else if(!is_product() && !flatsome_option('wc_category_page_title')) {
                            echo '<span class="last">';
                            echo esc_html( $crumb[0] );
                            echo '</span>';
                        }

                        // Category pages
                        if ( sizeof( $breadcrumb ) !== $key + 1 ) {
                            echo ' <span class="divider">/</span> ';
                        }

                    }
                    ?>
                </nav>
            </div>
            <div class="flex-col flex-right text-right medium-text-center form-flat">
                &nbsp;
            </div>
        </div>
        <?php if(isset($product_category) && $product_category->description != '') : ?>
            <div class="container">
                <div class="category-description"><p><?php echo $product_category->description; ?></p></div>
                </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
