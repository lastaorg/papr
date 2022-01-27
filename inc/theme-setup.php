<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

add_action('after_setup_theme', 'papr_theme_setup');

if ( !function_exists( 'papr_theme_setup' ) ) {
	function papr_theme_setup() {
		// Language
		load_theme_textdomain( 'papr', AXIL_THEME_URI . 'languages' );
		// Theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'video', 'audio' ) );
		add_theme_support( 'woocommerce' );	
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles');
		// Image sizes		
		add_image_size( 'axil-size-sm', 			390, 290, true ); 
		add_image_size( 'axil-size-md', 			400, 400, true ); 
		add_image_size( 'axil-size-md2', 			780, 780, true ); 
		add_image_size( 'axil-size-lg', 			1200, 1200, true );
		add_image_size( 'axil-size-lg2', 			1230, 450, true );
		add_image_size( 'axil-size-large', 			1000, 753, true );
		add_image_size( 'axil-size-video', 			1200, 1380, true );
		add_image_size( 'axil-size-video2', 		1620, 980, true );
		add_image_size( 'axil-size-lg-vertical', 	600, 940, true ); 
		add_image_size( 'axil-size-full-height', 	600, 9999, true ); 			
		add_image_size( 'axil-size-modern-slider-1', 960, 600, true ); 			
		add_image_size( 'axil-size-modern-slider-2', 495, 550, true ); 			
			
		 // Register menus
		register_nav_menus( array(
			'primary'  		=> esc_html__( 'Primary', 'papr' ),
			'offcanvas' 	=> esc_html__( 'Off-Canvas Menu', 'papr' ),
			'headertop' 	=> esc_html__( 'Header-Top Menu', 'papr' ),
			'footerbottom' 	=> esc_html__( 'Footer Bottom Menu', 'papr' ),
		) );
		
		add_editor_style();		
		// for gutenberg support
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => esc_html__( 'light grayish primary', 'papr' ),
				'slug' => 'light-grayish-magenta',
				'color' => '#FF9500',
			),
			array(
				'name' => esc_html__( 'strong primary', 'papr' ),
				'slug' => 'strong-magenta',
				'color' => '#FF2C54',
			),			
			array(
				'name' => esc_html__( 'very light', 'papr' ),
				'slug' => 'very-light-gray',
				'color' => '#ffffff',
			),
			array(
				'name' => esc_html__( 'very dark light', 'papr' ),
				'slug' => 'very-dark-gray',
				'color' => '#6B7074',
			),
		) );

		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__( 'Small', 'papr' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => esc_html__( 'Normal', 'papr' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => esc_html__( 'Large', 'papr' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => esc_html__( 'Huge', 'papr' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );
		
	}
}
// Update Breadcrumb Separator
add_action('bcn_after_fill', 'axil_hseparator_breadcrumb_trail', 1);
function axil_hseparator_breadcrumb_trail($object){
    $object->opt['hseparator'] = '<span class="dvdr"> / </span>';
    return $object;
}
