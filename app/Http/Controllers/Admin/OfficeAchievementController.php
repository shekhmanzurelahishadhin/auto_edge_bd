<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\StoreOfficeAchievementRequest;
use App\Http\Requests\StoreOfficeProjectRequest;
use App\Http\Requests\UpdateOfficeAchievementRequest;
use App\Http\Requests\UpdateOfficeProjectRequest;
use App\Models\OfficeAchievement;
use App\Models\OfficeProject;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class OfficeAchievementController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        Gate::authorize('office-achievement.index');
        $achievements = OfficeAchievement::withTrashed()->with('office')->where('office_id',$id)->latest()->get();

        return view('backend.office_achievement.index', compact('achievements','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        Gate::authorize('office-achievement.create');

        return view('backend.office_achievement.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOfficeAchievementRequest $request)
    {
        Gate::authorize('office-achievement.create');

        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/office_achievement');
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);


        OfficeAchievement::create($data);
        flash()->addSuccess('Office Achievement created successfully');

        return redirect()->route('admin.office-achievement.index',$request->office_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficeAchievement $office_achievement)
    {
        return view('backend.office_achievement.show', compact('office_achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficeAchievement $office_achievement)
    {
        Gate::authorize('office-achievement.edit');


        return view('backend.office_achievement.edit', compact('office_achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfficeAchievementRequest $request, OfficeAchievement $office_achievement)
    {
        Gate::authorize('office-achievement.edit');

        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/office_achievement', $office_achievement->image);
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);

        $office_achievement->update($data);

        flash()->addSuccess('Office Achievement updated successfully');

        return redirect()->route('admin.office-achievement.index',$request->office_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('office-achievement.destroy');
        $office_achievement = OfficeAchievement::findOrFail($id);
        $office_achievement->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('office-achievement.destroy');
        $office_achievement = OfficeAchievement::withTrashed()->findOrFail($id);
        $office_achievement->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('office-achievement.destroy');
        $office_achievement = OfficeAchievement::onlyTrashed()->where('id', $id)->first();
        if ($office_achievement->image != null && File::exists(public_path($office_achievement->image))) {
            File::delete(public_path($office_achievement->image));
        }
        $office_achievement->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }

}
