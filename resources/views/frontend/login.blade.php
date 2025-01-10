@extends('layouts.frontend.master')

@section('content')
    <main id="main">
        <!-- ======= Login - Login pages---  ======= -->
        <section id="homeLogin" class="homeLogin">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white shadow ">
                            <div class="row g-0">
                                <div class="col-lg-6 pe-0 col-md-6 col-sm-12 col-12">
                                    <div class="form-left h-100 py-5 px-5">
                                        <div class="form-left-tittle">
                                            <h4>JK<span style="color: red;">K</span>NIU </h4>
                                            <h5>Sign Into Your Account</h5>
                                        </div>
                                        <form action="{{ route('login') }}" method="POST" class="row g-4">
                                            @csrf
                                            <div class="col-12">
                                                <label>Email Address<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="demo@gmail.com">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label>Password<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="********">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                    <label class="form-check-label" for="inlineFormCheck">Keep me signed in</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <a href="{{ route('password.request') }}" class="float-end text-primary">Forgot your password?</a>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn mt-2 login-btn">Log In</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <div class="form-right h-100  text-white text-center pt-5">
                                        <img class="login-logo" src="{{ asset('assets/img/main-logo.png') }}" loading="lazy" alt="logo">
                                        <h2 class="fs-1">Welcome Back!!!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login - Login page -->
    </main>
@endsection



@push('customCss')
@endpush

@push('customCss')
@endpush

@push('js')
@endpush

@push('customJs')
    <script>

    </script>
@endpush
