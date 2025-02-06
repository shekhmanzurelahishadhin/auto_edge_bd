<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Activity;
use App\Models\Brand;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\FuelType;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Institute;
use App\Models\Logo;
use App\Models\News;
use App\Models\Notice;
use App\Models\PageTitle;
use App\Models\Seminar;
use App\Models\SendMessage;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Subscribe;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }

        return abort(404);
    }

    public function root()
    {
        $data['sliders'] = Slider::where('status',1)->latest()->get(['id','image','title']);
        $data['newses'] = News::where('status',1)->with('admin_created:id,name,image')->latest()->limit(6)->get(['id','title','slug','short_description','image','created_by']);
//        dd($data['newses']);
        $data['brands'] = Brand::where('status',1)->latest()->take(6)->get(['id','image']);
        $data['about'] = AboutUs::latest()->first();
        $data['galleries'] = GalleryCategory::with(['galleries' => function($query) {
            $query->where('status', 1)->latest()->take(10);
        }])->get();
        $data['gallery_categories'] = GalleryCategory::where('status',1)->latest()->take(5)->get(['id','title']);
        $data['vehicles'] = Vehicle::where('status',1)->with('brand:id,title','model:id,title','year:id,title','fuel_type:id,title')->latest()->take(10)->get();


        $data['about_title'] = PageTitle::where('page_code','about_us')->first(['page_title','page_sub_title']);
        $data['featured_vehicle_title'] = PageTitle::where('page_code','featured_vehicles')->first(['page_title','page_sub_title']);
        $data['photo_gallery_title'] = PageTitle::where('page_code','photo_gallery')->first(['page_title','page_sub_title']);
        $data['latest_news_title'] = PageTitle::where('page_code','latest_news')->first(['page_title','page_sub_title']);
        $data['contact_us_title'] = PageTitle::where('page_code','contact_us')->first(['page_title','page_sub_title']);
        $data['subscribe_title'] = PageTitle::where('page_code','subscribe')->first(['page_title','page_sub_title']);
        $data['website_maps'] = Setting::where('name', 'website_maps')->latest()->first();
        return view('frontend.index',$data);
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();

            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time().'.'.$avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = $avatarName;
        }

        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "User Details Updated successfully!"
            // ], 200); // Status code here
            return redirect()->back();
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            // return response()->json([
            //     'isSuccess' => true,
            //     'Message' => "Something went wrong!"
            // ], 200); // Status code here
            return redirect()->back();

        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (! (Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => 'Your Current password does not matches with the password you provided. Please try again.',
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');

                return response()->json([
                    'isSuccess' => true,
                    'Message' => 'Password updated successfully!',
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');

                return response()->json([
                    'isSuccess' => true,
                    'Message' => 'Something went wrong!',
                ], 200); // Status code here
            }
        }
    }

    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }


        try {
            $subscribe = new Subscribe();
            $subscribe->email = $request->email;
            $subscribe->save();

            return response()->json([
                'success' => true,
                'message' => 'Subscribed successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Subscribed Failed.'
            ]);
        }

    }
    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|max:255',
            'phone' => 'nullable|max:255',
            'message' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }


        try {
            $data = $request->except('_token');

            SendMessage::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Message Send successfully.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Message Send Failed.'
            ]);
        }

    }

    public function filterVehicle(Request $request)
    {
        // Start building the query
        $query = Vehicle::where('status', 1);

        // Apply filters dynamically based on the request inputs
        if ($request->keyword !== null) {
            $query->where(function ($q) use ($request) {
                $q->where('title','like', '%' . $request->keyword . '%')
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


        // Execute the query and get the results
        $vehicles = $query->get();

        // Render the view into a string
        $view = view('frontend.vehicle.search-vehicle', compact('vehicles'))->render();

        // Return the view as JSON
        return response()->json(['html' => $view]);
    }

    public function vehiclesByBrand($brand)
    {
        // Decode the Base64 encoded brand ID
        $brandId = base64_decode($brand);

        // Fetch vehicles by decoded brand ID
        $data['vehicles'] = Vehicle::where('brand_id', $brandId)->where('status',1)->with('brand:id,title','model:id,title','year:id,title','fuel_type:id,title')->latest()->paginate(10);

        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;
        $data['featured_vehicle_title'] = PageTitle::where('page_code','featured_vehicles')->first(['page_title','page_sub_title']);
        $data['brands'] = Brand::where('status',1)->get(['id','title','slug']);
        $data['years'] = Year::where('status',1)->latest()->get(['id','title']);
        $data['fuel_types'] = FuelType::latest()->get(['id','title']);
        $data['searched_brand'] = $brandId;

        return view('frontend.vehicle.vehicle',$data);
    }

    public function vehiclesByYear($year)
    {
        // Decode the Base64 encoded brand ID
        $yearId = base64_decode($year);

        // Fetch vehicles by decoded brand ID
        $data['vehicles'] = Vehicle::where('year_id', $yearId)->where('status',1)->with('brand:id,title','model:id,title','year:id,title','fuel_type:id,title')->latest()->paginate(10);

        $banner = Logo::latest()->first(['page_banner']);
        $data['banner'] = $banner->page_banner;
        $data['featured_vehicle_title'] = PageTitle::where('page_code','featured_vehicles')->first(['page_title','page_sub_title']);
        $data['brands'] = Brand::where('status',1)->get(['id','title','slug']);
        $data['years'] = Year::where('status',1)->latest()->get(['id','title']);
        $data['fuel_types'] = FuelType::latest()->get(['id','title']);
        $data['searched_year'] = $yearId;

        return view('frontend.vehicle.vehicle',$data);
    }

}
