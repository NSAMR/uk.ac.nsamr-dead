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
<div class="header-center">
    <div class="container text-center">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php crazy_assan_custom_logo(); ?>
        </a>
    </div>
</div>
<!--navigation -->
<!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top menu-header-center sticky" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse">
            <?php if (has_nav_menu('primary_nav')) crazy_assan_main_center_nav(); ?>
        </div><!--/.nav-collapse -->
    </div><!--container-->
</div><!--navbar-default-->
<?php do_action('assan_theme_slider'); ?>