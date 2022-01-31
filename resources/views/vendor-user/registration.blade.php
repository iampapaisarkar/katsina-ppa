@extends('layouts.app', ['page' => 'vendor-registration'])

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
                            <h2 class="content-header-title float-start mb-0">Vendor Registration</h2>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <form method="POST" action="{{route('registration-submit')}}" enctype="multipart/form-data" novalidate>
                @csrf
                    <!-- Modern Vertical Wizard -->
                    <section class="modern-vertical-wizard">
                        <div class="bs-stepper vertical wizard-modern modern-vertical-wizard-example">
                            <div class="bs-stepper-header">
                                <div class="step" data-target="#account-details-vertical-modern" role="tab" id="account-details-vertical-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="file-text" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Company Details</span>
                                            <span class="bs-stepper-subtitle">Enter Company Details</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#directors-info-vertical-modern" role="tab" id="directors-info-vertical-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="user" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Company Directors</span>
                                            <span class="bs-stepper-subtitle">Add Director Info</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#services-step-vertical-modern" role="tab" id="services-step-vertical-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="layout" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Products and Services</span>
                                            <span class="bs-stepper-subtitle">Add Products and Services</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#social-links-vertical-modern" role="tab" id="social-links-vertical-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="upload" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Category and Documents</span>
                                            <span class="bs-stepper-subtitle">Upload Documents</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="bs-stepper-content">
                                @include('vendor-user.forms.form1')
                                @include('vendor-user.forms.form2')
                                @include('vendor-user.forms.form3')               
                                @include('vendor-user.forms.form4')                
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection