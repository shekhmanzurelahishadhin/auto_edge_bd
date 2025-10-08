<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function other_images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class,'model_id');
    }
    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class,'year_id');
    }
    public function fuel_type(): BelongsTo
    {
        return $this->belongsTo(FuelType::class,'fuel_type_id');
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class,'updated_by');
    }

    public function admin_created(): BelongsTo
    {
        return $this->belongsTo(Admin::class,'created_by');
    }


    public static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            if (Auth::guard('admin')->check()) {
                $query->created_by = Auth::guard('admin')->user()->id;
            }
        });
        static::updating(function ($query) {
            if (Auth::guard('admin')->check()) {
                $query->updated_by = Auth::guard('admin')->user()->id;
            }
        });
    }
}
