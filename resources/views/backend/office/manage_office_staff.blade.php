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
                            <button type="button" class="btn btn-primary add-btn fw-semibold" data-bs-toggle="modal" id="create-btn" data-bs-target="#showAddModal"><i class="ri-add-circle-line align-bottom me-1"></i> Add Office People</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div id="buttons-datatables_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer table-responsive">
                        <table id="buttons-datatables" class="display table table-bordered dataTable no-footer align-middle"
                               style="width: 100%;" aria-describedby="buttons-datatables_info">

                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Sequence</th>
                                <th>Joined At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($officeStaff as $office_staff)
                                <tr>
                                    <td width="2%">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img loading="lazy" src="{{ isset($office_staff->profile_image)?asset($office_staff->profile_image):asset('build/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-sm rounded-circle image_src object-cover">
                                            </div>
                                            <div class="flex-grow-1 ms-2 name fw-semibold">{{ $office_staff->name }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-soft-primary">{{ $office_staff->designation }}</span>
                                    </td>
                                    <td>{{ $office_staff->phone }}</td>
                                    <td>{{ $office_staff->email }}</td>
                                    <td>
                                        @if('Head' == $office_staff->type)
                                            <span class="badge badge-soft-success">{{ $office_staff->type }}</span>
                                        @elseif('Officer' == $office_staff->type)
                                            <span class="badge badge-soft-info">{{ $office_staff->type }}</span>
                                        @else
                                            <span class="badge badge-soft-warning">{{ $office_staff->type }}</span>
                                        @endif
                                    </td>
                                    <td><span class="badge rounded-pill badge-soft-dark">{{ $office_staff->sequence }}</span></td>
                                    <td>{{ $office_staff->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-4px, 29px);">

                                                @if($office_staff->deleted_at)
                                                    @can('office_staff.destroy')
                                                        <li>
                                                            <button onclick="deleteRecord({{ $office_staff->id }})"
                                                                    type="button" class="dropdown-item remove-item-btn"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete User">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </button>
                                                            <form id="delete-form-{{ $office_staff->id }}"
                                                                  action="{{ route('admin.office.staff.destroy', $office_staff->id) }}"
                                                                  method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item edit-item-btn"
                                                               href="{{ route('admin.office.staff.restore', $office_staff->id) }}">
                                                                <i class="ri-refresh-fill align-bottom me-2 text-muted"></i>
                                                                Restore
                                                            </a>
                                                        </li>
                                                    @endcan
                                                @else
                                                    @can('office_staff.edit')
                                                        @if(isset($office_staff->user_id))
                                                            <li>
                                                                <a class="dropdown-item edit-item-btn"
                                                                   href="{{ route('admin.userProfile.edit', $office_staff->user_id) }}" target="_blank">
                                                                    <i class="ri-user-2-fill align-bottom me-2 text-muted"></i>
                                                                    Manage Profile
                                                                </a>
                                                            </li>
                                                        @endif

                                                        <li>
                                                            <a class="dropdown-item edit-item-btn" href="{{ route('admin.office.staff.edit',$office_staff->id) }}">
                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit
                                                            </a>
                                                        </li>
                                                    @endcan
                                                    @can('office_staff.destroy')
                                                        <li>
                                                            <button onclick="trashRecord({{ $office_staff->id }})"
                                                                    type="button" class="dropdown-item remove-item-btn"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete User">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Trash
                                                            </button>
                                                            <form id="trash-form-{{ $office_staff->id }}"
                                                                  action="{{ route('admin.office.staff.trash', $office_staff->id) }}"
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
                    <!-- start add modal-->
                    @include('backend.office.staffAddModal')
                    <!--end add modal-->
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('css')
    <link href="{{ asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Datatable css -->
    <x-datatable-cdn-css/>
@endpush
@push('page_js')
    <script src="{{ asset('build/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('build/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>


    <!-- Datatable js -->
    <x-datatable-cdn-js/>
@endpush

@push('page_script')
    @if($errors->any())
        @if(Session::has('create_route'))
            <script>
                let addModal = new bootstrap.Modal(document.getElementById('showAddModal'))
                addModal.show()
            </script>
        @endif
        @if(Session::has('edit_route'))
            <script>
                // alert('here');
                let editModal = new bootstrap.Modal(document.getElementById('showEditModal'))
                editModal.show()
            </script>
        @endif
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let table = new DataTable('#buttons-datatables', {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf'
                ]
            });
        });

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

        /* trash record alert*/
        function trashRecord(id) {
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
        /* delete record alert*/
        function deleteRecord(id) {
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
                confirmButtonColor: '#f63636',
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
