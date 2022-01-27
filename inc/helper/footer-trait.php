<?php

/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait footerTrait
{
    // Footer Top
    public static function axil_footer()
    {
        $themepfix = AXIL_THEME_FIX;
        $papr_options = self::axil_get_options();
        $condipfix = self::layout_settings();
        $footer = get_post_meta(get_the_ID(), $themepfix . "_footer_area", true);
        $footer = (empty($footer) || $footer == 'default') ? $papr_options['footer_area'] : $footer;
        return $footer;
    }

    // footer style
    public static function axil_footer_style()
    {
        $themepfix = AXIL_THEME_FIX;
        $papr_options = self::axil_get_options();
        $condipfix = self::layout_settings();
        $footer_style = get_post_meta(get_the_ID(), $themepfix . "_footer", true);
        $footer_style = (empty($footer_style) || $footer_style == 'default') ? $papr_options['footer_style'] : $footer_style;
        return $footer_style;
    }

    // footer cal
    public static function axil_footer_cal()
    {
        $papr_options = self::axil_get_options();
        // $axil_footer_column = ($papr_options['footer_column']) ? $papr_options['footer_column'] : '4' ;
        if (class_exists('Redux')) {
            $axil_footer_column = $papr_options['footer_column'];
        } else {
            $axil_footer_column = '4';
        }

        switch ($axil_footer_column) {
            case '1':
                $axil_footer_class = 'col-12';
                break;
            case '2':
                $axil_footer_class = 'col-sm-6';
                break;
            case '3':
                $axil_footer_class = 'col-sm-4';
                break;
            case '4':
                $axil_footer_class = 'col-lg-3 col-sm-4';
                break;
            case '6':
                $axil_footer_class = 'col-lg-2 col-sm-4';
                break;
            default:
                $axil_footer_class = 'col-lg-2 col-sm-4';
                break;
        }
        for ($i = 1; $i <= $axil_footer_column; $i++) {
            echo '<div class="' . esc_attr($axil_footer_class) . '">';
            dynamic_sidebar('footer-' . $i);
            echo '</div>';
        }
        return;
    }

    public static function axil_footer_logo()
    {
        $papr_options = self::axil_get_options();
        $axil_footer_logo = empty($papr_options['footer_logo']['url']) ? Helper::get_img('logo-symbol.svg') : $papr_options['footer_logo']['url'];
        return $axil_footer_logo;
    }


}
