<form id="vendorRegistrationForm3">
@csrf
    <div id="services-step-vertical-modern" class="content" role="tabpanel"
        aria-labelledby="services-step-vertical-modern-trigger">
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
                    {{in_array($ServiceType->id, $serviceTypes) ? 'checked' : ''}}
                    type="checkbox" 
                    name="services[{{$key}}][service_type]" 
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
                        {{in_array($service->id, $services) ? 'checked' : ''}}
                        type="checkbox" 
                        name="services[{{$key}}][service][]" 
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

        <div class="d-flex justify-content-between">
            <button class="btn btn-primary btn-prev" type="button">
                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            <button id="formSubmit3" class="btn btn-primary d-flex justify-content-between" type="submit"> 
                <span class="align-middle d-sm-inline-block d-none">Next</span>
                <i id="form3Next" data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                <div id="form3Loader" style="width: 15px;height: 15px;" class="d-none spinner-border text-light ml-2" role="status"></div>
            </button>
        </div>
    </div>
</form>

<!-- <script>
    function checkAll(ServiceType){
        var ServiceType = <?php // echo json_encode($ServiceType); ?>

        console.log("ServiceType :", ServiceType);

        $("#service_types_"+ServiceType.id).prop('checked', $(this).prop('checked'));

        $.each(ServiceType.services, function( index, service ) {
            $("#services_"+ServiceType.id+"_"+service.id).prop('checked', $(this).prop('checked'));
        });
    }
</script> -->

<script>
    $(document).ready(function() {
        var $form = $("#vendorRegistrationForm3");
        $form.validate({
            submitHandler: function(form) {
                var formData = new FormData(form);
                $("#form3Next").addClass('d-none');
                $("#form3Loader").removeClass('d-none');
                $("#formSubmit3").attr('disabled', true);
                $.ajax({
                    url: "<?php echo asset('') ?>"+"registration-product-service-submit",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        $("#form3Next").removeClass('d-none');
                        $("#form3Loader").addClass('d-none');
                        $("#formSubmit3").attr('disabled', false);

                        setTimeout(function() {
                            toastr['success'](
                                response, {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 1000);

                        $('#social-links-vertical-modern-trigger .step-trigger').click();
                    },
                    error: function(errors){

                        if(errors.status == 422){
                            var errorMessages = errors.responseJSON.errors
                            setTimeout(function() {
                                toastr['error'](
                                    errorMessages.services[0], {
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

                        $("#form3Next").removeClass('d-none');
                        $("#form3Loader").addClass('d-none');
                        $("#formSubmit3").attr('disabled', false);

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