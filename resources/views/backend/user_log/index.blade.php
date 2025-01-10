@extends('layouts.master')
@section('title')
    {{--    @lang('translation.alerts')--}}
    User Activity Logs
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            User Activity Logs
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
                            <h4 class="card-title mb-0">Users Activity Logs</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('logs.download')
                                <a href="{{ route('admin.log.pdf') }}" data-toggle="tooltip" title=""
                                    data-placement="bottom" class="btn bg-secondary text-white"
                                    data-original-title="Download PDF">
                                    <i class="bx bx-download"></i> Download PDF
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.delete.all.log') }}" method="post">
                        @csrf
                        <div id="buttons-datatables_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <table id="buttons-datatables" class="display table table-bordered dataTable no-footer"
                                style="width: 100%;" aria-describedby="buttons-datatables_info">
                                <thead>
                                    <tr>
                                        {{--<th width="10%">
                                            <div class="form-check form-check-danger mb-3">
                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                                <label class="form-check-label" for="selectAll">
                                                    Select All
                                                </label>
                                            </div>
                                        </th>--}}
                                        <th style="display: none">SL</th>
                                        <th>Working Module</th>
                                        <th>User Name</th>
                                        <th>User Role</th>
                                        <th>Event</th>
                                        <th>Created at</th>
                                        {{--<th>Action</th>--}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($audits as $key=>$audit)
                                        <tr>
                                            {{--<td>
                                                <div class="form-check form-check-outline form-check-danger mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="log-{{ $audit->id }}" value="{{ $audit->id }}"
                                                        name="logs[]">
                                                    <label class="form-check-label" for="log-{{ $audit->id }}">
                                                    </label>
                                                </div>
                                            </td>--}}
                                            <td style="display: none">{{ $audit->id }}</td>
                                            <td>{{ $audit->auditable_type }}</td>
                                            <td>{{ $audit->user->name ?? '' }}</td>
                                            <td>
                                                @if ($audit->user->roles)
                                                    @foreach ($audit->user->roles as $role)
                                                        <span
                                                            class="badge border text-primary">{{ $role->name ?? '' }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if ($audit->event == 'created')
                                                    <span class="badge bg-success text-uppercase">{{ $audit->event }}</span>
                                                @elseif($audit->event == 'updated')
                                                    <span
                                                        class="badge bg-primary text-uppercase">{{ $audit->event }}</span>
                                                @else
                                                    <span class="badge bg-danger text-uppercase">{{ $audit->event }}</span>
                                                @endif

                                            </td>
                                            <td>{{ $audit->created_at->format('d-m-Y h:i:s') }}</td>
                                            {{--<td>
                                                <a href="{{ route('admin.delete.log', $audit->id) }}"
                                                    onclick="return confirm('Are you sure to delete?')"
                                                    class="btn btn-danger"> <i class="bx bx-trash"></i></a>
                                            </td>--}}
                                        </tr>

                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-danger" id="log-delete-btn">Delete All Logs</button>
                        </div>
                    </form>
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
                order: [[0, 'desc']],
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf'
                ]
            });
        });

            // Listen for click on toggle checkbox
            $('#selectAll').on('click', function() {
                $('#log-delete-btn').show(400);
                if (this.checked) {
                    // Iterate each checkbox
                    $(':checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });
                    $('#log-delete-btn').hide(400);
                }
            });
        </script>
    @endpush
