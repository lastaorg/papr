<?php
/**
 * @author  Axilweb
 * @since   1.0
 * @version 1.0
 * @package papr
 */


trait IconTrait
{
    public static function get_icons()
    {
        return array_merge(
            self::get_font_awesome_4_icons()
        );
    }

    public static function get_font_awesome_4_icons()
    {
        return [
            "fa fa-facebook" => "<i class='fa fa-facebook'></i> ",
            "fa fa-instagram" => "<i class='fa fa-instagram'></i> ",
            "fa fa-linkedin" => "<i class='fa fa-linkedin'></i> ",
            "fa fa-pinterest" => "<i class='fa fa-pinterest'></i> ",
            "fa fa-twitter" => "<i class='fa fa-twitter'></i> ",
        ];
    }
}
