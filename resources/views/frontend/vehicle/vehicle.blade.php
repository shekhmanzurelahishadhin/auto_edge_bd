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
                        <div class="filter-goods__info">Showing results from<strong> 1 - 10</strong> of total<strong> 35</strong>
                        </div>
                        <div class="filter-goods__select"><span class="hidden-xs"></span>
                            <div class="btns-switch"><i class="btns-switch__item js-view-th active icon fa fa-th-large"></i><i class="btns-switch__item js-view-list icon fa fa-th-list"></i>
                            </div>
                        </div>
                    </div>
                    <!-- end .filter-goods-->
                    <div class="goods-group-2 list-goods list-goods_th">
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_1.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_1.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">FERRARI F650 SCUDERIA</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-1"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-1"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-1">Highlights</h3>
                                        <div class="collapse in" id="desc-1">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">specifications</h3>
                                        <div class="collapse in" id="list-1">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_2.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_2.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-2"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-2"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-2">Highlights</h3>
                                        <div class="collapse in" id="desc-2">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-2" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-2">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_3.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_3.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">MERCEDES BENZ E CLASS</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-3"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-3"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-3">Highlights</h3>
                                        <div class="collapse in" id="desc-3">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-3" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-3">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_4.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_4.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">MERCEDES-AMG GT 2018</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-4"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-4"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-4">Highlights</h3>
                                        <div class="collapse in" id="desc-4">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-4" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-4">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_5.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_5.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">ACURA ILX 2019</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-5"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-5"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-5">Highlights</h3>
                                        <div class="collapse in" id="desc-5">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-5" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-5">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_5.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_5.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">ACURA ILX 2019</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-6"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-6"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-6">Highlights</h3>
                                        <div class="collapse in" id="desc-6">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-6" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-6">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_1.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_1.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">FERRARI F650 SCUDERIA</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-7"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-7"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-7">Highlights</h3>
                                        <div class="collapse in" id="desc-7">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-7" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-7">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_2.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_2.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-8"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-8"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-8">Highlights</h3>
                                        <div class="collapse in" id="desc-8">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-8" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-8">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_3.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_3.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">MERCEDES BENZ E CLASS</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-9"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-9"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-9">Highlights</h3>
                                        <div class="collapse in" id="desc-9">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-9" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-9">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_4.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_4.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">MERCEDES-AMG GT 2018</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-10"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-10"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-10">Highlights</h3>
                                        <div class="collapse in" id="desc-10">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-10" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-10">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_5.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_5.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">ACURA ILX 2019</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-11"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-11"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-11">Highlights</h3>
                                        <div class="collapse in" id="desc-11">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-11" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-11">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_5.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_5.jpg" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span></span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="car-details.html">ACURA ILX 2019</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-12"> lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span
                                            class="b-goods-1__info-link" data-toggle="collapse" data-target="#info-12"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">$45,000<span class="b-goods-1__price-msrp">MSRP $27,000</span><a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                            </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-12">Highlights</h3>
                                        <div class="collapse in" id="desc-12">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-12" aria-expanded="false">specifications</h3>
                                        <div class="collapse" id="list-12">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- end .b-goods-1-->
                    </div>
                    <!-- end .goods-group-2-->
                </main>
                <!-- end .l-main-content-->
            </div>
            <div class="col-md-3 col-md-pull-9">
                <aside class="l-sidebar">
                    <form class="b-filter-2 bg-grey">
                        <h3 class="b-filter-2__title">search options</h3>
                        <div class="b-filter-2__inner">
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">keyword</div>
                                <input class="form-control" type="text" placeholder="Keyword..." />
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Vehicle Type</div>
                                <select class="selectpicker" data-width="100%">
                                    <option>All Types</option>
                                    <option>Type 1</option>
                                    <option>Type 2</option>
                                    <option>Type 3</option>
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Make</div>
                                <select class="selectpicker" data-width="100%">
                                    <option>All Makes</option>
                                    <option>Make 1</option>
                                    <option>Make 2</option>
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Model</div>
                                <select class="selectpicker" data-width="100%">
                                    <option>All Models</option>
                                    <option>Model 1</option>
                                    <option>Model 2</option>
                                    <option>Model 3</option>
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Model Year</div>
                                <select class="selectpicker" data-width="100%">
                                    <option>Min Year</option>
                                    <option>Year 1</option>
                                    <option>Year 2</option>
                                </select>
                                <select class="selectpicker" data-width="100%">
                                    <option>Max Year</option>
                                    <option>Year 1</option>
                                    <option>Year 2</option>
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">fuel type</div>
                                <select class="selectpicker" data-width="100%">
                                    <option>All Fuel Types</option>
                                    <option>Type 1</option>
                                    <option>Type 2</option>
                                    <option>Type 3</option>
                                </select>
                            </div>
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
