<footer class="footer area-bg">
    <div class="area-bg__inner">
        <div class="footer__main">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-section">
                            <a class="footer__logo" href="home.html">
                                <img class="img-responsive" src="{{ asset($logo->footer_logo??'') }}" alt="Logo" />
                            </a>
                            <div class="footer__info">{{$footer_details->value??''}}</div>
                            <ul class="social-net list-inline">
                                <li class="social-net__item"><a class="social-net__link text-primary_h" target="_blank" href="{{$facebook->value??''}}"><i class="icon fa fa-facebook"></i></a>
                                </li>
                                <li class="social-net__item"><a class="social-net__link text-primary_h" target="_blank" href="{{$tweeter->value??''}}"><i class="icon fa fa-twitter"></i></a>
                                </li>
                                <li class="social-net__item"><a class="social-net__link text-primary_h" target="_blank" href="{{$linkedin->value??''}}"><i class="icon fa fa-linkedin"></i></a>
                                </li>
                                <li class="social-net__item"><a class="social-net__link text-primary_h" target="_blank" href="{{$instagram->value??''}}"><i class="icon fa fa-instagram"></i></a>
                                </li>
                            </ul>
                            <!-- end .social-list-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <section class="footer-section footer-section_list-columns">
                            <h3 class="footer-section__title ui-title-inner">Top Brands</h3>
                            <ul class="footer-list footer-list_columns list-unstyled">
                                @forelse($brands as $brand)
                                <li class="footer-list__item"><a class="footer-list__link" href="{{ route('vehicles.brand', base64_encode($brand->id)) }}">{{$brand->title??''}}</a>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </section>
                    </div>
                    <div class="col-md-2">
                        <section class="footer-section footer-section_list-one">
                            <h3 class="footer-section__title ui-title-inner">Model Years</h3>
                            <ul class="footer-list list-unstyled">
                                @forelse($years as $year)
                                    <li class="footer-list__item"><a class="footer-list__link" href="{{ route('vehicles.year', base64_encode($year->id)) }}">{{$year->title??''}}</a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </section>
                    </div>
                    <div class="col-md-3">
                        <section class="footer-section">
                            <h3 class="footer-section__title ui-title-inner">Address Information</h3>
                            <div class="footer-contact footer-contact_lg">Call us<span class="text-primary"> {{$phone->value??''}}</span>
                            </div>
                            <div class="footer-contact"><i class="icon icon-xs fa fa-envelope-o"></i>{{$email->value??''}}</div>
                            <div class="footer-contact"><i class="icon icon-lg fa fa-map-marker"></i>{{$address->value??''}}</div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <span class="btn-up2" id="toTop2"><a href="https://wa.me/{{$phone->value??''}}" target="_blank"><img src="{{ asset('assets') }}/media/whatsapp.png" width="100%" height="100%" alt=""></a></span>
        <span class="btn-up" id="toTop">TOP</span>
    </div>
</footer>
