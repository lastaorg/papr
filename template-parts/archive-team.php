<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$themepfix = AXIL_FIX_PRFX;
$thumb_size = "axil-size-md";
$layout_abj = Helper::axil_layout_custom_taxonomy();
$layout = $layout_abj['layout'];
$post_class = $layout_abj['post_class'];
$layout_class = $layout_abj['layout_class'];

?>
<?php get_header(); ?>
    <div class="papr-container axil-team-grid-wrapper">
        <div class="container">
            <div class="row">
                <?php
                if ($layout == 'left-sidebar') {
                    get_sidebar();
                }
                ?>

                <div class="<?php echo esc_attr($layout_class); ?>">
                    <?php if (have_posts()) : ?>
                        <div class="papr-container-content row">
                            <?php while (have_posts()) : the_post(); ?>

                                <?php
                                $id = get_the_id();
                                $designation = get_post_meta($id, "{$themepfix}_team_designation", true);
                                $axil_author_twitter = get_post_meta($id, $themepfix . '_twitter', true);
                                $axil_author_facebook = get_post_meta($id, $themepfix . '_facebook', true);
                                $axil_author_linkedin = get_post_meta($id, $themepfix . '_linkedin', true);
                                $axil_author_pinterest = get_post_meta($id, $themepfix . '_pinterest', true);
                                $axil_author_designation = get_post_meta($id, $themepfix . '_author_designation', true);
                                ?>

                                <div class="<?php echo esc_attr($post_class); ?>">
                                    <div class="axil-team-block m-b-xs-30">
                                        <?php
                                        if (has_post_thumbnail()) { ?>
                                            <a href="<?php the_permalink(); ?>" class="d-block img-container">
                                                <?php the_post_thumbnail($thumb_size); ?>
                                            </a>
                                        <?php } ?>
                                        <div class="axil-team-inner-content text-center">
                                            <h3 class="axil-member-title hover-line"><a
                                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="axil-designation"><?php echo esc_html($designation); ?></div>
                                        </div>
                                        <!-- End of .axil-team-inner-content -->
                                        <div class="axil-team-share-wrapper">
                                            <ul class="social-share social-share__with-bg social-share__with-bg-white social-share__vertical">
                                                <?php if (!empty($axil_author_facebook)) { ?>
                                                    <li><a href="<?php echo esc_url($axil_author_facebook); ?>">
                                                        <i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                                    </li><?php } ?>
                                                <?php if (!empty($axil_author_twitter)) { ?>
                                                    <li><a href="<?php echo esc_url($axil_author_twitter); ?>"><i
                                                                class="fab fa-twitter" aria-hidden="true"></i></a>
                                                    </li><?php } ?>
                                                <?php if (!empty($axil_author_linkedin)) { ?>
                                                    <li><a href="<?php echo esc_url($axil_author_linkedin); ?>"><i
                                                                class="fab fa-linkedin-in" aria-hidden="true"></i>
                                                    </a></li><?php } ?>
                                                <?php if (!empty($axil_author_pinterest)) { ?>
                                                    <li><a href="<?php echo esc_url($axil_author_pinterest); ?>"><i
                                                                class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                                    </li><?php } ?>
                                            </ul>
                                            <!-- End of .social-share -->
                                        </div>

                                        <!-- End of .axil-team-share-wrapper -->
                                    </div>
                                    <!-- End of .team-block -->
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php Helper::pagination(); ?>

                    <?php endif; ?>
                </div>
                <?php
                if ($layout == 'right-sidebar') {
                    get_sidebar();
                }
                ?>

            </div>
        </div>
    </div>
<?php get_footer(); ?>