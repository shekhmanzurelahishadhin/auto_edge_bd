<?php

use App\Models\OverviewInfo;
use App\Models\Setting;

if (!function_exists('overview')) {

    /**
     * description
     *
     * @param $name
     * @param null $default
     * @return string
     */
    function overview($name,$default=null)
    {
        return OverviewInfo::getByName($name,$default);
    }
}
