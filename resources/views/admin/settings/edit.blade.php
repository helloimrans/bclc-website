@extends('admin.layouts.master')
@section('title', 'Settings')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Settings</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Settings
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
                    <div class="card p-2">
                        <div class="card-header">
                            <div class="head-label">
                                <h5 class="mb-0">Settings</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">

                                    </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('settings.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-1">
                                    <label class="form-label" for="">Bkash Number</label>
                                    <input name="bkash_number" rows="2" class="form-control @error('bkash_number') is-invalid @enderror"
                                        placeholder="Enter bkash number" value="{{ old('bkash_number', @$setting->bkash_number) }}">
                                    @error('bkash_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="bkash_account_type">Bkash Account Type</label>
                                    <select name="bkash_account_type" id="bkash_account_type" class="form-control  @error('bkash_number') is-invalid @enderror">
                                        <option value="">Select Account Type</option>
                                        <option value="personal" @if(@$setting->bkash_account_type == 'personal' )
                                            selected
                                        @endif>Personal</option>
                                        <option value="agent" @if(@$setting->bkash_account_type == 'agent' )
                                            selected
                                        @endif>Agent</option>
                                    </select>
                                    @error('bkash_account_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-2 text-end">
                                    <button type="submit" class="btn btn-info sub-btn"><i data-feather='save'></i>Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
