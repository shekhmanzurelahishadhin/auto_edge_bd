@extends('layouts.master')
@section('title')
    Office
@endsection

@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Office
        @endslot
        @slot('sub_breadcrumb')
            edit
        @endslot
    @endcomponent
    <!-- page title end-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Office Edit</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.office.index') }}" class="btn dark-icon btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                    <path
                                        d="M5.82843 6.99955L8.36396 9.53509L6.94975 10.9493L2 5.99955L6.94975 1.0498L8.36396 2.46402L5.82843 4.99955H13C17.4183 4.99955 21 8.58127 21 12.9996C21 17.4178 17.4183 20.9996 13 20.9996H4V18.9996H13C16.3137 18.9996 19 16.3133 19 12.9996C19 9.68584 16.3137 6.99955 13 6.99955H5.82843Z"
                                        fill="rgba(255,255,255,1)"></path>
                                </svg>
                                Back to list
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.office.update',$office->id) }}" method="post"
                          enctype="multipart/form-data" id="officeForm">
                        @csrf
                        @isset($office)
                            @method('PUT')
                        @endisset
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name">Office Name: <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ $office->name??old('name') }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug">Office Type: <strong class="text-danger">*</strong></label> &nbsp;
                                    @foreach (App\Enums\OfficeType::cases() as $officeType)
                                        <div
                                            class="form-check form-check-inline form-radio-outline form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="type"
                                                   id="{{$officeType->value}}" @checked($office->type ==
                                            $officeType->value) value="{{ $officeType->value }}">
                                            <label class="form-check-label" for="{{$officeType->value}}">
                                                {{$officeType->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="about">About Office: <strong class="text-danger">*</strong></label>
                                    <textarea type="text" class="form-control ckeditor-classic summernote" rows="3"
                                              style="height: 200px;" name="about"
                                              id="about">{{ $office->about??old('about') }}</textarea>
                                    @error('about')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="mission">{{ __('Mission') }}: <strong class="text-danger">*</strong></label>
                                        <textarea required name="mission" id="mission" rows="5"
                                                  class="summernote form-control @error('mission') is-invalid @enderror">{{ $office->mission??old('mission') }}</textarea>
                                        @error('mission')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="vision">{{ __('Vision') }}: <strong
                                                class="text-danger">*</strong></label>
                                        <textarea required name="vision" id="vision" rows="5"
                                                  class="summernote form-control @error('vision') is-invalid @enderror">{{ $office->vision??old('vision') }}</textarea>
                                        @error('vision')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="image">Office Image: <br> <strong class="text-danger"><small>(Recommended
                                                Size 1920 X 1080 | Max: 50 MB)</small></strong></label>
                                    <input type="file" class="form-control dropify" name="image"
                                           data-default-file="{{ asset($office->image) }}"
                                           id="image" data-allowed-file-extensions="jpg jpeg png webp"
                                           value="{{ old('image') }}">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact">Contact Information: <strong
                                            class="text-danger">*</strong></label>
                                    <textarea type="text" class="form-control" rows="4" name="contact"
                                              id="contact">{{ $office->contact??old('contact') }}</textarea>
                                    @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary rounded-1 fw-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                     height="18">
                                    <path
                                        d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM13 12V16H11V12H8L12 8L16 12H13Z"
                                        fill="rgba(255,255,255,1)"></path>
                                </svg> {{ __('UPDATE') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('build/libs/summernote/summernote-lite.min.css') }}">
    <link href="{{ asset('build/libs/dropify/css/dropify.min.css') }}" rel="stylesheet"/>
@endpush
@push('customCss')
    <style>
        .ck-editor__editable {
            min-height: 220px !important;
        }
    </style>
@endpush
@push('page_js')
    <script src="{{ asset('build/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('build/libs/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('build/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('build/libs/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush
@push('page_script')
    <script>

        $('.dropify').dropify();

        // $('#about').summernote({
        //     height: 300,
        //     toolbar: [
        //         ['style', ['style']],
        //         ['font', ['bold', 'underline', 'clear']],
        //         ['fontname', ['fontname']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['table', ['table']],
        //         ['insert', ['link', 'picture']],
        //         ['view', ['fullscreen', 'codeview', 'help']],
        //     ],
        // });
        $('.summernote').summernote({
            height: 130,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold','italic','underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });
        $('#contact').summernote({
            height: 215,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['height', ['height']]
            ]
        });
        $().ready(function () {
            // validate the form when it is submitted
            var validator = $("#officeForm").validate({
                errorElement: "span",
                ignore: ".ql-container *",
                rules:{
                    name :'required',
                    type :'required',
                    about :'required',
                    mission :'required',
                    vision :'required',
                    contact :'required',
                },
                messages:{
                    name: "Office name field is required",
                    type: "Office type is required",
                    about: "About field is required",
                    mission: "Mission field is required",
                    vision: "Vision field is required",
                    contact: "Contact field is required",
                }
            });
            $(".cancel").click(function () {
                validator.resetForm();
            });
        });
    </script>
@endpush
