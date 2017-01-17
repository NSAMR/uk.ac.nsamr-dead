<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-post">
        <?php crazy_assan_post_thumbnail(); ?>
        <ul class="list-inline post-detail">
            <?php crazy_assan_posted_on(); ?>
        </ul>        
        <?php if (is_single()) : ?>
            <h2><?php the_title(); ?></h2>
            <?php
            the_content();
        else:
            ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php
            the_excerpt();
        endif;
        ?>        
    </div>
</div>