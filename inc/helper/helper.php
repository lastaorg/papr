<?php

/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
class Helper
{
    use LayoutTrait;
    use OptionsTrait;
    use PageTitleTrait;
    use PostImageTrait;
    use PostMetaTrait;
    use advertisementsTrait;
    use PaginationTrait;
    use footerTrait;
    use socialTrait;
    use MenuAreaTrait;
    use IconTrait;
    use elementorLoadedTrait;

    public static function generate_cat_link($catid){
        $idObj = get_category_by_slug( $catid );
        $cat_link = "";
        if ( $idObj instanceof WP_Term ) {
            $id = $idObj->term_id;
            $cat_link = get_category_link($id);
        }
        return $cat_link;
    }
    public static function generate_excerpt($post, $length = 55, $dot = false)
    {
        if (has_excerpt($post)) {
            $final_content = wp_trim_words(get_the_excerpt($post), $length, '');
        }

        $post = get_post($post);
        $content = wp_strip_all_tags($post->post_content);
        $final_content = wp_trim_words($content, $length, '');

        if ($dot) {
            $final_content = "$final_content $dot";
        }
        return $final_content;
    }


    public static function cmb2_get_term_options($field)
    {
        $themepfix = AXIL_THEME_FIX;
        $args = $field->args('get_terms_args');
        $args = is_array($args) ? $args : array();

        $args = wp_parse_args($args, array('taxonomy' => "{$themepfix}_team",));

        $taxonomy = $args['taxonomy'];

        $terms = (array)cmb2_utils()->wp_at_least('4.5.0')
            ? get_terms($args)
            : get_terms($taxonomy, $args);

        // Initate an empty array
        $term_options = array();
        if (!empty($terms)) {
            foreach ($terms as $term) {
                $term_options[$term->term_id] = $term->name;
            }
        }

        return $term_options;
    }


    public static function file_requires($filename, $dir = false)
    {
        if ($dir) {
            $child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;

            if (file_exists($child_file)) {
                $file = $child_file;
            } else {
                $file = get_template_directory() . '/' . $dir . '/' . $filename;
            }
        } else {
            $child_file = get_stylesheet_directory() . '/inc/' . $filename;

            if (file_exists($child_file)) {
                $file = $child_file;
            } else {
                $file = AXIL_FREAMWORK_DIRECTORY . $filename;
            }
        }

        require_once $file;
    }


    public static function get_img($img)
    {
        $img = get_template_directory_uri() . '/assets/img/' . $img;
        return $img;
    }

    public static function get_css($file)
    {
        $file = get_template_directory_uri() . '/assets/css/' . $file . '.css';
        return $file;
    }

    public static function filter_content($content)
    {
        // wp filters
        $content = wptexturize($content);
        $content = convert_smilies($content);
        $content = convert_chars($content);
        $content = wpautop($content);
        $content = shortcode_unautop($content);

        // remove shortcodes
        $pattern = '/\[(.+?)\]/';
        $content = preg_replace($pattern, '', $content);

        // remove tags
        $content = strip_tags($content);

        return $content;
    }

    public static function get_current_post_content($post = false)
    {
        if (!$post) {
            $post = get_post();
        }
        $content = has_excerpt($post->ID) ? $post->post_excerpt : $post->post_content;
        $content = self::filter_content($content);
        return $content;
    }


    public static function comments_callback($comment, $args, $depth)
    {
        include AXIL_FREAMWORK_DIRECTORY_VIEW . 'comments-callback.php';
    }


    public static function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = "$r, $g, $b";
        return $rgb;
    }


    //@rtl
    public static function maybe_rtl($file)
    {
        if (is_rtl()) {
            $file = get_template_directory_uri() . '/assets/css-auto-rtl/' . $file . '.css';
            return $file;
        } else {
            $file = get_template_directory_uri() . '/assets/css/' . $file . '.css';
            return $file;
        }
    }


    public static function wp_set_temp_query($query)
    {
        global $wp_query;
        $temp = $wp_query;
        $wp_query = $query;
        return $temp;
    }

    public static function wp_reset_temp_query($temp)
    {
        global $wp_query;
        $wp_query = $temp;
        wp_reset_postdata();
    }


}