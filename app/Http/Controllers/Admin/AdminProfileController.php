<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    use FileUploader;


    public function index()
    {
        $user_id = Auth::guard('admin')->user()->id;
        $data['admin'] = Admin::where('id', $user_id)->first();
        return view('backend.user.profile', $data);
    }

    public function update(Request $request)
    {
        $user_id = Auth::guard('admin')->user()->id;
        $admin = Admin::where('id', $user_id)->first();
        $this->validate($request, [
            'username' => 'required|unique:admins,username,'.$admin->id,
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$admin->id,
            'profile_image' => 'nullable|mimes:jpg,jpeg,png|max:1024',
            'designation' => 'nullable',
        ]);
        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->designation = $request->designation;

        if ($request->password){
            $admin->password = Hash::make($request->password);
        }
        if ($request->profile_image) {
            $file_url = $this->fileUpload($request->profile_image, 'uploads/admin');
            $admin->image = $file_url;
        }
        $admin->save();
        flash()->addSuccess('Profile info updated successfully');

        return redirect()->route('admin.dashboard');
    }
}
