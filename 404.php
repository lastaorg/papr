<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$papr_options = Helper::axil_get_options();
?>
<?php get_header();?>
<div class="error-404-banner bg-grey-light-three">
    <div class="container">
        <div class="error-404-content text-center">
            <div class="txt-404 tilt-this"><?php esc_html_e( '404', 'papr' );?> </div>
            <div class="error-inner-content">
                <h1 class="h1 m-b-xs-20 m-b-md-40">
                   <?php echo esc_html( $papr_options['error_title_text'] );?>
                </h1>
                <?php if ( $papr_options['error_sub_text']) { ?>
                    <p><?php echo esc_html( $papr_options['error_sub_text'] );?></p>
                <?php } ?>
                <a href="<?php echo esc_url( home_url( '/' ) );?>" class="btn btn-primary"><?php echo esc_html( $papr_options['error_buttontext'] );?></a>
            </div>
        </div>
        <!-- End of .error-404-content -->
    </div>
    <!-- End of .container -->
</div>
<?php get_footer(); ?>