@extends('layouts.master')
@section('title')
    Vehicle
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Vehicle
        @endslot
        @slot('sub_breadcrumb')
            Create
        @endslot
    @endcomponent
    <!-- page title end-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Add New Vehicle</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('vehicle.index')
                                <a href="{{ route('admin.vehicle.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.vehicle.store') }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="brand_id">Brands <strong class="text-danger">*</strong></label>
                                                    <select name="brand_id" id="brand_id"
                                                            class="form-control form-control-lg select2" required>
                                                        <option value="" >Select Brand</option>
                                                        @forelse($brands as $data)
                                                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                    @error('brand_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="model_id">Model <strong class="text-danger">*</strong></label>
                                                    <select name="model_id" id="model_id"
                                                            class="form-control form-control-lg select2" required>
                                                        <option value="" >Select Model</option>
                                                    </select>
                                                    @error('model_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="year_id">Year <strong class="text-danger"></strong></label>
                                                    <select name="year_id" id="year_id"
                                                            class="form-control form-control-lg select2">
                                                        <option value="" >Select Year</option>
                                                        @forelse($years as $data)
                                                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                    @error('year_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="fuel_type_id">Fuel Type <strong class="text-danger"></strong></label>
                                                    <select name="fuel_type_id" id="fuel_type_id"
                                                            class="form-control form-control-lg select2">
                                                        <option value="" >Select Fuel Type</option>
                                                        @forelse($fuel_types as $data)
                                                            <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                    @error('fuel_type_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-12">
                                                    <label for="title">{{ __('Vehicle Title') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror"  value="{{ old('title') }}" name="title" required>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="short_description">Short Description: <strong class="text-danger">*</strong></label>
                                                        <textarea class="form-control @error('short_description') is-invalid @enderror"  name="short_description" id="short_description"  required>{{ old('short_description') }}</textarea>
                                                        @error('short_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="description">Description: <strong class="text-danger">*</strong></label>
                                                        <textarea class="form-control @error('description') is-invalid @enderror"  name="description" id="description"  required>{{ old('description') }}</textarea>
                                                        @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="image">Vehicle Image <strong class="text-danger">* <br><small>(Recommended Size 250 X 250 | Max: 50 MB)</small></strong></label>
                                            <input class="file-upload dropify" name="image" id="image" type="file" required>
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="other_images">Other Images <strong class="text-danger">* <br><small>(Recommended Size 750 X 400 | Max: 50 MB)</small></strong></label>
                                            <input class="file-upload dropify" name="other_images[]" id="other_images" type="file" multiple required>
                                            @error('other_images')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 py-4">
                                            <label>Status: <strong class="text-danger">*</strong></label> &nbsp;
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="active"  name="status" value="1" checked/>
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="active">Active</label>
                                                </div>
                                            </div>
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="inactive"  name="status" value="0"/>
                                                <div class="state p-danger">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center my-4">
                                <button type="submit" class="btn btn-primary rounded-1 fw-bold"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                        <path
                                            d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"
                                            fill="rgba(255,255,255,1)"></path>
                                    </svg> ADD NEW</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link href="{{ asset('build/libs/pretty_checkbox/pretty-checkbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <!--Date Picker -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    {{--    <link href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />--}}
@endpush
@push('page_js')
    <script src="{{ asset('build/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('build/libs/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('build/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('build/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    {{--    <script src="{{ asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>--}}
    <script src="{{ asset('build/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('build/libs/summernote/summernote-lite.min.js') }}"></script>
@endpush
@push('page_script')
    <script>

        $(document).ready(function() {
            $('.select2').select2();
            $('.dropify').dropify();
        });
        $('#description').summernote({
            placeholder: 'Write vehicle description',
            tabsize: 2,
            height: 180
        });
        $().ready(function() {
            var validator = $("#newForm").validate({
                ignore: ".ql-container *",
                messages: {
                    year_id: {
                        required: 'Brand is required'
                    },
                    model_id: {
                        required: 'Model is required'
                    },
                    title: {
                        required: 'Vehicle title is required'
                    },
                    image: {
                        required: 'Vehicle image is required'
                    },
                    'other_images[]': {
                        required: 'Vehicle other images is required'
                    },
                    description: {
                        required: 'Description is required'
                    },
                    short_description: {
                        required: 'Short description is required'
                    }
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });

        });

        $(document).on('change','#brand_id',function () {
            var brand_id = $(this).val();

            $.ajax({
                type:"GET",
                url: "{{route('admin.getModelByBrandId')}}",
                data: {id:brand_id},
                dateType: "JSON",
                success: function (response) {
                    console.log(response)
                    var model_section = $('#model_id');
                    model_section.empty();
                    var option = '<option value="">Select Model</option>';
                    $.each(response, function (key, value){
                        option+= '<option value="'+value.id+'">'+value.title+'</option>'
                    })
                    model_section.append(option);
                }
            });
        })
    </script>
@endpush
