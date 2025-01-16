@extends('layouts.master')
@section('title')
    News
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            News
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
                            <h4 class="card-title mb-0">Show News</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('news.index')
                                <a href="{{ route('admin.news.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <img src="{{ asset($news->image) }}" alt="">
                    <p class="py-2 fs-5 text-success">Published</p>
                    <h1>{{ $news->title }}</h1>
                    <div>
                        {!! $news->description !!}
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
