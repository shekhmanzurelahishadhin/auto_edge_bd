<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Brand;
use App\Models\FuelType;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\VehicleModel;
use App\Models\Year;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class VehicleController extends Controller
{
    use FileUploader;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('vehicle.index');
        $vehicles = Vehicle::withTrashed()->with('brand:id,title','model:id,title','year:id,title','fuel_type:id,title')->latest()->get();

        return view('backend.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('vehicle.create');
        $brands = Brand::where('status',1)->latest()->get(['id','title']);
        $years = Year::where('status',1)->latest()->get(['id','title']);
        $fuel_types = FuelType::where('status',1)->latest()->get(['id','title']);
        return view('backend.vehicle.create',compact('brands','fuel_types','years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        Gate::authorize('vehicle.create');
        try {
            DB::beginTransaction();
            $vehicle = new Vehicle();
            $vehicle->brand_id = $request->brand_id;
            $vehicle->model_id = $request->model_id;
            $vehicle->year_id = $request->year_id;
            $vehicle->fuel_type_id = $request->fuel_type_id;
            $vehicle->title = $request->title;
            $vehicle->slug = str_slug($request->title);
            $vehicle->short_description = $request->short_description;
            $vehicle->description = $request->description;
            $vehicle->status = $request->status;

            if ($request->image) {
                $file_url = $this->fileUpload($request->image, 'uploads/vehicle');
                $vehicle->main_image = $file_url;
            }

            $vehicle->save();

            if ($request->has('other_images')) {
                foreach ($request->other_images as $image) {
                    $other_image = new VehicleImage();
                    $other_image->vehicle_id = $vehicle->id;

                    if ($image) {
                        $file_url = $this->fileUpload($image, 'uploads/vehicle');
                        $other_image->image = $file_url;
                    }

                    $other_image->save();
                }
            }

            DB::commit(); // Commit the transaction if everything is successful
        } catch (Exception $e) {
            DB::rollBack(); // Rollback all changes if an error occurs

            // Return an error response or throw an exception
            return response()->json(['error' => 'Something went wrong!']);
        }
        flash()->addSuccess('Vehicle create successfully');

        return to_route('admin.vehicle.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('backend.vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        Gate::authorize('vehicle.edit');
        $vehicles = Vehicle::withTrashed()->with('brand:id,title','model:id,title','year:id,title','fuel_type:id,title')->latest()->get();
        $models = VehicleModel::where('status',1)->where('brand_id',$vehicle->brand_id)->latest()->get(['id','title']);
        $brands = Brand::where('status',1)->latest()->get(['id','title']);
        $years = Year::where('status',1)->latest()->get(['id','title']);
        $fuel_types = FuelType::where('status',1)->latest()->get(['id','title']);

        $data['vehicle'] = $vehicle;
        $data['vehicles'] = $vehicles;
        $data['models'] = $models;
        $data['brands'] = $brands;
        $data['years'] = $years;
        $data['fuel_types'] = $fuel_types;

        return view('backend.vehicle.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        Gate::authorize('vehicle.edit');
        try {
            DB::beginTransaction();

            // Find the vehicle to update
            $vehicle->brand_id = $request->brand_id;
            $vehicle->model_id = $request->model_id;
            $vehicle->year_id = $request->year_id;
            $vehicle->fuel_type_id = $request->fuel_type_id;
            $vehicle->title = $request->title;
            $vehicle->slug = str_slug($request->title);
            $vehicle->short_description = $request->short_description;
            $vehicle->description = $request->description;
            $vehicle->status = $request->status;

            // Handle main image update
            if ($request->hasFile('image')) {
                // Delete the old main image if it exists
                if ($vehicle->main_image && File::exists(public_path($vehicle->main_image))) {
                    File::delete(public_path($vehicle->main_image));
                }

                // Upload new image
                $file_url = $this->fileUpload($request->image, 'uploads/vehicle');
                $vehicle->main_image = $file_url;
            }

            $vehicle->save();

            // Handle other images update
            if ($request->has('other_images')) {
                // Delete old other images
                $existingImages = VehicleImage::where('vehicle_id', $vehicle->id)->get();
                foreach ($existingImages as $existingImage) {
                    if (File::exists(public_path($existingImage->image))) {
                        File::delete(public_path($existingImage->image));
                    }
                    $existingImage->delete();
                }

                // Upload new other images
                foreach ($request->other_images as $image) {
                    $other_image = new VehicleImage();
                    $other_image->vehicle_id = $vehicle->id;

                    if ($image) {
                        $file_url = $this->fileUpload($image, 'uploads/vehicle');
                        $other_image->image = $file_url;
                    }

                    $other_image->save();
                }
            }

            DB::commit(); // Commit the transaction if everything is successful

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback all changes if an error occurs
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
        flash()->addSuccess('Vehicle updated successfully');

        return to_route('admin.vehicle.index');
    }

    public function trash($id)
    {
        Gate::authorize('vehicle.destroy');
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('vehicle.destroy');
        $vehicle = Vehicle::withTrashed()->findOrFail($id);
        $vehicle->restore();
        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('vehicle.destroy');
        try {
            DB::beginTransaction();

            // Get the soft-deleted vehicle
            $vehicle = Vehicle::onlyTrashed()->where('id', $id)->first();

            if (!$vehicle) {
                flash()->addError('Vehicle not found');
                return redirect()->back();
            }

            // Get all associated images
            $other_images = VehicleImage::where('vehicle_id', $vehicle->id)->get();

            // Delete main image if it exists
            if ($vehicle->main_image && File::exists(public_path($vehicle->main_image))) {
                File::delete(public_path($vehicle->main_image));
            }

            // Delete all other images
            foreach ($other_images as $other_image) {
                if ($other_image->image && File::exists(public_path($other_image->image))) {
                    File::delete(public_path($other_image->image));
                }
                $other_image->delete(); // Remove from database
            }

            // Permanently delete the vehicle
            $vehicle->forceDelete();

            DB::commit(); // Commit transaction if everything is successful

            flash()->addSuccess('Vehicle deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            flash()->addError('Something went wrong! Unable to delete vehicle.');
        }
        flash()->addSuccess('Vehicle delete successfully');

        return redirect()->back();
    }
}
