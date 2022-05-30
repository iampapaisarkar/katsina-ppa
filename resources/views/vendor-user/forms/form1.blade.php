<form id="vendorRegistrationForm1">
@csrf
<div id="account-details-vertical-modern" class="content" role="tabpanel"
    aria-labelledby="account-details-vertical-modern-trigger">
    <div class="content-header">
        <h5 class="mb-0">Company Details</h5>
        <small class="text-muted">Enter Your Company Details.</small>
    </div>
    <div class="row">
        <div class="col-12">
            <h3 class="py-50">COMPANY CORE </h3>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="basicSelect">Area of Core Competence</label>
            <select class="form-select @error('area_of_core_competence') is-invalid @enderror" name="area_of_core_competence" id="basicSelect">
                <option value="">select one</option>
                @foreach(app('App\Http\Services\BackendData')->CoreCompetences() as $CoreCompetence)
                @if((old('area_of_core_competence') && (old('area_of_core_competence') == $CoreCompetence->id)) || ($companyDetails && $companyDetails->area_of_core_competence == $CoreCompetence->id))
                <option value="{{$CoreCompetence->id}}" selected>{{$CoreCompetence->title}}</option>
                @endif
                <option value="{{$CoreCompetence->id}}">{{$CoreCompetence->title}}</option>
                @endforeach
            </select>
            @error('area_of_core_competence')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="basicSelect2">Type of Organization </label>
            <select class="form-select @error('type_of_organization') is-invalid @enderror" name="type_of_organization" id="basicSelect2">  
                <option value="">select one</option>
                @foreach(app('App\Http\Services\BackendData')->OrganizationTypes() as $OrganizationType)
                @if((old('type_of_organization') && (old('type_of_organization') == $OrganizationType->id)) || ($companyDetails && $companyDetails->type_of_organization == $OrganizationType->id))
                <option value="{{$OrganizationType->id}}" selected>{{$OrganizationType->title}}</option>
                @endif
                <option value="{{$OrganizationType->id}}">{{$OrganizationType->title}}</option>
                @endforeach
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
                <input value="{{$companyDetails ? $companyDetails->company_name : ''}}" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" id="basicInput" placeholder="XYZ Limited" />
                @error('company_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-1">
                <label class="form-label" for="basicInput2">CAC Number</label>
                <input value="{{$companyDetails ? $companyDetails->cac_number : ''}}" type="text" class="form-control @error('cac_number') is-invalid @enderror" name="cac_number" id="basicInput2" placeholder="RC/BN" />
                @error('cac_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="mb-1">
                <label class="form-label" for="fp-date_of_incorporation">Date of Incorporation</label>
                <input value="{{$companyDetails ? $companyDetails->date_of_incorporation : ''}}" type="text" id="fp-date_of_incorporation" name="date_of_incorporation" class="form-control flatpickr-disable-future-date @error('date_of_incorporation') is-invalid @enderror" placeholder="DD-MM-YYYY" />
                @error('date_of_incorporation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-sm-12 mb-2">
            <label class="form-label" for="numeral-formatting">Share Capital (N)</label>
            <input value="{{$companyDetails ? $companyDetails->share_capital : ''}}" type="text" name="share_capital" class="form-control numeral-mask @error('share_capital') is-invalid @enderror" placeholder="10,000" id="numeral-formatting" />
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
            <input value="{{$companyDetails ? $companyDetails->address : ''}}" type="text" name="address" id="vertical-modern-address" class="form-control @error('address') is-invalid @enderror"
                placeholder="98 Ibrahim Ado bridge Road, " />
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="vertical-modern-landmark">Landmark</label>
            <input value="{{$companyDetails ? $companyDetails->landmark : ''}}" type="text" name="landmark" id="vertical-modern-landmark" class="form-control @error('landmark') is-invalid @enderror" placeholder="Kusada bridge" />
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
            <input value="{{$companyDetails ? $companyDetails->city : ''}}" type="text" name="city" id="city4" class="form-control @error('city') is-invalid @enderror" placeholder="Kankara" />
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="state4">State</label>
            <input value="{{$companyDetails ? $companyDetails->state : ''}}" type="text" name="state" id="state4" class="form-control @error('state') is-invalid @enderror" placeholder="Kankara" />
            @error('state')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-1 col-md-6">

            <label class="form-label" for="select2-basic">Country</label>
            <select name="country" class="select2 form-select @error('country') is-invalid @enderror" id="select2-basic2">
                <option value="">Select Country</option>
                @foreach(app('App\Http\Services\BackendData')->Countries() as $country)
                @if((old('country') && (old('country') == $country->id)) || ($companyDetails && $companyDetails->country == $country->id))
                <option value="{{$country->id}}" selected>{{$country->title}}</option>
                @endif
                <option value="{{$country->id}}">{{$country->title}}</option>
                @endforeach
            </select>
            @error('country')
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
                <input value="{{$companyDetails ? $companyDetails->first_name : ''}}" name="first_name" type="text" id="first-name-column" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name"
                    name="fname-column" />
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
                <input value="{{$companyDetails ? $companyDetails->last_name : ''}}" name="last_name" type="text" id="last-name-column" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name"
                    name="lname-column" />
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
                <input value="{{$companyDetails ? $companyDetails->email : ''}}" name="email" type="email" id="email-id-column" class="form-control @error('email') is-invalid @enderror" name="email-id-column"
                    placeholder="Email" />
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
                <input value="{{$companyDetails ? $companyDetails->phone_number : ''}}" name="phone_number" type="text" class="form-control phone-number-mask @error('phone_number') is-invalid @enderror" placeholder="08021234567" id="phone-number" />
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
                <input value="{{$companyDetails ? $companyDetails->position : ''}}" name="position" type="text" id="company-column" class="form-control @error('position') is-invalid @enderror" name="company-column"
                    placeholder="Position" />
                @error('position')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


    </div>



    <div class="d-flex justify-content-between">
        <button class="btn btn-outline-secondary btn-prev" disabled>
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <!-- btn-next -->
        <!-- <input class="submit" type="submit" value="SUBMIT"> -->
        <button id="formSubmit1" class="btn btn-primary d-flex justify-content-between" type="submit"> 
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i id="form1Next" data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
            <div id="form1Loader" style="width: 15px;height: 15px;" class="d-none spinner-border text-light ml-2" role="status"></div>
        </button>
    </div>
</div>
</form>

<script>
    $(document).ready(function() {
        var $form = $("#vendorRegistrationForm1");
        $form.validate({
            submitHandler: function(form) {
                var formData = new FormData(form);
                $("#form1Next").addClass('d-none');
                $("#form1Loader").removeClass('d-none');
                $("#formSubmit1").attr('disabled', true);
                $.ajax({
                    url: "<?php echo asset('') ?>"+"registration-company-details-submit",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        $("#form1Next").removeClass('d-none');
                        $("#form1Loader").addClass('d-none');
                        $("#formSubmit1").attr('disabled', false);

                        setTimeout(function() {
                            toastr['success'](
                                response, {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 1000);

                        $('#directors-info-vertical-modern-trigger .step-trigger').click();
                    },
                    error: function(errors){

                        if(errors.status == 422){
                            var errorMessages = errors.responseJSON.errors
                            var validator = $( "#vendorRegistrationForm1" ).validate();
                            validator.showErrors(errorMessages);
                        }

                        $("#form1Next").removeClass('d-none');
                        $("#form1Loader").addClass('d-none');
                        $("#formSubmit1").attr('disabled', false);

                        setTimeout(function() {
                            toastr['error'](
                                errors.responseJSON.message, {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 1000);

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
                return false;
            }
        });
    });
</script>