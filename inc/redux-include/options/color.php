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
        'title' => esc_html__('Colors', 'papr'),
        'id' => 'color_section',
        'heading' => '',
        'icon' => 'el el-eye-open',
        'fields' => array(
            array(
                'id' => 'section-color-sitewide',
                'type' => 'section',
                'title' => esc_html__('Sitewide Colors', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'primary_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Primary Color', 'papr'),
                'default' => '#ee212b',
            ),
            array(
                'id' => 'primary_txt_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Primary Text Color', 'papr'),
                'default' => '#ffffff',
            ),
            array(
                'id' => 'secondery_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Secondery Color', 'papr'),
                'default' => '#ee212b',
            ),
            array(
                'id' => 'sitewide_color',
                'type' => 'button_set',
                'title' => esc_html__('Other Colors', 'papr'),
                'options' => array(
                    'primary' => esc_html__('Primary Color', 'papr'),
                    'custom' => esc_html__('Custom', 'papr'),
                ),
                'default' => 'primary',
                'subtitle' => esc_html__('Selecting Primary Color will hide some color options from the below settings and replace them with Primary/Secondery Color', 'papr'),
            ),
            array(
                'id' => 'section-color-topbar',
                'type' => 'section',
                'title' => esc_html__('Top Bar', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'top_bar_bgcolor',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Top Bar Background Color', 'papr'),
                'default' => '#ffffff',
            ),
            array(
                'id' => 'top_bar_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Top Bar Text Color', 'papr'),
                'default' => '#444444',
            ),

            array(
                'id' => 'top_bar_icon_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Top Bar Icon Color', 'papr'),
                'default' => '#ee212b',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'top_bar_icon_color_hover',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Top Bar Icon Color Hover', 'papr'),
                'default' => '#ffffff',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'top_bar_color_tr',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Transparent Top Bar Text Color', 'papr'),
                'subtitle' => esc_html__('Applied when Transparent Header is enabled', 'papr'),
                'default' => '#ffffff',
            ),
            array(
                'id' => 'top_bar_social_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Top Bar Social Color', 'papr'),
                'default' => '#8a8a8a',
            ),
            array(
                'id' => 'top_bar_social_hover__color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Top Bar Social Hover Color', 'papr'),
                'default' => '#ffffff',
            ),

            array(
                'id' => 'section-color-menu',
                'type' => 'section',
                'title' => esc_html__('Main Menu', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'menu_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Menu Color', 'papr'),
                'default' => '#111111',
            ),
            array(
                'id' => 'menu_hover_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Menu Hover Color', 'papr'),
                'default' => '#ee212b',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'menu_color_tr',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Transparent Menu Color', 'papr'),
                'subtitle' => esc_html__('Applied when Transparent Header is enabled', 'papr'),
                'default' => '#ffffff',
            ),
            array(
                'id' => 'menu_hover_color_tr',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Transparent Menu Hover Color', 'papr'),
                'subtitle' => esc_html__('Applied when Transparent Header is enabled', 'papr'),
                'default' => '#ee212b',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'section-color-submenu',
                'type' => 'section',
                'title' => esc_html__('Sub Menu', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'submenu_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Submenu Color', 'papr'),
                'default' => '#111111',
            ),
            array(
                'id' => 'submenu_bgcolor',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Submenu Background Color', 'papr'),
                'default' => '#ffffff',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'submenu_hover_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Submenu Hover Color', 'papr'),
                'default' => '#ffffff',
            ),
            array(
                'id' => 'submenu_hover_bgcolor',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Submenu Hover Background Color', 'papr'),
                'default' => '#f0f3f8',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'section-color-banner',
                'type' => 'section',
                'title' => esc_html__('Banner and Breadcrumb', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'banner_heading_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Banner Heading Color', 'papr'),
                'default' => '#fff',
            ),
            array(
                'id' => 'breadcrumb_link_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Breadcrumb Link Color', 'papr'),
                'default' => '#c5d5ff',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'breadcrumb_link_hover_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Breadcrumb Link Hover Color', 'papr'),
                'default' => '#fff',
            ),
            array(
                'id' => 'breadcrumb_active_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Active Breadcrumb Color', 'papr'),
                'default' => '#fff',
            ),
            array(
                'id' => 'breadcrumb_seperator_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Breadcrumb Seperator Color', 'papr'),
                'default' => '#c5d5ff',
            ),
            array(
                'id' => 'section-color-footer',
                'type' => 'section',
                'title' => esc_html__('Footer Area', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'footer_bgcolor',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Footer Background Color', 'papr'),
                'default' => '#111111',
            ),
            array(
                'id' => 'footer_title_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Footer Title Text Color', 'papr'),
                'default' => '#ffffff',
            ),
            array(
                'id' => 'footer_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Footer Body Text Color', 'papr'),
                'default' => '#e3e3e3',
            ),
            array(
                'id' => 'footer_link_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Footer Body Link Color', 'papr'),
                'default' => '#e3e3e3',
            ),
            array(
                'id' => 'footer_link_hover_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Footer Body Link Hover Color', 'papr'),
                'default' => '#ee212b',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'section-color-copyright',
                'type' => 'section',
                'title' => esc_html__('Copyright Area', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'copyright_bgcolor',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Copyright Background Color', 'papr'),
                'default' => '#111111',
            ),
            array(
                'id' => 'copyright_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Copyright Text Color', 'papr'),
                'default' => '#8f8f8f',
            ),
            array(
                'id' => 'section-color-error',
                'type' => 'section',
                'title' => esc_html__('Error Page', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'error_bodybg',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Body Background Color', 'papr'),
                'default' => '#f1f7fa',
                'required' => array('sitewide_color', '=', 'custom')
            ),
            array(
                'id' => 'error_text1_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Body Text 1 Color', 'papr'),
                'default' => '#111111',
            ),
            array(
                'id' => 'error_text2_color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Body Text 2 Color', 'papr'),
                'default' => '#111111',
            ),
        )
    )
);
