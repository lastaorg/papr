<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$papr_options = Helper::axil_get_options();
$axil_logos = Helper::axil_logos();
$nav_menu_args = Helper::nav_menu_args();
$axil_dark_logo = $axil_logos['axil_dark_logo'];
$axil_light_logo = $axil_logos['axil_light_logo'];
$axil_logo_symbol = $axil_logos['axil_logo_symbol'];
?>
<div class="navbar bg-grey-light-three navbar__style-three axil-header axil-header-five">
    <div class="container-fluid p-l-md-30 p-r-md-30">
        <div class="navbar-inner justify-content-between ">
            <div class="brand-logo-container">
                <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if(!empty($axil_dark_logo)){ ?>
                        <img class="dark-logo" src="<?php echo esc_url($axil_dark_logo); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                    <?php if(!empty($axil_light_logo)){ ?>
                        <img class="light-logo" src="<?php echo esc_url($axil_light_logo); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                </a>
            </div>
            <!-- End of .brand-logo-container -->

            <div id="axil-navigation" class="main-navigation main-nav-wrapper">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu($nav_menu_args);
                } ?>
            </div>
            <div class="navbar-extra-features">
                <?php
                if ($papr_options['search_icon']) { ?>
                    <form id="search" action="<?php echo esc_url(home_url('/')); ?>" class="navbar-search" method="GET">
                        <div class="search-field">
                            <input type="text" class="navbar-search-field" name="s"
                                   placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'papr'); ?>"
                                   value="<?php echo get_search_query(); ?>">
                            <button class="navbar-search-btn" type="submit"><i class="fal fa-search"></i></button>
                        </div>
                        <!-- End of .search-field -->
                        <a href="#" class="navbar-search-close"><i class="fal fa-times"></i></a>
                    </form>
                    <!-- End of .navbar-search -->
                    <a href="#" class="nav-search-field-toggler" data-toggle="nav-search-feild"><i
                                class="far fa-search"></i></a>
                <?php } ?>
                <?php global $woocommerce; ?>
                <?php if (class_exists('woocommerce') && $papr_options['minicart_icon']): ?>
                    <a href="<?php echo wc_get_cart_url(); ?>"><span class="mini-cart"><i
                                    class="far fa-shopping-cart"></i> <span
                                    class="aw-cart-count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span></span></a>
                <?php endif; ?>
                <?php if ($papr_options['offcanvas_area']) { ?>
                    <a href="#" class="side-nav-toggler" id="side-nav-toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                <?php } ?>
            </div>
            <!-- End of .main-nav-toggler -->
            <!-- End of .navbar-extra-features -->
            <div class="main-nav-toggler d-block d-lg-none" id="main-nav-toggler">
                <div class="toggler-inner">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!-- End of .main-nav-toggler -->
        </div>
        <!-- End of .navbar-inner -->
    </div>
    <!-- End of .container -->
</div>