<?php get_header(); ?>

<?php if (is_home() && !is_front_page()) : ?>
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h4><?php echo get_the_title(get_option('page_for_posts')); ?></h4>
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
        <div class="col-md-8">
            <?php if (have_posts()) : ?>
                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    ?>
                    <div class="wow fadeInUp">
                        <?php get_template_part('content', get_post_format()); ?>
                    </div>
                    <?php
                // End the loop.
                endwhile;

            // If no content, include the "No posts found" template.
            else :
                get_template_part('content', 'none');

            endif;
            ?>
            <?php crazy_assan_page_navi(); ?>
        </div>
        <div class="col-md-4">
            <div class="sidebar">
                <?php dynamic_sidebar('primary-sidebar'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
