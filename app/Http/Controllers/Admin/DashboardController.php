<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\Institute;
use App\Models\Office;
use App\Models\Publication;
use App\Models\Research;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
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

    public function index()
    {
        $data['events'] = Event::where('status',1)->latest()->limit(6)->get();
        return view('backend.dashboard.admin_dashboard',$data);

    }
}
