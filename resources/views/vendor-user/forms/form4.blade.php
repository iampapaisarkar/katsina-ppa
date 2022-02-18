<form id="vendorRegistrationForm4">
@csrf

<input type="hidden" name="id" value="{{$categoryDocuments ? $categoryDocuments->id : ''}}">
<div id="social-links-vertical-modern" class="content" role="tabpanel"
    aria-labelledby="social-links-vertical-modern-trigger">
    <div class="content-header">
        <h5 class="mb-0">Category and Documents</h5>
        <small>Select Category and Upload Documents.</small>
    </div>
    <div class="row">
        <div class="col-12">
            <h3 class="py-50">REGISTRATION CATEGORY </h3>
        </div>
        <div class="mb-1 col-md-12">
            <label class="form-label" for="basicSelect">Registration Categories</label>
            <select name="registration_category_id" class="form-select @error('registration_category_id') is-invalid @enderror" id="basicSelect">
                <option value="">select one</option>
                @foreach(app('App\Http\Services\BackendData')->RegistrationCategories() as $RegistrationCategory)
                @if((old('registration_category_id') && (old('registration_category_id') == $RegistrationCategory->id)) || ($categoryDocuments && $categoryDocuments->registration_category_id == $RegistrationCategory->id))
                <option value="{{$RegistrationCategory->id}}" selected>{{$RegistrationCategory->title}}</option>
                @endif
                <option value="{{$RegistrationCategory->id}}">{{$RegistrationCategory->title}}</option>
                @endforeach
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
            <label for="formFile" class="form-label">Application Letter with Company Letterhead for Registration
                addressed to the General Manager (PPA) (PDF/2MB max)</label>
            <input name="attachment_1" class="form-select @error('attachment_1') is-invalid @enderror" type="file" id="formFile1" accept="application/pdf" />
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
            <label for="formFile" class="form-label">Certificate of Incorporation/Registration of Business Name (CAC
                Certificate) (PDF/2MB max)</label>
            <input name="attachment_2" class="form-select @error('attachment_2') is-invalid @enderror" type="file" id="formFile2" accept="application/pdf" />
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
            <label for="formFile" class="form-label">CAC Form 1.1: (Statement of Share Capital) (PDF/2MB max)</label>
            <input name="attachment_3" class="form-select @error('attachment_3') is-invalid @enderror" type="file" id="formFile3" accept="application/pdf" />
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
            <label for="formFile" class="form-label">CAC Form 7/7A: (Particulars of First Director/Notice of Change of
                Directors\ for Business Name, Particulars of Proprietorship) (PDF/2MB max)</label>
            <input name="attachment_4" class="form-select @error('attachment_4') is-invalid @enderror" type="file" id="formFile4" accept="application/pdf" />
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
            <label for="formFile" class="form-label">Copy of Company Memorandum & Articles of Association (PDF/2MB
                max)</label>
            <input name="attachment_5" class="form-select @error('attachment_5') is-invalid @enderror" type="file" id="formFile5" accept="application/pdf" />
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
            <label for="formFile" class="form-label">Current 3 years Personal-Katsina State Government Tax Clearance
                Certificate as well as Development Levy of Chief Executive Officer and One (1) Director. (In case of
                Business Names One(1) Director is sufficient) (PDF/2MB max)</label>
            <input name="attachment_6" class="form-select @error('attachment_6') is-invalid @enderror" type="file" id="formFile6" accept="application/pdf" />
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
            <label for="formFile" class="form-label">Company Profile detailing the company's structure, Key personnel
                Supported with Professional Licenses/Certificates, curriculum Vitae and Similar jobs executed in the
                past (PDF/2MB max)</label>
            <input name="attachment_7" class="form-select @error('attachment_7') is-invalid @enderror" type="file" id="formFile7" accept="application/pdf" />
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
            <label for="formFile" class="form-label">Curriculum Vitae of key staff supported by Professional
                Licenses/Certificates (PDF/2MB max)</label>
            <input name="attachment_8" class="form-select @error('attachment_8') is-invalid @enderror" type="file" id="formFile8" accept="application/pdf" />
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
            <label for="formFile" class="form-label">Applicants Managing Director/Chief Executive Officer's Declaration
                on oath as to the authenticity of all submitted documents and engagement of professionals (PDF/2MB
                max)</label>
            <input name="attachment_9" class="form-select @error('attachment_9') is-invalid @enderror" type="file" id="formFile9" accept="application/pdf" />
            @error('attachment_9')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


    </div>
    <div class="d-flex justify-content-between">
        <button class="btn btn-primary btn-prev" type="button">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button id="formSubmit4" class="btn btn-primary d-flex justify-content-between" type="submit"> 
            <span class="align-middle d-sm-inline-block d-none">Submit</span>
            <div id="form4Loader" style="width: 15px;height: 15px;" class="d-none spinner-border text-light ml-2" role="status"></div>
        </button>
    </div>
</div>

<script>
    $(document).ready(function() {
        var $form = $("#vendorRegistrationForm4");
        $form.validate({
            submitHandler: function(form) {
                var formData = new FormData(form);
                $("#form4Next").addClass('d-none');
                $("#form4Loader").removeClass('d-none');
                $("#formSubmit4").attr('disabled', true);
                $.ajax({
                    url: "<?php echo asset('') ?>"+"registration-category-document-submit",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    success: function(response) {

                        console.log(response)

                        $("#form4Next").removeClass('d-none');
                        $("#form4Loader").addClass('d-none');
                        $("#formSubmit4").attr('disabled', false);

                        setTimeout(function() {
                            toastr['success'](
                                response.message, {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 1000);

                        if(response.status == 'create'){
                            window.location.href = '<?php echo asset('') ?>' + 'invoice/' + response.data.id ;
                        }
                        if(response.status == 'update'){
                            window.location.href = '<?php echo asset('') ?>' + 'registration-status';
                        }
                    },
                    error: function(errors){

                        if(errors.status == 422){
                            var errorMessages = errors.responseJSON.errors
                            var validator = $( "#vendorRegistrationForm4" ).validate();
                            validator.showErrors(errorMessages);
                        }

                        $("#form4Next").removeClass('d-none');
                        $("#form4Loader").addClass('d-none');
                        $("#formSubmit4").attr('disabled', false);

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