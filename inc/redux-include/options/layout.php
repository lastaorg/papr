<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$opt_name = AXIL_THEME_PREFIX . '_options';
function axil_redux_post_type_fields($prefix)
{
    return array(
        array(
            'id' => $prefix . '_layout',
            'type' => 'button_set',
            'title' => esc_html__('Layout ', 'papr'),
            'options' => array(
                'left-sidebar' => esc_html__('Left Sidebar', 'papr'),
                'full-width' => esc_html__('Full Width', 'papr'),
                'right-sidebar' => esc_html__('Right Sidebar', 'papr'),
            ),
            'default' => 'right-sidebar'
        ),
        array(
            'id' => $prefix . '_sidebar',
            'type' => 'select',
            'title' => esc_html__('Custom Sidebar', 'papr'),
            'options' => Helper::get_custom_sidebar_fields(),
            'default' => 'sidebar',
            'required' => array($prefix . '_layout', '!=', 'full-width'),
        ),
        array(
            'id' => $prefix . '_padding_top',
            'type' => 'text',
            'title' => esc_html__('Content Padding Top', 'papr'),
            'validate' => 'numeric',
            'default' => '60',
        ),
        array(
            'id' => $prefix . '_padding_bottom',
            'type' => 'text',
            'title' => esc_html__('Content Padding Bottom', 'papr'),
            'validate' => 'numeric',
            'default' => '30'
        ),
        array(
            'id' => $prefix . '_breadcrumb',
            'type' => 'switch',
            'title' => esc_html__('Breadcrumb', 'papr'),
            'on' => esc_html__('Enabled', 'papr'),
            'off' => esc_html__('Disabled', 'papr'),
            'default' => true,

        ),
        array(
            'id' => $prefix . '_banner',
            'type' => 'switch',
            'title' => esc_html__('Banner', 'papr'),
            'on' => esc_html__('Enabled', 'papr'),
            'off' => esc_html__('Disabled', 'papr'),
            'default' => true,
        ),
    );
}


Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Pages Layouts', 'papr'),
        'id' => 'pages_layout_default',
        'icon' => 'el el-th',
    )
);
// Page
$axil_page_fields = axil_redux_post_type_fields('page');
$axil_page_fields[0]['default'] = 'full-width';
$axil_page_fields[5]['default'] = true;
$axil_page_fields[3]['default'] = '30';
$axil_page_fields[2]['default'] = '60';
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Page Layout', 'papr'),
        'id' => 'pages_section',
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $axil_page_fields
    )
);
// Search
$axil_search_fields = axil_redux_post_type_fields('search');
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Search Layout', 'papr'),
        'id' => 'search_section',
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $axil_search_fields
    )
);
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Archive', 'papr'),
        'id' => 'archive_defaults',
        'icon' => 'el el-th',

    )
);


//Post Archive
$axilnews_fields = axil_redux_post_type_fields('blog');
$axilnews_fields2 = array(

    array(
        'id' => 'blog_style',
        'type' => 'image_select',
        'title' => esc_html__('News/Archive Template', 'papr'),
        'default' => 'style1',
        'options' => array(
            'style1' => array(
                'title' => '<b>' . esc_html__('Layout 1', 'papr') . '</b>',
                'img' => Helper::get_img('archive-post/01.jpg'),
            ),
            'style2' => array(
                'title' => '<b>' . esc_html__('Layout 2', 'papr') . '</b>',
                'img' => Helper::get_img('archive-post/02.jpg'),
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

);

$axil_post_archive_fields = array_merge($axilnews_fields, $axilnews_fields2);

$axil_post_archive_fields[3]['default'] = '30';
$axil_post_archive_fields[2]['default'] = '60';
$axil_post_archive_fields[5]['default'] = true;

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('News Archive', 'papr'),
        'id' => 'blog_section',
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $axil_post_archive_fields
    )
);

//author Archive
$axilnews_fields = axil_redux_post_type_fields('author');
$axilnews_fields2 = array(

    array(
        'id' => 'author_style',
        'type' => 'image_select',
        'title' => esc_html__('News/Archive Template', 'papr'),
        'default' => 'style1',
        'options' => array(
            'style1' => array(
                'title' => '<b>' . esc_html__('Layout 1', 'papr') . '</b>',
                'img' => Helper::get_img('archive-post/01.jpg'),
            ),
            'style2' => array(
                'title' => '<b>' . esc_html__('Layout 2', 'papr') . '</b>',
                'img' => Helper::get_img('archive-post/02.jpg'),
            ),

        ),
    ),
    array(
        'id' => 'author_content_display',
        'type' => 'switch',
        'title' => esc_html__('Show content Display', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
        'required' => array('author_style', 'equals', 'style1'),
    ),
//    array(
//        'id' => 'author_content_number',
//        'type' => 'text',
//        'title' => esc_html__('Number of Content', 'papr'),
//        'validate' => 'numeric',
//        'default' => '20',
//        'required' => array('author_content_display', 'equals', true),
//    ),
    array(
        'id' => 'articles_by_this_author',
        'type' => 'text',
        'title' => esc_html__('Articles By This Author Text', 'papr'),
        'default' => 'Articles By This Author',
    ),
    array(
        'id' => 'author_author_name',
        'type' => 'switch',
        'title' => esc_html__('Show Author Name', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),
    array(
        'id' => 'author_date',
        'type' => 'switch',
        'title' => esc_html__('Show Date', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),
    array(
        'id' => 'author_view',
        'type' => 'switch',
        'title' => esc_html__('Show/hide Post View', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'subtitle' => esc_html__('Show or hide post views count number', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'author_update_date',
        'type' => 'switch',
        'title' => esc_html__('Show Post Update Date', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'author_shares',
        'type' => 'switch',
        'title' => esc_html__('Show/hide Post Shares', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'subtitle' => esc_html__('Show or hide post views count number', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'author_cats',
        'type' => 'switch',
        'title' => esc_html__('Show Categories', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),

    array(
        'id' => 'author_comment_num',
        'type' => 'switch',
        'title' => esc_html__('Show Comment Number', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'author_show_post_thumb',
        'type' => 'switch',
        'title' => esc_html__('Show blog post thumb', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),

);

$axil_author_archive_fields = array_merge($axilnews_fields, $axilnews_fields2);

$axil_author_archive_fields[3]['default'] = '30';
$axil_author_archive_fields[2]['default'] = '60';
$axil_author_archive_fields[5]['default'] = false;

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Author News', 'papr'),
        'id' => 'author_section',
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $axil_author_archive_fields
    )
);

// Team Archive
$axil_fields = axil_redux_post_type_fields('team_archive');
$axil_fields = array_merge($axil_fields);
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Team Archive', 'papr'),
        'id' => 'team_archive_section',
        'subsection' => true,
        'icon' => 'el el-network',
        'fields' => $axil_fields
    )
);

if (class_exists('WooCommerce')) {
    // Woocommerce Shop Archive
    $axil_shop_archive_fields = axil_redux_post_type_fields('shop');
    $axil_shop_archive_fields[3]['default'] = '30';
    $axil_shop_archive_fields[2]['default'] = '60';
    $axil_shop_archive_fields[0]['default'] = 'full-width';
    Redux::setSection($opt_name,
        array(
            'title' => esc_html__('Shop Archive', 'papr'),
            'id' => 'shop_section',
            'subsection' => true,
            'icon' => 'el el-network',
            'fields' => $axil_shop_archive_fields
        )
    );
}

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Single', 'papr'),
        'id' => 'archive_defaults_05',
        'icon' => 'el el-th',

    )
);
// Single Post
$axilnews_fields = axil_redux_post_type_fields('single_post');
$axilnews_fields[0]['default'] = 'full-width';
$axilnews_fields2 = array(
    array(
        'id' => 'post_style',
        'type' => 'image_select',
        'title' => esc_html__('Single Post Template  Layout', 'papr'),
        'default' => '6',
        'options' => array(
            '1' => array(
                'title' => '<b>' . esc_html__('Layout 1', 'papr') . '</b>',
                'img' => AXIL_IMG_URL . 'post-layout/post-layout-1.jpg',
            ),
            '2' => array(
                'title' => '<b>' . esc_html__('Layout 2', 'papr') . '</b>',
                'img' => AXIL_IMG_URL . 'post-layout/post-layout-2.jpg',
            ),
            '3' => array(
                'title' => '<b>' . esc_html__('Layout 3', 'papr') . '</b>',
                'img' => AXIL_IMG_URL . 'post-layout/post-layout-3.jpg',
            ),
            '4' => array(
                'title' => '<b>' . esc_html__('Layout 4', 'papr') . '</b>',
                'img' => AXIL_IMG_URL . 'post-layout/post-layout-4.jpg',
            ),
            '5' => array(
                'title' => '<b>' . esc_html__('Layout 5', 'papr') . '</b>',
                'img' => AXIL_IMG_URL . 'post-layout/post-layout-5.jpg',
            ),
            '6' => array(
                'title' => '<b>' . esc_html__('Layout 6', 'papr') . '</b>',
                'img' => AXIL_IMG_URL . 'post-layout/post-layout-6.jpg',
            ),

        ),
    ),
    array(
        'id' => 'post_date',
        'type' => 'switch',
        'title' => esc_html__('Show Post Date', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),

    array(
        'id' => 'post_update_date',
        'type' => 'switch',
        'title' => esc_html__('Show Post Update Date', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'post_view',
        'type' => 'switch',
        'title' => esc_html__('Show/hide Post View', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'subtitle' => esc_html__('Show or hide post views count number', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'post_shares',
        'type' => 'switch',
        'title' => esc_html__('Show/hide Post Shares', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'subtitle' => esc_html__('Show or hide post views count number', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'post_author_name',
        'type' => 'switch',
        'title' => esc_html__('Show Author Name', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),

    array(
        'id' => 'post_author_bio',
        'type' => 'switch',
        'title' => esc_html__('Show Author Bio', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => false,
    ),

    array(
        'id' => 'post_cats',
        'type' => 'switch',
        'title' => esc_html__('Show Categories', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),
    array(
        'id' => 'post_comment_num',
        'type' => 'switch',
        'title' => esc_html__('Show Comment Number', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'post_links',
        'type' => 'switch',
        'title' => esc_html__('Show Next Post / Previous post', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),
    array(
        'id' => 'post_tags',
        'type' => 'switch',
        'title' => esc_html__('Show Tags', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),

    array(
        'id' => 'post_share_display_top',
        'type' => 'switch',
        'title' => esc_html__('Share Button Show/hide in top', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => true,
    ),
    array(
        'id' => 'post_share_display_footer',
        'type' => 'switch',
        'title' => esc_html__('Share Button Show/hide in footer ', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => false,
    ),

    array(
        'id' => 'show_related_post',
        'type' => 'switch',
        'title' => esc_html__('Show Related post', 'papr'),
        'on' => esc_html__('On', 'papr'),
        'off' => esc_html__('Off', 'papr'),
        'default' => false,
    ),
    array(
        'id' => 'section_post_related',
        'type' => 'section',
        'title' => esc_html__('Related Post Settings', 'papr'),
        'indent' => true,
    ),

    array(
        'id' => 'related_post_area_title',
        'type' => 'text',
        'title' => esc_html__('Related Post Area Title', 'papr'),
        'required' => array('show_related_post', 'equals', true),
        'default' => esc_html__('Related Posts', 'papr'),
    ),

    array(
        'id' => 'show_related_post_number',
        'type' => 'text',
        'title' => esc_html__('Show Related Post Number', 'papr'),
        'required' => array('show_related_post', 'equals', true),
        'default' => '4',
    ),

    array(
        'id' => 'related_post_query',
        'type' => 'radio',
        'title' => esc_html__('Query Type', 'papr'),
        'subtitle' => esc_html__('Post Query', 'papr'),
        'required' => array('show_related_post', 'equals', true),
        'options' => array(
            'cat' => esc_html__('Posts in the same Categories', 'papr'),
            'tag' => esc_html__('Posts in the same Tags', 'papr'),
            'author' => esc_html__('Posts by the same Author', 'papr'),
        ),
        'default' => 'cat'
    ),

    array(
        'id' => 'related_post_sort',
        'type' => 'radio',
        'title' => esc_html__('Sort Order', 'papr'),
        'subtitle' => esc_html__('Display post Order', 'papr'),
        'required' => array('show_related_post', 'equals', true),
        'options' => array(
            'recent' => esc_html__('Recent Posts', 'papr'),
            'rand' => esc_html__('Random Posts', 'papr'),
            'modified' => esc_html__('Last Modified Posts', 'papr'),
            'popular' => esc_html__('Most Commented posts', 'papr'),
            'views' => esc_html__('Most Viewed posts', 'papr'),
        ),
        'required' => array('show_related_post', 'equals', true),
        'default' => 'recent'
    ),
    array(
        'id' => 'related_title_limit',
        'type' => 'text',
        'required' => array('show_related_post', 'equals', true),
        'title' => esc_html__('Related Post Title Length', 'papr'),
        'default' => '15',
    ),

);

$axil_single_post_fields = array_merge($axilnews_fields, $axilnews_fields2);

$axil_single_post_fields[3]['default'] = '0';
$axil_single_post_fields[2]['default'] = '0';
$axil_single_post_fields[5]['default'] = false;

Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Post Single', 'papr'),
        'id' => 'single_post_section',
        'icon' => 'el el-network',
        'fields' => $axil_single_post_fields,
        'subsection' => true,
    )
);
// Single Team
//$axil_fields = axil_redux_post_type_fields('team');
//
//Redux::setSection($opt_name,
//    array(
//        'title' => esc_html__('Team Single ', 'papr'),
//        'id' => 'single_team_section',
//        'icon' => 'el el-network',
//        'fields' => $axil_fields,
//        'subsection' => true,
//    )
//);

if (class_exists('WooCommerce')) {
    // Woocommerce Product
    $axil_product_fields = axil_redux_post_type_fields('product');
    $axil_product_fields[3]['default'] = '30';
    $axil_product_fields[2]['default'] = '60';

    Redux::setSection($opt_name,
        array(
            'title' => esc_html__('Product Single', 'papr'),
            'id' => 'product_section',
            'icon' => 'el el-network',
            'subsection' => true,
            'fields' => $axil_product_fields
        )
    );
}
Redux::setSection($opt_name,
    array(
        'title' => esc_html__('Settings', 'papr'),
        'id' => 'settings_defaults_06',
        'icon' => 'el el-th',

    )
);
