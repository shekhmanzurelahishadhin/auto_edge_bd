<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJournalVolumeRequest;
use App\Http\Requests\StoreVolumeIssueRequest;
use App\Http\Requests\UpdateJournalVolumeRequest;
use App\Http\Requests\UpdateVolumeIssueRequest;
use App\Models\Journal;
use App\Models\JournalVolume;
use App\Models\Volume;
use App\Models\VolumeIssue;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class VolumeIssueController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('volume-issue.index');
        $volume_issues = VolumeIssue::withTrashed()->latest()->get();
        return view('backend.volume_issue.index', compact('volume_issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('volume-issue.create');
        $journals = Journal::where('status',1)->orderBy('title', 'ASC')->get();


        return view('backend.volume_issue.create', compact('journals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVolumeIssueRequest $request)
    {

        Gate::authorize('volume-issue.create');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);


        VolumeIssue::create($data);

        flash()->addSuccess('Issue created successfully');

        return redirect()->route('admin.volume-issue.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(VolumeIssue $volume_issue)
    {

        return view('backend.volume_issue.show', compact('volume_issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VolumeIssue $volume_issue)
    {

        Gate::authorize('volume-issue.edit');

        $journals = Journal::where('status',1)->orderBy('title', 'ASC')->get();
        $volumes = Volume::where('status',1)->orderBy('title', 'ASC')->where('journal_id',$volume_issue->journal_id)->get();
        return view('backend.volume_issue.edit', compact('volume_issue','journals','volumes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVolumeIssueRequest $request, VolumeIssue $volume_issue)
    {
        Gate::authorize('volume-issue.edit');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);

        $volume_issue->update($data);

        flash()->addSuccess('Issue updated successfully');

        return redirect()->route('admin.volume-issue.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('volume-issue.destroy');
        $data = VolumeIssue::findOrFail($id);
        $data->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('volume-issue.destroy');
        $data = VolumeIssue::withTrashed()->findOrFail($id);
        $data->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('volume-issue.destroy');
        $data = VolumeIssue::onlyTrashed()->where('id', $id)->first();
        $data->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
    public function get_issue()
    {

        $issues = VolumeIssue::where('volume_id',$_GET['id'])->where('status',1)->get();
        return response()->json($issues);
    }
}
