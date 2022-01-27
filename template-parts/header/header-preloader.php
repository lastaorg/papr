<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$papr_options 	= Helper::axil_get_options();	
?>
<?php	
// Preloader
	if ( $papr_options['preloader'] ) {
		if ( !empty( $papr_options['preloader_image']['url'] ) ) {
			$preloader_img = $papr_options['preloader_image']['url'];
			echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';	
		}else{ 			
			echo '<div class="preloader bgimg" id="preloader" style="background-image:url(' . Helper::get_img('papr-preloader.gif') . ');"></div>';
		}
	}      
?>
