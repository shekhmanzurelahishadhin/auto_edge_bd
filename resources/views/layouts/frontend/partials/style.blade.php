<link rel="stylesheet" href="{{ asset('assets') }}/css/master.css" />
<link rel="stylesheet" href="{{ asset('assets') }}/css/custome.css" />
<!-- SWITCHER-->
<link href="{{ asset('assets') }}/plugins/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" />
<link href="{{ asset('assets') }}/plugins/switcher/css/color1.css" rel="alternate stylesheet" title="color1" />
<link href="{{ asset('assets') }}/plugins/switcher/css/color2.css" rel="alternate stylesheet" title="color2" />
<link href="{{ asset('assets') }}/plugins/switcher/css/color3.css" rel="alternate stylesheet" title="color3" />
<link href="{{ asset('assets') }}/plugins/switcher/css/color4.css" rel="alternate stylesheet" title="color4" />
<link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/car.png" />
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


<style>
    .active-nav{
        border: 1px solid #d01818 !important;
        /*color: white !important;*/
    }
</style>

@stack('css')
@stack('customCss')
