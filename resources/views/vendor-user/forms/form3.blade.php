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


        @foreach(app('App\Http\Services\BackendData')->ServiceTypes() as $ServiceType)
        <tr>

            <th width="5%"><input type="checkbox" name="services[]" id="parentCategories_0" value="{{$ServiceType->title}}"
                    data-index="0" onClick="checkAll('0')" /></th>


            <th width="95%">
                {{$ServiceType->title}}
            </th>
        </tr>



            @foreach($ServiceType->services as $service)
            <tr>
                <td width="5%"><input type="checkbox" name="services[]" id="childCategories_0_0" value="{{$service->title}}"
                        unchecked onClick="onCheckBoxClick('0')" /></td>
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
        <button class="btn btn-primary btn-next" type="button">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>