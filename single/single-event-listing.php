<?php
$layout_abj 		= Helper::axil_layout_style_all();
$layout 			= $layout_abj['layout']; 
$post_class 		= $layout_abj['post_class']; 
$layout_class 		= $layout_abj['layout_class']; 

?>

<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<?php
$papr_options = Helper::axil_get_options();
$popup_area = $papr_options['popup_area'];
$popup_whare_to_show = $papr_options['popup_whare_to_show'];

$themepfix = AXIL_THEME_FIX;
$page_template_fixed = get_post_meta(get_the_ID(), $themepfix . "_select_page_template_fixed", true);
$page_template_fixed_value = (isset($page_template_fixed) && 'yes' == $page_template_fixed) ? 'fixed-top' : '';

/**
 * Style Switcher
 */
if (isset($papr_options['show_ld_switcher_form_user_end'])) {
    if ($papr_options['show_ld_switcher_form_user_end'] === 'on' || $papr_options['show_ld_switcher_form_user_end'] == 1) {
        add_action('wp_body_open', 'axil_style_switcher');
    }
}
if (!function_exists('axil_style_switcher')) {
    function axil_style_switcher()
    {
        echo '<div id="my_switcher">
                <ul>
                    <li>
                        <a href="javascript: void(0);" data-theme="light"  class="setColor light">
                            <span title="Light Mode">' . esc_html__('Light', 'papr') . '</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" data-theme="dark"  class="setColor dark">
                            <span title="Dark Mode">' . esc_html__('Dark', 'papr') . '</span>
                        </a>
                    </li>
                </ul>
            </div>';
    }
}
if (function_exists('wp_body_open')) {
    wp_body_open();
} else {
    do_action('wp_body_open');
}
?>
<div class="wrp">
    <!-- Main contents -->
<main class="main-content <?php echo esc_attr($page_template_fixed_value); ?>">
<?php
get_template_part('template-parts/header/header', 'preloader');

// Subscribe Popup
if (!empty($popup_area)) {
    if (is_front_page() && $popup_whare_to_show == 'home') {
        get_template_part('template-parts/header/popup', 'one');
    }
    if (is_single() && $popup_whare_to_show == 'posts') {
        get_template_part('template-parts/header/popup', 'one');
    }
    if (is_page() && $popup_whare_to_show == 'page') {
        get_template_part('template-parts/header/popup', 'one');
    }
    if ($popup_whare_to_show == 'everywhere') {
        get_template_part('template-parts/header/popup', 'one');
    }
}
///////////// 
?>
<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$header_layout 			= Helper::axil_header_layout();
$post_layout 			= $header_layout['post_layout'];
$header_style 			= $header_layout['header_style'];
$header_area 			= $header_layout['header_area'];
$inner_banner_type 		= '1';
$papr_options     		= Helper::axil_get_options(); 
$header_side_nav		= '1';
?>
<!-- Header starts -->
<div id="page" class="papr-main-content">			
		<?php			
		if ( $papr_options['offcanvas_area'] == 1 || $papr_options['offcanvas_area'] == 'on' ){
					get_template_part( 'template-parts/header/header-side-nav', $header_side_nav );
		} ?>		
		<header class="page-header">
		<?php			

			if (  "0" != $header_area ){ 
			    ?>
                <?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$papr_options = Helper::axil_get_options();
$axil_logos = Helper::axil_logos();
$nav_menu_args = Helper::nav_menu_args();
$axil_dark_logo = $axil_logos['axil_dark_logo'];
$axil_light_logo = $axil_logos['axil_light_logo'];
$axil_logo_symbol = $axil_logos['axil_logo_symbol'];
$header_layout = Helper::axil_header_layout();
$top_bar = $header_layout['top_bar'];


// Header Top
?>
<div class="navbar axil-header axil-header-six bg-grey-dark-one">
    <div class="container">
        <div class="navbar-inner">
            <div class="brand-logo-container d-lg-none">
                <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if(!empty($axil_dark_logo)){ ?>
                        <img class="brand-logo dark-logo" src="<?php echo esc_url($axil_dark_logo); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                    <?php if(!empty($axil_light_logo)){ ?>
                        <img class="brand-logo light-logo" src="<?php echo esc_url($axil_light_logo); ?>"
                             alt="<?php esc_attr(bloginfo('name')); ?>">
                    <?php } ?>
                </a>
            </div>
            <?php if (has_nav_menu('primary')) {
                wp_nav_menu($nav_menu_args);
            } ?>
            <?php if ($papr_options['search_icon'] || $papr_options['offcanvas_area']) { ?>
                <div class="navbar-extra-features ml-auto">
                    <?php
                    if ($papr_options['search_icon']) { ?>
                        <form id="search" action="<?php echo esc_url(home_url('/')); ?>" class="navbar-search"
                              method="GET">
                            <div class="search-field">
                                <input type="text" class="navbar-search-field" name="s"
                                       placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'papr'); ?>"
                                       value="<?php echo get_search_query(); ?>">
                                <button class="navbar-search-btn" type="submit"><i class="fal fa-search"></i></button>
                            </div>
                            <!-- End of .search-field -->
                            <a href="#" class="navbar-search-close"><i class="fal fa-times"></i></a>
                        </form>
                        <!-- End of .navbar-search -->
                        <a href="#" class="nav-search-field-toggler" data-toggle="nav-search-feild"><i
                                    class="fab fa fa-search"></i></a>
                    <?php } ?>
                    <?php global $woocommerce; ?>
                    <?php if (class_exists('woocommerce') && $papr_options['minicart_icon']): ?>
                        <a href="<?php echo wc_get_cart_url(); ?>"><span class="mini-cart"><i
                                        class="far fa-shopping-cart"></i> <span
                                        class="aw-cart-count"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span></span></a>
                    <?php endif; ?>
                    <?php if ($papr_options['offcanvas_area']) { ?>
                        <a href="#" class="side-nav-toggler" id="side-nav-toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    <?php } ?>

                </div>
            <?php } ?>
            <!-- End of .navbar-extra-features -->
            <div class="main-nav-toggler d-block d-lg-none" id="main-nav-toggler">
                <div class="toggler-inner">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!-- End of .main-nav-toggler -->
        </div>
        <!-- End of .navbar-inner -->
    </div>
    <!-- End of .container -->
</div>

<?php
            }

		?>		
		</header>		
	<div class="papr-container-main">
	<?php 
	if(!is_404() ){
	get_template_part( 'template-parts/content-banner/banner', $inner_banner_type );
	}
?>
<?php
global $post;   
$start_date = get_event_start_date();
$end_date   = get_event_end_date();
wp_enqueue_script('wp-event-manager-slick-script');
wp_enqueue_style('wp-event-manager-slick-style');
do_action('set_single_listing_view_count');
?>
<div class="single_event_listing">

    <div class="wpem-main wpem-single-event-page">
        <?php if (get_option('event_manager_hide_expired_content', 1) && 'expired' === $post->post_status): ?>
        <div class="event-manager-info wpem-alert wpem-alert-danger">
            <?php _e('This listing has been expired.', 'wp-event-manager'); ?></div>
        <?php else: ?>
        <?php if (is_event_cancelled()): ?>
        <div class="wpem-alert wpem-alert-danger">
            <span class="event-cancelled"><?php _e('This event has been cancelled', 'wp-event-manager'); ?></span>
        </div>
        <?php elseif (!attendees_can_apply() && 'preview' !== $post->post_status): ?>
        <div class="wpem-alert wpem-alert-danger">
            <span class="listing-expired"><?php _e('Registrations have closed', 'wp-event-manager'); ?></span>
        </div>
        <?php endif; ?>
        <?php
            /**
             * single_event_listing_start hook
             */
            do_action('single_event_listing_start');
            ?>
        <div class="company-contact-details wpem-single-event-wrapper">
            <div class="company-data wpem-single-event-header-top">
                <div class="wpem-row" style="padding: 30px 15px;margin: 0;">

                    <div class="wpem-col-md-5 wpem-single-event-images">
                        <?php
                            $event_banners = get_event_banner();
                            if (is_array($event_banners) && sizeof($event_banners) > 1):
                                ?>
                        <div class="wpem-single-event-slider-wrapper">
                            <div class="wpem-single-event-slider">
                                <?php foreach ($event_banners as $banner_key => $banner_value): ?>
                                <div class="wpem-slider-items">
                                    <img src="<?php echo $banner_value; ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="wpem-event-single-image-wrapper">
                            <div class="wpem-event-single-image"><?php display_event_banner(); ?></div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="wpem-col-md-7">
                        <div class="wpem-event-title">
                            <h3 class="wpem-heading-text"><?php the_title(); ?></h3>
                        </div>
                        <div class="wpem-heading-small-info">
                            <div class="single-event-header-time">
                                <?php echo date_i18n('M', strtotime($start_date)); ?>
                                <?php echo date_i18n('d', strtotime($start_date)).", ";
                                 echo date_i18n('Y', strtotime($start_date)); ?>&nbsp; | &nbsp;
                                <?php display_event_start_time(); ?>
                            </div>
                            <div class="wpem-event-organizer-name">
                                <?php do_action('single_event_organizer_name_start'); ?>
                                <?php printf(__('orgianizer: %s', 'wp-event-manager'), get_organizer_name($post, true)); ?>
                                <?php do_action('single_event_organizer_name_end'); ?>
                            </div>
                            <?php
                                    $view_count = get_post_views_count($post);
                                    if ($view_count) :
                                        ?>
                            <div class="wpem-viewed-event wpem-tooltip wpem-tooltip-bottom"><i
                                    class="wpem-icon-eye"></i><?php printf(__(' %d', 'wp-event-manager'), $view_count); ?>
                                <span
                                    class="wpem-tooltiptext"><?php printf(__('%d people viewed this event.', 'wp-event-manager'), $view_count); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>

                        <?php do_action('single_event_listing_button_start'); ?>
                        <?php
                                $date_format           = WP_Event_Manager_Date_Time::get_event_manager_view_date_format();
                                $registration_end_date = get_event_registration_end_date(). ' 23:59:59';
                                /* $registration_end_date = WP_Event_Manager_Date_Time::date_parse_from_format ( $date_format, $registration_end_date ); */

                                $registration_addon_form = apply_filters('event_manager_registration_addon_form', true);
                                $event_timezone          = get_event_timezone();

                                // check if timezone settings is enabled as each event then set current time stamp according to the timezone
                                // for eg. if each event selected then Berlin timezone will be different then current site timezone.
                                if (WP_Event_Manager_Date_Time::get_event_manager_timezone_setting() == 'each_event')
                                {
                                    $current_timestamp = WP_Event_Manager_Date_Time::current_timestamp_from_event_timezone($event_timezone);
                                }
                                else
                                {
                                    $current_timestamp = strtotime(current_time('Y-m-d H:i:s'));
                                }
                                // If site wise timezone selected

                                if (attendees_can_apply() && ((strtotime($registration_end_date) >= $current_timestamp) || empty($registration_end_date)) && $registration_addon_form)
                                {
                                    get_event_manager_template('event-registration.php');
                                }
                                else if (strtotime($registration_end_date) < $current_timestamp)
                                {
                                    echo '<div class="wpem-alert wpem-alert-warning">' . __('Event registration closed.', 'wp-event-manager') . '</div>';
                                }
                                ?>

                        <?php do_action('single_event_listing_button_end'); ?>

                    </div>

                </div>
            </div>
            <div class="wpem-single-event-body">
                <div class="wpem-row" style="margin: 0px">
                    <div class="wpem-col-xs-12 wpem-col-sm-7 wpem-col-md-8 wpem-single-event-left-content"
                        style="padding: 0;">

                        <?php do_action('single_event_overview_before'); ?>

                        <div class="wpem-single-event-body-content" style="margin-top: 30px;">
                            <div class="wpem-single-event-body-content-title">
                                Description
                            </div>
                            <?php do_action('single_event_overview_start'); ?>
                            <?php echo apply_filters('display_event_description', get_the_content()); ?>
                            <?php do_action('single_event_overview_end'); ?>
                        </div>

                        <!-- Additional Info Block Start -->
                        <?php
                            $show_additional_details = apply_filters('event_manager_show_additional_details', true);

                            if( $show_additional_details && is_single() ) :

                                $GLOBALS['event_manager']->forms->get_form( 'submit-event', array() );
                                $form_submit_event_instance = call_user_func( array( 'WP_Event_Manager_Form_Submit_Event', 'instance' ) );
                                $custom_fields = $form_submit_event_instance->get_event_manager_fieldeditor_fields();
                                $default_fields = $form_submit_event_instance->get_default_event_fields();
                                
                                $additional_fields = [];
                                if( !empty($custom_fields) && isset($custom_fields) && !empty($custom_fields['event']) )
                                {
                                    foreach ($custom_fields['event'] as $field_name => $field_data) 
                                    {
                                        if( !array_key_exists($field_name, $default_fields['event']) )
                                        {
                                            $meta_key = '_'.$field_name;
                                            $field_value = $post->$meta_key;

                                            if(!empty( $field_value ))
                                            {
                                                $additional_fields[$field_name] = $field_data;    
                                            }
                                        }
                                    }

                                    if( isset($additional_fields['attendee_information_type']) )
                                        unset($additional_fields['attendee_information_type']);

                                    if( isset($additional_fields['attendee_information_fields']) )
                                        unset($additional_fields['attendee_information_fields']);

                                    $additional_fields = apply_filters('event_manager_show_additional_details_fields', $additional_fields);
                                }

                                if( !empty($additional_fields)) : ?>
                        <div class="wpem-additional-info-block-wrapper">

                            <div class="wpem-additional-info-block">
                                <h3 class="wpem-heading-text"><?php _e('Additional Details', 'wp-event-manager'); ?>
                                </h3>
                            </div>

                            <div class="wpem-additional-info-block-details">

                                <?php do_action('single_event_additional_details_start'); ?>

                                <div class="wpem-row">

                                    <?php foreach ($additional_fields as $name => $field) : ?>

                                    <?php
                                                $field_key = '_'.$name;
                                                $field_value = $post->$field_key;
                                                ?>

                                    <?php if( !empty($field_value) ) : ?>

                                    <?php if( $field['type'] == 'textarea' || $field['type'] == 'wp-editor' ) : ?>
                                    <div class="wpem-col-12 wpem-additional-info-block-textarea">
                                        <div class="wpem-additional-info-block-details-content-items">
                                            <p class="wpem-additional-info-block-title"><strong>
                                                    <?php printf( __( '%s', 'wp-event-manager' ),  $field['label']); ?></strong>
                                            </p>
                                            <p class="wpem-additional-info-block-textarea-text">
                                                <?php printf( __( '%s', 'wp-event-manager' ),  $field_value); ?></p>
                                        </div>
                                    </div>

                                    <?php elseif($field['type'] == 'multiselect') : ?>
                                    <div class="wpem-col-md-6 wpem-col-sm-12 wpem-additional-info-block-details-content-left"
                                        style="padding: 0;padding-right: 15px;">
                                        <div class="wpem-additional-info-block-details-content-items">
                                            <p class="wpem-additional-info-block-title">
                                                <strong><?php printf( __( '%s', 'wp-event-manager' ),  $field['label']); ?>
                                                    -</strong>
                                                <?php printf( __( '%s', 'wp-event-manager' ),  $field_value); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <?php elseif($field['type'] == 'select') : ?>
                                    <div
                                        class="wpem-col-md-6 wpem-col-sm-12 wpem-additional-info-block-details-content-left">
                                        <div class="wpem-additional-info-block-details-content-items">
                                            <p class="wpem-additional-info-block-title">
                                                <strong><?php printf( __( '%s', 'wp-event-manager' ),  $field['label']); ?>
                                                    - </strong>
                                                <?php printf( __( '%s', 'wp-event-manager' ),  $field_value); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <?php elseif( $field['type'] == 'file' ) : ?>
                                    <div
                                        class="wpem-col-md-6 wpem-col-sm-12 wpem-additional-info-block-details-content-left">
                                        <p class="wpem-additional-info-block-title">
                                            <strong><?php printf( __( '%s', 'wp-event-manager' ),  $field['label']); ?>
                                                - </strong>
                                        </p>
                                        <div
                                            class="wpem-additional-info-block-details-content-items wpem-additional-file-slider">
                                            <?php if( is_array($field_value) ) : ?>
                                            <?php foreach ($field_value as $file) : ?>
                                            <?php if( in_array(pathinfo($file, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif', 'svg']) ) : ?>
                                            <div><img src="<?php echo $file; ?>"></div>
                                            <?php else : ?>
                                            <div class="wpem-icon"><a target="_blank" class="wpem-icon-download3"
                                                    href="<?php echo $field_value; ?>">
                                                    <?php _e( 'Download', 'wp-event-manager' ); ?></a></div>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php else : ?>
                                            <?php if( in_array(pathinfo($field_value, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif', 'svg']) ) : ?>
                                            <div><img src="<?php echo $field_value; ?>"></div>
                                            <?php else : ?>
                                            <div class="wpem-icon"><a target="_blank" class="wpem-icon-download3"
                                                    href="<?php echo $field_value; ?>">
                                                    <?php _e( 'Download', 'wp-event-manager' ); ?></a></div>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php else : ?>
                                    <div
                                        class="wpem-col-md-6 wpem-col-sm-12 wpem-additional-info-block-details-content-left">
                                        <div class="wpem-additional-info-block-details-content-items">
                                            <p class="wpem-additional-info-block-title">
                                                <strong><?php echo $field['label']; ?> -</strong>
                                                <?php echo $field_value; ?>
                                            </p>
                                        </div>
                                    </div>

                                    <?php endif; ?>

                                    <?php endif; ?>

                                    <?php endforeach; ?>

                                </div>

                                <?php do_action('single_event_additional_details_end'); ?>

                            </div>

                        </div>
                        <?php endif; ?>

                        <?php endif; ?>

                        <!-- Additional Info Block End  -->

                        <?php do_action('single_event_overview_after'); ?>
                        <?php 
                     if(get_option('enable_event_organizer')){
                        get_event_manager_template_part('content', 'single-event_listing-organizer');
                    }
    
                     ?>
                    </div>
                    <div class="wpem-col-xs-12 wpem-col-sm-5 wpem-col-md-4 wpem-single-event-right-content"
                        style="padding: 0;padding-left: 15px;">
                        <div class="wpem-single-event-body-sidebar">
                            <div style="margin-bottom: 1rem;padding: 15px 15px;border: 1px solid #e7e9e8;">
                                <div class="wpem-single-event-sidebar-info">
                                    <?php do_action('single_event_sidebar_start'); ?>
                                    <div class="clearfix">&nbsp;</div>
                                    <h3 class="wpem-heading-text"><?php _e('Date And Time', 'wp-event-manager') ?></h3>
                                    <div class="wpem-event-date-time">
                                        <span class="wpem-event-date-time-text"><?php display_event_start_date(); ?> <?php
                                            if (get_event_start_time())
                                            {
                                                display_date_time_separator();
                                                ?> <?php
                                                display_event_start_time();
                                            }
                                            ?></span>
                                        <?php
                                        if (get_event_end_date() != '' || get_event_end_time())
                                        {
                                            _e(' to', 'wp-event-manager');
                                        }
                                        ?>
                                        <br />
                                        <span class="wpem-event-date-time-text">
                                            <?php
                                            if (get_event_start_date() != get_event_end_date())
                                            {
                                                display_event_end_date();
                                            }
                                            ?> <?php
                                            if (get_event_end_date() != '' && get_event_end_time())
                                            {
                                                display_date_time_separator();
                                            }
                                            ?> <?php
                                            if (get_event_end_time())
                                            {
                                                display_event_end_time();
                                            }
                                            ?>
                                        </span>
                                    </div>

                                    <div>
                                        <div class="clearfix">&nbsp;</div>
                                        <h3 class="wpem-heading-text"><?php _e('Location', 'wp-event-manager'); ?></h3>
                                        <div>
                                            <?php
                                            if (get_event_address())
                                            {
                                                display_event_address();
                                                echo ',';
                                            }
                                            ?>
                                            <?php display_event_location(); ?>
                                        </div>
                                    </div>

                                    <?php if (get_option('event_manager_enable_event_types') && get_event_type()) : ?>
                                    <div class="clearfix">&nbsp;</div>
                                    <h3 class="wpem-heading-text"><?php _e('Types', 'wp-event-manager'); ?></h3>
                                    <div style="
    margin-left: 4px;
"><?php display_event_type(); ?></div>
                                    <?php endif; ?>

                                    <?php if (get_option('event_manager_enable_categories') && get_event_category()) : ?>
                                    <div class="clearfix">&nbsp;</div>
                                    <h3 class="wpem-heading-text"><?php _e('Event Category', 'wp-event-manager'); ?>
                                    </h3>
                                    <div class="wpem-event-category"><?php display_event_category(); ?></div>
                                    <?php endif; ?>

                                    <!-- Event Registration End Date start-->
                                    <?php if (get_event_registration_end_date()): ?>
                                    <div class="clearfix">&nbsp;</div>
                                    <h3 class="wpem-heading-text">
                                        <?php _e('Registration End Date', 'wp-event-manager'); ?>
                                    </h3>
                                    <?php display_event_registration_end_date(); ?>
                                    <?php endif; ?>
                                    <!-- Registration End Date End-->


                                    <?php if (get_organizer_youtube()) : ?>
                                    <div class="clearfix">&nbsp;</div>
                                    <button id="event-youtube-button" data-modal-id="wpem-youtube-modal-popup"
                                        class="wpem-theme-button wpem-modal-button"><?php _e('Watch video', 'wp-event-manager'); ?></button>
                                    <div id="wpem-youtube-modal-popup" class="wpem-modal" role="dialog"
                                        aria-labelledby="<?php _e('Watch video', 'wp-event-manager'); ?>">
                                        <div class="wpem-modal-content-wrapper">
                                            <div class="wpem-modal-header">
                                                <div class="wpem-modal-header-title">
                                                    <h3 class="wpem-modal-header-title-text">
                                                        <?php _e('Watch video', 'wp-event-manager'); ?></h3>
                                                </div>
                                                <div class="wpem-modal-header-close"><a href="javascript:void(0)"
                                                        class="wpem-modal-close" id="wpem-modal-close">x</a></div>
                                            </div>
                                            <div class="wpem-modal-content">
                                                <?php echo wp_oembed_get(get_organizer_youtube(), array('autoplay' => 1, 'rel' => 0)); ?>
                                            </div>
                                        </div>
                                        <a href="#">
                                            <div class="wpem-modal-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                    <?php endif; ?>

                                    <?php do_action('single_event_sidebar_end'); ?>

                                </div>

                                <?php
                                $is_friend_share = apply_filters('event_manager_event_friend_share', true);

                                if ($is_friend_share):
                                    ?>
                                <h3 class="wpem-heading-text"><?php _e('Share With Friends', 'wp-event-manager'); ?>
                                </h3>
                                <div class="wpem-share-this-event">
                                    <div class="wpem-event-share-lists">
                                        <?php do_action('single_event_listing_social_share_start'); ?>
                                        <div class="wpem-social-icon wpem-facebook">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php display_event_permalink(); ?>"
                                                title="Share this page on Facebook"><?php _e('Facebook','wp-event-manager');?></a>
                                        </div>
                                        <div class="wpem-social-icon wpem-twitter">
                                            <a href="https://twitter.com/share?text=twitter&url=<?php display_event_permalink(); ?>"
                                                title="Share this page on Twitter"><?php _e('Twitter','wp-event-manager');?></a>
                                        </div>
                                        <div class="wpem-social-icon wpem-linkedin">
                                            <a href="https://www.linkedin.com/sharing/share-offsite/?&url=<?php display_event_permalink(); ?>"
                                                title="Share this page on Linkedin"><?php _e('Linkedin','wp-event-manager');?></a>
                                        </div>
                                        <div class="wpem-social-icon wpem-xing">
                                            <a href="https://www.xing.com/spi/shares/new?url=<?php display_event_permalink(); ?>"
                                                title="Share this page on Xing"><?php _e('Xing','wp-event-manager');?></a>
                                        </div>
                                        <div class="wpem-social-icon wpem-pinterest">
                                            <a href="https://pinterest.com/pin/create/button/?url=<?php display_event_permalink(); ?>"
                                                title="Share this page on Pinterest"><?php _e('Pinterest','wp-event-manager');?></a>
                                        </div>
                                        <?php do_action('single_event_listing_social_share_end'); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="loadmore-events-container">
                    <div class="wpem-organizer-name wpem-heading-text"
                        style="margin-top: 30px;margin-bottom: 40px;text-align: center;">
                        <h3
                            style="display: block;font-size: 1.4rem;line-height: 1.5;margin-bottom: .25rem;color: #13213c;font-family: 'Montserrat';font-weight: bold;text-align: center;margin: auto;">
                            More Events <i class="fa fa-chevron-down"></i></h3>
                    </div>
                    <?php 
                    $list_type_class = 'wpem-row wpem-event-listing-box-view';
                    $list_type_class = apply_filters('wpem_default_listing_layout_class',$list_type_class,"box");?>
                    <div id="event-listing-view"
                        class="wpem-main wpem-event-listings event_listings loadmore <?php echo $list_type_class;?>">
                        <?php $events = get_event_listings( apply_filters( 'event_manager_output_events_args', array(
                            'posts_per_page'    => 3,

			/* 	'search_location'   => $location,

				'search_keywords'   => $keywords,

				'search_datetimes'  => $datetimes,

				'search_categories' => !empty($selected_category) ? explode(',', $selected_category) : '',

				'search_event_types'	=> !empty($selected_event_type) ? explode(',', $selected_event_type) : '',

				'search_ticket_prices'  => $ticket_prices,

				'orderby'           => $orderby,

				'order'             => $order,

				'posts_per_page'    => $per_page,

				'featured'          => $featured,

				'cancelled'         => $cancelled,

				'event_online'    	=> $event_online, */

			) ) );

            if ( $events->have_posts() ) : ?>
                        <?php while ( $events->have_posts() ) : $events->the_post(); ?>

                        <?php  get_event_manager_template_part( 'content', 'event_listing' ); ?>

                        <?php endwhile; ?>

                        <?php endif; ?>
                    </div>
                </div>
                <a href="https://shega.co/events/" class="btn btn-small bg-grey-dark-one" style="margin-top: 30px;margin-right: 8px;background: #faa31b;text-align: center;padding: 12px 20px;color: white;max-width: 198px;font-size: 1.1rem;">See
                    Load More Events</a>
            </div>

            <?php
                
                if(get_option('enable_event_venue')){
                    get_event_manager_template_part('content', 'single-event_listing-venue');
                }

                /**
                 * single_event_listing_end hook
                 */
                do_action('single_event_listing_end');
                ?>
            <?php endif; ?>
            <!-- Main if condition end -->
        </div>
        <!-- / wpem-wrapper end  -->

    </div>
    <!-- / wpem-main end  -->
</div>
<!-- override the script if needed -->

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.wpem-single-event-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 992,
            settings: {
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                adaptiveHeight: true
            }
        }]
    });
});
</script>
<?php get_footer(); ?>