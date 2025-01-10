
@extends('layouts.master')
@section('title')
    Journal
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Journal
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
                            <h4 class="card-title mb-0">Show Journal</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('journal.index')
                                <a href="{{ route('admin.journal.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 col-md-5">
                            <img src="{{ asset($journal->image) }}" class="img-fluid" alt="">

                            <p class="fs-5 text-muted">Status: @if($journal->deleted_at)
                                    <span class="badge rounded-pill badge-soft-danger">Trashed</span>
                                @else
                                    @if ($journal->status == true)
                                        <span class="badge rounded-pill badge-soft-success">Published</span>
                                    @endif
                                    @if ($journal->status == false)
                                        <span class="badge rounded-pill badge-soft-danger">Unpublished</span>
                                    @endif
                                @endif
                            </p>
                            <p class="fs-5">Publishing Authority: {{ $journal->publishing_authority }}</p>
                            <p class="fs-5">Editor: {{ $journal->editor }}</p>
                            <p class="fs-5">Associate Editor: {{ $journal->associate_editor}}</p>
                            <p class="fs-5">Published Date: {{ $journal->published_at}}</p>
                        </div>
                        <div class="col-12 col-md-7">
                            <p class="mt-2 fs-5">{{ $journal->title }}</p>
                            <div>
                                {!! $journal->description !!}
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
