<?php

/*
  Plugin Name: Crazy-Themes OnePage
  Description: Crazy Theme OnePage Layout.
  Version: 1.0
  Author: Crazy-themes
  Author URI: http://crazy-themes.com
 */

add_action('init', 'crazy_assan_theme_onepage_register');

function crazy_assan_theme_onepage_register() {
    register_post_type('onepage', array(
        'label' => 'Onepage Sections',
        'singular_label' => 'Onepage',
        'public' => FALSE,
        'show_in_nav_menus' => TRUE,
        'show_ui' => TRUE,
        'menu_position' => null,
        'capability_type' => 'page',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'one-page', 'with_front' => false),
        'edit_item' => __('Edit Onepage', 'assan'),
        'supports' => array('title', 'trackbacks', 'editor', 'revisions','thumbnail'),
        'labels' => array('add_new_item' => 'Add New', 'edit' => 'Edit', 'edit_item' => 'Edit', 'new_item' => 'New', 'view_item' => 'View'),
        'menu_icon' => 'dashicons-screenoptions'
            )
    );
}
