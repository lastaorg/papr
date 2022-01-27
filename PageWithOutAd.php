<?php
/*
  Template Name: PageWithOutAd
 */
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
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
        <div class="brand-logo-container d-lg-none" style="
    /* margin-left: 50px; */
    float: right;
    display: inline-block;
    position: absolute;
        display: block !important;
    left: 30px;
    margin-right: 16px;
">
                <a class="site-logo" href="https://shega.co/">
                                            <img alt="Shega" data-src="https://shega.co/wp-content/uploads/2020/09/Shega-logo-22-e1601232255639.png" class="brand-logo dark-logo lazyloaded" src="https://shega.co/wp-content/uploads/2020/10/Shega-Mark-29.png" data-hasqtip="1" title="" style="
    width: 25px;
"><noscript><img class="brand-logo dark-logo" src="https://shega.co/wp-content/uploads/2020/09/Shega-logo-22-e1601232255639.png"
                             alt="Shega"></noscript>
                                                                <img alt="Shega" data-src="https://shega.co/wp-content/uploads/2020/09/logo-white.svg" class="brand-logo light-logo lazyload" src="https://shega.co/wp-content/uploads/2020/09/logo-white.svg" data-hasqtip="2"><noscript><img class="brand-logo light-logo" src="https://shega.co/wp-content/uploads/2020/09/logo-white.svg"
                             alt="Shega"></noscript>
                                    </a>
            </div>
        <div class="navbar-inner">
            
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

<div class="papr-container" style="padding-top: 0px;">
	<div class="container">
		<div class="row">
			<?php
				Helper::axil_left_get_sidebar();
			?>
			<div class="<?php echo esc_attr( $layout_class );?>">
				<div class="papr-container-content">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
						?>
					<?php endwhile; ?>
				</div>
			</div>
			<?php
				Helper::axil_right_get_sidebar();
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>