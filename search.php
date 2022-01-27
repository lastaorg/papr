<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
$layout_abj = Helper::axil_layout_custom_taxonomy();
$layout             = $layout_abj['layout']; 
$layout_class       = $layout_abj['layout_class']; 
$post_class         = $layout_abj['post_class']; 
?>
<?php get_header(); ?>
    <div class="papr-container">
        <div class="container">
            <div class="row theiaStickySidebar">
              <?php
                if ( $layout == 'left-sidebar' ) {
                    get_sidebar();
                }
            ?>  
                <div class="<?php echo esc_attr($layout_class); ?>">
                    <div class="papr-container-content">
                        <div class="row">
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <?php get_template_part('template-parts/content', 'search'); ?>
                                <?php endwhile; ?>
                                <?php Helper::pagination(); ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <?php get_template_part('template-parts/content', 'none'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                 <?php
            if ( $layout == 'right-sidebar' ) {
                get_sidebar();
            }
            ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>