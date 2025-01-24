<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuctionAboutRequest;
use App\Models\AuctionAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AboutAuctionController extends Controller
{
    public function create()
    {
        Gate::authorize('auction-about.create');

        $about = AuctionAbout::latest()->first();
        return view('backend.auction_about.create',compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuctionAboutRequest $request)
    {

        Gate::authorize('auction-about.create');
        $about = AuctionAbout::latest()->first();
        AuctionAbout::updateOrCreate(
            ['key_title' => 'auction_about'],
            [
                'key_title' => 'auction_about',
                'title' => $request->title,
                'example_title' => $request->example_title,
                'result_title' => $request->result_title,
                'details' => $request->details,
                'disclaimer' => $request->disclaimer,
            ]
        );
        flash()->addSuccess('Data Saved Successfully');
        return back();
    }
}
