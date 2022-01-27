<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$layout_abj = Helper::axil_layout_style_all();
$layout = $layout_abj['layout'];
$post_class = $layout_abj['post_class'];
$layout_class = $layout_abj['layout_class'];
?>
<?php get_header(); ?>
    <div class="banner banner__default bg-grey-light-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="author-details-block">
                        <div class="papr-container-content team-single-profile">
                            <?php while (have_posts()) : the_post();
                                $themepfix = AXIL_FIX_PRFX;
                                $designation = get_post_meta($id, "{$themepfix}_team_designation", true);
                                $axil_author_twitter = get_post_meta($id, $themepfix . '_twitter', true);
                                $axil_author_facebook = get_post_meta($id, $themepfix . '_facebook', true);
                                $axil_author_linkedin = get_post_meta($id, $themepfix . '_linkedin', true);
                                $axil_author_pinterest = get_post_meta($id, $themepfix . '_pinterest', true);
                                $axil_author_designation = get_post_meta($id, $themepfix . '_author_designation', true);
                                ?>
                                <div class="row">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="col-lg-8 col-md-12 col-sm-12">
                                        <div class="team-profile">
                                            <h1 class="h4 m-b-xs-15"><?php the_title(); ?></h1>
                                            <p class="designation"><?php echo esc_html($designation); ?></p>
                                            <div class="team-content">
                                                <p class="mid"><?php echo get_the_content(); ?></p>
                                            </div>
                                            <div class="team-social-share">
                                                <ul class="social-share social-share__with-bg">
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
                                                                    class="fab fa-pinterest-p"
                                                                    aria-hidden="true"></i></a>
                                                        </li><?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>