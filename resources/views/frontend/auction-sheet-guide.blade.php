@extends('layouts.frontend.master')
@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">{{$auction_sheet_guide_title->page_title??null}}</h1>
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
                        <li class="active">{{$auction_sheet_guide_title->page_title??null}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <div class="container">
        <div class="row" style="margin-top: 60px">
            <div class="col-md-12">
                <div class="text-center">
                    <h2 class="ui-title-block">{{$auction_sheet_guide_title->page_title??null}}</h2>
                    <div class="ui-subtitle-block">{{$auction_sheet_guide_title->page_sub_title??null}}</div>
                    <div class="ui-decor"></div>
                </div>
                <main class="" style="margin-top: 20px;margin-bottom: 50px">
                    <!-- end .filter-goods-->
                    <div class="row bg-primary" style="margin-bottom: 20px;padding: 5px 10px">
                        <h5 class="" style="color: white;">&nbsp;&nbsp;{{$about_auction->title??''}}</h5>
                    </div>
                    <div style="margin-bottom: 20px">
                        {!! $about_auction->details??'' !!}
                    </div>
                    @forelse($auction_categories as $category)
                    <div class="row bg-gray" style="margin-bottom: 20px;padding: 5px 10px;background-color: gainsboro">
                        <h5 class="" style="color: black;">&nbsp;&nbsp;{{$category->title??''}}</h5>
                    </div>

                    <div class="row" style="margin-bottom: 20px">
                        @forelse($category->grades as $key=>$grade)
                            <div class="col-sm-12 col-md-6">
                                <div class="row" style="border: 1px solid gainsboro">
                                    <div class="col-sm-2 col-md-2" style="font-size: 20px;background-color: #FF8F00;height: 50px"><b>{{$grade->grade??''}}</b></div>
                                    <div class="col-sm-10 col-md-10" style="height: 100%"><p style="">{{$grade->grade_details??''}}</p></div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                    @empty
                    @endforelse
                    <div class="row bg-primary" style="margin-bottom: 20px;padding: 5px 10px">
                        <h5 class="" style="color: white;">&nbsp;&nbsp;{{$about_auction->example_title??''}}</h5>
                    </div>
                    <div class="row">
                        @forelse($auction_sheets as $sheet)
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail">
                                    <img src="{{$sheet->image??''}}" style="height: 250px" width="250px" alt="...">
                                    <div class="">
                                        <h5 style="text-align: center">{{$sheet->title??''}}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                    <div class="row bg-primary" style="margin-bottom: 20px;padding: 5px 10px">
                        <h5 class="" style="color: white;">&nbsp;&nbsp;{{$about_auction->result_title??''}}</h5>
                    </div>
                    <div style="margin-bottom: 20px">
                        <table class="table table-hover">
                            <thead style="background-color: gainsboro;">
                            <tr>
                                <th scope="col" style="width: 70%">Bidding Outcomes</th>
                                <th scope="col" style="width: 30%">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($bidding_results as $result)
                            <tr>
                                <td>{{$result->outcomes??''}}</td>
                                <td><b>{{$result->outcomes_status??''}}</b></td>
                            </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <p><b>Disclaimer :</b></p>
                    <div style="margin-bottom: 20px">
                        {!! $about_auction->disclaimer??'' !!}
                    </div>
                <!-- end .goods-group-2-->
                </main>
                <!-- end .l-main-content-->
            </div>
        </div>
    </div>
@endsection



@push('customCss')
    <style>
        .section-title-page {
            position: relative;
            height: 200px;
            margin-top: 166px;
            background: url({{ asset($banner) }}) !important;
        }
        .b-goods-1 {
            padding-top: 0px;
        }
    </style>
@endpush

@push('js')
@endpush

@push('customJs')
    <script>

    </script>
@endpush
