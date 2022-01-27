<?php

/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */
trait socialTrait
{

    public static function socials()
    {
        $papr_options = self::axil_get_options();
        $axil_socials = array(
            'social_facebook' => array(
                'icon' => 'fa-facebook-f',
                'url' => $papr_options['social_facebook'],
            ),
            'social_twitter' => array(
                'icon' => 'fa-twitter',
                'url' => $papr_options['social_twitter'],
            ),
            'social_linkedin' => array(
                'icon' => 'fa-linkedin-in',
                'url' => $papr_options['social_linkedin'],
            ),
            'social_youtube' => array(
                'icon' => 'fa-youtube',
                'url' => $papr_options['social_youtube'],
            ),
            'social_pinterest' => array(
                'icon' => 'fa-pinterest',
                'url' => $papr_options['social_pinterest'],
            ),
            'social_instagram' => array(
                'icon' => 'fa-instagram',
                'url' => $papr_options['social_instagram'],
            ),
        );
        return array_filter($axil_socials, array(__CLASS__, 'filter_social'));
    }

    public static function filter_social($args)
    {
        return ($args['url'] != '');
    }

}
