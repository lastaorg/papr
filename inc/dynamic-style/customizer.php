<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since papr 1.0
 */
/**
 * papr_custom_customize_register
 */
if (!function_exists('papr_custom_customize_register')) {
    function papr_custom_customize_register()
    {
        /**
         * Custom Separator
         */
        class Papr_Separator_Custom_control extends WP_Customize_Control
        {
            public $type = 'separator';

            public function render_content()
            {
                ?>
                <p>
                <hr></p>
                <?php
            }
        }
    }

    add_action('customize_register', 'papr_custom_customize_register');
}

/**
 * Start papr_Customize
 */
class papr_Customize
{
    /**
     * This hooks into 'customize_register' (available as of WP 3.4) and allows
     * you to add new sections and controls to the Theme Customize screen.
     *
     * Note: To enable instant preview, we have to actually write a bit of custom
     * javascript. See papr_live_preview() for more.
     *
     * @see add_action('customize_register',$func)
     * @param \WP_Customize_Manager $wp_customize
     * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
     * @since papr 1.0
     */
    public static function register($wp_customize)
    {

        //1. Define a new section (if desired) to the Theme Customizer
        $wp_customize->add_panel('papr_colors_options',
            array(
                'title' => esc_html__('Papr Colors Options', 'papr'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'description' => esc_html__('Allows you to customize some example settings for papr.', 'papr'), //Descriptive tooltip
            )
        );

        $wp_customize->add_section('papr_colors_main_options',
            array(
                'title' => esc_html__('General', 'papr'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'papr_colors_options',
            )
        );

        /*************************
         * Primary
         ************************/
        $wp_customize->add_setting('color_primary',
            array(
                'default' => '#ff2c54',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_primary',
            array(
                'label' => esc_html__('Primary Color', 'papr'),
                'settings' => 'color_primary',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));
        /**
         * Separator
         */
        $wp_customize->add_setting('papr_separator_heading_hover', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Papr_Separator_Custom_control($wp_customize, 'papr_separator_heading_hover', array(
            'settings' => 'papr_separator_heading_hover',
            'section' => 'papr_colors_main_options',
        )));
        // Heading Color
        $wp_customize->add_setting('color_heading',
            array(
                // 'default' => '#120023', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_heading',
            array(
                'label' => esc_html__('Title Color', 'papr'),
                'settings' => 'color_heading',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));
        // Heading Hover Color
        $wp_customize->add_setting('color_heading_hover',
            array(
                // 'default' => '#121213',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_heading_hover',
            array(
                'label' => esc_html__('Title Hover Color', 'papr'),
                'settings' => 'color_heading_hover',
                'priority' => 10,
                'section' => 'papr_colors_main_options',

            )
        ));
        // Heading Hover Color Dark Section
        $wp_customize->add_setting('color_heading_hover_dark_bg',
            array(
                'default' => '#ffffff',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_heading_hover_dark_bg',
            array(
                'label' => esc_html__('Title Hover Color (Dark Background)', 'papr'),
                'settings' => 'color_heading_hover_dark_bg',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('papr_separator_body_color', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Papr_Separator_Custom_control($wp_customize, 'papr_separator_body_color', array(
            'settings' => 'papr_separator_body_color',
            'section' => 'papr_colors_main_options',
        )));

        // Body Color
        $wp_customize->add_setting('color_body',
            array(
                // 'default' => '#494e51', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_body',
            array(
                'label' => esc_html__('Body Color', 'papr'),
                'settings' => 'color_body',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('papr_separator_link_color', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Papr_Separator_Custom_control($wp_customize, 'papr_separator_link_color', array(
            'settings' => 'papr_separator_link_color',
            'section' => 'papr_colors_main_options',
        )));

        // Link Color
        $wp_customize->add_setting('color_link',
            array(
                // 'default' => '#494e51', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_link',
            array(
                'label' => esc_html__('Global Link Color', 'papr'),
                'settings' => 'color_link',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));
        // Link Hover Color
        $wp_customize->add_setting('color_link_hover',
            array(
                // 'default' => '#494e51', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_link_hover',
            array(
                'label' => esc_html__('Global Link Hover Color', 'papr'),
                'settings' => 'color_link_hover',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('papr_separator_meta_color', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Papr_Separator_Custom_control($wp_customize, 'papr_separator_meta_color', array(
            'settings' => 'papr_separator_meta_color',
            'section' => 'papr_colors_main_options',
        )));

        // Meta Color
        $wp_customize->add_setting('color_meta',
            array(
                // 'default' => '#7b7b7b', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_meta',
            array(
                'label' => esc_html__('Meta Text Color', 'papr'),
                'settings' => 'color_meta',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));
        // Meta Color
        $wp_customize->add_setting('link_color_meta',
            array(
                // 'default' => '#7b7b7b',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_link_color_meta',
            array(
                'label' => esc_html__('Meta Link Color', 'papr'),
                'settings' => 'link_color_meta',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));
        // Meta hover Color
        $wp_customize->add_setting('color_meta_hover',
            array(
                // 'default' => '#ff2c54', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_meta_hover',
            array(
                'label' => esc_html__('Meta Link Hover Color', 'papr'),
                'settings' => 'color_meta_hover',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));
        // Meta Hover Dark Section
        $wp_customize->add_setting('color_meta_hover_dark_bg',
            array(
                // 'default' => '#ff2c54', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_meta_hover_dark_bg',
            array(
                'label' => esc_html__('Meta Hover Color (Dark Background)', 'papr'),
                'settings' => 'color_meta_hover_dark_bg',
                'priority' => 10,
                'section' => 'papr_colors_main_options',
            )
        ));


        /*************************
         * Header Color
         ************************/

        $wp_customize->add_section('papr_colors_header_options',
            array(
                'title' => esc_html__('Header', 'papr'), //Visible title of section
                'priority' => 10, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'papr_colors_options',
            )
        );

        /*
        * Top Bar Header
        */
        // Text color
        $wp_customize->add_setting('color_topbar_body_color',
            array(
                // 'default' => '#cecece',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_topbar_body_color',
            array(
                'label' => esc_html__('Header Top - Text Color', 'papr'),
                'settings' => 'color_topbar_body_color',
                'priority' => 10,
                'section' => 'papr_colors_header_options',
            )
        ));
        // Link Color
        $wp_customize->add_setting('color_topbar_link_color',
            array(
                // 'default' => '#cecece',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_topbar_link_color',
            array(
                'label' => esc_html__('Header Top - Link Color', 'papr'),
                'settings' => 'color_topbar_link_color',
                'priority' => 10,
                'section' => 'papr_colors_header_options',
            )
        ));
        // Link Hover Color
        $wp_customize->add_setting('color_topbar_link_hover_color',
            array(
                // 'default' => '#ff2c54',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_topbar_link_hover_color',
            array(
                'label' => esc_html__('Header Top - Link Hover Color', 'papr'),
                'settings' => 'color_topbar_link_hover_color',
                'priority' => 10,
                'section' => 'papr_colors_header_options',
            )
        ));
        // BG Color
        $wp_customize->add_setting('color_topbar_bg',
            array(
                'default' => '#121213',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_topbar_bg',
            array(
                'label' => esc_html__('Header Top - Background Color', 'papr'),
                'settings' => 'color_topbar_bg',
                'priority' => 10,
                'section' => 'papr_colors_header_options',
            )
        ));

        /**
         * Separator
         */
        $wp_customize->add_setting('papr_separator_heading_top', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Papr_Separator_Custom_control($wp_customize, 'papr_separator_heading_top', array(
            'settings' => 'papr_separator_heading_top',
            'section' => 'papr_colors_header_options',
        )));

        // Link Color
        $wp_customize->add_setting('color_header_link_color',
            array(
                // 'default' => '#121213', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_header_link_color',
            array(
                'label' => esc_html__('Navigation Link Color', 'papr'),
                'settings' => 'color_header_link_color',
                'priority' => 10,
                'section' => 'papr_colors_header_options',
            )
        ));
        // Link Hover Color
        $wp_customize->add_setting('color_header_link_hover_color',
            array(
                // 'default' => '#ff2c54', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_header_link_hover_color',
            array(
                'label' => esc_html__('Navigation Link Hover Color', 'papr'),
                'settings' => 'color_header_link_hover_color',
                'priority' => 10,
                'section' => 'papr_colors_header_options',
            )
        ));
        // BG Color
        $wp_customize->add_setting('color_header_bg',
            array(
                'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_header_bg',
            array(
                'label' => esc_html__('Navigation Background Color', 'papr'),
                'settings' => 'color_header_bg',
                'priority' => 10,
                'section' => 'papr_colors_header_options',
            )
        ));


        //  Footer
        $wp_customize->add_section('papr_colors_footer_options',
            array(
                'title' => esc_html__('Footer', 'papr'), //Visible title of section
                'priority' => 35, //Determines what order this appears in
                'capability' => 'edit_theme_options', //Capability needed to tweak
                'panel' => 'papr_colors_options',
            )
        );

        // Footer Heading Color
        $wp_customize->add_setting('color_footer_heading_color',
            array(
                'default' => '#ffffff',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_footer_heading_color',
            array(
                'label' => esc_html__('Title Color', 'papr'),
                'settings' => 'color_footer_heading_color',
                'priority' => 10,
                'section' => 'papr_colors_footer_options',
            )
        ));

        // Text Color
        $wp_customize->add_setting('color_footer_body_color',
            array(
                // 'default' => '#6b7074', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_footer_body_color',
            array(
                'label' => esc_html__('Text Color', 'papr'),
                'settings' => 'color_footer_body_color',
                'priority' => 10,
                'section' => 'papr_colors_footer_options',
            )
        ));

        // Link Color
        $wp_customize->add_setting('color_footer_link_color',
            array(
                // 'default' => '#6b7074', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_footer_link_color',
            array(
                'label' => esc_html__('Link Color', 'papr'),
                'settings' => 'color_footer_link_color',
                'priority' => 10,
                'section' => 'papr_colors_footer_options',
            )
        ));

        // Link Hover Color
        $wp_customize->add_setting('color_footer_link_hover_color',
            array(
                // 'default' => '#ff2c54', 
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_footer_link_hover_color',
            array(
                'label' => esc_html__('Link Hover Color', 'papr'),
                'settings' => 'color_footer_link_hover_color',
                'priority' => 10,
                'section' => 'papr_colors_footer_options',
            )
        ));

        // Footer Bottom Border Top Color
        $wp_customize->add_setting('color_footer_bottom_border_color',
            array(
                'default' => '#121213',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_footer_bottom_border_color',
            array(
                'label' => esc_html__('Footer Bottom Border Color', 'papr'),
                'settings' => 'color_footer_bottom_border_color',
                'priority' => 10,
                'section' => 'papr_colors_footer_options',
            )
        ));
        // Background Color
        $wp_customize->add_setting('color_footer_bg_color',
            array(
                'default' => '#000000',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'papr_color_footer_bg_color',
            array(
                'label' => esc_html__('Footer Background Color', 'papr'),
                'settings' => 'color_footer_bg_color',
                'priority' => 10,
                'section' => 'papr_colors_footer_options',
            )
        ));

    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     *
     * Used by hook: 'wp_head'
     *
     * @see add_action('wp_head',$func)
     * @since papr 1.0
     */
    public static function papr_custom_color_output()
    {
        ?>
        <!--Customizer CSS-->
        <style type="text/css">

            /* Body */
            <?php self::generate_css('body, p', 'color ', 'color_body'); ?>
            /* Link */
            <?php self::generate_css('a, .header-top__social-share li a', 'color ', 'color_link'); ?>
            /* Link Hover */
            <?php self::generate_css('a:hover, .header-top__social-share li a:hover', 'color ', 'color_link_hover'); ?>
            /* Meta */
            <?php self::generate_css('.post-metas, .axil-img-container .post-metas ul, .post-metas ul ', 'color ', 'color_meta'); ?>
            /* Meta Hover */
            <?php self::generate_css('.post-metas a, .caption-meta a', 'color ', 'link_color_meta'); ?>
            /* Meta Link Hover */
            <?php self::generate_css('.post-metas a:hover, .caption-meta a:hover', 'color ', 'color_meta_hover'); ?>
            /* Meta Hover Dark Section */
            <?php self::generate_css('.bg-grey-dark-one .post-metas a:hover', 'color ', 'color_meta_hover_dark_bg'); ?>


            /************************************************************************************
             * Header Top Bar
             ************************************************************************************/
            /* Background Color */
            <?php self::generate_css('.header-top.bg-grey-dark-one, .header-top.header-top__style-two.bg-grey-dark-seven', 'background-color ', 'color_topbar_bg'); ?>
            /* Body Color */
            <?php self::generate_css('.header-top li, .header-top .current-date', 'color ', 'color_topbar_body_color'); ?>
            /* Link Color */
            <?php self::generate_css('.header-top a, .header-top__social-share li a', 'color ', 'color_topbar_link_color'); ?>
            /* Link Hover Color */
            <?php self::generate_css('.header-top a:hover, .header-top__social-share li a:hover', 'color ', 'color_topbar_link_hover_color'); ?>
            /************************************************************************************
             * Header
             ************************************************************************************/
            /* Background Color */
            <?php self::generate_css('.navbar.bg-white, .navbar.bg-grey-dark-one, .navbar.bg-grey-light-three, .navbar.navbar__style-three.axil-header.bg-color-white, .navbar__style-three .submenu, .submenu, .lang-dropdown .dropdown-menu', 'background-color ', 'color_header_bg', '', ' !important'); ?>
            /* Link Color */
            <?php self::generate_css('.navbar.bg-white .main-navigation li,.navbar__style-three .main-navigation li,  .navbar.bg-white .nav-search-field-toggler, .lang-dropdown .txt-btn, .navbar__style-three .nav-search-field-toggler, .lang-dropdown .dropdown-menu .dropdown-item', 'color ', 'color_header_link_color'); ?>
            <?php self::generate_css('.side-nav-toggler span', 'background-color ', 'color_header_link_color'); ?>
            /* Link Hover Color */
            <?php self::generate_css('.navbar.bg-white .main-navigation li:hover,.navbar__style-three .main-navigation li:hover,  .navbar.bg-white .nav-search-field-toggler:hover, .navbar.bg-white .side-nav-toggler span:hover, .main-navigation li:hover, .nav-search-field-toggler:hover, .side-nav-toggler span:hover, .lang-dropdown .dropdown-menu .dropdown-item:hover, .lang-dropdown .txt-btn:hover', 'color ', 'color_header_link_hover_color'); ?>
            <?php self::generate_css('.side-nav-toggler:hover span', 'background-color ', 'color_header_link_hover_color'); ?>

            /************************************************************************************
             * General 
             ************************************************************************************/
            /* Primary [#ff2c54] */
            <?php self::generate_css(':root', '--primary-color', 'color_primary'); ?>
            /* Heading */
            <?php self::generate_css('h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6', 'color ', 'color_heading'); ?>
            /* Heading Hover */
            <?php self::generate_css('.post-block:hover .axil-post-title,.hover-line a:hover, .btn-link:hover', 'color ', 'color_heading_hover'); ?>
            <?php self::generate_css('.btn-link:hover::before, .btn-link:hover::after', 'background-color ', 'color_heading_hover'); ?>
            /* Heading Hover Color Dark Section */
            <?php self::generate_css('.bg-grey-dark-one .post-block:hover .axil-post-title, .bg-grey-dark-one .btn-link:hover', 'color ', 'color_heading_hover_dark_bg', '', ' !important'); ?>
            <?php self::generate_css('.bg-grey-dark-one .btn-link:hover::before, .bg-grey-dark-one .btn-link:hover::after', 'background-color ', 'color_heading_hover_dark_bg'); ?>


            /************************************************************************************
             * Footer 
             ************************************************************************************/
            /* Background Color */
            <?php self::generate_css('footer.page-footer.bg-grey-dark-key', 'background-color ', 'color_footer_bg_color'); ?>
            /* Footer Heading Color */
            <?php self::generate_css('.footer-widget .footer-widget-title, .footer-social-share .axil-social-title, .footer-social-share-wrapper .social-share__with-bg li a', 'color ', 'color_footer_heading_color'); ?>
            /* Footer Body Color */
            <?php self::generate_css('.footer-bottom ul, .footer-bottom .axil-copyright-txt, .footer-bottom', 'color ', 'color_footer_body_color'); ?>
            /* Footer Link Color */
            <?php self::generate_css('.footer-widget ul.menu a, .footer-widget a, .page-footer a', 'color ', 'color_footer_link_color'); ?>
            /* Footer Link Hover Color */
            <?php self::generate_css('.footer-widget ul.menu a:hover, .footer-widget a:hover, .page-footer a:hover', 'color ', 'color_footer_link_hover_color'); ?>
            /* Footer Bottom Border top Color */
            <?php self::generate_css('.footer-bottom', 'border-color ', 'color_footer_bottom_border_color'); ?>

        </style>
        <!--/Customizer CSS-->
        <?php
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since papr 1.0
     */
    public static function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
    {
        $return = '';
        $mod = get_theme_mod($mod_name);
        if (!empty($mod)) {
            $return = sprintf('%s { %s:%s; }',
                $selector,
                $style,
                $prefix . $mod . $postfix
            );
            if ($echo) {
                echo awescapeing($return);
            }
        }
        return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('papr_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('papr_Customize', 'papr_custom_color_output'));


