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
                            <h4 class="card-title mb-0">Add New User</h4>
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

                    <form action="{{ route('admin.users.store') }}" method="post" id="userForm" enctype="multipart/form-data">
                        @csrf
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
                                                               value="{{ old('username') }}" name="username" required
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
                                                               value="{{ old('name') }}" name="name" autocomplete="new-name">
                                                        @error('name')
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
                                                               value="{{ old('email') }}" name="email" required
                                                               autocomplete="new-email">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div> {{-- .col-md-6 end--}}

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="phone">{{ __('Phone') }}:</label>
                                                        <input id="phone" type="text"
                                                               class="form-control @error('phone') is-invalid @enderror"
                                                               value="{{ old('phone') }}" name="phone"
                                                               autocomplete="new-phone">
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    @if (Auth()->user()->roles()->first()->id == 1)
                                                        {{--  role id is a super admin  --}}
                                                        <div class="mb-3">
                                                            <label for="admin_user_type">{{ __('Admin User Type:') }} <strong class="text-danger">*</strong></label>
                                                            <select name="admin_user_type" id="admin_user_type" class="form-control select2" required>
                                                                <option value="" selected disabled>Admin Type</option>
                                                                @foreach (App\Enums\AdminUserType::cases() as $adminUserType)
                                                                    <option value="{{ $adminUserType->value }}">{{ $adminUserType->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('admin_user_type')
                                                            <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>{{-- .row end --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">User Photo & Roles</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 text-center">
                                            <div class="p-image text-center">
                                                <input class="file-upload dropify" name="profile_image" type="file"
                                                       data-allowed-file-extensions="jpg jpeg png"
                                                       data-default-file="{{ Auth()->user()->image != null ? asset(Auth()->user()->image) : '' }}">
                                            </div>
                                            @error('profile_image')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="role">{{ __('Admin User Role:') }} <strong class="text-danger">*</strong></label>
                                            <select name="roles" id="role"
                                                    class="form-control form-control-lg select2" required>
                                                <option value="" disabled>Select role</option>
                                                @forelse($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="designation">{{ __('Designation') }}:</label>
                                            <input type="text" class="form-control" name="designation"
                                                   value="{{ old('designation') }}" id="designation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-4">
                            <button type="submit" id="submit" class="btn btn-primary rounded-1 fw-bold"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                    <path d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z" fill="rgba(255,255,255,1)"></path>
                                </svg> ADD NEW USER
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

        $('#admin_user_type').on('change',function (){
            let adminUserType =$(this).val();
            if (adminUserType ==='department_admin'){
                $('#departmentDropdown').show(500);
                $('#department').attr('required',true).attr('name','department');
                $('#office').attr('required',false).attr('name','');
                $('#institute').attr('required',false).attr('name','');
                $('#officeDropdown').hide(500);
                $('#instituteDropdown').hide(500);
            }
            if( adminUserType ==='office_admin'){
                $('#officeDropdown').show(500);
                $('#office').attr('required',true).attr('name','office');
                $('#department').attr('required',false).attr('name','');
                $('#institute').attr('required',false).attr('name','');
                $('#departmentDropdown').hide(500);
                $('#instituteDropdown').hide(500);
            }
            if( adminUserType ==='institute_admin'){
                $('#instituteDropdown').show(500);
                $('#institute').attr('required',true).attr('name','institute');
                $('#department').attr('required',false).attr('name','');
                $('#office').attr('required',false).attr('name','');
                $('#departmentDropdown').hide(500);
                $('#officeDropdown').hide(500);
            }
            if( adminUserType ==='super_admin'){
                $('#institute').attr('required',false).attr('name','');
                $('#department').attr('required',false).attr('name','');
                $('#office').attr('required',false).attr('name','');
                $('#departmentDropdown').hide(500);
                $('#instituteDropdown').hide(500);
                $('#officeDropdown').hide(500);
            }
        })

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
