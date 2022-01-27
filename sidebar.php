<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$sidebar 	= Helper::axil_sidebar_options();	

if (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )){
?>
<div class="col-xl-4 axil-sidebar">
	<aside class="axil-main-sidebar">
		<?php echo Helper::ad_post_before_sidebar(); ?>
		<?php

		if ( $sidebar ) {
			if ( is_active_sidebar( $sidebar ) ){
				dynamic_sidebar( $sidebar );
			}
		}
		else {
			if ( is_active_sidebar( 'sidebar' ) ){
				dynamic_sidebar( 'sidebar' );
			}
		}
		?>
		<?php echo Helper::ad_post_after_sidebar(); ?>
	</aside>
</div>
<?php } ?>
