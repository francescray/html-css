<?php

namespace App\Lib\Common;

use Symfony\Component\HttpFoundation\Request;

class Url
{
    public static function append($key, $value)
    {
        $query = request()->except('page');
        $query[$key] = $value;

        $pathInfo = request()->getPathInfo();
        return url($pathInfo . '?' . http_build_query($query));
    }

    public static function del($key)
    {
        $query = request()->except('page');
        unset($query[$key]);

        $pathInfo = request()->getPathInfo();
        return url($pathInfo . '?' . http_build_query($query));
    }
}