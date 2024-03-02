@extends('admin.layouts.master')
@section('title', 'Enrolled Course Details')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Enrolled Course Details</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Enrolled Course Details
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
                                <h5 class="mb-0">Enrolled Course Details</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a href=""
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
                                            <th>Date</th>
                                            <th>Trx ID</th>
                                            <th>Fee</th>
                                            <th>Learner</th>
                                            <th>Email</th>
                                            <th>Mobile No.</th>
                                            <th>Payment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enrolledCourseDetails as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->order->created_at }}</td>
                                                <td>{{ $item->order->transaction_id }}</td>
                                                <td>{{ $item->order->amount }}</td>
                                                <td>{{ $item->order->user->name }}</td>
                                                <td>{{ $item->order->user->email }}</td>
                                                <td>{{ $item->order->user->mobile }}</td>
                                                <td>
                                                    @if($item->order->status == 'Pending')
                                                    <span class='badge bg-info'>Pending</span>
                                                    @else
                                                    <span class='badge bg-success'>Success</span>
                                                    @endif
                                                </td>
                                                <td>
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
