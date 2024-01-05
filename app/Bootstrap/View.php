<?php

namespace App\Bootstrap;

use App\Exceptions\ExceptionHandler;

class View
{
    /**
     * Render Any Given View/Component File To Send To The Browser
     *
     * @param string $view
     * @param array $model
     * @param string $layout
     * @return void
     */
    public static function render(string $view, array|string $data, string $layout = null) : void
    {
        $destination = __DIR__ . '/../View/' . $view . '.php';
        try {
            if(!file_exists($destination)){
                throw new ExceptionHandler("File Destination Not Found", 404);
                return;
            } 
            if($layout != '' || $layout != null || !empty($layout)) {
                $layout_path = __DIR__ . '/../Layout/' . $layout . '.php';
                if(!file_exists($layout_path)){
                    throw new ExceptionHandler("Layout Destination Not Found", 404);
                    return;
                }
                Layout::yield($layout_path, $destination, $data);
            } else {
                require $destination;
            }
        } catch(ExceptionHandler $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
      
    }

}