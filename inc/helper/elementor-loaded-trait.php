<?php

/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait elementorLoadedTrait
{
    public static function axil_elementor_scripts()
    {
        if (!did_action('elementor/loaded')) {
            return;
        }
        if (\Elementor\Plugin::$instance->preview->is_preview_mode()) {
            // Style
            wp_enqueue_style('owl-carousel');
            wp_enqueue_style('owl-theme-default');
            wp_enqueue_script('owl-carousel');
            wp_enqueue_style('bootstrap');
            wp_enqueue_style('animate');
            wp_enqueue_style('magnific-popup');
            wp_enqueue_style('slick');
            wp_enqueue_script('slick');
            // Script
            wp_enqueue_script('bootstrap');
            wp_enqueue_script('isotope-pkgd');
            wp_enqueue_script('imagesloaded');
            wp_enqueue_script('waypoints');
            wp_enqueue_script('counterup');
            wp_enqueue_script('popper');
            wp_enqueue_script('magnific-popup');

        }
    }

}
