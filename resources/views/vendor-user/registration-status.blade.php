@extends('layouts.app', ['page' => 'vendor-registration-status'])

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
                        <h2 class="content-header-title float-start mb-0">Vendor Registration Status</h2>

                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Style variation -->
            <section id="card-style-variation">

                <!-- Solid -->
                <div class="row">

                @if(app('App\Http\Services\CheckVendorRegistration')->status()['success'] == true)
                    <div class="col-md-12 col-xl-12">
                        <div class="card bg-{{app('App\Http\Services\CheckVendorRegistration')->status()['color']}} text-white">
                            <div class="card-body">
                                <h2 class="card-title text-white"><i data-feather="{{app('App\Http\Services\CheckVendorRegistration')->status()['icon']}}"></i> {{app('App\Http\Services\CheckVendorRegistration')->status()['title']}}</h2>
                                <h4 class="card-text">{{app('App\Http\Services\CheckVendorRegistration')->status()['caption']}}</h4>
                                <p class="card-text">{{app('App\Http\Services\CheckVendorRegistration')->status()['message']}}</p>

                                @if(isset(app('App\Http\Services\CheckVendorRegistration')->status()['reason']))
                                <p class="card-text">
                                <ul>
                                    <li><p>{{app('App\Http\Services\CheckVendorRegistration')->status()['reason']}}</p></li>
                                </ul>
                                </p>
                                <p class="card-text">
                                    <a href="{{app('App\Http\Services\CheckVendorRegistration')->status()['edit-link']}}" class="btn btn-secondary ">

                                        <span>Update Registration Details</span>
                                    </a>
                                </p>
                                @endif

                                @if(isset(app('App\Http\Services\CheckVendorRegistration')->status()['download-link']))
                                <p class="card-text">
                                    <a target="_blank" href="{{app('App\Http\Services\CheckVendorRegistration')->status()['download-link']}}" class="btn btn-secondary ">
                                        <i data-feather="award"></i>
                                        <span>Downlaod Certificate</span>
                                    </a>
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                @else
                    <div class="col-md-12 col-xl-12">
                        <div class="card bg-{{app('App\Http\Services\CheckVendorRegistration')->status()['color']}} text-white">
                            <div class="card-body">
                                <h2 class="card-title text-white"><i data-feather="app('App\Http\Services\CheckVendorRegistration')->status()['icon']"></i> {{app('App\Http\Services\CheckVendorRegistration')->status()['title']}}</h2>
                            </div>
                        </div>
                    </div>
                @endif

                </div>
            </section>
            <!--/ Style variation -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection