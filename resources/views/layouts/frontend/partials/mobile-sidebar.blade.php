<div data-off-canvas="mobile-slidebar left overlay">
    <a class="navbar-brand scroll" href="home.html">
        <img class="normal-logo img-resonsive visible-xs visible-sm" src="{{ asset($logo->footer_logo??'') }}" alt="logo" />
        <img class="scroll-logo img-resonsive hidden-xs hidden-sm" src="{{ asset($logo->footer_logo??'') }}" alt="logo" />
    </a>
    <ul class="nav navbar-nav">
        <li>
            <h4><a href="#"></a></h4>
        </li>
        <li class=""><a class="" href="{{route('root')}}" data-toggle="">Home</a></li>
        <li><a href="{{route('about')}}">About Us</a>
        </li>
        <li><a href="{{route('news')}}">News</a>
        </li>
        <li><a href="{{route('vehicles')}}">Vehicles</a>
        </li>
        <li><a href="{{route('auction-sheet-guide')}}">Auction Sheet Guide</a>
        </li>
{{--        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Pages<b class="caret"></b></a>--}}
{{--            <ul class="dropdown-menu" role="menu">--}}
{{--                <li><a href="typography.html" tabindex="-1">Typography</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>
</div>
