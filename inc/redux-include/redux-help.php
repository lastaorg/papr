<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

if ( !class_exists('axilReduxHelp') ) {
	class axilReduxHelp {
		protected static $instance = null;
		private function __construct() {
			$this->redux_init();		
		}
		public static function instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
			public function redux_init() {
				$themepfix = AXIL_PRFX;
				add_action( 'admin_menu', array( $this, 'remove_redux_menu' ), 12 ); // Remove Redux Menu
				add_filter( "redux/{$themepfix}/aURL_filter", '__return_empty_string' ); // Remove Redux Ads
				add_action( 'redux/loaded', array( $this, 'remove_redux_demo' ) ); // If Redux is running as a plugin, this will remove the demo notice and links
				add_action( "redux/page/{$themepfix}/enqueue", array( $this, 'redux_admin_style' ) ); // Redux Admin CSS	

			}
			public function remove_redux_menu() {
				remove_submenu_page( 'tools.php','redux-about' );
			}
			public function remove_redux_demo() {
				if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
				    add_filter( 'plugin_row_meta', array( $this, 'redux_remove_extra_meta' ), 12, 2 );
				    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
				}
			}
			public function redux_remove_extra_meta( $links, $file ){
				if ( strpos( $file, 'redux-framework.php' ) !== false) {
				    $links = array_slice( $links, 0, 3 );
				}

			return $links;
			}		
			public function redux_admin_style() {
				$themepfix = AXIL_PRFX;
				wp_enqueue_style( "{$themepfix}-redux-admin", Helper::get_css( 'redux-admin' ), array( 'redux-admin-css' ), THEME_VERSION );
			}
		
		}
	}
	axilReduxHelp::instance();
