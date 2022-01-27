<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */


$layout_abj 		= Helper::axil_layout_style_all();
$layout 			= $layout_abj['layout']; 
$layout_class 		= $layout_abj['layout_class']; 
$papr_options 		= Helper::axil_get_options();
$subtitle 			= get_post_meta( get_the_ID(), 'axil_subtitle', true );
$youtube_link 		= get_post_meta( get_the_ID(), 'axil_youtube_link', true );
$post_id 			= get_the_ID();
$author 			= $post->post_author;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each post-each-single' ); ?>>
	<?php
		if ( has_post_thumbnail() ){ ?>		
		<div class="entry-thumbnail-area <?php echo esc_attr( $thumb_class );?>">
			<?php the_post_thumbnail( $thumb_size );?>		
		</div>	
	<?php } ?>
	<div class="entry-papr-container">	
		<h2 class="m-t-30 m-b-0"><?php echo get_the_title(); ?></h2>
		<?php echo Helper::AxilBLogSingleMetas( $post_id, $author); ?>
		<div class="entry-content"><?php the_content();?></div>
		<?php wp_link_pages( array(
		'before'      => '<div class="axil-page-links"><span class="page-link-holder">' . esc_html__( 'Pages:', 'papr' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		) );
		?>
		<?php if ( $papr_options['post_tags'] && has_tag() ): ?>
			<div class="tag entry-tags"><span><?php esc_html_e( 'Tags:', 'papr' );?></span><?php echo get_the_term_list( $post->ID, 'post_tag', '', ', ' ); ?></div>	
		<?php endif; ?>
	</div>
</article>