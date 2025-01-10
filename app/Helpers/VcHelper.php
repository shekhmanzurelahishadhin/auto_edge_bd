<?php

use App\Models\ViceChancellorInfo;

if (!function_exists('vc_info')) {

    /**
     * description
     *
     * @param $name
     * @param null $default
     * @return string
     */
    function vc_info($name,$default=null)
    {
        return ViceChancellorInfo::getByName($name,$default);
    }
}
