<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$layout_abj 		= Helper::axil_layout_style_all();
$layout 			= $layout_abj['layout']; 
$layout_class 		= $layout_abj['layout_class']; 
$post_class 		= $layout_abj['post_class']; 


?>
<div class="papr-container">
	<div class="container">
		<div class="row">
			<?php
				Helper::axil_left_get_sidebar();
			?>
			<div class="<?php echo esc_attr( $layout_class );?>">
				<div class="papr-container-content">