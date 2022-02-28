@extends('layouts.app', ['page' => 'plan'])

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
       
        @if (session('errors'))
        <div class="alert alert-danger p-2" role="alert">
            <p>*{{session('errors')->first('title')}}</p>
        </div>
        <div class="alert alert-danger p-2" role="alert">
            <p>*{{session('errors')->first('type')}}</p>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success p-2" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="content-body">
            <a href="#" class="btn btn-secondary"><i data-feather="download" ></i>  <span>DOWNLOAD TEMPLATE</span></a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUser"><i data-feather='upload'></i>  <span>UPLOAD NEW ANNUAL PRODUREMENT PLAN</span></button>
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="15%">DATE</th>
                                    <th width="10%"><span class="align-middle">YEAR</span></th>
                                    <th width="35%">Description</th>
                                    <th width="15%">Uploaded By</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><small class="text-muted">5 Jan 2022</small></td>
                                    <td>
                                        <a href="mda-procurement-plan-view.php">2022</a>
                                    </td>
                                    <td>
                                        2022 Annual Procurement Plan
                                    </td>
                                    <td><small class="text-muted">Khadija Aminu </small></td>
                                    <td><span class="badge badge-light-success badge-pill">APPROVED</span></td>
                                    <td>
                                        <a href="{{route('plan-projects', 1)}}" class="btn btn-success btn-sm">
                                            <i data-feather="eye" ></i>
                                            <span>VIEW</span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Edit User Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Add New</h1>
                    
                </div>
                <form id="editUserForm" class="row gy-1 pt-75" onSubmit="return false">
                    
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalType">Financial Year</label>
                        <select id="modalType" name="modalType" class="select2 form-select">
                            <option value="">Select Year</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">MDA </label>
                        <input type="text" id="modalEditUserFirstName" name="modalEditUserFirstName" class="form-control" placeholder="MDA" value="Ministry of Education" data-msg="Please enter Title" readonly />
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="modalType">Procurment Plan Template</label>
                        <input class="form-control" type="file" id="formFile" accept="application/msexcel" />
                        <!--<select id="modalType" name="modalType" class="select2 form-select">
                            <option value="">Select Type</option>
                            <option value="Ministry">Ministry</option>
                            <option value="Department">Department</option>
                            <option value="Agency">Agency</option>
                            
                        </select>-->
                    </div>
                    
                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->
@endsection