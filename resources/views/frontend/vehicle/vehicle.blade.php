@extends('layouts.frontend.master')
@section('content')
    <!-- end .header-->
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">{{$featured_vehicle_title->page_title??null}}</h1>
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
                        <li><a href="{{route('vehicles')}}">{{$featured_vehicle_title->page_title??null}}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <main class="l-main-content">
                    <div class="filter-goods">
                        <div class="filter-goods__info">
                        </div>
                        <div class="filter-goods__select"><span class="hidden-xs"></span>
                            <div class="btns-switch"><i class="btns-switch__item js-view-th active icon fa fa-th-large"></i><i class="btns-switch__item js-view-list icon fa fa-th-list"></i>
                            </div>
                        </div>
                    </div>
                    <!-- end .filter-goods-->
                    <div class="goods-group-2 list-goods list-goods_th" id="vehicleContainer">
                        @forelse($vehicles as $vehicle)
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="{{ asset($vehicle->main_image) }}">
                                        <img class="img-responsive" src="{{ asset($vehicle->main_image) }}" alt="foto" />
                                    </a>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header">
                                        <h2 class="b-goods-1__name"><a href="{{route('vehicles.show',$vehicle->slug)}}">{{$vehicle->title??null}}</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">
                                        {{$vehicle->short_description??null}}
                                    </div>
                                    <div class="b-goods-1__section">
                                        <div class="collapse in" id="desc-1">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">{{$vehicle->brand->title??null}}</li>
                                                <li class="b-goods-1__desc-item"> {{$vehicle->model->title??null}}</li>
                                                @if(isset($vehicle->year->title))
                                                <li class="b-goods-1__desc-item">{{$vehicle->year->title??null}}</li>
                                                @endif
                                                @if(isset($vehicle->fuel_type->title))
                                                <li class="b-goods-1__desc-item hidden-th">{{$vehicle->fuel_type->title??null}}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @empty
                            <div>No Data Found..</div>
                        @endforelse
                        <!-- end .b-goods-1-->
                    </div>
                {{ $vehicles->links() }}
                    <!-- end .goods-group-2-->
                </main>
                <!-- end .l-main-content-->
            </div>
            <div class="col-md-3 col-md-pull-9">
                <aside class="l-sidebar">
                    <form class="b-filter-2 bg-grey" id="filterForm">
                        <h3 class="b-filter-2__title">search options</h3>
                        <div class="b-filter-2__inner">
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">keyword</div>
                                <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Keyword..." />
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title" for="brand_id" style="margin-bottom: 10px">Brand</div>
                                <select class="select2 form-control" name="brand_id" id="brand_id" data-width="100%">
                                    <option value="">Select Brand</option>
                                    @forelse($brands as $brand)
                                    <option value="{{$brand->id??''}}" {{isset($searched_brand)?($searched_brand==$brand->id?'selected':''):''}}>{{$brand->title??''}}</option>
                                    @empty
                                    <option value="">No Data Found..</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title" style="margin-bottom: 10px">Model</div>
                                <select class="select2 form-control" id="model_id" name="model_id" data-width="100%">
                                    <option value="">Select Model</option>
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title" style="margin-bottom: 10px">Model Year</div>
                                <select class="select2 form-control" id="year_id" name="year_id" data-width="100%">
                                    <option value="">Select Year</option>
                                    @forelse($years as $year)
                                        <option value="{{$year->id??''}}" {{isset($searched_year)?($searched_year==$year->id?'selected':''):''}}>{{$year->title??''}}</option>
                                    @empty
                                        <option value="">No Data Found..</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title" style="margin-bottom: 10px">Fuel type</div>
                                <select class="select2 form-control" id="fuel_type_id" name="fuel_type_id" data-width="100%">
                                    <option value="">Select Fuel Types</option>
                                    @forelse($fuel_types as $fuel_type)
                                        <option value="{{$fuel_type->id??''}}">{{$fuel_type->title??''}}</option>
                                    @empty
                                        <option value="">No Data Found..</option>
                                    @endforelse
                                </select>

                            </div>
{{--                            <button class="btn btn-primary" id="searchBtn" style="width: 100%" type="button">Search</button>--}}
                        </div>
                    </form>
                    <!-- end .b-filter-->
                </aside>
                <!-- end .l-sidebar-->
            </div>
        </div>
    </div>
@endsection



@push('customCss')
    <link href="{{ asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .section-title-page {
            position: relative;
            height: 200px;
            margin-top: 166px;
            background: url({{ asset($banner) }}) !important;
        }
        .select2-selection {
            height: 47px !important;
            padding: 10px 0px;
            border: 1px solid #eaeaeb !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 45px !important;
            position: absolute;
            top: 1px;
            right: 5px !important;
            width: 20px;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('build/libs/select2/js/select2.full.min.js') }}"></script>
@endpush

@push('customJs')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('.select2').select2();
        });
        $(document).on('change','#brand_id',function () {
            var brand_id = $(this).val();

            $.ajax({
                type:"GET",
                url: "{{route('admin.getModelByBrandId')}}",
                data: {id:brand_id},
                dateType: "JSON",
                success: function (response) {
                    console.log(response)
                    var model_section = $('#model_id');
                    model_section.empty();
                    var option = '<option value="">Select Model</option>';
                    $.each(response, function (key, value){
                        option+= '<option value="'+value.id+'">'+value.title+'</option>'
                    })
                    model_section.append(option);
                }
            });
        })
        $('#keyword').on('keyup', function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#filterForm').serialize(),
                url: "{{ url('filter-vehicle') }}",
                type: "POST",
                dataType: 'json',
                success: function(result) {
                    if (result.errors || !result.html) {
                        $('#vehicleContainer').html('<div>No Data Found..</div>');
                    } else {
                        // Update the container with the response HTML
                        $('#vehicleContainer').html(result.html);
                    }
                },
                error: function(data) {
                    // Handle errors
                    $('#vehicleContainer').html('<div>No Data Found..</div>');
                }
            });
        });
        $('#brand_id, #model_id, #year_id, #fuel_type_id').on('change', function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#filterForm').serialize(),
                url: "{{ url('filter-vehicle') }}",
                type: "POST",
                dataType: 'json',
                success: function(result) {
                    if (result.errors || !result.html) {
                        $('#vehicleContainer').html('<div>No Data Found..</div>');
                    } else {
                        // Update the container with the response HTML
                        $('#vehicleContainer').html(result.html);
                    }
                },
                error: function(data) {
                    // Handle errors
                    $('#vehicleContainer').html('<div>No Data Found..</div>');
                }
            });
        });

    </script>
@endpush
