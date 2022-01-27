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
        'title' => esc_html__('Off-Canvas Menu', 'papr'),
        'id' => 'header_off_canvas_section',
        'heading' => esc_html__('Off-Canvas Menu', 'papr'),
        'icon' => 'el el-flag',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'offcanvas_area',
                'type' => 'switch',
                'title' => esc_html__('Off-Canvas Area', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => false,
                'subtitle' => esc_html__('Show/hide off-canvas area.', 'papr'),
            ),

            array(
                'id' => 'offcanvas_search',
                'type' => 'switch',
                'title' => esc_html__('Off-Canvas Search', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'subtitle' => esc_html__('Show/hide search form off-canvas menu area.', 'papr'),
                'required' => array('offcanvas_area', 'equals', true),
            ),
            array(
                'id' => 'offcanvas_menu',
                'type' => 'switch',
                'title' => esc_html__('Off-Canvas Menu', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'subtitle' => esc_html__('Show/hide menu form off-canvas menu area.', 'papr'),
                'required' => array('offcanvas_area', 'equals', true),
            ),
            array(
                'id' => 'offcanvas_contact_info',
                'type' => 'switch',
                'title' => esc_html__('Off-Canvas Contact Info', 'papr'),
                'on' => esc_html__('Enabled', 'papr'),
                'off' => esc_html__('Disabled', 'papr'),
                'default' => true,
                'subtitle' => esc_html__('Show/hide contact info form off-canvas menu area.', 'papr'),
                'required' => array('offcanvas_area', 'equals', true),
            ),
        )
    )
);

