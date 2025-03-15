<script src="{{ asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('build/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('build/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>

{{--<script src='https://cdn.jsdelivr.net/npm/toastify-js'></script>--}}
{{--<script src="{{ asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>--}}
{{--<script src="{{ asset('build/libs/flatpickr/flatpickr.min.js')}}"></script>--}}
@stack('page_js')
<script src="{{ asset('build/js/app.js') }}"></script>
@stack('page_script')
