@extends('layouts.app', ['page' => 'plan'])

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
                        <h2 class="content-header-title float-start mb-0">{{$plan->year}} Procurement Plan</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('plans')}}">Home</a>
                                </li>
                                
                                <li class="breadcrumb-item active">{{$plan->year}} Procurement Plan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row d-flex align-items-end">
                    <div class="col-md-4 col-12">
                        <h4>Financial Year: {{$plan->year}}</h4>
                    </div>
            </div>
            <!-- Basic Tables start -->
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="45%">Project Name</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">Method</th>
                                    <th width="10%">Est. Cost</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->name}}</td>
                                    <td>
                                        {{$project->category}}
                                    </td>
                                    <td>
                                        {{$project->procurement_method}}
                                    </td>
                                    <td>{{$project->estimate_cost}}</td>
                                    <td>
                                        @if($project->status == 'awarded')
                                        <span class="badge badge-light-success badge-pill">AWARDED</span>
                                        @endif
                                        @if($project->status == 'pending')
                                        <span class="badge badge-light-warning badge-pill">PENDING</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('plan-project-details', [$plan->id, $project->id])}}" class="btn btn-success btn-sm">
                                            <i data-feather="eye" ></i>
                                            <span>VIEW</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$projects->links()}}
                    </div>
                </div>
            </div>
            <!-- Basic Tables end -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection