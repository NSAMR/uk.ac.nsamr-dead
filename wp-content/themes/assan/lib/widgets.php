<?php
/* * *******************RECENT PORTFOLIO************************* */

class Crazy_Assan_Portfolio_widget extends WP_Widget {

    function __construct() {
        parent::__construct('crazy_assan_portfolio', 'Crazy Portfolio', array('description' => 'Recent Portfolio'));
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => 'Recent Portfolio', 'port_number' => '3'));
        $title = $instance['title'];
        $portfolio_number = $instance['port_number'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('port_number'); ?>">No of portfolio: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('port_number'); ?>" value="<?php echo $portfolio_number; ?>" />
            </label>
        </p>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['port_number'] = $new_instance['port_number'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args);
        echo $before_widget;
        $title = apply_filters('widget_title', empty($instance['title']) ? _e(' ', 'assan') : $instance['title'], $instance, $this->id_base);
        $portfolio_number = isset($instance['port_number']) ? $instance['port_number'] : 10;
        $portfolios = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $portfolio_number));
        if (!empty($title))
            echo $before_title . $title . $after_title;
        if ($portfolios->have_posts()) :
            echo " <ul class='list-unstyled popular-post'>";
            while ($portfolios->have_posts()) : $portfolios->the_post();
                ?>               
                <li>
                    <div class="popular-img">                        
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>                        
                    </div>
                    <div class="popular-desc">
                        <h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <h6><?php echo get_the_date(); ?></h6>
                    </div>
                </li>       
                <?php
            endwhile;
            echo '</ul>';
            echo $after_widget;
            wp_reset_postdata();
        endif;
    }

}

/* * ****************SOCIAL SHARE********************* */

class Crazy_Assan_Social_Widgets extends WP_Widget {

    function __construct() {
        parent::__construct('carzy_assan_social_share', 'Crazy Share Button', array('description' => 'Social Share Buttons'));
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => 'Follow us', 'facebook' => "", "twitter" => "",
            "google" => "", "linkedin" => "", "pinterest" => '', "dribbble" => "", "rss" => "", "flickr" => ""));

        $title = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $pinterest = $instance['pinterest'];
        $linkedin = $instance['linkedin'];
        $dribbble = $instance['dribbble'];
        $rss = $instance['rss'];
        $flickr = $instance['flickr'];
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $facebook; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $twitter; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>">Google Plus: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" value="<?php echo $google; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>">Linkedin: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $linkedin; ?>" />
            </label>
        </p>       
        <p>
            <label for="<?php echo $this->get_field_id('pinterest'); ?>">Pinterest: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $pinterest; ?>" />
            </label>
        </p>                
        <p>
            <label for="<?php echo $this->get_field_id('dribbble'); ?>">Dribbble: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php echo $dribbble; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('flickr'); ?>">Flickr: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo $flickr; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('rss'); ?>">Rss: 
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $rss; ?>" />
            </label>
        </p>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['facebook'] = $new_instance['facebook'];
        $instance['twitter'] = $new_instance['twitter'];
        $instance['google'] = $new_instance['google'];
        $instance['linkedin'] = $new_instance['linkedin'];
        $instance['pinterest'] = $new_instance['pinterest'];
        $instance['dribbble'] = $new_instance['dribbble'];
        $instance['rss'] = $new_instance['rss'];
        $instance['flickr'] = $new_instance['flickr'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args);
        echo $before_widget;
        $title = apply_filters('widget_title', empty($instance['title']) ? _e(' ', 'assan') : $instance['title'], $instance, $this->id_base);
        if ($title)
            echo $before_title . $title . $after_title;
        ?>
        <ul class="list-inline social_icon_list">
            <?php if ($instance['facebook']): ?>
                <li><a class="social-icon si-facebook si-colored-facebook si-dark" href="<?php echo $instance['facebook']; ?>"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>
            <?php endif; ?>
            <?php if ($instance['twitter']): ?>
                <li><a class="social-icon si-twitter si-colored-twitter si-dark" href="<?php echo $instance['twitter']; ?>"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
            <?php endif; ?>            
            <?php if ($instance['google']): ?>
                <li><a class="social-icon si-google-plus si-colored-google-plus si-dark" href="<?php echo $instance['google']; ?>"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
            <?php endif; ?>
            <?php if ($instance['linkedin']): ?>
                <li><a class="social-icon si-linkedin si-colored-linkedin si-dark" href="<?php echo $instance['linkedin']; ?>"><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a></li>
            <?php endif; ?>
            <?php if ($instance['pinterest']): ?>
                <li><a class="social-icon si-pinterest si-colored-pinterest si-dark" href="<?php echo $instance['pinterest']; ?>"><i class="fa fa-pinterest"></i><i class="fa fa-pinterest"></i></a></li>
            <?php endif; ?>
            <?php if ($instance['flickr']): ?>
                <li><a class="social-icon si-flickr si-colored-flickr si-dark" href="<?php echo $instance['flickr']; ?>"><i class="fa fa-flickr"></i><i class="fa fa-flickr"></i></a></li>
            <?php endif; ?>
            <?php if ($instance['dribbble']): ?>
                <li><a class="social-icon si-dribbble si-colored-dribbble si-dark" href="<?php echo $instance['dribbble']; ?>"><i class="fa fa-dribbble"></i><i class="fa fa-dribbble"></i></a></li>
            <?php endif; ?>            
            <?php if ($instance['rss']): ?>
                <li><a class="social-icon si-rss" href="<?php echo $instance['rss']; ?>"><i class="fa fa-rss"></i><i class="fa fa-rss"></i></a></li>
                        <?php endif; ?>
        </ul>
        <?php
        echo $after_widget;
    }

}
