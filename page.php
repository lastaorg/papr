<?php
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
<?php get_header(); ?>
<div class="papr-container">
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