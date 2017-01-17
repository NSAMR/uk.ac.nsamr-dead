<?php
if (!isset($content_width)) {
    $content_width = 660;
}
define('ASSAN_SKIN_PATH', get_template_directory_uri() . '/');
define('ASSAN_ADMIN_URL', get_template_directory_uri() . '/admin/');

if (!function_exists('crazy_assan_setup')) :

    function crazy_assan_setup() {
        global $themename, $ctassan_data;
        $themename = 'Assan';

        load_theme_textdomain('assan', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        add_theme_support('custom-logo', array(
            'height' => 80,
            'width' => 200,
            'flex-height' => true,
            'flex-width' => true,
            'header-text' => array('site-title', 'site-description'),
        ));

        add_theme_support('custom-background');

        set_post_thumbnail_size(768, 512, true);

        add_image_size('assan-fullwidth', 1140, 512, true);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary_nav' => __('Primary Menu', 'assan'),
            'onepage_nav' => __('OnePage Menu', 'assan')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css'));

        add_theme_support('woocommerce');
    }

endif; // assan_setup
add_action('after_setup_theme', 'crazy_assan_setup');

/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function crazy_assan_widgets_init() {

    $footer_layout = get_assan_theme_options('footer_layout');

    require get_template_directory() . '/lib/widgets.php';
    register_widget('Crazy_Assan_Portfolio_widget');
    register_widget('Crazy_Assan_Social_Widgets');

    register_sidebar(array(
        'name' => __('Primary Sidebar', 'assan'),
        'id' => 'primary-sidebar',
        'description' => __('Main sidebar.', 'assan'),
        'before_widget' => '<div id="%1$s" class="widget sidebar-box margin40 %2$s ">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Sidebar 1', 'assan'),
        'id' => 'sidebar-1',
        'description' => __('Additional sidebar 1.', 'assan'),
        'before_widget' => '<div id="%1$s" class="widget sidebar-box margin40 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Sidebar 2', 'assan'),
        'id' => 'sidebar-2',
        'description' => __('Additional sidebar 2.', 'assan'),
        'before_widget' => '<div id="%1$s" class="widget sidebar-box margin40 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Left Header Top', 'assan'),
        'id' => 'leftpreheader',
        'description' => __('Left Pre Header Sidebar.', 'assan'),
        'before_widget' => '<div id="%1$s" class="top-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="header-top-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Right Header Top', 'assan'),
        'id' => 'rightpreheader',
        'description' => __('Right Pre Header Sidebar..', 'assan'),
        'before_widget' => '<div id="%1$s" class="top-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="header-top-title">',
        'after_title' => '</div>',
    ));
    if (function_exists("is_woocommerce")) {
        register_sidebar(array(
            'name' => __('Shop Sidebar', 'assan'),
            'id' => 'shop-sidebar',
            'description' => __('Sidebar for shop pages', 'assan'),
            'before_widget' => '<div id="%1$s" class="widget sidebar-box margin40 %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => __('Shop Pre Footer', 'assan'),
            'id' => 'shop-prefooter',
            'description' => __('Shop Pre footer sidebar.', 'assan'),
            'before_widget' => '<div id="%1$s" class="widget col-lg-3 col-md-3 col-sm-6 margin40 %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }
    for ($i = 1; $i <= $footer_layout; $i++) {
        register_sidebar(array(
            'name' => 'Footer Widget Area ' . $i,
            'id' => 'footer-' . $i,
            'description' => __('Appears in the footer section of the site.', 'assan'),
            'before_widget' => '<div id="%1$s" class="widget footer-col %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }
}

add_action('widgets_init', 'crazy_assan_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function crazy_assan_scripts() {
    $map_apikey = get_assan_theme_options('map_apikey');
    $map_active = get_assan_theme_options('map_active');
    wp_enqueue_style('bootstrap', ASSAN_SKIN_PATH . 'bootstrap/css/bootstrap.min.css', array(), '3.3.6');

    wp_enqueue_style('font-Source-Sans-Pro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,300italic,400italic,600,700,900');
    //Font Awesome
    wp_enqueue_style('font-awesome', ASSAN_SKIN_PATH . 'font-awesome/css/font-awesome.min.css', array(), '4.6.3');
    //Flexslider
    wp_enqueue_style('flexslider', ASSAN_SKIN_PATH . 'css/flexslider.css');
    //Animate
    wp_enqueue_style('animate', ASSAN_SKIN_PATH . 'css/animate.css');
    //Owl carousel
    wp_enqueue_style('owl.carousel', ASSAN_SKIN_PATH . 'css/owl.carousel.css');
    wp_enqueue_style('owl.theme', ASSAN_SKIN_PATH . 'css/owl.theme.css');
    //magnific-popup
    wp_enqueue_style('magnific-popup', ASSAN_SKIN_PATH . 'css/magnific-popup.css');
    //Main Style
    wp_enqueue_style('assan-main-style', ASSAN_SKIN_PATH . 'css/styles.css');
    // Load our main stylesheet.
    wp_enqueue_style('assan-style', get_stylesheet_uri());

    // WooCommerce
    if (function_exists("is_woocommerce")) {
        wp_enqueue_style('assan-shop-style', ASSAN_SKIN_PATH . 'css/shop-style.css');
    }

    //SCRIPT
    wp_enqueue_script('jquery');
    wp_enqueue_script('masonry');
    wp_enqueue_script('bootstrap.min', ASSAN_SKIN_PATH . 'bootstrap/js/bootstrap.min.js', '', '', TRUE);
    wp_enqueue_script('jquery-easing', ASSAN_SKIN_PATH . 'js/jquery.easing.1.3.min.js', '', '', TRUE);
    wp_enqueue_script('jquery.sticky', ASSAN_SKIN_PATH . 'js/jquery.sticky.js', '', '', TRUE);
    wp_enqueue_script('flexslider.min', ASSAN_SKIN_PATH . 'js/jquery.flexslider-min.js', '', '', TRUE);
    wp_enqueue_script('owl.carousel.min', ASSAN_SKIN_PATH . 'js/owl.carousel.min.js', '', '', TRUE);
    wp_enqueue_script('isotope.min', ASSAN_SKIN_PATH . 'js/jquery.isotope.min.js', '', '', TRUE);
    wp_enqueue_script('waypoints.min', ASSAN_SKIN_PATH . 'js/waypoints.min.js', '', '', TRUE);
    wp_enqueue_script('jquery.countdown', ASSAN_SKIN_PATH . 'js/jquery.countdown.min.js', '', '', TRUE);
    wp_enqueue_script('jquery.counterup.min', ASSAN_SKIN_PATH . 'js/jquery.counterup.min.js', '', '', TRUE);
    wp_enqueue_script('jquery.stellar.min', ASSAN_SKIN_PATH . 'js/jquery.stellar.min.js', '', '', TRUE);
    wp_enqueue_script('jquery-magnific-popup', ASSAN_SKIN_PATH . 'js/jquery.magnific-popup.min.js', '', '', TRUE);
    wp_enqueue_script('bootstrap-hover-dropdown.min', ASSAN_SKIN_PATH . 'js/bootstrap-hover-dropdown.min.js', '', '', TRUE);
    wp_enqueue_script('wow.min', ASSAN_SKIN_PATH . 'js/wow.min.js', '', '', TRUE);
    wp_enqueue_script('assan-custom-script', ASSAN_SKIN_PATH . 'js/scripts.js', array('jquery', 'masonry'), '', TRUE);

    if ($map_active) {
        wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=' . $map_apikey , array('jquery'), '3');
    }
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'crazy_assan_scripts');

function crazy_assan_customizer_live_preview() {
    wp_enqueue_script('assan-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array('jquery', 'customize-preview'), '', true);
}

add_action('customize_preview_init', 'crazy_assan_customizer_live_preview');

function crazy_assan_body_classes($classes) {
    $layout = get_assan_theme_options('layout');
    if ($layout == 'BOXED') {
        $classes[] = 'narrow-box';
    }
    return $classes;
}

add_filter('body_class', 'crazy_assan_body_classes');

if (!function_exists('crazy_assan_custom_logo')) {

    function crazy_assan_custom_logo() {
        $output = '';
        if (function_exists('get_custom_logo')):
            if (has_custom_logo()) {
                $image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
                $output = '<img src="' . $image[0] . '" class="img-resposive"/>';
            } else {
                $output = get_bloginfo('name');
            }
        endif;
        // Nothing in the output: Custom Logo is not supported, or there is no selected logo
        // In both cases we display the site's name
        if (empty($output)) {
            $output = get_bloginfo('name');
        }
        echo $output;
    }

}

function get_assan_theme_options($option) {
    $default = crazy_assan_theme_default_option($option);
    $assan_theme_option = get_theme_mod('assan_theme_' . $option, $default);
    return $assan_theme_option;
}

function crazy_assan_theme_default_option($option) {
    $default_option = array('header_top' => 'YES', 'header_layout' => 'h_default', 'primary_color' => '#32c5d2', 'layout' => 'FULLWIDTH', 'portfolio_filter' => 'YES', 'portfolio_per_page' => '10', 'header_js' => '', 'map_active' => '1', 'map_apikey' => '', 'map_type' => 'ROADMAP', 'map_longitude' => '-119.7106559', 'map_latitude' => '36.8764832', 'map_scrollwheel' => 'false', 'map_draggable' => 'false', 'map_zoom' => '8',
        'map_height' => '350', 'map_marker' => '', 'csoon_hero' => '', 'csoon_date' => '2036/08/24', 'csoon_facebook' => '', 'csoon_twitter' => '', 'csoon_google_plus' => '', 'csoon_linkedin' => '', 'footer_skin' => 'default', 'footer_layout' => '4', 'copyright_text' => '2016.all right reserved. Designed by Crazy-themes', 'footer_js' => '', 'custom_css' => '');
    return $default_option[$option];
}

if (!function_exists('crazy_assan_post_thumbnail')) :

    function crazy_assan_post_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }
        if (is_singular()) :
            ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('assan-fullwidth', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
            </div>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>">
                <div class="item-img-wrap">
                    <?php the_post_thumbnail('post-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                    <div class="item-img-overlay">
                        <span></span>
                    </div>
                </div>                       
            </a>
        <?php
        endif; // End is_singular()
    }

endif;

//FILES
require get_template_directory() . '/lib/function.php';
require get_template_directory() . '/lib/customizer.php';

// WooCommerce
if (function_exists("is_woocommerce")) {
    require_once ( get_template_directory() . '/woocommerce/woo-config.php' );    //woocommerce shop plugin    
}