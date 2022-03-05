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
                                <li class="breadcrumb-item"><a href="{{route('plan-projects', $plan->id)}}">{{$plan->year}} Procurement
                                        Plan</a>
                                </li>
                                <li class="breadcrumb-item active">{{$project->name}}
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
                        <h4>Financial Year: {{$plan->year}}</h4>
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
                                        <td>{{$project->name}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Description<b /></td>
                                        <td>{{$project->description}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Process Type<b /></td>
                                        <td>{{$project->process_type}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Category<b /></td>
                                        <td>{{$project->category}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Procurement / Disposal Method<b /></td>
                                        <td>{{$project->procurement_method}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Estimated Cost / Reserve Price<b /></td>
                                        <td>{{$project->estimate_cost}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>GL Code<b /></td>
                                        <td>{{$project->gl_code}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Programme<b /></td>
                                        <td>{{$project->programme}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Sub-Programme<b /></td>
                                        <td>{{$project->sub_programme}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Quantities<b /></td>
                                        <td>{{$project->quantities}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Source of Funds<b /></td>
                                        <td>{{$project->source_of_funds}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Asset Location<b /></td>
                                        <td>{{$project->asset_location}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Justification<b /></td>
                                        <td>{{$project->justification}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Feasibility Studies/Condition Survey<b /></td>
                                        <td>{{$project->feasibility_studies}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Awarding Authority<b /></td>
                                        <td>{{$project->awarding_authority}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Budgetary Provision in Naira<b /></td>
                                        <td>{{$project->budgetary_provision_in_naira}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Preparation of designs drawings and specifications<b /></td>
                                        <td>{{$project->preparation_of_designs}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Preparation of Tender Documents<b /></td>
                                        <td>{{$project->preparation_of_tender_documents}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Issued No objection certificate<b /></td>
                                        <td>{{$project->issued_no_objection_certificate}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Date of Accounting Officer Approval<b /></td>
                                        <td>{{$project->date_of_accounting_officer_approval}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Contract Type<b /></td>
                                        <td>{{$project->contract_type}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Project Commencement Date<b /></td>
                                        <td>{{$project->project_commencement_date}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>If Strategic Asset (Date of PSST Approval)<b /></td>
                                        <td>{{$project->date_of_psst_approval}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Advertisement date<b /></td>
                                        <td>{{$project->advertisement_date}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Bid Closing / Opening date<b /></td>
                                        <td>{{$project->bid_closing_opening_date}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Approval of Evaluation Report<b /></td>
                                        <td>{{$project->approval_of_evaluation_report}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Award Notification Date<b /></td>
                                        <td>{{$project->award_notification_date}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Contract Signing Date<b /></td>
                                        <td>{{$project->contract_signing_date}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Completion date<b /></td>
                                        <td>{{$project->completion_date}}</td>
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
                                <a href="{{route('plan-project-details-edit', [$plan->id, $project->id])}}">
                                    <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal"
                                        data-bs-target="">
                                        Edit Details
                                    </button>
                                </a>
                            </div>
                        </div>

                        <!-- <div class="card">
                            <div class="card-body">
                                <p>An Update Request is currently being proccessed</p>
                                <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal" data-bs-target=""
                                    disabled>
                                    Edit Details
                                </button>
                            </div>
                        </div> -->
                    </div>
                    <!-- /Actions -->
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection