<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-post">
        <div class="entry-audio">
            <?php
            $audio_type = get_post_meta($post->ID, '_assan_post_audio_type', TRUE);
            $audio_source = get_post_meta($post->ID, '_assan_post_audio_code', TRUE);
            if ($audio_type == 'ausoundcloud') {
                echo '<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/' . $audio_source . '&amp;color=ff6600&amp;auto_play=false&amp;show_artwork=true&amp;hide_related=true&amp;show_user=true" width="100%"></iframe>';
            } elseif ($audio_type == 'aucustom') {
                echo do_shortcode('[audio src="' . $audio_source . '"]');
            }
            ?>
        </div>
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