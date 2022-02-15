@extends('layouts.app', ['page' => 'invoice-queried'])

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-preview-wrapper">
                <div class="row invoice-preview">
                    <!-- Invoice -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card invoice-preview-card">
                            <div class="card-body invoice-padding pb-0">

                                @if (session('errors'))
                                <div class="alert alert-danger p-2" role="alert">
                                    <p>*{{session('errors')->first('reason')}}</p>
                                </div>
                                @endif

                                @if (session('success'))
                                <div class="alert alert-success p-2" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <!-- Header starts -->
                                <div
                                    class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    <div>
                                        <div class="logo-wrapper">
                                            <h4 class="text-center mb-2"><img class="logo"
                                                    src="{{asset('libs/app-assets/images/logo/logo.png')}}" /></h4>
                                        </div>
                                        <p class="card-text mb-25">Katsina State Bureau of Public Procurement</p>
                                        <p class="card-text mb-25">Government Office</p>
                                        <p class="card-text mb-25">I.B.B Way, Dandagoro</p>
                                        <p class="card-text mb-25">Katsina State, Nigeria</p>

                                    </div>
                                    <div class="mt-md-0 mt-2">
                                        <h4 class="invoice-title">
                                            Invoice
                                            <span class="invoice-number">#{{$invoice->order_id}}</span>
                                        </h4>
                                        <h4 class="invoice-title">
                                            @if($invoice->status == 'paid')
                                            <span class="badge badge-glow bg-success">PAID</span>
                                            @endif
                                            @if($invoice->status == 'unpaid')
                                            <span class="badge badge-glow bg-danger">UNPAID</span>
                                            @endif
                                            @if($invoice->status == 'queried')
                                            <span class="badge badge-glow bg-danger">QUERIED</span>
                                            @endif
                                            @if($invoice->status == 'pending')
                                            <span class="badge badge-glow bg-warning">APPROVAL PENDING</span>
                                            @endif
                                        </h4>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Date Issued:</p>
                                            <p class="invoice-date">{{$invoice->created_at->format('d/m/Y')}}</p>
                                        </div>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Due Date:</p>
                                            <p class="invoice-date">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)->addDays(env('PAYMENT_DUE_DAYS'))->format('d/m/Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Header ends -->
                            </div>

                            <hr class="invoice-spacing" />

                            <!-- Address and Contact starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row invoice-spacing">
                                    <div class="col-xl-8 p-0">
                                        <h6 class="mb-2">Invoice To:</h6>
                                        <h6 class="mb-25">{{$invoice->user->first_name}} {{$invoice->user->sur_name}}</h6>
                                        <p class="card-text mb-25">{{$invoice->vendor_registration->company_details->company_name}}</p>
                                        <p class="card-text mb-25">{{$invoice->user->phone_number}}</p>
                                        <p class="card-text mb-0">{{$invoice->user->email}}</p>
                                    </div>
                                    <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                        <h6 class="mb-2">Payment Details:</h6>
                                        <table>
                                            <tbody>
                                                <!-- <tr>
                                                    <td class="pe-1">Total Due:</td>
                                                    <td><span class="fw-bold">₦ 120,110.00</span></td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td class="pe-1">Bank Name:</td>
                                                    <td>Zenith Bank</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Account Number:</td>
                                                    <td>1234567890</td>
                                                </tr> -->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Address and Contact ends -->

                            <!-- Invoice Description starts -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="py-1" width="85%">Description</th>

                                            <th class="py-1" width="15%">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($invoice->service_type == 'vendor_registration')
                                        <tr class="border-bottom">
                                            <td class="py-1">
                                                <p class="card-text fw-bold mb-25">Vendor Registration Fee</p>
                                                <p class="card-text text-nowrap">
                                                {{$invoice->extra_service->title}}
                                                </p>
                                            </td>
                                            
                                            <td class="py-1">
                                                <span class="fw-bold">₦{{number_format($invoice->extra_service->registration_fee)}}</span>
                                            </td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="py-1">
                                                <p class="card-text fw-bold mb-25">Vendor Application Fee</p>
                                            </td>
                                            
                                            <td class="py-1">
                                                <span class="fw-bold">₦{{number_format($invoice->service->registration_fee)}}</span>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-body invoice-padding pb-0">
                                <div class="row invoice-sales-total-wrapper">
                                    <div class="col-md-4 order-md-1 order-2 mt-md-0 mt-3">
                                    </div>
                                    <div class="col-md-8 d-flex justify-content-end order-md-2 order-1">
                                        <div class="invoice-total-wrapper">

                                            <hr class="my-50" />
                                            <div class="invoice-total-item">
                                                <p class="invoice-total-title">Total:</p>
                                                <p class="invoice-total-amount">₦{{number_format($invoice->amount)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Description ends -->

                            <hr class="invoice-spacing" />

                            <!-- Invoice Note starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="fw-bold">Note:</span>
                                        <span>When you make payment at the bank, please indicate the invoice number on
                                            the teller.</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Note ends -->
                        </div>
                    </div>
                    <!-- /Invoice -->

                    <!-- Invoice Actions -->
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">

                                <a class="btn btn-outline-secondary w-100 mb-75" target="_blank"
                                    href="{{route('invoice.download', $invoice->id)}}" target="_blank"> Print </a>

                                <a class="btn btn-secondary w-100 mb-75"
                                href="{{route('download-pending-invoice-evidence', $invoice->id)}}" target="_blank">
                                    Download Evidence
                                </a>
                                <hr/>
                                <div class="card shadow-none bg-transparent border-secondary">
                                    <div class="card-body">
                                        <h4 class="card-title">Queried By</h4>
                                        <p class="card-text">{{$invoice->queried_by->first_name}} {{$invoice->queried_by->sur_name}}</p>
                                        <p class="card-text"><span class="badge badge-light-secondary">{{$invoice->updated_at->format('d M Y / h:i A')}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Actions -->
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection