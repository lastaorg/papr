<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
 $footer_style 	= Helper::axil_footer_style();
 $footer 	    = Helper::axil_footer();

?>
</div><!-- #papr-container-main -->
<?php if ( "off" !== $footer && "0" !== $footer ){ ?>
    <?php get_template_part( 'template-parts/footer/footer', $footer_style ); ?>
<?php } ?>
</div>