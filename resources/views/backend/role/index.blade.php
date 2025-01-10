@extends('layouts.master')
@section('title')
    {{--    @lang('translation.alerts')--}}
    Role
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Roles
        @endslot
        @slot('sub_breadcrumb')
            list
        @endslot
    @endcomponent
    <!-- page title end-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">@yield('title')</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('roles.create')
                                <a href="{{ route('admin.roles.create') }}" class="btn btn-info">
                                    <i class="fa fa-plus-circle fa-1x color-info"></i> Add New</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="buttons-datatables_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <table id="buttons-datatables" class="display table table-bordered dataTable no-footer"
                               style="width: 100%;" aria-describedby="buttons-datatables_info">
                            <thead>
                            <tr>
                                <th style="width:80px;"><strong>#</strong></th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Created At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $key => $role)
                                <tr class="">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if ($role->permissions->count() > 0)
                                            <div class="badge rounded-pill badge-soft-secondary">
                                                {{ $role->permissions->count() }}
                                            </div>
                                        @else
                                            <span class="badge rounded-pill badge-soft-danger">No permissions found
                                                    (:</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $role->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-success btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                     width="24" height="24" class="align-middle text-white">
                                                    <path
                                                        d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10ZM19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="rgba(255,255,255,1)">
                                                    </path>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" style="">

                                                <li>
                                                    <a class="dropdown-item edit-item-btn" href="{{ route('admin.roles.edit',$role->id) }}">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                                @if ($role->deletable == true)
                                                    @can('roles.destroy')
                                                        <li>
                                                            <button onclick="deleteRole({{ $role->id }})" type="button"
                                                                    class="dropdown-item remove-item-btn" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete Role">
                                                                <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </button>
                                                            <form id="delete-form-{{ $role->id }}"
                                                                  action="{{ route('admin.roles.destroy', $role->id) }}"
                                                                  method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>
                                                    @endcan
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="{{ asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Datatable css -->
    <x-datatable-cdn-css/>
@endpush
@push('page_js')
    <script src="{{ asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Datatable js -->
    <x-datatable-cdn-js/>
@endpush

@push('page_script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#buttons-datatables', {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf'
                ]
            });
        });
        // sweet alert active
        function deleteRole(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                    /* swalWithBootstrapButtons.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                     )*/
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })

        }
    </script>
@endpush
