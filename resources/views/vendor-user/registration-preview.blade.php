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
                        <h2 class="content-header-title float-start mb-0">Vendor Registration - Preview</h2>

                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <form method="POST" action="{{route('registration-submit')}}" enctype="multipart/form-data" novalidate>
            @csrf
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Multiple Column</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <!-- FORM 1-->


                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="py-50">COMPANY CORE </h3>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="basicSelect">Area of Core Competence</label>
                                                <select class="form-select @error('area_of_core_competence') is-invalid @enderror" name="area_of_core_competence" id="basicSelect">
                                                    <option selected hidden value="{{$data['area_of_core_competence']}}">{{$data['area_of_core_competence']}}</option>
                                                    <option value="">select one</option>
                                                    <option value="GOODS (Suppliers)">GOODS (Suppliers)</option>
                                                    <option value="WORKS (Contractors)">WORKS (Contractors)</option>
                                                    <option value="SERVICES (Consulting & Non-Consulting)">SERVICES
                                                        (Consulting & Non-Consulting)</option>
                                                </select>
                                                @error('area_of_core_competence')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="basicSelect">Type of Organization </label>
                                                <select class="form-select @error('type_of_organization') is-invalid @enderror" name="type_of_organization" id="basicSelect">
                                                    <option selected hidden value="{{$data['type_of_organization']}}">{{$data['type_of_organization']}}</option>
                                                    <option value="">select one</option>
                                                    <option value="Incorporated Company">Incorporated Company</option>
                                                    <option value="Limited Partnerships">Limited Partnerships</option>
                                                    <option value="Business Name">Business Name</option>
                                                </select>
                                                @error('type_of_organization')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="py-50">BASIC COMPANY DETAILS </h3>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="basicInput">Company Name</label>
                                                    <input type="text" name="company_name" value="{{$data['company_name']}}" class="form-control @error('company_name') is-invalid @enderror" id="basicInput"
                                                        placeholder="XYZ Limited" />
                                                    @error('company_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="basicInput">CAC Number</label>
                                                    <input type="text" name="cac_number" value="{{$data['cac_number']}}" class="form-control @error('cac_number') is-invalid @enderror" id="basicInput"
                                                        placeholder="RC/BN" />
                                                    @error('cac_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="fp-default">Default</label>
                                                    <input type="text" name="default" value="{{$data['default']}}" id="fp-default" class="form-control flatpickr-basic @error('default') is-invalid @enderror"
                                                        placeholder="DD-MM-YYYY" />
                                                    @error('default')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12 mb-2">
                                                <label class="form-label" for="numeral-formatting">Share Capital (N)</label>
                                                <input type="text" name="share_capital" value="{{$data['share_capital']}}" class="form-control numeral-mask @error('share_capital') is-invalid @enderror" placeholder="10,000"
                                                    id="numeral-formatting" />
                                                @error('share_capital')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="py-50">COMPANY ADDRESS </h3>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="vertical-modern-address">Address</label>
                                                <input value="{{$data['address']}}" type="text" name="address" id="vertical-modern-address" class="form-control @error('address') is-invalid @enderror"
                                                    placeholder="98 Ibrahim Ado bridge Road, " />
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="vertical-modern-landmark">Landmark</label>
                                                <input value="{{$data['landmark']}}" type="text" name="landmark" id="vertical-modern-landmark" class="form-control @error('landmark') is-invalid @enderror"
                                                    placeholder="Kusada bridge" />
                                                @error('landmark')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="city4">City</label>
                                                <input value="{{$data['city']}}" type="text" name="city" id="city4" class="form-control @error('city') is-invalid @enderror" placeholder="Kankara" />
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-6">

                                                <label class="form-label" for="select2-basic">State</label>
                                                <select name="state" class="select2 form-select @error('state') is-invalid @enderror" id="select2-basic">
                                                    <option selected hidden value="{{$data['state']}}">{{$data['state']}}</option>
                                                    <option>Select State</option>
                                                    <option value="Abia">Abia</option>
                                                    <option value="Adamawa">Adamawa</option>
                                                    <option value="Anambra">Anambra</option>
                                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                                    <option value="Bauchi">Bauchi</option>
                                                    <option value="Bayelsa">Bayelsa</option>
                                                    <option value="Benue">Benue</option>
                                                    <option value="Borno">Borno</option>
                                                    <option value="Cross River">Cross River</option>
                                                    <option value="Delta">Delta</option>
                                                    <option value="Ebonyi">Ebonyi</option>
                                                    <option value="Enugu">Enugu</option>
                                                    <option value="Edo">Edo</option>
                                                    <option value="Ekiti">Ekiti</option>
                                                    <option value="Gombe">Gombe</option>
                                                    <option value="Imo">Imo</option>
                                                    <option value="Jigawa">Jigawa</option>
                                                    <option value="Kaduna">Kaduna</option>
                                                    <option value="Kano">Kano</option>
                                                    <option value="Katsina">Katsina</option>
                                                    <option value="Kebbi">Kebbi</option>
                                                    <option value="Kogi">Kogi</option>
                                                    <option value="Kwara">Kwara</option>
                                                    <option value="Lagos">Lagos</option>
                                                    <option value="Nasarawa">Nasarawa</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Ogun">Ogun</option>
                                                    <option value="Ondo">Ondo</option>
                                                    <option value="Osun">Osun</option>
                                                    <option value="Oyo">Oyo</option>
                                                    <option value="Plateau">Plateau</option>
                                                    <option value="Rivers">Rivers</option>
                                                    <option value="Sokoto">Sokoto</option>
                                                    <option value="Taraba">Taraba</option>
                                                    <option value="Yobe">Yobe</option>
                                                    <option value="Zamfara">Zamfara</option>
                                                    <option value="FCT Abuja">FCT Abuja</option>
                                                </select>
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>



                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="py-50">COMPANY CONTACT PERSON </h3>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">First Name</label>
                                                    <input value="{{$data['first_name']}}" name="first_name" type="text" id="first-name-column" class="form-control @error('first_name') is-invalid @enderror"
                                                        placeholder="First Name" name="fname-column" />
                                                    @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="last-name-column">Last Name</label>
                                                    <input value="{{$data['last_name']}}" name="last_name" type="text" id="last-name-column" class="form-control @error('last_name') is-invalid @enderror"
                                                        placeholder="Last Name" name="lname-column" />
                                                    @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="email-id-column">Email</label>
                                                    <input value="{{$data['email']}}" name="email" type="email" id="email-id-column" class="form-control @error('email') is-invalid @enderror"
                                                        name="email-id-column" placeholder="Email" />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="phone-number">Phone Number</label>
                                                    <input value="{{$data['phone_number']}}" name="phone_number" type="text" class="form-control phone-number-mask @error('phone_number') is-invalid @enderror"
                                                        placeholder="08021234567" id="phone-number" />
                                                    @error('phone_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="company-column">Position</label>
                                                    <input value="{{$data['position']}}" name="position" type="text" id="company-column" class="form-control @error('position') is-invalid @enderror"
                                                        name="company-column" placeholder="Position" />
                                                    @error('position')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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

                                            @foreach($data['director'] as $key => $director)
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="fname">First Name</label>
                                                    <input value="{{$director['first_name']}}" name="director[{{$key}}][first_name]" type="text" class="form-control" id="fname"
                                                        aria-describedby="fname" placeholder="Director's Firstname" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="lname">Last Name</label>
                                                    <input value="{{$director['last_name']}}" name="director[{{$key}}][last_name]" type="text" class="form-control" id="lname"
                                                        aria-describedby="lname" placeholder="Director's Lastname" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="email-id-column">Email</label>
                                                    <input value="{{$director['email']}}" name="director[{{$key}}][email]" type="email" id="email-id-column" class="form-control"
                                                        name="email-id-column" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="phone-number2">Phone Number</label>
                                                    <input value="{{$director['phone_number']}}" name="director[{{$key}}][phone_number]" type="text" class="form-control phone-number-mask"
                                                        placeholder="08021234567" id="phone-number2" />
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-4 col-12">
                                                <label class="form-label" for="vertical-modern-address">Address</label>
                                                <input value="{{$director['address']}}" name="director[{{$key}}][address]" type="text" id="vertical-modern-address" class="form-control"
                                                    placeholder="98 Ibrahim Ado bridge Road, " />
                                            </div>
                                                
                                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Upload Passport Photo (IAMGE/1MB
                                                    max)</label>
                                                <input value="{{$director['passport']}}" name="director[{{$key}}][passport]" class="form-control" type="file" id="formFile"
                                                    accept="image/png, image/jpeg, " />
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Upload Identification (PDF/2MB
                                                    max)</label>
                                                <input value="{{$director['identification']}}" name="director[{{$key}}][identification]" class="form-control" type="file" id="formFile"
                                                    accept="application/pdf" />
                                            </div>
                                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Upload Certificates (PDF/2MB
                                                    max)</label>
                                                <input value="{{$director['certificates']}}" name="director[{{$key}}][certificates]" class="form-control" type="file" id="formFile"
                                                    accept="application/pdf" />
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

                                        <!-- FORM 3 end-->


                                        <!-- FORM 4-->
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="py-50">REGISTRATION CATEGORY </h3>
                                            </div>
                                            <div class="mb-1 col-md-12">
                                                <label class="form-label" for="basicSelect">Registration Categories</label>
                                                <select name="registration_category_id" class="form-select @error('registration_category_id') is-invalid @enderror" id="basicSelect">
                                                    <option selected value="{{$data['registration_category_id']}}">{{$data['registration_category_id']}}</option>
                                                    <option value="">select one</option>
                                                    <option value="Contract Value N500,000 and below">Contract Value N500,000 and below</option>
                                                    <option value="Contract Value N500,001 - N5M">Contract Value N500,001 - N5M</option>
                                                    <option value="Contract Value Above N5M - N10M">Contract Value Above N5M - N10M</option>
                                                    <option value="Contract Value Above N10M - N100M">Contract Value Above N10M - N100M</option>
                                                    <option value="Contract Value Above N100M - N250M">Contract Value Above N100M - N250M</option>
                                                    <option value="Contract Value Above N250M - N1B">Contract Value Above N250M - N1B</option>
                                                    <option value="Contract Value Above N1B to N5B">Contract Value Above N1B to N5B</option>
                                                    <option value="Contract Value Above N5B - N10B">Contract Value Above N5B - N10B</option>
                                                    <option value="Contract Value Above N10B - N20B">Contract Value Above N10B - N20B</option>
                                                    <option value="Contract Value Above N20B">Contract Value Above N20B</option>
                                                </select>
                                                @error('registration_category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="py-50">DOCUMENTS FOR UPLOAD </h3>
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Application Letter with Company
                                                    Letterhead for Registration addressed to the General Manager (PPA)
                                                    (PDF/2MB max)</label>
                                                <input name="attachment_1" class="form-control @error('attachment_1') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <hr />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Certificate of
                                                    Incorporation/Registration of Business Name (CAC Certificate) (PDF/2MB
                                                    max)</label>
                                                <input name="attachment_2" class="form-control @error('attachment_2') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <hr />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">CAC Form 1.1: (Statement of Share
                                                    Capital) (PDF/2MB max)</label>
                                                <input name="attachment_3" class="form-control @error('attachment_3') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_3')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <hr />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">CAC Form 7/7A: (Particulars of
                                                    First Director/Notice of Change of Directors\ for Business Name,
                                                    Particulars of Proprietorship) (PDF/2MB max)</label>
                                                <input name="attachment_4" class="form-control @error('attachment_4') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_4')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <hr />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Copy of Company Memorandum &
                                                    Articles of Association (PDF/2MB max)</label>
                                                <input name="attachment_5" class="form-control @error('attachment_5') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_5')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <hr />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Current 3 years Personal-Katsina
                                                    State Government Tax Clearance Certificate as well as Development Levy
                                                    of Chief Executive Officer and One (1) Director. (In case of Business
                                                    Names One(1) Director is sufficient) (PDF/2MB max)</label>
                                                <input name="attachment_6" class="form-control @error('attachment_6') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_6')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <hr />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Company Profile detailing the
                                                    company's structure, Key personnel Supported with Professional
                                                    Licenses/Certificates, curriculum Vitae and Similar jobs executed in the
                                                    past (PDF/2MB max)</label>
                                                <input name="attachment_7" class="form-control @error('attachment_7') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_7')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <hr />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Curriculum Vitae of key staff
                                                    supported by Professional Licenses/Certificates (PDF/2MB max)</label>
                                                <input name="attachment_8" class="form-control @error('attachment_8') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_8')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <hr />
                                            </div>
                                            <div class="col-lg-12 col-md-12 mb-3 mb-sm-0">
                                                <label for="formFile" class="form-label">Applicants Managing Director/Chief
                                                    Executive Officer's Declaration on oath as to the authenticity of all
                                                    submitted documents and engagement of professionals (PDF/2MB
                                                    max)</label>
                                                <input name="attachment_9" class="form-control @error('attachment_9') is-invalid @enderror" type="file" id="formFile"
                                                    accept="application/pdf" />
                                                @error('attachment_9')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                        </div>
                                        <!-- FORM 4 end-->



                                        <div class="row">

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->
            </form>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection