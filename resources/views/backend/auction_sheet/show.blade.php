@extends('layouts.master')
@section('title')
    Auction Sheet
@endsection
@section('content')
    <!-- page title start-->
    @component('components.breadcrumb')
        @slot('first_breadcrumb')
            Auction Sheet
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
                            <h4 class="card-title mb-0">Show Auction Sheet</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            @can('auction-sheet.index')
                                <a href="{{ route('admin.auction-sheet.index') }}" class="btn dark-icon btn-danger"><i
                                        class="fa fa-reply"></i> Back to list</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <img src="{{ asset($auction_sheet->image) }}" class="img-fluid" alt="">
                    <p class="py-2 fs-5 text-muted">Status: @if($auction_sheet->deleted_at)
                            <span class="badge rounded-pill badge-soft-danger">Trashed</span>
                        @else
                            @if ($auction_sheet->status == true)
                                <span class="badge rounded-pill badge-soft-success">Published</span>
                            @endif
                            @if ($auction_sheet->status == false)
                                <span class="badge rounded-pill badge-soft-danger">Unpublished</span>
                            @endif
                        @endif
                    </p>
                    <h4>Title: {{ $auction_sheet->title }}</h4>


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
