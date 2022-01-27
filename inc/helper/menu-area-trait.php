<?php

/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait MenuAreaTrait
{
    // Nav Menu Call
    public static function nav_menu_args()
    {
        $pagemenu = false;
        if ((is_single() || is_page())) {
            $menuid = get_post_meta(get_the_id(), "axil_page_menu", true);

            if (!empty($menuid) && $menuid != 'default') {
                $pagemenu = $menuid;
            }
        }
        if ($pagemenu) {
            $nav_menu_args = array(
                'menu' => $pagemenu,
                'container' => 'nav',
                'container_class' => 'main-nav-wrapper',
                'menu_class' => 'main-navigation list-inline',
                'menu_id' => 'main-menu',
                'fallback_cb' => false,
                'walker' => new AxilNavWalker(),
            );
        } else {
            $nav_menu_args = array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'main-nav-wrapper',
                'menu_class' => 'main-navigation list-inline',
                'menu_id' => 'main-menu',
                'fallback_cb' => false,
                'walker' => new AxilNavWalker(),
            );
        }

        return $nav_menu_args;
    }

    // Off-Canvas Menu args
    public static function offcanvas_menu_args()
    {
        $offcanvas_menu_args = array(
            'theme_location' => 'offcanvas',
            'container' => 'nav',
            'menu_class' => "main-navigation side-navigation list-inline flex-column nicescroll-container",
            'depth' => 1,
            'fallback_cb' => false
        );

        return $offcanvas_menu_args;
    }

    // Footer bottom Menu args
    public static function footer_bottom_menu_args()
    {
        $footer_bottom_menu_args = array(
            'theme_location' => 'footerbottom',
            'container' => '',
            'menu_class' => "footer-bottom-links",
            'depth' => 1,
            'fallback_cb' => false
        );

        return $footer_bottom_menu_args;
    }

    // Footer bottom Menu args
    public static function header_top_menu_args()
    {
        $header_top_menu_args = array(
            'theme_location' => 'headertop',
            'container' => '',
            'menu_class' => "header-top-nav list-inline justify-content-center justify-content-md-start",
            'depth' => 1,
            'fallback_cb' => false
        );

        return $header_top_menu_args;
    }


}
