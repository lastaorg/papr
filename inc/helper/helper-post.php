<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

function axil_body_classes($classes)
{
    $papr_options = Helper::axil_get_options();

    $condipfix = helper::layout_settings();
    $layout_abj = Helper::axil_layout_style_all();
    $layout = $layout_abj['layout'];

    if (isset($papr_options['active_dark_mode'])){
        $classes[] = ($papr_options['active_dark_mode'] == 'on' || $papr_options['active_dark_mode'] == 1) ? 'active-dark-mode' : '';
    }

    // Sidebar
    $classes[] = ($layout == 'full-width') ? 'no-sidebar full-width' : '';
    $classes[] = ($layout == 'left-sidebar') ? 'has-sidebar left-sidebar' : '';
    $classes[] = ($layout == 'right-sidebar') ? 'has-sidebar right-sidebar' : '';
    $classes[] = ($papr_options['sticky_menu'] == 'on' || $papr_options['sticky_menu'] == '1') ? 'axil-sticky-menu' : 'axil-no-sticky-menu';

    // Menu Open Option
    $dropdown_menu_open_option = $papr_options['dropdown_menu_open_option'];
    $classes[] = ('hover' == $dropdown_menu_open_option) ? 'menu-open-hover' : 'menu-open-click';

    return $classes;
}

add_filter('body_class', 'axil_body_classes');
function axil_preloader()
{
    // Hide preloader if js is disabled
    echo '<noscript><style>#preloader{display:none;}</style></noscript>';
}

add_action('wp_head', 'axil_preloader', 1);

function axil_top_back()
{
    $papr_options = Helper::axil_get_options();
    // Back-to-top link
    if ($papr_options['back_to_top']) {
        echo '<a href="#" class="axil-top-scroll animated bounce faster"><i class="fas fa-angle-up"></i></a>';
    }
}

add_action('wp_footer', 'axil_top_back', 1);
/* For category color */
if (!function_exists('axil_get_the_category')) {
    function axil_get_the_category($post_id)
    {
        $post_categories = get_the_category($post_id);
        $category = array();
        foreach ($post_categories as $category) {
            $get_color = get_term_meta($category->term_id, 'axil_category_color', true);
            if ($get_color) { ?>
                <a class="post-cat cat-btn" style="background:<?php echo esc_attr($get_color); ?>"
                   href="<?php echo get_category_link($category->term_id); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
            <?php } else { ?>
                <a style="background: #212121" class="post-cat cat-btn cat-btn-color"
                   href="<?php echo get_category_link($category->term_id); ?>"><?php echo esc_html($category->name); ?></a>
            <?php }

        }
    }
}

/*For category color*/
if (!function_exists('axil_get_the_category_color')) {
    function axil_get_the_category_color($post_id)
    {
        $post_categories = get_the_category($post_id);
        $category = array();
        foreach ($post_categories as $category) {
            $get_color = get_term_meta($category->term_id, 'axil_category_color', true);
            if ($get_color) { ?>
                <a class="post-cat" style="color:<?php echo esc_attr($get_color); ?>"
                   href="<?php echo get_category_link($category->term_id); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
            <?php } else { ?>
                <a class="post-cat cat-btn-color"
                   href="<?php echo get_category_link($category->term_id); ?>"><?php echo esc_html($category->name); ?></a>
            <?php }

        }
    }
}

/*For category color*/
if (!function_exists('axil_category')) {
    function axil_category($id)
    {
        $category = current(get_the_category($id));
        $separator = ' ';
        $output = '';
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $get_color = get_term_meta($category->term_id, 'axil_category_color', true);

                if ($get_color) { ?>
                    <a class="cat-btn" href="<?php echo get_category_link($category->term_id); ?>"><span
                                class="el-rt-cat style_2"
                                style="background:<?php echo esc_attr($get_color); ?>"><?php echo esc_html($category->name); ?><span
                                    class="titleinner"
                                    style="border-top: 8px solid #<?php echo esc_attr($get_color); ?>;"></span></span></a>
                <?php } else { ?>
                    <a class="cat-btn" href="<?php echo get_category_link($category->term_id); ?>"><span
                                class="el-rt-cat style_2"><?php echo esc_html($category->name); ?><span
                                    class="titleinner"></span></span></a>
                <?php }
            }
        }
    }
}


function axil_post_links_next()
{ ?>
    <div class="row no-gutters post-navigation">
        <?php $prevPost = get_previous_post(true);
        if ($prevPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $prevPost->ID
            );
            $prevPost = get_posts($args);
            foreach ($prevPost as $post) {
                setup_postdata($post);
                ?>
                <div class="prev-post">
                    <i class="feather icon-chevron-left"></i>Previous Post
                    <h5>Tips For Choosing The Perfect Gloss For Your Lips</h5>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="prev-post">
                        <a class="previous"
                           href="<?php the_permalink(); ?>">&laquo; <?php esc_html_e('Previous article', 'papr'); ?></a>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <small><?php the_date('F j, Y'); ?></small>
                    </div>
                </div>
                <?php
                wp_reset_postdata();
            } //end foreach
        } // end if

        $nextPost = get_next_post(true);
        if ($nextPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $nextPost->ID
            );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post);
                ?>

                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <a class="next" href="<?php the_permalink(); ?>"><?php esc_html_e('Next Story &raquo;', 'papr') ?></a>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <small><?php the_date('F j, Y'); ?></small>
                </div>
                <?php
                wp_reset_postdata();
            }
        }
        ?>
    </div>

    <?php

}

/*next previous post links*/
if (!function_exists('axil_post_links_next_prev')) {
    function axil_post_links_next_prev()
    {

        $prevPost = '';
        $prevthumbnail = '';
        $nextPost = '';
        $nextthumbnail = '';
        $next_post_url = '';
        $previous_post_url = '';

        $prevPost = get_previous_post();
        $nextPost = get_next_post();

        $prev_id = empty($prevPost) ? null : $prevPost->ID;
        $next_id = empty($nextPost) ? null : $nextPost->ID;

        $next_post_url = next_post_link('%link', false);
        $previous_post_url = previous_post_link('%link', false);

        $prevthumbnail = get_the_post_thumbnail_url($prev_id, 'axil-450x450');
        $nextthumbnail = get_the_post_thumbnail_url($next_id, 'axil-450x450');


        $prev_post = get_previous_post();
        $next_post = get_next_post();

        $no_next_post = (empty($prev_post)) ? 'no-prev-post' : '';
        $no_prev_post = (empty($next_post)) ? 'no-next-post' : '';


        $prevthumbnail_var = (!empty($prevthumbnail)) ? 'style="background-image: url(' . $prevthumbnail . ')"' : '';
        $nextthumbnail_var = (!empty($nextthumbnail)) ? 'style="background-image: url(' . $nextthumbnail . ')"' : '';


        ?>
        <div class="row  post-navigation-wrapper m-b-xs-60">
            <?php if (!empty($prev_post)) : ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="post-navigation" <?php echo wp_kses_post($prevthumbnail_var); ?>>
                        <div class="post-nav-content">
                            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="prev-post">
                                <i class="feather icon-chevron-left"></i><?php esc_html_e('Previous Post', 'papr'); ?>
                            </a>
                            <h3>
                                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo wp_kses_post($prev_post->post_title); ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php if (!empty($next_post)) : ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="post-navigation text-right" <?php echo wp_kses_post($nextthumbnail_var); ?>>
                        <div class="post-nav-content">
                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="next-post">
                                <?php esc_html_e('Next Post', 'papr'); ?><i class="feather icon-chevron-right"></i>
                            </a>
                            <h3>
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo wp_kses_post($next_post->post_title); ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>

    <?php }
}

/*next previous post links*/
if (!function_exists('axil_post_links_next_prev_for_banner')) {
    function axil_post_links_next_prev_for_banner()
    {

        $prev_post = get_previous_post();
        $next_post = get_next_post();

        $no_next_post = (empty($prev_post)) ? 'no-prev-post' : '';
        $no_prev_post = (empty($next_post)) ? 'no-next-post' : '';

        ?>
        <div class="post-navigation-wrapper post-navigation__banner">
            <?php if (!empty($prev_post)) : ?>
                <div class="post-navigation <?php echo esc_attr($no_prev_post); ?>">
                    <div class="post-nav-content">
                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="prev-post">
                            <i class="feather icon-chevron-left"></i><?php esc_html_e('Prev Post', 'papr'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty($next_post)) : ?>
                <div class="post-navigation <?php echo esc_attr($no_next_post); ?>">
                    <div class="post-nav-content">
                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="next-post">
                            <?php esc_html_e('Next Post', 'papr'); ?><i class="feather icon-chevron-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php }
}


/*Module: Last Post update Date*/
function axil_update_post()
{
    $updatepost_args = array(
        'orderby' => 'modified',
        'posts_per_page' => 1,
        'ignore_sticky_posts' => '1'
    );

    $updatepost_info = new WP_Query($updatepost_args);

    while ($updatepost_info->have_posts()) {
        $updatepost_info->the_post();
        echo get_post_modified_time(get_option('date_format') . ' ' . get_option('time_format'), false, null, true);
    }
    wp_reset_postdata();
}


