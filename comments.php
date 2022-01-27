<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

function move_comment_field_to_bottom($fields)
{
    $temp = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $temp;
    return $fields;
}

if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-section">
    <?php if (have_comments()): ?>
        <?php
        $axil_comment_number = get_comments_number();
        $axil_comments_info = number_format_i18n($axil_comment_number);
        if ($axil_comment_number > 1) {
            $axil_comments_info .= esc_html__(' Comments', 'papr');
        } else {
            $axil_comments_info .= esc_html__(' Comment', 'papr');
        }
        ?>
        <div class="comment-box">
            <h2><?php echo esc_html($axil_comments_info); ?></h2>
        </div>
        <?php
        $axil_avatar = get_option('show_avatars');
        $axil_avatar_class = empty($axil_avatar) ? ' avatar-disabled' : '';
        ?>
        <ul class="comment-list <?php echo esc_attr($axil_avatar_class); ?>">
            <?php
            wp_list_comments(
                array(
                    'style' => 'ul',
                    'callback' => 'Helper::comments_callback',
                    'reply_text' => esc_html__('Reply', 'papr'),
                    'avatar_size' => 100,
                    'format' => 'html5'
                )
            );
            ?>
        </ul>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="pagination-area comment-pagination">
                <ul>
                    <li><?php previous_comments_link(esc_html__('Older Comments', 'papr')); ?></li>
                    <li><?php next_comments_link(esc_html__('Newer Comments', 'papr')); ?></li>
                </ul>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="comments-closed"><?php esc_html_e('Comments are closed.', 'papr'); ?></p>
    <?php endif; ?>

    <?php
    // Start displaying Comment Form
    $axil_commenter = wp_get_current_commenter();
    $axil_req = get_option('require_name_email');
    $axil_aria_req = ($axil_req ? " required" : '');

    $axil_fields = array(
        'author' =>
            '<div class="row"><div class="col-sm-4"><div class="form-group comment-form-author"><label for="author">' . esc_attr('Name', 'papr') . '' . ($axil_req ? '<span>*</span>' : '') . '</label><input type="text" id="author" name="author" value="' . esc_attr($axil_commenter['comment_author']) . '"  class="axil-form-control"' . $axil_aria_req . '></div></div>',

        'email' =>
            '<div class="col-sm-4 comment-form-email"><div class="form-group"><label for="email">' . esc_attr('Email', 'papr') . '' . ($axil_req ? '<span>*</span>' : '') . '</label><input id="email" name="email" type="email" value="' . esc_attr($axil_commenter['comment_author_email']) . '" class="axil-form-control"' . $axil_aria_req . '></div></div>',

        'url' =>
            '<div class="col-sm-4 comment-form-website"><div class="form-group"><label for="website">' . esc_attr('Website', 'papr') . '</label><input id="website" name="website" type="text" value="' . esc_attr($axil_commenter['comment_author_url']) . '" class="axil-form-control"></div></div></div>',
    );
    $axil_args = array(
        'class_submit' => 'btn btn-primary',
        'submit_field' => '<div class="row"><div class="col-md-12"><div class="form-group form-submit">%1$s %2$s</div></div></div>',
        'comment_field' => '<div class="row"><div class="col-md-12"><div class="form-group comment-form-comment"><label for="comment">' . esc_attr('Comment', 'papr') . '' . ($axil_req ? '<span>*</span>' : '') . '</label><textarea id="comment" name="comment" required class="textarea axil-form-control" rows="5" cols="40"></textarea></div></div></div>',
        'fields' => apply_filters('comment_form_default_fields', $axil_fields),
        'format' => 'xhtml'

    );
    ?>
    <div class="reply-separator"></div>
    <?php comment_form($axil_args); ?>
</div>