<?php $flex_slider = new WP_Query(array('post_type' => 'flex-slider', 'orderby' => 'menu_order', 'order' => 'ASC')); ?>
<section id="slider-sec" class="slider-reg">
    <div class="main-flex-slider">
        <ul class="slides">
            <?php if ($flex_slider->have_posts()) : while ($flex_slider->have_posts()) : $flex_slider->the_post(); ?>
                    <li>
                        <figure>
                            <?php the_post_thumbnail('full', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                            <figcaption class="slider-overlay ">
                                <div class="slider-text">
                                    <h1><?php the_title(); ?></h1>
                                    <?php the_content(); ?>                                    
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <?php
                endwhile;
            endif;
            ?>
        </ul>
    </div>
</section>