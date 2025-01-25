<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuctionSheetRequest;
use App\Models\AuctionSheet;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class AuctionSheetController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('auction-sheet.index');
        $auction_sheets = AuctionSheet::withTrashed()->latest()->get();
        return view('backend.auction_sheet.index', compact('auction_sheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('auction-sheet.create');
        return view('backend.auction_sheet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuctionSheetRequest $request)
    {

        Gate::authorize('auction-sheet.create');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/auction_sheet');
            $data['image'] = $file_url;
        }

        AuctionSheet::create($data);

        flash()->addSuccess('AuctionSheet created successfully');

        return redirect()->route('admin.auction-sheet.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AuctionSheet $auction_sheet)
    {
        return view('backend.auction_sheet.show', compact('auction_sheet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuctionSheet $auction_sheet)
    {
        Gate::authorize('auction-sheet.edit');
        return view('backend.auction_sheet.edit', compact('auction_sheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuctionSheetRequest $request, AuctionSheet $auction_sheet)
    {
        Gate::authorize('auction-sheet.edit');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/auction_sheet', $auction_sheet->image);
            $data['image'] = $file_url;
        }

        $auction_sheet->update($data);

        flash()->addSuccess('AuctionSheet updated successfully');

        return redirect()->route('admin.auction-sheet.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('auction-sheet.destroy');
        $auction_sheet = AuctionSheet::findOrFail($id);
        $auction_sheet->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('auction-sheet.destroy');
        $auction_sheet = AuctionSheet::withTrashed()->findOrFail($id);
        $auction_sheet->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('auction-sheet.destroy');
        $auction_sheet = AuctionSheet::onlyTrashed()->where('id', $id)->first();
        if ($auction_sheet->image != null && File::exists(public_path($auction_sheet->image))) {
            File::delete(public_path($auction_sheet->image));
        }
        $auction_sheet->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
