@extends('layouts.master')
@section('title')
    Site Logo & Page Banner
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Site Logo & Page Banner
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
                            <h4 class="card-title mb-0">Add New Site Logo & Page Banner</h4>
                        </div>
                        <div class="col-md-6 text-end">

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.logo.store') }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="site_title">Site Title <strong class="text-danger">*</strong></label>
                                                    <input class="form-control" value="{{$logo->site_title??null}}" name="site_title" id="site_title" type="text">
                                                    @error('site_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="logo">Logo Image <strong class="text-danger">* <small>(Recommended Size 200 X 50 | Max: 5 MB)</small></strong></label>
                                                    <input class="file-upload dropify" name="logo" id="logo" type="file" data-allowed-file-extensions="jpg jpeg png" data-default-file="{{ isset($logo->logo) != null ? asset($logo->logo) : '' }}">
                                                    @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="footer_logo">Dark Logo Image <strong class="text-danger">* <small>(Recommended Size 200 X 50 | Max: 5 MB)</small></strong></label>
                                                    <input class="file-upload dropify" name="footer_logo" id="footer_logo" type="file" data-allowed-file-extensions="jpg jpeg png" data-default-file="{{ isset($logo->footer_logo) != null ? asset($logo->footer_logo) : '' }}">
                                                    @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="page_banner">Page Banner <strong class="text-danger">* <small>(Recommended Size 1900 X 200 | Max: 10 MB)</small></strong></label>
                                                    <input class="file-upload dropify" name="page_banner" id="page_banner" type="file" data-allowed-file-extensions="jpg jpeg png" data-default-file="{{ isset($logo->page_banner) != null ? asset($logo->page_banner) : '' }}">
                                                    @error('page_banner')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center my-4">
                                <button type="submit" id="submit" class="btn btn-primary rounded-1 fw-bold"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                        <path
                                            d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"
                                            fill="rgba(255,255,255,1)"></path>
                                    </svg> SAVE</button>
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
@endpush
@push('page_js')
    <script src="{{ asset('build/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('build/libs/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('build/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('build/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('build/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('build/libs/summernote/summernote-lite.min.js') }}"></script>
@endpush
@push('page_script')
    <script>

        $(document).ready(function() {
            $('.select2').select2();
            $('.dropify').dropify();
        });


        $().ready(function() {
            var validator = $("#newForm").validate({
                ignore: ".ql-container *",
                messages: {
                    logo: {
                        required: 'Logo image is required'
                    },
                    page_banner: {
                        required: 'Page Banner image is required'
                    },
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });
    </script>
@endpush
