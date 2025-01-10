@extends('layouts.master')
@section('title')
    Contact Info
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Contact Info
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
                            <h4 class="card-title mb-0">Add New Contact Info</h4>
                        </div>
                        <div class="col-md-6 text-end">

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.website-contact.store') }}" method="post" id="newForm" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="phone">{{ __('Phone') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="phone" type="text"  class="form-control @error('phone') is-invalid @enderror"  value="{{ $values['phone']??old('phone') }}" name="phone" required>
                                                    @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="email">{{ __('Email') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror"  value="{{ $values['email']??old('email') }}" name="email" required>
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="fax">{{ __('Fax') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <input id="fax" type="text"  class="form-control @error('fax') is-invalid @enderror"  value="{{ $values['fax']??old('fax') }}" name="fax" required>
                                                    @error('fax')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="website_address">{{ __('Address') }}: <strong
                                                            class="text-danger">*</strong></label>
                                                    <textarea id="website_address" type="text"
                                                              class="form-control @error('website_address') is-invalid @enderror"
                                                              name="website_address" required>{{$values['address']??null}}</textarea>
                                                    @error('website_address')
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
                    website_address: {
                        required: 'Address is required'
                    },
                    phone: {
                        required: 'Phone number is required'
                    },
                    email: {
                        required: 'Email is required'
                    },
                    fax: {
                        required: 'Fax is required'
                    }
                }
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });

        });
    </script>
@endpush
