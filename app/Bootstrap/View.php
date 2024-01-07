<?php

namespace App\Bootstrap;

use App\Exceptions\ExceptionHandler;

class View
{
    public string $__layout__;
    /**
     * Render Any Given View/Component File To Send To The Browser
     *
     * @param string $view
     * @param array $model
     * @param string $layout
     * @return void
     */
    public static function render(string $__view__, array|string $__data__, string $__layout__ = null) : void
    {
        $__destination_layout__ = __DIR__ . '/../View/' . $__view__ . '.php';
        try {
            if(!file_exists($__destination_layout__)){
                throw new ExceptionHandler("File Destination Not Found", 404);
                return;
            } 
            // check if the content passed have a layout in the argument
            if($__layout__ != '' || $__layout__ != null || !empty($__layout__)) {
                $__layout_path__ = __DIR__ . '/../Layout/' . $__layout__ . '.php';
                if(!file_exists($__layout_path__)){
                    throw new ExceptionHandler("Layout Destination Not Found", 404);
                    return;
                }
                Layout::yield($__layout_path__, $__destination_layout__, $__data__);
            } else {
                // view doesn't have a layout

                // extract the data so that the consumer can access the data in the form and with the name like how it's passed
                if(isset($__data__)) {
                    extract($__data__);
                }

                // require the view
                require $__view__;
            }
        } catch(ExceptionHandler $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
      
    }

    public function layout(string $__layout__) : View
    {
        $this->__layout__ = $__layout__;
        return $this;
    }

}