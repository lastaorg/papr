<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="page-thumbnail"><?php the_post_thumbnail( 'axil-size1' );?></div>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content();?>
		<?php wp_link_pages( array(
			'before'      => '<div class="axil-page-links"><span class="page-link-holder">' . esc_html__( 'Pages:', 'papr' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			) );
		?>
	</div>
</div>