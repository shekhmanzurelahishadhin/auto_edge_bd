@stack('css')
<!-- Layout config Js -->
<script src="{{ asset('build/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

{{--<link href="{{ asset('build/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('build/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />--}}

<link href="{{ asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('build/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ asset('build/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<style>
    .gj-datepicker-bootstrap [role="right-icon"]{
        display: flex;
        align-items: center;
        font-size: 20px;
        border: 1px solid var(--vz-input-border);
        padding: 0px 3px;

    }
</style>
 @stack('customCss')
