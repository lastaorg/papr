<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$papr_options = Helper::axil_get_options();
$axil_image_size = 'axil-size-md';
$content = Helper::get_current_post_content();
$content = wp_trim_words($content, $papr_options['blog_content_number']);
$content = "<p class='mid'>$content</p>";
$post_id = get_the_ID();
$author = $post->post_author;
$axil_post_or_page_cat = get_the_category($post_id);
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="media post-block post-block__mid m-b-xs-30">
        <?php Helper::get_generate_blog_thumbnail_image($post_id, $class = "m-r-xs-30", $axil_image_size); ?>
        <div class="media-body">
            <?php if ($papr_options['blog_cats'] && !empty($axil_post_or_page_cat)) { ?>
                <div class="post-cat-group m-b-xs-10">
                    <?php echo axil_get_the_category($post_id); ?>
                </div>
            <?php } ?>
            <h3 class="axil-post-title hover-line"><a href="<?php the_permalink(); ?>" class="entry-title"
                                                      rel="bookmark"><?php the_title(); ?></a></h3>
            <?php echo Helper::AxilBLogPostMetas($post_id, $author); ?>
            <?php if ($papr_options['blog_content_display']) {
                the_excerpt();
            } ?>
        </div>
    </div>
</div>
