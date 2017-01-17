<?php

function crazy_assan_customize_register($wp_customize) {

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    $wp_customize->get_setting('background_color')->transport = 'postMessage';

    /*     * TOP HEADER** */
    $wp_customize->add_setting('assan_theme_header_top', array(
        'default' => 'YES',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_header_top', array(
        'label' => __('Top Header', 'assan'),
        'section' => 'title_tagline',
        'priority' => 1,
        'type' => 'select',
        'choices' => array(
            'YES' => 'Yes',
            'NO' => 'No'
        ),
    ));

    /*     * HEADER LAYOUT** */
    $wp_customize->add_setting('assan_theme_header_layout', array(
        'default' => 'h_default',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_header_layout', array(
        'label' => __('Header Layout', 'assan'),
        'section' => 'title_tagline',
        'priority' => 2,
        'type' => 'select',
        'choices' => array(
            'h_default' => 'Default',
            'h_dark' => 'Header Dark',
            'h_center' => 'Center logo'
        ),
    ));

    // Add page color setting and control.
    $wp_customize->add_setting('assan_theme_primary_color', array(
        'default' => '#32c5d2',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'assan_theme_primary_color', array(
        'label' => __('Primary Color', 'assan'),
        'section' => 'colors',
    )));


    /*     * Theme Layout** */
    $wp_customize->add_section('assan_theme_general_settings', array(
        'title' => __('General Settings', 'assan'),
        'description' => '',
        'priority' => 140,
    ));

    $wp_customize->add_setting('assan_theme_layout', array(
        'default' => 'FULLWIDTH',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_layout', array(
        'label' => __('Theme Layout', 'assan'),
        'section' => 'assan_theme_general_settings',
        'type' => 'select',
        'choices' => array(
            'FULLWIDTH' => 'FullWidth',
            'BOXED' => 'Boxed'
        ),
    ));

    $wp_customize->add_setting('assan_theme_portfolio_filter', array(
        'default' => 'YES',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_portfolio_filter', array(
        'label' => __('Portfolio Filter', 'assan'),
        'section' => 'assan_theme_general_settings',
        'type' => 'select',
        'choices' => array(
            'YES' => 'Yes',
            'NO' => 'No'
        ),
    ));

    $wp_customize->add_setting('assan_theme_portfolio_per_page', array(
        'default' => '10',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_portfolio_per_page', array(
        'label' => __('Portfolio Show at Most', 'assan'),
        'section' => 'assan_theme_general_settings',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1
        ),
    ));

    $wp_customize->add_setting('assan_theme_header_js', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));

    $wp_customize->add_control('assan_theme_header_js', array(
        'label' => __('Header Script', 'assan'),
        'section' => 'assan_theme_general_settings',
        'type' => 'textarea',
    ));

    /*     * ***Google Map:** */
    $wp_customize->add_section('assan_theme_map', array(
        'title' => __('Google Map', 'assan'),
        'description' => '',
        'priority' => 180,
    ));
    $wp_customize->add_setting('assan_theme_map_active', array(
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_active', array(
        'label' => __('Active Map', 'assan'),
        'section' => 'assan_theme_map',
        'type' => 'checkbox',
    ));
    /* API KEY */
    $wp_customize->add_setting('assan_theme_map_apikey', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_apikey', array(
        'label' => __('API Key', 'assan'),
        'section' => 'assan_theme_map',
    ));

    $wp_customize->add_setting('assan_theme_map_type', array(
        'default' => 'ROADMAP',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_type', array(
        'label' => __('Type', 'assan'),
        'section' => 'assan_theme_map',
        'type' => 'select',
        'choices' => array(
            'ROADMAP' => 'Roadmap',
            'SATELLITE' => 'Satellite',
            'HYBRID' => 'Hybrid',
            'TERRAIN' => 'Terrain'
        )
    ));

    /* longitude */
    $wp_customize->add_setting('assan_theme_map_longitude', array(
        'default' => '-119.7106559',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_longitude', array(
        'label' => __('Longitude', 'assan'),
        'section' => 'assan_theme_map',
    ));
    /* latitude */
    $wp_customize->add_setting('assan_theme_map_latitude', array(
        'default' => '36.8764832',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_latitude', array(
        'label' => __('Latitude', 'assan'),
        'section' => 'assan_theme_map',
    ));
    /* scrollwheel */
    $wp_customize->add_setting('assan_theme_map_scrollwheel', array(
        'default' => 'false',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_scrollwheel', array(
        'label' => __('Scroll Wheel', 'assan'),
        'section' => 'assan_theme_map',
        'type' => 'select',
        'choices' => array(
            'true' => 'Yes',
            'false' => 'No'
        ),
    ));
    /* draggable */
    $wp_customize->add_setting('assan_theme_map_draggable', array(
        'default' => 'false',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_draggable', array(
        'label' => __('Draggable', 'assan'),
        'section' => 'assan_theme_map',
        'type' => 'select',
        'choices' => array(
            'true' => 'Yes',
            'false' => 'No'
        )
    ));
    /* ZOOM */

    $wp_customize->add_setting('assan_theme_map_zoom', array(
        'default' => '8',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_zoom', array(
        'label' => __('Zoom', 'assan'),
        'section' => 'assan_theme_map',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1
        ),
    ));
    /* Height */
    $wp_customize->add_setting('assan_theme_map_height', array(
        'default' => '350',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_height', array(
        'label' => __('Height', 'assan'),
        'section' => 'assan_theme_map',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1
        )
    ));

    $wp_customize->add_setting('assan_theme_map_marker', array(
        'default' => 'Crazy-themes',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_map_marker', array(
        'label' => __('Marker Text', 'assan'),
        'section' => 'assan_theme_map',
        'type' => 'textarea',
    ));

    /*     * *COMMING SOON** */
    $wp_customize->add_section('assan_theme_csoon', array(
        'title' => __('Coming Soon', 'assan'),
        'description' => '',
        'priority' => 200,
    ));

    $wp_customize->add_setting('assan_theme_csoon_hero', array(
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'assan_theme_csoon_hero', array(
        'label' => __('Hero Image', 'assan'),
        'section' => 'assan_theme_csoon',
    )));

    $wp_customize->add_setting('assan_theme_csoon_date', array(
        'default' => '2036/08/24',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_csoon_date', array(
        'label' => __('Launch Date', 'assan'),
        'section' => 'assan_theme_csoon',
        'description' => 'Please enter date in format YYYY/MM/DD',
    ));

    $wp_customize->add_setting('assan_theme_csoon_facebook', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_csoon_facebook', array(
        'label' => __('Facebook', 'assan'),
        'section' => 'assan_theme_csoon',
    ));

    $wp_customize->add_setting('assan_theme_csoon_twitter', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_csoon_twitter', array(
        'label' => __('Twitter', 'assan'),
        'section' => 'assan_theme_csoon',
    ));

    $wp_customize->add_setting('assan_theme_csoon_google_plus', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_csoon_google_plus', array(
        'label' => __('Google Plus', 'assan'),
        'section' => 'assan_theme_csoon',
    ));

    $wp_customize->add_setting('assan_theme_csoon_linkedin', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_csoon_linkedin', array(
        'label' => __('Linkedin', 'assan'),
        'section' => 'assan_theme_csoon',
    ));


    /*     * *FOOTER** */
    $wp_customize->add_section('assan_theme_footer', array(
        'title' => __('Footer', 'assan'),
        'description' => '',
        'priority' => 220,
    ));
    $wp_customize->add_setting('assan_theme_footer_skin', array(
        'default' => 'default',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_footer_skin', array(
        'label' => __('Footer Skin', 'assan'),
        'section' => 'assan_theme_footer',
        'type' => 'select',
        'choices' => array(
            'default' => 'Default',
            'light' => 'Light'
        ),
    ));

    $wp_customize->add_setting('assan_theme_footer_layout', array(
        'default' => '4',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));
    $wp_customize->add_control('assan_theme_footer_layout', array(
        'label' => __('Footer Layout', 'assan'),
        'section' => 'assan_theme_footer',
        'type' => 'select',
        'choices' => array(
            '1' => '1 column',
            '2' => '2 column',
            '3' => '3 column',
            '4' => '4 column'
        ),
    ));

    $wp_customize->add_setting('assan_theme_copyright_text', array(
        'default' => '2016.all right reserved. Designed by Crazy-themes',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));

    $wp_customize->add_control('assan_theme_copyright_text', array(
        'label' => __('Copyright Text', 'assan'),
        'section' => 'assan_theme_footer',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('assan_theme_footer_js', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));

    $wp_customize->add_control('assan_theme_footer_js', array(
        'label' => __('Footer Script', 'assan'),
        'section' => 'assan_theme_footer',
        'type' => 'textarea',
    ));

    /*     * **CUSTOM JS/CSS**** */

    $wp_customize->add_section('assan_theme_custom_design', array(
        'title' => __('Custom CSS', 'assan'),
        'description' => '',
        'priority' => 240,
    ));
    $wp_customize->add_setting('assan_theme_custom_css', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'crazy_assan_sanitize_customize_data'
    ));

    $wp_customize->add_control('assan_theme_custom_css', array(
        'label' => __('CSS', 'assan'),
        'section' => 'assan_theme_custom_design',
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'crazy_assan_customize_register');

add_action('wp_enqueue_scripts', 'crazy_assan_main_text_color_css', 11);

function crazy_assan_main_text_color_css() {

    $main_text_color = get_assan_theme_options('primary_color');
    $custom_css = get_assan_theme_options('custom_css');
    /* color */
    $css = 'a:hover,a:focus,
        .colored-text,
        .navbar-default .navbar-nav>.current-menu-item>a,
        .navbar-default .navbar-nav>.current-menu-parent>a,
        .navbar-default .navbar-nav>.current-menu-item>a:hover,
        .navbar-default .navbar-nav>.current-menu-item>a:focus,
        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus,
        .navbar-default .navbar-nav > li > a:hover,
        .top-bar-light .top-dark-right li a:hover,
        .nav.mega-vertical-nav li a:hover ,
        .mega-contact i ,
        .navbar-inverse .navbar-nav>.current-menu-item>a,
        .navbar-inverse .navbar-nav>.current-menu-parent>a,
        .navbar-inverse .navbar-nav>.current-menu-item>a:hover,
        .navbar-inverse .navbar-nav>.current-menu-item>a:focus,
        .navbar-inverse .navbar-nav > .open > a,
        .navbar-inverse .navbar-nav > .open > a:hover,
        .navbar-inverse .navbar-nav > .open > a:focus,
        .navbar-inverse .navbar-nav > li > a:hover,
        .footer-col a:hover,.footer-col .popular-desc h5 a:hover,
        .contact a:hover ,
        #footer-option .contact a:hover ,
        .tweet ul li:before,
        .tweet li a:hover,
        .footer-light-1 .footer-col a:hover,
        .footer-light-1 footer-col .popular-desc h5 a:hover,
        .footer-light-1 .info li i,
        .typed-cursor,
        .typed-text .element ,
        .service-box i ,
        .special-feature i ,
        .service-ico i,
        .service-text a,
        .timeline > li > .timeline-badge i:hover ,
        .testimonials h4 i,
        .testimonials p ,
        .testi-slide i,
        .panel-title i ,
        .facts-in h3 i,
        .highlight-list li i,
        .pricing-simple ul li i,
        .me-hobbies h4 i,
        .services-me li i ,
        p.dropcap:first-letter,
        .sidebar-box li a:hover ,
        .popular-desc h5 a:hover,
        .panel-group .panel-heading a,
        .panel-ico:after,
        .panel-ico.collapsed,        
        .latest-tweets .tweet li a,
        .side-nav li a.active ,
        .results-box h3 a,
        .link-ul li a:hover,
        .results-sidebar-box ul li a:hover,
        .dropdown-login-box h4 em,
        .dropdown-login-box p a,
        .dropdown-login-box p a:hover,
        .dark-header.navbar .dropdown-menu li a:hover,
        .intro-text-1 h4 strong,
        .work-wrap .img-overlay .inner-overlay h2,
        .img-icon-overlay p a:hover ,
        .cube-masonry .cbp-l-filters-alignCenter .cbp-filter-item.cbp-filter-item-active,
        .cube-masonry .cbp-l-filters-alignCenter .cbp-filter-item:hover,
        .new-label,
        ul.list-icon li:before,
        .pagination>li>a:focus,
        .pagination>li>a:hover,
        .pagination>li>span:focus,
        .pagination>li>span:hover,
        .btn-link, .btn-link:active, .btn-link:focus, .btn-link:hover,
        .screen-reader-text:focus{color:' . $main_text_color . ';}';
    /* background-color */
    $css .= '.badge,
        .btn-theme-dark:hover,
        .carousel-item-content h1,
        .main-flex-slider .flex-control-paging li a.flex-active,
        .services-box-icon i,
        .service-box:hover i,
        .blue-bg,
        .progress-bar ,
        .quote.green blockquote,
        .popular .ribbon,
        .tagcloud a:hover ,
        #cta-1 ,
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover ,
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus,
        .step:hover .icon-square i,
        .event-box .time,
        .portfolio-cube .cbp-l-caption-buttonLeft, .portfolio-cube .cbp-l-caption-buttonRight,
        .portfolio-cube .cbp-l-caption-buttonLeft:hover, .portfolio-cube .cbp-l-caption-buttonRight:hover,
        .tp-caption.Gym-Button, .Gym-Button,
        .page-template-one-page .contact-info i,
        #back-to-top a,.full-width-section{background-color: ' . $main_text_color . ';}';

    /*     * ***BORDER*** */
    $css .= '.f2-work li a:hover img,
            .testi-slide .flex-control-paging li a.flex-active,
            .login-regiter-tabs .nav-tabs > li > a:hover,
            .work-wrap .img-overlay .inner-overlay a,
            .work-wrap .img-overlay .inner-overlay a i{border-color: ' . $main_text_color . ';}';

    /*     * *border +bg** */
    $css .= '.btn-theme-bg,.border-theme:hover,
            .cube-masonry .cbp-l-filters-alignRight .cbp-filter-item.cbp-filter-item-active,
            .portfolio-cube .cbp-l-filters-button .cbp-filter-item.cbp-filter-item-active{background-color: ' . $main_text_color . ';border-color: ' . $main_text_color . ';}';

    /*     * *border +color** */

    $css .='.border-theme,.colored-boxed.green i,.filter li a.active ,.filter li a:hover {border-color:' . $main_text_color . ';color:' . $main_text_color . ';}';


    $css .='.quote.green blockquote:before {border-top-color: ' . $main_text_color . ';}';

    $css .='.purchase-sec,.owl-theme .owl-controls .owl-page span,
            .panel-primary .panel-heading,
            .tabs .nav-tabs li.active a:after,
            .featured-work .owl-theme .owl-controls .owl-buttons div,
            .fun-facts-bg,
            .cube-masonry .cbp-l-filters-alignRight .cbp-filter-counter,
            .pace .pace-progress{background: ' . $main_text_color . ';}';

    $css .='.login-regiter-tabs .nav-tabs > li.active > a,
        .login-regiter-tabs .nav-tabs > li.active > a:hover,
        .login-regiter-tabs .nav-tabs > li.active > a:focus {border-bottom-color: ' . $main_text_color . ';background-color: ' . $main_text_color . ';border-color: ' . $main_text_color . ';}';


    $css .='.cube-masonry .cbp-l-filters-alignRight .cbp-filter-counter:before  {border-top-color: ' . $main_text_color . ';}';

    $css .='.pace .pace-progress-inner {box-shadow: 0 0 10px ' . $main_text_color . ', 0 0 5px ' . $main_text_color . ';}';


    $css .='.pace .pace-activity {border-top-color: ' . $main_text_color . ';border-left-color: ' . $main_text_color . ';}';

    $css .='.owl-theme .owl-controls .owl-page span{background: ' . $main_text_color . ' !important;}';

    $css .='.tabs .nav-tabs li.active a{background: #fff;color: ' . $main_text_color . ';}';

    /*     * *SHOP* */
    $shop_css = '.woocommerce ul.products li.product .product-info a:hover h3,
        .woocommerce div.product p.price,
        .woocommerce div.product span.price,
        .woocommerce .woocommerce-shipping-calculator .shipping-calculator-button::before,
        .woocommerce .woocommerce-shipping-calculator .shipping-calculator-button:hover,
        .woocommerce .shop-pre-footer ul.product_list_widget li a:hover,
        .woocommerce .shop-pre-footer ul.product_list_widget li a:focus,
        .woocommerce .layout-switcher .toggleGrid.toggle-active,
        .woocommerce .layout-switcher .toggleList.toggle-active,
        .woocommerce .woocommerce-info:before,
        .woocommerce-MyAccount-navigation li a:hover,
        .woocommerce-MyAccount-navigation li:hover > a:after,
        .woocommerce-MyAccount-navigation li.is-active a,
        .woocommerce-MyAccount-navigation li.is-active > a:after{color: ' . $main_text_color . ';}';

    $shop_css .='.woocommerce .product-atcard a.button.added, 
        .woocommerce .product-atcard a.button.loading,
        .woocommerce .woocommerce-message,
        p.demo_store,
        .woocommerce ul.products li.product .onsale{background: ' . $main_text_color . ';}';


    $shop_css .='.woocommerce nav.woocommerce-pagination ul li a:focus,
            .woocommerce nav.woocommerce-pagination ul li a:hover{border-color: ' . $main_text_color . ';}';

    $shop_css .='.woocommerce div.product .woocommerce-tabs ul.tabs li.active{border-top: 2px solid ' . $main_text_color . ';}';


    $shop_css .='.woocommerce .products a.compare:hover:before,
        .woocommerce .product a.compare:hover:before,
        .yith-wcwl-add-to-wishlist a:hover:before{border-color: ' . $main_text_color . ';color: ' . $main_text_color . ';}';

    $shop_css .='.woocommerce .products a.compare:hover:before,
        .woocommerce .product a.compare:hover:before,
        .woocommerce .single_add_to_cart_button.button.alt:hover,
        .woocommerce .single_variation_wrap .single_add_to_cart_button.button.button.alt:hover{border-color: ' . $main_text_color . ';color: ' . $main_text_color . ';}';

    $shop_css .='.woocommerce .woocommerce-info,.woocommerce-checkout h3#order_review_heading{border-top-color: ' . $main_text_color . ';}';

    $shop_css .='.widget_product_search .woocommerce-product-search input[type=submit]{background-color: ' . $main_text_color . ';border:1px solid ' . $main_text_color . '; }';

    $shop_css .='.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{background-color: ' . $main_text_color . ';}';

    $shop_css .='.woocommerce #respond input#submit.disabled,
        .woocommerce #respond input#submit:disabled,
        .woocommerce #respond input#submit:disabled[disabled],
        .woocommerce a.button.disabled, .woocommerce a.button:disabled,
        .woocommerce a.button:disabled[disabled],
        .woocommerce button.button.disabled,
        .woocommerce button.button:disabled,
        .woocommerce button.button:disabled[disabled],
        .woocommerce input.button.disabled,
        .woocommerce input.button:disabled,
        .woocommerce input.button:disabled[disabled],
        .woocommerce #respond input#submit.alt,
        .woocommerce a.button.alt,
        .woocommerce button.button.alt,
        .woocommerce input.button.alt,
        .woocommerce .single_variation_wrap .button.button.alt,
        .woocommerce #respond input#submit,
        .woocommerce a.button,
        .woocommerce button.button,
        .woocommerce input.button,.shop-newsletter{background-color: ' . $main_text_color . ';}';

    if ($custom_css) {
        $css .=$custom_css;
    }

    if ($main_text_color && $main_text_color != '#32c5d2') {
        wp_add_inline_style('assan-style', $css);
    }
    if ($main_text_color && $main_text_color != '#32c5d2' && function_exists("is_woocommerce")) {
        wp_add_inline_style('assan-shop-style', $shop_css);
    }
}

function crazy_assan_sanitize_customize_data($data) {
    return $data;
}
