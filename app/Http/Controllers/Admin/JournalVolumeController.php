<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJournalVolumeRequest;
use App\Http\Requests\UpdateJournalVolumeRequest;
use App\Models\Journal;
use App\Models\JournalVolume;
use App\Models\Volume;
use App\Models\VolumeIssue;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;

class JournalVolumeController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('volume-journal.index');
        $journal_volumes = JournalVolume::withTrashed()->latest()->get();
        return view('backend.journal_volume.index', compact('journal_volumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('volume-journal.create');
        $journals = Journal::where('status',1)->orderBy('title', 'ASC')->get();


        return view('backend.journal_volume.create', compact('journals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJournalVolumeRequest $request)
    {

        Gate::authorize('volume-journal.create');
        $data = $request->except('_token');
        if ($request->attachment) {
            $file_url = $this->fileUpload($request->attachment, 'uploads/journal_volume');
            $data['attachment'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);


        JournalVolume::create($data);

        flash()->addSuccess('Journal Books created successfully');

        return redirect()->route('admin.volume-journal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JournalVolume $volume_journal)
    {

        return view('backend.journal_volume.show', compact('volume_journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JournalVolume $volume_journal)
    {

        Gate::authorize('volume-journal.edit');

        $journals = Journal::where('status',1)->orderBy('title', 'ASC')->get();
        $volumes = Volume::where('status',1)->orderBy('title', 'ASC')->where('journal_id',$volume_journal->journal_id)->get();
        $issues = VolumeIssue::where('status',1)->orderBy('title', 'ASC')->where('volume_id',$volume_journal->volume_id)->get();
        return view('backend.journal_volume.edit', compact('volume_journal','journals','volumes','issues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJournalVolumeRequest $request, JournalVolume $volume_journal)
    {
        Gate::authorize('volume-journal.edit');
        $data = $request->except('_token');
        if ($request->attachment) {
            $file_url = $this->fileUpload($request->attachment, 'uploads/journal_volume', $volume_journal->attachment);
            $data['attachment'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);

        $volume_journal->update($data);

        flash()->addSuccess('Journal Books updated successfully');

        return redirect()->route('admin.volume-journal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('volume-journal.destroy');
        $data = JournalVolume::findOrFail($id);
        $data->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('volume-journal.destroy');
        $data = JournalVolume::withTrashed()->findOrFail($id);
        $data->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('volume-journal.destroy');
        $data = JournalVolume::onlyTrashed()->where('id', $id)->first();
        if ($data->attachment != null && File::exists(public_path($data->attachment))) {
            File::delete(public_path($data->attachment));
        }
        $data->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
    public function get_volume()
    {

        $volumes = Volume::where('journal_id',$_GET['id'])->where('status',1)->get();
        return response()->json($volumes);
    }
}
