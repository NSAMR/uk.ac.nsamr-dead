<?php
$top_header = get_assan_theme_options('header_top');
if ($top_header == 'YES'):
    ?>
    <div class="top-bar-dark" id="top-bar">            
        <div class="container">
            <div class="row">
                <div class="col-sm-5 hidden-xs">
                    <div class="top-bar-socials">
                        <?php
                        if (is_active_sidebar('leftpreheader')):
                            dynamic_sidebar('leftpreheader');
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-sm-7 text-right">
                    <?php
                    if (is_active_sidebar('rightpreheader')):
                        dynamic_sidebar('rightpreheader');
                    endif;
                    ?>  
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--navigation -->
<!-- Static navbar -->
<div class="navbar navbar-inverse navbar-static-top yamm sticky dark-header" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3">
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
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="navbar-collapse collapse">
                    <?php if (has_nav_menu('primary_nav')) crazy_assan_main_nav(); ?>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div><!--container-->
</div><!--navbar-default-->
<?php do_action('assan_theme_slider'); ?>