
<?php


/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
define('AXIL_THEME_URI', get_template_directory_uri());
define('AXIL_THEME_DIR', get_template_directory());
define('AXIL_CSS_URL', get_template_directory_uri() . '/assets/css/');
define('AXIL_RTL_URL', get_template_directory_uri() . '/assets/css-auto-rtl/');

define('AXIL_ADMIN_CSS_URL', get_template_directory_uri() . '/assets/admin/css/');
define('AXIL_JS_URL', get_template_directory_uri() . '/assets/js/');
define('AXIL_ADMIN_JS_URL', get_template_directory_uri() . '/assets/admin/js/');
define('AXIL_FONTS_URL', get_template_directory_uri() . '/assets/fonts/font-awesome/css');
define('AXIL_IMG_URL', AXIL_THEME_URI . '/assets/img/');
define('AXIL_WOOCMMERCE', AXIL_THEME_DIR . '/woocommerce/custom/');
define('AXIL_FREAMWORK_DIRECTORY', AXIL_THEME_DIR . '/inc/');
define('AXIL_FREAMWORK_LAB', AXIL_THEME_DIR . '/inc/lab/');
define('AXIL_FREAMWORK_DIRECTORY_VIEW', AXIL_THEME_DIR . '/inc/views/');
define('AXIL_PLUGINS_DIR', AXIL_THEME_DIR . '/inc/plugin-bundle/');

define('AXIL_FREAMWORK_HELPER', AXIL_THEME_DIR . '/inc/helper/');
define('AXIL_FREAMWORK_RI', AXIL_THEME_DIR . '/inc/redux-include/');
define('AXIL_FREAMWORK_DS', AXIL_THEME_DIR . '/inc/dynamic-style/');
define('AXIL_FREAMWORK_TP', AXIL_THEME_DIR . '/template-parts/');
$axi_theme_data = wp_get_theme();
$action = 'axil_theme_init';
do_action($action);
define('AXIL_VERSION', (WP_DEBUG) ? time() : $axi_theme_data->get('Version'));
define('AXIL_AUTHOR_URI', $axi_theme_data->get('AuthorURI'));
define('AXIL_PRFX', 'papr');
define('AXIL_WIDGET_PREFIX', 'papr');
define('AXIL_THEME_PREFIX', 'papr');
define('AXIL_THEME_FIX', 'axil');


if (version_compare(PHP_VERSION, '5.3', '>=')) {
    /*
    * plugin.php has to load to know which plugin is active
    */
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    /*
    * Enable support TGM features.
    */
    // helper trait
    require_once(AXIL_FREAMWORK_HELPER . "elementor-loaded-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "icon-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "menu-area-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "social-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "footer-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "advertisements-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "pagination-trai.php");
    require_once(AXIL_FREAMWORK_HELPER . "page-title-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "post-metas-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "option-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "post-image-trait.php");
    require_once(AXIL_FREAMWORK_HELPER . "layout-trait.php");
    // helper
    require_once(AXIL_FREAMWORK_HELPER . "helper.php");
    require_once(AXIL_FREAMWORK_HELPER . "helper-post.php");
    // axilsetup
    require_once(AXIL_FREAMWORK_DIRECTORY . "theme-setup.php");
    //related
    require_once(AXIL_FREAMWORK_TP . "post-related-grid.php");
    // inc
    require_once(AXIL_FREAMWORK_DIRECTORY . "tgm-config.php");
    require_once(AXIL_FREAMWORK_DIRECTORY . "demo-import-config.php");
    require_once(AXIL_FREAMWORK_DIRECTORY . "register-custom-fonts.php");
    require_once(AXIL_FREAMWORK_DIRECTORY . "scripts.php");
    require_once(AXIL_FREAMWORK_DIRECTORY . "general-widget.php");
    //redux include
    require_once(AXIL_FREAMWORK_RI . "redux-help.php");
    require_once(AXIL_FREAMWORK_RI . "redux-init.php");
    //dynamic-style
    require_once(AXIL_FREAMWORK_DS . "style-scripts.php");
    require_once(AXIL_FREAMWORK_DS . "customizer.php");
    // Lab
    require_once(AXIL_FREAMWORK_LAB . "class-tgm-plugin-activation.php");
    require_once(AXIL_FREAMWORK_LAB . "axil-post-views.php");
    // -- Nav Walker
    require_once(AXIL_FREAMWORK_LAB . "aw-nav-menu-walker.php");


    // WooCommerce
    if (class_exists('WooCommerce')) {
        require_once(AXIL_WOOCMMERCE . "wooc-functions.php");
        require_once(AXIL_WOOCMMERCE . "wooc-hooks.php");
    }

} else {

    add_filter('template_include', 'axil_php_template', 99);
    add_action('admin_notices', 'axil_php_version');
    function axil_php_template($template)
    {
        $template = locate_template(array('fallback.php'));
        return $template;
    }

    function axil_php_version()
    {
        $msg = sprintf(esc_html__('Error: Your current PHP version is %s. You need at least PHP version 5.4+ . Please upgrade your PHP version 5.4+', 'papr'), PHP_VERSION);
        echo '<div class="error">' . $msg . '</div>';
    }
}
add_editor_style('style-editor.css');


/**
 * Escapeing
 */
if (!function_exists('axilescap')) {
    function axilescap($html)
    {
        return $html;
    }
}


/**
 * Shared Counts, add a Big Block style
 * @see https://sharedcountsplugin.com/2019/05/13/creating-new-button-styles/
 *
 * @param array $styles
 * @return array
 */
if (!function_exists('axil_shared_counts_styles')) {
    function axil_shared_counts_styles($styles)
    {
        $styles['axil_style'] = esc_html__('Papr Style', 'papr');
        return $styles;
    }

    add_filter('shared_counts_styles', 'axil_shared_counts_styles');
}

/**
 * Move Shared Counts
 * @see https://sharedcountsplugin.com/2019/03/27/change-the-theme-location-for-share-buttons/
 *
 * @param array $locations
 * @return array
 */
function axil_shared_counts_location($locations)
{
    $locations['after']['hook'] = 'after_post_content';
    $locations['after']['filter'] = false;

    $locations['before']['hook'] = 'before_post_content';
    $locations['before']['filter'] = false;
    return $locations;
}

add_filter('shared_counts_theme_locations', 'axil_shared_counts_location');


/**
 * Shared Counts - change buttons in "Before Content" location
 * @see https://sharedcountsplugin.com/2019/03/27/display-different-buttons-in-each-location/
 */
function axil_total_shared_counts($services, $location)
{
    if ('papr-meta' === $location) {
        $services = array('included_total');
    }
    return $services;
}

add_filter('shared_counts_display_services', 'axil_total_shared_counts', 10, 2);


/**
 * Aallowed svg types
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 */
function axil_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'axil_mime_types');


/**
 * Maintenance Mode
 */
add_action('template_include', 'under_construction_mode_enable', 999);

function under_construction_mode_enable($template)
{
    $papr_options = Helper::axil_get_options();

    if (!class_exists('ReduxFramework')) {
        return $template;
    }

    $enable = (isset($papr_options['under_construction_mode_enable'])) ? $papr_options['under_construction_mode_enable'] : 'off';

    $enable = isset($_GET['emm']) ? '1' : $enable;

    if (is_user_logged_in() || 'off' === $enable) {
        return $template;
    }


    $maintenance_mode = true;

    if (!$maintenance_mode) {
        return $template;
    }

    $new_template = locate_template(array('construction.php'));
    if ('' != $new_template) {
        return $new_template;
    }

    return $template;

}


/**
 * Escapeing
 */
if (!function_exists('awescapeing')) {
    function awescapeing($html)
    {
        return $html;
    }
}

/**
 * Remove Edit Page Link Form UnderConstruction Template
 */
function papr_add_custom_edit_menu_for_construction()
{
    global $wp_admin_bar;
    if (class_exists('Redux')) {
        if (is_page_template('construction.php')) {
            $wp_admin_bar->remove_menu('edit');
        }
    }
}

add_action('wp_before_admin_bar_render', 'papr_add_custom_edit_menu_for_construction');

/**
 * Papr Unique ID
 */
function papr_unique_id($prefix = '')
{
    static $id_counter = 0;
    if (function_exists('wp_unique_id')) {
        return wp_unique_id($prefix);
    }
    return $prefix . (string)++$id_counter;
}


/**
 * Set the excerpt length based on a theme option
 */
if ( ! function_exists('axil_excerpt_length')){
    function axil_excerpt_length($length)
    {
        $papr_options = Helper::axil_get_options();
        $custom_number = $papr_options['blog_content_number'];
        if ($custom_number != '') {
            return $length = intval($custom_number);
        } else {
            return $length;
        }
    }

    add_filter('excerpt_length', 'axil_excerpt_length', 999);
}


/**
 * Remove more or [�K] text from short post
 */
if (!function_exists('axil_excerpt_more')) {
    function axil_excerpt_more($more)
    {
        return '';
    }

    add_filter('excerpt_more', 'axil_excerpt_more');
}





////Exclude pages from WordPress Search
//if (!is_admin()) {
//    function papr_search_filter($query) {
//        if ($query->is_search) {
//            $query->set('post_type', 'post');
//        }
//        return $query;
//    }
//    add_filter('pre_get_posts','papr_search_filter');
//}

// Simply remove anything that looks like an archive title prefix ("Archive:", "Foo:", "Bar:").
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . $output . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

// function defer_parsing_of_js ( $url ) {
// if ( FALSE === strpos( $url, '.js' ) ) return $url;
// if ( strpos( $url, 'jquery.js' ) ) return $url;
// return "$url' defer ";
// }
// add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

function rudr_mailchimp_curl_connect( $url, $request_type, $api_key, $data = array() ) {
	if( $request_type == 'GET' )
		$url .= '?' . http_build_query($data);
 
	$mch = curl_init();
	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '.base64_encode( 'user:'. $api_key )
	);
	curl_setopt($mch, CURLOPT_URL, $url );
	curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
	//curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
	curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
	curl_setopt($mch, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection
 
	if( $request_type != 'GET' ) {
		curl_setopt($mch, CURLOPT_POST, true);
		curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
	}
 
	return curl_exec($mch);
}


function rudr_mailchimp_subscribe_unsubscribe( $email, $status, $merge_fields = array( 'FNAME' => '', 'LNAME' => '' ) ){
	/* 
	 * please provide the values of the following variables 
	 * do not know where to get them? read above
	 */
	$api_key = '0352789dcbb5c7710daaa6e33e6ed1ed-us2';
	$list_id = '6fbaacab78';
 
	/* MailChimp API URL */
	$url = 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($email));
	/* MailChimp POST data */
	$data = array(
		'apikey'        => $api_key,
    		'email_address' => $email,
		'status'        => $status, // in this post we will use only 'subscribed' and 'unsubscribed'
		'merge_fields'  => $merge_fields // in this post we will use only FNAME and LNAME
	);
	return json_decode( rudr_mailchimp_curl_connect( $url, 'PUT', $api_key, $data ) );
}

add_action('user_register', 'rudr_user_register_hook', 20, 1 );
 
function rudr_user_register_hook( $user_id ){
 
	$user = get_user_by('id', $user_id ); // feel fre to use get_userdata() instead
 
	$subscription = rudr_mailchimp_subscribe_unsubscribe( $user->user_email, 'subscribed', array( 'FNAME' => $user->first_name,'LNAME' => $user->last_name ) );
 
	/*
	 * if user subscription was failed you can try to store the errors the following way
	 */
	if( $subscription->status != 'subscribed' )
		update_user_meta( $user_id, '_subscription_error', 'User was not subscribed because:' . $subscription->detail );
 
}



/*
* Define a constant path to our single template folder
*/

 
/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');
 
/**
* Single template function which will choose our template
*/
function my_single_template($single) {
global $wp_query, $post;
 
/**
* Checks for single template by category
* Check by category slug and ID
*/
if(is_singular('job_listing')){
return TEMPLATEPATH."/single/single-job-listing.php";
}
if(is_singular('event_listing')){
return TEMPLATEPATH."/single/single-event-listing.php";
}
return TEMPLATEPATH."/single.php";
} 



/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft(){
  global $wpdb;
  if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
    wp_die('No post to duplicate has been supplied!');
  }
 
  /*
   * Nonce verification
   */
  if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
    return;
 
  /*
   * get the original post id
   */
  $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
  /*
   * and all the original post data then
   */
  $post = get_post( $post_id );
 
  /*
   * if you don't want current user to be the new post author,
   * then change next couple of lines to this: $new_post_author = $post->post_author;
   */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;
 
  /*
   * if post data exists, create the post duplicate
   */
  if (isset( $post ) && $post != null) {
 
    /*
     * new post data array
     */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );
 
    /*
     * insert the post by wp_insert_post() function
     */
    $new_post_id = wp_insert_post( $args );
 
    /*
     * get all current post terms ad set them to the new post draft
     */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
 
    /*
     * duplicate all post meta just in two SQL queries
     */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos)!=0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if( $meta_key == '_wp_old_slug' ) continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query.= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }
 
 
    /*
     * finally, redirect to the edit post screen for the new draft
     */
    wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}
 
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);