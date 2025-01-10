<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;

class Slider extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];


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
