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
        'title' => esc_html__('Under Construction', 'papr'),
        'id' => 'under_construction_sttings_section',
        'heading' => esc_html__('Under Construction', 'papr'),
        'icon' => 'el el-error-alt',
        'subsection' => true,
        'fields' => array(
            array(
                'id'                    => 'under_construction_mode_enable',
                'type'                  => 'button_set',
                'title'                 => esc_html__('Under Construction / Coming Soon Mode', 'papr'),
                'subtitle'              => esc_html__('If enable, the frontend shows maintenance / coming soon mode page only.', 'papr'),
                'options'               => array(
                    'on'                => 'Enable',
                    'off'               => 'Disable'
                ),
                'default'               => 'off'
            ),
            array(
                'id' => 'under_construction_title_text',
                'type' => 'text',
                'title' => esc_html__('Page Title', 'papr'),
                'default' => esc_html__('This Project Is Under Construction.', 'papr'),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id'       => 'under_construction_mailchimp_form_shortcode',
                'type'     => 'text',
                'title'    => esc_html__( 'Mailchimp Form Shortcode', 'papr' ),
                'subtitle' => esc_html__( 'Use the shortcode that create Mailchimp Form', 'papr' ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id'       => 'under_construction_page_image',
                'type'     => 'media',
                'title'    => esc_html__( 'Under Construction Image', 'papr' ),
                'default'  => array(
                    'url'=> Helper::get_img( 'banner.jpg' )
                ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            array(
                'id'       => 'social_network_under_cons',
                'type'     => 'switch',
                'title'    =>esc_html__( 'Social Networks', 'papr' ),
                'on'       =>esc_html__( 'Enabled', 'papr' ),
                'off'      =>esc_html__( 'Disabled', 'papr' ),
                'default'  => true,
                'subtitle' => esc_html__( 'Show/hide social networks area.', 'papr' ),
                'description' => esc_html__( 'Edit Social Networks Link and Label? Go to General -> Contact & Socials Section', 'papr' ),
                'required'              => array('under_construction_mode_enable','equals', 'on'),
            ),
            
        )
    )
);

