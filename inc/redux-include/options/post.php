<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$opt_name = AXIL_THEME_PREFIX.'_options';

    // Post Settings
    Redux::setSection( $opt_name,
        array(
            'title'   => esc_html__( 'Single Post Settings', 'papr' ),
            'id'      => 'post_settings_section',
            'icon'    => 'el el-file-edit',
            'subsection'   => true,
            'heading' => esc_html__( 'Single Post Settings', 'papr' ),
            'fields'  => array(
                array(
                    'id'       =>'post_style',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Single Post Layout', 'papr' ),
                    'default'  => '1',
                    'options' => array(
                        '1' => array(
                            'title' => '<b>'. esc_html__( 'Layout 1', 'papr' ) . '</b>',
                            'img' => AXIL_IMG_URL . 'post-layout/post-layout-1.jpg',
                        ),
                        '2' => array(
                            'title' => '<b>'. esc_html__( 'Layout 2', 'papr' ) . '</b>',
                            'img' => AXIL_IMG_URL . 'post-layout/post-layout-2.jpg',
                        ),
                        '3' => array(
                            'title' => '<b>'. esc_html__( 'Layout 3', 'papr' ) . '</b>',
                            'img' => AXIL_IMG_URL . 'post-layout/post-layout-3.jpg',
                        ),
                        '4' => array(
                            'title' => '<b>'. esc_html__( 'Layout 4', 'papr' ) . '</b>',
                            'img' => AXIL_IMG_URL . 'post-layout/post-layout-4.jpg',
                        ),
                        '5' => array(
                            'title' => '<b>'. esc_html__( 'Layout 5', 'papr' ) . '</b>',
                            'img' => AXIL_IMG_URL . 'post-layout/post-layout-5.jpg',
                        ),
                        '6' => array(
                            'title' => '<b>'. esc_html__( 'Layout 6', 'papr' ) . '</b>',
                            'img' => AXIL_IMG_URL . 'post-layout/post-layout-6.jpg',
                        ),

                    ),
                ),
                array(
                    'id'      => 'post_date',
                    'type'    => 'switch',
                    'title'   =>esc_html__( 'Show Post Date', 'papr' ),
                    'on'      =>esc_html__( 'On', 'papr' ),
                    'off'     =>esc_html__( 'Off', 'papr' ),
                    'default' => true,
                ),
               
                 array(
                    'id'      => 'post_update_date',
                    'type'    => 'switch',
                    'title'   =>esc_html__( 'Show Post Update Date', 'papr' ),
                    'on'      =>esc_html__( 'On', 'papr' ),
                    'off'     =>esc_html__( 'Off', 'papr' ),
                    'default' => false,
                ),
                array(
                    'id'       => 'post_view',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show/hide Post View', 'papr' ),
                    'on'       => esc_html__( 'On', 'papr' ),
                    'off'      => esc_html__( 'Off', 'papr' ),
                    'subtitle' => esc_html__( 'Show or hide post views count number', 'papr' ),
                    'default'  => false,
                ),
                 array(
                    'id'       => 'post_shares',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show/hide Post Shares', 'papr' ),
                    'on'       => esc_html__( 'On', 'papr' ),
                    'off'      => esc_html__( 'Off', 'papr' ),
                    'subtitle' => esc_html__( 'Show or hide post views count number', 'papr' ),
                    'default'  => false,
                ),
                array(
                    'id'      => 'post_author_name',
                    'type'    => 'switch',
                    'title'   =>esc_html__( 'Show Author Name', 'papr' ),
                    'on'      =>esc_html__( 'On', 'papr' ),
                    'off'     =>esc_html__( 'Off', 'papr' ),
                    'default' => true,
                ),

                array(
                    'id'       => 'post_author_bio',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Author Bio', 'papr' ),
                    'on'       => esc_html__( 'On', 'papr' ),
                    'off'      => esc_html__( 'Off', 'papr' ),
                    'default'  => false,
                ),

                array(
                    'id'      => 'post_cats',
                    'type'    => 'switch',
                    'title'   =>esc_html__( 'Show Categories', 'papr' ),
                    'on'      =>esc_html__( 'On', 'papr' ),
                    'off'     =>esc_html__( 'Off', 'papr' ),
                    'default' => true,
                ),
                array(
                    'id'      => 'post_comment_num',
                    'type'    => 'switch',
                    'title'   =>esc_html__( 'Show Comment Number', 'papr' ),
                    'on'      =>esc_html__( 'On', 'papr' ),
                    'off'     =>esc_html__( 'Off', 'papr' ),
                    'default' => false,
                ),
                array(
                    'id'       => 'post_links',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Next Post / Previous post', 'papr' ),
                    'on'       => esc_html__( 'On', 'papr' ),
                    'off'      => esc_html__( 'Off', 'papr' ),
                    'default'  => true,
                ),
                array(
                    'id'      => 'post_tags',
                    'type'    => 'switch',
                    'title'   =>esc_html__( 'Show Tags', 'papr' ),
                    'on'      =>esc_html__( 'On', 'papr' ),
                    'off'     =>esc_html__( 'Off', 'papr' ),
                    'default' => true,
                ),

                 array(
                    'id'       => 'post_share_display_top',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Share Button Show/hide in top', 'papr' ),
                    'on'       => esc_html__( 'On', 'papr' ),
                    'off'      => esc_html__( 'Off', 'papr' ),
                    'default'  => true,
                ),
                array(
                    'id'       => 'post_share_display_footer',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Share Button Show/hide in footer ', 'papr' ),
                    'on'       => esc_html__( 'On', 'papr' ),
                    'off'      => esc_html__( 'Off', 'papr' ),
                    'default'  => false,
                ),

                array(
                    'id'      => 'show_related_post',
                    'type'    => 'switch',
                    'title'   =>esc_html__( 'Show Related post', 'papr' ),
                    'on'      =>esc_html__( 'On', 'papr' ),
                    'off'     =>esc_html__( 'Off', 'papr' ),
                    'default' => false,
                ),
                array(
                    'id'       => 'section_post_related',
                    'type'     => 'section',
                    'title'    => esc_html__( 'Related Post Settings', 'papr' ),
                    'indent'   => true,
                    'required' => array('show_related_post', 'equals', true),
                ),

                 array(
                    'id'       => 'related_post_area_title',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Related Post Area Title', 'papr' ),
                    'required' => array( 'show_related_post', 'equals', true ),
                    'default'  =>  esc_html__( 'Related Posts', 'papr' ),
                ),
                     
                 array(
                    'id'       => 'show_related_post_number',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Show Related Post Number', 'papr' ),
                    'required' => array( 'show_related_post', 'equals', true ),
                    'default'  =>  '4',
                ),
                 
                array(
                    'id'       => 'related_post_query',
                    'type'     => 'radio',
                    'title'    => esc_html__('Query Type', 'papr'),
                    'subtitle' => esc_html__('Post Query', 'papr'),
                    'required' => array( 'show_related_post', 'equals', true ),
                    'options'  => array(
                        'cat'       => esc_html__( 'Posts in the same Categories', 'papr' ),
                        'tag'       => esc_html__( 'Posts in the same Tags', 'papr' ),
                        'author'    => esc_html__( 'Posts by the same Author', 'papr' ),
                    ),
                    'default'   => 'cat'
                ),

            array(
                'id'       => 'related_post_sort',
                'type'     => 'radio',
                'title'    => esc_html__('Sort Order', 'papr'),
                'subtitle' => esc_html__('Display post Order', 'papr'),
                'required' => array( 'show_related_post', 'equals', true ),
                'options'  => array(
                    'recent'    => esc_html__( 'Recent Posts', 'papr' ),
                    'rand'      => esc_html__( 'Random Posts', 'papr' ),
                    'modified'  => esc_html__( 'Last Modified Posts', 'papr' ),
                    'popular'   => esc_html__( 'Most Commented posts', 'papr' ),
                    'views'     => esc_html__( 'Most Viewed posts', 'papr' ),
                ),
                'required'  => array( 'show_related_post', 'equals', true ),
                'default'   => 'recent'
            ),
            array(
                'id'       => 'related_title_limit',
                'type'     => 'text',
                'required' => array( 'show_related_post', 'equals', true ),
                'title'    => esc_html__( 'Related Post Title Length', 'papr' ),
                'default'  => '15',
            ),
            
            )
        )
    );
