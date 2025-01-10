<?php

namespace App\Http\Controllers;

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
use App\Models\Member;
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
    public function chancellor()
    {
        $data['page_title'] = 'VC Secretariat';
        $data['sliders'] = VcSlider::where('status',1)->latest()->get();
        $data['galleries'] = VcGallery::where('status',1)->latest()->get();
        $data['speeches'] = VcSpeech::where('status',1)->latest()->get();

        return view('frontend.vc', $data);
    }

    public function treasurer()
    {
        $data['page_title'] = 'Treasurer';
        return view('frontend.treasurer', $data);
    }

    public function overview()
    {
        $data['page_title'] = 'Overview';
        $data['goals'] = Goal::where('status',1)->latest()->get();
        $data['institutional_members'] = InstitutionalMember::where('status',1)->latest()->get();
        $data['members'] = Member::where('status',1)->latest()->get();

        return view('frontend.overview',$data);
    }

    public function glance()
    {
        $data['page_title'] = 'At A Glance';
        return view('frontend.glance',$data);
    }

    public function resources()
    {
        $data['page_title'] = 'Resources';
        $data['resources'] = ResourceInfo::with('galleries')->where('status',1)->get();

        return view('frontend.resources',$data);
    }

    public function organogram()
    {
        $data['page_title'] = 'Organogram';
        return view('frontend.organogram',$data);
    }

    public function act()
    {
        $data['page_title'] = 'Act & Rules';
        return view('frontend.act',$data);
    }

    public function gallery()
    {
        $data['page_title'] = 'Gallery';
        $data['galleries'] = Gallery::where('status',1)->latest()->paginate(9);
        return view('frontend.gallery',$data);
    }

    public function campus()
    {
        $data['page_title'] = 'Campus Map';
        return view('frontend.campus',$data);
    }

    public function monogram()
    {
        $data['page_title'] = 'Monogram';
        return view('frontend.monogram',$data);
    }

    public function citizen()
    {
        $data['page_title'] = 'Citizens Charter';
        $data['citizens'] = CitizenCharter::with('department','institute')->where('status',1)->latest()->paginate(10);
        return view('frontend.citizen', $data);
    }


    public function contact()
    {
        $data['page_title'] = 'Contact';
        return view('frontend.contact',$data);
    }

    public function undergraduate()
    {
        $data['page_title'] = 'Undergraduate Admission';
        $data['under_graduates'] = UnderGraduate::where('status',1)->where('type',1)->latest()->paginate(10);
        $data['links'] = UnderGraduate::where('status',1)->where('type',0)->latest()->paginate(10);
        return view('frontend.admission.undergraduate',$data);
    }

    public function postgraduate()
    {
        $data['page_title'] = 'Postgraduate Admission';
        $data['post_graduates'] = PostGraduate::where('status',1)->where('type',1)->latest()->paginate(10);
        $data['links'] = PostGraduate::where('status',1)->where('type',0)->latest()->paginate(10);
        return view('frontend.admission.postgraduate',$data);
    }

    public function library(Request $request)
    {
        $data['page_title'] = 'Central Library';
        $data['about'] = LibraryInfo::where('name', 'library_about')->latest()->first();
        $data['contact'] = LibraryInfo::where('name', 'library_contact')->latest()->first();
        $data['books'] = Books::where('status',1)->latest()->get();
        if ($request->search){
            $data['books'] = Books::where('status',1)->where('title','like', '%' .$request->search. '%')->latest()->get();
        }

        return view('frontend.library',$data);
    }

    public function career()
    {
        $data['page_title'] = 'Career Opportunities';
        $data['careers'] = Career::where('status',1)->latest()->paginate(10);
        return view('frontend.career',$data);
    }

    public function tuition()
    {
        $data['page_title'] = 'Tuition Fees';
        $data['under_graduate_fees'] = TuitionFee::where('tuition_type','under_graduate')->where('status',1)->latest()->get();
        $data['post_graduate_fees'] = TuitionFee::where('tuition_type','post_graduate')->where('status',1)->latest()->get();
        $data['other_fees'] = TuitionFee::where('tuition_type','other')->where('status',1)->latest()->get();
        return view('frontend.admission.tuition',$data);
    }

    public function transportation()
    {
        $data['page_title'] = 'Bus Schedule';
        $data['shifts'] = BusShift::with('schedules')->get();
        $data['staffs'] = BusStaff::where('status',1)->latest()->get();

        return view('frontend.transportation',$data);
    }




}
