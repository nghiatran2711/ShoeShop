<?php

namespace App\Utils;

use Illuminate\Support\Str;

class CommonUtil 
{
    public static function generateUUID()
    {
        return (string) Str::orderedUuid();
    }

    public static function dumpData($data)
    {
        echo '<pre>';
        print_r($data);
    }
}