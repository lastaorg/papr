<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$header_layout 			= Helper::axil_header_layout();
$post_layout 			= $header_layout['post_layout'];
$header_style 			= $header_layout['header_style'];
$header_area 			= $header_layout['header_area'];
$inner_banner_type 		= '1';
$papr_options     		= Helper::axil_get_options(); 
$header_side_nav		= '1';
?>
<!-- Header starts -->
<div id="page" class="papr-main-content">			
		<?php			
		if ( $papr_options['offcanvas_area'] == 1 || $papr_options['offcanvas_area'] == 'on' ){
					get_template_part( 'template-parts/header/header-side-nav', $header_side_nav );
		} ?>		
		<header class="page-header">
		<?php			

			if (  "0" != $header_area ){
                get_template_part( 'template-parts/header/header', $header_style );
            }

		?>		
		</header>		
	<div class="papr-container-main">
	<?php 
	if(!is_404() ){
	get_template_part( 'template-parts/content-banner/banner', $inner_banner_type );
	}