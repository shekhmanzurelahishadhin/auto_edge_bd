@extends('layouts.master')
@section('title')
    Recent Project
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Recent Project
        @endslot
        @slot('sub_breadcrumb')
            show
        @endslot
    @endcomponent
    <!-- page title end-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4 class="card-title mb-0">Show Recent Project</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('office-project.index')
                                <a href="{{ route('admin.office-project.index',$office_project->office_id) }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5">
                            @php
                                $extension = pathinfo(storage_path($office_project->attachment), PATHINFO_EXTENSION);
                            @endphp
                            @if($extension =='pdf')
                                <iframe  style="border:1px solid gray;width: 100%; height: 80vh" src="{{ asset($office_project->attachment) }}"></iframe>
                            @else
                                <img width="100%" src="{{ asset($office_project->attachment) }}" alt="">
                            @endif
                        </div>
                        <div class="col-lg-7">
                            <h1>{{ $office_project->title }}</h1>
                            <div>
                                {!! $office_project->description !!}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')

@endpush
@push('page_js')

@endpush
@push('page_script')

@endpush
