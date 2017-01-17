<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="wrapper">
            <section id="slider" class=" clearfix">
                <?php do_action('assan_theme_slider'); ?>
            </section>
            <!--navigation -->
            <!-- Static navbar -->
            <div class="navbar navbar-default navbar-static-top yamm sticky" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php crazy_assan_custom_logo(); ?>
                        </a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <?php if (has_nav_menu('onepage_nav')) crazy_assan_onepage_nav(); ?>
                    </div><!--/.nav-collapse -->
                </div><!--container-->
            </div><!--navbar-default-->
