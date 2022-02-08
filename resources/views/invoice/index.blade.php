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
                            <tr>
                                <!--<td></td>
                                    <td></td>-->
                                <td>
                                    <a href="{{route('invoice.show', 1)}}">INV-00956</a>
                                </td>
                                <td><span class="invoice-amount">₦ 50,000.00</span></td>
                                <td><small class="text-muted">5 Jan 2020</small></td>
                                <!--<td><span class="invoice-customer">Buhari Specialist Hospital</span></td>-->
                                <td>
                                    <span class="bullet bullet-success bullet-sm"></span>
                                    <small class="text-muted">Vendor Registration</small>
                                </td>
                                <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                <td>

                                    <a href="{{route('invoice.show', 1)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <!--<td></td>
                                    <td></td>-->
                                <td>
                                    <a href="{{route('invoice.show', 1)}}">INV-00349</a>
                                </td>
                                <td><span class="invoice-amount">₦ 150,000.00</span></td>
                                <td><small class="text-muted">5 Jan 2020</small></td>
                                <!--<td><span class="invoice-customer">St Nicholas Hospital</span></td>-->
                                <td>
                                    <span class="bullet bullet-info bullet-sm"></span>
                                    <small class="text-muted">Vendor Renewal</small>
                                </td>
                                <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                <td>
                                    <a href="{{route('invoice.show', 1)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <!--<td></td>
                                    <td></td>-->
                                <td>
                                    <a href="{{route('invoice.show', 1)}}">INV-00853</a>
                                </td>
                                <td><span class="invoice-amount">₦ 501,000.00</span></td>
                                <td><small class="text-muted">5 Jan 2020</small></td>
                                <!--<td><span class="invoice-customer">Chevron Staff Clinic</span></td>-->
                                <td>
                                    <span class="bullet bullet-info bullet-sm"></span>
                                    <small class="text-muted">Vendor Renewal</small>
                                </td>
                                <td><span class="badge badge-light-danger badge-pill">UNPAID</span></td>
                                <td>
                                    <a href="{{route('invoice.show', 1)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <!--<td></td>
                                    <td></td>-->
                                <td>
                                    <a href="{{route('invoice.show', 1)}}">INV-00452</a>
                                </td>
                                <td><span class="invoice-amount">₦ 55,000.00</span></td>
                                <td><small class="text-muted">5 Jan 2020</small></td>
                                <!--<td><span class="invoice-customer">Saint Alphabet Eye Hospital</span></td>-->
                                <td>
                                    <span class="bullet bullet-info bullet-sm"></span>
                                    <small class="text-muted">Vendor Renewal</small>
                                </td>
                                <td><span class="badge badge-light-warning badge-pill">Pending Approval</span></td>
                                <td>
                                    <a href="{{route('invoice.show', 1)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <!--<td></td>
                                    <td></td>-->
                                <td>
                                    <a href="{{route('invoice.show', 1)}}">INV-00123</a>
                                </td>
                                <td><span class="invoice-amount">₦ 511,000.00</span></td>
                                <td><small class="text-muted">5 Jan 2020</small></td>
                                <!--<td><span class="invoice-customer">Toyota Motors Hospital</span></td>-->
                                <td>
                                    <span class="bullet bullet-info bullet-sm"></span>
                                    <small class="text-muted">Vendor Renewal</small>
                                </td>
                                <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                <td>
                                    <a href="{{route('invoice.show', 1)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <!--<td></td>
                                    <td></td>-->
                                <td>
                                    <a href="{{route('invoice.show', 1)}}">INV-00853</a>
                                </td>
                                <td><span class="invoice-amount">₦ 100,000.00</span></td>
                                <td><small class="text-muted">5 Jan 2020</small></td>
                                <!--<td><span class="invoice-customer">Samsung Staff Clinic</span></td>-->
                                <td>
                                    <span class="bullet bullet-info bullet-sm"></span>
                                    <small class="text-muted">Vendor Renewal</small>
                                </td>
                                <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                <td>
                                    <a href="{{route('invoice.show', 1)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>


                            <tr>
                                <!--<td></td>
                                    <td></td>-->
                                <td>
                                    <a href="{{route('invoice.show', 1)}}">INV-00223</a>
                                </td>
                                <td><span class="invoice-amount">₦ 15,000.00</span></td>
                                <td><small class="text-muted">5 Jan 2020</small></td>
                                <!--<td><span class="invoice-customer">Ademola Clinic</span></td>-->
                                <td>
                                    <span class="bullet bullet-info bullet-sm"></span>
                                    <small class="text-muted">Vendor Renewal</small>
                                </td>
                                <td><span class="badge badge-light-success badge-pill">PAID</span></td>
                                <td>
                                    <a href="{{route('invoice.show', 1)}}" class="btn btn-success ">
                                        <i data-feather="eye"></i>
                                        <span>VIEW</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection