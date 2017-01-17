<?php
/*
 * Template Name: Blog medium
 * 
 */

get_header();

global $post;
$page_layout = get_post_meta($post->ID, '_assan_page_layout', TRUE);
$page_sidebar = get_post_meta($post->ID, '_assan_page_sidebar', TRUE);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$maxposts = get_option('posts_per_page');
$content_class = 'class="col-md-12"';
if ($page_layout == 'LEFT' || $page_layout == 'RIGHT'):
    $content_class = 'class="col-md-9 col-sm-9 col-xs-12"';
endif;
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
<div class="container blog-left-img">
    <div class="row">
        <?php
        if ($page_layout == 'LEFT') {
            echo '<div class="col-md-3 col-sm-3 col-xs-12 sidebar">';
            if ($page_sidebar && !empty($page_sidebar) && is_active_sidebar($page_sidebar)):
                dynamic_sidebar($page_sidebar);
            endif;
            echo '</div>';
        }
        ?>
        <div <?php echo $content_class; ?>>
            <?php
            $wp_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => $maxposts, 'paged' => $paged));
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) : $wp_query->the_post();
                    ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(array('blog-post', 'wow', 'fadeInUp')); ?>>
                        <div class="row">
                            <div class="col-md-6 margin20">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="item-img-wrap">
                                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
                                        <div class="item-img-overlay">
                                            <span></span>
                                        </div>
                                    </div>                       
                                </a><!--work link--> 
                            </div>
                            <div class="col-md-6 margin20">
                                <ul class="list-inline post-detail">
                                    <?php crazy_assan_default_posted_on(); ?> 
                                </ul>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
            <div class="row">
                <div class="col-md-12">
                    <?php crazy_assan_page_navi(); ?>
                </div>
            </div>
        </div>
        <?php
        if ($page_layout == 'RIGHT') {
            echo '<div class="col-md-3 col-sm-3 col-xs-12 sidebar">';
            if ($page_sidebar && !empty($page_sidebar) && is_active_sidebar($page_sidebar)):
                dynamic_sidebar($page_sidebar);
            endif;
            echo '</div>';
        }
        ?>
    </div>
</div>
<?php get_footer(); ?>