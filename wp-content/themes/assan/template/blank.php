<?php
// Template Name: Blank Page
get_header();
?>
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4><?php the_title(); ?></h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <?php crazy_assan_breadcrumb(); ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="divide80"></div>
<?php
// Start the loop.
while (have_posts()) : the_post();
    the_content();
endwhile;
?>
<?php get_footer(); ?>