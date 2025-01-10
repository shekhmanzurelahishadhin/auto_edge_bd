@extends('layouts.master')
@section('title')
    Gallery Category
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Gallery Category
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
                            <h4 class="card-title mb-0">Edit Gallery Category</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('gallery-category.index')
                                <a href="{{ route('admin.gallery-category.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.gallery-category.update',$gallery_category->id) }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="title">{{ __('Gallery Category Title') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror" value="{{ $gallery_category->title }}" name="title" required>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="mb-3 py-4">
                                            <label>Status: <strong class="text-danger">*</strong></label> &nbsp;
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="active"  name="status" value="1" {{$gallery_category->status=='1'?'checked':''}} />
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="active">Published</label>
                                                </div>
                                            </div>
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="inactive"   name="status" value="0" {{$gallery_category->status=='0'?'checked':''}}/>
                                                <div class="state p-danger">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="inactive">Unpublished</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center my-4">
                                <button type="submit" class="btn btn-primary rounded-1 fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                        <path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM13 12V16H11V12H8L12 8L16 12H13Z" fill="rgba(255,255,255,1)"></path>
                                    </svg> UPDATE
                                </button>
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

            if (department > 0){
                var institute = $('#institute');
                institute.empty();
                var option = '<option value="" selected disabled>Select Institute</option>';
                institute.append(option);

                $('#institute').attr('disabled',true);


            }else{

                $('#institute').attr('disabled',false)
            }
        });
        /*if office select department & institute are disabled*/
        $('#institute').on('change',function (){
            let institute = $(this).val()
            if (institute>0){
                var department = $('#department');
                department.empty();
                var option = '<option value="" selected disabled>Select Department</option>';
                department.append(option);

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
                        required: 'Gallery Category title is required'
                    }
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });
    </script>
@endpush
