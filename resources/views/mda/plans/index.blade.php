@extends('layouts.app', ['page' => 'plan'])

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
       
        @if (session('errors'))
        <div class="alert alert-danger p-2" role="alert">
            <p>*{{session('errors')->first('title')}}</p>
        </div>
        <div class="alert alert-danger p-2" role="alert">
            <p>*{{session('errors')->first('type')}}</p>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success p-2" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="content-body">
            <a href="#" class="btn btn-secondary"><i data-feather="download" ></i>  <span>DOWNLOAD TEMPLATE</span></a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUser"><i data-feather='upload'></i>  <span>UPLOAD NEW ANNUAL PRODUREMENT PLAN</span></button>
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="15%">DATE</th>
                                    <th width="10%"><span class="align-middle">YEAR</span></th>
                                    <th width="35%">Description</th>
                                    <th width="15%">Uploaded By</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><small class="text-muted">5 Jan 2022</small></td>
                                    <td>
                                        <a href="mda-procurement-plan-view.php">2022</a>
                                    </td>
                                    <td>
                                        2022 Annual Procurement Plan
                                    </td>
                                    <td><small class="text-muted">Khadija Aminu </small></td>
                                    <td><span class="badge badge-light-success badge-pill">APPROVED</span></td>
                                    <td>
                                        <a href="mda-procurement-plan-view.php" class="btn btn-success btn-sm">
                                            <i data-feather="eye" ></i>
                                            <span>VIEW</span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection