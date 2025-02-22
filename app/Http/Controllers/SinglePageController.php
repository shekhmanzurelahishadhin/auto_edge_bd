<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AuctionAbout;
use App\Models\AuctionCategory;
use App\Models\AuctionSheet;
use App\Models\BiddingResult;
use App\Models\Books;
use App\Models\Brand;
use App\Models\BusShift;
use App\Models\BusStaff;
use App\Models\Career;
use App\Models\CitizenCharter;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\FuelType;
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
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\ViceChancellorInfo;
use App\Models\Year;
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
        $data['latest_news_title'] = PageTitle::where('page_code','latest_news')->first(['page_title','page_sub_title']);

        return view('frontend.news',$data);
    }

    public function newsShow($newsSlug)
    {
        $data['news'] = News::where('status',1)->where('slug',$newsSlug)->first();
        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;
        $data['latest_news_title'] = PageTitle::where('page_code','latest_news')->first(['page_title','page_sub_title']);
        return view('frontend.news.show', $data);
    }

    public function auctionSheetGuide()
    {
        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;
        $data['auction_sheet_guide_title'] = PageTitle::where('page_code','auction_sheet_guide')->first(['page_title','page_sub_title']);
        $data['about_auction'] = AuctionAbout::latest()->first();
        $data['bidding_results'] = BiddingResult::where('status',1)->get(['id','outcomes','outcomes_status']);
        $data['auction_sheets'] = AuctionSheet::where('status',1)->get(['id','title','image']);
        $data['auction_categories'] = AuctionCategory::where('status',1)->with('grades')->get();
//        dd($data['auction_grades']);

        return view('frontend.auction-sheet-guide',$data);
    }

    public function contact()
    {
        $data['page_title'] = 'Contact';
        return view('frontend.contact',$data);
    }

    public function vehicles()
    {
        $data['vehicles'] = Vehicle::where('status',1)->with('brand:id,title','model:id,title','year:id,title','fuel_type:id,title')->latest()->take(6)->orderBy('id','desc')->get();

        $banner = Logo::latest()->first(['page_banner']);
        $data['total_vehicles_count'] = Vehicle::where('status',1)->count();
        $data['banner'] = $banner->page_banner;
        $data['featured_vehicle_title'] = PageTitle::where('page_code','featured_vehicles')->first(['page_title','page_sub_title']);
        $data['brands'] = Brand::where('status',1)->get(['id','title','slug']);
        $data['years'] = Year::where('status',1)->latest()->get(['id','title']);
        $data['fuel_types'] = FuelType::latest()->get(['id','title']);

        return view('frontend.vehicle.vehicle',$data);
    }

    public function vehiclesShow($vehicleSlug)
    {
        $vehicle = Vehicle::where('status',1)->where('slug',$vehicleSlug)->first();
        $data['vehicle'] = $vehicle;
        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;
        $data['related_vehicles'] = Vehicle::where('status',1)->where('brand_id',$vehicle->brand_id)->take(10)->get();
        $data['featured_vehicle_title'] = PageTitle::where('page_code','featured_vehicles')->first(['page_title','page_sub_title']);

        return view('frontend.vehicle.vehicle-show', $data);
    }

    public function vehiclesCompare($vehicleSlug)
    {
        $vehicle = Vehicle::where('status',1)->where('slug',$vehicleSlug)->first();
        $data['vehicle'] = $vehicle;
        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;
        $data['compare_vehicle_title'] = PageTitle::where('page_code','compare_vehicles')->first(['page_title','page_sub_title']);

        return view('frontend.vehicle.vehicle-compare', $data);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $vehicles = Vehicle::with(['brand', 'model', 'year', 'fuel_type'])
            ->where('title', 'like', "%$query%")
            ->orWhereHas('brand', function ($q) use ($query) {
                $q->where('title', 'like', "%$query%");
            })
            ->orWhereHas('model', function ($q) use ($query) {
                $q->where('title', 'like', "%$query%");
            })
            ->take(10)->get();
        return response()->json($vehicles);
    }

    public function vehicleSearchResult($id)
    {
        $vehicle = Vehicle::with(['brand', 'model', 'year', 'fuel_type'])->findOrFail($id);
        return response()->json($vehicle);
    }

    public function loadMore(Request $request)
    {
        $offset = $request->offset ?? 0;
        // Start building the query
        $query = Vehicle::where('status', 1)->with('brand:id,title', 'model:id,title', 'year:id,title', 'fuel_type:id,title');

        // Apply filters dynamically if they exist
        if ($request->keyword !== null) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->keyword . '%')
                    ->orWhere('short_description', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->brand_id !== null) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->model_id !== null) {
            $query->where('model_id', $request->model_id);
        }

        if ($request->year_id !== null) {
            $query->where('year_id', $request->year_id);
        }

        if ($request->fuel_type_id !== null) {
            $query->where('fuel_type_id', $request->fuel_type_id);
        }
        // Fetch next set of vehicles using offset and limit (latest first)
        $vehicles = $query->orderBy('id', 'desc')->skip($offset)->take(6)->get();


        $html = '';
        foreach ($vehicles as $vehicle) {
            $html .= view('frontend.vehicle.partials', compact('vehicle'))->render();
        }

        return response()->json([
            'vehicles' => $html,
        ]);
    }


    public function getModelByBrandId()
    {
        $models = VehicleModel::where('brand_id',$_GET['id'])->where('status',1)->get(['id','brand_id','title']);
        return response()->json($models);
    }

}
