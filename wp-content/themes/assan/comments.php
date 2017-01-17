<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');



if (post_password_required()) {
    ?>
    <div class="alert alert-info">
        <?php _e("This post is password protected. Enter the password to view comments.", "assan"); ?>
    </div>
    <?php
    return;
}
?>
<?php if (have_comments()) : ?>
    <div class="comment-post">
        <h3><?php comments_number('<span>' . __("No Comment", "assan") . '</span> ', '<span>' . __("1 Comment", "assan") . '</span> ', '<span>% Comments</span> '); ?></h3>
        <ul class="row">
            <?php wp_list_comments('type=comment&callback=crazy_assan_comments'); ?>
        </ul>
    </div><!--comments-->

    <?php crazy_assan_comment_nav(); ?>
<?php endif; ?>
<?php
$assan_comment_form = array(
    'id_form' => 'commentform',
    'class_submit' => 'btn btn-theme-bg btn-lg pull-right',
    'id_submit' => 'Send Comment',
    'title_reply' => __('<h3>Leave a Comment</h3>', 'assan'),
    'title_reply_to' => __('Leave a Reply to %s', 'assan'),
    'cancel_reply_link' => __('Cancel Reply', 'assan'),
    'label_submit' => __('Send Comment', 'assan'),
    'comment_field' => '<div class="row"><div class="col-md-12 form-group"><textarea id="comment" class="form-control" placeholder="Your Comment..." name="comment" cols="45" rows="6" aria-required="true"></textarea></div></div>',
    'must_log_in' => '<p class="must-log-in">' .
    sprintf(
            __('You must be <a href="%s">logged in</a> to post a comment.', 'assan'), wp_login_url(apply_filters('the_permalink', get_permalink()))
    ) . '</p>',
    'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
            __('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'assan'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))
    ) . '</p>',
    'comment_notes_before' => '<p class="comment-notes">' .
    __('Your email address will not be published.', 'assan') . '</p>',
    'comment_notes_after' => '',
    'fields' => apply_filters('comment_form_default_fields', array(
        'author' =>
        '<div class="row"><div class="col-md-6 form-group">' .
        '<input id="author" placeholder="Name*" class="form-control" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
        '" size="30" /></div>',
        'email' =>
        '<div class="col-md-6 form-group">' .
        '<input id="email" placeholder="Email*" class="form-control" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
        '" size="30" /></div></div>',
            )
    ),
);
?>
<?php if (comments_open()) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="comment-form">
                <?php comment_form($assan_comment_form); ?>
            </div>
        </div>
    </div>

<?php endif; ?>