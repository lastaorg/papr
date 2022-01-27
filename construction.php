<?php
/**
 * Template Name: Maintenance
 * Maintenance / Coming Soon Mode Template.
 *
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
$axil_socials = Helper::socials();
$under_construction_mailchimp_form_shortcode = $papr_options['under_construction_mailchimp_form_shortcode'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr(get_bloginfo('charset')) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class('papr-maintenance-mode'); ?>>
<div class="papr-page-maintenance-content">
    <div class="main-content">
        <div class="under-construction-banner"
             style="background-image: url('<?php echo esc_url($papr_options['under_construction_page_image']['url']); ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="under-construction-inner-content">
                            <?php if (!empty($axil_dark_logo)) { ?>
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
                            <?php } ?>
                            <!-- End of .brand-logo-container -->
                            <?php if (!empty($papr_options['under_construction_title_text'])) { ?>
                                <div class="axil-title">
                                    <h1 class="h1 m-0"><?php echo esc_html($papr_options['under_construction_title_text']); ?></h1>
                                </div>
                            <?php } ?>
                            <?php if (!empty($under_construction_mailchimp_form_shortcode) || $axil_socials) { ?>
                                <div class="newsletter-content">
                                    <?php if (!empty($under_construction_mailchimp_form_shortcode)) { ?>
                                        <?php echo do_shortcode($under_construction_mailchimp_form_shortcode); ?>
                                        <!-- End of .newsletter-widget -->
                                    <?php } ?>
                                    <?php
                                    if ($papr_options['social_network_under_cons'] && $axil_socials) { ?>
                                        <div class="contact-social-share m-t-xs-20">
                                            <?php
                                            if ($papr_options['social_title']) { ?>
                                                <div class="axil-social-title h5"> <?php echo wp_kses_post($papr_options['social_title']); ?> </div>
                                            <?php } ?>
                                            <ul class="social-share social-share__with-bg">
                                                <?php foreach ($axil_socials as $axil_social): ?>
                                                    <li><a href="<?php echo esc_url($axil_social['url']); ?>"
                                                           target="_blank"><i
                                                                    class="fab <?php echo esc_attr($axil_social['icon']); ?>"></i></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- End of .col-lg-8 -->
                </div>
                <!-- End of .row -->
            </div>
            <!-- End of .container -->
        </div>
        <!-- End of .under-construction-banner -->
    </div>
    <!-- End of .main-content -->
</div><!-- /.page-maintenance -->
<?php wp_footer(); ?>
</body>
</html>
