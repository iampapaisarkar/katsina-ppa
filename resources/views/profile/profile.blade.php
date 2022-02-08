@extends('layouts.app', ['page' => 'profile'])

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Profile</h2>
                        <!--<div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Account Settings </a>
                                    </li>
                                    <li class="breadcrumb-item active"> Account
                                    </li>
                                </ol>
                            </div>-->
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-2">
                        <!-- account -->
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Profile</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('profile-password')}}">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Password</span>
                            </a>
                        </li>

                    </ul>

                    <!-- profile -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Profile Details</h4>
                        </div>
                        <div class="card-body py-2 my-25">


                            <!-- form -->
                            <form class="auth-register-form mt-2" action="{{ route('profile-update') }}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label" for="register-fname">First Name</label>
                                        <input value="{{Auth::user()->first_name}}" class="form-control @error('first_name') is-invalid @enderror" id="register-fname" type="text" name="first_name" placeholder="Nasiru" aria-describedby="register-fname" autofocus="" tabindex="1" />
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label" for="register-lname">Surname</label>
                                        <input value="{{Auth::user()->sur_name}}" class="form-control @error('sur_name') is-invalid @enderror" id="register-sname" type="text" name="sur_name" placeholder="Abubakar" aria-describedby="register-sname" autofocus="" tabindex="1" />
                                        @error('sur_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    
                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label" for="register-email">Email</label>
                                        <input value="{{Auth::user()->email}}" readonly class="form-control @error('email') is-invalid @enderror" id="register-email" type="email" name="email" placeholder="john@example.com" aria-describedby="register-email" tabindex="2" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label" for="register-phone_number">Phone Number</label>
                                        <input value="{{Auth::user()->phone_number}}" class="form-control @error('phone_number') is-invalid @enderror" id="register-phone_number" type="text" name="phone_number" placeholder="john@example.com" aria-describedby="register-phone_number" tabindex="2" />
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection