<?php
/*
 * Template Name: Blog Timeline
 * 
 */

get_header();
global $post;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$maxposts = get_option('posts_per_page');
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
    <ul class="timeline">
        <?php
        $wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $maxposts, 'paged' => $paged));
        $number = 1;
        if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post();
                $leftclass = "";
                if ($number % 2 == 0):
                    $leftclass = "class='timeline-inverted'";
                endif;
                ?>
                <li <?php echo $leftclass; ?>>
                    <div class="timeline-badge primary"><i class="fa fa-image"></i></div>
                    <div class="timeline-panel wow animated fadeInUp">
                        <div class="timeline-heading">
                            <?php crazy_assan_post_thumbnail(); ?>                            
                        </div>
                        <div class="timeline-body">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <ul class="list-inline post-detail">
                                <?php crazy_assan_posted_on(); ?>
                            </ul>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 40); ?></p>
                            <a class="btn border-theme" href="<?php the_permalink(); ?>"><?php _e("Read More", "assan"); ?></a>
                        </div>

                    </div>
                </li>
                <?php
                $number++;
            endwhile;
        endif;
        ?>
        <li class="clearfix" style="float: none;"></li>
    </ul>
    <div class="row">
        <div class="col-md-12 text-center">
            <?php crazy_assan_page_navi(); ?>
        </div>
    </div>
    

</div>
<?php get_footer(); ?>
