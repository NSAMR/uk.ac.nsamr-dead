<?php
//Template Name: One Page 2

get_header('onepage2');
if (($locations = get_nav_menu_locations()) && $locations['onepage_nav']) {
    $menu = wp_get_nav_menu_object($locations['onepage_nav']);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $page_ids = array();
    foreach ($menu_items as $menu_item) {
        if ($menu_item->object == 'onepage') {
            $page_ids[] = $menu_item->object_id;
        }
    }
    $page_args = array('post_type' => 'onepage', 'post__in' => $page_ids, 'posts_per_page' => count($page_ids), 'orderby' => 'post__in');
} else {
    $page_args = array('post_type' => 'onepage');
}
$section_list = new WP_Query($page_args);

if ($section_list->have_posts()):
    while ($section_list->have_posts()):$section_list->the_post();
        global $post;
        //META VALUES
        $section_title = get_post_meta($post->ID, '_assan_onepage_title', true);
        $section_subtitle = get_post_meta($post->ID, '_assan_onepage_subtitle', true);
        $section_layout = get_post_meta($post->ID, '_assan_onepage_layouts', true);
        $section_bg_color = get_post_meta($post->ID, '_assan_onepage_bg_color', true);
        $section_padding_top = get_post_meta($post->ID, '_assan_onepage_padding_top', true);
        $section_padding_bottom = get_post_meta($post->ID, '_assan_onepage_padding_bottom', true);
        $section_style = '';
        if ($section_bg_color) {
            $section_style = 'background-color:' . $section_bg_color . ';';
            //$section_bg_image_style = 'style="background: url(' . $section_bg_image . ');background-attachment: fixed; background-position: center 0%;"';
        }
        if ($section_padding_top):
            $section_style.='padding-top:' . $section_padding_top . 'px;';
        endif;
        if ($section_padding_bottom):
            $section_style.='padding-bottom:' . $section_padding_bottom . 'px;';
        endif;
        if (has_post_thumbnail($post->ID)) {
            $bgimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            $section_style.='background: url(' . $bgimage[0] . ') no-repeat;background-attachment: fixed;position: relative;';
        }
        if ($section_layout == '2'):
            ?>
            <section id="<?php echo $post->post_name; ?>" class="full-width-section" style="<?php echo $section_style; ?>">
                <div class="container">
                    <?php if ($section_title || $section_subtitle): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="center-heading">
                                    <?php if ($section_title): ?><h2><?php echo $section_title; ?></h2><?php endif; ?>
                                    <span class="center-line"></span>
                                    <?php if ($section_subtitle): ?><p class="lead"><?php echo $section_subtitle; ?></p><?php endif; ?>
                                </div>
                            </div>                   
                        </div>
                    <?php endif; ?>
                    <?php the_content(); ?> 
                </div>
            </section>
        <?php else : ?>
            <section id="<?php echo $post->post_name; ?>" class="parallax-page-section" style="<?php echo $section_style; ?>">
                <div class="container">
                    <?php if ($section_title || $section_subtitle): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="center-heading">
                                    <?php if ($section_title): ?><h2><?php echo $section_title; ?></h2><?php endif; ?>
                                    <span class="center-line"></span>
                                    <?php if ($section_subtitle): ?><p class="lead"><?php echo $section_subtitle; ?></p><?php endif; ?>
                                </div>
                            </div>                   
                        </div>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>
            </section>
        <?php
        endif;
    endwhile;
endif;
get_footer();
