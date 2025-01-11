<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('brand.index');
        $brands = Brand::withTrashed()->latest()->get();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('brand.create');
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {

        Gate::authorize('brand.create');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/brand');
            $data['image'] = $file_url;
        }

        Brand::create($data);

        flash()->addSuccess('Brand created successfully');

        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('backend.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        Gate::authorize('brand.edit');
        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBrandRequest $request, Brand $brand)
    {
        Gate::authorize('brand.edit');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/brand', $brand->image);
            $data['image'] = $file_url;
        }

        $brand->update($data);

        flash()->addSuccess('Brand updated successfully');

        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('brand.destroy');
        $brand = Brand::findOrFail($id);
        $brand->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('brand.destroy');
        $brand = Brand::withTrashed()->findOrFail($id);
        $brand->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('brand.destroy');
        $brand = Brand::onlyTrashed()->where('id', $id)->first();
        if ($brand->image != null && File::exists(public_path($brand->image))) {
            File::delete(public_path($brand->image));
        }
        $brand->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
