<?php

namespace App\Bootstrap;

class Layout
{   
    /**
     * Layout Helper File Path`
     * @var string $helper_path
     */
    protected static $helper_path =  __DIR__ .'/Static/layout-helper.php';

     /**
     * Yielding The Section/Content For The Layout
     * @param string $layout
     * @param string $content
     * @param $array|string $data
     */
    public static function yield(string $__layout__, string $__content__ = null, array|string $__data__layout) : void
    {
        // require self::$helper_path;
        // extract the data so that the consumer can access the data in the form and with the name like how it's passed
        if(isset($__data__layout)) {
            extract($__data__layout);
        }
        require($__layout__);
    }

}