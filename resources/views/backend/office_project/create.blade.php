@extends('layouts.master')
@section('title')
    {{--    @lang('translation.alerts')--}}
    Office Recent Project
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Office Recent Project
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
                            <h4 class="card-title mb-0">Add New Office Project</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('office-project.index')
                                <a href="{{ route('admin.office-project.index',$id) }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.office-project.store') }}" method="post" id="noticeForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="title">{{ __('Recent Project Title') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror"  value="{{ old('title') }}" name="title" required>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="office_id" value="{{$id}}">
                                            </div>
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="description">{{ __('Description') }}: <strong
                                                                class="text-danger">*</strong></label>
                                                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"  name="description" required>{{ old('description') }}</textarea>
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
                                            <label for="attachment_file">Attachment <br> <strong class="text-danger"><small>(JPG,JPEG,PNG,PDF only | Max: 150 MB)</small></strong></label>
                                            <input class="file-upload dropify" name="attachment_file" id="attachment_file" type="file">

                                            @error('attachment_file')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="mb-3 mt-2">
                                            <label>Status: <strong class="text-danger">*</strong></label> &nbsp;
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="active"  name="status" value="1"/>
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="active">Published</label>
                                                </div>
                                            </div>
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="inactive"  name="status" value="0" checked/>
                                                <div class="state p-danger">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="inactive">Draft</label>
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
    <script src="{{ asset('build/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('build/libs/summernote/summernote-lite.min.js') }}"></script>
@endpush
@push('page_script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.dropify').dropify();
        });


        $('#description').summernote({
            placeholder: 'Write notice description',
            tabsize: 2,
            height: 180
        });
        $().ready(function() {
            // validate the form when it is submitted
            var validator = $("#noticeForm").validate({
                errorElement: "span",
                ignore: ".ql-container *",
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });

    </script>
@endpush
