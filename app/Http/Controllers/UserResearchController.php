<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResearchRequest;
use App\Http\Requests\UpdateResearchRequest;
use App\Models\DepartmentChairman;
use App\Models\FacultyDean;
use App\Models\InstituteDirector;
use App\Models\OfficeStaff;
use App\Models\Research;
use App\Models\Teacher;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserResearchController extends Controller
{
    use FileUploader;

    public function create()
    {
        $user = Auth::user();
        $data['user'] = $user;
        $data['page_title'] = 'Add Research';
        $data['teacher'] = Teacher::with(['department','institute'])
            ->where('user_id',$user->id)->first();
        $data['staff'] = OfficeStaff::with(['office','user'])->where('user_id',$user->id)->first();
        $data['dean'] = FacultyDean::with('faculty')->where('user_id',$user->id)->first();
        $data['chairmen'] = DepartmentChairman::with('department')->where('user_id',$user->id)->first();
        $data['director'] = InstituteDirector::with('institute')->where('user_id',$user->id)->first();

        return view('frontend.user.research.create', $data);
    }

    public function store(StoreResearchRequest $request)
    {
        $user = Auth::user();
        $teacher = Teacher::with(['department','institute'])->where('user_id',$user->id)->first();
        $chairmen = DepartmentChairman::with('department')->where('user_id',$user->id)->first();
        $director = InstituteDirector::with('institute')->where('user_id',$user->id)->first();
        if ($teacher){
            $data['department_id'] = $teacher->department_id ?? null;
            $data['institute_id'] = $teacher->institute_id ?? null;
        }
        if ($chairmen){
            $data['department_id'] = $chairmen->department_id ?? null;
        }
        if ($director){
            $data['institute_id'] = $director->institute_id ?? null;
        }

        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        $data['user_id'] = $user->id ?? null;

        if ($request->attachment_file) {
            $file_url = $this->fileUpload($request->attachment_file, 'uploads/research');
            $data['attachment'] = $file_url;
        }

        Research::create($data);
        flash()->addSuccess('Research create successfully');

        return to_route('user.dashboard');
    }

    public function show($id)
    {
        $user = Auth::user();
        $data['user'] = $user;
        $data['page_title'] = 'Research Details';
        $data['teacher'] = Teacher::with(['department','institute'])
            ->where('user_id',$user->id)->first();
        $data['staff'] = OfficeStaff::with(['office','user'])->where('user_id',$user->id)->first();
        $data['dean'] = FacultyDean::with('faculty')->where('user_id',$user->id)->first();
        $data['chairmen'] = DepartmentChairman::with('department')->where('user_id',$user->id)->first();
        $data['director'] = InstituteDirector::with('institute')->where('user_id',$user->id)->first();


        $id = base64_decode($id);
        $data['research'] = Research::findOrFail($id);

        return view('frontend.user.research.show', $data);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $data['user'] = $user;
        $data['page_title'] = 'Edit Research';
        $data['teacher'] = Teacher::with(['department','institute'])
            ->where('user_id',$user->id)->first();
        $data['staff'] = OfficeStaff::with(['office','user'])->where('user_id',$user->id)->first();
        $data['dean'] = FacultyDean::with('faculty')->where('user_id',$user->id)->first();
        $data['chairmen'] = DepartmentChairman::with('department')->where('user_id',$user->id)->first();
        $data['director'] = InstituteDirector::with('institute')->where('user_id',$user->id)->first();


        $id = base64_decode($id);
        $data['research'] = Research::findOrFail($id);

        return view('frontend.user.research.edit', $data);
    }

    public function update(UpdateResearchRequest $request, $id)
    {
        $id = base64_decode($id);
        $research = Research::findOrFail($id);
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);

        if ($request->attachment_file) {
            $file_url = $this->fileUpload($request->attachment_file, 'uploads/research', $research->attachment);
            $data['attachment'] = $file_url;
        }

        $research->update($data);
        flash()->addSuccess('Research updated successfully');

        return to_route('user.dashboard');
    }

    public function destroy($id)
    {
        $research = Research::findOrFail($id);
        $research->forceDelete();

        flash()->addSuccess('Research deleted successfully');

        return to_route('user.dashboard');
    }
}
