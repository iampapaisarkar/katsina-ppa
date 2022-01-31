@extends('layouts.guest')

@section('content')
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
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('libs/app-assets/images/illustration/verify-email-illustration.svg')}}" alt="two steps verification" /></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- verify email v2-->
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            @if (session('status'))
                                <div class="alert alert-success p-2" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h2 class="card-title fw-bolder mb-1">Verify your email &#x2709;&#xFE0F;</h2>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <p class="card-text mb-2">Account activation link sent to your email address:<span class="fw-bolder"> nasiru@example.com</span> Please follow the link inside to continue.</p><a onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="btn btn-primary w-100" href="#"><i class="i-Mail-with-At-Sign"></i>Skip for now</a>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <p class="text-center mt-2"><span>Didn&apos;t receive an email?</span><button type="submit" class="btn btn-link p-0 m-0 align-baseline">Resend</button></p>.
                            </form>
                        </div>
                    </div>
                    <!-- verify email-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
