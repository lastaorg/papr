<?php

/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait advertisementsTrait
{

    public static function ad_post_header_mid()
    {
        $papr_options = self::axil_get_options();
        if ($papr_options['ad_post_header_mid_activate']) {
            if ($papr_options['ad_post_header_mid_type'] == 'code') {
                print(($papr_options['ad_post_header_mid_code']));
            } else if ($papr_options['ad_post_header_mid_type'] == 'image' && !empty ($papr_options['ad_post_header_mid_image']['url'])) { ?>
                <div class="add-container">
                    <?php if ($papr_options['ad_post_header_mid_url']) { ?>
                        <a class="before-content-ad-color" <?php if ($papr_options['ad_post_header_mid_link_type'] == 'blank') { ?> target="_blank"<?php } ?>
                           href="<?php echo esc_url($papr_options['ad_post_header_mid_url']); ?>">
                            <img src="<?php echo esc_url($papr_options['ad_post_header_mid_image']['url']); ?>"
                                 alt="<?php esc_attr(bloginfo('name')); ?>"></a>
                    <?php } else { ?>
                        <img src="<?php echo esc_url($papr_options['ad_post_header_mid_image']['url']); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                </div>
            <?php }
        }
    }

    public static function ad_post_before_content()
    {
        $papr_options = self::axil_get_options();
        if ($papr_options['ad_post_before_content_activate']) {
            if ($papr_options['ad_post_before_content_type'] == 'code') {
                print(($papr_options['ad_post_before_content_code']));
            } else if ($papr_options['ad_post_before_content_type'] == 'image' && !empty ($papr_options['ad_post_before_content_image']['url'])) { ?>
                <div class="add-container m-b-xs-30">
                    <?php if ($papr_options['ad_post_before_content_url']) { ?>
                        <a class="before-content-ad-color" <?php if ($papr_options['ad_post_before_content_link_type'] == 'blank') { ?> target="_blank"<?php } ?>
                           href="<?php echo esc_url($papr_options['ad_post_before_content_url']); ?>">
                            <img src="<?php echo esc_url($papr_options['ad_post_before_content_image']['url']); ?>"
                                 alt="<?php esc_attr(bloginfo('name')); ?>"></a>
                    <?php } else { ?>
                        <img src="<?php echo esc_url($papr_options['ad_post_before_content_image']['url']); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                </div>
            <?php }
        }
    }

    public static function ad_post_after_content()
    {
        $papr_options = self::axil_get_options();
        if ($papr_options['ad_post_after_content_activate']) {
            if ($papr_options['ad_post_after_content_type'] == 'code') {
                print(($papr_options['ad_post_after_content_code']));
            } else if ($papr_options['ad_post_after_content_image']['url'] && $papr_options['ad_post_after_content_type'] == 'image') { ?>
                <div class="add-container m-t-xs-30 m-b-xs-30">
                    <?php if ($papr_options['ad_post_after_content_url']) { ?>
                        <a class="after-content-ad-color"
                           target="<?php if ($papr_options['ad_post_after_content_link_type'] == 'blank') { ?>_blank<?php } ?>"
                           href="<?php echo esc_url($papr_options['ad_post_after_content_url']); ?>">
                            <img src="<?php echo esc_url($papr_options['ad_post_after_content_image']['url']); ?>"
                                 alt="<?php esc_attr(bloginfo('name')); ?>">
                        </a>
                    <?php } else { ?>
                        <img src="<?php echo esc_url($papr_options['ad_post_after_content_image']['url']); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                </div>
            <?php }

        }
    }

    public static function ad_post_before_sidebar()
    {
        $papr_options = self::axil_get_options();
        if ($papr_options['ad_post_before_sidebar_activate']) {
            if ($papr_options['ad_post_before_sidebar_type'] == 'code') {
                print(($papr_options['ad_post_before_sidebar_code']));
            } else if ($papr_options['ad_post_before_sidebar_type'] == 'image' && !empty ($papr_options['ad_post_before_sidebar_image']['url'])) { ?>

                <div class="add-container m-b-xs-30">
                    <?php if ($papr_options['ad_post_before_sidebar_url']) { ?>
                        <a class="before-content-ad-color"
                            <?php if ($papr_options['ad_post_before_sidebar_link_type'] == 'blank') { ?> target="_blank"<?php } ?>
                           href="<?php echo esc_url($papr_options['ad_post_before_sidebar_url']); ?>">
                            <img src="<?php echo esc_url($papr_options['ad_post_before_sidebar_image']['url']); ?>"
                                 alt="<?php esc_attr(bloginfo('name')); ?>">
                        </a>
                    <?php } else { ?>
                        <img src="<?php echo esc_url($papr_options['ad_post_before_sidebar_image']['url']); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                </div>
            <?php }

        }
    }

    public static function ad_post_after_sidebar()
    {
        $papr_options = self::axil_get_options();
        if ($papr_options['ad_post_after_sidebar_activate']) {
            if ($papr_options['ad_post_after_sidebar_type'] == 'code') {
                print(($papr_options['ad_post_after_sidebar_code']));
            } else if ($papr_options['ad_post_after_sidebar_image']['url'] && $papr_options['ad_post_after_sidebar_type'] == 'image') { ?>
                <div class="add-container m-b-xs-30">
                    <?php if ($papr_options['ad_post_after_sidebar_url']) { ?>
                        <a class="after-content-ad-color"
                            <?php if ($papr_options['ad_post_after_sidebar_link_type'] == 'blank') { ?> target="_blank"<?php } ?>
                           href="<?php echo esc_url($papr_options['ad_post_after_sidebar_url']); ?>">
                            <img src="<?php echo esc_url($papr_options['ad_post_after_sidebar_image']['url']); ?>"
                                 alt="<?php esc_attr(bloginfo('name')); ?>"></a>
                    <?php } else { ?>
                        <img src="<?php echo esc_url($papr_options['ad_post_after_sidebar_image']['url']); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>

                </div>
            <?php }

        }
    }

}
