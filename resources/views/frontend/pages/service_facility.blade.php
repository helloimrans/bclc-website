@extends('frontend.layouts.master')
@section('title', 'Service & Facilities')
@section('content')

@section('styles')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endsection

<!-- start page header -->
<section class="page-header-section wow fadeInDown" data-wow-duration="1s">
    <div class="page-header-box">
        <div class="page-header-img">
            <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
        </div>
        <div class="page-header-txt">
            <h4 class="mb-0">Service & Facilities</h4>
        </div>
    </div>
</section>
<!-- end page header -->

<!-- start service section -->
<section class="service-categories py-5 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="ad-titles mb-4" style="text-transform: inherit">Categories</h5>
            </div>
        </div>
        <div class="row">
            @foreach ($serviceCategories as $serviceCategory)
                <div class="col-md-4">
                    <div class="service-cat-box mb-3">
                        <a href="#cat_{{ $serviceCategory->id }}">
                            <div class="sc-txt">
                                {{ $serviceCategory->name }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @foreach ($serviceCategories as $serviceCategory)
            <div class="row mt-4" id="cat_{{ $serviceCategory->id }}">
                <div class="col">
                    <div class="office_function article-details bg-white table-responsive">
                        <h5 class="ad-titles mb-4" style="text-transform: inherit">{{ $serviceCategory->name }}</h5>
                        <table class="table table-striped table-bordered table-sm dataTable">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Title/Name</th>
                                    <th>Description/ Key Points /Services</th>
                                    <th>Authority</th>
                                    <th>Communications</th>
                                    <th>Source Link</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($serviceCategory->serviceFacilities as $serviceFacility)
                                    <tr>
                                        <td>{{ $serviceFacility->service }}</td>
                                        <td>{{ $serviceFacility->title }}</td>
                                        <td>{{ $serviceFacility->description }}</td>
                                        <td>{{ $serviceFacility->authority }}</td>
                                        <td>{{ $serviceFacility->contact_info }}</td>
                                        <td>{{ $serviceFacility->source_link }}</td>
                                        <td class="text-center"><a href="{{ $serviceFacility->file }}"><i
                                                    class="fa fa-file-pdf-o"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- end service section -->

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
@endsection
