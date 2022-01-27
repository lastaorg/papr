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
        'title' => esc_html__('Footer', 'papr'),
        'id' => 'axil_footer_defaults',
        'icon' => 'el el-th',

    )
);

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Footer', 'papr'),
        'id' => 'footer_section',
        'subsection' => true,
        'heading' => esc_html__('Footer', 'papr'),
        'icon' => 'el el-caret-down',
        'fields' => array(
            array(
                'id' => 'section-footer-area',
                'type' => 'section',
                'title' => esc_html__('Footer Area', 'papr'),
                'indent' => true,
            ),

            array(
                'id' => 'footer_area',
                'type' => 'switch',
                'title' => esc_html__('Display Footer Area', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'footer_logo',
                'type' => 'media',
                'title' => esc_html__('Footer Logo', 'papr'),
                'default' => array(
                    'url' => Helper::get_img('logo-symbol.svg')
                ),
            ),
            array(
                'id' => 'footer_style',
                'type' => 'image_select',
                'title' => esc_html__('Footer Layout', 'papr'),
                'default' => '3',
                'options' => array(
                    '1' => array(
                        'title' => '<b>' . esc_html__('Layout 1', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/footer-01.jpg'),
                    ),
                    '2' => array(
                        'title' => '<b>' . esc_html__('Layout 2', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/footer-02.jpg'),
                    ),
                    '3' => array(
                        'title' => '<b>' . esc_html__('Layout 3', 'papr') . '</b>',
                        'img' => Helper::get_img('header-footer-layout/footer-03.jpg'),
                    ),

                ),
                'subtitle' => esc_html__('You can override this settings in individual pages', 'papr'),
            ),

            array(
                'id' => 'footer_column',
                'type' => 'select',
                'title' => esc_html__('Number of Columns', 'papr'),
                'options' => array(
                    '1' => esc_html__('1 Column', 'papr'),
                    '2' => esc_html__('2 Columns', 'papr'),
                    '3' => esc_html__('3 Columns', 'papr'),
                    '4' => esc_html__('4 Columns', 'papr'),
                    '6' => esc_html__('6 Columns', 'papr'),
                ),
                'default' => '6',
                'required' => array('footer_style', 'equals', '1'),
            ),

            array(
                'id' => 'footer_middle',
                'type' => 'switch',
                'title' => esc_html__('Display Footer Middle', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => 'off',
            ),
            array(
                'id' => 'footer_bottom_menu_args',
                'type' => 'switch',
                'title' => esc_html__('Footer Bottom Menu', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'subtitle' => esc_html__('Show/hide menu form Footer Bottom area.', 'papr'),
            ),
        )
    )
);
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Footer Copyright', 'papr'),
        'id' => 'footer_copyright_section',
        'subsection' => true,
        'heading' => esc_html__('Footer Copyright', 'papr'),
        'icon' => 'el el-caret-down',
        'fields' => array(

            array(
                'id' => 'section-copyright-area',
                'type' => 'section',
                'title' => esc_html__('Copyright Area', 'papr'),
                'indent' => true,
            ),
            array(
                'id' => 'copyright_area',
                'type' => 'switch',
                'title' => esc_html__('Display Copyright Area', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'copyright_text',
                'type' => 'textarea',
                'title' => esc_html__('Copyright Text', 'papr'),
                'default' => 'Copyright &copy; 2019 News and Magazine WordPress Theme by <a target="_blank" href="' . AXIL_AUTHOR_URI . '">Axilthemes</a>',
                'required' => array('copyright_area', 'equals', true)
            ),
        )
    )
);
