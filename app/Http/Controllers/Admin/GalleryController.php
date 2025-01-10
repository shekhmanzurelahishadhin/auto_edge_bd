<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Department;
use App\Models\Gallery;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Traits\FileUploader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;


class GalleryController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('gallery.index');
        $gallery = Gallery::withTrashed()->latest()->get();
        return view('backend.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('gallery.create');
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {

        Gate::authorize('gallery.create');
        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/gallery');
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);


        Gallery::create($data);

        flash()->addSuccess('Gallery created successfully');

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('backend.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        Gate::authorize('gallery.edit');
        $departments=Department::orderBy('name', 'ASC')->get();
        $institutes=Institute::orderBy('name', 'ASC')->get();

        return view('backend.gallery.edit', compact('departments', 'institutes','gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        Gate::authorize('gallery.edit');
        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/gallery', $gallery->image);
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);

        if ($request->department_id){
            $data['department_id'] = $request->department_id;
            $data['institute_id'] = null;
        }
        if ($request->institute_id){
            $data['institute_id'] = $request->institute_id;
            $data['department_id'] = null;
        }

        $gallery->update($data);

        flash()->addSuccess('Gallery updated successfully');

        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('gallery.destroy');
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('gallery.destroy');
        $gallery = Gallery::withTrashed()->findOrFail($id);
        $gallery->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('gallery.destroy');
        $gallery = Gallery::onlyTrashed()->where('id', $id)->first();
        if ($gallery->image != null && File::exists(public_path($gallery->image))) {
            File::delete(public_path($gallery->image));
        }
        $gallery->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
