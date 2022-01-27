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
$header_btn = $papr_options['header_btn'];
$header_buttontext = $papr_options['header_buttontext'];
$header_buttonUrl = $papr_options['header_buttonUrl'];
$header_lang_switcher = $papr_options['header_lang_switcher'];
?>
<div class="navbar navbar__style-three axil-header bg-color-white axil-header-four">
    <div class="container-fluid p-l-md-80 p-r-md-80">
        <div class="navbar-inner">
            <!-- Logo -->
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
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu($nav_menu_args);
            } ?>


            <div class="navbar-extra-features ml-auto">

                <?php if ($header_btn): ?>
                    <a href="<?php echo esc_url($header_buttonUrl); ?>"
                       class="btn btn-small bg-grey-dark-one"><?php echo esc_html($header_buttontext); ?></a>
                <?php endif ?>
                <?php if ($header_lang_switcher): ?>
                    <div class="dropdown lang-dropdown m-l-xs-10 m-l-lg-30">
                        <button class="btn txt-btn dropdown-toggle" data-toggle="dropdown">
                            <?php esc_html_e('En', 'papr'); ?>
                        </button>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><?php esc_html_e('En', 'papr'); ?></a>
                            <a class="dropdown-item" href="#"><?php esc_html_e('Fr', 'papr'); ?></a>
                            <a class="dropdown-item" href="#"><?php esc_html_e('Ger', 'papr'); ?></a>
                        </div>
                    </div>
                <?php endif ?>
                <!-- End of .dropdown -->
                <?php
                if ($papr_options['search_icon']) { ?>
                    <form id="search" action="<?php echo esc_url(home_url('/')); ?>" class="navbar-search" method="GET">
                        <div class="search-field">
                            <input type="text" class="navbar-search-field" name="s"
                                   placeholder="<?php echo esc_attr_x('Search Here ...', 'placeholder', 'papr'); ?>"
                                   value="<?php echo get_search_query(); ?>">
                            <button class="navbar-search-btn" type="submit"><i class="fal fa-search"></i></button>
                        </div>
                        <!-- End of .search-field -->
                        <a href="#" class="navbar-search-close"><i class="fal fa-times"></i></a>
                    </form>
                    <!-- End of .navbar-search -->
                <?php } ?>
                <!-- End of .navbar-search -->
                <a href="#" class="nav-search-field-toggler m-l-xs-10 m-l-md-30 mr-0"
                   data-toggle="nav-search-feild"><i class="far fa-search"></i></a>

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
