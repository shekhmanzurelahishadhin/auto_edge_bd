<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageTitleRequest;
use App\Models\Lookup;
use App\Models\News;
use App\Models\PageTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('page-title.index');
        $pages = PageTitle::withTrashed()->latest()->with('page')->get();
        return view('backend.page_title.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('page-title.create');
        $page_types = Lookup::where('type','title_page')->latest()->get();
        return view('backend.page_title.create',compact('page_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageTitleRequest $request)
    {
        Gate::authorize('page-title.create');
        $data = $request->except('_token');
        PageTitle::updateOrCreate(
            ['page_code' => $request->page_code],
            $data
        );

        flash()->addSuccess('Title created successfully');

        return redirect()->route('admin.page-title.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {

        return view('backend.page_title.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        Gate::authorize('page-title.edit');


        return view('backend.page_title.edit', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJournalRequest $request, Journal $journal)
    {
        Gate::authorize('page-title.edit');
        $data = $request->except('_token');
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/journal', $journal->image);
            $data['image'] = $file_url;
        }
        $data['slug'] = str_slug($request->title);

        $journal->update($data);

        flash()->addSuccess('Journal updated successfully');

        return redirect()->route('admin.page-title.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('page-title.destroy');
        $data = PageTitle::findOrFail($id);
        $data->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('page-title.destroy');
        $data = PageTitle::withTrashed()->findOrFail($id);
        $data->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('page-title.destroy');
        $data = PageTitle::onlyTrashed()->where('id', $id)->first();
        $data->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
