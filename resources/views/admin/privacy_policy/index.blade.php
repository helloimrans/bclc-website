@extends('admin.layouts.master')
@section('title', 'Privacy & Policy')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Privacy & Policy</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Privacy Policy
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
                                <h5 class="mb-0">Privacy Policy</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a href="{{ route('privacy.policy.create') }}" class="btn btn-info btn-sm"><i
                                        data-feather='plus-square'></i> Add New</a>
                                    </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                             <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($privacy_policies as $privacy_policy)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                 <td>{!! substr(strip_tags($privacy_policy->description), 0, 45) !!}...</td>
                                                <td>
                                                    <a class="me-1" href="{{ route('privacy.policy.edit', $privacy_policy->id) }}" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit">
                                                        <i class="far fa-edit text-dark"></i>
                                                    </a>
                                                    <form class="d-inline" id="delForm" action=" {{ route('privacy.policy.destroy',$privacy_policy->id) }}" method="POST">
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
