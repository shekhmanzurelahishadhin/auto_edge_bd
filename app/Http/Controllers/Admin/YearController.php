<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreYearRequest;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('year.index');
        $years = Year::withTrashed()->latest()->get();
        return view('backend.year.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('year.create');
        return view('backend.year.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreYearRequest $request)
    {

        Gate::authorize('year.create');
        $data = $request->except('_token');

        Year::create($data);

        flash()->addSuccess('Vehicle Year created successfully');

        return redirect()->route('admin.year.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        Gate::authorize('year.edit');

        return view('backend.year.edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreYearRequest $request, Year $year)
    {
        Gate::authorize('year.edit');
        $data = $request->except('_token');

        $year->update($data);

        flash()->addSuccess('Vehicle Year updated successfully');

        return redirect()->route('admin.year.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('year.destroy');
        $year = Year::findOrFail($id);
        $year->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('year.destroy');
        $year = Year::withTrashed()->findOrFail($id);
        $year->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('year.destroy');
        $year = Year::onlyTrashed()->where('id', $id)->first();
        $year->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
