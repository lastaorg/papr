<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
?>
<div class="no-results not-found m-b-xs-60">
    <h2 class="page-title"><?php esc_html_e('Nothing Found', 'papr'); ?></h2>
    <div class="page-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf(' Ready to publish your first post? <a href="%s" class="link">%s</a>', esc_url(admin_url('post-new.php')), esc_html__('Get started here', 'papr')); ?></p>
        <?php elseif (is_search()) : ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'papr'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e("It seems we can't find what you're looking for. Perhaps searching can help.", 'papr'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div><!-- .page-content -->
</div><!-- .no-results -->