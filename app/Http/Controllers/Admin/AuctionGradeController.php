<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuctionGradeRequest;
use App\Models\AuctionCategory;
use App\Models\AuctionGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuctionGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('auction-grade.index');
        $auction_grades = AuctionGrade::withTrashed()->latest()->get();
        return view('backend.auction_grade.index', compact('auction_grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('auction-grade.create');
        $auction_categories = AuctionCategory::latest()->get(['id','title']);
        return view('backend.auction_grade.create',compact('auction_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuctionGradeRequest $request)
    {

        Gate::authorize('auction-grade.create');
        $data = $request->except('_token');

        AuctionGrade::create($data);

        flash()->addSuccess('Auction Grade created successfully');

        return redirect()->route('admin.auction-grade.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuctionGrade $auction_grade)
    {
        Gate::authorize('auction-grade.edit');
        $auction_categories = AuctionCategory::latest()->get(['id','title']);
        return view('backend.auction_grade.edit', compact('auction_grade','auction_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuctionGradeRequest $request, AuctionGrade $auction_grade)
    {
        Gate::authorize('auction-grade.edit');
        $data = $request->except('_token');

        $auction_grade->update($data);

        flash()->addSuccess('Auction Grade updated successfully');

        return redirect()->route('admin.auction-grade.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('auction-grade.destroy');
        $auction_grade = AuctionGrade::findOrFail($id);
        $auction_grade->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('auction-grade.destroy');
        $auction_grade = AuctionGrade::withTrashed()->findOrFail($id);
        $auction_grade->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('auction-grade.destroy');
        $auction_grade = AuctionGrade::onlyTrashed()->where('id', $id)->first();
        $auction_grade->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
