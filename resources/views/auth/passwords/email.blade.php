@extends('layouts.guest')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-cover">
                <div class="auth-inner row m-0">
                    <!-- Brand logo-->
                    <a class="brand-logo" href="index.php">
                        <h4 class="text-center mb-2"><img class="logo" src="{{ asset('libs/app-assets/images/logo/logo.png')}}" /></h4>
                    </a>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('libs/app-assets/images/pages/forgot-password-v2.svg')}}" alt="Forgot password V2" /></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Forgot password-->
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            @if (session('status'))
                                <div class="alert alert-success p-2" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h2 class="card-title fw-bold mb-1">Forgot Password? 🔒</h2>
                            <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>
                            <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}" method="POST">
                            @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="forgot-password-email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="forgot-password-email" type="text" name="email" placeholder="john@example.com" aria-describedby="forgot-password-email" autofocus="" tabindex="1" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100" tabindex="2">Send reset link</button>
                            </form>
                            <p class="text-center mt-2"><a href="{{route('login')}}"><i data-feather="chevron-left"></i> Back to login</a></p>
                        </div>
                    </div>
                    <!-- /Forgot password-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
