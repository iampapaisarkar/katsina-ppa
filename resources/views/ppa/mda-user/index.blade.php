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
                @if(session('errors')->first('mda_type'))
                <div class="alert alert-danger p-2" role="alert">
                    <p>*{{session('errors')->first('mda_type')}}</p>
                </div>
                @endif
                @if(session('errors')->first('role'))
                <div class="alert alert-danger p-2" role="alert">
                    <p>*{{session('errors')->first('role')}}</p>
                </div>
                @endif
                @if(session('errors')->first('first_name'))
                <div class="alert alert-danger p-2" role="alert">
                    <p>*{{session('errors')->first('first_name')}}</p>
                </div>
                @endif
                @if(session('errors')->first('last_name'))
                <div class="alert alert-danger p-2" role="alert">
                    <p>*{{session('errors')->first('last_name')}}</p>
                </div>
                @endif
                @if(session('errors')->first('email'))
                <div class="alert alert-danger p-2" role="alert">
                    <p>*{{session('errors')->first('email')}}</p>
                </div>
                @endif
                @if(session('errors')->first('phone_number'))
                <div class="alert alert-danger p-2" role="alert">
                    <p>*{{session('errors')->first('phone_number')}}</p>
                </div>
                @endif
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
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->mda_type->title}}</td>
                                <td>{{$user->first_name}} {{$user->sur_name}}</td>
                                <td>{{$user->role->role}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                            data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#"  onclick="editData({{$user}})">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>

                                            <form id="delete-form_{{$user->id}}"
                                                action="{{ route('mda-user.destroy', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="deleteData({{$user->id}})" class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                {{$users->links()}}
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Create Modal -->
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
                            @foreach(app('App\Http\Services\BackendData')->Mdas() as $MdaType)
                            @if(old('mda_type') == $MdaType->id)
                            <option selected value="{{$MdaType->id}}">{{$MdaType->title}}</option>
                            @endif
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
                            @if(old('role') == $mdaRole->id)
                            <option selected value="{{$MdaType->id}}">{{$MdaType->title}}</option>
                            @endif
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
                            value="{{old('first_name')}}" data-msg="Please enter first name" />
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
                            value="{{old('last_name')}}" data-msg="Please enter last name" />
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
                            value="{{old('email')}}" data-msg="Please enter email" />
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
                            value="{{old('phone_number')}}" data-msg="Please enter phone number" />
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
<!--/ Create Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="editData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-5 pt-50">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Edit</h1>
                </div>
                <form id="editDataForm" class="row gy-1 pt-75" method="POST"
                action="">
                @csrf
                @method('PUT')
                    <input id="editId" type="hidden" name="id">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="editMdaType">MDA</label>
                        <select id="editMdaType" name="mda_type" class="select2 form-select
                        @error('mda_type') is-invalid @enderror">
                            <option value="">Select MDA</option>
                            @foreach(app('App\Http\Services\BackendData')->Mdas() as $MdaType)
                            @if(old('mda_type') == $MdaType->id)
                            <option selected value="{{$MdaType->id}}">{{$MdaType->title}}</option>
                            @endif
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
                        <label class="form-label" for="editRole">Role</label>
                        <select id="editRole" name="role" class="select2 form-select
                        @error('role') is-invalid @enderror">
                            <option value="">Select Role</option>
                            @foreach(app('App\Http\Services\BackendData')->mdaRoles() as $mdaRole)
                            @if(old('role') == $mdaRole->id)
                            <option selected value="{{$MdaType->id}}">{{$MdaType->title}}</option>
                            @endif
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
                        <label class="form-label" for="editFirstName">First Name</label>
                        <input name="first_name" type="text" id="editFirstName"
                            class="form-control @error('first_name') is-invalid @enderror" placeholder="John"
                            value="{{old('first_name')}}" data-msg="Please enter first name" />
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="editLastName">Last Name</label>
                        <input name="last_name" type="text" id="editLastName"
                            class="form-control @error('last_name') is-invalid @enderror" placeholder="Doe"
                            value="{{old('last_name')}}" data-msg="Please enter last name" />
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="editEmail">Email</label>
                        <input name="email" type="email" id="editEmail"
                            class="form-control @error('email') is-invalid @enderror" placeholder="john@test.com"
                            value="{{old('email')}}" data-msg="Please enter email" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="editPhoneNumber">Phone</label>
                        <input name="phone_number" type="text" id="editPhoneNumber"
                            class="form-control @error('phone_number') is-invalid @enderror" placeholder="08021234567"
                            value="{{old('phone_number')}}" data-msg="Please enter phone number" />
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
<!--/ Edit Modal -->

<script>
function deleteData(id) {
    event.preventDefault();

    $.confirm({
        title: 'Delete',
        content: 'Are you sure want to delete this data?',
        buttons: {
            ok: {
                text: "YES",
                btnClass: 'btn-primary',
                keys: ['enter'],
                action: function() {
                    document.getElementById('delete-form_'+id).submit();
                }
            },
            cancel: function() {
                console.log('the user clicked cancel');
            }
        }
    });

}

function editData(data){
    var _edit_route = '{{env('APP_URL')}}' + '/mda-user/' + data.id;
    $("#editDataForm").attr("action", _edit_route);
    $("#editId").val(data.id);
    $("#editFirstName").val(data.first_name);
    $("#editLastName").val(data.sur_name);
    $("#editEmail").val(data.email);
    $("#editPhoneNumber").val(data.phone_number);
    
    var MDATypes = <?php echo json_encode(app('App\Http\Services\BackendData')->Mdas()); ?>;
    var _mda_options_html = '';

    $.each( MDATypes, function( key, value ) {
        if(data.mda == value.id){
            _mda_options_html += '<option selected hidden value="'+value.id+'">'+value.title+'</option>';
        }
        _mda_options_html += '<option value="'+value.id+'">'+value.title+'</option>';
    });
    
    $("#editMdaType").html(_mda_options_html);

    var MDARoles = <?php echo json_encode(app('App\Http\Services\BackendData')->mdaRoles()); ?>;
    var _role_options_html = '';

    $.each( MDARoles, function( key, value ) {
        if(data.role_id == value.id){
            _role_options_html += '<option selected hidden value="'+value.id+'">'+value.role+'</option>';
        }
        _role_options_html += '<option value="'+value.id+'">'+value.role+'</option>';
    });
    
    $("#editRole").html(_role_options_html);

    $("#editData").modal("show")
}
</script>
@endsection