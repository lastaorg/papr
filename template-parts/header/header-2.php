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
$header_layout = Helper::axil_header_layout();
$top_bar = $header_layout['top_bar'];
// Header Top
if ($top_bar == 1 || $top_bar == 'on') {
    get_template_part('template-parts/header/header-top-2');
}
?>
<div class="navbar bg-grey-dark-one navbar__style-four axil-header axil-header-two">
    <div class="container">
        <div class="navbar-inner justify-content-between">
            <?php if ($papr_options['offcanvas_area']) { ?>
                <div class="navbar-toggler-wrapper">
                    <a href="#" class="side-nav-toggler" id="side-nav-toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            <?php } ?>
            <!-- End of .navbar-toggler-wrapper -->
            <div class="brand-logo-container text-center d-lg-none">
                <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>"><img class="brand-logo"
                                                                                       src="<?php echo esc_url($axil_logo_symbol); ?>"
                                                                                       alt="<?php esc_attr(bloginfo('name')); ?>"></a>

            </div>
            <!-- End of .brand-logo-container -->
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu($nav_menu_args);
            } ?>
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
            </div>
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

