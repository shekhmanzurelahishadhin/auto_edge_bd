@extends('layouts.master')
@section('title')
    Bidding Result
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Bidding Result
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
                            <h4 class="card-title mb-0">Edit Bidding Result</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('auction-category.index')
                                <a href="{{ route('admin.auction-category.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.bidding-result.update',$bidding_result->id) }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="outcomes">{{ __('Outcomes') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="outcomes" type="text"  class="form-control @error('outcomes') is-invalid @enderror"  value="{{ $bidding_result->outcomes }}" name="outcomes" required>
                                                    @error('outcomes')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label for="outcomes_status">{{ __('Outcomes Status') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="outcomes_status" type="text"  class="form-control @error('outcomes_status') is-invalid @enderror"  value="{{ $bidding_result->outcomes_status }}" name="outcomes_status" required>
                                                    @error('outcomes_status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 py-4">
                                                    <label>Status: <strong class="text-danger">*</strong></label> &nbsp;
                                                    <div class="pretty p-icon p-round p-pulse">
                                                        <input type="radio" id="active"  name="status" value="1" {{$bidding_result->status=='1'?'checked':''}} />
                                                        <div class="state p-success">
                                                            <i class="icon mdi mdi-check"></i>
                                                            <label for="active">Active</label>
                                                        </div>
                                                    </div>
                                                    <div class="pretty p-icon p-round p-pulse">
                                                        <input type="radio" id="inactive"   name="status" value="0" {{$bidding_result->status=='0'?'checked':''}}/>
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

        $().ready(function() {
            var validator = $("#newForm").validate({
                ignore: ".ql-container *",
                messages: {
                    outcomes: {
                        required: 'Outcomes is required'
                    },
                    outcomes_status: {
                        required: 'Outcomes Status is required'
                    },
                    status: {
                        required: 'Status is required'
                    }
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });
    </script>
@endpush
