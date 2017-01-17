<?php
//Template Name: Comming Soon 1
?>

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
        <?php
        $hero_image = get_assan_theme_options('csoon_hero');
        $csoon_date = get_assan_theme_options('csoon_date');
        $csoon_facebook = get_assan_theme_options('csoon_facebook');
        $csoon_twitter = get_assan_theme_options('csoon_twitter');
        $csoon_google_plus = get_assan_theme_options('csoon_google_plus');
        $csoon_linkedin = get_assan_theme_options('csoon_linkedin');
        $copyright_text = get_assan_theme_options('copyright_text');
        ?>

        <div class="wrapper">
            <div class="coming-soon" style="background: url('<?php echo $hero_image; ?>');background-size: cover;">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text-center">  
                            <div class="margin30 text-center">
                                <h2 class="title">
                                    <?php crazy_assan_custom_logo(); ?>
                                </h2>
                            </div>
                            <h1><?php echo bloginfo('description'); ?></h1>
                            <div class="count-down-1" id="clock"></div>
                        </div>
                    </div>
                </div>
            </div><!--coming soon image-->
            <div class="divide60"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 text-center">
                        <div class="soon-inner">
                            <h3><?php _e("Our website is under construction.", "assan"); ?></h3>
                            <p><?php _e("WE'LL BE HERE SOON WITH OUR NEW AWESOME SITE, SUBSCRIBE TO BE NOTIFIED.", "assan"); ?></p>
                            <div class="subscribe-form  assan-newsletter">
                                <?php
                                if (function_exists('mc4wp_show_form')) {
                                    mc4wp_show_form();
                                }
                                ?>
                            </div>
                            <div class="divide70"></div>
                            <?php if ($csoon_facebook || $csoon_twitter || $csoon_google_plus || $csoon_linkedin): ?>
                                <ul class="clearfix list-inline text-center">
                                    <?php if ($csoon_facebook): ?>
                                        <li>
                                            <a href="<?php echo $csoon_facebook; ?>" class="social-icon si-dark si-facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($csoon_twitter): ?>
                                        <li>
                                            <a href="<?php echo $csoon_twitter; ?>" class="social-icon si-dark si-twitter">
                                                <i class="fa fa-twitter"></i>
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($csoon_google_plus): ?>
                                        <li>
                                            <a href="<?php echo $csoon_google_plus; ?>" class="social-icon si-dark si-google-plus">
                                                <i class="fa fa-google-plus"></i>
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($csoon_linkedin): ?>
                                        <li>
                                            <a href="<?php echo $csoon_linkedin; ?>" class="social-icon si-dark si-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="divide20"></div>
                <div  class="text-center soon-copyright"><?php echo $copyright_text; ?></div>
            </div>
            <div class="divide30"></div>
            <?php wp_footer(); ?>
            <script type="text/javascript">
                jQuery(document).ready(function ($) {
                    $('#clock').countdown("<?php echo $csoon_date; ?>", function (event) {
                        $(this).html(event.strftime('<div class="counts"><span>%w</span> <p>weeks</p></div> '
                                + '<div class="counts"><span>%d</span> <p>days</p></div> '
                                + '<div class="counts"><span>%H</span> <p>hr</p></div> '
                                + '<div class="counts"><span>%M</span> <p>min</p></div> '
                                + '<div class="counts"><span>%S</span> <p>sec</p></div>'));
                    });
                });
            </script>
        </div>
    </body>
</html>
