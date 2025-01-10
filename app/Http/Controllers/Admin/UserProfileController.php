<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\DepartmentChairman;
use App\Models\FacultyDean;
use App\Models\InstituteDirector;
use App\Models\OfficeStaff;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\Institute;
use App\Models\Publication;
use App\Models\Research;
use App\Models\User;
use App\Models\UserAward;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserPublication;
use App\Models\UserResearch;
use App\Models\UserResource;
use App\Models\UserSocialInfo;
use App\Models\UserTeaching;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    use FileUploader;

    public function index($id)
    {
        $data['user'] = User::findOrFail($id);

        $dean = FacultyDean::where('user_id',$id)->first();
        $chairmen = DepartmentChairman::where('user_id',$id)->first();
        $director = InstituteDirector::where('user_id',$id)->first();
        $teacher = Teacher::where('user_id',$id)->first();
        $staff = OfficeStaff::where('user_id',$id)->first();
        if ($dean){
            $data['user_image'] = $dean->image;
        }
        elseif($chairmen){
            $data['user_image'] = $chairmen->image;
        }
        elseif($director){
            $data['user_image'] = $director->image;
        }
        elseif($teacher){
            $data['user_image'] = $teacher->profile_image;
        }
        elseif($staff){
            $data['user_image'] = $staff->profile_image;
        }
        else{
            $data['user_image'] = null;
        }

        $data['educations'] = UserEducation::where('user_id', $id)->latest('passing_year')->get();
        $data['experiences'] = UserExperience::where('user_id', $id)->get();
        $data['awards'] = UserAward::where('user_id', $id)->latest()->get();
        $data['social'] = UserSocialInfo::where('user_id', $id)->first();
        $data['publications'] = Publication::where('user_id', $id)->withTrashed()->latest()->get();
        $data['researchs'] = Research::where('user_id', $id)->withTrashed()->latest()->get();
        $data['teaching'] = UserTeaching::where('user_id', $id)->first();
        $data['resources'] = UserResource::where('user_id', $id)->latest()->get();
        $data['departments'] = Department::get();
        $data['institutes'] = Institute::get();

        return view('backend.faculty_dean.profile', $data);
    }


    public function password_update(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);

        $user = User::findOrFail($request->user);
        $user->password = Hash::make($request->password);
        $user->save();

        flash()->addSuccess('Password updated successfully');
        return redirect()->back();
    }

    public function education_update(Request $request)
    {
        /*user education process*/
        $user_id = $request->user;

        $degrees = $request->degree;
        $institutes = $request->institute;
        $groups = $request->group_subject;
        $years = $request->passing_year;
        $countries = $request->country;

        if (isset($degrees) && count($degrees) > 0) {
            foreach ($degrees as $key => $degree) {
                $new_degree = true;
                //check update matched
                $educations = UserEducation::where('user_id', $user_id)->get();
                foreach ($educations as $education) {

                    if ($education->degree == $degree) {
                        $education->user_id = $user_id;
                        $education->degree = $degree;
                        $education->institute = isset($institutes[$key]) ? $institutes[$key] : '';
                        $education->passing_year = isset($years[$key]) ? $years[$key] : '';
                        $education->group_subject = isset($groups[$key]) ? $groups[$key] : '';
                        $education->country = isset($countries[$key]) ? $countries[$key] : '';
                        $education->update();
                        $new_degree = false;
                    }
                }

                //if not match then insert new
                if ($new_degree && $degrees[$key] != null) {
                    $education = new UserEducation();
                    $education->user_id = $user_id;
                    $education->degree = $degree;
                    $education->institute = isset($institutes[$key]) ? $institutes[$key] : '';
                    $education->passing_year = isset($years[$key]) ? $years[$key] : '';
                    $education->group_subject = isset($groups[$key]) ? $groups[$key] : '';
                    $education->country = isset($countries[$key]) ? $countries[$key] : '';
                    $education->save();
                }

            }
        }

        flash()->addSuccess('Information updated successfully');

        return redirect()->back();

    }

    public function education_delete($id)
    {
        $educations = UserEducation::where('id', $id)->first();
        $educations->delete();

        flash()->addSuccess('Information deleted successfully');

        return redirect()->back();
    }

    public function experience_update(Request $request)
    {
        $user_id = $request->user;

        $positions = $request->position;
        $types = $request->type;
        $organizations = $request->organization;
        $from_dates = $request->from_date;
        $to_dates = $request->to_date;

        if (isset($positions) && count($positions) > 0) {
            foreach ($positions as $key => $position) {
                $new_experience = true;
                //check update matched
                $experiences = UserExperience::where('user_id', $user_id)->get();
                foreach ($experiences as $experience) {

                    if ($experience->position == $position && $experience->organization == $organizations[$key]) {
                        $experience->user_id = $user_id;
                        $experience->position = $position;
                        $experience->type = isset($types[$key]) ? $types[$key] : null;
                        $experience->organization = isset($organizations[$key]) ? $organizations[$key] : '';
                        $experience->from_date = isset($from_dates[$key]) ? $from_dates[$key] : null;
                        $experience->to_date = isset($to_dates[$key]) ? $to_dates[$key] : null;
                        $experience->update();
                        $new_experience = false;
                    }
                }

                //if not match then insert new
                if ($new_experience && $positions[$key] != null) {
                    $experience = new UserExperience();
                    $experience->user_id = $user_id;
                    $experience->position = $position;
                    $experience->type = isset($types[$key]) ? $types[$key] : null;
                    $experience->organization = isset($organizations[$key]) ? $organizations[$key] : '';
                    $experience->from_date = isset($from_dates[$key]) ? $from_dates[$key] : null;
                    $experience->to_date = isset($to_dates[$key]) ? $to_dates[$key] : null;
                    $experience->save();
                }

            }
        }

        flash()->addSuccess('Information updated successfully');

        return redirect()->back();
    }

    public function experience_delete($id)
    {
        $experience = UserExperience::where('id', $id)->first();
        $experience->delete();

        flash()->addSuccess('Information deleted successfully');

        return redirect()->back();
    }

    public function award_update(Request $request)
    {
        $user_id = $request->user;

        $titles = $request->title;
        $types = $request->type;
        $years = $request->year;
        $descriptions = $request->description;
        $countries = $request->country;

        if (isset($titles) && count($titles) > 0) {
            foreach ($titles as $key => $title) {
                $new_award = true;
                //check update matched
                $awards = UserAward::where('user_id', $user_id)->get();
                foreach ($awards as $award) {

                    if ($award->title == $title) {
                        $award->user_id = $user_id;
                        $award->title = $title;
                        $award->type = isset($types[$key]) ? $types[$key] : '';
                        $award->year = isset($years[$key]) ? $years[$key] : '';
                        $award->description = isset($descriptions[$key]) ? $descriptions[$key] : '';
                        $award->country = isset($countries[$key]) ? $countries[$key] : '';
                        $award->update();
                        $new_award = false;
                    }
                }

                //if not match then insert new
                if ($new_award && $titles[$key] != null) {
                    $award = new UserAward();
                    $award->user_id = $user_id;
                    $award->title = $title;
                    $award->type = isset($types[$key]) ? $types[$key] : '';
                    $award->year = isset($years[$key]) ? $years[$key] : '';
                    $award->description = isset($descriptions[$key]) ? $descriptions[$key] : '';
                    $award->country = isset($countries[$key]) ? $countries[$key] : '';
                    $award->save();
                }

            }
        }

        flash()->addSuccess('Information updated successfully');

        return redirect()->back();
    }

    public function award_delete($id)
    {
        $award = UserAward::where('id', $id)->first();
        $award->delete();

        flash()->addSuccess('Information deleted successfully');

        return redirect()->back();
    }

    public function social_update(Request $request)
    {
        $user_id = $request->user;
        $exist = UserSocialInfo::where('user_id', $user_id)->first();
        if ($exist) {
            $exist->facebook = $request->facebook;
            $exist->twitter = $request->twitter;
            $exist->linkedin = $request->linkedin;
            $exist->instagram = $request->instagram;
            $exist->website = $request->website;
            $exist->save();
        } else {
            $social = new UserSocialInfo();
            $social->user_id = $user_id;
            $social->facebook = $request->facebook;
            $social->twitter = $request->twitter;
            $social->linkedin = $request->linkedin;
            $social->instagram = $request->instagram;
            $social->website = $request->website;
            $social->save();
        }

        flash()->addSuccess('Information updated successfully');

        return redirect()->back();
    }

    public function publication_update(Request $request)
    {
        $user_id = $request->user;
        $exist = UserPublication::where('user_id', $user_id)->first();
        if ($exist) {
            $exist->publication = $request->publication_details;
            $exist->save();
        } else {
            $publication = new UserPublication();
            $publication->user_id = $user_id;
            $publication->publication = $request->publication_details;
            $publication->save();
        }

        flash()->addSuccess('Information updated successfully');

        return redirect()->back();
    }

    public function research_update(Request $request)
    {
        $user_id = $request->user;
        $exist = UserResearch::where('user_id', $user_id)->first();
        if ($exist) {
            $exist->research = $request->research_details;
            $exist->save();
        } else {
            $research = new UserResearch();
            $research->user_id = $user_id;
            $research->research = $request->research_details;
            $research->save();
        }

        flash()->addSuccess('Information updated successfully');

        return redirect()->back();
    }

    public function teaching_update(Request $request)
    {
        $user_id = $request->user;
        $exist = UserTeaching::where('user_id', $user_id)->first();
        if ($exist) {
            $exist->teaching = $request->teaching_details;
            $exist->save();
        } else {
            $research = new UserTeaching();
            $research->user_id = $user_id;
            $research->teaching = $request->teaching_details;
            $research->save();
        }

        flash()->addSuccess('Information updated successfully');

        return redirect()->back();
    }

    public function resource_update(Request $request)
    {
        $user_id = $request->user;
        $titles = $request->title;
        $attachments = $request->attachment;

        if (isset($titles) && count($titles) > 0) {
            foreach ($titles as $key => $title) {
                $new_resource = true;
                //check update matched
                $resources = UserResource::where('user_id', $user_id)->get();
                foreach ($resources as $resource) {
                    if ($resource->title == $title) {
                        $resource->user_id = $user_id;
                        $resource->title = $title;
                        if (isset($attachments[$key]) && $attachments[$key] != null) {
                            $file = $attachments[$key];
                            $file_url = $this->fileUpload($file, 'uploads/user_resource', $resource->attachment);
                            $resource->attachment = $file_url;
                        }
                        $resource->update();
                        $new_resource = false;
                    }
                }

                //if not match then insert new
                if ($new_resource && $titles[$key] != null) {
                    $resource = new UserResource();
                    $resource->user_id = $user_id;
                    $resource->title = $title;
                    if (isset($attachments[$key]) && $attachments[$key] != null) {
                        $file = $attachments[$key];
                        $file_url = $this->fileUpload($file, 'uploads/user_resource');
                        $resource->attachment = $file_url;
                    }
                    $resource->save();
                }
            }
        }

        flash()->addSuccess('Information updated successfully');

        return redirect()->back();
    }

    public function resource_delete($id)
    {
        $resource = UserResource::where('id', $id)->first();
        if ($resource->attachment != null) {
            unlink($resource->attachment);
        }
        $resource->delete();

        flash()->addSuccess('Information deleted successfully');

        return redirect()->back();
    }
}
