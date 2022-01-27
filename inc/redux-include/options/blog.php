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
        'title' => esc_html__('News Settings', 'papr'),
        'id' => 'blog_settings_section',
        'subsection' => true,
        'icon' => 'el el-tags',
        'heading' => esc_html__('News Settings', 'papr'),
        'fields' => array(
            array(
                'id' => 'blog_style',
                'type' => 'image_select',
                'title' => esc_html__('News/Archive Layout', 'papr'),
                'default' => 'style1',
                'options' => array(
                    'style1' => array(
                        'title' => '<b>' . esc_html__('Layout 1', 'papr') . '</b>',
                        'img' => Helper::get_img('meta-img-1.jpg'),
                    ),
                    'style2' => array(
                        'title' => '<b>' . esc_html__('Layout 2', 'papr') . '</b>',
                        'img' => Helper::get_img('meta-img-1.jpg'),
                    ),

                ),
            ),

            array(
                'id' => 'blog_content_display',
                'type' => 'switch',
                'title' => esc_html__('Show content Display', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'blog_content_number',
                'type' => 'text',
                'title' => esc_html__('Number of Content', 'papr'),
                'validate' => 'numeric',
                'default' => '20',
                'required' => array('blog_content_display', 'equals', true),
            ),
            array(
                'id' => 'blog_author_name',
                'type' => 'switch',
                'title' => esc_html__('Show Author Name', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'blog_date',
                'type' => 'switch',
                'title' => esc_html__('Show Date', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'default' => true,
            ),
            array(
                'id' => 'blog_view',
                'type' => 'switch',
                'title' => esc_html__('Show/hide Post View', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'subtitle' => esc_html__('Show or hide post views count number', 'papr'),
                'default' => false,
            ),
            array(
                'id' => 'blog_update_date',
                'type' => 'switch',
                'title' => esc_html__('Show Post Update Date', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'default' => false,
            ),
            array(
                'id' => 'blog_shares',
                'type' => 'switch',
                'title' => esc_html__('Show/hide Post Shares', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'subtitle' => esc_html__('Show or hide post views count number', 'papr'),
                'default' => false,
            ),
            array(
                'id' => 'blog_cats',
                'type' => 'switch',
                'title' => esc_html__('Show Categories', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'default' => true,
            ),

            array(
                'id' => 'blog_comment_num',
                'type' => 'switch',
                'title' => esc_html__('Show Comment Number', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'default' => false,
            ),
            array(
                'id' => 'blog_show_post_thumb',
                'type' => 'switch',
                'title' => esc_html__('Show blog post thumb', 'papr'),
                'on' => esc_html__('On', 'papr'),
                'off' => esc_html__('Off', 'papr'),
                'default' => true,
            ),

        )
    )
);
