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
    public static function yield(string $layout, string $content = null, array|string $data) : void
    {
        // make it global so that our helper function can access it's value
        $GLOBALS['layout'] = $layout;
        $GLOBALS['content'] = $content;
        $GLOBALS['data'] = $data;

        require self::$helper_path;
    }

}