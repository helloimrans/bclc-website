@extends('admin.layouts.master')
@section('title', 'Office & Function')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Office & Function</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Office & Function
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="head-label">
                                <h5 class="mb-0">Office & Function</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a href="
                                    {{ route('office.function.create') }}"
                                     class="btn btn-info btn-sm"><i data-feather='plus-square'></i> Add New
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Sector</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Activities/Services/Functions</th>
                                            <th>Ministry/Dept./Authority</th>
                                            <th>Address/Remarks</th>
                                            <th>Communications</th>
                                            <th>File</th>
                                            <th>Sort</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($office_functions as $of)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$of->sector->name}}</td>
                                                <td>{{$of->category->name}}</td>
                                                <td>{{ $of->title }}</td>
                                                <td>{!! substr(strip_tags($of->description), 0, 45) !!}...</td>
                                                <td>{!! substr(strip_tags($of->service), 0, 45) !!}...</td>
                                                <td>{{ $of->ministry_dept_authority }}</td>
                                                <td>{{ $of->address }}</td>
                                                <td>
                                                    {!!$of->communications!!}
                                                </td>
                                                <td>
                                                    @if ($of->file)
                                                    <a  title="Download" href="{{$of->file}}" download><i class="fa fa-download"></i> Download</a>
                                                    @endif
                                                </td>
                                                <td>{{ $of->sort }}</td>

                                                <td>
                                                    @if($of->status == 1)
                                                        <span class="badge badge-light-success">Active</span>
                                                    @else
                                                        <span class="badge badge-light-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $of->createdBy->name }}</td>
                                                <td>
                                                    <a class="me-1" href="
                                                    {{ route('office.function.edit',$of->id) }}
                                                    " data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit">
                                                        <i class="far fa-edit text-dark"></i>
                                                    </a>
                                                    <form class="d-inline" id="delForm" action="
                                                    {{ route('office.function.destroy',$of->id) }}
                                                    " method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button id="delete" type="submit" class="me-1 dlt-btn" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Delete"><i class="far fa-trash-alt text-danger"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
