@extends('layouts.app', ['page' => 'plan'])

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

                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('plans')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('plan-projects', 1)}}">2022 Procurement
                                        Plan</a>
                                </li>
                                <li class="breadcrumb-item active">Supply of 10 Hilux Vehicles for SUBEB
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- invoice list -->
            <section class="invoice-list-wrapper">
                <div class="row d-flex align-items-end">

                    <div class="col-md-4 col-12">
                        <h4>Financial Year: 2022</h4>
                    </div>

                    <div class="col-md-4 col-12">

                    </div>
                    <div class="col-md-4 col-12">

                    </div>

                </div>
                <div class="row">
                    <!-- Details -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="table-responsive">
                            <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="35%"></th>
                                        <th width="65%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Subject<b /></td>
                                        <td>Supply of 10 Hilux Vehicles for SUBEB</td>
                                    </tr>

                                    <tr>
                                        <td><b>Description<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Process Type<b /></td>
                                        <td>Procurement</td>
                                    </tr>

                                    <tr>
                                        <td><b>Category<b /></td>
                                        <td>Supplies</td>
                                    </tr>

                                    <tr>
                                        <td><b>Procurement / Disposal Method<b /></td>
                                        <td>Open Domestic Bidding (ODB)</td>
                                    </tr>

                                    <tr>
                                        <td><b>Estimated Cost / Reserve Price<b /></td>
                                        <td>35,000,000</td>
                                    </tr>

                                    <tr>
                                        <td><b>GL Code<b /></td>
                                        <td>KT2325345</td>
                                    </tr>

                                    <tr>
                                        <td><b>Programme<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Sub-Programme<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Quantities<b /></td>
                                        <td>10</td>
                                    </tr>

                                    <tr>
                                        <td><b>Source of Funds<b /></td>
                                        <td>State</td>
                                    </tr>

                                    <tr>
                                        <td><b>Asset Location<b /></td>
                                        <td>Katsina</td>
                                    </tr>

                                    <tr>
                                        <td><b>Justification<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Feasibility Studies/Condition Survey<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Awarding Authority<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Budgetary Provision in Naira<b /></td>
                                        <td>36,000,000</td>
                                    </tr>

                                    <tr>
                                        <td><b>Preparation of designs drawings and specifications<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Preparation of Tender Documents<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Issued No objection certificate<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Date of Accounting Officer Approval<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Contract Type<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Project Commencement Date<b /></td>
                                        <td>12-12-2022</td>
                                    </tr>

                                    <tr>
                                        <td><b>If Strategic Asset (Date of PSST Approval)<b /></td>
                                        <td>12-12-2022</td>
                                    </tr>

                                    <tr>
                                        <td><b>Advertisement date<b /></td>
                                        <td>12-12-2022</td>
                                    </tr>

                                    <tr>
                                        <td><b>Bid Closing / Opening date<b /></td>
                                        <td>12-12-2022</td>
                                    </tr>

                                    <tr>
                                        <td><b>Approval of Evaluation Report<b /></td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipiscing elit</td>
                                    </tr>

                                    <tr>
                                        <td><b>Award Notification Date<b /></td>
                                        <td>12-12-2022</td>
                                    </tr>

                                    <tr>
                                        <td><b>Contract Signing Date<b /></td>
                                        <td>12-12-2022</td>
                                    </tr>

                                    <tr>
                                        <td><b>Completion date<b /></td>
                                        <td>12-12-2022</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>


                    </div>
                    <!-- /Details -->

                    <!-- Actions -->
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="mda-procurement-plan-view-details-edit.php">
                                    <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal"
                                        data-bs-target="">
                                        Edit Details
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <p>An Update Request is currently being proccessed</p>
                                <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal" data-bs-target=""
                                    disabled>
                                    Edit Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /Actions -->
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection