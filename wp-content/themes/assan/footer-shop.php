<?php
$footer_layout = get_assan_theme_options('footer_layout');
$footer_skin = get_assan_theme_options('footer_skin');
$copyright_text = get_assan_theme_options('copyright_text');
$columns_class = array(3 => "col-md-4 col-sm-6", 4 => "col-md-3 col-sm-6", 2 => "col-md-6 col-sm-6", 1 => "col-md-6 col-md-offset-3 text-center");
?>
<div class="divide60"></div>
<?php if (is_active_sidebar('shop-prefooter')): ?>
    <div class="shop-pre-footer">
        <div class="container">
            <div class="row">
                <?php dynamic_sidebar('shop-prefooter'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($footer_skin == 'light'):
    ?>
    <footer class="footer-light-1">
        <div class="container">
            <div class="row">
                <?php
                for ($i = 1; $i <= $footer_layout; $i++) {
                    $sidebar = 'footer-' . $i;
                    ?>
                    <div class="<?php echo $columns_class[$footer_layout] ?> col-xs-12 margin30">
                        <?php dynamic_sidebar($sidebar); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="footer-copyright text-center"><?php echo $copyright_text; ?></div>
    </footer>    
<?php else: ?>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <?php
                for ($i = 1; $i <= $footer_layout; $i++) {
                    $sidebar = 'footer-' . $i;
                    ?>
                    <div class="<?php echo $columns_class[$footer_layout] ?> col-xs-12 margin30">
                        <?php dynamic_sidebar($sidebar); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="footer-btm">
                        <span><?php echo $copyright_text; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
<div id="back-to-top">
    <a href="javascript:void();"><i class="fa fa-angle-up"></i></a>
</div>
<?php wp_footer(); ?>
</div>
</body>
</html>