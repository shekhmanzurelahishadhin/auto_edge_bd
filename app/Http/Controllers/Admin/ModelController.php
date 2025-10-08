<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelRequest;
use App\Models\Brand;
use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('model.index');
        $models = VehicleModel::withTrashed()->with('brand:id,title')->latest()->get();
        return view('backend.model.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('model.create');
        $brands = Brand::get(['id','title']);
        return view('backend.model.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModelRequest $request)
    {

        Gate::authorize('model.create');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        VehicleModel::create($data);

        flash()->addSuccess('Model created successfully');

        return redirect()->route('admin.model.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleModel $model)
    {
        return view('backend.model.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleModel $model)
    {
        Gate::authorize('model.edit');
        $brands = Brand::get(['id','title']);
        return view('backend.model.edit', compact('model','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreModelRequest $request, VehicleModel $model)
    {
        Gate::authorize('model.edit');
        $data = $request->except('_token');
        $data['slug'] = str_slug($request->title);
        $model->update($data);

        flash()->addSuccess('Model updated successfully');

        return redirect()->route('admin.model.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash($id)
    {
        Gate::authorize('model.destroy');
        $model = VehicleModel::findOrFail($id);
        $model->delete();

        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('model.destroy');
        $model = VehicleModel::withTrashed()->findOrFail($id);
        $model->restore();

        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Gate::authorize('model.destroy');
        $model = VehicleModel::onlyTrashed()->where('id', $id)->first();
        $model->forceDelete();
        flash()->addSuccess('Deleted successfully');

        return redirect()->back();
    }

    public function getModelByBrandId()
    {
        $models = VehicleModel::where('brand_id',$_GET['id'])->where('status',1)->get(['id','brand_id','title']);
        return response()->json($models);
    }
}
