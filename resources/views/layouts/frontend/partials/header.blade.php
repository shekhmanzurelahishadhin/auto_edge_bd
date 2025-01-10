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
                    <a class="navbar-brand scroll" href="home.html">
                        <img class="normal-logo img-responsive" src="{{ asset('assets') }}/media/general/logo.png" alt="logo" />
                        <img class="scroll-logo hidden-xs img-responsive" src="{{ asset('assets') }}/media/general/logo-dark.png" alt="logo" />
                    </a>
                </div>
                <div class="header-navibox-3">
                    <ul class="nav navbar-nav hidden-xs clearfix vcenter">
                        <li>
                            <div class="header-cart"><a href="#"><i class="icon fa fa-shopping-basket" aria-hidden="true"></i><span class="header-cart-count bg-primary">3</span></a>
                            </div>
                        </li>
                        <li><a class="btn_header_search" href="#"><i class="icon fa fa-search"></i></a>
                        </li>
                    </ul><a class="btn btn-primary" href="home.html">sell car</a>
                </div>
                <div class="header-navibox-2">
                    <ul class="yamm main-menu nav navbar-nav">
                        <li class="dropdown"><a class="dropdown-toggle" href="home.html" data-toggle="dropdown">Home<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="home.html" tabindex="-1">Home one page</a>
                                </li>
                                <li><a href="home-2.html" tabindex="-1">Home standart</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="repair-shop.html">Repair Shop</a>
                        </li>
                        <li><a href="car-rental.html">Car Rental</a>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" href="listings-1.html" data-toggle="dropdown">Listings<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="listings-1.html" tabindex="-1">Listings ver 01</a>
                                </li>
                                <li><a href="listings-2.html" tabindex="-1">Listings ver 02</a>
                                </li>
                                <li><a href="listings-3.html" tabindex="-1">Listings ver 03</a>
                                </li>
                                <li><a href="car-details.html" tabindex="-1">Car details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" href="blog-main.html" data-toggle="dropdown">Blog<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="blog-main.html" tabindex="-1">Blog main</a>
                                </li>
                                <li><a href="blog-post.html" tabindex="-1">Blog post</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle" href="car-details.html" data-toggle="dropdown">Pages<b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">

                                <li><a href="typography.html" tabindex="-1">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</header>
