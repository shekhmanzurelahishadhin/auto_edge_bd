<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalender;
use App\Models\Activity;
use App\Models\Alumni;
use App\Models\Department;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\Form;
use App\Models\Institute;
use App\Models\Journal;
use App\Models\JournalVolume;
use App\Models\News;
use App\Models\Notice;
use App\Models\Office;
use App\Models\Program;
use App\Models\Publication;
use App\Models\Research;
use App\Models\Scholarship;
use App\Models\Seminar;
use App\Models\Volume;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function publication(Request $request)
    {
        $data['page_title'] = 'Books';
        $data['publications'] = Publication::with(['department','institute'])->where('status',1)->where('user_id',null)->latest()->paginate(10);
        if ($request->search){
            $data['publications'] = Publication::with(['department','institute'])->where('status',1)->where('user_id',null)
                ->where('title','like', '%' .$request->search. '%')
                ->latest()->paginate(10);
        }

        return view('frontend.publication',$data);
    }

    public function journal(Request $request)
    {
        $data['page_title'] = 'Journals';
        $data['journals'] = Journal::with('volumes','main_volumes')->withCount('main_volumes')->where('status',1)->latest()->paginate(10);
        if ($request->search){
            $data['journals'] = Journal::
                with('volumes')->withCount('volumes')->where('status',1)
                ->where('title','like', '%' .$request->search. '%')
                ->orWhere('editor','like', '%' .$request->search. '%')
                ->latest()->paginate(10);
        }
        return view('frontend.journal.index',$data);
    }

    public function journal_show($slug)
    {
        $data['journal'] = Journal::with('volumes')->where('slug',$slug)->first();
        $data['main_volumes'] = Volume::where('journal_id',$data['journal']->id)->orderBy('title','ASC')->get();
        $data['page_title'] = $data['journal']->title??'';

        $lastKey = $data['main_volumes']->reverse()->keys()->first();
        $data['volumes'] = JournalVolume::where('journal_id',$data['journal']->id)->where('volume_id',$data['main_volumes'][$lastKey]->id)->latest()->get();

        return view('frontend.journal.show',$data);
    }

    public function volume_journal_show($volume_slug)
    {
        $volume = Volume::where('slug',$volume_slug)->first();
        $data['journal'] = Journal::with('volumes')->where('id',$volume->journal_id)->first();
        $data['main_volumes'] = Volume::where('journal_id',$data['journal']->id)->orderBy('title','ASC')->get();
        $data['page_title'] = $data['journal']->title??'';

        $data['volumes'] = JournalVolume::where('journal_id',$data['journal']->id)->where('volume_id',$volume->id)->latest()->get();

        return view('frontend.journal.show',$data);
    }

    public function volume_read( $id)
    {
        $id = base64_decode($id);

        $data['page_title'] = $volume->title??'';
        $data['volume'] = JournalVolume::where('id',$id)->latest()->first();

        return view('frontend.journal.read',$data);
    }



    public function department_publication(Request $request)
    {
        $data['page_title'] = 'Department Publications';
        $data['departments'] = Department::where('status',1)->orderBy('name','ASC')->get();
        if ($request->has('department') && $request->department != null){
            $department = Department::where('slug', $request->department)->first();
            if ($department){
                $data['publications'] = Publication::with(['department','institute'])->where('status',1)->where('department_id',$department->id)->latest()->paginate(10);
                $data['page_title'] = 'Publications of '.$department->name;
            }
            else{
                $data['publications'] = [];
            }
        }
        else{
            $data['publications'] = Publication::with(['department','institute'])->where('status',1)->where('department_id','!=', null)->latest()->paginate(10);
        }

        return view('frontend.publication', $data);
    }


    public function research(Request $request, $slug = false)
    {
        if ($slug==true){
            $sub = $slug=='External'?'Externally':'JKKNIU';
            $data['page_title'] = $sub.' Funded Research Projects';
            $data['researches'] = Research::with(['department','institute'])->where('funding_agency',$slug)->latest('end_date')->paginate(10);
        }
        else{
            $data['page_title'] = 'Research Projects';
            $data['researches'] = Research::with(['department','institute'])->latest('end_date')->paginate(10);
        }

        if ($request->search){
            $data['page_title'] = 'Research Projects';
            $data['researches'] = Research::with(['department','institute'])
                ->where('title','like', '%' .$request->search. '%')
                ->latest('end_date')->paginate(10);
        }

        return view('frontend.research', $data);
    }


    public function faculties()
    {
        $data['page_title'] = 'Faculties';
        $data['faculties'] = Faculty::where('status',1)->orderBy('name','Asc')->get();
        return view('frontend.faculties', $data);
    }

    public function institutes()
    {
        $data['page_title'] = 'Institutes';
        $data['institutes'] = Institute::where('status',1)->orderBy('name','Asc')->get();
        return view('frontend.institutes',$data);
    }

    public function departments()
    {
        $data['page_title'] = 'Departments';
        $data['departments'] = Department::where('status',1)->orderBy('name','Asc')->get();
        return view('frontend.departments',$data);
    }

    public function offices()
    {
        $data['page_title'] = 'Offices';
        $data['offices'] = Office::where('type','administrative')->orderBy('id','Asc')->get();
        return view('frontend.offices',$data);
    }

    public function facility()
    {
        $data['page_title'] = 'Facilities';
        $data['offices'] = Office::where('type','facility')->orderBy('id','Asc')->get();
        return view('frontend.offices',$data);
    }




    public function notice_index(Request $request, $type = false)
    {
        if ($type==true){
            $data['page_title'] = 'Notice for '.ucfirst($type);
            $data['notices'] = Notice::where('status',1)->where('notice_type',$type)->latest()->paginate(10);
        }
        else{
            $data['page_title'] = 'All Notice';
            $data['notices'] = Notice::where('status',1)->latest()->paginate(10);
        }

        if ($request->search){
            $data['page_title'] = 'Notice';
            $data['notices'] = Notice::where('status',1)->where('title','like', '%' .$request->search. '%')->latest()->paginate(10);
        }

        return view('frontend.notice.index',$data);
    }

    public function notice_show($noticeSlug)
    {
        $data['notice'] = Notice::where('status',1)->where('slug',$noticeSlug)->first();
        $data['page_title'] = $data['notice']->title??'';
        return view('frontend.notice.show', $data);
    }

    public function news_index(Request $request)
    {
        $data['newses'] = News::where('status',1)->latest()->paginate(6);
        if ($request->search){
            $data['newses'] = News::where('status',1)->where('title','like', '%' .$request->search. '%')->latest()->paginate(6);
        }

        return view('frontend.news.index', $data);
    }

    public function news_show($newsSlug)
    {
        $data['news'] = News::where('status',1)->where('slug',$newsSlug)->first();
        return view('frontend.news.show', $data);
    }

    public function event_index(Request $request)
    {
        $data['events'] = Event::where('status',1)->latest()->paginate(6);
        if ($request->search){
            $data['events'] = Event::where('status',1)->where('event_name','like', '%' .$request->search. '%')->latest()->paginate(6);
        }
        return view('frontend.event.index', $data);
    }

    public function event_show($newsSlug)
    {
        $data['event'] = Event::where('status',1)->where('slug',$newsSlug)->first();
        $data['page_title'] = $data['event']->title??'';
        return view('frontend.event.show', $data);
    }

    public function seminar_index(Request $request)
    {
        $data['seminars'] = Seminar::where('status',1)->latest()->paginate(8);
        if ($request->search){
            $data['seminars'] = Seminar::where('status',1)->where('title','like', '%' .$request->search. '%')->latest()->paginate(8);
        }
        return view('frontend.seminar.index', $data);
    }

    public function seminar_show($newsSlug)
    {
        $data['seminar'] = Seminar::where('status',1)->where('slug',$newsSlug)->first();
        $data['page_title'] = $data['seminar']->title??'';
        return view('frontend.seminar.show', $data);
    }

    public function activity_index()
    {
        $data['activities'] = Activity::where('status',1)->latest()->paginate(8);
        return view('frontend.activity.index', $data);
    }

    public function activity_show($activitySlug)
    {
        $data['activity'] = Activity::where('status',1)->where('slug',$activitySlug)->first();
        $data['page_title'] = $data['activity']->title??'';
        return view('frontend.activity.show', $data);
    }

    public function program_index()
    {
        $data['programs'] = Program::where('status',1)->latest()->paginate(8);
        return view('frontend.program.index', $data);
    }

    public function program_show($programSlug)
    {
        $data['program'] = Program::where('status',1)->where('slug',$programSlug)->first();
        $data['page_title'] = $data['program']->title??'';
        return view('frontend.program.show', $data);
    }


    public function alumni_index()
    {
        $data['alumni'] = Alumni::where('status',1)->latest()->paginate(9);
        return view('frontend.alumni.index', $data);
    }

    public function alumni_show($alumniSlug)
    {
        $data['alumni'] = Alumni::where('status',1)->where('slug',$alumniSlug)->first();
        $data['page_title'] = $data['alumni']->title??'';
        return view('frontend.alumni.show', $data);
    }


    public function calender(Request $request)
    {
        $data['page_title'] = 'Academic Calender';
        $data['departments'] = Department::where('status',1)->orderBy('name','ASC')->get();
        $data['institutes'] = Institute::where('status',1)->orderBy('name','ASC')->get();

        if ($request->has('department') && $request->department != null){
            $department = Department::where('slug', $request->department)->first();
            if ($department){
                $data['calenders'] = AcademicCalender::where('department_id', $department->id)->paginate(10);
                $data['page_title'] = 'Academic Calender of '.$department->name;
            }
            else{
                $institutes = Institute::where('slug', $request->department)->first();
                if ($institutes){
                    $data['calenders'] = AcademicCalender::where('institute_id', $institutes->id)->paginate(10);
                    $data['page_title'] = 'Academic Calender of '.$institutes->name;
                }
                else{
                    $data['calenders'] = [];
                }

            }
        }
        else{
            $data['calenders'] = AcademicCalender::with('department', 'institute')->paginate(10);
        }

        return view('frontend.calender', $data);
    }


    public function forms()
    {
        $data['page_title'] = 'Official Forms';
        $data['forms'] = Form::where('office_id','!=',null)->latest()->paginate(10);

        return view('frontend.forms', $data);
    }


    public function departmental_forms(Request $request)
    {
        $data['page_title'] = 'Departmental Forms';
        $data['departments'] = Department::where('status',1)->orderBy('name','ASC')->get();
        $data['institutes'] = Institute::where('status',1)->orderBy('name','ASC')->get();

        if ($request->has('department') && $request->department != null){
            $department = Department::where('slug', $request->department)->first();
            if ($department){
                $data['forms'] = Form::where('department_id',$department->id)->latest()->paginate(10);
                $data['page_title'] = 'Forms of '.$department->name;
            }
            else{
                $institutes = Institute::where('slug', $request->department)->first();
                if ($institutes){
                    $data['forms'] = Form::where('institute_id',$institutes->id)->latest()->paginate(10);
                    $data['page_title'] = 'Forms of '.$institutes->name;
                }
                else{
                    $data['forms'] = [];
                }

            }
        }
        else{
            $data['forms'] = [];
        }

        return view('frontend.forms', $data);
    }


    public function scholarship(Request $request)
    {
        $data['page_title'] = 'Scholarships';
        $data['departments'] = Department::where('status',1)->orderBy('name','ASC')->get();
        $data['institutes'] = Institute::where('status',1)->orderBy('name','ASC')->get();

        if ($request->has('department') && $request->department != null){
            $department = Department::where('slug', $request->department)->first();
            if ($department){
                $data['scholarships'] = Scholarship::where('department_id', $department->id)->paginate(10);
                $data['page_title'] = 'Scholarship of '.$department->name;
            }
            else{
                $institutes = Institute::where('slug', $request->department)->first();
                if ($institutes){
                    $data['scholarships'] = Scholarship::where('institute_id', $institutes->id)->paginate(10);
                    $data['page_title'] = 'Scholarships of '.$institutes->name;
                }
                else{
                    $data['scholarships'] = [];
                }

            }
        }
        else{
            $data['scholarships'] = Scholarship::with('department', 'institute')->paginate(10);
        }

        return view('frontend.scholarship', $data);
    }


}
