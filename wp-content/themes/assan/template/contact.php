<?php
// Template Name: Contact

get_header();
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
</div>
<?php
$active = get_assan_theme_options('map_active');
if ($active == '1'):
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php get_template_part('googlemap'); ?> 
        </div>
    </div>
<?php endif; ?>
<div class="divide60"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (have_posts()):
                // Start the loop.
                while (have_posts()) : the_post();
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'assan') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '<span class="screen-reader-text">' . __('Page', 'assan') . ' </span>%',
                        'separator' => '<span class="screen-reader-text">, </span>',
                    ));
                    edit_post_link(__('Edit', 'assan'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->');

                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>