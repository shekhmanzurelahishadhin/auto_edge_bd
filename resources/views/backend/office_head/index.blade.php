@extends('layouts.master')
@section('title')
    {{--    @lang('translation.alerts') --}}
    Office Head
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Office Head
        @endslot
        @slot('sub_breadcrumb')
            List
        @endslot
    @endcomponent
    <!-- page title end-->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Office Head</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('head-office.create')
                                <a href="{{ route('admin.head-office.create') }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                        <path
                                            d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"
                                            fill="rgba(255,255,255,1)"></path>
                                    </svg> Add New</a>
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
                                <th>S/N</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Joining Date</th>
                                <th>Resign Date</th>
                                <th>Office</th>
                                <th>Status</th>
                                <th>Updated By</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($heads as $key=>$data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <div class="flex-shrink-0 profile-img">
                                            <img src="{{ $data->image != null ? asset($data->image) : Avatar::create($data->name)->toBase64() }}"
                                                 width="48" class="mt-2 mr-3" alt="photo">
                                        </div>
                                    </td>
                                    <td> <h6>{{ $data->name }}</h6> </td>
                                    <td> <h6>{{ $data->email }}</h6> </td>
                                    <td> <h6>{{ $data->phone }}</h6> </td>
                                    <td> <h6>{{ $data->joining_date }}</h6> </td>
                                    <td> <h6>{{ $data->resign_date }}</h6> </td>
                                    <td> <h6>{{ $data->office->name??'' }}</h6> </td>
                                    <td>
                                        @if($data->deleted_at)
                                            <span class="badge rounded-pill badge-soft-danger">Trashed</span>
                                        @else
                                            @if ($data->status == true)
                                                <span class="badge rounded-pill badge-soft-success">Active</span>
                                            @endif
                                            @if ($data->status == false)
                                                <span class="badge rounded-pill badge-soft-danger">Inactive</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($data->admin->name))
                                            {{$data->admin->name??null}}<br>
                                            <small>({{ $data->updated_at->diffForHumans() }})</small>
                                        @elseif(isset($data->admin_created->name))
                                            {{$data->admin_created->name??null}}<br>
                                            <small>({{ $data->updated_at->diffForHumans() }})</small>
                                        @endif
                                    </td>
                                    <td class="text-center w-10">
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-success btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                     width="24" height="24" class="align-middle text-white">
                                                    <path
                                                        d="M5 10C3.9 10 3 10.9 3 12C3 13.1 3.9 14 5 14C6.1 14 7 13.1 7 12C7 10.9 6.1 10 5 10ZM19 10C17.9 10 17 10.9 17 12C17 13.1 17.9 14 19 14C20.1 14 21 13.1 21 12C21 10.9 20.1 10 19 10ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"
                                                        fill="rgba(255,255,255,1)">
                                                    </path>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                                @if($data->deleted_at)
                                                    @can('head-office.destroy')
                                                        <li>
                                                            <button onclick="deleteUser({{ $data->id }})"
                                                                    type="button" class="dropdown-item remove-item-btn"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete User">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </button>
                                                            <form id="delete-form-{{ $data->id }}"
                                                                  action="{{ route('admin.head-office.destroy', $data->id) }}"
                                                                  method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                               href="{{ route('admin.head-office.restore', $data->id) }}">
                                                                <i class="ri-refresh-fill align-bottom me-2 text-muted"></i>
                                                                Restore
                                                            </a>
                                                        </li>
                                                    @endcan
                                                @else
                                                    @can('head-office.edit')
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                               href="{{ route('admin.userProfile.edit', $data->user_id) }}" target="_blank">
                                                                <i class="ri-user-2-fill align-bottom me-2 text-muted"></i>
                                                                Manage Profile
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                               href="{{ route('admin.head-office.edit', $data->id) }}">
                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('head-office.destroy')
                                                        <li>
                                                            <button onclick="trashUser({{ $data->id }})"
                                                                    type="button" class="dropdown-item remove-item-btn"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete User">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Trash
                                                            </button>
                                                            <form id="trash-form-{{ $data->id }}"
                                                                  action="{{ route('admin.head-office.trash', $data->id) }}"
                                                                  method="POST" style="display: none;">
                                                                @csrf
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
                            'copy', 'csv', 'excel', 'print', 'pdf','colvis'
                        ],
                        "columnDefs": [
                            { "targets": [ 0 ], "visible": true},
                            { "targets": [ 1 ], "visible": true},
                            { "targets": [ 2 ], "visible": true},
                            { "targets": [ 3 ], "visible": true},
                            { "targets": [ 4 ], "visible": true},
                            { "targets": [ 5 ], "visible": false},
                            { "targets": [ 6 ], "visible": false},
                            { "targets": [ 7 ], "visible": true},
                            { "targets": [ 8 ], "visible": true},
                            { "targets": [ 9 ], "visible": true},
                            { "targets": [ 10 ], "visible": true},

                        ],
                    });
                });
                // sweet alert active
                function trashUser(id) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: true
                    })

                    swalWithBootstrapButtons.fire({
                        title: 'Are you sure?',
                        text: "You are able to restore this anytime.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, trash it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            event.preventDefault();
                            document.getElementById('trash-form-' + id).submit();
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

                function deleteUser(id) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
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
