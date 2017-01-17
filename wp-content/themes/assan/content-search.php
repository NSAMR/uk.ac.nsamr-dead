<div id="post-<?php the_ID(); ?>" class="results-box">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php if ('post' == get_post_type()) : ?>
        <ul class="post-detail list-inline link-ul">
            <?php crazy_assan_posted_on(); ?>
        </ul> 
    <?php endif; ?>
    <?php the_excerpt(); ?>
</div><!--result box-->
<hr>