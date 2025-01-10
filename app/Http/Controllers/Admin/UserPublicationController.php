<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\Department;
use App\Models\Institute;
use App\Models\Publication;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class UserPublicationController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        Gate::authorize('publication.create');
        $data['departments'] = Department::get();
        $data['user_id'] = $id;
        $data['institutes'] = Institute::get();

        return view('backend.user_publication.create_user_publication', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicationRequest $request)
    {

        Gate::authorize('publication.create');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        $data['department_id'] = $request->department ?? null;
        $data['institute_id'] = $request->institute ?? null;
        if ($request->attachment_file) {
            $file_url = $this->fileUpload($request->attachment_file, 'uploads/publication');
            $data['attachment'] = $file_url;
        }
        Publication::create($data);
        flash()->addSuccess('Publication create successfully');

        return redirect()->route('admin.userProfile.edit',$request->user_id);

    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $user_publication)
    {
        $publication = $user_publication;
        return view('backend.user_publication.show_user_publication', compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $user_publication)
    {
        Gate::authorize('publication.edit');
        $data['departments'] = Department::get();
        $data['institutes'] = Institute::get();
        $data['publication'] = $user_publication;

        return view('backend.user_publication.edit_user_publication', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request, Publication $user_publication)
    {
        Gate::authorize('publication.edit');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);

        if ($request->department) {
            $data['department_id'] = $request->department;
            $data['institute_id'] = null;
        }
        if ($request->institute) {
            $data['institute_id'] = $request->institute;
            $data['department_id'] = null;
        }

        if ($request->attachment_file) {
            $file_url = $this->fileUpload($request->attachment_file, 'uploads/publication', $user_publication->attachment);
            $data['attachment'] = $file_url;
        }
        $user_publication->update($data);
        flash()->addSuccess('Publication updated successfully');

        return redirect()->route('admin.userProfile.edit',$request->user_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('publication.destroy');
        $publication = Publication::findOrFail($id);
        $publication->delete();
        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('publication.destroy');
        $publication = Publication::withTrashed()->findOrFail($id);
        $publication->restore();
        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('publication.destroy');
        $publication = Publication::onlyTrashed()->where('id', $id)->first();
        if ($publication->attachment != null && File::exists(public_path($publication->attachment))) {
            File::delete(public_path($publication->attachment));
        }
        $publication->forceDelete();
        flash()->addSuccess('Delete successfully');

        return redirect()->back();
    }


}
