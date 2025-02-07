@extends('layouts.frontend.master')
@section('content')
    <!-- end .header-->
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">{{$compare_vehicle_title->page_title??null}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end .b-title-page-->
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('root')}}"><i class="icon fa fa-home"></i></a>
                        </li>
                        <li class="active">{{$compare_vehicle_title->page_title??null}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <main class="l-main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="parent-container">
                        <input type="text" class="form-control compare-input" name="compare_vehicle_one" id="compare_vehicle_one" placeholder="Search for a car...">
                        <ul id="search_results_one" class="list-unstyled dropdown-menu" style="display: none;"></ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="parent-container">
                        <input type="text" class="form-control compare-input" name="compare_vehicle_two" id="compare_vehicle_two" placeholder="Search for a car...">
                        <ul id="search_results_two" class="list-unstyled dropdown-menu" style="display: none;"></ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="b-goods-feat" id="selected_vehicle_one">
                        <div class="b-goods-feat">
                            <div class="b-goods-feat__img">
                                <img class="img-responsive" width="100%" src="{{ asset($vehicle->main_image) }}" alt="foto" />
                            </div>
                            <ul class="b-goods-feat__desc list-unstyled">
                                <li class="b-goods-feat__desc-item">Brand: {{$vehicle->brand->title??null}}</li>
                                <li class="b-goods-feat__desc-item">Model: {{$vehicle->model->title??null}}</li>
                                @if(isset($vehicle->year->title))
                                    <li class="b-goods-feat__desc-item">Year: {{$vehicle->year->title??null}}</li>
                                @endif
                                @if(isset($vehicle->fuel_type->title))
                                    <li class="b-goods-feat__desc-item">Fuel Type: {{$vehicle->fuel_type->title??null}}</li>
                                @endif
                            </ul>
                            <h3 class="b-goods-feat__name"><a href="{{route('vehicles.show',$vehicle->slug)}}">{{$vehicle->title??null}}</a></h3>
                            <div class="b-goods-feat__info">{!! $vehicle->description??null !!}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="b-goods-feat" id="selected_vehicle_two">
                        <!-- Selected vehicle will be appended here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end .b-car-details-->
    </main>
@endsection

@push('customCss')
    <style>
        .compare-input{
            border: 1px solid #D01818;
        }
        .section-title-page {
            position: relative;
            height: 200px;
            margin-top: 166px;
            background: url({{ asset($banner) }}) !important;
        }

        .dropdown-menu {
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ddd;
            background: #fff;
            z-index: 1000; /* Add this line */
            position: absolute; /* Ensure it's positioned correctly */
        }
        /* Add this to the parent container of the dropdown */
        .parent-container {
            position: relative;
        }

        .dropdown-menu li {
            padding: 8px 12px;
            cursor: pointer;
            font-size: 16px;
        }

        .dropdown-menu li:hover {
            background: #D01818;
            color: white;
        }
    </style>
@endpush

@push('customJs')
    <script>
        const baseUrl = "{{ asset('') }}";
        $(document).ready(function () {
            // Live search for the first input
            $('#compare_vehicle_one').on('input', function () {
                let query = $(this).val();
                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('vehicles.search') }}",
                        type: "GET",
                        data: { query: query },
                        success: function (response) {
                            let resultsHtml = '';
                            // Inside your AJAX success callback:
                            response.forEach(function (vehicle) {
                                resultsHtml += `
                                <li onclick="selectVehicle('${vehicle.id}', 'one')">
                                    ${vehicle.title}
                                    ${vehicle.brand?.title ? `(${vehicle.brand.title})` : ''}
                                    ${vehicle.model?.title || vehicle.year?.title
                                                            ? `(${vehicle.model?.title ?? ''}${vehicle.year?.title ? `-${vehicle.year.title}` : ''})`
                                                            : ''}
                                </li>
                            `;
                            });
                            $('#search_results_one').html(resultsHtml).show();
                        }
                    });
                } else {
                    $('#search_results_one').hide();
                }
            });

            // Live search for the second input
            $('#compare_vehicle_two').on('input', function () {
                let query = $(this).val();
                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('vehicles.search') }}",
                        type: "GET",
                        data: { query: query },
                        success: function (response) {
                            let resultsHtml = '';
                            // Inside your AJAX success callback:
                            response.forEach(function (vehicle) {
                                resultsHtml += `
                                <li onclick="selectVehicle('${vehicle.id}', 'two')">
                                    ${vehicle.title}
                                    ${vehicle.brand?.title ? `(${vehicle.brand.title})` : ''}
                                    ${vehicle.model?.title || vehicle.year?.title
                                                            ? `(${vehicle.model?.title ?? ''}${vehicle.year?.title ? `-${vehicle.year.title}` : ''})`
                                                            : ''}
                                </li>
                            `;
                            });
                            $('#search_results_two').html(resultsHtml).show();
                        }
                    });
                } else {
                    $('#search_results_two').hide();
                }
            });

            // Hide dropdown when clicking outside
            $(document).on('click', function (e) {
                if (!$(e.target).closest('#compare_vehicle_one, #search_results_one').length) {
                    $('#search_results_one').hide();
                }
                if (!$(e.target).closest('#compare_vehicle_two, #search_results_two').length) {
                    $('#search_results_two').hide();
                }
            });
        });

        // Function to handle vehicle selection
        function selectVehicle(vehicleId, inputType) {

            $.ajax({
                url: "{{ route('vehicles.search-result', ':id') }}".replace(':id', vehicleId),
                type: "GET",
                success: function (vehicle) {
                    // Build the display string for the input field
                    let displayString = vehicle.title;

                    // Add brand if available
                    if (vehicle.brand?.title) {
                        displayString += ` (${vehicle.brand.title})`;
                    }

                    // Add model/year combination if either exists
                    if (vehicle.model?.title || vehicle.year?.title) {
                        displayString += ` (${vehicle.model?.title ?? ''}`;
                        if (vehicle.year?.title) {
                            displayString += `-${vehicle.year.title}`;
                        }
                        displayString += `)`;
                    }

                    // Update the input field based on the inputType
                    if (inputType === 'one') {
                        $('#compare_vehicle_one').val(displayString); // Update the first input field
                        $('#selected_vehicle_one').html(`
                    <div class="b-goods-feat__img">
                        <img class="img-responsive" width="100%" src="${baseUrl}${vehicle.main_image}" alt="foto" />
                    </div>
                    <ul class="b-goods-feat__desc list-unstyled">
                        ${vehicle.brand?.title ? `<li class="b-goods-feat__desc-item">Brand: ${vehicle.brand.title}</li>` : ''}
                        ${vehicle.model?.title ? `<li class="b-goods-feat__desc-item">Model: ${vehicle.model.title}</li>` : ''}
                        ${vehicle.year?.title ? `<li class="b-goods-feat__desc-item">Year: ${vehicle.year.title}</li>` : ''}
                        ${vehicle.fuel_type?.title ? `<li class="b-goods-feat__desc-item">Fuel Type: ${vehicle.fuel_type.title}</li>` : ''}
                    </ul>
                    <h3 class="b-goods-feat__name"><a href="${vehicle.slug}">${vehicle.title}</a></h3>
                    <div class="b-goods-feat__info">${vehicle.description}</div>
                `);
                        $('#search_results_one').hide(); // Hide the dropdown
                    } else {
                        $('#compare_vehicle_two').val(displayString); // Update the second input field
                        $('#selected_vehicle_two').html(`
                    <div class="b-goods-feat__img">
                        <img class="img-responsive" width="100%" src="${baseUrl}${vehicle.main_image}" alt="foto" />
                    </div>
                    <ul class="b-goods-feat__desc list-unstyled">
                        ${vehicle.brand?.title ? `<li class="b-goods-feat__desc-item">Brand: ${vehicle.brand.title}</li>` : ''}
                        ${vehicle.model?.title ? `<li class="b-goods-feat__desc-item">Model: ${vehicle.model.title}</li>` : ''}
                        ${vehicle.year?.title ? `<li class="b-goods-feat__desc-item">Year: ${vehicle.year.title}</li>` : ''}
                        ${vehicle.fuel_type?.title ? `<li class="b-goods-feat__desc-item">Fuel Type: ${vehicle.fuel_type.title}</li>` : ''}
                    </ul>
                    <h3 class="b-goods-feat__name"><a href="${vehicle.slug}">${vehicle.title}</a></h3>
                    <div class="b-goods-feat__info">${vehicle.description}</div>
                `);
                        $('#search_results_two').hide(); // Hide the dropdown
                    }
                }
            });
        }
    </script>
@endpush
