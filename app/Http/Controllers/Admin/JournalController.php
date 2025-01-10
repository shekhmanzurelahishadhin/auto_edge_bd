<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\StoreJournalRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\UpdateJournalRequest;
use App\Models\Books;
use App\Models\Journal;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class JournalController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('journal.index');
        $journals = Journal::withTrashed()->latest()->get();
        return view('backend.journal.index', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('journal.create');
        return view('backend.journal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJournalRequest $request)
    {


        Gate::authorize('journal.create');
        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/journal');
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);


        Journal::create($data);

        flash()->addSuccess('Journal created successfully');

        return redirect()->route('admin.journal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {

        return view('backend.journal.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        Gate::authorize('journal.edit');


        return view('backend.journal.edit', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJournalRequest $request, Journal $journal)
    {
        Gate::authorize('journal.edit');
        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/journal', $journal->image);
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);

        $journal->update($data);

        flash()->addSuccess('Journal updated successfully');

        return redirect()->route('admin.journal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('journal.destroy');
        $data = Journal::findOrFail($id);
        $data->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('journal.destroy');
        $data = Journal::withTrashed()->findOrFail($id);
        $data->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('journal.destroy');
        $data = Journal::onlyTrashed()->where('id', $id)->first();
        if ($data->image != null && File::exists(public_path($data->image))) {
            File::delete(public_path($data->image));
        }
        $data->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
