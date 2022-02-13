@extends('layouts.app', ['page' => 'invoice-unpaid'])

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
                                    <p>*{{session('errors')->first('evidence_of_payment')}}</p>
                                </div>
                                <div class="alert alert-danger p-2" role="alert">
                                    <p>*{{session('errors')->first('payment_date')}}</p>
                                </div>
                                <div class="alert alert-danger p-2" role="alert">
                                    <p>*{{session('errors')->first('payment_method')}}</p>
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
                                            <th class="py-1">Description</th>

                                            <th class="py-1">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-bottom">
                                            <td class="py-1">
                                                @if($invoice->service_type == 'vendor_registration')
                                                    <p class="card-text fw-bold mb-25">Vendor Registration Fee</p>
                                                    <p class="card-text text-nowrap">
                                                        {{number_format($invoice->service->registration_fee)}}
                                                    </p>
                                                    <p class="card-text text-nowrap">
                                                        {{$invoice->extra_service->title}}
                                                    </p>
                                                @endif
                                            </td>

                                            <td class="py-1">
                                                <span class="fw-bold">₦{{number_format($invoice->amount)}}</span>
                                            </td>
                                        </tr>

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

                                @can('isVendor')
                                <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal"
                                    data-bs-target="#add-payment-sidebar">
                                    Upload Payment
                                </button>
                                <button disabled class="btn btn-success w-100 mb-75" data-bs-toggle="modal" data-bs-target="">
                                    Payment Online
                                </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Actions -->
                </div>
            </section>


            <!-- Add Payment Sidebar -->
            <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
                <div class="modal-dialog sidebar-lg">
                    <div class="modal-content p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title">
                                <span class="align-middle">Add Payment</span>
                            </h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <form class="auth-register-form mt-2" action="{{ route('payment-update', $invoice->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-1">
                                    <label for="formFile" class="form-label">Evidence of Payment (PDF/2MB max)</label>
                                    <input name="evidence_of_payment" class="form-control @error('evidence_of_payment') is-invalid @enderror" type="file" id="formFile" accept="application/pdf" />
                                    @error('evidence_of_payment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="amount">Payment Amount</label>
                                    <input name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" type="text" value="{{$invoice->amount}}" readonly />
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="payment-date">Payment Date</label>
                                    <input type="text" id="fp-payment_date" name="payment_date" class="form-control flatpickr-basic @error('payment_date') is-invalid @enderror" placeholder="DD-MM-YYYY" />
                                    @error('payment_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="payment-method">Payment Method</label>
                                    <select name="payment_method" class="form-select @error('payment_method') is-invalid @enderror" id="payment-method">
                                        <option value="" selected disabled>Select payment method</option>
                                        <option value="Bank Deposit">Bank Deposit</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <!--<option value="Debit">Debit</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Paypal">Paypal</option>-->
                                    </select>
                                    @error('payment_method')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--<div class="mb-1">
                                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                                        <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
                                    </div>-->
                                <div class="d-flex flex-wrap mb-0">
                                    <button type="submit" class="btn btn-primary me-1"
                                        data-bs-dismiss="modal">Upload</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Payment Sidebar -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection