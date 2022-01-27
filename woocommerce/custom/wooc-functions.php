<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */


/*-------------------------------------
#. Theme supports for WooCommerce
---------------------------------------*/
function axil_shop_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
}

/*-------------------------------------
#. Replace WooCommerce Default functions
---------------------------------------*/

// Short description - Use excerpt when description doesn't exist
if ( ! function_exists( 'woocommerce_template_single_excerpt' ) ) {
	function woocommerce_template_single_excerpt() {
		$papr_options 	= Helper::axil_get_options();
		global $post;
		if ( ! $post->post_excerpt && !$papr_options['wc_show_excerpt'] ) {
			return false;
		}

		echo '<div class="short-description">';
		if ( ! $post->post_excerpt ) {
			the_excerpt();
		}
		else {
			wc_get_template( 'single-product/short-description.php' );
		}
		echo '</div>';
	}
}

/*-------------------------------------
#. Custom functions used directly
---------------------------------------*/
function axil_shop_get_template_parts( $template ){
	get_template_part( 'woocommerce/custom/template-parts/content', $template );
}

function axil_shop_product_slider( $products, $title, $type='' ) {
	$filename = '/woocommerce/custom/template-parts/content-product-slider.php';

	$child_file  = get_stylesheet_directory() . $filename;
	$parent_file = get_template_directory() . $filename;

	if ( file_exists( $child_file ) ) {
		$file = $child_file;
	}
	else {
		$file = $parent_file;
	}

	include $file;
}


/*-------------------------------------
#. Custom functions used in hooks
---------------------------------------*/
function axil_header_cart_count( $fragments ) {
	global $woocommerce;
	ob_start();?>
	<span class="cart-icon-num"><?php echo WC()->cart->get_cart_contents_count();?></span>
	<?php
	$fragments['span.cart-icon-num'] = ob_get_clean();
	return $fragments;
}

function axil_smallscreen_breakpoint(){
	return '767px';
}

function axil_shop_hide_page_title(){
	return false;
}

function axil_shop_loop_shop_per_page(){
	$papr_options 	= Helper::axil_get_options();
	return $papr_options['wc_num_product'];
}

function axil_shop_wrapper_start() {
	axil_shop_get_template_parts( 'shop-header' );
}

function axil_shop_wrapper_end() {
	axil_shop_get_template_parts( 'shop-footer' );
}

function axil_shop_shop_topbar() {
	axil_shop_get_template_parts( 'shop-top' );
}

function axil_shop_loop_product_title(){
	echo '<h3><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">' . get_the_title() . '</a></h3>';
}


function axil_shop_loop_shop_columns(){

	$layout_abj 		= Helper::axil_layout_style_all();
	$layout 			= $layout_abj['layout']; 
	$layout_class 		= $layout_abj['layout_class']; 
	$post_class 		= $layout_abj['post_class']; 


	if ( $layout == 'full-width' ) {
		return 4;
	}
	return 3;
}

function axil_shop_shop_thumb_area(){
	axil_shop_get_template_parts( 'shop-thumb' );
}

function axil_shop_shop_info_wrap_start(){
	echo '<div class="products-shop">';
}

function axil_shop_shop_add_description(){
	if ( is_shop() || is_product_category() || is_product_tag() ) {
		global $post;
		echo '<div class="shop-excerpt grid-hide"><div class="short-description">';
		the_excerpt();
		echo '</div></div>';	
	}
}

function axil_shop_shop_info_wrap_end(){
	echo '</div>';
}

function axil_shop_render_sku(){
	axil_shop_get_template_parts( 'product-sku' );
}

function axil_shop_render_meta(){
	axil_shop_get_template_parts( 'product-meta' );
}

function axil_shop_show_or_hide_related_products(){
	$papr_options 	= Helper::axil_get_options();
	// Show or hide related products
	if ( empty( $papr_options['wc_related'] ) ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}
}

function axil_shop_hide_product_data_tab( $tabs ){

	$papr_options 	= Helper::axil_get_options();	


	if ( empty( $papr_options['wc_description'] ) ) {
		unset( $tabs['description'] );
	}
	if ( empty( $papr_options['wc_reviews'] ) ) {
		unset( $tabs['reviews'] );
	}
	if ( empty( $papr_options['wc_additional_info'] ) ) {
		unset( $tabs['additional_information'] );
	}
	return $tabs;
}

function axil_shop_product_review_form( $comment_form ){
	$commenter = wp_get_current_commenter();

	$comment_form['fields'] = array(
		'author' => '<div class="row"><div class="col-sm-6"><div class="comment-form-author form-group"><input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name *', 'papr' ) . '" required /></div></div>',
		'email'  => '<div class="comment-form-email col-sm-6"><div class="form-group"><input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email *', 'papr' ) . '" required /></div></div></div>',
	);

	$comment_form['comment_field'] = '';

	if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
		$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'papr' ) .'</label>
		<select name="rating" id="rating" required>
			<option value="">' . esc_html__( 'Rate&hellip;', 'papr' ) . '</option>
			<option value="5">' . esc_html__( 'Perfect', 'papr' ) . '</option>
			<option value="4">' . esc_html__( 'Good', 'papr' ) . '</option>
			<option value="3">' . esc_html__( 'Average', 'papr' ) . '</option>
			<option value="2">' . esc_html__( 'Not that bad', 'papr' ) . '</option>
			<option value="1">' . esc_html__( 'Very Poor', 'papr' ) . '</option>
			</select></p>';
		}

		$comment_form['comment_field'] .= '<div class="col-sm-12 p0"><div class="form-group comment-form-comment"><textarea id="comment" name="comment" class="form-control" placeholder="' . esc_attr__( 'Your Review *', 'papr' ) . '" cols="45" rows="8" required></textarea></div></div>';

		return $comment_form;
	}

	function axil_shop_show_or_hide_cross_sells(){
	// Show or hide related cross sells
		$papr_options 	= Helper::axil_get_options();	
		if ( !empty($papr_options['wc_cross_sell'] ) ) {
			add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
		}
	}







/**
 * fragments cart contents count
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="aw-cart-count"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
    <?php
    $fragments['span.aw-cart-count'] = ob_get_clean();
    return $fragments;
}
/**
 * Remove product in the cart using ajax
 */
function scholr_ajax_product_remove()
{
    // Get mini cart
    ob_start();
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }
    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();
    woocommerce_mini_cart();
    $mini_cart = ob_get_clean();
    // Fragments and mini cart are returned
    $data = array(
        'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                'div.aw_mini_cart_wrapper' => '<div class="aw_mini_cart_wrapper">' . $mini_cart . '</div>'
            )
        ),
        'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
    );
    wp_send_json( $data );
    die();
}
add_action( 'wp_ajax_product_remove', 'scholr_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'scholr_ajax_product_remove' );

/**
 * Update mini cart value
 */
add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start(); ?>
    <div class="aw_mini_cart_wrapper woocommerce">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['div.aw_mini_cart_wrapper'] = ob_get_clean();
    return $fragments;
} );









add_filter( 'woocommerce_catalog_orderby', 'papr_rename_sorting_option_woocommerce_shop' );

function papr_rename_sorting_option_woocommerce_shop( $options ) {
    $options['menu_order'] = esc_html__( 'Default Sorting', 'papr' );
    $options['popularity'] = esc_html__( 'Popularity', 'papr' );
    $options['rating'] = esc_html__( 'Average Rating', 'papr' );
    $options['date'] = esc_html__( 'Newness', 'papr' );
    $options['price'] = esc_html__( 'Price: Low to High', 'papr' );
    $options['price-desc'] = esc_html__( 'Price: High to Low', 'papr' );
    return $options;
}