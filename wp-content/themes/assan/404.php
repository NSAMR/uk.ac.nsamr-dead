<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
?>
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4><?php _e('Oops! That page can&rsquo;t be found.', 'assan'); ?></h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <?php crazy_assan_breadcrumb(); ?>
                </ol>
            </div>
        </div>
    </div>
</div><!--breadcrumbs-->
<div class="divide80"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center error-text">
            <div class="divide30"></div>
            <h1 class="error-digit wow animated fadeInUp margin20"><i class="fa fa-thumbs-down"></i></h1>
            <h2><?php _e('Page you are trying to search not found.', 'assan'); ?></h2>
            <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'assan'); ?></p>
            <p><a href="<?php echo home_url(); ?>" class="btn border-black btn-lg">Go Back</a></p>
        </div>
    </div>
</div>
<?php get_footer(); ?>
