@extends('layouts.master')
@section('title')
    Gallery/Achievement
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Gallery/Achievement
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
                            <h4 class="card-title mb-0">Show Gallery/Achievement</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('office-achievement.index')
                                <a href="{{ route('admin.office-achievement.index',$office_achievement->office_id) }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <img src="{{ asset($office_achievement->image) }}" class="img-fluid" alt="">
                    <p class="py-2 fs-5 text-muted">Status: @if($office_achievement->deleted_at)
                            <span class="badge rounded-pill badge-soft-danger">Trashed</span>
                        @else
                            @if ($office_achievement->status == true)
                                <span class="badge rounded-pill badge-soft-success">Published</span>
                            @endif
                            @if ($office_achievement->status == false)
                                <span class="badge rounded-pill badge-soft-danger">Unpublished</span>
                            @endif
                        @endif
                    </p>
                    <h4>{{ $office_achievement->title }}</h4>


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
