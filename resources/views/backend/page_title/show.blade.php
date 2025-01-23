
@extends('layouts.master')
@section('title')
    Journal Books
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Journal Books
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
                            <h4 class="card-title mb-0">Show Journal Books</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('volume-journal.index')
                                <a href="{{ route('admin.volume-journal.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            @if (pathinfo($volume_journal->attachment, PATHINFO_EXTENSION) == 'pdf')
                                <div class="row justify-content-center">
                                    <iframe src="{{ asset($volume_journal->attachment) }}" width="50%" height="600">
                                        This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset($volume_journal->attachment) }}">Download PDF</a>
                                    </iframe>
                                </div>
                            @else
                                <img src="{{ asset($volume_journal->attachment) }}" class="img-fluid" alt="">
                            @endif
                            <p class="fs-5 text-muted mt-3">Status: @if($volume_journal->deleted_at)
                                    <span class="badge rounded-pill badge-soft-danger">Trashed</span>
                                @else
                                    @if ($volume_journal->status == true)
                                        <span class="badge rounded-pill badge-soft-success">Published</span>
                                    @endif
                                    @if ($volume_journal->status == false)
                                        <span class="badge rounded-pill badge-soft-danger">Unpublished</span>
                                    @endif
                                @endif
                            </p>
                            <p class="fs-5">Writer: {{ $volume_journal->writer_name }}</p>
                            <p class="fs-5">Journal: {{ $volume_journal->journal->title??null }}</p>
                            <p class="fs-5">Volume: {{ $volume_journal->volume->title??null }}</p>

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
