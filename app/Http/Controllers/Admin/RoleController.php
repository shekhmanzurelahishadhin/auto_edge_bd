<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('roles.index');
        $roles = Role::latest()->get();

        return view('backend.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('roles.create');
        $modules = Module::all();

        return view('backend.role.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('roles.create');
        $this->validate($request, [
            'role_name' => 'required',
            'permissions' => 'required|array',
            'permissions.*' => 'integer',
        ]);
        Role::create([
            'name' => $request->role_name,
            'slug' => str_slug($request->role_name),
        ])->permissions()->sync($request->input('permissions'), []);
        flash()->addSuccess('Role create successfully');

        return to_route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        Gate::authorize('roles.edit');
        $role = $role;
        $modules = Module::all();

        return view('backend.role.edit', compact('role', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('roles.edit');
        $this->validate($request, [
            'role_name' => 'required',
            'permissions' => 'required|array',
            'permissions.*' => 'integer',
        ]);
        $role->update([
            'name' => $request->role_name,
            'slug' => str_slug($request->role_name),
        ]);
        $role->permissions()->sync($request->input('permissions'));
        flash()->addSuccess('Role update successfully');

        return to_route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        Gate::authorize('roles.destroy');
        if ($role->deletable == true) {
            $role->delete();
            flash()->addSuccess('Role delete successfully');

            return redirect()->back();
        } else {
            flash()->addWarning('You can\'t delete system role');

            return redirect()->back();
        }
    }
}
