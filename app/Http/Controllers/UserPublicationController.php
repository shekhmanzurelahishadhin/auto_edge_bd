<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Models\DepartmentChairman;
use App\Models\FacultyDean;
use App\Models\InstituteDirector;
use App\Models\OfficeStaff;
use App\Models\Publication;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPublicationController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $data['user'] = $user;
        $data['page_title'] = 'Add Publication';
        $data['teacher'] = Teacher::with(['department','institute'])
            ->where('user_id',$user->id)->first();
        $data['staff'] = OfficeStaff::with(['office','user'])->where('user_id',$user->id)->first();
        $data['dean'] = FacultyDean::with('faculty')->where('user_id',$user->id)->first();
        $data['chairmen'] = DepartmentChairman::with('department')->where('user_id',$user->id)->first();
        $data['director'] = InstituteDirector::with('institute')->where('user_id',$user->id)->first();

        return view('frontend.user.publication.create', $data);
    }

    public function store(StorePublicationRequest $request)
    {
        $user = Auth::user();
        $teacher = Teacher::with(['department','institute'])->where('user_id',$user->id)->first();
        $chairmen = DepartmentChairman::with('department')->where('user_id',$user->id)->first();
        $director = InstituteDirector::with('institute')->where('user_id',$user->id)->first();

        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        $data['user_id'] = $user->id ?? null;

        if ($teacher != null){
            $data['department_id'] = $teacher->department_id ?? null;
            $data['institute_id'] = $teacher->institute_id ?? null;
        }
        if ($chairmen != null){
            $data['department_id'] = $chairmen->department_id ?? null;
        }
        if ($director != null){
            $data['institute_id'] = $director->institute_id ?? null;
        }


        if ($request->attachment_file) {
            $file_url = $this->fileUpload($request->attachment_file, 'uploads/publication');
            $data['attachment'] = $file_url;
        }
        Publication::create($data);
        flash()->addSuccess('Publication create successfully');

        return to_route('user.dashboard');
    }

    public function show($id)
    {
        $user = Auth::user();
        $data['user'] = $user;
        $data['page_title'] = 'Publication Details';
        $data['teacher'] = Teacher::with(['department','institute'])
            ->where('user_id',$user->id)->first();
        $data['staff'] = OfficeStaff::with(['office','user'])->where('user_id',$user->id)->first();
        $data['dean'] = FacultyDean::with('faculty')->where('user_id',$user->id)->first();
        $data['chairmen'] = DepartmentChairman::with('department')->where('user_id',$user->id)->first();
        $data['director'] = InstituteDirector::with('institute')->where('user_id',$user->id)->first();


        $id = base64_decode($id);
        $data['publication'] = Publication::findOrFail($id);

        return view('frontend.user.publication.show', $data);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $data['user'] = $user;
        $data['page_title'] = 'Edit Publication';
        $data['teacher'] = Teacher::with(['department','institute'])
            ->where('user_id',$user->id)->first();
        $data['staff'] = OfficeStaff::with(['office','user'])->where('user_id',$user->id)->first();
        $data['dean'] = FacultyDean::with('faculty')->where('user_id',$user->id)->first();
        $data['chairmen'] = DepartmentChairman::with('department')->where('user_id',$user->id)->first();
        $data['director'] = InstituteDirector::with('institute')->where('user_id',$user->id)->first();


        $id = base64_decode($id);
        $data['publication'] = Publication::findOrFail($id);

        return view('frontend.user.publication.edit', $data);
    }

    public function update(UpdatePublicationRequest $request, $id)
    {
        $id = base64_decode($id);
        $publication = Publication::findOrFail($id);
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);

        if ($request->attachment_file) {
            $file_url = $this->fileUpload($request->attachment_file, 'uploads/publication', $publication->attachment);
            $data['attachment'] = $file_url;
        }
        $publication->update($data);
        flash()->addSuccess('Publication updated successfully');

        return to_route('user.dashboard');
    }

    public function destroy($id)
    {
        $publication = Publication::findOrFail($id);
        $publication->forceDelete();

        flash()->addSuccess('Publication deleted successfully');

        return to_route('user.dashboard');
    }
}
