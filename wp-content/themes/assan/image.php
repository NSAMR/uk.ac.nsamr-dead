<?php get_header(); ?>
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
<div class="divide80"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            while (have_posts()) : the_post();
                ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                
                    <div class="entry-content">
                        <?php
                        $image_size = apply_filters('assan_attachment_size', 'full');
                        echo wp_get_attachment_image(get_the_ID(), $image_size);
                        ?>                            
                        <?php if (has_excerpt()) : ?>
                            <div class="entry-caption">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-caption -->
                        <?php endif; ?>                   
                        <?php
                        the_content();
                        wp_link_pages(array(
                            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'assan') . '</span>',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'assan') . ' </span>%',
                            'separator' => '<span class="screen-reader-text">, </span>',
                        ));
                        ?>
                        <ul class="pager">
                            <li class="previous"><?php previous_image_link(false, __('Previous', 'assan')); ?></li>
                            <li class="next"><?php next_image_link(false, __('Next', 'assan')); ?></li>
                        </ul>
                    </div>
                    <footer class="entry-footer">
                        <?php edit_post_link(__('Edit', 'assan'), '<span class="edit-link">', '</span>'); ?>
                    </footer><!-- .entry-footer -->
                </div><!-- #post-## -->

                <?php
            endwhile;
            ?>

        </div>
    </div>
</div>
<?php get_footer(); ?>
