<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

// Can be used only in 'include' function
$papr_options 		= Helper::axil_get_options();
$layout_abj 		= Helper::axil_layout_style_all();
$layout 			= $layout_abj['layout'];  
$post_class 		= $layout_abj['post_class']; 

if ( $type == 'cross-sells' ) {
	$responsive = array(
		'0'    => array( 'items' => 1 ),
		'480'  => array( 'items' => 2 ),
		'992'  => array( 'items' => 2 ),
	);
}
elseif ( $layout == 'full-width' ) {
	$responsive = array(
		'0'    => array( 'items' => 1 ),
		'480'  => array( 'items' => 2 ),
		'768'  => array( 'items' => 3 ),
		'992'  => array( 'items' => 4 ),
	);
}
else {
	$responsive = array(
		'0'    => array( 'items' => 1 ),
		'480'  => array( 'items' => 2 ),
		'768'  => array( 'items' => 2 ),
		'992'  => array( 'items' => 3 ),
	);
}

$loop = count( $products ) > $responsive['992']['items'] ? true : false;

$owl_data = array( 
	'nav'                => true,
	'dots'               => false,
	'autoplay'           => false,
	'autoplayTimeout'    => '5000',
	'autoplaySpeed'      => '200',
	'autoplayHoverPause' => true,
	'loop'               => $loop,
	'margin'             => 30,
	'responsive'         => $responsive
);

$owl_data = json_encode( $owl_data );
wp_enqueue_style( 'owl-carousel' );
wp_enqueue_style( 'owl-theme-default' );
wp_enqueue_script( 'owl-carousel' );

$wrapper_class = $type;
if ( !$loop ) {
	$wrapper_class .= ' no-nav';
}
?>
<div class="owl-wrap axil-nav-top  axil-woo-nav related products <?php echo esc_attr( $wrapper_class );?>">
	<div class="section-title m-b-xs-40">
		<h2 class="axil-title"><?php echo esc_html( $title );?></h2>
	</div>
	<div class="owl-theme owl-carousel axil-owl-carousel axil-papr-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
		<?php foreach ( $products as $product ) : ?>
			<?php
			$post_object = get_post( $product->get_id() );
			setup_postdata( $GLOBALS['post'] =& $post_object );
			?>
			<ul class="products"><?php wc_get_template_part( 'content', 'product' ); ?></ul>
		<?php endforeach; ?>
	</div>
</div>