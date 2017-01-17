<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
?>
<!--breadcrumb start-->
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                    <h4><?php woocommerce_page_title(); ?></h4>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <?php
                /**
                 * woocommerce_before_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action('woocommerce_before_main_content');
                ?>
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="divide80"></div>
<div class="container">
    <div class="row">        
        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-push-3">
            <?php while (have_posts()) : the_post(); ?>

                <?php wc_get_template_part('content', 'single-product'); ?>

            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-sm-pull-9 shop-sidebar-left">
            <?php
            /**
             * woocommerce_sidebar hook.
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            do_action('woocommerce_sidebar');
            ?>
        </div>
    </div>
</div>
<?php get_footer('shop'); ?>
