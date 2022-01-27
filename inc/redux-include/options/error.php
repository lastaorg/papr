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
        'title' => esc_html__('Error Page Settings', 'papr'),
        'id' => 'error_srttings_section',
        'heading' => esc_html__('Error Page Settings', 'papr'),
        'icon' => 'el el-error-alt',
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'error_title_text',
                'type' => 'text',
                'title' => esc_html__('Error Page Title', 'papr'),
                'default' => esc_html__('OOPS! THAT PAGE CAN’T BE FOUND.', 'papr'),
            ),
            array(
                'id' => 'error_sub_text',
                'type' => 'text',
                'title' => esc_html__('Error Page Sub Title', 'papr'),
                'default' => '',
            ),
            array(
                'id' => 'error_buttontext',
                'type' => 'text',
                'title' => esc_html__('Button Text', 'papr'),
                'default' => esc_html__('GO TO HOME PAGE', 'papr'),
            )
        )
    )
);

