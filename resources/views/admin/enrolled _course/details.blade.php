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
                                <div class="dt-buttons d-inline-flex"><a href="{{route('enrolled.courses.index')}}"
                                    class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Payment Date</th>
                                            <th>Trx ID</th>
                                            <th>Fee</th>
                                            <th>Learner</th>
                                            <th>Email</th>
                                            <th>Mobile No.</th>
                                            <th>Payment Status</th>
                                            <th>Is Payment Approved</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enrolledCourseDetails as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->order->created_at)->format('d-m-Y') }}</td>
                                                <td>{{ $item->order->transaction_id }}</td>
                                                <td>{{ $item->order->amount }}</td>
                                                <td>{{ $item->order->user->name }}</td>
                                                <td>{{ $item->order->user->email }}</td>
                                                <td>{{ $item->order->user->mobile }}</td>
                                                <td>
                                                    <span class='badge {{$item->order->status == 'Complete' ? 'bg-success' : 'bg-danger'}}'>{{$item->order->status}}</span>
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->order->status == "Pending")
                                                        <a href="{{route('enrolled.courses.approve', $item->order->id)}}" class="btn btn-sm btn-info"><i class="fa fa-check"></i> Approve</a>
                                                    @else
                                                    <a href="javascript:;" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> Approved</a>
                                                    @endif
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
