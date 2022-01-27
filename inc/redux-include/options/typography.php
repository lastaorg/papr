<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$opt_name = AXIL_THEME_PREFIX . '_options';

Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'papr'),
    'id' => 'typo_section',
    'icon' => 'el el-text-width',
    'fields' => array(

        array(
            'id' => 'typo_h1',
            'type' => 'typography',
            'title' => esc_html__('Header h1', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
            'units' => 'rem',
            'output' => array('h1, .h1'),
//            'default' => array(
//                'font-family' => 'Roboto',
//                'google' => true,
//                'font-size' => '4.2rem',
//                'font-weight' => '600',
//            ),
        ),
        array(
            'id' => 'typo_h2',
            'type' => 'typography',
            'title' => esc_html__('Header h2', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
             'output'        => array('h2, .h2'),
             'units' => 'rem',
//            'default' => array(
//                'font-family' => 'Roboto',
//                'google' => true,
//                'font-size' => '3.6rem',
//                'font-weight' => '600',
//            ),
        ),
        array(
            'id' => 'typo_h3',
            'type' => 'typography',
            'title' => esc_html__('Header h3', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
             'units' => 'rem',
             'output'        => array('h3, .h3'),
//            'default' => array(
//                'font-family' => 'Roboto',
//                'google' => true,
//                'font-size' => '3rem',
//                'font-weight' => '600',
//            ),
        ),
        array(
            'id' => 'typo_h4',
            'type' => 'typography',
            'title' => esc_html__('Header h4', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
             'units' => 'rem',
             'output'        => array('h4, .h4'),
//            'default' => array(
//                'font-family' => 'Roboto',
//                'google' => true,
//                'font-size' => '2.4',
//                'font-weight' => '600',
//            ),
        ),
        array(
            'id' => 'typo_h5',
            'type' => 'typography',
            'title' => esc_html__('Header h5', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
             'units' => 'rem',
             'output'        => array('h5, .h5'),
//            'default' => array(
//                'font-family' => 'Roboto',
//                'google' => true,
//                'font-size' => '1.8',
//                'font-weight' => '600',
//            ),
        ),
        array(
            'id' => 'typo_h6',
            'type' => 'typography',
            'title' => esc_html__('Header h6', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
             'units' => 'rem',
             'output'        => array('h6, .h6'),
//            'default' => array(
//                'font-family' => 'Roboto',
//                'google' => true,
//                'font-size' => '1.4',
//                'font-weight' => '600',
//            ),
        ),
        array(
            'id' => 'typo_body_b1',
            'type' => 'typography',
            'title' => esc_html__('Body B1', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
             'units' => 'rem',
             'output' => array('body, p'),
//            'default' => array(
//                'font-family' => 'Poppins',
//                'google' => true,
//                'font-size' => '1.8',
//                'font-weight' => '400',
//            ),
        ),
        array(
            'id' => 'typo_body_b2',
            'type' => 'typography',
            'title' => esc_html__('Body B2', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
            'units' => 'rem',
            'output' => array('p.big'),
//            'default' => array(
//                'font-family' => 'Poppins',
//                'google' => true,
//                'font-size' => '2',
//                'font-weight' => '400',
//            ),
        ),
        array(
            'id' => 'typo_body_b3',
            'type' => 'typography',
            'title' => esc_html__('Body B3', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
            'units' => 'rem',
            'output' => array('p.mid'),
//            'default' => array(
//                'font-family' => 'Poppins',
//                'google' => true,
//                'font-size' => '1.6',
//                'font-weight' => '400',
//            ),
        ),
        array(
            'id' => 'typo_body_b4',
            'type' => 'typography',
            'title' => esc_html__('Body B4', 'papr'),
            'google' => true,
            'subsets' => false,
            'text-align' => false,
            'font-weight' => false,
            'line-height' => false,
            'color' => false,
            'units' => 'rem',
            'output' => array('p.small'),
//            'default' => array(
//                'font-family' => 'Poppins',
//                'google' => true,
//                'font-size' => '1.4',
//                'font-weight' => '400',
//            ),
        ),
    )
));
