@extends('layouts.master')
@section('title')
    Office
@endsection

@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Office
        @endslot
        @slot('sub_breadcrumb')
            Overview
        @endslot
    @endcomponent
    <!-- page title end-->
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4">
                <div class="bg-soft-primary">
                    <div class="card-body pb-0 px-4">
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-auto">
                                        <div class="avatar-md">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="{{ URL::asset('build/images/brands/slack.png') }}" alt="" class="avatar-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div>
                                            <h4 class="fw-bold">{{ $office->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('backend.office._nav')

                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 text-end">
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.office.staff.update',$officeStaff->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <input type="hidden" name="slug" value="{{ $office->slug }}" />
                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute  bottom-0 end-0">
                                                        <label for="customer-image-input" class="mb-0"  data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                            <div class="avatar-xs cursor-pointer">
                                                                <div class="avatar-title bg-light border rounded-circle text-muted">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" value="" name="profile_image" id="customer-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                    <div class="avatar-lg p-1">
                                                        <div class="avatar-title bg-light rounded-circle">
                                                            <img src="{{ isset($officeStaff->profile_image)? asset($officeStaff->profile_image):URL::asset('build/images/users/user-dummy-img.jpg') }}"
                                                                 alt="" id="customer-img" class="avatar-md rounded-circle object-cover" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" id="name"  name="name" class="form-control" value="{{ $officeStaff->name??old('name') }}" placeholder="Enter name"  required />
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="designation-field" class="form-label">Designation</label>
                                                <input type="text" name="designation" list="suggestions" id="designation-field"  value="{{ $officeStaff->designation??old('designation') }}" class="form-control" placeholder="Enter Designation"  required/>
                                                @error('designation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <datalist id="suggestions">
                                                @forelse($designations as $designation)
                                                    <option value="{{ $designation }}">
                                                @empty
                                                @endforelse
                                            </datalist>
                                        </div>

                                        <div class="col-lg-12">
                                            <div>
                                                <label for="email_id-field" class="form-label">Email ID</label>
                                                <input type="text" name="email" id="email_id-field"  value="{{ $officeStaff->email??old('email') }}" class="form-control" placeholder="Enter email"  required/>
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="phone-field" class="form-label">Phone</label>
                                                <input type="number" min="0" name="phone" id="phone-field"  value="{{ $officeStaff->phone??old('phone') }}" class="form-control" placeholder="Enter phone no"  required />
                                                @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div>
                                                <label for="phone-field" class="form-label">Wing</label>
                                                <input type="text" name="wing" id="wing"  value="{{ $officeStaff->wing??old('wing') }}" class="form-control" placeholder="Enter wing" />
                                                @error('wing')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 d-flex align-items-center">
                                            <div class="mb-3">
                                                <label class="d-block">Choose user type</label>
                                                {{--<div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="type" id="Head" @checked('Head'==$officeStaff->type) value="Head"  {{ old('type') =='Head'?'checked':'' }} required>
                                                    <label class="form-check-label" for="Head">Head</label>
                                                </div>--}}
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="type" id="Officer" @checked('Officer'==$officeStaff->type) value="Officer" {{ old('type') =='Officer'?'checked':'' }}  >
                                                    <label class="form-check-label" for="Officer">Officer</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="type" id="Staff" @checked('Staff'==$officeStaff->type) value="Staff"    {{ old('type') =='Staff'?'checked':'' }}>
                                                    <label class="form-check-label" for="Staff">Staff</label>
                                                </div>
                                                @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="sequence" class="form-label">Sequence</label>
                                                <select class="form-control" name="sequence" id="sequence" required>
                                                    <option value="" selected disabled>Select sequence</option>
                                                    @for($i=1; $i<=100;$i++)
                                                        <option @selected( $i == $officeStaff->sequence) {{ old('sequence') == $i?'selected':'' }} value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                @error('sequence')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex align-items-center">
                                            @if(!$officeStaff->user_id)
                                                <div class="form-check form-switch form-switch-md mt-2 pl-3" dir="ltr">
                                                    <input type="checkbox" class="form-check-input" name="user_create" id="profileAllow">
                                                    <label class="form-check-label" for="profileAllow">Allow Profile Create</label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="my-3 text-center">
                                        <button type="submit" class="btn btn-success" id="add-btn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('css')

@endpush
@push('page_js')
@endpush

@push('page_script')
    <script>
        // customer image
        document.querySelector("#customer-image-input").addEventListener("change", function () {
            var preview = document.querySelector("#customer-img");
            var file = document.querySelector("#customer-image-input").files[0];
            var reader = new FileReader();
            reader.addEventListener("load",function () {
                preview.src = reader.result;
            },false);
            if (file) {
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
