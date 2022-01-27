<meta name="google-site-verification" content="ABk4Ksi8CkFYsWI9vjgZrlhnrUwR879R23Y1JFy4YZ8" />
<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
if ( is_post_type_archive( "team" ) || is_tax( "team_category" )) {
	get_template_part( 'template-parts/archive', 'team' );
	return;
}
$layout_abj 		= Helper::axil_layout_style_all();
$layout_class 		= $layout_abj['layout_class']; 
$post_class 		= $layout_abj['post_class']; 
$papr_options 		= Helper::axil_get_options();
$layout             = $layout_abj['layout'];
$sidebar 	= Helper::axil_sidebar_options();
$has_sidebar_contnet = (is_active_sidebar( $sidebar ) || is_active_sidebar( 'sidebar' )) ? 'col-xl-8 axil-main' : 'col-xl-12 axil-main';


if ( $papr_options['blog_style'] 		== 'style2' ) {
	$blog_style_layout_class 			= "axil-list-2 masonry-holder";
}else {
	$blog_style_layout_class 			= "axil-list-1";	
}	

if ( $papr_options['blog_style'] == 'style2' ) { 
    // Layout class
    if ( $layout  == 'full-width' ) {
        $layout_class = 'col-12';
        $post_class = 'col-lg-4 col-md-4 col-sm-6 masonry-item';
    }
    else{
        $layout_class = $has_sidebar_contnet;
        $post_class = 'col-lg-6 masonry-item';
    }
} else {      
    if ( $layout  == 'full-width' ) {
        $layout_class = 'col-12';
        $post_class = 'col-lg-6 col-md-6 col-sm-6';
    }
    else{
        $layout_class = $has_sidebar_contnet;
        $post_class = 'col-lg-12';
    }
}
?>
<?php get_header(); ?>
<div class="papr-container">
	<div class="container">
		<div class="row theiaStickySidebar">
			<?php Helper::axil_left_get_sidebar();?>
			<div class="<?php echo esc_attr( $layout_class );?>">
				<?php echo Helper::ad_post_before_content(); ?>				
				<div class="papr-container-content">
					<?php if ( have_posts() ) :?>
						<div class="row <?php echo esc_attr( $blog_style_layout_class );?>">
						<?php
						while ( have_posts() ) : the_post();	
							if ( $papr_options['blog_style'] == 'style2' ) { ?>
								<div class="<?php echo esc_attr($post_class) ;?>">
									<?php get_template_part( 'template-parts/blog/content-2', get_post_format() );?>
								</div>
								<?php } else { ?>
								<div class="<?php echo esc_attr($post_class) ;?>">
									<?php get_template_part( 'template-parts/blog/content-1', get_post_format() );	?>
								</div>		
							<?php	
							}						
							endwhile;
						?>
						</div>					
					<?php Helper::pagination();?>					
					<?php else:?>
					<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</div>
				<?php echo Helper::ad_post_after_content(); ?>	
			</div>
			<?php Helper::axil_right_get_sidebar();?>
		</div>
	</div>
</div>
<?php get_footer(); ?>