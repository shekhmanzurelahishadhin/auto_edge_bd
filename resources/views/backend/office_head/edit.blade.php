@extends('layouts.master')
@section('title')
    {{--    @lang('translation.alerts') --}}
    Office Head
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Office Head
        @endslot
        @slot('sub_breadcrumb')
            Edit
        @endslot
    @endcomponent
    <!-- page title end-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Edit Office Head</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('head-office.index')
                                <a href="{{ route('admin.head-office.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.head-office.update', $head_office->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h5 class="card-title">Office Head Information</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="name">{{ __('Name') }}: <strong class="text-danger">*</strong></label>
                                                    <input id="name" type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           value="{{ $head_office->name }}" name="name" autocomplete="new-name">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="office_id">{{ __('Office') }}: <strong class="text-danger">*</strong></label>

                                                    <select name="office_id" class="form-control select2 @error('office_id') is-invalid @enderror" id="office_id">
                                                        <option value="">Select please</option>
                                                        @forelse($offices as $office)
                                                            <option {{ $head_office->office_id == $office->id ?'selected':'' }} value="{{ $office->id }}">{{ $office->name }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                    @error('office_id')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="email">{{ __('Email') }}: <strong class="text-danger">*</strong></label>
                                                    <input required id="email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           value="{{ $head_office->email }}" name="email" autocomplete="new-email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="phone">{{ __('Phone') }}: <strong class="text-danger">*</strong></label>
                                                    <input required id="phone" type="text"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           value="{{ $head_office->phone }}" name="phone" autocomplete="new-phone">
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="joining_date">{{ __('Joining Date') }}: </label>
                                                    <input id="joining_date" type="text" placeholder="YYYY-MM-DD"
                                                           class="form-control @error('joining_date') is-invalid @enderror"
                                                           value="{{ $head_office->joining_date }}" name="joining_date" autocomplete="joining_date">
                                                    @error('joining_date')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="resign_date">{{ __('Resign Date') }}: </label>
                                                    <input id="resign_date" type="text" placeholder="YYYY-MM-DD"
                                                           class="form-control @error('resign_date') is-invalid @enderror"
                                                           value="{{ $head_office->resign_date }}" name="resign_date" autocomplete="resign_date">
                                                    @error('resign_date')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="head_message">{{ __('Office Head Message') }}:</label>
                                                    <textarea  name="head_message" id="head_message" rows="5"
                                                               class="form-control @error('head_message') is-invalid @enderror">{{ $head_office->head_message }}</textarea>
                                                    @error('head_message')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-primary rounded-1 fw-bold">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                        <path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM13 12V16H11V12H8L12 8L16 12H13Z" fill="rgba(255,255,255,1)"></path>
                                                    </svg> UPDATE
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Office Head Photo</h5>
                                    </div>
                                    <div class="card-body">
                                        <label>Image <strong class="text-danger">* <br> <small>(Recommended Size 480 X 480 | Max: 50 MB)</small></strong></label>

                                        <div class="mb-3 text-center">
                                            <div class="p-image text-center">
                                                <input class="file-upload dropify" name="image" data-default-file="{{ asset($head_office->image) }}" type="file"
                                                       data-allowed-file-extensions="jpg jpeg png">
                                            </div>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 my-3">
                                            <label>Status: <strong class="text-danger">*</strong></label> &nbsp;
                                            <br>
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="active"  name="status" value="1" {{ $head_office->status == 1?'checked':'' }} />
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="active">Active</label>
                                                </div>
                                            </div>
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="inactive" {{ $head_office->status == 0?'checked':'' }} name="status" value="0"/>
                                                <div class="state p-danger">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('css')
    <link href="{{ asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/pretty_checkbox/pretty-checkbox.min.css') }}" rel="stylesheet" />
    <!--Date Picker -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    {{--    <link href="{{ asset('build/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />--}}
@endpush
@push('page_js')
    <script src="{{ asset('build/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('build/libs/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('build/libs/dropify/js/dropify.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    {{--    <script src="{{ asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>--}}
@endpush
@push('page_script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.dropify').dropify();
        });

        // $(".flatpickr").flatpickr({
        //     dateFormat: "Y-m-d", //change format also
        // });


        $('#joining_date').datepicker({
            uiLibrary: 'bootstrap',
            format: 'yyyy-mm-dd',
            icons: {
                rightIcon: '<i class="ri-calendar-todo-fill"></i>',
                previousMonth: '<i class="ri-arrow-left-s-line"></i>',
                nextMonth: '<i class="ri-arrow-right-s-line"></i>'
            }
        });
        $('#resign_date').datepicker({
            uiLibrary: 'bootstrap',
            format: 'yyyy-mm-dd',
            icons: {
                rightIcon: '<i class="ri-calendar-todo-fill"></i>',
                previousMonth: '<i class="ri-arrow-left-s-line"></i>',
                nextMonth: '<i class="ri-arrow-right-s-line"></i>'
            }
        });
    </script>
@endpush