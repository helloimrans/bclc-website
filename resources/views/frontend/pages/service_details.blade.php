@extends('frontend.layouts.master')
@section('title', 'Services | '.@$service->title.'')
@section('content')

    @php
    $path = last(request()->segments());
    @endphp

    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Our Service</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start service section -->
    <section class="service-section py-5 wow fadeInDown" data-wow-duration="1s">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <div class="service-search mb-4 pb-2">
                        <form action="">
                            <div class="input-group">
                                <input class="form-control" type="text" name="keyword" placeholder="Search...">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn service-nsbtn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="service-cat mb-0 mb-md-5">
                        @foreach ($service_category as $category)
                            <!-- cardsmall item -->
                            <div class="cardsmall">
                                <div class="cardsmall-header">
                                    <span class="arrowed" id="headingTest1_{{ $category->id }}" data-toggle="collapse"
                                        data-target="#collapseTest1Tab_{{ $category->id }}"
                                        @if ($category->slug == $path) aria-expanded="true" @endif
                                        aria-controls="collapseTest1Tab_{{ $category->id }}">
                                        <img src="{{ asset('frontend') }}/images/ac1.png" alt="">
                                        {{ $category->name }}
                                    </span>
                                </div>
                                <div id="collapseTest1Tab_{{ $category->id }}"
                                    class="collapse

                                     @if ($service_count == 0) @if ($category->slug == $path) show @endif
@else
@if ($category->slug == @$service->category->slug) show @endif
                                     @endif

                                     "
                                    aria-labelledby="headingTest1_{{ $category->id }}" data-parent="#accordion3">
                                    @if ($category->services->count() == 0)
                                        <div class="cardsmall-content">
                                            <img src="{{ asset('frontend') }}/images/ac2.png" alt="">
                                            <a href="javascript:;" class="">No Service Available!</a>
                                        </div>
                                    @else
                                        @foreach ($category->services as $cat_service)
                                            <div class="cardsmall-content">
                                                <a href="{{ route('service.details', $cat_service->slug) }}"
                                                    class="@if ($cat_service->slug == @$service->slug) active @endif">
                                                    <img src="{{ asset('frontend') }}/images/ac2.png" alt="">
                                                    {{ $cat_service->title }}</a>

                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-9">
                    @if ($service_count == 0)
                        <div class="row">
                            <div class="col">
                                <div class="border py-4 text-center rounded">
                                    <h5>No Service Available!</h5>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="service-txt">
                                    <h4>{{ $service->title }}</h4>
                                    {!! $service->description !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="service-consult clearfix">
                                    <!-- Button trigger modal -->
                                    <button type="button" data-toggle="modal" data-target="#addModal"
                                        id="addBtn">
                                        Request a Consultation
                                    </button>

                                    <!-- Modal -->
                                    <div class="service-cunsult-modal">
                                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="sm-body">
                                                            <h5>Request a Consultation</h5>
                                                            <p>We will make sure to get back to you as soon as possible
                                                                within
                                                                48hrs.</p>
                                                            <div class="alert alert-danger p-1" id="validation-errors"></div>
                                                            <form id="addForm">
                                                                @csrf

                                                                <input type="hidden" name="service_id"
                                                                    value="{{ $service->id }}">
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="Enter your name"
                                                                        name="name" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="Enter your email"
                                                                        class="form-control" name="email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="Your subject"
                                                                        class="form-control" name="subject">
                                                                </div>
                                                                <div class="form-group">
                                                                    <p>Upload Your File : <span>.pdf, .docx, .png,
                                                                            .jpg,
                                                                            .jpeg</span></p>
                                                                    <input type="file" class="form-control"
                                                                        name="file">
                                                                </div>
                                                                <div class="form-group">
                                                                    <textarea rows="5" name="description" class="form-control" placeholder="Describe Your Case..."></textarea>
                                                                </div>
                                                                <div class="form-group clearfix">
                                                                    <input type="submit" value="Send">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--start slider area-->
                                <section class="slider-section wow fadeInDown" data-wow-duration="1s">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach ($service->images as $service_image)
                                                <li data-target="#carouselExampleIndicators"
                                                    data-slide-to="{{ $loop->index }}"
                                                    class=" @if ($loop->first) active @endif"></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach ($service->images as $service_image)
                                                <div class="carousel-item @if ($loop->first) active @endif">
                                                    <img class="d-block w-100" src="{{ asset($service_image->image) }}"
                                                        alt="image" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                                <!--end slider area-->
                            </div>
                        </div>
                        <div class="row mt-4 wow fadeInDown" data-wow-duration="1s">
                            <div class="col">
                                <div class="sk-title">
                                    <h4>Keywords</h4>
                                </div>
                                <div id="accordion" class="service-accordion">
                                    @foreach ($service->keywords as $keyword)
                                        <div class="card">
                                            <div class="card-header" id="heading-1_{{ $keyword->id }}">
                                                <h5 class="mb-0">
                                                    <a role="button" data-toggle="collapse"
                                                        href="#collapse-1_{{ $keyword->id }}"
                                                        @if ($loop->first) aria-expanded="true" @endif
                                                        aria-controls="collapse-1_{{ $keyword->id }}">
                                                        {{ $keyword->title }}
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse-1_{{ $keyword->id }}"
                                                class="collapse @if ($loop->first) show @endif"
                                                data-parent="#accordion" aria-labelledby="heading-1_{{ $keyword->id }}">
                                                <div class="card-body">
                                                    {!! $keyword->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="row mt-5 wow fadeInDown" data-wow-duration="1s">
                            <div class="col">
                                <div class="sk-title">
                                    <h4>Associated Service</h4>
                                </div>
                                <div id="accordion2" class="service-accordion">
                                    @foreach ($service->associated_service as $ass_service)
                                        <div class="card">
                                            <div class="card-header" id="heading-4_{{ $ass_service->id }}">
                                                <h5 class="mb-0">
                                                    <a role="button" data-toggle="collapse"
                                                        href="#collapse-4_{{ $ass_service->id }}"
                                                        @if ($loop->first) aria-expanded="true" @endif
                                                        aria-controls="collapse-4_{{ $ass_service->id }}">
                                                        {{ $ass_service->title }}
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse-4_{{ $ass_service->id }}"
                                                class="collapse @if ($loop->first) show @endif"
                                                data-parent="#accordion2"
                                                aria-labelledby="heading-4_{{ $ass_service->id }}">
                                                <div class="card-body">
                                                    {!! $ass_service->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end service section -->

@section('scripts')
    <script>
        //Add button
        $('#addBtn').on('click', function() {
            $('#validation-errors').html('');
            $('#validation-errors').fadeOut(100);
        });

        //ADD DATA
        $("#addForm").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('consultation.request') }}",
                data: new FormData(this),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    $('#addModal').modal('hide');
                    $('#addForm')[0].reset();
                    $('.toast-error').hide();
                    $('#validation-errors').html('');
                    $('#validation-errors').hide();
                    toastr.success('Successfully request sent !', 'Success', {
                        timeOut: 3000
                    });
                },
                error: function(xhr) {
                    $('#validation-errors').html('');
                    $('#validation-errors').fadeOut(100);
                    $('#validation-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#validation-errors').append('<ul class="m-0"><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });
    </script>
@endsection

@endsection
