<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBiddingResultRequest;
use App\Models\BiddingResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BiddingResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('bidding-result.index');
        $bidding_results = BiddingResult::withTrashed()->latest()->get();
        return view('backend.bidding_result.index', compact('bidding_results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('bidding-result.create');
        return view('backend.bidding_result.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBiddingResultRequest $request)
    {

        Gate::authorize('bidding-result.create');
        $data = $request->except('_token');

        BiddingResult::create($data);

        flash()->addSuccess('Bidding Result created successfully');

        return redirect()->route('admin.bidding-result.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BiddingResult $bidding_result)
    {
        Gate::authorize('bidding-result.edit');

        return view('backend.bidding_result.edit', compact('bidding_result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBiddingResultRequest $request, BiddingResult $bidding_result)
    {
        Gate::authorize('bidding-result.edit');
        $data = $request->except('_token');

        $bidding_result->update($data);

        flash()->addSuccess('Bidding Result updated successfully');

        return redirect()->route('admin.bidding-result.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('bidding-result.destroy');
        $bidding_result = BiddingResult::findOrFail($id);
        $bidding_result->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('bidding-result.destroy');
        $bidding_result = BiddingResult::withTrashed()->findOrFail($id);
        $bidding_result->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('bidding-result.destroy');
        $bidding_result = BiddingResult::onlyTrashed()->where('id', $id)->first();
        $bidding_result->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
