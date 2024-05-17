@extends('admin.layouts.master')
@section('title', 'Training Course View')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Training Course View</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Training Course View
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
                                <h5 class="mb-0">Training Course View</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a
                                        href="
                                    {{ route('courses.index') }}
                                    "
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table text-nowrap">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>:</th>
                                            <td>{{ $course->title ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <th>:</th>
                                            <td><img class="rounded" width="60"
                                                    src="@if ($course->image) {{ Storage::url($course->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                    alt="{{ $course->title }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Certificate image</th>
                                            <th>:</th>
                                            <td><img class="rounded" width="60"
                                                    src="@if ($course->certificate_image) {{ Storage::url($course->certificate_image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                    alt="{{ $course->title }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Service</th>
                                            <th>:</th>
                                            <td>{{ @$course->service->title ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Service Category</th>
                                            <th>:</th>
                                            <td>{{ $course->serviceCategory->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Course Duration</th>
                                            <th>:</th>
                                            <td>{{ $course->duration ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Expert</th>
                                            <th>:</th>
                                            <td>{{ $course->expert->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Course Schedule</th>
                                            <th>:</th>
                                            <td>
                                                @forelse (json_decode($course->schedule) as $schedule)
                                                    <span class="badge bg-secondary">{{ $schedule }}</span>
                                                @empty
                                                @endforelse
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Suitable Course</th>
                                            <th>:</th>
                                            <td>
                                                @forelse (json_decode($course->suitable_course) ?? [] as $suitable_course)
                                                    <span class="badge bg-secondary">{{ $suitable_course }}</span>
                                                @empty
                                                @endforelse
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Venue</th>
                                            <th>:</th>
                                            <td>{{ $course->venue ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Class Start Date</th>
                                            <th>:</th>
                                            <td>{{ $course->class_start_date ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Class End Date</th>
                                            <th>:</th>
                                            <td>{{ $course->class_end_date ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Class Start Time</th>
                                            <th>:</th>
                                            <td>{{ $course->class_start_time ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Class End Time</th>
                                            <th>:</th>
                                            <td>{{ $course->class_end_time ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Hours</th>
                                            <th>:</th>
                                            <td>{{ $course->total_hours . '' . $course->hour_minute ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Reg. Date</th>
                                            <th>:</th>
                                            <td>{{ $course->last_reg_date ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Boarding</th>
                                            <th>:</th>
                                            <td>{{ $course->boarding ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Meeting Link</th>
                                            <th>:</th>
                                            <td>{{ $course->meeting_link ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Mobile</th>
                                            <th>:</th>
                                            <td>{{ $course->contact_mobile ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Whatsapp</th>
                                            <th>:</th>
                                            <td>{{ $course->contact_whatsapp ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Email</th>
                                            <th>:</th>
                                            <td>{{ $course->contact_email ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fee</th>
                                            <th>:</th>
                                            <td>{{ $course->fee ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->discount)
                                                    {{ $course->discount }}
                                                    @if ($course->discount_type == 1)
                                                        TK
                                                    @else
                                                        %
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Discount Fee</th>
                                            <th>:</th>
                                            <td>{{ $course->discount_fee ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Active Fee</th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->active_fee == 1)
                                                    Main Fee
                                                @else
                                                    Discount Fee
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Provide Certificate</th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->provide_certificate == 1)
                                                    <span class="badge badge-light-success">Active</span>
                                                @else
                                                    <span class="badge badge-light-warning">Deactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Home Slider</th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->home_slider == 1)
                                                    <span class="badge badge-light-success">Active</span>
                                                @else
                                                    <span class="badge badge-light-warning">Deactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Provide Certificate</th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->provide_certificate == 1)
                                                    <span class="badge badge-light-success">Active</span>
                                                @else
                                                    <span class="badge badge-light-warning">Deactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Comming Soon</th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->comming_soon == 1)
                                                    <span class="badge badge-light-success">Active</span>
                                                @else
                                                    <span class="badge badge-light-warning">Deactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Show Key Takeaways </th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->show_key_takeaways == 1)
                                                    <span class="badge badge-light-success">Active</span>
                                                @else
                                                    <span class="badge badge-light-warning">Deactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Show Training Offering </th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->show_training_offering == 1)
                                                    <span class="badge badge-light-success">Active</span>
                                                @else
                                                    <span class="badge badge-light-warning">Deactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Show Consulting Offering </th>
                                            <th>:</th>
                                            <td>
                                                @if ($course->show_consulting_offering == 1)
                                                    <span class="badge badge-light-success">Active</span>
                                                @else
                                                    <span class="badge badge-light-warning">Deactive</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <th>:</th>
                                            <td>{{ $course->createdBy->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <th>:</th>
                                            <td>{{ $course->updateBy->name ?? 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            // Service Category to Servoce onChange
            $(function() {
                $(document).on('change', '#service_category_id', function() {
                    var id = $(this).val();
                    if (id == '') {
                        var html = '<option value="" selected disabled>Select Service</option>';
                        $('#service_id').html(html);
                        $('#service_id').prop('disabled', true);
                    } else {
                        $.ajax({
                            type: "Get",
                            url: "{{ url('/get/category/service') }}/" + id,
                            dataType: "json",
                            success: function(data) {
                                var html =
                                    '<option value="" selected disabled>Select Service</option>';
                                $('#service_id').prop('disabled', false);
                                $.each(data, function(key, val) {
                                    html += '<option value="' + val.id + '">' + val
                                        .title + '</option>';
                                });
                                $('#service_id').html(html);
                            },
                        });
                    }

                });
            });
        </script>
        <script>
            // Generate course id onClick
            function generateId() {
                var uniqueId = Date.now().toString(36) + Math.random().toString(36).substr(2);
                document.getElementById("course_id").value = uniqueId;
                document.getElementById("course_id").disabled = false;
            }
        </script>

    @endsection
@endsection
