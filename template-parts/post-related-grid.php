<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
if ( ! function_exists( 'papr_related_post_grid' )) {
	function papr_related_post_grid(){
	$post_id 				= get_the_id();
	$active_post 			= array( $post_id );
	$papr_options 			= Helper::axil_get_options();
	$layout_abj 			= Helper::axil_layout_style_all();
	$layout 				= $layout_abj['layout'];
	$layout_class 			= $layout_abj['layout_class'];
	$post_class 			= $layout_abj['post_class'];
	$related_post_count 	= $papr_options ['show_related_post_number'];
	$query_type = $papr_options ['related_post_query'];
	$args = array(
		'post__not_in'           => $active_post,
		'posts_per_page'         => $related_post_count,
		'post_status'            => 'publish',
		'no_found_rows'          => true,
		'update_post_term_cache' => false,
		'ignore_sticky_posts'    => true,
	);
	if( $papr_options ['related_post_sort'] ){
		$post_order = $papr_options ['related_post_sort'];
		if( $post_order == 'rand' ){
			$args['orderby'] = 'rand';
		}elseif( $post_order == 'views' ){
			$args['orderby']  = 'meta_value_num';
			$args['meta_key'] = 'axil_views';
		}elseif( $post_order == 'popular' ){
			$args['orderby'] = 'comment_count';
		}elseif( $post_order == 'modified' ){
			$args['orderby'] = 'modified';
			$args['order']   = 'ASC';
		}elseif( $post_order == 'recent' ){
			$args['orderby'] = '';
			$args['order']   = '';
		}
	}
	if( $query_type == 'author' ){
		$args['author'] = get_the_author_meta( 'ID' );
	}
	elseif( $query_type == 'tag' ){
		$tags_ids  = array();
		$post_tags = get_the_terms( $post_id, 'post_tag' );

		if( ! empty( $post_tags ) ){
			foreach( $post_tags as $individual_tag ){
				$tags_ids[] = $individual_tag->term_id;
			}

			$args['tag__in'] = $tags_ids;
		}
	}
	else{
		$category_ids = array();
		$categories   = get_the_category( $post_id );
		foreach( $categories as $individual_category ){
			$category_ids[] = $individual_category->term_id;
		}
		$args['category__in'] = $category_ids;
	}
	$axil_image_size  = "axil-size-md";
	$related_query = new wp_query( $args );
	if( $related_query->have_posts() ) { ?>
		<div class="related-post p-b-xs-30">
			<div class="container">
			<?php if ( !empty( $papr_options['related_post_area_title'] ) ): ?>
				<div class="section-title m-b-xs-30">
					<h2 class="axil-title"><?php echo esc_html( $papr_options['related_post_area_title'] ); ?></h2>
				</div>
			<?php endif ?>
					<div class="grid-wrapper">
						<div class="row">
						<?php
							while ( $related_query->have_posts() ) {
							$related_query->the_post();
							$has_meta  = $papr_options['blog_author_name'] ? true : false;
							$title = get_the_title();
							$title = wp_trim_words( $title,  $papr_options['related_title_limit'] );
							$post_id = get_the_ID();
						?>
						<div class="col-lg-3 col-md-4">
							<div class="content-block m-b-xs-30">
                                <a href="<?php the_permalink();?>" title="<?php echo wp_kses_post( $title );?>">
                                    <?php Helper::get_generate_img($post_id, $class = "img-fluid", $settings ="", $axil_image_size); ?>
                                </a>
								<div class="media-caption grad-overlay">
									<div class="caption-content">
										<h3 class="axil-post-title hover-line"><a href="<?php the_permalink();?>"><?php echo wp_kses_post( $title );?></a></h3>
                                        <?php if($has_meta){ ?>
                                            <div class="caption-meta">
                                                <?php esc_html_e( '&nbsp;', 'papr') ?><?php the_author_posts_link();?>
                                            </div>
                                        <?php } ?>
									</div>
									<!-- End of .content-inner -->
								</div>
							</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php }
		wp_reset_postdata();
	}
}
?>
