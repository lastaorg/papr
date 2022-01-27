<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
	
// Initialize Widgets
add_action( 'widgets_init', 'axil_register_sidebars' );
if ( !function_exists( 'axil_register_sidebars' ) ) {
		function axil_register_sidebars() {			
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'papr' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s widgets-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Bottom Right', 'papr' ),
			'id'            => 'footer-bottom-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s widgets-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="axil-widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );
		$papr_options 	= Helper::axil_get_options();	
		$axil_widget_titles = array(
			'1' => esc_html__( 'Footer 1', 'papr' ),
			'2' => esc_html__( 'Footer 2', 'papr' ),
			'3' => esc_html__( 'Footer 3', 'papr' ),
			'4' => esc_html__( 'Footer 4', 'papr' ),
			'5' => esc_html__( 'Footer 5', 'papr' ),
			'6' => esc_html__( 'Footer 6', 'papr' ),			
		);
		for ( $i = 1; $i <= $papr_options['footer_column']; $i++ ) {
			register_sidebar( array(
				'name'          => $axil_widget_titles[$i],
				'id'            => 'footer-'. $i,
				'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="footer-widget-title">',
				'after_title'   => '</h3>',
			) );		
		}

	}
}
