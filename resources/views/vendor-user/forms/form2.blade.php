<form id="vendorRegistrationForm2">
@csrf
<div id="directors-info-vertical-modern" class="content" role="tabpanel"
    aria-labelledby="directors-info-vertical-modern-trigger">
    <div class="content-header">
        <h5 class="mb-0">Director's Info</h5>
        <small>Enter Director's Info.</small>
    </div>

    <div data-repeater-list="invoice">
        <div data-repeater-item id="directorRow">
            @if(!empty($companyDirectors))
                @foreach($companyDirectors as $key => $companyDirector)
                <input value="{{$companyDirector->id}}" type="hidden" name="director[{{$key}}][id]"/>

                <div class="row directorRow" id="directorID_{{$key}}">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="fname">First Name</label>
                                    <input value="{{$companyDirector->first_name}}" type="text" name="director[{{$key}}][first_name]" class="form-control" id="fname" aria-describedby="fname"
                                        placeholder="Directors Firstname" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="lname">Last Name</label>
                                    <input value="{{$companyDirector->last_name}}" type="text" name="director[{{$key}}][last_name]" class="form-control " id="lname" aria-describedby="lname"
                                        placeholder="Director's Lastname" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-column">Email</label>
                                    <input value="{{$companyDirector->email}}" type="email" name="director[{{$key}}][email]" id="email-id-column" class="form-control " name="email-id-column"
                                        placeholder="Email" />
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="phone-number2">Phone Number</label>
                                    <input value="{{$companyDirector->phone_number}}" type="text" name="director[{{$key}}][phone_number]" class="form-control  phone-number-mask" placeholder="08021234567"
                                        id="phone-number2" />
                                </div>
                            </div>
                            <div class="mb-1 col-md-4 col-12">
                                <label class="form-label" for="vertical-modern-address">Address</label>
                                <input value="{{$companyDirector->address}}" type="text" name="director[{{$key}}][address]" id="vertical-modern-address" class="form-control"
                                    placeholder="98 Ibrahim Ado bridge Road, " />
                            </div>
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                <label for="formFile" class="form-label">Upload Passport Photo (IAMGE/1MB max)</label>
                                <input value="{{$companyDirector->passport}}" class="form-control " name="director[{{$key}}][passport]" type="file" id="formFile" accept="image/png, image/jpeg, " />
                            </div>
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                <label for="formFile" class="form-label">Upload Identification (PDF/2MB max)</label>
                                <input value="{{$companyDirector->identification}}" class="form-control" name="director[{{$key}}][identification]" type="file" id="formFile" accept="application/pdf" />
                            </div>
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">
                                <label for="formFile" class="form-label">Upload Certificates (PDF/2MB max)</label>
                                <input value="{{$companyDirector->certificates}}" class="form-control" name="director[{{$key}}][certificates]" type="file" id="formFile" accept="application/pdf" />
                            </div>
                            <div class="col-md-12 col-12 mb-50">
                                <div class="mb-1">
                                    <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"  id="deleteDirectorRow_{{$key}}" onclick="deleteDirectorRow({{$key}})">
                                        <i data-feather="x" class="me-25"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-icon btn-primary" type="button" onclick="addDirectorRow()">
                <i data-feather="plus" class="me-25"></i>
                <span>Add New</span>
            </button>
        </div>
    </div>


    <div class="d-flex justify-content-between">
        <button class="btn btn-primary btn-prev" type="button">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <!-- <button class="btn btn-primary btn-next" type="button">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button> -->
        <button id="formSubmit2" class="btn btn-primary d-flex justify-content-between" type="submit"> 
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i id="form2Next" data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
            <div id="form2Loader" style="width: 15px;height: 15px;" class="d-none spinner-border text-light ml-2" role="status"></div>
        </button>
    </div>
</div>
</form>


<script>
function addDirectorRow(){
    var rowCount = $('.directorRow').length;

    if(rowCount == 0){
        var formHtml = '<div class="row directorRow" id="directorID_'+rowCount+'">\
                            <div class="col-md-6 col-12">\
                                <div class="mb-1">\
                                    <label class="form-label" for="fname">First Name</label>\
                                    <input type="text" name="director['+rowCount+'][first_name]" class="form-control" id="fname" aria-describedby="fname"\
                                        placeholder="Directors Firstname" />\
                                </div>\
                            </div>\
                            <div class="col-md-6 col-12">\
                                <div class="mb-1">\
                                    <label class="form-label" for="lname">Last Name</label>\
                                    <input type="text" name="director['+rowCount+'][last_name]" class="form-control " id="lname" aria-describedby="lname"\
                                        placeholder="Director\'s Lastname" />\
                                </div>\
                            </div>\
                            <div class="col-md-4 col-12">\
                                <div class="mb-1">\
                                    <label class="form-label" for="email-id-column">Email</label>\
                                    <input type="email" name="director['+rowCount+'][email]" id="email-id-column" class="form-control " name="email-id-column"\
                                        placeholder="Email" />\
                                </div>\
                            </div>\
                            <div class="col-md-4 col-12">\
                                <div class="mb-1">\
                                    <label class="form-label" for="phone-number2">Phone Number</label>\
                                    <input type="text" name="director['+rowCount+'][phone_number]" class="form-control  phone-number-mask" placeholder="08021234567"\
                                        id="phone-number2" />\
                                </div>\
                            </div>\
                            <div class="mb-1 col-md-4 col-12">\
                                <label class="form-label" for="vertical-modern-address">Address</label>\
                                <input type="text" name="director['+rowCount+'][address]" id="vertical-modern-address" class="form-control"\
                                    placeholder="98 Ibrahim Ado bridge Road, " />\
                            </div>\
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">\
                                <label for="formFile" class="form-label">Upload Passport Photo (IAMGE/1MB max)</label>\
                                <input class="form-control " name="director['+rowCount+'][passport]" type="file" id="formFile" accept="image/png, image/jpeg, " />\
                            </div>\
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">\
                                <label for="formFile" class="form-label">Upload Identification (PDF/2MB max)</label>\
                                <input class="form-control" name="director['+rowCount+'][identification]" type="file" id="formFile" accept="application/pdf" />\
                            </div>\
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">\
                                <label for="formFile" class="form-label">Upload Certificates (PDF/2MB max)</label>\
                                <input class="form-control" name="director['+rowCount+'][certificates]" type="file" id="formFile" accept="application/pdf" />\
                            </div>\
                            <div class="col-md-12 col-12 mb-50">\
                                <div class="mb-1">\
                                    <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"  id="deleteDirectorRow_'+rowCount+'" onclick="deleteDirectorRow('+rowCount+')">\
                                        <i data-feather="x" class="me-25"></i>\
                                        <span>Delete</span>\
                                    </button>\
                                </div>\
                            </div>\
                        </div>';

        $("#directorRow").append(formHtml);
    }else{
        formHtml = '<div class="row directorRow" id="directorID_'+rowCount+'">\
                            <div class="col-md-6 col-12">\
                                <div class="mb-1">\
                                    <label class="form-label" for="fname">First Name</label>\
                                    <input type="text" name="director['+rowCount+'][first_name]" class="form-control" id="fname" aria-describedby="fname"\
                                        placeholder="Directors Firstname" />\
                                </div>\
                            </div>\
                            <div class="col-md-6 col-12">\
                                <div class="mb-1">\
                                    <label class="form-label" for="lname">Last Name</label>\
                                    <input type="text" name="director['+rowCount+'][last_name]" class="form-control " id="lname" aria-describedby="lname"\
                                        placeholder="Director\'s Lastname" />\
                                </div>\
                            </div>\
                            <div class="col-md-4 col-12">\
                                <div class="mb-1">\
                                    <label class="form-label" for="email-id-column">Email</label>\
                                    <input type="email" name="director['+rowCount+'][email]" id="email-id-column" class="form-control " name="email-id-column"\
                                        placeholder="Email" />\
                                </div>\
                            </div>\
                            <div class="col-md-4 col-12">\
                                <div class="mb-1">\
                                    <label class="form-label" for="phone-number2">Phone Number</label>\
                                    <input type="text" name="director['+rowCount+'][phone_number]" class="form-control  phone-number-mask" placeholder="08021234567"\
                                        id="phone-number2" />\
                                </div>\
                            </div>\
                            <div class="mb-1 col-md-4 col-12">\
                                <label class="form-label" for="vertical-modern-address">Address</label>\
                                <input type="text" name="director['+rowCount+'][address]" id="vertical-modern-address" class="form-control"\
                                    placeholder="98 Ibrahim Ado bridge Road, " />\
                            </div>\
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">\
                                <label for="formFile" class="form-label">Upload Passport Photo (IAMGE/1MB max)</label>\
                                <input class="form-control " name="director['+rowCount+'][passport]" type="file" id="formFile" accept="image/png, image/jpeg, " />\
                            </div>\
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">\
                                <label for="formFile" class="form-label">Upload Identification (PDF/2MB max)</label>\
                                <input class="form-control" name="director['+rowCount+'][identification]" type="file" id="formFile" accept="application/pdf" />\
                            </div>\
                            <div class="col-lg-4 col-md-12 mb-3 mb-sm-0">\
                                <label for="formFile" class="form-label">Upload Certificates (PDF/2MB max)</label>\
                                <input class="form-control" name="director['+rowCount+'][certificates]" type="file" id="formFile" accept="application/pdf" />\
                            </div>\
                            <div class="col-md-12 col-12 mb-50">\
                                <div class="mb-1">\
                                    <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button"  id="deleteDirectorRow_'+rowCount+'" onclick="deleteDirectorRow('+rowCount+')">\
                                        <i data-feather="x" class="me-25"></i>\
                                        <span>Delete</span>\
                                    </button>\
                                </div>\
                            </div>\
                        </div>';
        $("#directorRow").append(formHtml);
    }
}

function deleteDirectorRow(id){
    $("#directorID_"+id).remove();
}


$(document).ready(function() {
    var $form = $("#vendorRegistrationForm2");
    $form.validate({
        submitHandler: function(form) {
            var formData = new FormData(form);
            $("#form2Next").addClass('d-none');
            $("#form2Loader").removeClass('d-none');
            $("#formSubmit2").attr('disabled', true);
            $.ajax({
                url: "<?php echo asset('') ?>"+"registration-company-director-submit",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                data: formData,
                dataType: "json",
                success: function(response) {
                    $("#form2Next").removeClass('d-none');
                    $("#form2Loader").addClass('d-none');
                    $("#formSubmit2").attr('disabled', false);

                    setTimeout(function() {
                        toastr['success'](
                            response, {
                                closeButton: true,
                                tapToDismiss: false
                            }
                        );
                    }, 1000);

                    $('#services-step-vertical-modern-trigger .step-trigger').click();
                },
                error: function(errors){

                    if(errors.status == 422){
                        var errorMessages = errors.responseJSON.errors
                        setTimeout(function() {
                            toastr['error'](
                                errorMessages.director[0], {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 1000);
                    }else{

                        setTimeout(function() {
                        toastr['error'](
                            errors.responseJSON.message, {
                                closeButton: true,
                                tapToDismiss: false
                            }
                        );
                    }, 1000);
                    }

                    $("#form2Next").removeClass('d-none');
                    $("#form2Loader").addClass('d-none');
                    $("#formSubmit2").attr('disabled', false);

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