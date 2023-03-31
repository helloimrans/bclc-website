@extends('learner.layouts.master')
@section('title', 'Security')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Security</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('learner.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Security
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
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body pt-1">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        {{ session()->get('success') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="alert-body">
                                        {{ session()->get('error') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                            @endif
                            <!-- form -->
                            <form action="{{ route('learner.update.password') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-old-password">Current password</label>
                                        <div class="input-group form-password-toggle input-group-merge @error('current_password') is-invalid @endif">
                                            <input type="password" class="form-control @error('current_password') is-invalid @endif" id="account-old-password"
                                                name="current_password" placeholder="Enter current password"
                                                data-msg="Please current password" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                        @error('current_password')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-new-password">New Password</label>
                                        <div class="input-group form-password-toggle input-group-merge @error('new_password') is-invalid @endif">
                                            <input type="password" id="account-new-password" name="new_password"
                                                class="form-control @error('new_password') is-invalid @endif" placeholder="Enter new password" />
                                            <div class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                        @error('new_password')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-retype-new-password">Retype New
                                            Password</label>
                                        <div class="input-group form-password-toggle input-group-merge @error('password_confirmation') is-invalid @endif">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @endif" id="account-retype-new-password"
                                                name="password_confirmation" placeholder="Confirm your new password" />
                                            <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                        </div>
                                        @error('password_confirmation')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary me-1 mt-1"><i class="fa fa-save"></i> Update Password</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1">Discard</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <script>
        $(function() {
            $(document).on('change', '#tuition_district', function() {
                var id = $(this).val();
                if (id == '') {
                    $('#tuition_area').html('');
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/get/tuition/area') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '';
                            $.each(data, function(key, val) {
                                html += '<option value="' + val.id + '">' + val
                                    .area_name + '</option>';
                            });
                            $('#tuition_area').html(html);
                        },
                    });
                }
            });
        });
    </script>

@endsection
@endsection
