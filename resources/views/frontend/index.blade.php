@extends('layouts.frontend.master')


@section('content')
    <div class="main-slider main-slider-1">
        <div class="slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="700px" data-slider-arrows="true" data-slider-buttons="false">
            <div class="sp-slides">

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
            </div>
        </div>
    </div>
    <!-- end .main-slider-->
    <!-- end .section-news-->
    <div class="section-default">
        <div class="b-brands owl-carousel owl-theme enable-owl-carousel" data-min768="2" data-min992="5" data-min1200="6" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
            <div class="b-brands__item">
                <div class="b-brands__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-brands/1.jpg" alt="foto" />
                </div>
            </div>
            <div class="b-brands__item">
                <div class="b-brands__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-brands/2.jpg" alt="foto" />
                </div>
            </div>
            <div class="b-brands__item">
                <div class="b-brands__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-brands/3.jpg" alt="foto" />
                </div>
            </div>
            <div class="b-brands__item">
                <div class="b-brands__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-brands/4.jpg" alt="foto" />
                </div>
            </div>
            <div class="b-brands__item">
                <div class="b-brands__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-brands/5.jpg" alt="foto" />
                </div>
            </div>
            <div class="b-brands__item">
                <div class="b-brands__img">
                    <img class="img-responsive" src="{{ asset('assets') }}/media/components/b-brands/6.jpg" alt="foto" />
                </div>
            </div>
        </div>
        <!-- end .b-brands-->
    </div>
    <!-- end .section-default-->
    <section class="b-about section-default">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="">
                        <h2 class="ui-title-block">About MotorLand</h2>
                        <div class="ui-subtitle-block">Tempor incididunt duis labore dolore magna aliqua sed ipsum</div>
                        <div class="ui-decor"></div>
                        <div class="b-about-main">
                            <div class="b-about-main__title">We are a Trusted Name in Auto Industry</div>
                            <div class="b-about-main__subtitle">Visited by Million of Car Buyers Every Month!</div>
                            <p>MotorLand is aliquip exd ea consequat duis lorem ipsum dolor sit amet consectetur dipis icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.</p>
                            <p>Slamco laboris nisi ut aliquip ex ea comdo consequat uis aute irure dolor raeprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <div class="b-about-main__btns"><a class="btn btn-dark" href="home.html">Our partners</a><a class="btn btn-primary" href="home.html">learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('assets') }}/media/components/b-main-slider/2.jpg" alt="">
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
                            <li><a href="#" data-filter=".sale">for sale</a>
                            </li>
                            <li><a href="#" data-filter=".new">new arrivals</a>
                            </li>
                            <li><a href="#" data-filter=".top">top brands</a>
                            </li>
                            <li><a href="#" data-filter=".ferrari">ferrari</a>
                            </li>
                            <li><a href="#" data-filter=".mercedes">mercedes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="b-isotope-grid grid list-unstyled">
                <li class="grid-sizer"></li>
                <li class="b-isotope-grid__item grid-item top mercedes">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/1.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/1.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale ferrari">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/2.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/2.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item new top mercedes">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/3.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/3.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale top">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/4.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/4.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale ferrari">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/5.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/5.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item new top mercedes">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/6.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/6.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale ferrari">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/7.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/7.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale top">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/8.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/8.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale mercedes">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/9.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/9.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item new">
                    <a class="b-isotope-grid__inner js-zoom-images" href="{{ asset('assets') }}/media/content/gallery/384x300/10.jpg">
                        <img src="{{ asset('assets') }}/media/content/gallery/384x300/10.jpg" alt="foto" /><span class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera 2018</span></span>
                                </span>
                    </a>
                </li>
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
                        <div class="carousel-news owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
                            <section class="b-post b-post-1 clearfix">
                                <div class="entry-media">
                                    <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/360x250/1.jpg" alt="Foto" />
                                </div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <div class="entry-meta__face">
                                                <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/face/76x76_1.jpg" alt="face" />
                                            </div><span class="entry-meta__item">Post by<a class="entry-meta__link" href="blog-main.html"> Thomas Neil</a></span><a class="entry-meta__categorie" href="blog-main.html"><strong>Ford News</strong></a>
                                        </div>
                                        <h2 class="entry-title"><a href="blog-post.html">Ford Motors overhauled its design team </a></h2>
                                    </div>
                                    <div class="entry-content">
                                        <p>Duis aute irure reprehender voluptate velits fugiat nulla pariatur excepteur ipsum doloe amet consecteur adipisicing elit.</p>
                                    </div>
                                    <div class="entry-footer">
                                        <div class="entry-footer__inner">
                                            <div class="b-post-social">SHARE
                                                <ul class="b-post-social__list list-inline">
                                                    <li><a href="twitter.html"><i class="icon fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="facebook.html"><i class="icon fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="plus.google.html"><i class="icon fa fa-google-plus"></i></a>
                                                    </li>
                                                    <li><a href="pinterest.html"><i class="icon fa fa-pinterest-p"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry-meta"><span class="entry-meta__item"><i class="entry-meta__icon fa fa-heart"></i>300</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end .post-->
                            <section class="b-post b-post-1 clearfix">
                                <div class="entry-media">
                                    <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/360x250/2.jpg" alt="Foto" />
                                </div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <div class="entry-meta__face">
                                                <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/face/76x76_2.jpg" alt="face" />
                                            </div><span class="entry-meta__item">Post by<a class="entry-meta__link" href="blog-main.html"> Thomas Neil</a></span><a class="entry-meta__categorie" href="blog-main.html"><strong>Driving</strong></a>
                                        </div>
                                        <h2 class="entry-title"><a href="blog-post.html">Self-driving legislation sets in the motion</a></h2>
                                    </div>
                                    <div class="entry-content">
                                        <p>Duis aute irure reprehender voluptate velits fugiat nulla pariatur excepteur ipsum doloe amet consecteur adipisicing elit.</p>
                                    </div>
                                    <div class="entry-footer">
                                        <div class="entry-footer__inner">
                                            <div class="b-post-social">SHARE
                                                <ul class="b-post-social__list list-inline">
                                                    <li><a href="twitter.html"><i class="icon fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="facebook.html"><i class="icon fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="plus.google.html"><i class="icon fa fa-google-plus"></i></a>
                                                    </li>
                                                    <li><a href="pinterest.html"><i class="icon fa fa-pinterest-p"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry-meta"><span class="entry-meta__item"><i class="entry-meta__icon fa fa-heart"></i>205</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end .post-->
                            <section class="b-post b-post-1 clearfix">
                                <div class="entry-media">
                                    <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/360x250/3.jpg" alt="Foto" />
                                </div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <div class="entry-meta__face">
                                                <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/face/76x76_3.jpg" alt="face" />
                                            </div><span class="entry-meta__item">Post by<a class="entry-meta__link" href="blog-main.html"> Thomas Neil</a></span><a class="entry-meta__categorie" href="blog-main.html"><strong>What’s New</strong></a>
                                        </div>
                                        <h2 class="entry-title"><a href="blog-post.html">What's new coming from the automakers in future</a></h2>
                                    </div>
                                    <div class="entry-content">
                                        <p>Duis aute irure reprehender voluptate velits fugiat nulla pariatur excepteur ipsum doloe amet consecteur adipisicing elit.</p>
                                    </div>
                                    <div class="entry-footer">
                                        <div class="entry-footer__inner">
                                            <div class="b-post-social">SHARE
                                                <ul class="b-post-social__list list-inline">
                                                    <li><a href="twitter.html"><i class="icon fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="facebook.html"><i class="icon fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="plus.google.html"><i class="icon fa fa-google-plus"></i></a>
                                                    </li>
                                                    <li><a href="pinterest.html"><i class="icon fa fa-pinterest-p"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry-meta"><span class="entry-meta__item"><i class="entry-meta__icon fa fa-heart"></i>242</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end .post-->
                            <section class="b-post b-post-1 clearfix">
                                <div class="entry-media">
                                    <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/360x250/1.jpg" alt="Foto" />
                                </div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <div class="entry-meta__face">
                                                <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/face/76x76_1.jpg" alt="face" />
                                            </div><span class="entry-meta__item">Post by<a class="entry-meta__link" href="blog-main.html"> Thomas Neil</a></span><a class="entry-meta__categorie" href="blog-main.html"><strong>Ford News</strong></a>
                                        </div>
                                        <h2 class="entry-title"><a href="blog-post.html">Ford Motors overhauled its design team </a></h2>
                                    </div>
                                    <div class="entry-content">
                                        <p>Duis aute irure reprehender voluptate velits fugiat nulla pariatur excepteur ipsum doloe amet consecteur adipisicing elit.</p>
                                    </div>
                                    <div class="entry-footer">
                                        <div class="entry-footer__inner">
                                            <div class="b-post-social">SHARE
                                                <ul class="b-post-social__list list-inline">
                                                    <li><a href="twitter.html"><i class="icon fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="facebook.html"><i class="icon fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="plus.google.html"><i class="icon fa fa-google-plus"></i></a>
                                                    </li>
                                                    <li><a href="pinterest.html"><i class="icon fa fa-pinterest-p"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry-meta"><span class="entry-meta__item"><i class="entry-meta__icon fa fa-heart"></i>300</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end .post-->
                            <section class="b-post b-post-1 clearfix">
                                <div class="entry-media">
                                    <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/360x250/2.jpg" alt="Foto" />
                                </div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <div class="entry-meta__face">
                                                <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/face/76x76_2.jpg" alt="face" />
                                            </div><span class="entry-meta__item">Post by<a class="entry-meta__link" href="blog-main.html"> Thomas Neil</a></span><a class="entry-meta__categorie" href="blog-main.html"><strong>Driving</strong></a>
                                        </div>
                                        <h2 class="entry-title"><a href="blog-post.html">Self-driving legislation sets in the motion</a></h2>
                                    </div>
                                    <div class="entry-content">
                                        <p>Duis aute irure reprehender voluptate velits fugiat nulla pariatur excepteur ipsum doloe amet consecteur adipisicing elit.</p>
                                    </div>
                                    <div class="entry-footer">
                                        <div class="entry-footer__inner">
                                            <div class="b-post-social">SHARE
                                                <ul class="b-post-social__list list-inline">
                                                    <li><a href="twitter.html"><i class="icon fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="facebook.html"><i class="icon fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="plus.google.html"><i class="icon fa fa-google-plus"></i></a>
                                                    </li>
                                                    <li><a href="pinterest.html"><i class="icon fa fa-pinterest-p"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry-meta"><span class="entry-meta__item"><i class="entry-meta__icon fa fa-heart"></i>205</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end .post-->
                            <section class="b-post b-post-1 clearfix">
                                <div class="entry-media">
                                    <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/360x250/3.jpg" alt="Foto" />
                                </div>
                                <div class="entry-main">
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <div class="entry-meta__face">
                                                <img class="img-responsive" src="{{ asset('assets') }}/media/content/posts/face/76x76_3.jpg" alt="face" />
                                            </div><span class="entry-meta__item">Post by<a class="entry-meta__link" href="blog-main.html"> Thomas Neil</a></span><a class="entry-meta__categorie" href="blog-main.html"><strong>What’s New</strong></a>
                                        </div>
                                        <h2 class="entry-title"><a href="blog-post.html">What's new coming from the automakers in future</a></h2>
                                    </div>
                                    <div class="entry-content">
                                        <p>Duis aute irure reprehender voluptate velits fugiat nulla pariatur excepteur ipsum doloe amet consecteur adipisicing elit.</p>
                                    </div>
                                    <div class="entry-footer">
                                        <div class="entry-footer__inner">
                                            <div class="b-post-social">SHARE
                                                <ul class="b-post-social__list list-inline">
                                                    <li><a href="twitter.html"><i class="icon fa fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="facebook.html"><i class="icon fa fa-facebook"></i></a>
                                                    </li>
                                                    <li><a href="plus.google.html"><i class="icon fa fa-google-plus"></i></a>
                                                    </li>
                                                    <li><a href="pinterest.html"><i class="icon fa fa-pinterest-p"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="entry-meta"><span class="entry-meta__item"><i class="entry-meta__icon fa fa-heart"></i>242</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- end .post-->
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