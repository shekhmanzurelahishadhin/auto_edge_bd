<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Models\GalleryCategory;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('gallery-category.index');
        $gallery_categories = GalleryCategory::withTrashed()->latest()->get();
        return view('backend.gallery_category.index', compact('gallery_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('gallery-category.create');
        return view('backend.gallery_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryCategoryRequest $request)
    {

        Gate::authorize('gallery-category.create');
        $data = $request->except('_token');

        GalleryCategory::create($data);

        flash()->addSuccess('Gallery Category created successfully');

        return redirect()->route('admin.gallery-category.index');
    }

    /**
     * Display the specified resource.
     */
//    public function show(Gallery $gallery)
//    {
////        return view('backend.gallery_category.show', compact('gallery'));
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryCategory $gallery_category)
    {
        Gate::authorize('gallery-category.edit');

        return view('backend.gallery_category.edit', compact('gallery_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGalleryCategoryRequest $request, GalleryCategory $gallery_category)
    {
        Gate::authorize('gallery-category.edit');
        $data = $request->except('_token');

        $gallery_category->update($data);

        flash()->addSuccess('Gallery Category updated successfully');

        return redirect()->route('admin.gallery-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('gallery-category.destroy');
        $gallery = GalleryCategory::findOrFail($id);
        $gallery->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('gallery-category.destroy');
        $gallery = GalleryCategory::withTrashed()->findOrFail($id);
        $gallery->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('gallery-category.destroy');
        $gallery = GalleryCategory::onlyTrashed()->where('id', $id)->first();
        if ($gallery->image != null && File::exists(public_path($gallery->image))) {
            File::delete(public_path($gallery->image));
        }
        $gallery->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
