<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuctionCategoryRequest;
use App\Models\AuctionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuctionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('auction-category.index');
        $auction_categories = AuctionCategory::withTrashed()->latest()->get();
        return view('backend.auction_category.index', compact('auction_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('auction-category.create');
        return view('backend.auction_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuctionCategoryRequest $request)
    {

        Gate::authorize('auction-category.create');
        $data = $request->except('_token');

        AuctionCategory::create($data);

        flash()->addSuccess('Gallery Category created successfully');

        return redirect()->route('admin.auction-category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuctionCategory $auction_category)
    {
        Gate::authorize('auction-category.edit');

        return view('backend.auction_category.edit', compact('auction_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuctionCategoryRequest $request, AuctionCategory $auction_category)
    {
        Gate::authorize('auction-category.edit');
        $data = $request->except('_token');

        $auction_category->update($data);

        flash()->addSuccess('Gallery Category updated successfully');

        return redirect()->route('admin.auction-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('auction-category.destroy');
        $auction_category = AuctionCategory::findOrFail($id);
        $auction_category->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('auction-category.destroy');
        $auction_category = AuctionCategory::withTrashed()->findOrFail($id);
        $auction_category->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('auction-category.destroy');
        $auction_category = AuctionCategory::onlyTrashed()->where('id', $id)->first();
        $auction_category->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
