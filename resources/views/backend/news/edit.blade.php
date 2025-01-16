@extends('layouts.master')
@section('title')
    News
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            News
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
                            <h4 class="card-title mb-0">Edit News</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('news.index')
                                <a href="{{ route('admin.news.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.news.update',$news->id) }}" method="post" id="noticeForm" enctype="multipart/form-data" >
                        @csrf
                        @isset($news)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="title">{{ __('News Title') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror"  value="{{ $news->title??old('title') }}" name="title" required>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="short_description">Short Description: <strong class="text-danger">*</strong></label>
                                                        <textarea class="form-control @error('short_description') is-invalid @enderror"  name="short_description" id="short_description"  required>{{  $news->short_description??old('short_description') }}</textarea>
                                                        @error('short_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="description">{{ __('Description') }}: <strong class="text-danger">*</strong></label>
                                                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"  name="description" required>{{ $news->description??old('description') }}</textarea>
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
                                            <label for="image">News Image <strong class="text-danger">* <br> <small>(Recommended Size 1200 X 800 | Max: 50 MB)</small></strong></label>
                                            <input class="file-upload dropify" name="image" id="image" data-default-file="{{ asset($news->image) }}" type="file">
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
{{--                                        <div class="mb-3 mt-3">--}}
{{--                                            <label for="published_at">{{ __('Published Date') }}: <strong--}}
{{--                                                    class="text-danger">*</strong></label>--}}
{{--                                            <input id="published_at" type="text" class="form-control @error('published_at') is-invalid @enderror"--}}
{{--                                                   data-date-format="Y-m-d" value="{{ $news->published_at??old('published_at') }}" name="published_at" required>--}}
{{--                                            @error('published_at')--}}
{{--                                            <span class="text-danger">{{ $message }}</span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
                                        <div class="mb-3 py-4">
                                            <label>Status: <strong class="text-danger">*</strong></label> &nbsp;
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="active"  name="status"  @checked(true == $news->status) value="1"/>
                                                <div class="state p-success">
                                                    <i class="icon mdi mdi-check"></i>
                                                    <label for="active">Published</label>
                                                </div>
                                            </div>
                                            <div class="pretty p-icon p-round p-pulse">
                                                <input type="radio" id="inactive"  name="status"  @checked(false == $news->status) value="0"/>
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
            placeholder: 'Write news description',
            tabsize: 2,
            height: 180
        });


        $().ready(function() {
            // validate the form when it is submitted
            var validator = $("#noticeForm").validate({
                ignore: ".ql-container *",
                messages: {
                    title: {
                        required: 'News title is required'
                    },
                    image: {
                        required: 'News image is required'
                    },
                    short_description: {
                        required: 'Short description is required'
                    },
                    description: {
                        required: 'Description is required'
                    }
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
            // $('#published_at').datepicker({
            //     uiLibrary: 'bootstrap',
            //     format: 'yyyy-mm-dd',
            //     icons: {
            //         rightIcon: '<i class="ri-calendar-todo-fill"></i>',
            //         previousMonth: '<i class="ri-arrow-left-s-line"></i>',
            //         nextMonth: '<i class="ri-arrow-right-s-line"></i>'
            //     }
            // });
        });
    </script>
@endpush
