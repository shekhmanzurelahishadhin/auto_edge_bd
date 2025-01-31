@extends('layouts.master')
@section('title')
    Model
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Model
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
                            <h4 class="card-title mb-0">Show Model</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('model.index')
                                <a href="{{ route('admin.model.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <h4>Model: {{ $model->title??null }}</h4>
                    <h4>brand: {{ $model->brand->title??null }}</h4>
                    <p class="py-2 fs-5 text-muted">Status: @if($model->deleted_at)
                            <span class="badge rounded-pill badge-soft-danger">Trashed</span>
                        @else
                            @if ($model->status == true)
                                <span class="badge rounded-pill badge-soft-success">Published</span>
                            @endif
                            @if ($model->status == false)
                                <span class="badge rounded-pill badge-soft-danger">Unpublished</span>
                            @endif
                        @endif
                    </p>

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
