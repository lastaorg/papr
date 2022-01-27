<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$opt_name = AXIL_THEME_PREFIX . '_options';
function axulnews_add_fields($prefix, $title, $subtitle = '')
{
    return array(
        array(
            'id' => $prefix . '_sec',
            'type' => 'section',
            'title' => $title,
            'subtitle' => $subtitle,
            'indent' => true,
        ),
        array(
            'id' => $prefix . '_activate',
            'type' => 'switch',
            'title' => esc_html__('Activate Ad', 'papr'),
            'on' => esc_html__('Enabled', 'papr'),
            'off' => esc_html__('Disabled', 'papr'),
            'default' => false,
        ),
        array(
            'id' => $prefix . '_type',
            'type' => 'button_set',
            'title' => esc_html__('Ad Type', 'papr'),
            'options' => array(
                'image' => esc_html__('Image Link', 'papr'),
                'code' => esc_html__('Custom Code', 'papr'),
            ),
            'default' => 'image',
            'required' => array($prefix . '_activate', 'equals', true)
        ),
        array(
            'id' => $prefix . '_image',
            'type' => 'media',
            'title' => esc_html__('Image', 'papr'),
            'default' => '',
            'required' => array($prefix . '_type', 'equals', 'image')
        ),
        array(
            'id' => $prefix . '_url',
            'type' => 'text',
            'title' => esc_html__('Link', 'papr'),
            'default' => '',
            'required' => array($prefix . '_type', 'equals', 'image')
        ),

        array(
            'id' => $prefix . '_link_type',
            'type' => 'button_set',
            'title' => esc_html__('Open Advertisement Tab', 'papr'),
            'options' => array(
                'blank' => esc_html__('Open in new tab', 'papr'),
                'same' => esc_html__('Open in Same tab', 'papr'),
            ),
            'required' => array($prefix . '_type', 'equals', 'image'),
            'default' => 'blank',

        ),
        array(
            'id' => $prefix . '_code',
            'type' => 'textarea',
            'title' => esc_html__('Custom Code', 'papr'),
            'default' => '',
            'subtitle' => esc_html__('Supports: Shortcode, Adsense, Text, HTML, Scripts', 'papr'),
            'required' => array($prefix . '_type', 'equals', 'code')
        ),
    );
}


Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Ad Management', 'papr'),
        'id' => 'ad_settings_section',
        'icon' => 'el el-speaker',
    )
);

// Blog/Archive
$header_mid = axulnews_add_fields('ad_post_header_mid', esc_html__('Header Mid', 'papr'));
$before_content = axulnews_add_fields('ad_post_before_content', esc_html__('Before Post Contents', 'papr'));
$after_content = axulnews_add_fields('ad_post_after_content', esc_html__('After Post Contents', 'papr'));
$before_sidebar = axulnews_add_fields('ad_post_before_sidebar', esc_html__('Before Post Sidebar', 'papr'));
$after_sidebar = axulnews_add_fields('ad_post_after_sidebar', esc_html__('After Post Sidebar', 'papr'));

$fields = array_merge($before_content, $after_content, $before_sidebar, $after_sidebar);

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Header', 'papr'),
        'id' => 'ad_settings_header_mid',
        'heading' => esc_html__('Header Mid Ad', 'papr'),
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $header_mid
    )
);

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('News/Archive', 'papr'),
        'id' => 'ad_settings_blog_section',
        'heading' => esc_html__('Blog/Archive', 'papr'),
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $fields
    )
);

