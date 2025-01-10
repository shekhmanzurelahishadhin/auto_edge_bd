<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverviewInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function getByName($name,$default=null)
    {
        $info = self::where('name',$name)->first();
        if (isset($info)) {
            return $info->value;
        }else{
            return $default;
        }
    }
}
