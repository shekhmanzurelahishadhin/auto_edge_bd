<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentChairmanRequest;
use App\Http\Requests\StoreOfficeHeadRequest;
use App\Http\Requests\UpdateDepartmentChairmanRequest;
use App\Http\Requests\UpdateOfficeHeadRequest;
use App\Models\Department;
use App\Models\DepartmentChairman;
use App\Models\Office;
use App\Models\OfficeHead;
use App\Models\User;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class OfficeHeadController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('head-office.index');

        $office_id = Auth::guard('admin')->user()->office_id;
        if ($office_id != null) {
            $heads = OfficeHead::withTrashed()->with('office')->where('office_id', $office_id)->latest()->get();
        }
        else{
            $heads = OfficeHead::withTrashed()->with('office')->latest()->get();
        }


        return view('backend.office_head.index', compact('heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('head-office.create');
        $offices = Office::orderBy('name', 'ASC')->get();

        return view('backend.office_head.create', compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfficeHeadRequest $request)
    {
        Gate::authorize('head-office.create');

        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/office_head');
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->name);

        $checkUser = User::where('email', $request->email)->first();
        if ($checkUser){
            $data['user_id'] = $checkUser->id;
        }
        else{
            $user = create_user($request->name, $request->phone, $request->email);
            $data['user_id'] = $user->id;
        }

        OfficeHead::create($data);
        flash()->addSuccess('Office Head created successfully');

        return redirect()->route('admin.head-office.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficeHead $head_office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficeHead $head_office)
    {
        Gate::authorize('head-office.edit');
        $offices = Office::orderBy('name', 'ASC')->get();

        return view('backend.office_head.edit', compact('head_office', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfficeHeadRequest $request, OfficeHead $head_office)
    {
        Gate::authorize('head-office.edit');
        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/office_head', $head_office->image);
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->name);
        if ($request->office_id){
            $data['office_id'] = $request->office_id;
        }

        update_user($head_office->user_id, $request->name, $request->phone, $request->email );
        $head_office->update($data);

        flash()->addSuccess('Office Head updated successfully');

        return redirect()->route('admin.head-office.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('head-office.destroy');
        $office_head = OfficeHead::findOrFail($id);
        $office_head->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('head-office.destroy');
        $office_head = OfficeHead::withTrashed()->findOrFail($id);
        $office_head->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('head-office.destroy');
        $office_head = OfficeHead::onlyTrashed()->where('id', $id)->first();
        if ($office_head->image != null && File::exists(public_path($office_head->image))) {
            File::delete(public_path($office_head->image));
        }
        $office_head->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
