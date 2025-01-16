<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Department;
use App\Models\Institute;
use App\Models\News;
use App\Traits\FileUploader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('news.index');
        $news = News::withTrashed()->latest()->get();

        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('news.create');

        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        Gate::authorize('news.create');
        $news = new News();
        $news->title = $request->title;
        $news->slug = str_slug($request->title);
        $news->short_description = $request->short_description;
        $news->description = $request->description;
        $news->published_at = $request->published_at;
        $news->status = $request->status;
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/news');
            $news->image = $file_url;
        }
        $news->save();
        flash()->addSuccess('News create successfully');

        return to_route('admin.news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('backend.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        Gate::authorize('news.edit');
        $data['news'] = $news;

        return view('backend.news.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        Gate::authorize('news.edit');
        $news->title = $request->title;
        $news->slug = str_slug($request->title);
        $news->short_description = $request->short_description;
        $news->description = $request->description;
//        $news->published_at = $request->published_at;
        $news->status = $request->status;
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/news', $news->image);
            $news->image = $file_url;
        }
        $news->save();
        flash()->addSuccess('News edit successfully');

        return to_route('admin.news.index');
    }

    public function trash($id)
    {
        Gate::authorize('news.destroy');
        $news = News::findOrFail($id);
        $news->delete();
        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('news.destroy');
        $news = News::withTrashed()->findOrFail($id);
        $news->restore();
        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('news.destroy');
        $news = News::onlyTrashed()->where('id', $id)->first();
        if ($news->image != null && File::exists(public_path($news->image))) {
            File::delete(public_path($news->image));
        }
        $news->forceDelete();
        flash()->addSuccess('News delete successfully');

        return redirect()->back();
    }
}
