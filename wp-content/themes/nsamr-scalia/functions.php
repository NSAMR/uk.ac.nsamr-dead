<?php

add_action('wp_enqueue_scripts', 'enqueue_parent_theme_style');
function enqueue_parent_theme_style() {
	wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css', array('scalia-icons', 'scalia-reset', 'scalia-grid'));
}

function scalia_child_user_icons_info_link() {
	return get_stylesheet_directory_uri().'/fonts/user-icons-list.html';
}
add_filter('scalia_user_icons_info_link', 'scalia_child_user_icons_info_link');
