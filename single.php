<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$layout_abj = Helper::axil_layout_style_all();
$layout = $layout_abj['layout'];
$layout_class = $layout_abj['layout_class'];
$post_class = $layout_abj['post_class'];
$papr_options = Helper::axil_get_options();
$header_layout = Helper::axil_header_layout();
$post_layout = $header_layout['post_layout'];
?>
<?php get_header(); ?>
    <div class="papr-container">
        <?php if ($post_layout == '1') { ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content-single-1', get_post_format()); ?>
            <?php endwhile; ?>
        <?php } else if ($post_layout == '2') { ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content-single-2', get_post_format()); ?>
            <?php endwhile; ?>
        <?php } else if ($post_layout == '3') { ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content-single-3', get_post_format()); ?>
            <?php endwhile; ?>
        <?php } else if ($post_layout == '4') { ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content-single-4', get_post_format()); ?>
            <?php endwhile; ?>
        <?php } else if ($post_layout == '5') { ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content-single-5', get_post_format()); ?>
            <?php endwhile; ?>
        <?php } else if ($post_layout == '6') { ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content-single-6', get_post_format()); ?>
            <?php endwhile; ?>
        <?php } else { ?>
            <?php get_template_part('template-parts/content-single-6', get_post_format()); ?>
        <?php } ?>
    </div>
<?php get_footer(); ?>