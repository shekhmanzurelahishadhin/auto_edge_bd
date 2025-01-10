@extends('layouts.master')
@section('title')
    {{--    @lang('translation.alerts')--}}
    User
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            User
        @endslot
        @slot('sub_breadcrumb')
            Profile
        @endslot
    @endcomponent
    <!-- page title end-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Update Profile</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('roles.index')
                                <a href="{{ route('admin.users.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.adminProfile.update') }}" method="post" id="userForm" enctype="multipart/form-data">
                        @csrf
                        @isset($admin)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h5 class="card-title">User Information</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="new-user-info">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="username">{{ __('Username') }}: <strong
                                                                class="text-danger">*</strong></label>
                                                        <input id="username" type="text"
                                                               class="form-control @error('username') is-invalid @enderror"
                                                               value="{{ $admin->username??old('username') }}" name="username" required
                                                               autocomplete="new-username" placeholder="Exa. phone">
                                                        @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="name">{{ __('Name') }}: <strong
                                                                class="text-danger">*</strong></label>
                                                        <input id="name" type="text"   class="form-control @error('name') is-invalid @enderror" required
                                                               value="{{ $admin->name??old('name') }}" name="name" autocomplete="new-name">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="phone">{{ __('Phone') }}:</label>
                                                        <input id="phone" type="text"
                                                               class="form-control @error('phone') is-invalid @enderror"
                                                               value="{{ $admin->phone??old('phone') }}" name="phone"
                                                               autocomplete="new-phone">
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email">{{ __('Email') }}: <strong
                                                                class="text-danger">*</strong></label>
                                                        <input id="email" type="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               value="{{ $admin->email??old('email') }}" name="email" required
                                                               autocomplete="new-email">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="userpassword" class="form-label">Password</label>
                                                        <input type="password"
                                                               class="form-control @error('password') is-invalid @enderror" name="password"
                                                               id="userpassword" placeholder="Enter password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <div class="invalid-feedback">
                                                            Please enter password
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class=" mb-4">
                                                        <label for="input-password">Confirm Password</label>
                                                        <input type="password"
                                                               class="form-control @error('password_confirmation') is-invalid @enderror"
                                                               name="password_confirmation" id="input-password"
                                                               placeholder="Enter Confirm Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">User Photo</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 text-center">
                                            <div class="p-image text-center">
                                                <input class="file-upload dropify" name="profile_image" type="file"
                                                       data-allowed-file-extensions="jpg jpeg png"
                                                       data-default-file="{{ asset($admin->image)}}">
                                            </div>
                                            @error('profile_image')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="designation">{{ __('Designation') }}:</label>
                                            <input type="text" class="form-control" name="designation" value="{{ $admin->designation??old('designation') }}" id="designation">
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
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('css')
    <link href="{{ asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" />
@endpush
@push('page_js')
    <script src="{{ asset('build/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('build/libs/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('build/libs/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('build/libs/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush
@push('page_script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            $('.dropify').dropify({
                height:120
            });
        });

        /*form validation*/
        $().ready(function() {
            // validate the form when it is submitted
            var validator = $("#userForm").validate({
                errorElement: "span",
                ignore: ".ql-container *",
            });
            $(".cancel").click(function() {
                validator.resetForm();
            });
        });
    </script>
@endpush
