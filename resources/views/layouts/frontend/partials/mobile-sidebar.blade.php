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
        <li><a href="car-rental.html">Car Rental</a>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Listings<b class="caret"></b></a>
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
        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Blog<b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="blog-main.html" tabindex="-1">Blog main</a>
                </li>
                <li><a href="blog-post.html" tabindex="-1">Blog post</a>
                </li>
            </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Pages<b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="typography.html" tabindex="-1">Typography</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
