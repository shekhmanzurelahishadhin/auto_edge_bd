{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    @include('layouts.frontend.partials.head')--}}
{{--</head>--}}
{{--<body>--}}

{{--    @include('layouts.frontend.partials.top_nav')--}}

{{--    @include('layouts.frontend.partials.header')--}}

{{--    @yield('content')--}}

{{--    @include('layouts.frontend.partials.footer')--}}


{{--    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i--}}
{{--            class="bi bi-arrow-up-short"></i></a>--}}

{{--    <!-- Preloader -->--}}
{{--    <div id="preloader">--}}
{{--        <div></div>--}}
{{--        <div></div>--}}
{{--        <div></div>--}}
{{--        <div></div>--}}
{{--    </div>--}}

{{--   --}}{{--  js files  --}}
{{--     @include('layouts.frontend.partials._scripts')--}}
{{--    <script>--}}
{{--        $('img').each(function() {--}}
{{--            $(this).on("error", function () {--}}
{{--                $(this).attr("src", "{{ asset('assets/img/place_jkkniu.jpg') }}");--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--</body>--}}

{{--</html>--}}

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{$logo->site_title??'Auto Edge BD'}}</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.frontend.partials.style')
</head>

<body>
<!-- Loader-->
<div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span>
</div>
<!-- Loader end-->
<!-- ==========================-->
<!-- MOBILE MENU-->
<!-- ==========================-->
@include('layouts.frontend.partials.mobile-sidebar')
<div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
    <!-- Start Switcher-->
    <div class="switcher-wrapper">
        <div class="demo_changer">
            <div class="demo-icon text-primary"><i class="fa fa-cog fa-spin fa-2x"></i>
            </div>
            <div class="form_holder">
                <div class="predefined_styles">
                    <div class="skin-theme-switcher">
                        <h4>Color</h4>
                        <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color1" style="background-color:#d01818"></a>
                        <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color2" style="background-color:#FFAC3A"></a>
                        <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color3" style="background-color:#28af0f"></a>
                        <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color4" style="background-color:#e425e9"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end switcher-->
    <!-- ==========================-->
    <!-- SEARCH MODAL-->
    <!-- ==========================-->
    <div class="header-search open-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <div class="navbar-search">
                        <form class="search-global">
                            <input class="search-global__input" type="text" placeholder="Type to search" autocomplete="off" name="s" value="" />
                            <button class="search-global__btn"><i class="icon stroke icon-Search"></i>
                            </button>
                            <div class="search-global__note">Begin typing your search above and press return to search.</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <button class="search-close close" type="button"><i class="fa fa-times"></i>
        </button>
    </div>
    <div data-off-canvas="slidebar-1 left overlay">
        <ul class="nav navbar-nav">
            <li><a class="scrollTo" href="#features-section">features</a>
            </li>
            <li><a class="scrollTo" href="#services-section">Services</a>
            </li>
            <li><a class="scrollTo" href="#works-section">Works</a>
            </li>
            <li><a class="scrollTo" href="#about-section">About</a>
            </li>
            <li><a class="scrollTo" href="#team-section">Team</a>
            </li>
            <li><a href="#">News</a>
                <div class="wrap-inside-nav">
                    <div class="inside-col">
                        <ul class="inside-nav">
                            <li><a href="blog.html">Blog 1</a>
                            </li>
                            <li><a href="blog-2.html">Blog 2</a>
                            </li>
                            <li><a href="blog-single.html">Blog single</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a href="#">Portfolio</a>
                <div class="wrap-inside-nav">
                    <div class="inside-col">
                        <ul class="inside-nav">
                            <li><a href="portfolio.html">Portfolio</a>
                            </li>
                            <li><a href="portfolio-single.html">Portfolio single</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a href="#">Contact</a>
                <div class="wrap-inside-nav">
                    <div class="inside-col">
                        <ul class="inside-nav">
                            <li><a href="contact.html">Contact 1</a>
                            </li>
                            <li><a href="contact-2.html">Contact 2</a>
                            </li>
                            <li><a href="contact-3.html">Contact 3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    @include('layouts.frontend.partials.header')
    <!-- end .header-->
    @yield('content')
    @include('layouts.frontend.partials.footer')
    <!-- .footer-->
</div>
<!-- end layout-theme-->


<!-- ++++++++++++-->
<!-- MAIN SCRIPTS-->
<!-- ++++++++++++-->
@include('layouts.frontend.partials._scripts')
{!! Toastr::message() !!}
</body>


</html>
