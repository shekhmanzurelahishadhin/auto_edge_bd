<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Books;
use App\Models\BusShift;
use App\Models\BusStaff;
use App\Models\Career;
use App\Models\CitizenCharter;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\Goal;
use App\Models\Institute;
use App\Models\InstitutionalMember;
use App\Models\LibraryInfo;
use App\Models\Logo;
use App\Models\Member;
use App\Models\News;
use App\Models\PageTitle;
use App\Models\PostGraduate;
use App\Models\Publication;
use App\Models\ResourceInfo;
use App\Models\Scholarship;
use App\Models\TuitionFee;
use App\Models\UnderGraduate;
use App\Models\VcGallery;
use App\Models\VcSlider;
use App\Models\VcSpeech;
use App\Models\ViceChancellorInfo;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{

    public function gallery()
    {
        $data['page_title'] = 'Gallery';
        $data['galleries'] = Gallery::where('status',1)->latest()->paginate(9);
        return view('frontend.gallery',$data);
    }

    public function about()
    {
        $data['about'] = AboutUs::latest()->first();
        $data['title'] = PageTitle::where('page_code','about_us')->first(['page_title','page_sub_title']);
        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;

        return view('frontend.about',$data);
    }
    public function news()
    {
        $data['newses'] = News::where('status',1)->with('admin_created:id,name,image')->latest()->select('id','title','slug','short_description','image','created_by')->paginate(10);
        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;

        return view('frontend.news',$data);
    }

    public function news_show($newsSlug)
    {
        $data['news'] = News::where('status',1)->where('slug',$newsSlug)->first();
        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;
        return view('frontend.news.show', $data);
    }

    public function contact()
    {
        $data['page_title'] = 'Contact';
        return view('frontend.contact',$data);
    }

}
