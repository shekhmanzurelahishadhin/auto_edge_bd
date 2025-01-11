<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutUsRequest;
use App\Models\AboutUs;
use App\Models\LibraryInfo;
use App\Models\Logo;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class AboutUsController extends Controller
{
    use FileUploader;


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('about.create');

        $about = AboutUs::latest()->first();
        return view('backend.about.create',compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutUsRequest $request)
    {

        Gate::authorize('about.create');
        $about = AboutUs::latest()->first();
        if ($request->hasFile('image')){

            $file = $request->file('image');
            $file_name = time().rand(0000,9999).'.'.$file->getClientoriginalExtension();
            if(isset($about->image) && file_exists($about->image)){
                unlink($about->image);
            }
            $file->move('uploads/about/',$file_name);

            AboutUs::updateOrCreate(
                ['title' => 'about_us'],
                [
                    'title' => 'about_us',
                    'short_details' => $request->short_details,
                    'long_details' => $request->long_details,
                    'image'=>'uploads/about/' . $file_name
                ]
            );
        }
        flash()->addSuccess('About Us Updated Successfully');
        return back();
    }

}
