@extends('layouts.app', ['page' => 'vendor-registration-approved'])

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <!-- invoice list -->
            <section class="invoice-list-wrapper">
                <!-- create invoice button-->
                <!--<div class="invoice-create-btn mb-1">
                        <a href="app-invoice-add.html" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true">Create
                            Invoice</a>
                    </div> -->
                <!-- Options and filter dropdown button-->
                <div class="action-dropdown-btn d-none">
                    <div class="dropdown invoice-filter-action">
                        <button class="btn border dropdown-toggle mr-1" type="button" id="invoice-filter-btn"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter Invoice
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="invoice-filter-btn">

                            <a class="dropdown-item" href="#">Unpaid</a>
                            <a class="dropdown-item" href="#">Pending Approval</a>
                            <a class="dropdown-item" href="#">Paid</a>
                        </div>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <!--<th></th>
                                    <th></th>-->
                                <th>DATE</th>
                                <th>COMPANY</th>
                                <th>TYPE</th>
                                <th>VENDOR ID</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                            <tr>
                                <td><small class="text-muted">{{$registration->created_at->format('d M Y')}}</small></td>
                                <td>{{$registration->company_details->company_name}}</td>
                                <td>
                                    @if($registration->type == 'vendor_registration')
                                    <span class="bullet bullet-success bullet-sm"></span>
                                    <small class="text-muted">Vendor Registration</small>
                                    @endif
                                    @if($registration->type == 'vendor_renewal')
                                    <span class="bullet bullet-info bullet-sm"></span>
                                    <small class="text-muted">Vendor Renewal</small>
                                    @endif
                                </td>
                                @php 
                                $registrationCount = Registration::where([
                                    'type' => 'vendor_registration',
                                    'status' => 'approved',
                                    'payment' => true
                                ])->count();
                                @endphp
                                <td>{{'KTBPP/'.date('y', strtotime($registration->company_details->date_of_incorporation)).'/'.$registration->company_details->organization_type->code.'/'.$registration->company_details->core_competence->code.'/'.sprintf("%06s", $registrationCount)}}</td>
                                <td>
                                    @if($registration->status == 'pending')
                                    <span class="badge badge-light-warning badge-pill">Pending Approval</span>
                                    @endif
                                    @if($registration->status == 'queried')
                                    <span class="badge badge-light-danger badge-pill">Queried</span>
                                    @endif
                                    @if($registration->status == 'approved')
                                    <span class="badge badge-light-success badge-pill">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('vendor-registration-approved.show', $registration->id)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$registrations->links()}}
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection