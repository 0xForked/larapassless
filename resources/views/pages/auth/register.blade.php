@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <h1 class="auth-title">Sign up.</h1>
                <p class="auth-subtitle mb-5">
                    Input your data to register to our website.
                </p>

                <form action="#">
                    <div class="form-group position-relative has-icon-left">
                        <input type="email" class="form-control form-control-xl" placeholder="Email address">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mt-3">
                        <input type="text" class="form-control form-control-xl" placeholder="Full name">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-bold">
                            Sign in
                        </a>.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                {{-- TODO replace with images or something --}}
            </div>
        </div>
    </div>
@endsection
