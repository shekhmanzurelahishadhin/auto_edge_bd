@extends('layouts.master')
@section('title')
    {{--    @lang('translation.alerts')--}}
    Role
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Role
        @endslot
        @slot('sub_breadcrumb')
            Edit
        @endslot
    @endcomponent
    <!-- page title end-->

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title mb-0">Role Edit</h4>
                            </div>
                            <div class="col-md-6 text-end">
                                @can('roles.index')
                                    <a href="{{ route('admin.roles.index') }}" class="btn dark-icon btn-danger"><i
                                            class="fa fa-reply"></i> Back to list</a>
                                @endcan
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('admin.roles.update', $role->id) }}">
                            @csrf
                            @if (isset($role))
                                @method('PUT')
                            @endif
                            <div class="mb-3">
                                <label for="role_name" class="form-label font-bold">Role Name</label>
                                <input type="text" class="form-control @error('role_name') is-invalid @enderror"
                                    id="role_name" name="role_name" value="{{ $role->name ?? old('role_name') }}"
                                    placeholder="Enter role name" />
                                @error('role_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 class="mb-0">Manage permissions for role</h4>
                                    <br>
                                    @error('permissions')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead class="">
                                    <tr>
                                        <th>Modules</th>
                                        <th width="7%">
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="selectAll">
                                                <label class="custom-control-label" for="selectAll">Check All</label>
                                            </div>
                                        </th>
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($modules as $key=>$module)
                                        <tr>
                                            <td> <strong class="font-16">{{ $module->name }}</strong></td>
                                            <td>
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input moduleCheck"
                                                        id="single-module-{{ $module->id }}">
                                                    <label class="custom-control-label"
                                                        for="single-module-{{ $module->id }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    @foreach ($module->permissions as $key => $permission)
                                                        <div class="col">
                                                            <div
                                                                class="custom-control custom-checkbox custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="permission-{{ $permission->id }}"
                                                                    @if ($role) @foreach ($role->permissions as $rolePermission)
                                                                       {{ $rolePermission->id == $permission->id ? 'checked' : '' }}
                                                                   @endforeach @endif
                                                                    value="{{ $permission->id }}" name="permissions[]">
                                                                <label class="custom-control-label"
                                                                    for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <strong>No module found.</strong>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-arrow-circle-up"></i> UPDATE PERMISSIONS
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_js')
    <script src="{{ asset('build/js/jquery-3.7.0.min.js') }}"></script>@endpush
@push('page_script')
    <script>
        // Listen for click on toggle checkbox
        $('#selectAll').on('click', function() {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
        $('.moduleCheck').on('click', function() {
            if (this.checked) {
                // Iterate each checkbox
                $(this).parent().parent().parent().find(':checkbox').each(function(i) {
                    this.checked = true;
                });
            } else {
                $(this).parent().parent().parent().find(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
