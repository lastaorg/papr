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
    get_template_part('template-parts/header/header-top-1');
}
?>
<div class="header-mid">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3 align-self-center d-none d-lg-block">
                <div class="brand-logo-container">
                    <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if(!empty($axil_dark_logo)){ ?>
                            <img class="brand-logo dark-logo" src="<?php echo esc_url($axil_dark_logo); ?>"
                                 alt="<?php esc_attr(bloginfo('name')); ?>">
                        <?php } ?>
                        <?php if(!empty($axil_light_logo)){ ?>
                            <img class="brand-logo light-logo" src="<?php echo esc_url($axil_light_logo); ?>"
                                 alt="<?php esc_attr(bloginfo('name')); ?>">
                        <?php } ?>
                    </a>
                </div>
                <!-- End of .brand-logo-container -->
            </div>
            <div class="col-md-12 col-lg-9 align-self-center text-right">
                <!-- <?php /*echo Helper::ad_post_header_mid();*/ ?> -->
                <div class="add-container">
                <?php the_ad(6830); ?>    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navbar axil-header axil-header-six bg-grey-dark-one">
    <div class="container">
        <div class="navbar-inner">
            <div class="brand-logo-container d-lg-none">
                <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if(!empty($axil_dark_logo)){ ?>
                        <img class="brand-logo dark-logo" src="<?php echo esc_url($axil_dark_logo); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                    <?php if(!empty($axil_light_logo)){ ?>
                        <img class="brand-logo light-logo" src="<?php echo esc_url($axil_light_logo); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                </a>
            </div>
            <?php if (has_nav_menu('primary')) {
                wp_nav_menu($nav_menu_args);
            } ?>
            <?php if ($papr_options['search_icon'] || $papr_options['offcanvas_area']) { ?>
                <div class="navbar-extra-features ml-auto">
                    <?php
                    if ($papr_options['search_icon']) { ?>
                        <form id="search" action="<?php echo esc_url(home_url('/')); ?>" class="navbar-search"
                              method="GET">
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
                                    class="fab fa fa-search"></i></a>
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
            <?php } ?>
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

