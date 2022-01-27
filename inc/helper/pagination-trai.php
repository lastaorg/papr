<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait PaginationTrait {
	
	public static function load_more() {
		
		if( is_singular() )
			return;

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;
		
		printf ( '<div class="axil_loadmore btn-square-transparent">%s</div>', esc_html__( 'Load More', 'papr' ) );
	}

	public static function infinity() {
		if( is_singular() )
			return;
		global $wp_query;
		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;			
	}

	public static function pagination( $max_num_pages = false ) {
		global $wp_query;

		$max = $max_num_pages ? $max_num_pages : $wp_query->max_num_pages;
		$max = intval( $max );

		/** Stop execution if there's only 1 page */
		if( $max <= 1 ) return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		include AXIL_FREAMWORK_DIRECTORY_VIEW . 'pagination.php';
	}

}
