@extends('layouts.app', ['page' => 'mda'])

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
                        <h2 class="content-header-title float-start mb-0">MDAs</h2>

                    </div>
                </div>
            </div>

        </div>
        @if (session('errors'))
        <div class="alert alert-error p-2" role="alert">
            {{ session('errors') }}
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success p-2" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="content-body">


            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!--
                                <a href="formadata-competencies-new.php" class="btn btn-success ">
                                        <i data-feather='plus-circle'></i>
                                        <span>ADD NEW</span>
                                </a>
                                -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#createData"><i data-feather='plus-circle'></i>
                                <span>ADD NEW</span></button>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>MDA Name</th>
                                        <th>MDA Types</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Mdas as $Mda)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{$Mda->title}}</span>
                                        </td>
                                        <td>{{$Mda->mda_type->title}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                    data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#"  onclick="editData({{$Mda}})">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>

                                                    <form id="delete-form"
                                                        action="{{ route('mda.destroy', $Mda->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a onclick="deleteData(event)" class="dropdown-item" href="#">
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
                </div>
            </div>
            <!-- Basic Tables end -->
            {{$Mdas->links()}}


            <!-- Create Modal -->
            <div class="modal fade" id="createData" tabindex="-1" aria-hidden="true">
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
                                action="{{route('mda.store')}}">
                                @csrf
                                @method('POST')
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="createTitle">MDA Title</label>
                                    <input name="title" type="text" id="createTitle"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="John"
                                        value=" " data-msg="Please enter Title" />
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="createType">MDA Type</label>
                                    <select id="createType" name="type" class="select2 form-select
                                    @error('type') is-invalid @enderror">
                                        <option value="">Select Type</option>
                                        @foreach(app('App\Http\Services\BackendData')->MdaTypes() as $MdaType)
                                        <option value="{{$MdaType->id}}">{{$MdaType->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
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
                            <form id="editFormForm" class="row gy-1 pt-75" method="POST"
                                action="">
                                @csrf
                                @method('PUT')

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="editTitle">Title</label>
                                    <input name="title" type="text" id="editTitle"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="John"
                                        value=" " data-msg="Please enter Title" />
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="editType">MDA Type</label>
                                    <select id="editType" name="type" class="select2 form-select
                                    @error('type') is-invalid @enderror">
                                        <option value="">Select Type</option>
                                        @foreach(app('App\Http\Services\BackendData')->MdaTypes() as $MdaType)
                                        <option value="{{$MdaType->id}}">{{$MdaType->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
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

        </div>
    </div>
</div>

<script>
function deleteData(event) {
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
                    document.getElementById('delete-form').submit();
                }
            },
            cancel: function() {
                console.log('the user clicked cancel');
            }
        }
    });

}

function editData(data){
    var _edit_route = '{{env('APP_URL')}}' + '/mda/' + data.id;
    $("#editFormForm").attr("action", _edit_route);
    $("#editTitle").val(data.title);
    
    var MDATypes = <?php echo json_encode(app('App\Http\Services\BackendData')->MdaTypes()); ?>;
    var _options_html = '';

    $.each( MDATypes, function( key, value ) {
        if(data.type == value.id){
            _options_html += '<option selected hidden value="'+value.id+'">'+value.title+'</option>';
        }
        _options_html += '<option value="'+value.id+'">'+value.title+'</option>';
    });
    
    $("#editType").html(_options_html);
    $("#editData").modal("show")
}
</script>
<!-- END: Content-->
@endsection