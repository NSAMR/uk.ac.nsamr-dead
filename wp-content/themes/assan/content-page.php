<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    // Post thumbnail.
    crazy_assan_post_thumbnail();
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
    ?>

</div><!-- #post-## -->
