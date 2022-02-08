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
                        <h2 class="content-header-title float-start mb-0">Password</h2>

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
                            <a class="nav-link" href="{{route('profile')}}">
                                <i data-feather="user" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Profile</span>
                            </a>
                        </li>
                        <!-- security -->
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i data-feather="lock" class="font-medium-3 me-50"></i>
                                <span class="fw-bold">Password</span>
                            </a>
                        </li>

                    </ul>

                    @if (session('error'))
                    <div class="alert alert-success p-2" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                

                    @if (session('success'))
                    <div class="alert alert-success p-2" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- security -->
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body pt-1">
                            <!-- form -->
                            <form class="auth-register-form mt-2" action="{{ route('profile-password-update') }}" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label" for="account-current-password">Current Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" id="account-current-password" 
                                            name="old_password"
                                            class="form-control @error('old_password') is-invalid @enderror" 
                                            placeholder="Enter current password" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label" for="account-password">New Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" id="account-password" 
                                            name="password"
                                            class="form-control @error('password') is-invalid @enderror" 
                                            placeholder="Enter new password" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-1">
                                        <label class="form-label" for="account-confrim-password">Confirm Password</label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" id="account-confrim-password" 
                                            name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror" 
                                            placeholder="Enter confrim password" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1 mt-1">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                    </div>
                    <!--/ security -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection