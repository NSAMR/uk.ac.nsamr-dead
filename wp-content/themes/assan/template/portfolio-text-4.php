<?php
//Template Name: Portfolio Text 4
get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$portfolio_per_page = get_assan_theme_options('portfolio_per_page');
$show_filter = get_assan_theme_options('portfolio_filter');
$portfolio_categories = get_categories(array('type' => 'portfolio', 'taxonomy' => 'portfolio_category', 'hierarchical' => 3));
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
    <div class="row">
        <div class="col-md-12">
            <div class="center-heading">
                <h2><?php _e("Our portfolio", "assan"); ?></h2>
                <span class="center-line"></span>
            </div> 
            <?php if ($show_filter == 'YES'): ?>
                <ul class="portfolio-filter filter list-inline">
                    <li><a href="javascript:void(0)" class="active" data-filter="*"><?php _e("Show All", "assan"); ?></a></li>
                    <?php
                    if ($portfolio_categories) {
                        foreach ($portfolio_categories as $portfolio_categorie) {
                            echo ' <li><a data-filter=".' . $portfolio_categorie->slug . '" href="javascript:void(0)">' . $portfolio_categorie->name . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="portfolio-box portfolio-wrap col-4-space">
            <?php
            $wp_query = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $portfolio_per_page, 'paged' => $paged, 'menu_order', 'order' => 'ASC'));
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) : $wp_query->the_post();
                    $cats = wp_get_object_terms($post->ID, 'portfolio_category');
                    $cat_slugs = '';
                    $cat_name = '';
                    $i = 1;
                    $catcount = count($cats);
                    if ($cats) {
                        foreach ($cats as $cat) {
                            if ($i != $catcount) {
                                $cat_name .= $cat->name . ", ";
                            } else {
                                $cat_name .= $cat->name . "";
                            }
                            $cat_slugs .= $cat->slug . " ";
                            $i++;
                        }
                    }
                    ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class(array('project-post', $cat_slugs)); ?>>
                        <div class="item-img-wrap ">
                            <?php
                            $big_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'assan-fullwidth');
                            $big_image_url = $big_image[0];
                            the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive'));
                            ?>
                            <div class="item-img-overlay">
                                <a href="<?php echo $big_image_url; ?>" class="show-image">
                                    <span></span>
                                </a>
                            </div>
                        </div> 
                        <div class="work-desc">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <span><?php echo $cat_name; ?></span>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="divide30"></div>
            <?php crazy_assan_page_navi(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
