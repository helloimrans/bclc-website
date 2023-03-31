@extends('frontend.layouts.master')
@section('title', 'Office & Functions')
@section('content')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection

<!-- start page header -->
<section class="page-header-section wow fadeInDown" data-wow-duration="1s">
    <div class="page-header-box">
        <div class="page-header-img">
            <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
        </div>
        <div class="page-header-txt">
            <h4 class="mb-0">Office & Functions</h4>
        </div>
    </div>
</section>
<!-- end page header -->

<!-- start service section -->
<section class="service-categories py-5 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="ad-titles mb-4" style="text-transform: inherit">Sectors</h5>
            </div>
        </div>
        <div class="row">
            @foreach ($of_sectors as $of_sector)
                <div class="col-md-4">
                    <div class="service-cat-box mb-3">
                        <a href="#cat_{{ $of_sector->id }}">
                            <div class="sc-txt">
                                {{ $of_sector->name }}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @foreach ($of_sectors as $of_sector)
            <div class="row mt-4" id="cat_{{ $of_sector->id }}">
                <div class="col">
                    <div class="office_function article-details bg-white">
                        <h5 class="ad-titles mb-4" style="text-transform: inherit">{{ $of_sector->name }}</h5>
                        <table class="table table-striped table-bordered table-sm dataTable">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Title/Name</th>
                                    <th>Description</th>
                                    <th>Activities/Services/Functions</th>
                                    <th>Ministry/Department/Authority/Nature</th>
                                    <th>Address/Remarks</th>
                                    <th>Communications</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($of_sector->officeFunctions as $officeFunction)
                                    <tr>
                                        <td>{{ $officeFunction->category->name }}</td>
                                        <td>{{ $officeFunction->title }}</td>
                                        <td>{!! substr(strip_tags($officeFunction->description), 0, 35) !!}...</td>
                                        <td>{!! substr(strip_tags($officeFunction->service), 0, 35) !!}...</td>
                                        <td>{{ $officeFunction->ministry_dept_authority }}</td>
                                        <td>{{ $officeFunction->address }}</td>
                                        <td>{!! $officeFunction->communications !!}</td>
                                        <td class="text-center">
                                            @if ($officeFunction->file)
                                                <a title="Download file" href="{{ $officeFunction->file }}"
                                                    class="sfof-action-btn" download><i
                                                        class="fa fa-file-pdf-o"></i></a>
                                            @endif
                                            <a title="View details" href="javascript:;" data-toggle="modal" class="sfof-action-btn"
                                                data-target="#exampleModal_{{ $officeFunction->id }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </td>

                                    </tr>

                                    <!--View Modal -->
                                    <div class="service-cunsult-modal">
                                        <div class="modal fade" id="exampleModal_{{ $officeFunction->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body pt-0">
                                                        <div class="sm-body">
                                                            <h5>{{ $officeFunction->title }}</h5>
                                                            <div class="sfof-details">
                                                                <h6>Title/Name</h6>
                                                                <p>{{ $officeFunction->title }}</p>

                                                                <h6>Description</h6>
                                                                <p>{!! $officeFunction->description !!}</p>

                                                                <h6>Activities/Services/Functions</h6>
                                                                <p>{!! $officeFunction->service !!}</p>

                                                                <h6>Ministry/Dept./Authority</h6>
                                                                <p>{{ $officeFunction->ministry_dept_authority }}</p>

                                                                <h6>Address/Remarks</h6>
                                                                <p>{{ $officeFunction->address }}</p>

                                                                <h6>Communications</h6>
                                                                <p>{!! $officeFunction->communications !!}</p>

                                                                <h6>File</h6>
                                                                @if ($officeFunction->file)
                                                                    <p><a href="{{ $officeFunction->file }}"
                                                                            download><i class="fa fa-download"></i>
                                                                            Download</a></p>
                                                                @else
                                                                    <p>No file</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
@endsection
