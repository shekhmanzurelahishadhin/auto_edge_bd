<header class="header header-boxed-width navbar-fixed-top header-background-white header-color-black header-topbar-dark header-logo-black header-topbarbox-1-left header-topbarbox-2-right header-navibox-1-left header-navibox-2-right header-navibox-3-right header-navibox-4-right">
    <div class="container container-boxed-width">
        @include('layouts.frontend.partials.top_nav')
        <nav class="navbar" id="nav">
            <div class="container">
                <div class="header-navibox-1">
                    <!-- Mobile Trigger Start-->
                    <button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button"><i class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i>
                    </button>
                    <!-- Mobile Trigger End-->
                    <a class="navbar-brand scroll" href="{{route('root')}}">
                        <img class="normal-logo img-responsive" src="{{ asset($logo->logo??'') }}" alt="logo" />
                        <img class="scroll-logo hidden-xs img-responsive" src="{{ asset($logo->logo??'') }}" alt="logo" />
                    </a>
                </div>
                <div class="header-navibox-3">
{{--                    <ul class="nav navbar-nav hidden-xs clearfix vcenter">--}}
{{--                        <li>--}}
{{--                            <div class="header-cart"><a href="#"><i class="icon fa fa-shopping-basket" aria-hidden="true"></i><span class="header-cart-count bg-primary">3</span></a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li><a class="btn_header_search" href="#"><i class="icon fa fa-search"></i></a>--}}
{{--                        </li>--}}
{{--                    </ul><a class="btn btn-primary" href="home.html">sell car</a>--}}
                </div>
                <div class="header-navibox-2">
                    <ul class="yamm main-menu nav navbar-nav">
                        <li><a class="{{Route::is('root') ? 'active-nav' : ''}}" href="{{route('root')}}" data-toggle="">Home</a></li>
                        <li><a href="{{route('about')}}" class="{{Route::is('about') ? 'active-nav' : ''}}">About Us</a></li>
                        <li><a href="{{route('vehicles')}}" class="{{Route::is('vehicles')||Route::is('vehicles.show')||Route::is('vehicles.brand')||Route::is('vehicles.year')||Route::is('vehicles.compare') ? 'active-nav' : ''}}">Vehicles</a></li>
                        <li><a href="{{route('news')}}" class="{{Route::is('news')||Route::is('news.show') ? 'active-nav' : ''}}">News</a></li>
                        <li><a href="{{route('auction-sheet-guide')}}" class="{{Route::is('auction-sheet-guide') ? 'active-nav' : ''}}">Auction Sheet Guide</a></li>
{{--                        <li class="dropdown"><a class="dropdown-toggle" href="car-details.html" data-toggle="dropdown">Pages<b class="caret"></b></a>--}}
{{--                            <ul class="dropdown-menu" role="menu">--}}

{{--                                <li><a href="typography.html" tabindex="-1">Typography</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</header>
