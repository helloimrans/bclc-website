@extends('admin.layouts.master')
@section('title', 'Reviews')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Reviews</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Reviews
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
                                <h5 class="mb-0">Reviews</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('reviews.create') }}"
                                        class="btn btn-info btn-sm"><i data-feather='plus-square'></i> Add New</a></div>
                            </div>
                        </div>
                        <div class="px-2 content-filter">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="user_id" class="form-label">Writer</label>
                                    <select id="user_id" class="form-select select2" name="user_id">
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="from_date" class="form-label">From Date</label>
                                    <input type="date" id="from_date" name="from_date" class="form-control" />
                                </div>
                                <div class="col-md-4">
                                    <label for="to_date" class="form-label">To Date</label>
                                    <input type="date" id="to_date" name="to_date" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Writer</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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

@section('scripts')
    <script type="text/javascript">
                $(function() {
            $.ajax({
                method: "GET",
                url: '{{ route('ajax.get.users') }}',
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    $("#user_id").html('<option value="">Select Writer</option>');
                    $.each(response, function(key, item) {
                        $("#user_id").append('<option value="' + item.id + '">' + item.name +
                            '</option>');
                    })
                },
                error: function(response) {
                    //
                }
            });
        });
        $(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('reviews.index') }}",
                    data: function(d) {
                        d.writer = $('#user_id').val();
                        d.from_date = $('#from_date').val();
                        d.to_date = $('#to_date').val();
                    }
                },
                columns: [{
                        data: null,
                        name: 'serial',
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'wrote_by.name',
                        name: 'wrote_by.name'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'thumbnail_image',
                        name: 'thumbnail_image'
                    },
                    {
                        data: 'category.name',
                        name: 'category.name'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },
                    {
                        data: 'created_by.name',
                        name: 'created_by.name'
                    },
                    {
                        data: 'updated_by.name',
                        name: 'updated_by.name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('#user_id, #from_date, #to_date').on('change', function() {
                table.draw();
            });
        });
    </script>

    {{-- Change Status Script --}}
    @include('admin.layouts.inc.change-status', ['table'=> 'reviews'])
@endsection
