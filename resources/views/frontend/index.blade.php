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
    <section class="b-about section-default">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="">
                        <h2 class="ui-title-block">{{$about_title->page_title??null}}</h2>
                        <div class="ui-subtitle-block">{{$about_title->page_sub_title??null}}</div>
                        <div class="ui-decor"></div>
                        <div class="b-about-main">
                            {!! $about->short_details??null !!}
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
    <!-- end .section-filter-->
    <section class="section-default">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <h2 class="ui-title-block">Featured Vehicles</h2>
                        <div class="ui-subtitle-block">Tempor incididunt labore dolore magna alique</div>
                        <div class="ui-decor"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured-carousel owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="5" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-5.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-1.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-2.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Toyota Avalon TX</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-3.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-4.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-5.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-1.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-2.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Toyota Avalon TX</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-3.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
            <!-- end .b-goods-featured-->
            <div class="b-goods-feat">
                <div class="b-goods-feat__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-goods/featured-4.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                </div>
                <ul class="b-goods-feat__desc list-unstyled">
                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                    <li class="b-goods-feat__desc-item">Auto</li>
                    <li class="b-goods-feat__desc-item">320 hp</li>
                </ul>
                <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
            </div>
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
                            <h2 class="ui-title-block">Photo Gallery</h2>
                            <div class="ui-subtitle-block">Tempor incididunt labore dolore magna cillium fugiat</div>
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
    <section class="section-news area-bg area-bg_light area-bg_op_90 parallax" style="background-image: url({{ asset('assets') }}/media/content/bg/bg-7.jpg)">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <h2 class="ui-title-block">Latest News</h2>
                            <div class="ui-subtitle-block">Tempor incididunt labore dolore magna clium fugiat alique</div>
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
                        <div class="b-subscribe__info">Get the latest news from MotorLand</div>
                        <h2 class="b-subscribe__title">Subscribe to our newsletter</h2>
                        <form class="b-subscribe__form ui-form" id="subscribeForm" action="#" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter your email ..." required="required" />
                                <button class="b-subscribe__submit"><i class="fa fa-paper-plane"></i>
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
                    <h2 class="section-form-contacts__title">Send Us Message</h2>
                    <div class="section-form-contacts__info">MotorLand is nisi aliquip exa con velit esse cillum dolore fugiatal sint ipsum occaecat excepteur ipsum dolor sit amet consectetur.</div>
                    <div id="success"></div>
                    <form class="b-form-contacts ui-form" id="contactForm" action="#" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="user-name" type="text" name="user-name" placeholder="Name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="user-phone" type="tel" name="user-phone" placeholder="Phone" required="required" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="user-email" type="email" name="user-email" placeholder="Email" required="required" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control last-block_mrg-btn_0" id="user-subject" type="text" name="user-subject" placeholder="Subject" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="user-message" rows="7" placeholder="Message" required="required"></textarea>
                                <button class="btn btn-white btn-lg">Send Message</button>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- end .b-form-contact-->
            </div>
        </div>
        <div class="block-table__cell col-md-6">
            <div class="block-table__inner">
                <div class="map" id="map"></div>
            </div>
        </div>
    </div>
    <!-- end .block-table-->

@endsection



@push('customCss')
@endpush

@push('customCss')
@endpush

@push('js')
@endpush

@push('customJs')
    <script>

    </script>
@endpush
