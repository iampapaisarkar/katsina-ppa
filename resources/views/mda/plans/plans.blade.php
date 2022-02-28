@extends('layouts.app', ['page' => 'plan'])

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
       
        @if (session('errors'))
            @if(session('errors')->first('plan_year'))
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('plan_year')}}</p>
            </div>
            @endif
            @if(session('errors')->first('plan_mda'))
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('plan_mda')}}</p>
            </div>
            @endif
            @if(session('errors')->first('plan_attachment'))
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('plan_attachment')}}</p>
            </div>
            @endif
        @endif

        @if (session('success'))
        <div class="alert alert-success p-2" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <!-- @if (session('error'))
        <div class="alert alert-danger p-2" role="alert">
            {{ session('error') }}
        </div>
        @endif -->

        <!-- @if (session('errors'))
        <div class="alert alert-danger p-2" role="alert">
            {{ session('errors') }}
        </div>
        @endif -->

        <div class="content-body">
            <a href="{{route('plan-template-download')}}" class="btn btn-secondary"><i data-feather="download" ></i>  <span>DOWNLOAD TEMPLATE</span></a>
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
                                @foreach($plans as $plan)
                                <tr>
                                    <td><small class="text-muted">{{$plan->created_at->format('d M Y')}}</small></td>
                                    <td>
                                        <a href="mda-procurement-plan-view.php">{{$plan->year}}</a>
                                    </td>
                                    <td>
                                        {{$plan->description}}
                                    </td>
                                    <td><small class="text-muted">{{$plan->upload_by->first_name}} {{$plan->upload_by->sur_name}} </small></td>
                                    <td>
                                        @if($plan->status == 'approved')
                                        <span class="badge badge-light-success badge-pill">APPROVED</span>
                                        @endif
                                        @if($plan->status == 'reject')
                                        <span class="badge badge-light-danger badge-pill">REJECT</span>
                                        @endif
                                        @if($plan->status == 'pending')
                                        <span class="badge badge-light-warning badge-pill">PENDING</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('plan-projects', $plan->id)}}" class="btn btn-success btn-sm">
                                            <i data-feather="eye" ></i>
                                            <span>VIEW</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$plans->links()}}
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
                <form id="createDataForm" class="row gy-1 pt-75" method="POST"
                action="{{route('plan-upload')}}"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                    
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="planYear">Financial Year</label>
                        <select id="planYear" name="plan_year" class="select2 form-select @error('plan_year') is-invalid @enderror">
                            <option value="">Select Year</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                        @error('plan_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="planMda">MDA </label>
                        <input type="text" id="planMda" name="plan_mda" class="form-control  @error('plan_mda') is-invalid @enderror" value="{{Auth::user()->mda_type()->first()->title}}" readonly />
                        @error('plan_mda')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="plan">Procurment Plan Template</label>
                        <input class="form-control  @error('plan_attachment') is-invalid @enderror" name="plan_attachment" type="file" id="plan" accept="application/msexcel" />
                        @error('plan_attachment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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