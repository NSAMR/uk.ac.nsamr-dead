<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-post">
        <?php
        $video_source = get_post_meta($post->ID, '_assan_post_video_code_type', TRUE);
        $video_code = get_post_meta($post->ID, '_assan_post_video_code', TRUE);
        ?>
        <?php if ($video_code): ?>
            <div class="embed-responsive embed-responsive-16by9">
                <?php if ($video_source == 2): ?>
                    <iframe src="https://www.youtube.com/embed/<?php echo $video_code; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                <?php elseif ($video_source == 3): ?>
                    <?php echo wp_oembed_get('http://player.vimeo.com/video/' . $video_code); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <ul class="list-inline post-detail">
            <?php crazy_assan_posted_on(); ?>
        </ul>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php
        if (is_single()) :
            the_content();
        else:
            the_excerpt();
        endif;
        ?>
    </div>
</div>