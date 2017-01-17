<?php
/*
 * Template Name: Blog Masonry 4
 * 
 */

get_header();

global $post;
$page_layout = get_post_meta($post->ID, '_assan_page_layout', TRUE);
$page_sidebar = get_post_meta($post->ID, '_assan_page_sidebar', TRUE);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$maxposts = get_option('posts_per_page');
$content_class = 'class="col-md-12"';
if ($page_layout == 'LEFT' || $page_layout == 'RIGHT'):
    $content_class = 'class="col-md-9 col-sm-9 col-xs-12"';
endif;
?>
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4><?php the_title(); ?></h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <?php crazy_assan_breadcrumb(); ?>
                </ol>
            </div>
        </div>
    </div>
</div><!--breadcrumbs-->
<div class="divide80"></div>
<div class="container">
    <div class="row">
        <?php
        if ($page_layout == 'LEFT') {
            echo '<div class="col-md-3 col-sm-3 col-xs-12 sidebar">';
            if ($page_sidebar && !empty($page_sidebar) && is_active_sidebar($page_sidebar)):
                dynamic_sidebar($page_sidebar);
            endif;
            echo '</div>';
        }
        ?>
        <div <?php echo $content_class; ?>>
            <div class="row blog-list">
                <?php
                $wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $maxposts, 'paged' => $paged));
                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        ?>
                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp masonry-item">
                            <?php get_template_part('content', get_post_format()); ?>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php crazy_assan_page_navi(); ?>
                </div>
            </div>
        </div>
        <?php
        if ($page_layout == 'RIGHT') {
            echo '<div class="col-md-3 col-sm-3 col-xs-12 sidebar">';
            if ($page_sidebar && !empty($page_sidebar) && is_active_sidebar($page_sidebar)):
                dynamic_sidebar($page_sidebar);
            endif;
            echo '</div>';
        }
        ?>
    </div>
</div>
<?php get_footer(); ?>