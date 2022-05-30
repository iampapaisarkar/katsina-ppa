@extends('layouts.app', ['page' => 'vendor-registration-approved'])

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
                        <h2 class="content-header-title float-start mb-0">Vendor Company Registration</h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Vendor Company Details</h4>
                                </div>
                                <div class="card-body">
                                    
                                    @if (session('errors'))
                                    <div class="alert alert-danger p-2" role="alert">
                                        <p>*{{session('errors')->first('reason')}}</p>
                                    </div>
                                    @endif

                                    @if (session('success'))
                                    <div class="alert alert-success p-2" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    <!-- FORM 1-->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="py-50">COMPANY CORE </h3>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="basicSelect">Area of Core Competence</label>
                                            <input type="text" readonly value="{{$registration->company_details->core_competence->title}}" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="basicSelect">Type of Organization </label>
                                            <input type="text" readonly value="{{$registration->company_details->organization_type->title}}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="py-50">BASIC COMPANY DETAILS </h3>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">Company Name</label>
                                                <input type="text" readonly value="{{$registration->company_details->company_name}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">CAC Number</label>
                                                <input type="text" readonly value="{{$registration->company_details->cac_number}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="fp-default">Date of Incorporation</label>
                                                <input type="text" readonly value="{{$registration->company_details->date_of_incorporation}}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-2">
                                            <label class="form-label" for="numeral-formatting">Share Capital (N)</label>
                                            <input type="text" readonly value="{{$registration->company_details->share_capital}}" class="form-control" />
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="py-50">COMPANY ADDRESS </h3>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="vertical-modern-address">Address</label>
                                            <input type="text" readonly value="{{$registration->company_details->address}}" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="vertical-modern-landmark">Landmark</label>
                                            <input type="text" readonly value="{{$registration->company_details->landmark}}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="city4">City</label>
                                            <input type="text" readonly value="{{$registration->company_details->city}}" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="select2-basic">State</label>
                                            <input type="text" readonly value="{{$registration->company_details->state}}" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="select2-basic">Country</label>
                                            <input type="text" readonly value="{{$registration->company_details->company_country->title}}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="py-50">COMPANY CONTACT PERSON </h3>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">First Name</label>
                                                <input type="text" readonly value="{{$registration->company_details->first_name}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="last-name-column">Last Name</label>
                                                <input type="text" readonly value="{{$registration->company_details->last_name}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="email-id-column">Email</label>
                                                <input type="text" readonly value="{{$registration->company_details->email}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="phone-number">Phone Number</label>
                                                <input type="text" readonly value="{{$registration->company_details->phone_number}}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="company-column">Position</label>
                                                <input type="text" readonly value="{{$registration->company_details->position}}" class="form-control" />
                                            </div>
                                        </div>


                                    </div>
                                    <!-- FORM 1 end-->

                                    <!-- FORM 2-->
                                    <div class="content-header">
                                        <h5 class="mb-0">Director's Info</h5>
                                    </div>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-12">
                                            <h3 class="py-50">COMPANY DIRECTORS </h3>
                                        </div>

                                        @foreach($registration->company_directors as $key => $director)
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="fname">First Name</label>
                                                <input type="text" readonly value="{{$director->first_name}}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="lname">Last Name</label>
                                                <input type="text" readonly value="{{$director->last_name}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="email-id-column">Email</label>
                                                <input type="text" readonly value="{{$director->email}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="phone-number2">Phone Number</label>
                                                <input type="text" readonly value="{{$director->phone_number}}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-4 col-12">
                                            <label class="form-label" for="vertical-modern-address">Address</label>
                                            <input type="text" readonly value="{{$director->address}}" class="form-control" />
                                        </div>
                                            
                                        <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Upload Passport Photo (IAMGE/1MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-director-document', ['passport', $director->passport, $director->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Upload Identification (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-director-document', ['identification', $director->identification, $director->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Upload Certificates (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-director-document', ['certificates', $director->certificates, $director->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>

                                        <div class="col-12">
                                            <h3 class="py-50">
                                                <hr />
                                            </h3>
                                        </div>

                                        @endforeach

                                    </div>
                                    <!-- FORM 2 end-->

                                    <!-- FORM 3-->
                                    <div class="content-header">
                                        <h5 class="mb-0">Product and Service Offered</h5>
                                        <small>Select Product and Service</small>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                        <h3 class="py-50">PRODUCTS AND SERVICES </h3>
                                    </div>
                                    </div>
                                    <table id="itemList" border="0" cellpadding="0" cellspacing="0" width="100%" class="cate">
                                        @foreach(app('App\Http\Services\BackendData')->ServiceTypes() as $key => $ServiceType)
                                        <tr>

                                            <th width="5%">
                                                <input 
                                                disabled
                                                {{in_array($ServiceType->id, $serviceTypes) ? 'checked' : ''}}
                                                type="checkbox" 
                                                id="service_types_{{$ServiceType->id}}" 
                                                value="{{$ServiceType->id}}"
                                                data-index="{{$ServiceType->id}}" 
                                                onClick="checkAll({{$ServiceType}})" 
                                                />
                                            </th>
                                            <th width="95%">
                                                {{$ServiceType->title}}
                                            </th>
                                        </tr>

                                            @foreach($ServiceType->services as $service)
                                            <tr>
                                                <td width="5%">
                                                    <input 
                                                    disabled
                                                    {{in_array($service->id, $services) ? 'checked' : ''}}
                                                    type="checkbox" 
                                                    id="services_{{$ServiceType->id}}_{{$service->id}}" 
                                                    value="{{$service->id}}"
                                                    unchecked 
                                                    onClick="onCheckBoxClick({{$service->id}})" 
                                                    />
                                                </td>
                                                <td colspan="2" width="95%">
                                                    {{$service->title}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    </table>
                                    <!-- FORM 3 end-->


                                    <!-- FORM 4-->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="py-50">REGISTRATION CATEGORY </h3>
                                        </div>
                                        <div class="mb-1 col-md-12">
                                            <label class="form-label" for="basicSelect">Registration Categories</label>
                                            <input type="text" readonly value="{{$registration->category_documents->registration_category->title}}" class="form-control" />
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="py-50">DOCUMENTS FOR UPLOAD </h3>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Banker's Reference showing capability of financing contracts within the classification applied for (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_1', $registration->category_documents->attachment_1, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <hr />
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Value Added Tax (VAT) Certificate (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_9', $registration->category_documents->attachment_9, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <hr />
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Certificate of Incorporation/Registration of Business Name (CAC Certificate) (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_2', $registration->category_documents->attachment_2, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <hr />
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">CAC Form 1.1: (Statement of Share Capital) (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_3', $registration->category_documents->attachment_3, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <hr />
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">CAC Form 7/7A: (Particulars of First Director/Notice of Change of Directors\ for Business Name, Particulars of Proprietorship) (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_4', $registration->category_documents->attachment_4, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <hr />
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Copy of Company Memorandum & Articles of Association (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_5', $registration->category_documents->attachment_5, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <hr />
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Current 3 years Personal-Katsina State Government Tax Clearance Certificate as well as Development Levy of Chief Executive Officer and One (1) Director. (In case of Business Names One(1) Director is sufficient) (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_6', $registration->category_documents->attachment_6, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <hr />
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Company Profile detailing the company's structure, Key personnel Supported with Professional Licenses/Certificates, curriculum Vitae and Similar jobs executed in the past (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_7', $registration->category_documents->attachment_7, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <hr />
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                            <label for="formFile" class="form-label">Curriculum Vitae of key staff supported by Professional Licenses/Certificates (PDF/2MB max)</label>
                                            <br>
                                            <a href="{{route('vendor-registration-download-category-document', ['attachment_8', $registration->category_documents->attachment_8, $registration->category_documents->id])}}" class="btn btn-secondary" target="_blank">DOWNLOAD DOCUMENT</a>
                                        </div>
                                    </div>
                                    <!-- FORM 4 end-->
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                            <div class="card shadow-none bg-transparent border-success">
                                <div class="card-body">
                                    <h4 class="card-title">Approved By</h4>
                                    <p class="card-text">{{$registration->approve_by->first_name}} {{$registration->approve_by->sur_name}}</p>
                                    <p class="card-text"><span class="badge badge-light-success">{{\Carbon\Carbon::parse($registration->approved_at)->format('d M Y / h:i A')}}</span></p>
                                </div>
                            </div>
                        </div>
                        <!-- /Actions -->
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection