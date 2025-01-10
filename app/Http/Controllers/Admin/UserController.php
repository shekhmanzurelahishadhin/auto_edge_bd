<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Mail\NewUserPasswordSend;
use App\Models\Admin;
use App\Models\Department;
use App\Models\Institute;
use App\Models\Office;
use App\Models\Role;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('users.index');
        $admins = Admin::with('roles')->latest()->get();

        return view('backend.user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('users.create');
        $data['roles'] = Role::whereNot('id', 1)->get(); /* id 1 is a super_admin */

        return view('backend.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {

        $password = Str::password(10);
        $adminUser = new Admin();
        $adminUser->name = $request->name;
        $adminUser->username = $request->username;
        $adminUser->email = $request->email;
        $adminUser->password = Hash::make($password);
        $adminUser->phone = $request->phone;
        $adminUser->designation = $request->designation;
        $adminUser->type = $request->admin_user_type;

        if ($request->profile_image) {
            $file_url = $this->fileUpload($request->profile_image, 'uploads/admin');
            $adminUser->image = $file_url;
        }
        $adminUser->save();
//        $data['name'] = $request->name;
//        $data['email'] = $request->email;
//        $data['password'] = $password;
//        $data['appURL'] = env('APP_URL');
//        $data['message'] = 'Your account has been created for '.env('APP_NAME').'.'.' Please secure your password and change your password ASAP';
//        Mail::to($adminUser->email)->send(new NewUserPasswordSend($data));

        $adminUser->roles()->sync($request->roles, []);
        flash()->addSuccess('User created successfully');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $admin = Admin::where('id', $id)->first();
        Gate::authorize('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        Gate::authorize('users.edit');
        $data['admin'] = Admin::where('id', $id)->with('roles')->first();
        $data['roles'] = Role::whereNot('id', 1)->get(); /* id 1 is a super_admin */

        return view('backend.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('users.edit');
        $admin = Admin::where('id', $id)->first();
        $this->validate($request, [
            'username' => 'required|unique:admins,username,'.$admin->id,
            'name' => 'required',
            'admin_user_type' => 'required',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$admin->id,
            'roles' => 'required',
            'profile_image' => 'nullable|mimes:jpg,jpeg,png|max:1024',
        ]);
        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->designation = $request->designation;
        $admin->type = $request->admin_user_type;
        $admin->status = $request->status;
        if ($request->profile_image) {
            $file_url = $this->fileUpload($request->profile_image, 'uploads/admin');
            $admin->image = $file_url;
        }
        $admin->save();
        $admin->roles()->sync($request->input('roles', []));
        flash()->addSuccess('User updated successfully');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('users.destroy');
        $admin = Admin::where('id', $id)->first();
        if ($admin->image != null && File::exists(public_path($admin->image))) {
            File::delete(public_path($admin->image));
        }
        $admin->delete();
        flash()->addSuccess('User deleted successfully');

        return redirect()->back();
    }
}
