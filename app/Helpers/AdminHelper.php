<?php

/**
 * Created by PhpStorm.
 * User: touhe
 * Date: 11-Jun-19
 * Time: 4:13 PM
 */

namespace App\Helpers;


class AdminHelper
{
    public static function middleware($class)
    {
        $class->middleware('preventBackHistory');
        $class->middleware('auth:admin');
    }
}
