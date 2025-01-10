<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeStaffStoreRequest;
use App\Http\Requests\OfficeStaffUpdateRequest;
use App\Models\Designation;
use App\Models\Office;
use App\Models\OfficeStaff;
use App\Models\User;
use App\Traits\FileUploader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class OfficeStaffController extends Controller
{
    use FileUploader;

    public function manageOfficeStaff($slug)
    {
        $office = Office::where('slug', $slug)->first();
        $officeStaff = OfficeStaff::withTrashed()->where('office_id', $office->id)->with('user')->latest()->get();
        $designations = Designation::pluck('name');

        return view('backend.office.manage_office_staff', compact('office', 'officeStaff', 'designations'));
    }

    public function store(OfficeStaffStoreRequest $request)
    {

        $route = Route::currentRouteName();
        Session::put('create_route', $route);

        //Transaction start
        DB::beginTransaction();
        try {
            $officeStaff = new OfficeStaff();
            $officeStaff->office_id = $request->office_id;
            $officeStaff->name = $request->name;
            $officeStaff->designation = $request->designation;
            $officeStaff->email = $request->email;
            $officeStaff->phone = $request->phone;
            $officeStaff->wing = $request->wing;
            $officeStaff->type = $request->type;
            $officeStaff->sequence = $request->sequence;
            if ($request->profile_image) {
                $file_url = $this->fileUpload($request->profile_image, 'uploads/office/staff');
                $officeStaff->profile_image = $file_url;
            }
            $userCreate = $request->filled('user_create');
            if ($userCreate != null) {
                $checkUser = User::where('email', $request->email)->first();
                if ($checkUser){
                    $officeStaff->user_id = $checkUser->id;
                }
                else{
                    $user = create_user($request->name, $request->phone, $request->email);
                    $officeStaff->user_id = $user->id;
                }
            }

            $officeStaff->save();

            Designation::updateOrCreate([
                'name' => $request->designation,
                'slug' => str_slug($request->designation),
            ]);

            DB::commit();
            flash()->addSuccess('Office staff created successfully');
            return redirect()->back();

        }catch (\Exception $e) {
            DB::rollBack();
            flash()->addError('Something Went Wrong');
            return redirect()->back();
        }
        //Transaction end
    }

    public function edit($id)
    {
        $officeStaff = OfficeStaff::where('id', $id)->first();
        $office = Office::where('id', $officeStaff->office_id)->first();
        $designations = Designation::pluck('name');

        return view('backend.office.edit_office_staff', compact('office', 'officeStaff', 'designations'));
    }

    public function update(OfficeStaffUpdateRequest $request, $id)
    {
        $officeStaff = OfficeStaff::where('id', $id)->first();
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:office_staff,email,'.$officeStaff->id,
        ]);


        //Transaction start
        DB::beginTransaction();
        try {
            $officeStaff->name = $request->name;
            $officeStaff->designation = $request->designation;
            $officeStaff->email = $request->email;
            $officeStaff->phone = $request->phone;
            $officeStaff->wing = $request->wing;
            $officeStaff->type = $request->type;
            $officeStaff->sequence = $request->sequence;
            if ($request->profile_image) {
                $file_url = $this->fileUpload($request->profile_image, 'uploads/office/staff', $officeStaff->profile_image);
                $officeStaff->profile_image = $file_url;
            }

            if ($officeStaff->user_id != null){
                update_user($officeStaff->user_id, $request->name, $request->phone, $request->email );
            }
            else{
                $userCreate = $request->filled('user_create');
                if ($userCreate != null) {
                    $checkUser = User::where('email', $request->email)->first();
                    if ($checkUser){
                        $officeStaff->user_id = $checkUser->id;
                    }
                    else{
                        $user = create_user($request->name, $request->phone, $request->email);
                        $officeStaff->user_id = $user->id;
                    }
                }
            }



            $officeStaff->save();

            Designation::updateOrCreate([
                'name' => $request->designation,
                'slug' => str_slug($request->designation),
            ]);

            DB::commit();
            flash()->addSuccess('Office staff update successfully');
            return to_route('admin.office.staff.manage', $request->slug);

        }catch (\Exception $e) {
            DB::rollBack();
            flash()->addError('Something Went Wrong');
            return redirect()->back();
        }
        //Transaction end

    }

    public function trash($id)
    {
        Gate::authorize('office_staff.destroy');
        $staff = OfficeStaff::findOrFail($id);
        $staff->delete();
        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('office_staff.destroy');
        $staff = OfficeStaff::withTrashed()->findOrFail($id);
        $staff->restore();
        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('office_staff.destroy');
        $staff = OfficeStaff::onlyTrashed()->where('id', $id)->first();
        if ($staff->profile_image != null && File::exists(public_path($staff->profile_image))) {
            File::delete(public_path($staff->profile_image));
        }

        $user = User::where('id', $staff->user_id)->first();
        if ($user){
            $user->forceDelete();
        }

        $staff->forceDelete();
        flash()->addSuccess('Office staff delete successfully');

        return redirect()->back();
    }
}
