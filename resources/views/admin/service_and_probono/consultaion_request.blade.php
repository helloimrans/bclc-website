@extends('admin.layouts.master')
@section('title', 'Consultation Request')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Consultation Request</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Consultation Request
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
                                <h5 class="mb-0">Consultation Request</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Service Name</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Client Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Document</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->service->title ?? 'None' }}</td>
                                                <td>
                                                    @if (@$row->service->is_service == 1)
                                                        <span class="badge badge-light-success">Service</span>
                                                    @elseif(@$row->service->is_service == 2)
                                                        <span class="badge badge-light-warning">Pro-Bono</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($row->status == 1)
                                                        <a id="confirm_first" href="{{ route('service.consultation.status',$row->id) }}"><span class="badge badge-light-success">Approved</span></a>
                                                    @else
                                                        <a id="confirm_first" href="{{ route('service.consultation.status',$row->id) }}"><span class="badge badge-light-warning">Pending</span></a>
                                                    @endif
                                                </td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->subject }}</td>
                                                @php
                                                $uri_path = asset($row->file);
                                                $uri_parts = explode('/', $uri_path);
                                                $uri_tail = end($uri_parts);
                                            @endphp
                                                <td class="text-center">
                                                    <a href="{{ asset($row->file)  }}" download="{{ $uri_tail  }}"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="Download" class="badge badge-light-success">
                                                        <i class="fa fa-download text-success"></i>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a id="link_delete" href="{{ route('service.consultation.delete',$row->id) }}" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Delete">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </a>
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
