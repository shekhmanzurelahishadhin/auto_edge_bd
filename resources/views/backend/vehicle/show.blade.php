@extends('layouts.master')
@section('title')
    Vehicle
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Vehicle
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
                            <h4 class="card-title mb-0">Show Vehicle</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('vehicle.index')
                                <a href="{{ route('admin.vehicle.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <img src="{{ asset($vehicle->main_image) }}" alt="">
                    <h1>Name: {{ $vehicle->title??null }}</h1>
                    <p><b>Status: </b>
                        @if($vehicle->deleted_at)
                            <span class="badge rounded-pill badge-soft-danger">Trashed</span>
                        @else
                            @if ($vehicle->status == true)
                                <span class="badge rounded-pill badge-soft-success">Active</span>
                            @endif
                            @if ($vehicle->status == false)
                                <span class="badge rounded-pill badge-soft-danger">Inactive</span>
                            @endif
                        @endif
                    </p>
                    <p><b>Brand: </b>{{ $vehicle->brand->title??null }}</p>
                    <p><b>Model: </b>{{ $vehicle->model->title??null }}</p>
                    <p><b>Year: </b>{{ $vehicle->year->title??null }}</p>
                    <p><b>Fuel Type: </b>{{ $vehicle->fuel_type->title??null }}</p>
                    <p><b>Short Description: </b>{{ $vehicle->short_description??null }}</p>
                    <div><b>Description:</b><br>
                        {!! $vehicle->description !!}
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
