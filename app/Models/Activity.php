<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use OwenIt\Auditing\Contracts\Auditable;

class Activity extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = ['id'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class);
    }

    protected static function booted(): void
    {
        if (Auth::check() && Auth::guard('admin')->check()){
            if (Auth::guard('admin')->user()->department_id != null) {

                static::creating(function ($model) {
                    $model->department_id = Auth::guard('admin')->user()->department_id;
                });

                static::addGlobalScope('department_id', function (Builder $builder) {
                    $builder->where('department_id', Auth::guard('admin')->user()->department_id);
                });
            }
            if (Auth::guard('admin')->user()->institute_id != null) {

                static::creating(function ($model) {
                    $model->institute_id = Auth::guard('admin')->user()->institute_id;
                });

                static::addGlobalScope('institute_id', function (Builder $builder) {
                    $builder->where('institute_id', Auth::guard('admin')->user()->institute_id);
                });
            }
        }
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
