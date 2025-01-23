@extends('layouts.frontend.master')
@section('content')
    <!-- end .section-default-->
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">{{$title->page_title??''}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end .b-title-page-->
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('root')}}"><i class="icon fa fa-home"></i></a></li>
                        <li class="active">{{$title->page_title??''}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <section class="b-about section-default">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="">
                        <h2 class="ui-title-block">{{$title->page_title??''}}</h2>
                        <div class="ui-subtitle-block">{{$title->page_sub_title??''}}</div>
                        <div class="ui-decor"></div>
                        <div class="b-about-main">
                            {!! $about->long_details??null !!}
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 about-us-img-section">
                    <img src="{{ asset(isset($about->image)?$about->image:'') }}" class="" alt="">
                </div>
            </div>
        </div>
        <!-- end .b-about-->
    </section>
@endsection



@push('customCss')
    <style>
        .section-title-page {
            position: relative;
            height: 200px;
            margin-top: 166px;
            background: url({{ asset($banner) }}) !important;
        }
    </style>
@endpush

@push('js')
@endpush

@push('customJs')
    <script>

    </script>
@endpush
