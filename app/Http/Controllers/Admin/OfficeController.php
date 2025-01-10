<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Models\Office;
use App\Traits\FileUploader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OfficeController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('office.index');
        $office_id = Auth::guard('admin')->user()->office_id;
        if ($office_id != null) {
            $data['offices'] = Office::withTrashed()->where('id', $office_id)->get();
        }
        else{
            $data['offices'] = Office::withTrashed()->get();
        }


        return view('backend.office.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('office.create');

        return view('backend.office.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfficeRequest $request)
    {
        Gate::authorize('office.create');
        $data = $request->validated();
        $data['slug'] = str_slug($request->name);
        $office = Office::create($data);
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/office');
            $office->image = $file_url;
        }
        $office->save();
        flash()->addSuccess('Office create successfully');

        return to_route('admin.office.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $office = Office::where('slug', $slug)->first();

        return view('backend.office.office_overview', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Office $office)
    {
        Gate::authorize('office.edit');

        return view('backend.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfficeRequest $request, Office $office)
    {
        Gate::authorize('office.edit');
        $data = $request->validated();
        $data['slug'] = str_slug($request->name);
        $office->update($data);
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/office', $office->image);
            $office->image = $file_url;
        }
        $office->save();
        flash()->addSuccess('Office update successfully');

        return to_route('admin.office.index');
    }

    public function trash($id)
    {
        Gate::authorize('office.destroy');
        $office = Office::findOrFail($id);
        $office->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('office.destroy');
        $office = Office::withTrashed()->findOrFail($id);
        $office->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('office.destroy');
        $office = Office::onlyTrashed()->where('id', $id)->first();
        $office->forceDelete();
        flash()->addSuccess('Office delete successfully');

        return to_route('admin.office.index');
    }
}
