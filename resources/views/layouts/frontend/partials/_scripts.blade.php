<script src="{{ asset('assets') }}/libs/jquery-1.12.4.min.js"></script>
<script src="{{ asset('assets') }}/libs/jquery-migrate-1.2.1.js"></script>
<!-- Bootstrap-->
<script src="{{ asset('assets') }}/libs/bootstrap/bootstrap.min.js"></script>
<!-- User customization-->
<script src="{{ asset('assets') }}/js/custom.js"></script>
<!-- Headers scripts-->
<script src="{{ asset('assets') }}/plugins/headers/slidebar.js"></script>
<script src="{{ asset('assets') }}/plugins/headers/header.js"></script>
<!-- Color scheme-->
<script src="{{ asset('assets') }}/plugins/switcher/js/dmss.js"></script>
<!-- Select customization & Color scheme-->
<script src="{{ asset('assets') }}/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<!-- Slider-->
<script src="{{ asset('assets') }}/plugins/owl-carousel/owl.carousel.min.js"></script>
<!-- Pop-up window-->
<script src="{{ asset('assets') }}/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Mail scripts-->
<script src="{{ asset('assets') }}/plugins/jqBootstrapValidation.js"></script>
<script src="{{ asset('assets') }}/plugins/contact_me.js"></script>
<!-- Filter and sorting images-->
<script src="{{ asset('assets') }}/plugins/isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('assets') }}/plugins/isotope/imagesLoaded.js"></script>
<!-- Progress numbers-->
<script src="{{ asset('assets') }}/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="{{ asset('assets') }}/plugins/rendro-easy-pie-chart/waypoints.min.js"></script>
<!-- NoUiSlider-->
<script src="{{ asset('assets') }}/plugins/noUiSlider/nouislider.min.js"></script>
<script src="{{ asset('assets') }}/plugins/noUiSlider/wNumb.js"></script>
<!-- Animations-->
<script src="{{ asset('assets') }}/plugins/scrollreveal/scrollreveal.min.js"></script>
<!-- Main slider-->
<script src="{{ asset('assets') }}/plugins/slider-pro/jquery.sliderPro.min.js"></script>
<!-- User map-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQ_bBw186KJnMcRByvn5ffZueg88wp1E"></script>
<!-- Maps customization-->
<script src="{{ asset('assets') }}/js/map-custom.js"></script>
<script>
    // Show button when scrolled down
    window.addEventListener('scroll', function() {
        const toTopButton = document.getElementById('toTop');
        if (window.scrollY > 200) {
            toTopButton.style.display = 'block';
        } else {
            toTopButton.style.display = 'none';
        }
    });

    // Smooth scroll to top
    document.getElementById('toTop').addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

</script>
 @stack('js')
 @stack('customJs')
