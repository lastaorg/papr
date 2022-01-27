<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

$papr_options = Helper::axil_get_options();
$condipfix = Helper::layout_settings();
$themepfix = AXIL_THEME_FIX;
$banner_on = get_post_meta(get_the_ID(), $themepfix . "_banner", true);
$breadcrumb_on = get_post_meta(get_the_ID(), $themepfix . "_breadcrumb", true);
$banner_on = (empty($banner_on) || $banner_on == 'default') ? $papr_options[$condipfix . '_banner'] : $banner_on;
$breadcrumb_on = (empty($breadcrumb_on) || $breadcrumb_on == 'default') ? $papr_options[$condipfix . '_breadcrumb'] : $breadcrumb_on;
?>
<?php if (!is_home() && !is_front_page()): ?>
    <?php if ($breadcrumb_on == '1' || $breadcrumb_on == 'on'): ?>
        <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
    <?php endif;
endif;
?>

<?php

if (is_singular('team')) {
    $banner_on = 'off';
}

?>

<?php
if ($banner_on == '1' || $banner_on == 'on'): ?>
    <!-- Banner starts -->
    <section class="banner banner__default bg-grey-light-three">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="post-title-wrapper">
                        <h1 class="m-b-xs-0 axil-post-title hover-line"><?php echo Helper::axil_get_page_title(); ?></h1>
                        <?php the_archive_description(); ?>
                    </div>
                    <!-- End of .post-title-wrapper -->
                </div>
                <!-- End of .col-lg-8 -->
            </div>
        </div>
        <!-- End of .container -->
    </section>
    <!-- End of .banner -->
<?php endif;

?>

