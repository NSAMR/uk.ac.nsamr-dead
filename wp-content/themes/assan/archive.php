<?php get_header(); ?>
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php the_archive_title('<h4>', '</h4>'); ?>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <?php crazy_assan_breadcrumb(); ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="divide80"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row blog-list">
                <?php if (have_posts()) : ?>
                    <?php
                    // Start the Loop.
                    while (have_posts()) : the_post();
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 masonry-item">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php crazy_assan_page_navi(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
