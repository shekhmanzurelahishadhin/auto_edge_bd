<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResearchRequest;
use App\Http\Requests\UpdateResearchRequest;
use App\Models\Department;
use App\Models\Institute;
use App\Models\Research;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserResearchController extends Controller
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
        Gate::authorize('research.create');
        $data['departments'] = Department::get();
        $data['institutes'] = Institute::get();
        $data['user_id'] = $id;

        return view('backend.user_research.create_user_research', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResearchRequest $request)
    {

        Gate::authorize('research.create');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        $data['department_id'] = $request->department ?? null;
        $data['institute_id'] = $request->institute ?? null;
        Research::create($data);
        flash()->addSuccess('Research create successfully');

        return redirect()->route('admin.userProfile.edit',$request->user_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Research $user_research)
    {
        return view('backend.user_research.show_user_research', compact('user_research'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $user_research)
    {
        Gate::authorize('research.edit');
        $data['departments'] = Department::get();
        $data['institutes'] = Institute::get();
        $data['research'] = $user_research;

        return view('backend.user_research.edit_user_research', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResearchRequest $request, Research $user_research)
    {
        Gate::authorize('research.edit');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);

        if ($request->department){
            $data['department_id'] = $request->department;
            $data['institute_id'] = null;
        }
        if ($request->institute){
            $data['institute_id'] = $request->institute;
            $data['department_id'] = null;
        }
        $user_research->update($data);
        flash()->addSuccess('Research updated successfully');

        return redirect()->route('admin.userProfile.edit',$request->user_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('research.destroy');
        $research = Research::findOrFail($id);
        $research->delete();
        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('research.destroy');
        $research = Research::withTrashed()->findOrFail($id);
        $research->restore();
        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('research.destroy');
        $research = Research::onlyTrashed()->where('id', $id)->first();
        $research->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
