<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$layout_abj = Helper::axil_layout_style_all();
$layout_class = $layout_abj['layout_class'];
$post_class = $layout_abj['post_class'];
$layout = $layout_abj['layout'];
$papr_options = Helper::axil_get_options();
$sidebar 	= Helper::axil_sidebar_options();
$has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 axil-main' : 'col-xl-12 axil-main';

if ($papr_options['author_style'] == 'style2') {
    $author_style_layout_class = "axil-list-2 masonry-holder";
} else {
    $author_style_layout_class = "axil-list-1";
}

if ($papr_options['author_style'] == 'style2') {
    // Layout class
    if ($layout == 'full-width') {
        $layout_class = 'col-12';
        $post_class = 'col-lg-4 col-md-4 col-sm-6 masonry-item';
    } else {
        $layout_class = $has_sidebar_contnet;
        $post_class = 'col-lg-6 masonry-item';
    }
} else {
    if ($layout == 'full-width') {
        $layout_class = 'col-12';
        $post_class = 'col-lg-6 col-md-6 col-sm-6';
    } else {
        $layout_class = $has_sidebar_contnet;
        $post_class = 'col-lg-12';
    }
}
$author = $post->post_author;
$userpfix = AXIL_THEME_FIX;
$axil_author_twitter = get_user_meta($author, $userpfix . '_twitterurl', true);
$axil_author_facebook = get_user_meta($author, $userpfix . '_facebookurl', true);
$axil_author_linkedin = get_user_meta($author, $userpfix . '_linkedinurl', true);
$axil_author_pinterest = get_user_meta($author, $userpfix . '_pinteresturl', true);
$get_author_id = get_the_author_meta('ID');
$axil_author_website = get_the_author_meta('user_url');
$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 210));

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$comment_args = array(
    'post_author' => $get_author_id // fill in post author ID
);
$author_comments = get_comments($comment_args);
$author_total_comment = count($author_comments);

?>
<?php get_header(); ?>
<section class="banner banner__default bg-grey-light-three">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="author-details-block">
                    <div class="media post-block post-block__mid m-b-xs-0">
                        <div class="author-image-container align-self-center">
                            <img src="<?php echo esc_url($get_author_gravatar); ?>"
                                 alt="<?php echo get_the_author_meta('display_name', $author) ?>" class="author image">
                        </div>
                        <div class="media-body">
                            <h1 class="h4 m-b-xs-15"><?php echo get_the_author_meta('display_name', $author); ?></h1>
                            <?php if (!empty($axil_author_website)) { ?> <p class="hover-line"><a
                                        href="<?php echo esc_url($axil_author_website); ?>"><?php echo esc_html($axil_author_website); ?></a>
                            </p> <?php } ?>
                            <p class="mid"><?php if (!empty (get_the_author_meta('description', $author))) {
                                    echo get_the_author_meta('description', $author);
                                } else {
                                    $user_info = get_userdata($author);
                                    echo esc_html(implode(', ', $user_info->roles));
                                } ?></p>
                            <div class="post-metas">
                                <ul class="list-inline">
                                    <li><i class="fal fa-user-edit"></i><?php esc_attr_e('Total Post', 'papr'); ?>
                                        (<?php echo count_user_posts($get_author_id); ?>)
                                    </li>
                                    <?php if (!empty($author_total_comment)) { ?>
                                        <li><i class="fal fa-comment"></i><?php esc_attr_e('Comments', 'papr'); ?>
                                            (<?php echo esc_html($author_total_comment); ?>)
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="author-social-share">
                                <ul class="social-share social-share__with-bg">
                                    <?php if (!empty($axil_author_facebook)) { ?>
                                        <li><a href="<?php echo esc_url($axil_author_facebook); ?>"><i
                                                    class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                        </li><?php } ?>
                                    <?php if (!empty($axil_author_twitter)) { ?>
                                        <li><a href="<?php echo esc_url($axil_author_twitter); ?>"><i
                                                    class="fab fa-twitter" aria-hidden="true"></i></a>
                                        </li><?php } ?>
                                    <?php if (!empty($axil_author_linkedin)) { ?>
                                        <li><a href="<?php echo esc_url($axil_author_linkedin); ?>"><i
                                                    class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                                        </li><?php } ?>
                                    <?php if (!empty($axil_author_pinterest)) { ?>
                                        <li><a href="<?php echo esc_url($axil_author_pinterest); ?>"><i
                                                    class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        </li><?php } ?>
                                </ul>
                            </div>
                            <!-- End of .author-social-share -->
                        </div>
                        <!-- End of  .media-body -->
                    </div>
                    <!-- End of .media -->
                </div>
                <!-- End of .author-details-block -->
            </div>
            <!-- End of .col-lg-8 -->
        </div>
    </div>
    <!-- End of .container -->
</section>

<div class="papr-container">
    <div class="container">
        <div class="row theiaStickySidebar">
            <?php
            Helper::axil_left_get_sidebar();
            ?>
            <div class="<?php echo esc_attr($layout_class); ?>">
                <?php echo Helper::ad_post_before_content(); ?>
                <div class="papr-container-content">
                    <?php if (have_posts()) : ?>
                        <?php
                        if (!empty($papr_options['articles_by_this_author'])) {
                            ?><h2 class="h3 m-b-xs-30"><?php echo esc_html($papr_options['articles_by_this_author']); ?></h2><?php
                        }
                        ?>

                        <div class="row <?php echo esc_attr($author_style_layout_class); ?>">
                            <?php
                            while (have_posts()) : the_post();
                                if ($papr_options['author_style'] == 'style2') { ?>
                                    <div class="<?php echo esc_attr($post_class); ?>">
                                        <?php get_template_part('template-parts/blog/author-content-2', get_post_format()); ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="<?php echo esc_attr($post_class); ?>">
                                        <?php get_template_part('template-parts/blog/author-content-1', get_post_format()); ?>
                                    </div>
                                    <?php
                                }
                            endwhile;
                            ?>
                        </div>
                        <div class="pagination-holder">
                            <?php Helper::pagination(); ?>
                        </div>
                    <?php else: ?>
                        <?php get_template_part('template-parts/content', 'none'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            Helper::axil_right_get_sidebar();
            ?>

        </div>
    </div>
</div>
<?php get_footer(); ?>
