<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Institute;
use App\Models\Office;
use App\Models\Slider;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class SliderController extends Controller
{
    use FileUploader;

    public function index()
    {
        Gate::authorize('slider.index');
        $slider = Slider::withTrashed()->latest()->get();
        return view('backend.slider.index', compact('slider'));
    }

    public function create()
    {
        Gate::authorize('slider.create');

        return view('backend.slider.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('slider.create');
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:50000',
        ]);
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description??'';
        $slider->status = $request->status;
        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/slider');
            $slider->image = $file_url;
        }
        $slider->save();
        flash()->addSuccess('Slider create successfully');

        return to_route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('backend.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        Gate::authorize('slider.edit');
        $data['slider'] = $slider;

        return view('backend.slider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        Gate::authorize('slider.edit');
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:50000',
        ]);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->status;

        if ($request->image) {
            $file_url = $this->fileUpload($request->image, 'uploads/slider', $slider->image);
            $slider->image = $file_url;
        }
        $slider->save();
        flash()->addSuccess('Slider edit successfully');

        return to_route('admin.slider.index');
    }

    public function trash($id)
    {
        Gate::authorize('slider.destroy');
        $slider = Slider::findOrFail($id);
        $slider->delete();
        flash()->addSuccess('Trashed successfully');

        return redirect()->back();
    }

    public function restore($id)
    {
        Gate::authorize('slider.destroy');
        $slider = Slider::withTrashed()->findOrFail($id);
        $slider->restore();
        flash()->addSuccess('Restore successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('slider.destroy');
        $slider = Slider::onlyTrashed()->where('id', $id)->first();
        if ($slider->image != null && File::exists(public_path($slider->image))) {
            File::delete(public_path($slider->image));
        }
        $slider->forceDelete();
        flash()->addSuccess('Slider delete successfully');
        return redirect()->back();
    }
}
