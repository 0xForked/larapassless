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
                @if (request()->query('action') !== 'LINK_SENT')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label class="visually-hidden" for="autoSizingInputGroup">
                            Username
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <input 
                                type="email" 
                                name="email"
                                class="form-control form-control-xl @error('email') is-invalid @enderror"
                                placeholder="Email address"
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email"
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <label class="visually-hidden" for="autoSizingInputGroup">
                            Username
                        </label>
                        <div class="input-group mt-3">
                            <div class="input-group-text">
                                <i class="bi bi-person"></i>
                            </div>
                            <input 
                                type="text" 
                                name="name"
                                class="form-control form-control-xl @error('name') is-invalid @enderror"
                                placeholder="Full name"
                                value="{{ old('name') }}" 
                                required 
                                autocomplete="name"
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Submit</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-bold">
                                Sign in
                            </a>
                        </p>
                    </div>
                @else
                    Pleace check your email address <b> <u>{{ request()->query('email') }}</u>!</b>

                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">
                            Didn't receive a magic link?
                            <a 
                                href="{{ route('resend.link', [
                                    'path' => request()->segment(FIRST_ITERATION),
                                    'email' => request()->query('email')
                                ]) }}" 
                                class="font-bold"
                            >
                                Resend
                            </a>
                        </p>
                    </div>
                @endif
               
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                {{-- TODO replace with images or something --}}
            </div>
        </div>
    </div>
@endsection
