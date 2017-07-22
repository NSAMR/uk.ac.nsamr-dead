<?php

/*
 * Portfolio
 */
add_action('init', 'crazy_assan_portfolio_register');

function crazy_assan_portfolio_register() {
    register_post_type('portfolio', array(
        'label' => 'Portfolio',
        'singular_label' => 'Portfolio',
        'public' => true,
        'menu_position' => null,
        'query_var' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'portfolios', 'with_front' => false),
        'edit_item' => __('Edit Portfolio', 'assan'),
        'supports' => array('title', 'trackbacks', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'post-formats', 'page-attributes'),
        'labels' => array('add_new_item' => 'Add New portfolio', 'edit' => 'Edit', 'edit_item' => 'Edit portfolio', 'new_item' => 'New portfolio', 'view_item' => 'View'),
        'menu_icon' => 'dashicons-portfolio'
            )
    );

    register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true,
        'label' => __('Portfolio Categories', 'assan'),
        'singular_label' => __('Portfolio Category', 'assan'),
        'public' => true,
        'show_in_nav_menus' => TRUE,
        'show_tagcloud' => false,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio_category', 'with_front' => false)
            )
    );
}

add_filter('manage_edit-portfolio_columns', 'crazy_assan_portfolio_edit_columns');

add_action('manage_posts_custom_column', 'crazy_assan_portfolio_custom_columns');

function crazy_assan_portfolio_edit_columns($columns) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'portfolio_category' => 'Category',
        'portfolio_image' => 'Image Preview'
    );
    return $columns;
}

function crazy_assan_portfolio_custom_columns($column) {
    global $post;
    switch ($column) {
        case "portfolio_category":
            echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', '');
            break;
        case 'portfolio_image':
            the_post_thumbnail(array(60, 60));
            break;
    }
}

function crazy_assan_my_post_type_link_filter_function($post_link, $id = 0, $leavename = FALSE) {
    if (strpos('%portfolio_category%', $post_link) < 0) {
        return $post_link;
    }
    $post = get_post($id);
    if (!is_object($post) || $post->post_type != 'portfolio') {
        return $post_link;
    }

    $terms = wp_get_object_terms($post->ID, 'portfolio_category');

    if (!$terms) {

        return str_replace('portfolio_page/category/%portfolio_category%/', '', $post_link);
    }

    return str_replace('%portfolio_category%', $terms[0]->slug, $post_link);
}

add_filter('post_type_link', 'crazy_assan_my_post_type_link_filter_function', 1, 3);
