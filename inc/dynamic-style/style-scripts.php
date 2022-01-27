<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.4
 */

class Style_Scripts
{
    public $themepfix = AXIL_PRFX;
    public $version = AXIL_VERSION;

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'dynamic_style'), 1500);
    }

    public function dynamic_style()
    {
        $dynamic_css = $this->template_style();
        ob_start();

        // include AXIL_FREAMWORK_DS . 'typography.php';

        $dynamic_css .= ob_get_clean();
        $dynamic_css = $this->minified_css($dynamic_css);
        wp_register_style($this->themepfix . '-dynamic', false);
        wp_enqueue_style($this->themepfix . '-dynamic');
        wp_add_inline_style($this->themepfix . '-dynamic', $dynamic_css);
    }

    public function minified_css($css)
    {
        /* remove comments */
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        /* remove tabs, spaces, newlines, etc. */
        $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $css);
        return $css;
    }

    public function template_style()
    {
        $style = '';
        $themepfix = AXIL_THEME_FIX;
        $papr_options = Helper::axil_get_options();
        $condipfix = Helper::layout_settings();
        if (is_single() || is_page()) {
            $padding_top = get_post_meta(get_the_ID(), "{$themepfix}_top_padding", true);
            $padding_bottom = get_post_meta(get_the_ID(), "{$themepfix}_bottom_padding", true);
            $padding_top = (empty($padding_top) || $padding_top == 'default') ? $papr_options[$condipfix . '_padding_top'] : $padding_top;
            $padding_top = (int)$padding_top;
            $padding_bottom = (empty($padding_bottom) || $padding_bottom == 'default') ? $papr_options[$condipfix . '_padding_bottom'] : $padding_bottom;
            $padding_bottom = (int)$padding_bottom;

            if ($padding_top == '0') {
                $style .= '.papr-container {padding-top:' . $padding_top . 'px;}';
            } else {
                $style .= '.papr-container {padding-top:' . $padding_top . 'px;}
				@media all and (max-width: 1199px) {.papr-container {padding-top:60px;}}
				@media all and (max-width: 991px) {.papr-container {padding-top:60px;}}';
            }

            if ($padding_bottom == '0') {
                $style .= '.papr-container {padding-bottom:' . $padding_bottom . 'px;}';
            } else {
                $style .= '.papr-container {padding-bottom:' . $padding_bottom . 'px;}
				@media all and (max-width: 1199px) {.papr-container {padding-bottom:30px;}}
				@media all and (max-width: 991px) {.papr-container {padding-bottom:30px;}}';
            }
        } elseif (is_home() || is_archive() || is_search()) {
            $padding_top = $papr_options[$condipfix . '_padding_top'];
            $padding_top = (int)$padding_top;
            $padding_bottom = $papr_options[$condipfix . '_padding_bottom'];
            $padding_bottom = (int)$padding_bottom;

            if ($padding_top == '0') {
                $style .= '.papr-container {padding-top:' . $padding_top . 'px;}';
            } else {
                $style .= '.papr-container {padding-top:' . $padding_top . 'px;}
				@media all and (max-width: 1199px) {.papr-container {padding-top:60px;}}
				@media all and (max-width: 991px) {.papr-container {padding-top:60px;}}';
            }

            if ($padding_bottom == '0') {
                $style .= '.papr-container {padding-bottom:' . $padding_bottom . 'px;}';
            } else {
                $style .= '.papr-container {padding-bottom:' . $padding_bottom . 'px;}
				@media all and (max-width: 1199px) {.papr-container {padding-bottom:30px;}}
				@media all and (max-width: 991px) {.papr-container {padding-bottom:30px;}}';
            }

        }
        return $style;
    }
}

new Style_Scripts;