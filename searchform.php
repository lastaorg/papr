<?php
/**
 * The template for displaying Search form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package papr
 */
?>
<?php $unique_id = esc_attr( papr_unique_id( 'search-form-' ) ); ?>
<form id="<?php echo esc_attr($unique_id); ?>" class="papr-search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <input type="text" name="s" placeholder="<?php echo esc_attr_x('Search ...', 'placeholder', 'papr'); ?>" value="<?php echo get_search_query(); ?>"/>
    <span class="input-group-btn">
        <button class="btn btn-primary btn-small" type="submit">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
    </span>
</form>
