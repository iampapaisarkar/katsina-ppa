@extends('layouts.app', ['page' => 'invoice'])

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
                                <th>
                                    <span class="align-middle">Invoice#</span>
                                </th>
                                <th>Amount</th>
                                <th>Date</th>
                                <!--<th>Facility</th>-->
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr>
                                <td>
                                    <a href="{{route('invoice.show', 1)}}">{{$invoice->order_id}}</a>
                                </td>
                                <td><span class="invoice-amount">₦ {{number_format($invoice->amount)}}</span></td>
                                <td><small class="text-muted">{{$invoice->created_at->format('d M Y')}}</small></td>
                                <td>
                                    @if($invoice->service_type == 'vendor_registration')
                                    <span class="bullet bullet-success bullet-sm"></span>
                                    <small class="text-muted">Vendor Registration</small>
                                    @endif
                                    @if($invoice->service_type == 'vendor_renewal')
                                    <span class="bullet bullet-info bullet-sm"></span>
                                    <small class="text-muted">Vendor Renewal</small>
                                    @endif
                                </td>
                                <td>
                                    @if($invoice->status == 'paid')
                                    <span class="badge badge-light-success badge-pill">PAID</span>
                                    @endif
                                    @if($invoice->status == 'unpaid')
                                    <span class="badge badge-light-danger badge-pill">UNPAID</span>
                                    @endif
                                    @if($invoice->status == 'pending')
                                    <span class="badge badge-light-warning badge-pill">Pending Approval</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('invoice.show', 1)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$invoices->links()}}
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection