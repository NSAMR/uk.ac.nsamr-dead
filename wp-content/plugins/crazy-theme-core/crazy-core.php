<?php

/*
  Plugin Name: Crazy Theme Core
  Description: Custom post type, shortcode Function of Crazy-themes.
  Version: 1.0
  Author: Crazy-themes
  Author URI: http://crazy-themes.com
 */

function crazy_assan_core_load_plugin() {

    define('CRAZY_CORE_PLUGIN_DIR', plugin_dir_path(__FILE__));
    require_once CRAZY_CORE_PLUGIN_DIR . '/core/post_types.php';
    require_once CRAZY_CORE_PLUGIN_DIR . '/core/shortcode.php';
    return true;
}

add_action('plugins_loaded', 'crazy_assan_core_load_plugin', 20);

