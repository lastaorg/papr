<?php
/**
 * Single post layout 4
 *
 * @author  Basliel
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$layout_abj = Helper::axil_layout_style_all();
$layout = $layout_abj['layout'];
$layout_class = $layout_abj['layout_class'];
$papr_options = Helper::axil_get_options();
$subtitle = get_post_meta(get_the_ID(), 'axil_subtitle', true);
$youtube_link = get_post_meta(get_the_ID(), 'axil_youtube_link', true);
$post_id = get_the_ID();
$author = $post->post_author;

$post_thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
$banner_wrapper_class = ($post_thumb_url) ? 'banner__single-post single-banner__type-two' : 'banner__default bg-grey-light-three';
?>
<!-- Banner starts -->
<div class="banner banner__single-post banner__single-hero banner-single-4"
     style="background-image: url(<?php echo esc_url($post_thumb_url); ?>);">
    <?php if ($post_thumb_url): ?>
        <div class="grad-overlay"></div>
    <?php endif ?>
    <div class="container">
        <div class="post-title-wrapper text-center">
            <div class="btn-group m-b-xs-10">
                <?php echo axil_get_the_category($post_id); ?>
            </div>
            <?php if (get_the_title()): ?>
                <?php the_title('<h1 class="m-b-xs-0 axil-post-title hover-line color-white">', '</h1>'); ?>
            <?php endif ?>
            <?php echo Helper::AxilBLogSingleJustifyMetas($post_id, $author); ?>
            <!-- End of .post-metas -->
        </div>
        <!-- End of .post-title-wrapper -->
    </div>
    <!-- End of .container -->
</div>
<!-- End of .banner -->
<!-- post-details starts -->
<div class="post-single-wrapper p-t-xs-60">
    <div class="container">
        <?php if (true == $papr_options['post_share_display_top'] && function_exists('shared_counts')): ?>
            <div class="social-share-sticky">
                <?php shared_counts()->front->display($location = 'sidebar-top', $echo = true, $style = 'icon'); ?>
            </div>
        <?php endif ?>
        <div class="row">
            <?php
            Helper::axil_left_get_sidebar();
            ?>
            <div class="<?php echo esc_attr($layout_class); ?>">
                <article class="post-details">
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'papr') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '<span class="screen-reader-text">' . esc_html__('Page', 'papr') . ' </span>%',
                        'separator' => '<span class="screen-reader-text">, </span>',
                    ));
                    ?>
                </article>
                <?php if ($papr_options['post_tags'] && has_tag()): ?>
                    <div class="tag entry-tags">
                        <span><?php esc_html_e('Tags:', 'papr'); ?></span><?php echo get_the_term_list($post->ID, 'post_tag', '', ', '); ?>
                    </div>
                <?php endif; ?>

                <?php if (true == $papr_options['post_share_display_footer'] && has_action('after_post_content') && function_exists('shared_counts')): ?>
                    <div class="post-shares m-t-xs-60">
                        <div class="title"><?php esc_html_e('Share:', 'papr'); ?></div>
                        <?php do_action('after_post_content'); ?>
                    </div>
                <?php endif ?>

                <?php if ($papr_options['post_author_bio'] == '1') { ?>
                    <hr class="m-t-xs-60 m-b-xs-60">
                    <?php
                    echo Helper::AxilPostSingleAauthor($post_id, $author);
                } ?>
                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
                <?php if ($papr_options['post_links']) {
                    axil_post_links_next_prev();
                } ?>

            </div>
            <?php
            Helper::axil_right_get_sidebar();
            ?>
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->
</div>

<?php if ($papr_options['show_related_post'] == '1' && is_single() && !empty (papr_related_post_grid())) { ?>
    <div class="related-post p-b-xs-30">
        <?php papr_related_post_grid(); ?>
    </div>
<?php } ?>
