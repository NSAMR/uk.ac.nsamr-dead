<form action="<?php echo home_url('/'); ?>" method="get" class="side-search-form">
    <div class="form-group">
        <input type="text" name="s" placeholder="<?php _e("Search", "assan"); ?>" value="<?php the_search_query(); ?>" class="form-control" />
            <i class="fa fa-search"></i>
    </div>
</form>