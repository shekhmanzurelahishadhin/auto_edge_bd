@extends('layouts.frontend.master')


@section('content')
    <div class="main-slider main-slider-1">
        <div class="slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="700px" data-slider-arrows="true" data-slider-buttons="false">
            <div class="sp-slides">

                @if(isset($sliders))
                    @foreach($sliders as $slider)
                        <div class="sp-slide">
                            <img class="sp-image" src="{{ asset($slider->image??null) }}"
                                 alt="slider"/>
                            @if(isset($slider->title))
                                <div class="main-slider__wrap sp-layer" data-width="" data-position="centerLeft"
                                     data-horizontal="62%" data-show-transition="left" data-hide-transition="left"
                                     data-show-duration="2000" data-show-delay="1200" data-hide-delay="400">
                                    <div class="main-slider__title"><span class="main-slider__label bg-primary"></span>
                                    </div>
                                    <div class="main-slider__subtitle">{{$slider->title??null}}</div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- end .main-slider-->
    <!-- end .section-news-->
    <div class="section-default">
        <div class="b-brands owl-carousel owl-theme enable-owl-carousel" data-min768="2" data-min992="5"
             data-min1200="6" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000"
             data-stop-on-hover="true">
            @if(isset($brands))
                @foreach($brands as $brand)
                    <div class="b-brands__item">
                        <div class="b-brands__img">
                            <img class="img-responsive" src="{{ asset($brand->image) }}" alt="foto"/>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <!-- end .b-brands-->
    </div>
    <!-- end .section-default-->
    <div class="block-table block-table_xs">
        <div class="block-table__cell col-md-6">
            <div class="block-table__inner">
                <img class="b-services__img" style="width: 100% !important;" src="{{ asset(isset($about->image)?$about->image:'') }}" alt="foto">
            </div>
        </div>
        <div class="block-table__cell col-md-6 bg-grey">
            <div class="block-table__inner">
                <section class="b-services">
                    <h2 class="ui-title-block">{{$about_title->page_title??null}}</h2>
                    <div class="ui-subtitle-block">{{$about_title->page_sub_title??null}}</div>
                    <div class="ui-decor"></div>
                    <div class="b-services__content">
                        {!! $about->short_details??null !!}
                    </div><a class="btn btn-dark" href="{{route('about')}}">Learn More</a>
                </section>
                <!-- end .b-services-->
            </div>
        </div>
    </div>
    <!-- end .section-filter-->
    <section class="section-default">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <h2 class="ui-title-block">{{$featured_vehicle_title->page_title??null}}</h2>
                        <div class="ui-subtitle-block">{{$featured_vehicle_title->page_sub_title??null}}</div>
                        <div class="ui-decor"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured-carousel owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="5" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
           @forelse($vehicles as $vehicle)
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
            <!-- end .b-goods-featured-->
        </div>
        <!-- end .featured-carousel-->
    </section>

    <!-- end .section-default-->
    <section class="section-isotope">
        <div class="section-isotope__header bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <h2 class="ui-title-block">{{$photo_gallery_title->page_title??null}}</h2>
                            <div class="ui-subtitle-block">{{$photo_gallery_title->page_sub_title??null}}</div>
                            <div class="ui-decor"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-isotope">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="b-isotope-filter list-inline">
                            <li class="current"><a href="#" data-filter="*">all</a>
                            </li>
                            @if(isset($gallery_categories))
                                @foreach($gallery_categories as $category)
                                    <li><a href="#" data-filter=".item{{$category->id}}">{{$category->title}}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="b-isotope-grid grid list-unstyled">
                <li class="grid-sizer"></li>
                @if($galleries)
                    @foreach($galleries as $category)
                        @foreach($category->galleries as $gallery)
                            <li class="b-isotope-grid__item grid-item top item{{ $category->id }}">
                                <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset($gallery->image) }}">
                                    <img src="{{ asset($gallery->image) }}" alt="foto"/>
                                    <span class="b-isotope-grid__wrap-info helper">
                        <span class="b-isotope-grid__info"><i class="icon fa fa-search"></i></span>
                    </span>
                                </a>
                            </li>
                        @endforeach
                    @endforeach
                @endif
            </ul>
        </div>
        <!-- end .b-isotope-->
    </section>

    <!-- end .section-default-->
    <section class="section-news area-bg area-bg_light area-bg_op_90 parallax">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <h2 class="ui-title-block">{{$latest_news_title->page_title??null}}</h2>
                            <div class="ui-subtitle-block">{{$latest_news_title->page_sub_title??null}}</div>
                            <div class="ui-decor"></div>
                        </div>
                        <div class="carousel-news owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel"
                             data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false"
                             data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">

                            @if($newses)
                                @foreach($newses as $news)
                                    <section class="b-post b-post-1 clearfix">
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
                                                    <span class="entry-meta__item">Post by<a class="entry-meta__link"
                                                                                             href="{{route('news.show',$news->slug)}}"> {{$news->admin_created->name??''}}</a></span>
                                                </div>
                                                <h2 class="entry-title"><a href="{{route('news.show',$news->slug)}}">{{$news->title??''}}</a></h2>
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
                                @endforeach
                            @endif

                        </div>
                        <!-- end .carousel-news-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end .section-default-->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="b-subscribe area-bg area-bg_prim area-bg_op_90 parallax" style="background-image: url({{ asset('assets') }}/media/components/b-subscribe/bg.jpg)">
                    <div class="area-bg__inner">
                        <div class="b-subscribe__info">{{$subscribe_title->page_title??null}}</div>
                        <h2 class="b-subscribe__title">{{$subscribe_title->page_sub_title??null}}</h2>
                        <form class="b-subscribe__form ui-form" id="subscribeForm">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter your email ..." name="email" required="required" />
                                <button class="b-subscribe__submit" id="subscriveBtn"><i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end .b-subscribe-->
    <div class="block-table">
        <div class="block-table__cell col-md-6">
            <div class="block-table__inner">
                <section class="section-form-contacts">
                    <div class="section-form-contacts__label">Get in Touch</div>
                    <h2 class="section-form-contacts__title">{{$contact_us_title->page_title??null}}</h2>
                    <div class="section-form-contacts__info">{{$contact_us_title->page_sub_title??null}}</div>
                    <div id="success"></div>
                    <form class="b-form-contacts ui-form" id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="user-name" type="text" name="name" placeholder="Name*" required="required" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="user-phone" type="tel" name="phone" placeholder="Phone" required="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="user-email" type="email" name="email" placeholder="Email *" required="required" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control last-block_mrg-btn_0" id="user-subject" type="text" name="subject" placeholder="Subject" required="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="message" name="message" rows="7" placeholder="Message *" required="required"></textarea>
                                <button class="btn btn-white btn-lg" id="sendMessage">Send Message</button>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- end .b-form-contact-->
            </div>
        </div>
        <div class="block-table__cell col-md-6">
            <div class="block-table__inner">
                {!! $website_maps->value??null !!}
            </div>
        </div>
    </div>
    <!-- end .block-table-->

@endsection



@push('customCss')
@endpush


@push('js')
@endpush

@push('customJs')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#subscriveBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#subscribeForm').serialize(),
                url: "{{ url('subscribe') }}",
                type: "POST",
                dataType: 'json',
                success: function(result) {
                    if(result.errors)
                    {
                        $('#subscribeForm').trigger("reset");
                        if(result.message){
                            toastr.error(result.message);
                        }
                    }
                    else
                    {
                        $('#subscribeForm').trigger("reset");
                        toastr.success(result.message);
                    }
                },
                error: function(data) {
                    $('#subscribeForm').trigger("reset");
                }
            });
        });
        $('#sendMessage').click(function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#contactForm').serialize(),
                url: "{{ url('send-message') }}",
                type: "POST",
                dataType: 'json',
                success: function(result) {
                    if(result.errors)
                    {
                        $('#contactForm').trigger("reset")
                        if(result.message){
                            toastr.error(result.message);
                        }

                    }
                    else
                    {
                        $('#contactForm').trigger("reset");
                        toastr.success(result.message);
                    }
                },
                error: function(data) {
                    $('#contactForm').trigger("reset");
                }
            });
        });
    </script>
@endpush
