@extends('layouts.master')
@section('title')
    Gallery
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Gallery
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
                            <h4 class="card-title mb-0">Show Gallery</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('gallery.index')
                                <a href="{{ route('admin.gallery.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <img src="{{ asset($gallery->image) }}" class="img-fluid" alt="">
                    <p class="py-2 fs-5 text-muted">Status: @if($gallery->deleted_at)
                            <span class="badge rounded-pill badge-soft-danger">Trashed</span>
                        @else
                            @if ($gallery->status == true)
                                <span class="badge rounded-pill badge-soft-success">Published</span>
                            @endif
                            @if ($gallery->status == false)
                                <span class="badge rounded-pill badge-soft-danger">Unpublished</span>
                            @endif
                        @endif
                    </p>
                    <h4>{{ $gallery->title }}</h4>


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
