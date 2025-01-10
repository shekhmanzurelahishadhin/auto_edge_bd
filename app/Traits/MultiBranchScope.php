<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait MultiBranchScope
{
    protected static function bootMultiBranchScope(): void
    {
        static::creating(function ($model) {
            $model->branch_id = Auth::guard('admin')->user()->branch_id;
        });

        $getBranch = session()->get('branch');

        if ($getBranch || Auth::guard('admin')->user()->branch_id) {
            if ($getBranch) {
                static::addGlobalScope('branch_id', function (Builder $builder) {
                    $builder->where('branch_id', session()->get('branch'));
                });
            } else {
                static::addGlobalScope('branch_id', function (Builder $builder) {
                    $builder->where('branch_id', Auth::guard('admin')->user()->branch_id);
                });
            }
        }

    }
}
