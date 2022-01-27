<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

add_action('wp_enqueue_scripts', 'axil_register_scripts', 12);
if (!function_exists('axil_register_scripts')) {
    function axil_register_scripts()
    {
        wp_deregister_style('font-awesome');
        wp_register_style('owl-carousel', AXIL_CSS_URL . 'owl.carousel.min.css', array(), AXIL_VERSION);
        wp_register_style('owl-theme-default', AXIL_CSS_URL . 'owl.theme.default.min.css', array(), AXIL_VERSION);
        wp_register_style('animate', AXIL_CSS_URL . 'animate.css', array(), AXIL_VERSION);
        if (is_rtl()) {
            wp_register_style('magnific-popup', AXIL_CSS_URL . 'magnific-popup.css', array(), AXIL_VERSION);
        } else {
            wp_register_style('magnific-popup', AXIL_RTL_URL . 'magnific-popup.css', array(), AXIL_VERSION);
        }
        wp_register_style('slick', AXIL_CSS_URL . 'slick.css', array(), AXIL_VERSION);
        wp_register_script('owl-carousel', AXIL_JS_URL . 'owl.carousel.min.js', array('jquery'), AXIL_VERSION, true);
        wp_register_script('isotope-pkgd', AXIL_JS_URL . 'isotope.pkgd.min.js', array('jquery'), AXIL_VERSION, true);
        wp_register_script('waypoints', AXIL_JS_URL . 'waypoints.min.js', array('jquery'), AXIL_VERSION, true);
        wp_register_script('counterup', AXIL_JS_URL . 'jquery.counterup.min.js', array('jquery'), AXIL_VERSION, true);
        wp_register_script('magnific-popup', AXIL_JS_URL . 'jquery.magnific-popup.min.js', array('jquery'), AXIL_VERSION);
        wp_register_script('slick', AXIL_JS_URL . 'slick.min.js', array('jquery'), AXIL_VERSION);

    }
}

add_action('wp_enqueue_scripts', 'axil_enqueue_scripts', 15);

if (!function_exists('axil_enqueue_scripts')) {
    function axil_enqueue_scripts()
    {
        $papr_options = Helper::axil_get_options();
        wp_enqueue_style('my_switcher', AXIL_CSS_URL . 'my_switcher.css', array(), AXIL_VERSION);
        wp_enqueue_style('font-awesome', AXIL_CSS_URL . 'fontawesome-all.min.css', array(), AXIL_VERSION);
        wp_enqueue_style('papr-fonts', papr_fonts_url());
        wp_enqueue_style('plyr', AXIL_CSS_URL . 'plyr.css', array(), AXIL_VERSION);
        wp_enqueue_style('font-iconfont', AXIL_CSS_URL . 'iconfont.css">', array(), AXIL_VERSION);
        wp_enqueue_style('animate');
        if (is_rtl()) {
            wp_enqueue_style('bootstrap', AXIL_RTL_URL . 'bootstrap.min.css', array(), AXIL_VERSION);
            wp_enqueue_style('axil-style', AXIL_RTL_URL . 'style.css', array(), AXIL_VERSION);
            wp_enqueue_style('axil-rtl', AXIL_CSS_URL . 'rtl.css', array(), AXIL_VERSION);
        } else {
            wp_enqueue_style('bootstrap', AXIL_CSS_URL . 'bootstrap.min.css', array(), AXIL_VERSION);
            wp_enqueue_style('axil-style', AXIL_CSS_URL . 'style.css', array(), AXIL_VERSION);

        }
//        if (isset($papr_options['active_dark_mode'])){
//            if ($papr_options['active_dark_mode'] == 'on' || $papr_options['active_dark_mode'] == 1){
//                wp_enqueue_style('papr-dark', AXIL_CSS_URL . 'dark.css', array(), AXIL_VERSION);
//            }else{
//                wp_enqueue_style('papr-dark', AXIL_CSS_URL . 'light.css', array(), AXIL_VERSION);
//            }
//        }
        wp_enqueue_style('papr-dark-style', AXIL_CSS_URL . 'dark.css', array(), AXIL_VERSION);

//        wp_enqueue_style('theme-switch', AXIL_CSS_URL . 'light.css', array(), AXIL_VERSION);


        Helper::axil_elementor_scripts();
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script('popper', AXIL_JS_URL . 'popper.js', array(), AXIL_VERSION);
        wp_enqueue_script('bootstrap', AXIL_JS_URL . 'bootstrap.min.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('theia-sticky-sidebar', AXIL_JS_URL . 'theia-sticky-sidebar.min.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('jquery-nav', AXIL_JS_URL . 'jquery.nav.min.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('jquery-sticky-kit', AXIL_JS_URL . 'jquery.sticky-kit.min.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('plyr-polyfilled', AXIL_JS_URL . 'plyr.polyfilled.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('css-vars-ponyfill', AXIL_JS_URL . 'css-vars-ponyfill@2.js', '', AXIL_VERSION, true);
        wp_enqueue_script('easing', AXIL_JS_URL . 'easing-1.3.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('jquery-nicescroll', AXIL_JS_URL . 'jquery.nicescroll.min.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('isotope-pkgd');
        // Main js
        wp_enqueue_script('axil-plugins', AXIL_JS_URL . 'plugins.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('axil-cookie', AXIL_JS_URL . 'js.cookie.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('axil-main', AXIL_JS_URL . 'main.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_script('jquery-style-switcher', AXIL_JS_URL . 'jquery.style.switcher.js', array('jquery'), AXIL_VERSION, true);

        // Localization
        $adminajax = esc_url(admin_url('admin-ajax.php'));
        $localize_data = array(
            'rtl' => is_rtl() ? 'yes' : 'no',
            'ajaxurl' => $adminajax,
        );
        wp_localize_script('axil-main', 'AxilObj', $localize_data);




        $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
        //after wp_enqueue_script
        wp_localize_script( 'jquery-style-switcher', 'directory_uri', $translation_array );





    }
}
/**
 * admin script
 */

if (!function_exists('axil_media_scripts')) {
    function axil_media_scripts()
    {
        wp_enqueue_style('axil-wp-admin', AXIL_ADMIN_CSS_URL . 'admin-style.css', array(), AXIL_VERSION);
        if (is_rtl()){
            wp_enqueue_style('axil-rtl-admin', AXIL_ADMIN_CSS_URL . 'rtl-admin.css', array(), AXIL_VERSION);
        }
        wp_enqueue_media();
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('axil-logo-uploader', AXIL_ADMIN_JS_URL . 'logo-uploader.js', array('jquery'), AXIL_VERSION, true);
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('axil-widget-color', AXIL_ADMIN_JS_URL . 'axil-widget-color.js', array('jquery', 'wp-color-picker'), AXIL_VERSION, true);
        wp_enqueue_style('font-awesome');


    }
}
add_action('admin_enqueue_scripts', 'axil_media_scripts', 1000);