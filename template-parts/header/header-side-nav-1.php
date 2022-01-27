<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$axil_socials = Helper::socials();
$papr_options = Helper::axil_get_options();
$offcanvas_menu_args = Helper::offcanvas_menu_args();
$axil_socials = Helper::socials();

$phoneNumber = preg_replace("/[^0-9+]/", '', $papr_options['phone']);
$faxNumber = preg_replace("/[^0-9+]/", '', $papr_options['fax']);

$header_layout = Helper::axil_header_layout();
$sidenav_class = ($header_layout['header_style'] == '2') ? 'side-nav__left' : '';


?>
<div class="side-nav <?php echo esc_attr($sidenav_class); ?>">
    <div class="side-nav-inner nicescroll-container">
        <?php if ($papr_options['offcanvas_search']) { ?>
            <form id="off-canvas-search" class="side-nav-search-form" action="<?php echo esc_url(home_url('/')); ?>"
                  method="GET">
                <div class="form-group search-field">
                    <input type="text" name="s"
                           placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'papr'); ?>"
                           value="<?php echo get_search_query(); ?>"/>
                    <button type="submit" class="side-nav-search-btn"><i class="fas fa-search"></i></button>
                </div>
            </form>
        <?php } ?>
        <!-- End of .side-nav-search-form -->
        <div class="side-nav-content">
            <div class="row">
                <?php if (has_nav_menu('offcanvas') && $papr_options['offcanvas_menu']) {
                    ?>
                    <div class="col-lg-6">
                        <?php wp_nav_menu($offcanvas_menu_args); ?>
                    </div>
                    <?php
                } ?>
                <!-- End of  .col-md-6 -->
                <?php if ($papr_options['offcanvas_contact_info']) { ?>
                    <div class="col-lg-6">
                        <div class="axil-contact-info-inner">
                            <?php
                            if ($papr_options['address_field_title']) { ?>
                                <h5 class="m-b-xs-10"> <?php echo wp_kses_post($papr_options['address_field_title']); ?> </h5>
                            <?php } ?>

                            <div class="axil-contact-info">
                                <address class="address">
                                    <?php
                                    if ($papr_options['address']) {
                                        ?>
                                        <p class="m-b-xs-30 mid grey-dark-three"><?php echo wp_kses_post($papr_options['address']); ?></p>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($papr_options['call_now_field_title']) { ?>
                                        <div class="h5 m-b-xs-5"> <?php echo wp_kses_post($papr_options['call_now_field_title']); ?> </div>
                                    <?php } ?>
                                    <?php
                                    if ($papr_options['phone']) {
                                        ?>
                                        <div>
                                            <a class="tel" href="tel:<?php echo wp_kses_post($phoneNumber); ?>"><i
                                                        class="fas fa-phone"></i><?php echo wp_kses_post($papr_options['phone']); ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($papr_options['fax']) {
                                        ?>
                                        <div>
                                            <a class="tel" href="tel:<?php echo wp_kses_post($faxNumber); ?>"><i
                                                        class="fas fa-fax"></i><?php echo wp_kses_post($papr_options['fax']); ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($papr_options['email']) {
                                        ?>
                                        <div>
                                            <a class="tel"
                                               href="mailto:<?php echo wp_kses_post($papr_options['email']); ?>"><i
                                                        class="fas fa-envelope"></i><?php echo wp_kses_post($papr_options['email']); ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </address>
                                <!-- End of address -->
                                <?php if ($axil_socials) { ?>
                                    <div class="contact-social-share m-t-xs-35">
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
                                <!-- End of .contact-shsdf -->
                            </div>
                            <!-- End of .axil-contact-info -->
                        </div>
                        <!-- End of .axil-contact-info-inner -->
                    </div>
                <?php } ?>
            </div>
            <!-- End of .row -->
        </div>
    </div>
    <!-- End of .side-nav-inner -->
    <div class="close-sidenav-wrap">
        <div class="close-sidenav" id="close-sidenav">
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!-- End of .side-nav -->