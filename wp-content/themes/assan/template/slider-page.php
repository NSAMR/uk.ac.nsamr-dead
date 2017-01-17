<?php
//Template Name: Default Template + Slider
get_header();
global $post;
$page_layout = get_post_meta($post->ID, '_assan_page_layout', TRUE);
$page_sidebar = get_post_meta($post->ID, '_assan_page_sidebar', TRUE);
$content_class = 'class="col-md-12"';
if ($page_layout == 'LEFT' || $page_layout == 'RIGHT'):
    $content_class = 'class="col-md-9 col-sm-9 col-xs-12"';
endif;
?>
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
