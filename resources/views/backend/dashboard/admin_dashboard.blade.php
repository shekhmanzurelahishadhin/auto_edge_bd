@extends('layouts.master')
@section('title')  Dashboard @endsection

@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Dashboard
        @endslot
        @slot('sub_breadcrumb')
            ANALYTICS
        @endslot
    @endcomponent
    <!-- page title end-->
    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1">
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>{{ $faculty??0 }}</h4>
                        <h6 class="text-muted fs-13 mb-0">Faculty</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-soft-warning text-warning fs-22 rounded">
                            <i class="ri-git-repository-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>{{ $department??0 }}</h4>
                        <h6 class="text-muted fs-13 mb-0">Department</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-soft-success text-success fs-22 rounded">
                            <i class="ri-git-repository-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>{{ $institute??0 }}</h4>
                        <h6 class="text-muted fs-13 mb-0">Institute</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-soft-info text-info fs-22 rounded">
                            <i class="ri-git-repository-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->

        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>{{ $office??0 }}</h4>
                        <h6 class="text-muted fs-13 mb-0">Office</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-soft-primary text-primary fs-22 rounded">
                            <i class="ri-briefcase-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->

        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>{{ $research??0 }}</h4>
                        <h6 class="text-muted fs-13 mb-0">Research Project</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-soft-danger text-danger fs-22 rounded">
                            <i class="ri-file-search-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end col-->
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>{{ $publication??0 }}</h4>
                        <h6 class="text-muted fs-13 mb-0">Publications</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-soft-warning text-warning fs-22 rounded">
                            <i class="ri-newspaper-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="row">


    </div>


@endsection

@push('css')

@endpush
@push('page_js')

@endpush
