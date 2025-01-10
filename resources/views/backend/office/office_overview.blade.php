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
                <div class="bg-soft-warning">
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
                                    <div class="col-md">
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
                <div class="card-body overflow-hidden">
                    <div class="row">
                        <div class="col-md-5">
                            <img loading="lazy" src="{{ asset($office->image) }}" class="img-thumbnail office-image" alt="">
                        </div>
                        <div class="col-md-7">
                            {!! $office->contact !!}
                        </div>
                    </div>
                    {!! $office->about !!}
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection
@push('customCss')
@endpush
@push('page_js')

@endpush
@push('page_script')
    <script>

    </script>
@endpush
