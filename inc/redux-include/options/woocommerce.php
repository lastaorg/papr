<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$opt_name = AXIL_THEME_PREFIX.'_options';
    if ( class_exists( 'WooCommerce' ) ) {       
        Redux::setSection( $opt_name,
            array(
                'title'   => esc_html__( 'WooCommerce', 'papr' ),
                'id'      => 'woo_Settings_section',
                'heading' => esc_html__( 'WooCommerce', 'papr' ),
                'icon'    => 'el el-shopping-cart',
//                'subsection'   => true,
                'fields'  => array(
                    array(
                        'id'       => 'wc_sec_general',
                        'type'     => 'section',
                        'title'    => esc_html__( 'General', 'papr' ),
                        'indent'   => true,
                    ),
                    array(
                        'id'       => 'wc_num_product',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Number of Products Per Page', 'papr' ),
                        'default'  => '8',
                    ),
                    array(
                        'id'       => 'wc_sec_product',
                        'type'     => 'section',
                        'title'    => esc_html__( 'Product Single Page', 'papr' ),
                        'indent'   => true,
                    ),
                   
                    array(
                        'id'       => 'wc_cats',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Categories', 'papr' ),
                        'on'       => esc_html__( 'Show', 'papr' ),
                        'off'      => esc_html__( 'Hide', 'papr' ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'wc_tags',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Tags', 'papr' ),
                        'on'       => esc_html__( 'Show', 'papr' ),
                        'off'      => esc_html__( 'Hide', 'papr' ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'wc_related',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Related Products', 'papr' ),
                        'on'       => esc_html__( 'Show', 'papr' ),
                        'off'      => esc_html__( 'Hide', 'papr' ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'wc_description',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Description Tab', 'papr' ),
                        'on'       => esc_html__( 'Show', 'papr' ),
                        'off'      => esc_html__( 'Hide', 'papr' ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'wc_reviews',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Reviews Tab', 'papr' ),
                        'on'       => esc_html__( 'Show', 'papr' ),
                        'off'      => esc_html__( 'Hide', 'papr' ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'wc_additional_info',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Additional Information Tab', 'papr' ),
                        'on'       => esc_html__( 'Show', 'papr' ),
                        'off'      => esc_html__( 'Hide', 'papr' ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'wc_sec_cart',
                        'type'     => 'section',
                        'title'    => esc_html__( 'Cart Page', 'papr' ),
                        'indent'   => true,
                    ),
                    array(
                        'id'       => 'wc_cross_sell',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Cross Sell Products', 'papr' ),
                        'on'       => esc_html__( 'Show', 'papr' ),
                        'off'      => esc_html__( 'Hide', 'papr' ),
                        'default'  => true,
                    ),
                )
            )
        );
    }