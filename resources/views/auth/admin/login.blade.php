@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.signin')
@endsection
@section('content')
    <!-- auth page content -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                            </div>
                                            <div class="mt-auto py-5 d-flex justify-content-center align-items-center">
                                                <img src="{{ asset('uploads/logo3.png') }}" class="w-50"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to {{ env('APP_NAME') }}.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form action="{{ route('admin.login') }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="email"
                                                           class="form-label">{{ __('Email Address') }}</label>
                                                    <input id="email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                           for="password-input">{{ __('Password') }}</label>

                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" name="password"
                                                               class="form-control @error('password') is-invalid @enderror pe-5 password-input"
                                                               placeholder="Enter password" id="password-input" required
                                                               autocomplete="current-password">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                           {{ old('remember') ? 'checked' : '' }}
                                                           id="auth-remember-check">
                                                    <label class="form-check-label"
                                                           for="auth-remember-check">{{ __('Remember Me') }}</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Sign
                                                        In</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> PeopleNTech Software. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by coderpick
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- auth page end -->
@endsection
@push('customCss')

    <style>
        .auth-one-bg {
            background-image: url({{ asset('build/img/JKKNIU-Cover-pic.webp') }});
            background-position: center;
            background-size: cover;
        }
    </style>

@endpush
@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>

@endsection
