<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFuelTypeRequest;
use App\Http\Requests\StoreFuleTypeRequest;
use App\Models\FuelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('fuel-type.index');
        $fuel_types = FuelType::withTrashed()->latest()->get();
        return view('backend.fuel_type.index', compact('fuel_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('fuel-type.create');
        return view('backend.fuel_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFuelTypeRequest $request)
    {

        Gate::authorize('fuel-type.create');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        FuelType::create($data);

        flash()->addSuccess('Vehicle Fuel Type created successfully');

        return redirect()->route('admin.fuel-type.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FuelType $fuel_type)
    {
        Gate::authorize('fuel-type.edit');

        return view('backend.fuel_type.edit', compact('fuel_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFuelTypeRequest $request, FuelType $fuel_type)
    {
        Gate::authorize('fuel-type.edit');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        $fuel_type->update($data);

        flash()->addSuccess('Vehicle Fuel Type updated successfully');

        return redirect()->route('admin.fuel-type.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('fuel-type.destroy');
        $fuel_type = FuelType::findOrFail($id);
        $fuel_type->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('fuel-type.destroy');
        $fuel_type = FuelType::withTrashed()->findOrFail($id);
        $fuel_type->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('fuel-type.destroy');
        $fuel_type = FuelType::onlyTrashed()->where('id', $id)->first();
        $fuel_type->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }
}
