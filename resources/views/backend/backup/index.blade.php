@extends('layouts.master')
@section('title')
    {{--    @lang('translation.alerts') --}}
    Backups
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Backups
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
                            <h4 class="card-title mb-0">Backups</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('users.create')
                                <a href="{{ route('admin.backup.create') }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                        <path
                                            d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"
                                            fill="rgba(255,255,255,1)"></path>
                                    </svg> Add New Backup</a>
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
                                <th>#</th>
                                <th>File Name</th>
                                <th>Date</th>
                                <th>File size</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($backups as $k => $b)
                                <tr>
                                    <th scope="row">{{ $k + 1 }}</th>
                                    <td>{{ $b['file_name'] }}</td>
                                    <td>{{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}
                                    </td>
                                    <td>{{ round((int) $b['file_size'] / 1048576, 2) . ' MB' }}</td>
                                    <td>
                                        <a href="{{ Storage::disk('public')->url($b['file_name']) }}"  class="btn btn-primary text-white"><i class="bx bx-download"></i> Download</a>
                                        <a class="btn btn-danger text-white"
                                           href="{{ url(config('prefix', 'admin') . '/backup/delete/' . $b['file_name']) }}?disk={{ $b['disk'] }}"><i
                                                class="bx bx-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
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
            <!--datatable css-->
            <x-datatable-cdn-css/>
        @endpush
        @push('js')
            <script src="{{ asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
            <!--datatable js-->
            <x-datatable-cdn-js/>
        @endpush
        @push('customJs')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    let table = new DataTable('#buttons-datatables');
                });
                // sweet alert active
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
