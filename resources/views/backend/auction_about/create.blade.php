@extends('layouts.master')
@section('title')
    Auction About
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Auction About
        @endslot
        @slot('sub_breadcrumb')
            Auction About
        @endslot
    @endcomponent
    <!-- page title end-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Add New Auction About</h4>
                        </div>
                        <div class="col-md-6 text-end">
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.auction-about.store') }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <input type="hidden" name="id" value="1">
                                                <div class="mb-3 col-md-12">
                                                    <label for="title">{{ __('Title') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="title" type="text"  class="form-control @error('title') is-invalid @enderror"  value="{{ $about->title??'' }}" name="title" required>
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label for="example_title">{{ __('Example Title') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="example_title" type="text"  class="form-control @error('example_title') is-invalid @enderror"  value="{{ $about->example_title??'' }}" name="example_title" required>
                                                    @error('example_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label for="result_title">{{ __('Example Title') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="result_title" type="text"  class="form-control @error('result_title') is-invalid @enderror"  value="{{ $about->result_title??'' }}" name="result_title" required>
                                                    @error('result_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="details">Auction About Details <strong class="text-danger">*</strong></label>
                                                    <textarea class="form-control" name="details" id="details" cols="30" rows="5" required>{{$about->details??null}}</textarea>
                                                    @error('details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="disclaimer">Auction Disclaimer <strong class="text-danger"></strong></label>
                                                    <textarea class="form-control" name="disclaimer" id="disclaimer" cols="30" rows="5">{{$about->disclaimer??null}}</textarea>
                                                    @error('disclaimer')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
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
        $('#details').summernote({
            placeholder: 'Write Details',
            tabsize: 2,
            height: 180
        });
        $().ready(function() {
            var validator = $("#newForm").validate({
                ignore: ".ql-container *",
                messages: {
                    title: {
                        required: 'Title is required'
                    },
                    example_title: {
                        required: 'Example Title is required'
                    },
                    result_title: {
                        required: 'Result Title is required'
                    },
                    details: {
                        required: 'Details is required'
                    }
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });
    </script>
@endpush
