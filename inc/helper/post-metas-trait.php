<?php

/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait PostMetaTrait
{

    public static function AxilPostSingleAauthor($post_id = "", $author = "")
    {
        $userpfix = AXIL_THEME_FIX;
        $axil_author_twitter = get_user_meta($author, $userpfix . '_twitterurl', true);
        $axil_author_facebook = get_user_meta($author, $userpfix . '_facebookurl', true);
        $axil_author_linkedin = get_user_meta($author, $userpfix . '_linkedinurl', true);
        $axil_author_pinterest = get_user_meta($author, $userpfix . '_pinteresturl', true);
        $axil_author_designation = get_user_meta($author, $userpfix . '_author_designation', true);
        ?>
        <div class="about-author m-b-xs-60">
            <div class="media">
                <?php echo get_avatar($author, 105); ?>
                <div class="media-body">
                    <div class="media-body-title">
                        <h3><?php the_author_posts_link(); ?></h3>
                        <p class="designation"><?php if (!empty ($axil_author_designation)) {
                                echo esc_html($axil_author_designation);
                            } else {
                                $user_info = get_userdata($author);
                                echo esc_html(implode(', ', $user_info->roles));
                            } ?></p>
                    </div>
                    <div class="media-body-content">
                        <p><?php the_author_meta('user_description'); ?></p>
                        <ul class="social-share social-share__with-bg">
                            <?php if (!empty($axil_author_facebook)) { ?>
                                <li><a href="<?php echo esc_url($axil_author_facebook); ?>"><i
                                            class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                </li><?php } ?>
                            <?php if (!empty($axil_author_twitter)) { ?>
                                <li><a href="<?php echo esc_url($axil_author_twitter); ?>"><i class="fab fa-twitter"
                                                                                              aria-hidden="true"></i></a>
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

                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public static function AxilPostMetas_loadAnim($settings = "", $post_id = "", $author = "")
    {
        $formatted_post_date = get_the_date();
        $post_comment_num = number_format_i18n(get_comments_number());

        ?>
        <?php if ('yes' === $settings['post_author'] || 'yes' === $settings['post_date'] || 'yes' === $settings['post_update_date'] || 'yes' === $settings['post_comment'] || 'yes' === $settings['post_view'] || 'yes' === $settings['post_shares']): ?>
        <div class="post-metas banner-post-metas post-meta-primary load-anim">
            <ul class="list-inline">
                <?php if ('yes' === $settings['post_author']) { ?>
                    <li>
                        <!-- <span><?php /*esc_html_e('', 'papr');*/ ?></span> --> Updated<?php printf('<a href="%1$s"><span class="vcard author author_name"><span class="fn">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', $author))), get_the_author_meta('display_name', $author)); ?>
                    </li>
                <?php } ?>
                <?php if ('yes' === $settings['post_date']) { ?>
                    <li><i class="dot">.</i> <?php echo esc_attr($formatted_post_date); ?></li>
                <?php } ?>
                <?php if ('yes' === $settings['post_update_date']) { ?>
                    <li>
                        <i class="dot">.</i> <?php esc_html_e('Update:', 'papr'); ?> <?php echo get_post_modified_time(get_option('date_format') . ' ' . get_option('time_format'), false, null, true); ?>
                    </li>
                <?php } ?>
                <?php if ('yes' === $settings['post_comment']): ?>
                    <li class="axil-comments"><i class="fa fa-comments"
                                                 aria-hidden="true"></i> <?php echo wp_kses_post($post_comment_num); ?>
                    </li>
                <?php endif; ?>
                <?php if ('yes' === $settings['post_view'] && function_exists('axil_post_views')) { ?>
                    <li><?php echo axil_post_views('Views'); ?></li>
                <?php } ?>
                <?php if ('yes' === $settings['post_shares'] && function_exists('shared_counts')) { ?>
                    <li class="papr-meta-total-share post-grid-meta"><i class="feather icon-share-2"></i>
                        <?php
                        shared_counts()->front->display($location = 'papr-meta', $echo = true, $style = 'icon');
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php endif;
    }

    public static function AxilPostMetas($settings = "", $post_id = "", $author = "")
    {
        $formatted_post_date = get_the_date();
        $post_comment_num = number_format_i18n(get_comments_number());

        ?>
        <?php if ('yes' === $settings['post_author'] || 'yes' === $settings['post_date'] || 'yes' === $settings['post_update_date'] || 'yes' === $settings['post_comment'] || 'yes' === $settings['post_view'] || 'yes' === $settings['post_shares']): ?>
        <div class="post-metas caption-meta">
            <ul class="list-inline">
                <?php if ('yes' === $settings['post_author']) { ?>
                    <li>
                        <span><?php esc_html_e('', 'papr'); ?></span> <?php printf('<a href="%1$s"><span class="vcard author author_name"><span class="fn">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', $author))), get_the_author_meta('display_name', $author)); ?>
                    </li>
                <?php } ?>
                <?php if ('yes' === $settings['post_date']) { ?>
                    <li><i class="dot">.</i> <?php echo esc_attr($formatted_post_date); ?></li>
                <?php } ?>
                <?php if ('yes' === $settings['post_update_date']) { ?>
                    <li>
                        <i class="dot">.</i> <?php esc_html_e('Update:', 'papr'); ?> <?php echo get_post_modified_time(get_option('date_format') . ' ' . get_option('time_format'), false, null, true); ?>
                    </li>
                <?php } ?>
                <?php if ('yes' === $settings['post_comment']): ?>
                    <li class="axil-comments"><i class="fa fa-comments"
                                                 aria-hidden="true"></i> <?php echo wp_kses_post($post_comment_num); ?>
                    </li>
                <?php endif; ?>
                <?php if ('yes' === $settings['post_view'] && function_exists('axil_post_views')) { ?>
                    <li><?php echo axil_post_views('Views'); ?></li>
                <?php } ?>
                <?php if ('yes' === $settings['post_shares'] && function_exists('shared_counts')) { ?>
                    <li class="papr-meta-total-share post-grid-meta"><i class="feather icon-share-2"></i>
                        <?php shared_counts()->front->display($location = 'papr-meta', $echo = true, $style = 'icon'); ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php endif;
    }

    public static function AxilPostAuthorMetas($settings = "", $post_id = "", $author = "")
    {
        ?>
        <?php if ('yes' === $settings['post_author']): ?>
        <div class="caption-meta">
            <span><?php esc_html_e('', 'papr'); ?></span> <?php printf('<a href="%1$s"><span class="vcard author">
				<span class="fn">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', $author))), get_the_author_meta('display_name', $author)); ?>
        </div>
    <?php endif;
    }

    public static function AxilPostAuthorMetalight($settings = "", $post_id = "", $author = "")
    {
        ?>
        <?php if ('yes' === $settings['post_author']): ?>
        <div class="post-metas caption-meta">
            <ul class="list-inline">
                <?php if ('yes' === $settings['post_author']) { ?>
                    <li><span><?php esc_html_e('', 'papr'); ?></span> <?php printf('<a href="%1$s"><span class="vcard author">
				<span class="fn">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', $author))), get_the_author_meta('display_name', $author)); ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php endif;
    }

    public static function AxilBLogPostMetas($post_id = "", $author = "")
    {
        $papr_options = Helper::axil_get_options();
        $formatted_post_date = get_the_date();
        $post_comment_num = number_format_i18n(get_comments_number());
        ?>
        <div class="post-metas caption-meta">
            <ul class="list-inline">
                <?php if ($papr_options['blog_author_name']) { ?>
                    <li>
                        <span><?php esc_html_e('', 'papr'); ?></span> <?php printf('<a href="%1$s"><span class="vcard author author_name"><span class="fn">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', $author))), get_the_author_meta('display_name', $author)); ?>
                    </li>
                <?php } ?>
                <?php if ($papr_options['blog_date']) { ?>
                    <li><i class="dot">.</i> <?php echo esc_attr($formatted_post_date); ?></li>
                <?php } ?>

                <?php if ($papr_options['blog_update_date']) { ?>
                    <li>
                        <i class="dot">.</i> <?php esc_html_e('Update:', 'papr'); ?> <?php echo get_post_modified_time(get_option('date_format') . ' ' . get_option('time_format'), false, null, true); ?>
                    </li>
                <?php } ?>
                <?php if ($papr_options['blog_comment_num']): ?>
                    <li class="axil-comments"><i class="fa fa-comments"
                                                 aria-hidden="true"></i> <?php echo wp_kses_post($post_comment_num); ?>
                    </li>
                <?php endif; ?>
                <?php if ($papr_options['blog_view'] && function_exists('axil_post_views')) { ?>
                    <li><?php echo axil_post_views('Views'); ?></li>
                <?php } ?>
                <?php if ($papr_options['blog_shares'] && function_exists('shared_counts')) { ?>
                    <li class="papr-meta-total-share post-grid-meta"><i class="feather icon-share-2"></i>
                        <?php
                        shared_counts()->front->display($location = 'papr-meta', $echo = true, $style = 'icon');
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }

    public static function AxilAuthorPostMetas($post_id = "", $author = "")
    {
        $papr_options = Helper::axil_get_options();
        $formatted_post_date = get_the_date();
        $post_comment_num = number_format_i18n(get_comments_number());
        ?>
        <div class="post-metas caption-meta">
            <ul class="list-inline">
                <?php if ($papr_options['author_author_name']) { ?>
                    <li>
                        <span><?php esc_html_e('', 'papr'); ?></span> <?php printf('<a href="%1$s"><span class="vcard author author_name"><span class="fn">%2$s</span></span></a>', esc_url(get_author_posts_url(get_the_author_meta('ID', $author))), get_the_author_meta('display_name', $author)); ?>
                    </li>
                <?php } ?>
                <?php if ($papr_options['author_date']) { ?>
                    <li><i class="dot">.</i> <?php echo esc_attr($formatted_post_date); ?></li>
                <?php } ?>

                <?php if ($papr_options['author_update_date']) { ?>
                    <li>
                        <i class="dot">.</i> <?php esc_html_e('Update:', 'papr'); ?> <?php echo get_post_modified_time(get_option('date_format') . ' ' . get_option('time_format'), false, null, true); ?>
                    </li>
                <?php } ?>
                <?php if ($papr_options['author_comment_num']): ?>
                    <li class="axil-comments"><i class="fa fa-comments"
                                                 aria-hidden="true"></i> <?php echo wp_kses_post($post_comment_num); ?>
                    </li>
                <?php endif; ?>
                <?php if ($papr_options['author_view'] && function_exists('axil_post_views')) { ?>
                    <li><?php echo axil_post_views('Views'); ?></li>
                <?php } ?>
                <?php if ($papr_options['author_shares'] && function_exists('shared_counts')) { ?>
                    <li class="papr-meta-total-share post-grid-meta"><i class="feather icon-share-2"></i>
                        <?php
                        shared_counts()->front->display($location = 'papr-meta', $echo = true, $style = 'icon');
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }

    public static function AxilBLogSingleJustifyMetas($post_id = "", $author = "")
    {
        $papr_options = Helper::axil_get_options();
        ?>
        <div class="post-metas banner-post-metas m-t-xs-20">
            <ul class="list-inline justify-content-center">
                <?php if ($papr_options['post_author_name']) { ?>
                    <li><span><?php esc_html_e('', 'papr'); ?></span>
                        <?php echo get_the_author_link(); ?>
                    </li>
                <?php } ?>
                <?php if ($papr_options['post_date']) { ?>
                    <li><i class="dot">.</i> <span class="published updated"><?php echo get_the_date(); ?></span></li>
                <?php } ?>

                <?php if ($papr_options['post_update_date']) { ?>
                    <li>
                        <i class="dot">.</i> <?php esc_html_e('Update:', 'papr'); ?> <?php echo get_post_modified_time(get_option('date_format') . ' ' . get_option('time_format'), false, null, true); ?>
                    </li>
                <?php } ?>

                <?php if ($papr_options['post_view'] && function_exists('axil_post_views')) { ?>
                    <li><?php echo axil_post_views('Views'); ?></li>
                <?php } ?>
                <?php if ($papr_options['post_shares'] && function_exists('shared_counts')) { ?>
                    <li class="papr-meta-total-share"><i class="feather icon-share-2"></i>
                        <?php
                        shared_counts()->front->display($location = 'papr-meta', $echo = true, $style = 'icon');
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }

    public static function AxilBLogSingleMetas($post_id = "", $author = "")
    {
        $papr_options = Helper::axil_get_options();
        $formatted_post_date = get_the_date();
        $post_comment_num = number_format_i18n(get_comments_number());
        ?>
        <div class="post-metas banner-post-metas m-t-xs-20">
            <ul class="axil-post-meta list-inline">
                <?php if ($papr_options['post_author_name']) { ?>
                    <li>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID', $author))) ?>"
                           class="post-author post-author-with-img">
                            <?php
                            $args = array('class' => 'rounded-circle');
                            echo get_avatar(get_the_author_meta('ID'), 105, '', '', $args); ?>
                            <span><?php echo get_the_author_meta('display_name', $author); ?></span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($papr_options['post_date']) { ?>
                    <li><i class="dot">.</i> <span class="published updated"><?php echo get_the_date(); ?></span></li>
                <?php } ?>
                <?php if ($papr_options['post_update_date']) { ?>
                    <li>
                        <i class="dot">.</i> <?php esc_html_e('Update:', 'papr'); ?> <?php echo get_post_modified_time(get_option('date_format') . ' ' . get_option('time_format'), false, null, true); ?>
                    </li>
                <?php } ?>
                <?php if ($papr_options['post_comment_num']): ?>
                    <li class="axil-comments">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <?php echo wp_kses_post($post_comment_num); ?>
                    </li>
                <?php endif; ?>
                <?php if ($papr_options['post_view'] && function_exists('axil_post_views')) { ?>
                    <li><?php echo axil_post_views('Views'); ?></li>
                <?php } ?>
                <?php if ($papr_options['post_shares'] && function_exists('shared_counts')) { ?>
                    <li class="papr-meta-total-share"><i class="feather icon-share-2"></i>
                        <?php
                        shared_counts()->front->display($location = 'papr-meta', $echo = true, $style = 'icon');
                        ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <?php
    }


}