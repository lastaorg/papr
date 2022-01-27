<?php

/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait LayoutTrait
{
    public static function axil_left_get_sidebar()
    {
        $layout_abj = Helper::axil_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'left-sidebar') {
            get_sidebar();
        }
        return;
    }

    public static function axil_right_get_sidebar()
    {
        $layout_abj = Helper::axil_layout_style_all();
        $layout = $layout_abj['layout'];
        if ($layout == 'right-sidebar') {
            get_sidebar();
        }
        return;
    }

    // Header Layout
    public static function axil_header_layout()
    {
        $papr_options = Helper::axil_get_options();
        $themepfix = AXIL_THEME_FIX;
        $condipfix = Helper::layout_settings();
        $top_bar = get_post_meta(get_the_ID(), $themepfix . "_top_bar", true);
        $post_layout = get_post_meta(get_the_ID(), $themepfix . "_post_layout", true);
        $header_style = get_post_meta(get_the_ID(), $themepfix . "_header", true);
        $header_area = get_post_meta(get_the_ID(), $themepfix . "_header_area", true);

        $top_bar = (empty($top_bar) || $top_bar == 'default') ? $papr_options['top_bar'] : $top_bar;
        $post_layout = (empty($post_layout) || $post_layout == 'default') ? $papr_options['post_style'] : $post_layout;
        $header_style = (empty($header_style) || $header_style == 'default') ? $papr_options['header_style'] : $header_style;
        $header_area = (empty($header_area) || $header_area == 'default') ? $papr_options['header_area'] : $header_area;

        $header_layout = [
            'top_bar' => $top_bar,
            'post_layout' => $post_layout,
            'header_style' => $header_style,
            'header_area' => $header_area,
        ];
        return $header_layout;

    }

    // Sidebar
    public static function axil_sidebar_options()
    {
        $themepfix = AXIL_THEME_FIX;
        $papr_options = self::axil_get_options();
        $condipfix = self::layout_settings();
        $sidebar = get_post_meta(get_the_ID(), $themepfix . "_sidebar", true);
        $sidebar = (empty($sidebar) || $sidebar == 'default') ? $papr_options[$condipfix . '_sidebar'] : $sidebar;
        return $sidebar;
    }

    // Menu Option
    public static function axil_logos()
    {
        $papr_options = self::axil_get_options();
        // Logo
        $axil_dark_logo = empty($papr_options['logo']['url']) ? self::get_img('logo-black.svg') : $papr_options['logo']['url'];
        $axil_light_logo = empty($papr_options['logo_light']['url']) ? self::get_img('logo-white.svg') : $papr_options['logo_light']['url'];
        $axil_logo_symbol = empty($papr_options['logo_symbol']['url']) ? self::get_img('logo-symbol.svg') : $papr_options['logo_symbol']['url'];

        $menu_option = [
            'axil_dark_logo' => $axil_dark_logo,
            'axil_light_logo' => $axil_light_logo,
            'axil_logo_symbol' => $axil_logo_symbol
        ];
        return $menu_option;
    }

    // Page layout style
    public static function axil_layout_style()
    {
        $themepfix = AXIL_THEME_FIX;
        $papr_options = self::axil_get_options();
        $condipfix = self::layout_settings();

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $papr_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $papr_options[$condipfix . "_layout"] : $layout;
        }

        return $layout;
    }

    // layout style
    public static function axil_layout_style_all()
    {
        $themepfix = AXIL_THEME_FIX;
        $papr_options = self::axil_get_options();
        $condipfix = self::layout_settings();
        $sidebar 	= Helper::axil_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 axil-main' : 'col-xl-12 axil-main';

        if (is_single() || is_page()) {
            $layout = get_post_meta(get_the_ID(), $themepfix . "_layout", true);
            $layout = (empty($layout) || $layout == 'default') ? $papr_options[$condipfix . "_layout"] : $layout;

        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            $layout = (empty($layout) || $layout == 'default') ? $papr_options[$condipfix . "_layout"] : $layout;
        }

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 masonry-item';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-12';
        }

        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    // layout style
    public static function axil_layout_custom_taxonomy()
    {
        $themepfix = AXIL_THEME_FIX;
        $papr_options = self::axil_get_options();
        $condipfix = self::layout_settings();
        $layout = $papr_options[$condipfix . "_layout"];
        $sidebar 	= Helper::axil_sidebar_options();
        $has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 axil-main' : 'col-xl-12 axil-main';

        // Layout class
        if ($layout == 'full-width') {
            $layout_class = 'col-12';
            $post_class = 'col-lg-4';
        } else {
            $layout_class = $has_sidebar_contnet;
            $post_class = 'col-lg-6';
        }
        $layout = [
            'layout' => $layout,
            'layout_class' => $layout_class,
            'post_class' => $post_class,
        ];
        return $layout;
    }

    /**  Footer Options */
    public static function axil_active_footer()
    {
        $papr_options = Helper::axil_get_options();
        if (!$papr_options['footer_area']) {
            return false;
        }
        $footer_column = $papr_options['footer_column'];
        for ($i = 1; $i <= $footer_column; $i++) {
            if (is_active_sidebar('footer-' . $i)) {
                return true;
            }
        }
        return false;
    }


    /**
     * Custom Sidebar
     */
    public static function get_custom_sidebar_fields()
    {
        $themepfix = AXIL_WIDGET_PREFIX;
        $sidebar_fields = array();
        $sidebar_fields['sidebar'] = esc_html__('Sidebar', 'papr');
        $sidebars = get_option("{$themepfix}_custom_sidebars", array());
        if ($sidebars) {
            foreach ($sidebars as $sidebar) {
                $sidebar_fields[$sidebar['id']] = $sidebar['name'];
            }
        }
        return $sidebar_fields;
    }

    /** layout settings */
    public static function layout_settings()
    {
        $condipfix = AXIL_THEME_FIX;
        if (is_single() || is_page()) {
            $post_type = get_post_type();
            $post_id = get_the_id();

            switch ($post_type) {
                case 'page':
                    $themepfix = 'page';
                    break;
                case 'post':
                    $themepfix = 'single_post';
                    break;
                case "team":
                    $themepfix = 'team';
                    break;
                case 'product':
                    $themepfix = 'product';
                    break;
                default:
                    $themepfix = 'single_post';
                    break;
            }
        } elseif (is_home() || is_archive() || is_search() || is_404()) {
            if (is_author()) {
                $themepfix = 'author';
            } elseif (is_search()) {
                $themepfix = 'search';
            } elseif (is_post_type_archive("team") || is_tax("team_category")) {
                $themepfix = 'team_archive';
            } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
                $themepfix = 'shop';
            } else {
                $themepfix = 'blog';
            }
        }
        return $themepfix;
    }

}
