<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait PageTitleTrait {

    // Page title
  public static function axil_get_page_title() {
      $themepfix    = AXIL_THEME_FIX;
      $papr_options   = self::axil_get_options();
        if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
          $axil_title = woocommerce_page_title( false );
        }
        elseif ( is_404() ) {
          $axil_title = $papr_options['error_title'];
        }
        elseif ( is_search() ) {
          $axil_title = esc_html__( 'Search results for: ', 'papr' ) . get_search_query();
        }
        elseif ( is_home() ) {
          if ( get_option( 'page_for_posts' ) ) {
            $axil_title = get_the_title( get_option( 'page_for_posts' ) );
          }
          else {
            $axil_title = apply_filters( "{$themepfix}_blog_title", esc_html__( 'All Posts', 'papr' ) );
          }
        }
        elseif ( is_archive() ) {
          $condipfix    = AXIL_PRFX;
          if ( is_post_type_archive( "{$condipfix}_team" ) ) {
            $axil_title = esc_html__( 'All Team Member', 'papr' );
          }
          else {
            $axil_title = get_the_archive_title();
          }
        }elseif (is_single()) {
          $axil_title  = get_the_title();

        }else{
          $axil_title = get_the_title();
        }
      return $axil_title;
  }


}
