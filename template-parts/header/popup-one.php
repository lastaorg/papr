<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$papr_options 	= Helper::axil_get_options();
$popup_content_shortcode = $papr_options['popup_content_shortcode'];
// $popup_image = $papr_options['popup_image'];
?>
<div class="subscribe-popup">
    <div class="subscribe-popup-inner">
        <div class="close-popup">
            <i class="fal fa-times"></i>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="img-container">
                    <img src="<?php echo esc_url($papr_options['popup_image']['url']); ?>" alt="subscribe img">
                </div>
            </div>
            <!-- End of .col-lg-6 -->
            <?php
                if (!empty($popup_content_shortcode)){ ?>
                    <div class="col-lg-6">
                        <?php echo do_shortcode($popup_content_shortcode); ?>
                        <!-- End of .newsletter-widget -->
                    </div>
                <?php }
            ?>
            <!-- End of .col-lg-6 -->
        </div>
        <!-- End of .row -->
    </div>
    <!-- End of .subscribe-popup-inner -->
</div>
<!-- End of .subscribe-popup -->