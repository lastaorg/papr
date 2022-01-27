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
        'title' => esc_html__('Header', 'papr'),
        'id' => 'axil_header_defaults',
        'icon' => 'el el-th',

    )
);
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Header Main', 'papr'),
        'id' => 'header_main_section',
        'heading' => esc_html__('Header Main', 'papr'),
        'icon' => 'el el-flag',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'header_area',
                'type' => 'switch',
                'title' => esc_html__('Display Header Area', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'sticky_menu',
                'type' => 'switch',
                'title' => esc_html__('Sticky Header', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'subtitle' => esc_html__('Show header when scroll down', 'papr'),
            ),
            array(
                'id' => 'header_style',
                'type' => 'image_select',
                'title' => esc_html__('Header Layout', 'papr'),
                'default' => '1',
                'options' => array(
                    '1' => array(
                        'title' => '<b>' . esc_html__('Layout 1', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/header-01.jpg'),
                    ),
                    '2' => array(
                        'title' => '<b>' . esc_html__('Layout 2', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/header-02.jpg'),
                    ),
                    '3' => array(
                        'title' => '<b>' . esc_html__('Layout 3', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/header-03.jpg'),
                    ),
                    '4' => array(
                        'title' => '<b>' . esc_html__('Layout 4', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/header-04.jpg'),
                    ),
                    '5' => array(
                        'title' => '<b>' . esc_html__('Layout 5', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/header-05.jpg'),
                    ),
                    '6' => array(
                        'title' => '<b>' . esc_html__('Layout 6', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/header-06.jpg'),
                    ),
                ),
                'subtitle' => esc_html__('You can override this settings in individual pages', 'papr'),
            ),
            array(
                'id' => 'dropdown_menu_open_option',
                'type' => 'select',
                'title' => esc_html__('Select Dropdown Menu Open Option', 'papr'),
                'options' => array(
                    'click' => esc_html__('Click', 'papr'),
                    'hover' => esc_html__('Hover', 'papr')
                ),
                'default' => 'click',
            ),
            array(
                'id' => 'search_icon',
                'type' => 'switch',
                'title' => esc_html__('Search Icon', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => false,
            ),
            array(
                'id' => 'minicart_icon',
                'type' => 'switch',
                'title' => esc_html__('Cart Icon', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => false,
            ),
            array(
                'id' => 'header_btn',
                'type' => 'switch',
                'title' => esc_html__('Subscribe Button', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'required' => array('header_style', 'equals', '4')
            ),
            array(
                'id' => 'header_buttontext',
                'type' => 'text',
                'title' => esc_html__('Header button Text', 'papr'),
                'default' => esc_html__('SUBSCRIBE', 'papr'),
                'required' => array('header_btn', 'equals', true),
            ),
            array(
                'id' => 'header_buttonUrl',
                'type' => 'text',
                'default' => '',
                'title' => esc_html__('Button Url', 'papr'),
                'required' => array('header_btn', 'equals', true),

            ),
            array(
                'id' => 'header_lang_switcher',
                'type' => 'switch',
                'title' => esc_html__('Language Switcher', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'required' => array('header_style', 'equals', '4')
            ),

            // Top Bar
            array(
                'id' => 'top_bar',
                'type' => 'switch',
                'title' => esc_html__('Top Bar', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'subtitle' => esc_html__('You can override this settings in individual pages', 'papr'),
                'required' => array('header_style', 'equals', array('1', '2')),

            ),
            array(
                'id' => 'header_top_menu_args',
                'type' => 'switch',
                'title' => esc_html__('Header Top Menu', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'subtitle' => esc_html__('Show/hide menu form Header Top  area.', 'papr'),
                'required' => array('top_bar', 'equals', true),
            ),
            array(
                'id' => 'axil_top_date',
                'type' => 'switch',
                'title' => esc_html__('Current date', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'required' => array(
                    array('top_bar', '=', true),
                )
            ),


        )
    )
);