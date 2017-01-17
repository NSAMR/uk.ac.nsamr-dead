<?php
get_header();
global $post;
$project_url = get_post_meta($post->ID, '_assan_project_url', TRUE);
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
</div>
<div class="divide80"></div>
<div class="container">    
    <?php
    if (have_posts()): while (have_posts()):the_post();
            $cats = wp_get_object_terms(get_the_ID(), 'portfolio_category');
            $cat_name = '';
            $i = 1;
            $catcount = count($cats);
            if ($cats) {
                foreach ($cats as $cat) {
                    if ($i != $catcount) {
                        $cat_name .= $cat->name . " / ";
                    } else {
                        $cat_name .= $cat->name . "";
                    }
                    $i++;
                }
            }
            ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <?php crazy_assan_post_thumbnail() ?>
                    <div class="divide35"></div>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="project-detail">
                        <h3><?php the_title(); ?></h3>
                        <em class="margin-bottom-40"><?php echo $cat_name; ?></em>
                        <br>
                        <?php
                        the_content();
                        edit_post_link(__('Edit', 'assan'), '<span class="edit-link">', '</span>');
                        if ($project_url):
                            ?>
                            <hr>
                            <div class="text-center"><a href="<?php $project_url; ?>" class="btn btn-lg btn-theme-bg" target="_blank">Launch Project</a></div>
                            <hr>
                        <?php endif; ?>
                    </div>
                </div>
            </div>        
            <?php
        endwhile;
    endif;
    ?>
</div>
<div class="divide50"></div>
<?php
$related_query = new WP_Query(array('post__not_in' => array(get_the_ID()), 'post_type' => 'portfolio', 'posts_per_page' => '3'));
if ($related_query->have_posts()) :
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="center-heading">
                    <h2><?php _e("Related work", "assan"); ?></h2>
                    <span class="center-line"></span>
                </div>
            </div>
            <?php
            while ($related_query->have_posts()) : $related_query->the_post();
                $big_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'assan-fullwidth');
                $big_image_url = $big_image[0];
                ?>
                <div id="post-<?php the_ID(); ?>" class="col-sm-4 related-work">
                    <div class="work-wrap">
                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
                        <div class="img-overlay">
                            <div class="inner-overlay">
                                <h2><?php the_title(); ?></h2>
                                <p><?php echo get_the_date(); ?></p>                                
                                <a class="zoom show-image" href="<?php echo $big_image_url; ?>"><i class="fa fa-eye"></i></a>
                                <a class="link" href="<?php the_permalink(); ?>"><i class="fa fa-sliders"></i></a>
                            </div>						
                        </div>
                    </div> 
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>  
</div>
<?php get_footer(); ?>