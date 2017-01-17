<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 */
get_header();
global $post;
$page_layout = get_post_meta($post->ID, '_assan_page_layout', TRUE);
$page_sidebar = get_post_meta($post->ID, '_assan_page_sidebar', TRUE);
$content_class = 'class="col-md-12"';
if ($page_layout == 'LEFT' || $page_layout == 'RIGHT'):
    $content_class = 'class="col-md-9 col-sm-9 col-xs-12"';
endif;
?>
<?php if (!is_front_page()) : ?>
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
    </div>
<?php endif; ?>
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
            <?php
            // Start the loop.
            while (have_posts()) : the_post();
                // Include the page content template.
                get_template_part('content', 'page');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            // End the loop.
            endwhile;
            ?>
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
