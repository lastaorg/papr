<?php

/**
 * Register custom fonts.
 */
if (!function_exists('papr_fonts_url')) :
    function papr_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';
        $display = '&display=swap';

        /* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'papr')) {
            $fonts[] = 'Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900';
        }

        /* translators: If there are characters in your language that are not supported by Yantramanav, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Roboto: on or off', 'papr')) {
            $fonts[] = 'Roboto:300,300i,400,400i,500,500i,700,700i,900,900';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts) . $display),
                'subset' => urlencode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;