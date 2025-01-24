@extends('layouts.frontend.master')
@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">{{$latest_news_title->page_title??null}}</h1>
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
                        <li class="active">{{$latest_news_title->page_title??null}}</li>
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
                    <h2 class="ui-title-block">{{$latest_news_title->page_title??null}}</h2>
                    <div class="ui-subtitle-block">{{$latest_news_title->page_sub_title??null}}</div>
                    <div class="ui-decor"></div>
                </div>
                <main class="" style="margin-top: 50px">
                    <!-- end .filter-goods-->
                    <div class="goods-group-2 list-goods list-goods_th">
                        @if($newses)
                            @foreach($newses as $news)
                                <section class="b-goods-1 b-goods-1_mod-a">
                                    <div class="row">
                                        <section class="b-post b-post-1 clearfix" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                            <div class="entry-media">
                                                <img class="img-responsive"
                                                     src="{{ isset($news->image)?asset($news->image):'' }}"
                                                     alt="Foto"/>
                                            </div>
                                            <div class="entry-main">
                                                <div class="entry-header">
                                                    <div class="entry-meta">
                                                        <div class="entry-meta__face">
                                                            <img class="img-responsive"
                                                                 src="{{ isset($news->admin_created->image)?asset($news->admin_created->image):Avatar::create($news->admin_created->name)->toBase64() }}"
                                                                 alt="face"/>
                                                        </div>
                                                        <span class="entry-meta__item">Post by<a
                                                                class="entry-meta__link"
                                                                href="{{route('news.show',$news->slug)}}"> {{$news->admin_created->name??''}}</a></span>
                                                    </div>
                                                    <h2 class="entry-title"><a
                                                            href="{{route('news.show',$news->slug)}}">{{$news->title??''}}</a></h2>
                                                </div>
                                                <div class="entry-content">
                                                    <p>{{$news->short_description??''}}</p>
                                                </div>
                                                <div class="entry-footer">
                                                    <div class="entry-footer__inner">
                                                        <div class="b-post-social">

                                                        </div>
                                                        <div class="entry-meta"><span class="entry-meta__item"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                            @endforeach
                        @endif

                    </div>
                {{ $newses->links() }}
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
