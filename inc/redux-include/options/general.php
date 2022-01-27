<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$opt_name = AXIL_THEME_PREFIX . '_options';
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('General', 'papr'),
        'id' => 'axil_general_defaults',
        'icon' => 'el el-th',


    )
);
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('General', 'papr'),
        'id' => 'general_section',
        'heading' => esc_html__('General', 'papr'),
        'icon' => 'el el-network',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'active_dark_mode',
                'type' => 'switch',
                'title' => esc_html__('Switch to Dark Mode', 'papr'),
                'on' => esc_html__('Yes', 'papr'),
                'off' => esc_html__('No', 'papr'),
                'default' => false,
            ),
            array(
                'id' => 'show_ld_switcher_form_user_end',
                'type' => 'switch',
                'title' => esc_html__('Enabled Dark/Light Switcher Form User End', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'logo',
                'type' => 'media',
                'title' => esc_html__('Main Logo', 'papr'),
                'default' => array(
                    'url' => AXIL_IMG_URL . 'logo-black.svg'
                ),
            ),
            array(
                'id' => 'logo_light',
                'type' => 'media',
                'title' => esc_html__('Light Logo', 'papr'),
                'default' => array(
                    'url' => AXIL_IMG_URL . 'logo-white.svg'
                ),

            ),
            array(
                'id'       => 'logo_size',
                'type'     => 'dimensions',
                'units_extended' => true,
                'units'    => array('rem', 'px', '%'),
                'title' => esc_html__('Logo Height', 'papr'),
                'subtitle' => esc_html__('Set custom logo height. Default value: 5rem', 'papr'),
                'width' => false,
                'output' => array(
                    'max-height' => '.brand-logo',
                    'max-height' => '.site-logo img'
                ),
            ),
            array(
                'id' => 'logo_symbol',
                'type' => 'media',
                'title' => esc_html__('Footer Logo', 'papr'),
                'default' => array(
                    'url' => Helper::get_img('logo-symbol.svg')
                ),
            ),
            array(
                'id' => 'preloader',
                'type' => 'switch',
                'title' => esc_html__('Preloader', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'preloader_image',
                'type' => 'media',
                'title' => esc_html__('Preloader Image', 'papr'),
                'subtitle' => esc_html__('Please upload your choice of preloader image. Transparent GIF format is recommended', 'papr'),
                'default' => array(
                    'url' => AXIL_IMG_URL . 'papr-preloader.gif'
                ),
                'required' => array('preloader', 'equals', true)
            ),

            array(
                'id' => 'show_preview_image',
                'type' => 'switch',
                'title' => esc_html__('Show Preview Image', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => false,
            ),
            array(
                'id' => 'no_preview_image',
                'type' => 'media',
                'title' => esc_html__('Alternative Preview Image', 'papr'),
                'subtitle' => esc_html__('This image will be used as preview image in some archive pages if no featured image exists', 'papr'),
                'default' => array(
                    'url' => AXIL_IMG_URL . 'meta-img-1.jpg'
                ),
                'required' => array('show_preview_image', 'equals', true),
            ),
            array(
                'id' => 'back_to_top',
                'type' => 'switch',
                'title' => esc_html__('Back to Top', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'team_slug',
                'type' => 'text',
                'title' => esc_html__('Team Slug', 'papr'),
                'subtitle' => esc_html__('Will be used in URL', 'papr'),
                'default' => 'team',
            ),
            array(
                'id' => 'team_cat_slug',
                'type' => 'text',
                'title' => esc_html__('Team Category Slug', 'papr'),
                'subtitle' => esc_html__('Will be used in URL', 'papr'),
                'default' => 'team-cat',
            ),
        )
    )
);


Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Subscription Popup Maker', 'papr'),
        'id' => 'popup_meker',
        'heading' => esc_html__('Subscription Popup Maker', 'papr'),
        'icon' => 'el el-flag',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'popup_area',
                'type' => 'switch',
                'title' => esc_html__('Popup', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => false,
                'subtitle' => esc_html__('Show/hide Popup.', 'papr'),
            ),
            array(
                'id' => 'popup_content_shortcode',
                'type' => 'text',
                'title' => esc_html__('Popup Content Shortcode', 'papr'),
                'subtitle' => esc_html__('Use the shortcode that create popup content', 'papr'),
                'required' => array('popup_area', 'equals', true)
            ),
            array(
                'id' => 'popup_image',
                'type' => 'media',
                'title' => esc_html__('Popup Image', 'papr'),
                'default' => array(
                    'url' => Helper::get_img('banner.jpg')
                ),
                'required' => array('popup_area', 'equals', true)
            ),
            array(
                'id' => 'popup_whare_to_show',
                'type' => 'select',
                'title' => esc_html__('Whare To Show', 'papr'),
                'subtitle' => esc_html__('Select how the more post will show - Pagination / Load More', 'papr'),
                'options' => array(
                    'everywhere' => esc_html__('Everywhere', 'papr'),
                    'posts' => esc_html__('Posts', 'papr'),
                    'home' => esc_html__('Home', 'papr'),
                ),
                'default' => 'home',
                'required' => array('popup_area', 'equals', true)
            ),

        )
    )
);