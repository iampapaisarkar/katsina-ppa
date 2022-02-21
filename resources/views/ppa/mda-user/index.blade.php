@extends('layouts.app', ['page' => 'mda-user'])

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">MDA Users</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            
            @if (session('errors'))
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('mda_type')}}</p>
            </div>
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('role')}}</p>
            </div>
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('first_name')}}</p>
            </div>
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('last_name')}}</p>
            </div>
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('email')}}</p>
            </div>
            <div class="alert alert-danger p-2" role="alert">
                <p>*{{session('errors')->first('phone_number')}}</p>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success p-2" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <!-- invoice list -->
            <section class="invoice-list-wrapper">
                <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editUser"><i
                            data-feather='plus-circle'></i>
                        <span>ADD NEW</span></button>
                </div>

                <div class="table-responsive">
                    <table class="table invoice-data-table dt-responsive nowrap" style="width:100%">
                        <thead>
                            <th width="40%">MDA </th>
                            <th width="40%">Staff Name</th>
                            <th width="10%">Role</th>
                            <th width="10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                            data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i data-feather="trash" class="me-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </section>
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
                action="{{route('mda-user.store')}}">
                @csrf
                @method('POST')

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="createMdaType">MDA</label>
                        <select id="createMdaType" name="mda_type" class="select2 form-select
                        @error('mda_type') is-invalid @enderror">
                            <option value="">Select MDA</option>
                            @foreach(app('App\Http\Services\BackendData')->MdaTypes() as $MdaType)
                            <option value="{{$MdaType->id}}">{{$MdaType->title}}</option>
                            @endforeach
                        </select>
                        @error('mda_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="createRole">Role</label>
                        <select id="createRole" name="role" class="select2 form-select
                        @error('role') is-invalid @enderror">
                            <option value="">Select Role</option>
                            @foreach(app('App\Http\Services\BackendData')->mdaRoles() as $mdaRole)
                            <option value="{{$mdaRole->id}}">{{$mdaRole->role}}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="col-12 col-md-6">
                        <label class="form-label" for="createFirstName">First Name</label>
                        <input name="first_name" type="text" id="createFirstName"
                            class="form-control @error('first_name') is-invalid @enderror" placeholder="John"
                            value=" " data-msg="Please enter first name" />
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="createLastName">Last Name</label>
                        <input name="last_name" type="text" id="createLastName"
                            class="form-control @error('last_name') is-invalid @enderror" placeholder="Doe"
                            value=" " data-msg="Please enter last name" />
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="createEmail">Email</label>
                        <input name="email" type="email" id="createEmail"
                            class="form-control @error('email') is-invalid @enderror" placeholder="john@test.com"
                            value=" " data-msg="Please enter email" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="createPhoneNumber">Phone</label>
                        <input name="phone_number" type="text" id="createPhoneNumber"
                            class="form-control @error('phone_number') is-invalid @enderror" placeholder="08021234567"
                            value=" " data-msg="Please enter phone number" />
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 text-center mt-2 pt-50">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
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