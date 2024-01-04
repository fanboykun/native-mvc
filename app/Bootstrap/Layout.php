<?php

namespace App\Bootstrap;

use App\Exceptions\ExceptionHandler;

class Layout
{
    public static function yield(string $layout, string $content = null, ?array $data = [])
    {
        require $layout;
    }
}