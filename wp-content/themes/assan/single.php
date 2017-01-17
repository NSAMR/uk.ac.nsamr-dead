<?php
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
</div><!--breadcrumbs-->
<div class="divide80"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('content', get_post_format());
                    $author_description = get_the_author_meta('description');
                    if ($author_description):
                        ?>                    
                        <div class="about-author">
                            <h4 class="colored-text"><?php _e("About the Author", "assan"); ?></h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php echo get_avatar(get_the_author_meta('email'), '120'); ?>
                                </div>
                                <div class="col-sm-9">
                                    <p><?php echo get_the_author_meta('description'); ?> </p>   
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <ul class="pager">
                        <?php previous_post_link('<li class="previous">%link</li>', __('Previous', 'assan')); ?>
                        <?php next_post_link('<li class="next">%link</li>', __('Next', 'assan')); ?>
                    </ul><!--pager-->
                    <div class="divide60"></div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
                <?php
            endwhile;
        endif;
        ?>
        <div class="col-md-3 col-md-offset-1">
            <div class="sidebar">
                <?php dynamic_sidebar('primary-sidebar'); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
