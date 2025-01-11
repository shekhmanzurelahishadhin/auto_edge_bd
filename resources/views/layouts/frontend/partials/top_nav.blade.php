<div class="top-bar">
    <div class="container">
        <div class="header-topbarbox-1">
            <ul>
                <li><i class="icon fa fa-phone"></i><a href="tel:{{$phone->value??''}}">{{$phone->value??''}}</a>
                </li>
                <li><i class="icon fa fa-envelope-o"></i><a href="mailto:{{$email->value??''}}">{{$email->value??''}}</a>
                </li>
            </ul>
        </div>
        <div class="header-topbarbox-2">
            <ul class="social-links">
                <li><a href="https://wa.me/{{$phone->value??''}}" target="_blank"><i class="social_icons fa fa-whatsapp"></i></a>
                </li>
                <li><a href="{{$facebook->value??''}}" target="_blank"><i class="social_icons fa fa-facebook"></i></a>
                </li>
                <li><a href="{{$linkedin->value??''}}" target="_blank"><i class="social_icons fa fa-linkedin"></i></a>
                </li>
                <li class="li-last"><a href="{{$instagram->value??''}}" target="_blank"><i class="social_icons fa fa-instagram"></i></a>
                </li>
                <li><a href="{{$tweeter->value??''}}" target="_blank"><i class="social_icons fa fa-twitter"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
