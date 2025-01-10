@extends('layouts.master')
@section('title')
    Gallery
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Gallery
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
                            <h4 class="card-title mb-0">Add New Gallery</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('gallery.index')
                                <a href="{{ route('admin.gallery.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.gallery.store') }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="title">{{ __('Gallery Title') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror"  value="{{ old('title') }}" name="title" required>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="image">Gallery Image <strong class="text-danger">* <small>(Recommended Size 1920 X 1080 | Max: 50 MB)</small></strong></label>
                                                    <input class="file-upload dropify" name="image" id="image" type="file" data-allowed-file-extensions="jpg jpeg png" required>
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 py-4">
                                                <label>Status: <strong class="text-danger">*</strong></label> &nbsp;
                                                <div class="pretty p-icon p-round p-pulse">
                                                    <input type="radio" id="active"  name="status" value="1" checked/>
                                                    <div class="state p-success">
                                                        <i class="icon mdi mdi-check"></i>
                                                        <label for="active">Published</label>
                                                    </div>
                                                </div>
                                                <div class="pretty p-icon p-round p-pulse">
                                                    <input type="radio" id="inactive"  name="status" value="0" />
                                                    <div class="state p-danger">
                                                        <i class="icon mdi mdi-check"></i>
                                                        <label for="inactive">Unpublished</label>
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

        /*if department select office & institute are disabled*/
        $('#department').on('change',function (){
            let department = $(this).val()
            console.log(department)
            if (department > 0){
                $('#institute').attr('disabled',true)
            }else{
                $('#institute').attr('disabled',false)
            }
        });
        /*if office select department & institute are disabled*/
        $('#institute').on('change',function (){
            let institute = $(this).val()
            if (institute>0){
                $('#department').attr('disabled',true)
            }else{
                $('#department').attr('disabled',false)
            }
        });

        $().ready(function() {
            var validator = $("#newForm").validate({
                ignore: ".ql-container *",
                messages: {
                    title: {
                        required: 'Gallery title is required'
                    },
                    image: {
                        required: 'Gallery image is required'
                    }
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });
    </script>
@endpush
