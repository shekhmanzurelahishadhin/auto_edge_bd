@extends('layouts.frontend.master')
@section('content')
    <!-- end .header-->
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">Vehicle Details</h1>
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
                        <li><a href="{{route('root')}}"><i class="icon fa fa-home"></i></a>
                        </li>
                        <li><a href="{{route('vehicles')}}">Vehicles</a>
                        </li>
                        <li class="active">Vehicle Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <main class="l-main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="b-car-details">
                        <div class="b-car-details__header">
                            <h2 class="b-car-details__title">{{$vehicle->title??null}}</h2>
                        </div>
                        <div class="slider-car-details slider-pro" id="slider-car-details">
                            <div class="sp-slides">
{{--                                <div class="sp-slide">--}}
{{--                                    <img class="sp-image" src="{{asset($vehicle->main_image)}}" alt="img" />--}}
{{--                                </div>--}}
                                @forelse($vehicle->other_images as $image)
                                <div class="sp-slide">
                                    <img class="sp-image" src="{{asset($image->image)}}" alt="img" />
                                </div>
                                @empty
                                @endforelse

                            </div>
                            <div class="sp-thumbnails">
{{--                                <div class="sp-thumbnail">--}}
{{--                                    <img class="img-responsive" src="{{asset($vehicle->main_image)}}" alt="img" />--}}
{{--                                </div>--}}
                                @forelse($vehicle->other_images as $image)
                                    <div class="sp-thumbnail">
                                        <img class="img-responsive" src="{{asset($image->image)}}" alt="img" />
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <!-- end .b-thumb-slider-->
                        <div class="b-car-details__section">
                            <h3 class="b-car-details__section-title ui-title-inner">Car Overview</h3>
                            {!! $vehicle->description !!}
                        </div>

                    </section>
                </div>
                <div class="col-md-4">
                    <aside class="l-sidebar-2">
                        <div class="b-car-info">
                            <dl class="b-car-info__desc dl-horizontal bg-grey">
                                <dt class="b-car-info__desc-dt">Brand</dt>
                                <dd class="b-car-info__desc-dd">{{ $vehicle->brand->title??null }}</dd>
                                @if(isset($vehicle->year->title))
                                <dt class="b-car-info__desc-dt">year</dt>
                                <dd class="b-car-info__desc-dd">{{ $vehicle->year->title??null }}</dd>
                                @endif
                                <dt class="b-car-info__desc-dt">Model</dt>
                                <dd class="b-car-info__desc-dd">{{ $vehicle->model->title??null }}</dd>
                                @if(isset($vehicle->fuel_type->title))
                                <dt class="b-car-info__desc-dt">Fuel Type</dt>
                                <dd class="b-car-info__desc-dd">{{ $vehicle->fuel_type->title??null }}</dd>
                                @endif
                            </dl>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <!-- end .b-car-details-->
        <section class="section-default_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="ui-title-block">Related Cars</h2>
                        <div class="ui-decor"></div>
                        <div class="related-carousel owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
                            @forelse($related_vehicles as $vehicle)
                                <div class="b-goods-feat">
                                    <div class="b-goods-feat__img">
                                        <img class="img-responsive" src="{{ asset($vehicle->main_image) }}" alt="foto" />
                                    </div>
                                    <ul class="b-goods-feat__desc list-unstyled">
                                        <li class="b-goods-feat__desc-item">Brand: {{$vehicle->brand->title??null}}</li>
                                        <li class="b-goods-feat__desc-item">Model: {{$vehicle->model->title??null}}</li>
                                        @if(isset($vehicle->year->title))
                                            <li class="b-goods-feat__desc-item">Year: {{$vehicle->year->title??null}}</li>
                                        @endif
                                        @if(isset($vehicle->fuel_type->title))
                                            <li class="b-goods-feat__desc-item">Fuel Type: {{$vehicle->fuel_type->title??null}}</li>
                                        @endif
                                    </ul>
                                    <h3 class="b-goods-feat__name"><a href="{{route('vehicles.show',$vehicle->slug)}}">{{$vehicle->title??null}}</a></h3>
                                    <div class="b-goods-feat__info">{{$vehicle->short_description??null}}</div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <!-- end .related-carousel-->
                    </div>
                </div>
            </div>
        </section>
        <!-- end .section-default_top-->
    </main>
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
