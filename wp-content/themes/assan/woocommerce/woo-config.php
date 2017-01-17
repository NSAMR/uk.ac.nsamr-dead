<?php

function crazy_assan_woocommerce_image_dimensions() {
    global $pagenow;

    if (!isset($_GET['activated']) || $pagenow != 'themes.php') {
        return;
    }
    $catalog = array(
        'width' => '200', // px
        'height' => '300', // px
        'crop' => 1   // true
    );
    $single = array(
        'width' => '500', // px
        'height' => '700', // px
        'crop' => 1   // true
    );
    $thumbnail = array(
        'width' => '120', // px
        'height' => '180', // px
        'crop' => 1   // true
    );
// Image sizes
    update_option('shop_catalog_image_size', $catalog);   // Product category thumbs
    update_option('shop_single_image_size', $single);   // Single product image
    update_option('shop_thumbnail_image_size', $thumbnail);  // Image gallery thumbs
}

add_action('after_switch_theme', 'crazy_assan_woocommerce_image_dimensions', 1);
//outputs divs for the content
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper', 10);
// Add and reorder woocommerce_before_shop_loop 
remove_action('woocommerce_before_shop_loop', 'woocommerce_show_messages', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

//add_action( 'woocommerce_before_shop_loop', 'woocommerce_show_messages', 10 );
add_action('woocommerce_before_shop_loop', 'wc_print_notices', 10);
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20);
add_action('woocommerce_before_shop_loop', 'crazy_assan_product_toggle', 30); // Product List Toggle
add_action('woocommerce_before_shop_loop', 'woocommerce_pagination', 40); // add pagination above products
add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 50);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);

// Add and reorder woocommerce_after_shop_loop
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
add_action('woocommerce_after_shop_loop', 'crazy_assan_product_toggle', 20); // Product List Toggle
add_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 30); // add pagination above products
add_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 40);

// Remove "Sale" icon from product single page
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

//cross_sell products on cartpage
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action('woocommerce_cart_cross_sell', 'woocommerce_cart_cross_sell_callback', 10);

//Add content after Price loop
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 20);



if (!function_exists('woocommerce_cart_cross_sell_callback')) {

    function woocommerce_cart_cross_sell_callback() {
        woocommerce_cross_sell_display(8, 4); // Display 8 products in rows of 2
    }

}
if (!function_exists('crazy_assan_product_toggle')) {

    function crazy_assan_product_toggle() {
        ?>
        <div class="layout-switcher clearfix">
            <div class="toggleGrid"><i class="fa fa-th fa-2x"></i></div>
            <div class="toggleList"><i class="fa fa-th-list fa-2x"></i></div>
        </div>
        <?php
    }

}
add_filter('wp_nav_menu_items', 'crazy_assan_header_mini_cart_function', 10, 2);

function crazy_assan_header_mini_cart_function($menu, $args) {
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && ($args->menu == 'primary_nav')) {
        $menu.='<li><a class="cart-contents" href="' . WC()->cart->get_cart_url() . '"><i class="fa fa-shopping-cart"></i> (' . WC()->cart->cart_contents_count . ')</a></li>';
    }
    return $menu;
}

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i> (<?php echo WC()->cart->cart_contents_count; ?>)</a> 
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}
