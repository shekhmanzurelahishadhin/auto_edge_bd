@extends('layouts.frontend.master')
@section('content')
    <!-- end .header-->
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
                        <li><a href="{{route('news')}}">{{$latest_news_title->page_title??null}}</a>
                        </li>
                        <li class="active">Full News</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <main class="l-main-content">
                    <article class="b-post b-post-full clearfix">
                        <div class="entry-media">
                            <a class="js-zoom-images" href="{{ isset($news->image)?asset($news->image):'' }}">
                                <img class="img-responsive" src="{{ isset($news->image)?asset($news->image):'' }}" alt="Foto" />
                            </a>
                        </div>
                        <div class="entry-main">
                            <div class="entry-meta">
                                <div class="entry-meta__group-left"><span class="entry-meta__item">Post by<a class="entry-meta__link" href=""> {{$news->admin_created->name??''}}</a></span><span class="entry-meta__item">On<a class="entry-meta__link" href=""> {{$news->created_at->format('F j, Y')??''}}</a></span>
                                </div>

                            </div>
                            <div class="entry-header">
                                <h2 class="entry-title"><a href="">{{$news->title??''}}</a></h2>
                            </div>
                          {!! $news->description??null !!}
                        </div>
                    </article>
                    <!-- end .post-->
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
    </style>
@endpush

@push('js')
@endpush

@push('customJs')
    <script>

    </script>
@endpush
