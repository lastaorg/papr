<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$axil_socials = Helper::socials();
$papr_options = Helper::axil_get_options();
$axil_logos = Helper::axil_logos();
$axil_dark_logo = $axil_logos['axil_dark_logo'];
$axil_light_logo = $axil_logos['axil_light_logo'];
$axil_logo_symbol = $axil_logos['axil_logo_symbol'];
$header_top_menu_args = Helper::header_top_menu_args();
?>
<div class="header-top header-top__style-two bg-grey-dark-seven">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
                <?php if (has_nav_menu('headertop') && $papr_options['header_top_menu_args']) { ?>
                    <?php wp_nav_menu($header_top_menu_args); ?>
                <?php } ?>
                <!-- End of .header-top-nav -->
            </div>
            <div class="brand-logo-container col-md-4 text-center">
                <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="brand-logo" src="<?php echo esc_url($axil_light_logo); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"></a>
            </div>
            <!-- End of .brand-logo-container -->
            <div class="col-md-4">
                <?php if ($axil_socials): ?>
                    <ul class="ml-auto social-share header-top__social-share justify-content-end">
                        <?php foreach ($axil_socials as $axil_social): ?>
                            <li><a target="_blank" href="<?php echo esc_url($axil_social['url']); ?>">
                                <i class="fab <?php echo esc_attr($axil_social['icon']); ?>"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .container -->
</div>
<!-- End of .header-top -->
