@extends('layouts.master')
@section('title')
    Page Title
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Page Title
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
                            <h4 class="card-title mb-0">Add New Page Title</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('page-title.index')
                                <a href="{{ route('admin.page-title.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.page-title.store') }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">

                                                <div class="mb-3 col-md-12">
                                                    <label for="page_code">Page Type</label> <strong
                                                        class="text-danger">*</strong>
                                                    <select name="page_code" id="page_code" class="form-control form-control-lg select2">
                                                        <option value="" selected disabled>Select Page</option>
                                                        @forelse($page_types as $page_type)
                                                            <option value="{{ $page_type->code }}">{{ $page_type->name }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                    @error('page_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-12">
                                                    <label for="page_title">Page Title <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="page_title" type="text"  class="form-control @error('page_title') is-invalid @enderror"  value="{{ old('page_title') }}" name="page_title" required>
                                                    @error('page_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label for="page_sub_title">Page Sub Title <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="page_sub_title" type="text"  class="form-control @error('page_sub_title') is-invalid @enderror"  value="{{ old('page_sub_title') }}" name="page_sub_title" required>
                                                    @error('page_sub_title')
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
                                                        <input type="radio" id="inactive"  name="status" value="0" />
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
                    page_code: {
                        required: 'Page is required'
                    },
                    page_title: {
                        required: 'Title is required'
                    },
                    page_sub_title: {
                        required: 'Sub Title is required'
                    }

                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });
    </script>
@endpush
