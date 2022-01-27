<?php
/**
 * @param $options
 * dialog
 */
function papr_confirmation_dialog_options($options)
{
    return array_merge($options, array(
        'width' => 500,
        'dialogClass' => 'wp-dialog',
        'resizable' => false,
        'height' => 'auto',
        'modal' => true,
    ));
}

add_filter('pt-ocdi/confirmation_dialog_options', 'papr_confirmation_dialog_options', 10, 1);

/**
 * papr_import_files
 * @return array
 */
function papr_import_files()
{
    return array(
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Main Demo',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/main-demo.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Magazine',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/magazine.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-two/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Illustration',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/illustration.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-three/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Fashion',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/fashion.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-four/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Blog',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/blog.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-five/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Sports',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/sports.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-six/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Technology',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/technology.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-seven/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Travel',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/travel.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-eight/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Photography',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/photography.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-nine/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Light Version'),
            'import_file_name' => 'Personal',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/preview/personal.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr/home-ten/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),

        // Dark
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Main Demo',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/main-demo.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Magazine',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/magazine.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-two/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Illustration',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/illustration.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-three/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Fashion',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/fashion.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-four/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Blog',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/blog.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-five/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Sports',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/sports.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-six/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Technology',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/technology.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-seven/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Travel',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/travel.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-eight/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Photography',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/photography.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-nine/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Dark Version'),
            'import_file_name' => 'Personal',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/dark/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/dark/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/dark/preview/personal.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-dark/home-ten/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
        array(
            'categories' => array('Cars'),
            'import_file_name' => 'Cars',
            'import_file_url' => 'http://axilthemes.com/themes/papr/demo/cars/content.xml',
            'import_widget_file_url' => 'http://axilthemes.com/themes/papr/demo/cars/widget.wie',
            'import_customizer_file_url' => 'http://axilthemes.com/themes/papr/demo/cars/customizer.dat',
            'import_redux' => array(
                array(
                    'file_url' => 'http://axilthemes.com/themes/papr/demo/cars/redux_options.json',
                    'option_name' => 'papr_options',
                )
            ),
            'import_preview_image_url' => 'http://axilthemes.com/themes/papr/demo/cars/preview/cars.jpg',
            'preview_url' => 'http://axilthemes.com/themes/papr-car/home-eleven/',
            'import_notice' => esc_html__('After you import this demo, you will have setup all content.', 'papr'),
        ),
    );
}

add_filter('pt-ocdi/import_files', 'papr_import_files');

function papr_before_content_import()
{
    // woocommerce pages
    $woocommerce_demo_imported = get_option('papr_woocommerce_demo_imported');
    if (empty($woocommerce_demo_imported)) {
        update_option('woocommerce_cart_page_id', '1764');
        update_option('woocommerce_checkout_page_id', '1765');
        update_option('woocommerce_myaccount_page_id', '1766');
        update_option('woocommerce_shop_page_id', '1763');

        update_option('papr_woocommerce_demo_imported', 'imported');
    }
}
add_action('pt-ocdi/before_content_import', 'papr_before_content_import');


/**
 * papr_before_widgets_import
 * @param $selected_import
 */
function papr_before_widgets_import($selected_import)
{

    // Remove 'Hello World!' post
    wp_delete_post(1, true);
    // Remove 'Sample page' page
    wp_delete_post(2, true);

    $sidebars_widgets = get_option('sidebars_widgets');
    $sidebars_widgets['sidebar'] = array();
    update_option('sidebars_widgets', $sidebars_widgets);

}

add_action('pt-ocdi/before_widgets_import', 'papr_before_widgets_import');

/*
 * Automatically assign
 * "Front page",
 * "Posts page" and menu
 * locations after the importer is done
 */
function papr_after_import_setup($selected_import)
{

    $demo_imported = get_option('papr_demo_imported');

    $cpt_support = get_option('elementor_cpt_support');
    $elementor_disable_color_schemes = get_option('elementor_disable_color_schemes');
    $elementor_disable_typography_schemes = get_option('elementor_disable_typography_schemes');
    $elementor_container_width = get_option('elementor_container_width');


    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = ['page', 'post', 'elementor_disable_color_schemes']; //create array of our default supported post types
        update_option('elementor_cpt_support', $cpt_support); //write it to the database
    }
    if (empty($elementor_disable_color_schemes)) {
        update_option('elementor_disable_color_schemes', 'yes'); //update database
    }
    if (empty($elementor_disable_typography_schemes)) {
        update_option('elementor_disable_typography_schemes', 'yes'); //update database
    }
    if (empty($elementor_container_width)) {
        update_option('elementor_container_width', '1260'); //update database
    }

    $elementor_general_settings = array(
        'container_width' => (!empty($elementor_container_width)) ? $elementor_container_width : '1260',
    );
    update_option('_elementor_general_settings', $elementor_general_settings); //update database

    // Update Global Css Options For Elementor
    $currentTime = strtotime("now");
    $elementor_global_css = array(
        'time' => $currentTime,
        'fonts' => array()
    );
    update_option('_elementor_global_css', $elementor_global_css); //update database

    update_option('bcn_options[hseparator]', '<span class="dvdr"> / </span>'); //update database
    update_option('shared_counts_options[style]', 'axil_style'); //update database
    update_option('socialcountplus_settings[facebook_active]', '1'); //update database
    update_option('papr_elementor_custom_setting_imported', 'elementor_custom_setting_imported');


    // Shared Counts Options
    $shared_counts_options_style = get_option('shared_counts_options[style]');
    
    $sharecountoptions = array(
        'count_source' => 'none',
        'sharedcount_key' => "",
        'fb_access_token' => "",
        'included_services' => array('facebook', 'twitter', 'linkedin', 'pinterest'),
        'recaptcha_site_key' => "",
        'recaptcha_secret_key' => "",
        'style' => $shared_counts_options_style,
        'theme_location' => 'before_after_content',
        'post_type' => ['post'],
        'total_only' => "",
        'preserve_http' => "",
        'query_services' => array(),
        'twitter_counts' => "",
        'yummly_counts' => "",
        'recaptcha' => "",
    );
    update_option('shared_counts_options', $sharecountoptions); //update database


    $site_url = get_site_url();

    // Social Count Plus
    $socialcountplus_settings = array(
        'comments_url' => $site_url,
        'facebook_active' => 1,
        'facebook_id' => "",
        'facebook_app_secret' => "",
        'github_username' => "",
        'googleplus_id' => "",
        'googleplus_api_key' => "",
        'instagram_active' => 1,
        'instagram_username' => "",
        'instagram_user_id' => "",
        'instagram_access_token' => "",
        'linkedin_active' => 1,
        'linkedin_company_id' => "",
        'linkedin_access_token' => "",
        'pinterest_active' => 1,
        'pinterest_username' => "",
        'posts_post_type' => "post",
        'posts_url' => $site_url,
        'soundcloud_active' => 1,
        'soundcloud_username' => "",
        'soundcloud_client_id' => "",
        'steam_group_name' => "",
        'tumblr_hostname' => "",
        'tumblr_consumer_key' => "",
        'tumblr_consumer_secret' => "",
        'tumblr_token' => "",
        'tumblr_token_secret' => "",
        'twitch_active' => 1,
        'twitch_username' => "",
        'twitch_client_ID' => "",
        'twitter_user' => "",
        'twitter_consumer_key' => "",
        'twitter_consumer_secret' => "",
        'twitter_access_token' => "",
        'twitter_access_token_secret' => "",
        'users_user_role' => "subscriber",
        'users_label' => "users",
        'users_url' => $site_url,
        'vimeo_active' => 1,
        'vimeo_username' => "",
        'youtube_active' => 1,
        'youtube_user' => "",
        'youtube_url' => "",
        'youtube_api_key' => "",
    );

    update_option('socialcountplus_settings', $socialcountplus_settings); //update database


    // social count plus design
    $socialcountplus_design = array(
        'models' => "0",
        'text_color' => "#ffffff",
        'icons' => "facebook,twitch,youtube,linkedin,vimeo,pinterest,instagram,soundcloud"
    );
    update_option('socialcountplus_design', $socialcountplus_design); //update database



    if (empty($demo_imported)) {

        // Home page selected
        if ('Main Demo' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Magazine' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Two');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Illustration' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Three');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Fashion' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Four');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Blog' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Five');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Sports' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Six');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Technology' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Seven');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Travel' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Eight');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Photography' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Nine');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Personal' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Ten');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        } elseif ('Cars' === $selected_import['import_file_name']) {
            $front_page_id = get_page_by_title('Home Eleven');
            update_option('papr_theme_active_demo', $selected_import['import_file_name']);
        }

        $blog_page_id = get_page_by_title('News');
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front_page_id->ID);
        update_option('page_for_posts', $blog_page_id->ID);

        update_option('papr_demo_imported', 'imported');
    }

    // Set Menu As Primary && Off Canvus Menu
    $main_menu = get_term_by('name', 'main menu', 'nav_menu');
    $offcanvus_menu = get_term_by('name', 'Off Canvas', 'nav_menu');
    $headertop = get_term_by('name', 'header to', 'nav_menu');
    $footerbottom = get_term_by('name', 'footer-bottom-menu', 'nav_menu');
    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id,
        'offcanvas' => $offcanvus_menu->term_id,
        'headertop' => $headertop->term_id,
        'footerbottom' => $footerbottom->term_id
    ));

}

add_action('pt-ocdi/after_import', 'papr_after_import_setup');


/**
 * time_for_one_ajax_call
 * @return int
 */
function papr_change_time_of_single_ajax_call()
{
    return 20;
}

add_action('pt-ocdi/time_for_one_ajax_call', 'papr_change_time_of_single_ajax_call');


// To make demo imported items selected
add_action('admin_footer', 'papr_pt_ocdi_add_scripts');
function papr_pt_ocdi_add_scripts()
{
    $demo_imported = get_option('papr_theme_active_demo');
    if (!empty($demo_imported)) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                $('.ocdi__gl-item.js-ocdi-gl-item').each(function () {
                    var ocdi_theme_title = $(this).data('name');
                    var current_ocdi_theme_title = '<?php echo strtolower($demo_imported); ?>';
                    if (ocdi_theme_title == current_ocdi_theme_title) {
                        $(this).addClass('active_demo');
                        return false;
                    }
                });
            });
        </script>
        <?php
    }
}

/**
 * Remove ads
 */
add_filter('pt-ocdi/disable_pt_branding', '__return_true');

