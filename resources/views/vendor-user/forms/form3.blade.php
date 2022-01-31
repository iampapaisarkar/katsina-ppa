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


        @foreach(app('App\Http\Services\BackendData')->Services() as $Service)
        <tr>

            <th width="5%"><input type="checkbox" name="services[]" id="parentCategories_0" value="{{$Service->id}}"
                    data-index="0" onClick="checkAll('0')" /></th>


            <th width="95%">
                {{$Service->title}}
            </th>
        </tr>



            @foreach($Service->childs as $child)
            <tr>
                <td width="5%"><input type="checkbox" name="services['childs'][]" id="childCategories_0_0" value="{{$Service->id}}"
                        unchecked onClick="onCheckBoxClick('0')" /></td>
                <td colspan="2" width="95%">
                    {{$child->title}}
                </td>
            </tr>
            @endforeach
        @endforeach



    </table>
    <!--<div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-address">Address</label>
                                        <input type="text" id="vertical-modern-address" class="form-control" placeholder="98  Borough bridge Road, Birmingham" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="vertical-modern-landmark">Landmark</label>
                                        <input type="text" id="vertical-modern-landmark" class="form-control" placeholder="Borough bridge" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pincode4">Pincode</label>
                                        <input type="text" id="pincode4" class="form-control" placeholder="658921" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="city4">City</label>
                                        <input type="text" id="city4" class="form-control" placeholder="Birmingham" />
                                    </div>
                                </div>-->
    <div class="d-flex justify-content-between">
        <button class="btn btn-primary btn-prev">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button class="btn btn-primary btn-next">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>