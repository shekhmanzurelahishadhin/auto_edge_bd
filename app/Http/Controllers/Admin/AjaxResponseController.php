<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AjaxResponseController extends Controller
{
    public function getSubCategory(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();

        return response()->json(['subCategories' => $subCategories]);
    }
}
