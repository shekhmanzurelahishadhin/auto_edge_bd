<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficeHeadRequest;
use App\Http\Requests\StoreOfficeProjectRequest;
use App\Http\Requests\UpdateOfficeHeadRequest;
use App\Http\Requests\UpdateOfficeProjectRequest;
use App\Models\Office;
use App\Models\OfficeHead;
use App\Models\OfficeProject;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class OfficeProjectController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        Gate::authorize('office-project.index');
        $projects = OfficeProject::withTrashed()->with('office')->where('office_id',$id)->latest()->get();

        return view('backend.office_project.index', compact('projects','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        Gate::authorize('office-project.create');

        return view('backend.office_project.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfficeProjectRequest $request)
    {
        Gate::authorize('office-project.create');

        $data = $request->except('_token');
        if ($request->attachment_file) {
            $file_url = $this->fileUpload($request->attachment_file, 'uploads/office_project');
            $data['attachment'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);


        OfficeProject::create($data);
        flash()->addSuccess('Office Project created successfully');

        return redirect()->route('admin.office-project.index',$request->office_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficeProject $office_project)
    {
        return view('backend.office_project.show', compact('office_project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficeProject $office_project)
    {
        Gate::authorize('office-project.edit');


        return view('backend.office_project.edit', compact('office_project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfficeProjectRequest $request, OfficeProject $office_project)
    {
        Gate::authorize('office-project.edit');

        $data = $request->except('_token');
        if ($request->attachment_file) {
            $file_url = $this->fileUpload($request->attachment_file, 'uploads/office_project', $office_project->attachment);
            $data['attachment'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);

        $office_project->update($data);

        flash()->addSuccess('Office Project updated successfully');

        return redirect()->route('admin.office-project.index',$request->office_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('office-project.destroy');
        $office_project = OfficeProject::findOrFail($id);
        $office_project->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('office-project.destroy');
        $office_project = OfficeProject::withTrashed()->findOrFail($id);
        $office_project->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('office-project.destroy');
        $office_project = OfficeProject::onlyTrashed()->where('id', $id)->first();
        if ($office_project->attachment != null && File::exists(public_path($office_project->attachment))) {
            File::delete(public_path($office_project->attachment));
        }
        $office_project->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }

}
