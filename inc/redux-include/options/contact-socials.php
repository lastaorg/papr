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
        'title' => esc_html__('Contact & Socials', 'papr'),
        'id' => 'socials_section',
        'heading' => esc_html__('Contact & Socials', 'papr'),
        'desc' => esc_html__('In case you want to hide any field, just keep that field empty', 'papr'),
        'icon' => 'el el-twitter',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'address_field_title',
                'type' => 'text',
                'title' => esc_html__('Address Field Title', 'papr'),
                'default' => esc_html__('Contact information', 'papr'),
            ),
            array(
                'id' => 'address',
                'type' => 'textarea',
                'title' => esc_html__('Address', 'papr'),
                'default' => esc_html__('Theodore Lowe, Ap #867-859 Sit Rd, Azusa New York', 'papr'),
            ),
            array(
                'id' => 'call_now_field_title',
                'type' => 'text',
                'title' => esc_html__('Call Now Field Title', 'papr'),
                'default' => esc_html__('We are available 24/ 7. Call Now.', 'papr'),
            ),
            array(
                'id' => 'phone',
                'type' => 'text',
                'title' => esc_html__('Phone', 'papr'),
                'default' => '(888) 456-2790',
            ),
            array(
                'id' => 'fax',
                'type' => 'text',
                'title' => esc_html__('Fax', 'papr'),
                'default' => '(121) 255-53333',
            ),
            array(
                'id' => 'email',
                'type' => 'text',
                'title' => esc_html__('Email', 'papr'),
                'validate' => 'email',
                'default' => 'example@domain.com',
            ),
            array(
                'id' => 'social_title',
                'type' => 'text',
                'title' => esc_html__('Social Title', 'papr'),
                'default' => esc_html__('Follow us', 'papr'),
            ),
            array(
                'id' => 'social_facebook',
                'type' => 'text',
                'title' => esc_html__('Facebook', 'papr'),
                'default' => '#',
            ),
            array(
                'id' => 'social_twitter',
                'type' => 'text',
                'title' => esc_html__('Twitter', 'papr'),
                'default' => '#',
            ),

            array(
                'id' => 'social_linkedin',
                'type' => 'text',
                'title' => esc_html__('Linkedin', 'papr'),
                'default' => '#',
            ),
            array(
                'id' => 'social_youtube',
                'type' => 'text',
                'title' => esc_html__('Youtube', 'papr'),
                'default' => '#',
            ),
            array(
                'id' => 'social_pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest', 'papr'),
                'default' => '',
            ),
            array(
                'id' => 'social_instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram', 'papr'),
                'default' => '',
            ),

        )
    )
);
