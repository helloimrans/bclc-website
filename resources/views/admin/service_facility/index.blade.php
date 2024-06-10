@extends('admin.layouts.master')
@section('title', 'Service & Facility')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Service & Facility</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Service & Facility
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
                                <h5 class="mb-0">Service & Facility</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a href="
                                    {{ route('service.facility.create') }}"
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
                                            <th>Service</th>
                                            <th>Sector</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Description/KeyPoints/Services</th>
                                            <th>Authority</th>
                                            <th>Communications</th>
                                            <th>File</th>
                                            <th>Sort</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($service_facilitics as $sf)
                                            <tr>
                                                <td>{{ $sf->service }}</td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{$sf->sector->name}}
                                                </td>
                                                <td>
                                                    {{$sf->category->name}}
                                                </td>
                                                <td>{{ $sf->title }}</td>
                                                <td>{!! substr(strip_tags($sf->description), 0, 45) !!}...</td>
                                                <td>{{ $sf->authority }}</td>
                                                <td>
                                                    {!!$sf->communications!!}
                                                </td>
                                                <td><a  title="Download" href="{{Storage::url($sf->file)}}" download><i class="fa fa-download"></i> Download</a></td>
                                                <td>{{ $sf->sort }}</td>
                                                <td>
                                                    @if($sf->status == 1)
                                                        <span class="badge badge-light-success">Active</span>
                                                    @else
                                                        <span class="badge badge-light-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $sf->createdBy->name }}</td>
                                                <td>
                                                    <a class="me-1" href="
                                                    {{ route('service.facility.edit',$sf->id) }}
                                                    " data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit">
                                                        <i class="far fa-edit text-dark"></i>
                                                    </a>
                                                    <form class="d-inline" id="delForm" action="
                                                    {{ route('service.facility.destroy',$sf->id) }}
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
