<?php $slider_posts = new WP_Query(array('post_type' => 'carousel-slider', 'orderby' => 'menu_order', 'order' => 'ASC')); ?>
<div id="carousel-slider" class="carousel carousel-slider-wrapper slide" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        while ($slider_posts->have_posts()) : $slider_posts->the_post();
            $active = $i == 0 ? 'active' : ' ';
            ?>
            <li data-target="#carousel-slider" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
            <?php
            $i++;
        endwhile;
        ?>
    </ol>   
    <!-- Carousel items -->
    <div class="carousel-inner">
        <?php
        $i = 0;
        if ($slider_posts->have_posts()) : while ($slider_posts->have_posts()) : $slider_posts->the_post();
                $active = $i == 0 ? 'item active' : 'item';
                $large_image_full_url = '';
                if (has_post_thumbnail())
                    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', array('class' => 'img-responsive'));
                $large_image_full_url = $large_image_url[0];
                ?>
                <div class="item <?php echo $active; ?>" style="background: url('<?php echo $large_image_full_url; ?>');background-size: 100%;background-repeat: no-repeat;width:100%;max-width:100%;">
                    <div class="carousel-overlay">
                        <div class="carousel-item-content">
                            <div class="container">
                                <div class="animated fadeInDown delay-1">
                                    <h1><?php the_title(); ?></h1>
                                </div>
                                <div class="animated fadeInUp delay-2">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            endwhile;
        endif;
        wp_reset_query();
        ?>
    </div><!--carousel inner-->
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#carousel-slider" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="carousel-control right" href="#carousel-slider" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>
</div>