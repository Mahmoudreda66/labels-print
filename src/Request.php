<?php

namespace Mahmoud\Labels;

class Request
{
    /**
     * get request path
     * 
     * @return string
     */
    public static function path(): string
    {
        $opath = trim($_SERVER['REQUEST_URI'], "/");

        return str_contains($opath, '?') ? (explode('?', $opath)[0]) : $opath;
    }

    /**
     * get request method
     * 
     * @return string
     */
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
