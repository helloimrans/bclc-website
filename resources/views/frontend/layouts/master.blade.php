<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title') | BCLC</title>
    <link rel="shortcut icon" href="{{ asset('frontend') }}/logo/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--google font-->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"> --}}

     <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!--font-awesome-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/font-awesome-4.7.0/css/font-awesome.css" />
    <!--slick.css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css" />
    <!--slick.theme.css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick-theme.css" />
    <!--uikit.min.css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/uikit.min.css" />
    <!--animate.css-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">
    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!--style.css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />
    <!--responsive.css-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css" />

    <!-- Toastr -->
    <link href="{{ asset('defaults/toastr/toastr.min.css') }}" rel="stylesheet" />

    @yield('styles')
</head>

<body>

    {{-- Inc header top, header, mobile menu --}}
    @include('frontend.layouts.inc.header')


    {{-- Content yield --}}
    @yield('content')

    {{-- Inc footer, copyright, fix sidebar --}}
    @include('frontend.layouts.inc.footer')

    <!--jquery.min.js-->
    <script src="{{ asset('frontend') }}/js/jquery-3.4.1.min.js"></script>
    <!--popper.min.js-->
    <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
    <!--bootstrap.min.js-->
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <!--slick.js-->
    <script src="{{ asset('frontend') }}/js/slick.js"></script>
    <!--owl.carousel.js-->
    <script src="{{ asset('frontend') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('frontend') }}/js/wow.min.js"></script>
    <!--waypoints.min.js-->
    <script src="{{ asset('frontend') }}/js/jquery.waypoints.min.js"></script>
    <!--counterup.min.js-->
    <script src="{{ asset('frontend') }}/js/jquery.counterup.min.js"></script>
    <!--uikit-icons.js-->
    <script src="{{ asset('frontend') }}/js/uikit-icons.js"></script>
    <!--uikit.min.js-->
    <script src="{{ asset('frontend') }}/js/uikit.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend') }}/js/mixitup.min.js"></script>
    <!--main.js-->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <!-- Toastr -->
    <script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"

            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    <!-- Custom Script -->
    <script>
        $(document).ready(function() {
            // Nav search
            $('.web-search').click(function() {
                $(".search-item").toggleClass("search-box");
            });

            //Menu icon click
            $(".menu-icon").click(function() {
                $(".menu-icon").toggleClass("active");
                $('.mobile-menu').toggleClass('mobile-menu-active');
            });
            // Fix sidebar
            $('.fix-form-img').bind('click', function() {
                $('.fix-form').toggleClass('fix-form-block');
            });
        });

        setInterval(function() {
            var currentdate = new Date();
            $('#time').html(currentdate.toLocaleTimeString('en-US', {
                hour12: true,
                hour: "numeric",
                minute: "numeric",
                second: "numeric"
            }));
        }, 1000);
    </script>

    @yield('scripts')

</body>

</html>
