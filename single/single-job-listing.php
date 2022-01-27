<?php
/**
 * The template for displaying all single posts.
 *
 * @package WP Job Manager
 */

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
/**
 * Single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.28.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
?>






<div class="single_job_listing">
    <div class="container">
        <?php if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
        <div class="job-manager-info"><?php _e( 'This listing has expired.', 'wp-job-manager' ); ?></div>
        <?php else : ?>
        <?php
			/**
			 * single_job_listing_start hook
			 *
			 * @hooked job_listing_meta_display - 20
			 * @hooked job_listing_company_display - 30
			 */
			do_action( 'single_job_listing_start' );
		?>
        <div class="body-layout row">
            <div class="col-md-8">
                <div class="job_description">
                    <div class="job_description_title" style="
    display: block;
    font-size: 1.6rem;
    line-height: 1.5;
    margin-bottom: 2.25rem;
    color: #13213c;
    font-family: 'Montserrat';
    font-weight: bold;
">Skills Required</div>
                    <div class="job_description_content">
                        
                        <?php
                        $skills =  wpjm_get_the_job_skills();
                        $i = 1;
                        if(!empty($skills)){
                            foreach($skills as $skill):
                                $i++;
                                echo "<span class='skill'>".$skill->name."</span>"; if(count($skills) > $i ){echo ", &nbsp";}
                            endforeach;
                        }else{
                            echo "No Skills required!";
                        } ?>
                    </div>
                </div>
                <div class="job_description">
                    <div class="job_description_title" style="
    display: block;
    font-size: 1.6rem;
    line-height: 1.5;
    margin-bottom: 2.25rem;
    color: #13213c;
    font-family: 'Montserrat';
    font-weight: bold;
"> About The Job </div>
                    <div class="job_description_content">
                        <?php wpjm_the_job_description(); ?>
                    </div>
                </div>
                <a href="https://shega.co/company/" class="btn btn-small bg-grey-dark-one"
                    style="margin-left: auto;margin-right: auto;margin-top: 30px;display: block;background: #faa31b;padding: 12px 20px;font-size: 1.1rem;width: 200px;">See
                    company profile</a>
            </div>

            <div class="col-md-4">
                <div class="company-features">
                    <div class="company-features__inner">
                        <div class="company-feature">
                            <span class="company-feature__title">About Company</span>
                            <span class="company-feature__content"> <?php 
                        $my_postid = get_the_company_id();//This is page id or post id
                        $content_post = get_post($my_postid);
                        $content = $content_post->post_content;
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo "<p style='margin-top: 1rem; display: block;font-size: 1.275rem;font-family: 'Montserrat';color: #707070;'>". $content . "</p>";
                        
                         ?></span>
                        </div>

                    </div>
                </div>
                <div class="company-side-info">
                    <?php
          if (! empty(mas_wpjmc_get_the_meta_data('_company_tagline', get_the_company_id()) || ! empty(mas_wpjmc_get_the_meta_data('_company_website', get_the_company_id()))) || ! empty(mas_wpjmc_get_the_meta_data('_company_email', get_the_company_id())) || ! empty(mas_wpjmc_get_the_meta_data('_company_twitter')) || ! empty(mas_wpjmc_get_the_meta_data('_company_facebook', get_the_company_id())) || ! empty(mas_wpjmc_get_the_meta_data('_company_phone', get_the_company_id()))) {
              ?>
                    <div class="company-data__content--list">

                        <?php if (! empty($company_website = mas_wpjmc_get_the_meta_data('_company_website', get_the_company_id()))) : ?>
                        <span class="company-data__content--list-item">
                            <span class="company-data__content--list-item-title"> Website </span>
                            <a href="<?php echo esc_url($company_website); ?>" target="_blank">
                                <?php echo esc_html($company_website); ?>
                            </a>
                        </span>
                        <?php endif; ?>
                        <?php if (! empty($company_email = mas_wpjmc_get_the_meta_data('_company_email', get_the_company_id()))) : ?>
                        <span class="company-data__content--list-item">
                            <span class="company-data__content--list-item-title"> Email </span>
                            <a href="mailto:<?php echo esc_url($company_email); ?>" target="_blank">
                                <?php echo esc_html($company_email); ?>
                            </a>
                        </span>
                        <?php endif; ?>
                        <?php if (! empty($company_phone = mas_wpjmc_get_the_meta_data('_company_phone', get_the_company_id()))) : ?>
                        <span class="company-data__content--list-item">
                            <span class="company-data__content--list-item-title"> Phone </span>
                            <a href="tel:<?php echo esc_url($company_phone); ?>" target="_blank">
                                <?php echo esc_html($company_phone); ?>
                            </a>
                        </span>
                        <?php endif; ?>

                        <span class="company-data__content--list-item">
                            <span class="company-data__content--list-item-title"> City </span>
                            <?= the_job_location(); ?>
                        </span>
                        <?php if (! empty($company_twitter = mas_wpjmc_get_the_meta_data('_company_twitter', get_the_company_id())) || ! empty($company_facebook = mas_wpjmc_get_the_meta_data('_company_facebook', get_the_company_id()))) : ?>
                        <span class="company-data__content--list-item">
                            <span class="company-data__content--list-item-title"> Socials </span>
                            <?php if (! empty($company_facebook = mas_wpjmc_get_the_meta_data('_company_facebook', get_the_company_id()))) : ?>
                            <a class="company-data__content--list-item-icon"
                                href="<?php echo esc_url($company_facebook); ?>" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if (! empty($company_twitter = mas_wpjmc_get_the_meta_data('_company_twitter', get_the_company_id()))) : ?>
                            <a class="company-data__content--list-item-icon"
                                href="<?php echo esc_url($company_twitter); ?>" target="_blank"><i
                                    class="fab fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php endif; ?>
                    </div>
                    <?php
          } ?>
                </div>
                <a href="https://shega.co/jobs/" class="btn btn-small bg-grey-dark-one"
                    style="margin-top: 30px;position: absolute;margin-right: 8px;background: #faa31b;padding: 12px 20px;bottom: 0%;font-size: 1.1rem;vertical-align: text-bottom;">Discover
                    more jobs</a>
            </div>
        </div>
        <?php
			/**
			 * single_job_listing_end hook
			 */
			do_action( 'single_job_listing_end' );
		?>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();