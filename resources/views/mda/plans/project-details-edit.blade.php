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
                                <li class="breadcrumb-item"><a href="{{route('plan-project-details', [$plan->id, $project->id])}}">{{$project->name}}</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Project
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
                </div>

                <form class="form">
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
                                            <td> <b>Subject<b /> </td>
                                            <td>
                                            <input value="{{$project->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"/>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Description<b /> </td>
                                            <td>
                                            <input value="{{$project->description}}" type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description"/>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Process Type<b /> </td>
                                            <td>
                                            <input value="{{$project->process_type}}" type="text" class="form-control @error('process_type') is-invalid @enderror" name="process_type" id="process_type"/>
                                            @error('process_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Category<b /> </td>
                                            <td>
                                            <input value="{{$project->category}}" type="text" class="form-control @error('category') is-invalid @enderror" name="category" id="category"/>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Procurement / Disposal Method<b /> </td>
                                            <td>
                                            <input value="{{$project->procurement_method}}" type="text" class="form-control @error('procurement_method') is-invalid @enderror" name="procurement_method" id="procurement_method"/>
                                            @error('procurement_method')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Estimated Cost / Reserve Price<b /> </td>
                                            <td>
                                            <input value="{{$project->estimate_cost}}" type="text" class="form-control @error('estimate_cost') is-invalid @enderror" name="estimate_cost" id="estimate_cost"/>
                                            @error('estimate_cost')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>GL Code<b /> </td>
                                            <td>
                                            <input value="{{$project->gl_code}}" type="text" class="form-control @error('gl_code') is-invalid @enderror" name="gl_code" id="gl_code"/>
                                            @error('gl_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Programme<b /> </td>
                                            <td>
                                            <input value="{{$project->programme}}" type="text" class="form-control @error('programme') is-invalid @enderror" name="programme" id="programme"/>
                                            @error('programme')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Sub-Programme<b /> </td>
                                            <td>
                                            <input value="{{$project->sub_programme}}" type="text" class="form-control @error('sub_programme') is-invalid @enderror" name="sub_programme" id="sub_programme"/>
                                            @error('sub_programme')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Quantities<b /> </td>
                                            <td>
                                            <input value="{{$project->quantities}}" type="text" class="form-control @error('quantities') is-invalid @enderror" name="quantities" id="quantities"/>
                                            @error('quantities')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Source of Funds<b /> </td>
                                            <td>
                                            <input value="{{$project->source_of_funds}}" type="text" class="form-control @error('source_of_funds') is-invalid @enderror" name="source_of_funds" id="source_of_funds"/>
                                            @error('source_of_funds')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Asset Location<b /> </td>
                                            <td>
                                            <input value="{{$project->asset_location}}" type="text" class="form-control @error('asset_location') is-invalid @enderror" name="asset_location" id="asset_location"/>
                                            @error('asset_location')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Justification<b /> </td>
                                            <td>
                                            <input value="{{$project->justification}}" type="text" class="form-control @error('justification') is-invalid @enderror" name="justification" id="justification"/>
                                            @error('justification')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Feasibility Studies/Condition Survey<b /> </td>
                                            <td>
                                            <input value="{{$project->feasibility_studies}}" type="text" class="form-control @error('feasibility_studies') is-invalid @enderror" name="feasibility_studies" id="feasibility_studies"/>
                                            @error('feasibility_studies')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Awarding Authority<b /> </td>
                                            <td>
                                            <input value="{{$project->awarding_authority}}" type="text" class="form-control @error('awarding_authority') is-invalid @enderror" name="awarding_authority" id="awarding_authority"/>
                                            @error('awarding_authority')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Budgetary Provision in Naira<b /> </td>
                                            <td>
                                            <input value="{{$project->budgetary_provision_in_naira}}" type="text" class="form-control @error('budgetary_provision_in_naira') is-invalid @enderror" name="budgetary_provision_in_naira" id="budgetary_provision_in_naira"/>
                                            @error('budgetary_provision_in_naira')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Preparation of designs drawings and specifications<b /> </td>
                                            <td>
                                            <input value="{{$project->preparation_of_designs}}" type="text" class="form-control @error('preparation_of_designs') is-invalid @enderror" name="preparation_of_designs" id="preparation_of_designs"/>
                                            @error('preparation_of_designs')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Preparation of Tender Documents<b /> </td>
                                            <td>
                                            <input value="{{$project->preparation_of_tender_documents}}" type="text" class="form-control @error('preparation_of_tender_documents') is-invalid @enderror" name="preparation_of_tender_documents" id="preparation_of_tender_documents"/>
                                            @error('preparation_of_tender_documents')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Issued No objection certificate<b /> </td>
                                            <td>
                                            <input value="{{$project->issued_no_objection_certificate}}" type="text" class="form-control @error('issued_no_objection_certificate') is-invalid @enderror" name="issued_no_objection_certificate" id="issued_no_objection_certificate"/>
                                            @error('issued_no_objection_certificate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Date of Accounting Officer Approval<b /> </td>
                                            <td>
                                            <input value="{{$project->date_of_accounting_officer_approval}}" type="text" class="form-control flatpickr-disable-future-date @error('date_of_accounting_officer_approval') is-invalid @enderror" name="date_of_accounting_officer_approval" id="date_of_accounting_officer_approval"/>
                                            @error('date_of_accounting_officer_approval')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Contract Type<b /> </td>
                                            <td>
                                            <input value="{{$project->contract_type}}" type="text" class="form-control flatpickr-disable-future-date @error('contract_type') is-invalid @enderror" name="contract_type" id="contract_type"/>
                                            @error('contract_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Project Commencement Date<b /> </td>
                                            <td>
                                            <input value="{{$project->project_commencement_date}}" type="text" class="form-control flatpickr-disable-future-date @error('project_commencement_date') is-invalid @enderror" name="project_commencement_date" id="project_commencement_date"/>
                                            @error('project_commencement_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>If Strategic Asset (Date of PSST Approval)<b /> </td>
                                            <td>
                                            <input value="{{$project->date_of_psst_approval}}" type="text" class="form-control flatpickr-disable-future-date @error('date_of_psst_approval') is-invalid @enderror" name="date_of_psst_approval" id="date_of_psst_approval"/>
                                            @error('date_of_psst_approval')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Advertisement date<b /> </td>
                                            <td>
                                            <input value="{{$project->advertisement_date}}" type="text" class="form-control flatpickr-disable-future-date @error('advertisement_date') is-invalid @enderror" name="advertisement_date" id="advertisement_date"/>
                                            @error('advertisement_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Bid Closing / Opening date<b /> </td>
                                            <td>
                                            <input value="{{$project->bid_closing_opening_date}}" type="text" class="form-control flatpickr-disable-future-date @error('bid_closing_opening_date') is-invalid @enderror" name="bid_closing_opening_date" id="bid_closing_opening_date"/>
                                            @error('bid_closing_opening_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Approval of Evaluation Report<b /> </td>
                                            <td>
                                            <input value="{{$project->approval_of_evaluation_report}}" type="text" class="form-control @error('approval_of_evaluation_report') is-invalid @enderror" name="approval_of_evaluation_report" id="approval_of_evaluation_report"/>
                                            @error('approval_of_evaluation_report')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Award Notification Date<b /> </td>
                                            <td>
                                            <input value="{{$project->award_notification_date}}" type="text" class="form-control flatpickr-disable-future-date @error('award_notification_date') is-invalid @enderror" name="award_notification_date" id="award_notification_date"/>
                                            @error('award_notification_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Contract Signing Date<b /> </td>
                                            <td>
                                            <input value="{{$project->contract_signing_date}}" type="text" class="form-control flatpickr-disable-future-date @error('contract_signing_date') is-invalid @enderror" name="contract_signing_date" id="contract_signing_date"/>
                                            @error('contract_signing_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
                                        </tr>
                                        <tr>
                                            <td> <b>Completion date<b /> </td>
                                            <td>
                                            <input value="{{$project->completion_date}}" type="text" class="form-control flatpickr-disable-future-date @error('completion_date') is-invalid @enderror" name="completion_date" id="completion_date"/>
                                            @error('completion_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                           </td>
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

                                    <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal"
                                        data-bs-target="">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /Actions -->
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection