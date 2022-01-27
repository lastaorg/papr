<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

class TGM_Config {
	public $prfx = AXIL_PRFX;
    public $path = "http://axilthemes.com/themes/papr/demo/plugins/";

	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'axil_tgn_plugins' ) );
	}

	public function axil_tgn_plugins(){
		$plugins = array(	
			array(
				'name'         => esc_html__('Papr Elements','papr'),
				'slug'         => 'papr-elements',
				'source'       => 'papr-elements.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
			array(
				'name'         => esc_html__('Axil Panels','papr'),
				'slug'         => 'axil-panels',
				'source'       => 'axil-panels.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
					
			// Repository
			array(
                'name'     => esc_html__('CMB2','papr'),
                'slug'     => 'cmb2',
                'required' => true,
            ),
			array(
				'name'     => esc_html__('Breadcrumb NavXT','papr'),
				'slug'     => 'breadcrumb-navxt',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Redux Framework','papr'),
				'slug'     => 'redux-framework',
				'required' => true,
			),
			array(
				'name'     => esc_html__('MailChimp for WordPress','papr'),
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Elementor Page Builder','papr'),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Shared Counts – Social Media Share Buttons','papr'),
				'slug'     => 'shared-counts',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Smash Balloon Social Photo Feed','papr'),
				'slug'     => 'instagram-feed',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Social Count Plus','papr'),
				'slug'     => 'social-count-plus',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Contact Form 7','papr'),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
            array(
                'name'      => esc_html__('One Click Demo', 'papr'),
                'slug'      => 'one-click-demo-import',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__('Woocommerce', 'papr'),
                'slug'      => 'woocommerce',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__('AMP for WP', 'papr'),
                'slug'      => 'accelerated-mobile-pages',
                'required'  => false,
            )
			
		);

		$config = array(
			'id'           => $this->prfx,            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => $this->path,              // Default absolute path to bundled plugins.
			'menu'         => $this->prfx . '-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                    // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}

new TGM_Config;