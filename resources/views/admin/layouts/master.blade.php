<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>@yield('title') - BCLC</title>

    <link rel="apple-touch-icon" href="{{ asset('admin') }}/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin') }}/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin') }}/app-assets/vendors/css/forms/select/select2.min.css">

    <!-- Datatable -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin') }}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin') }}/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}assets/css/style.css">

    <!-- Toastr -->
    <link href="{{ asset('defaults/toastr/toastr.min.css') }}" rel="stylesheet" />

    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    <style>
        .main-menu.menu-light .navigation>li ul .active,
        .main-menu.menu-dark .navigation>li ul .active {
            box-shadow: inherit;
        }

        html .content.app-content {
            padding: calc(1rem + 4.45rem + 1.3rem) 1rem 0;
        }

        .header-navbar.floating-nav {
            width: calc(100vw - (98vw - 100%) - calc(2rem * 2) - 260px);
        }

        .vertical-layout.vertical-menu-modern.menu-expanded .main-menu {
            width: 250px;
        }

        html .content .content-wrapper .content-header-title {
            color: #444;
            font-size: 21px;
        }

        html body {
            background-color: #F2F6FC;
        }

        .main-menu.menu-light .navigation>li.active>a,
        .main-menu.menu-dark .navigation>li.active>a {
            box-shadow: inherit;
        }

        /* .main-menu.menu-light .navigation>li>a,
        .main-menu.menu-dark .navigation>li>a {
            margin: inherit;
        } */

        .vertical-layout.vertical-menu-modern .main-menu .navigation .menu-content>li>a i,
        .vertical-layout.vertical-menu-modern .main-menu .navigation .menu-content>li>a svg {
            margin-right: 10px;
        }

        .vertical-layout.vertical-menu-modern .main-menu .navigation>li>a i,
        .vertical-layout.vertical-menu-modern .main-menu .navigation>li>a svg {
            margin-right: 0.6rem;
        }

        .vertical-layout.vertical-menu-modern.menu-expanded .main-menu .navigation>li>a>i:before,
        .vertical-layout.vertical-menu-modern.menu-expanded .main-menu .navigation>li>a>svg:before {
            font-size: 18px;
        }



        /* Extra */
        .sub-btn {
            text-transform: uppercase;
            font-size: 13px;
            padding: 10px;
        }

        .dlt-btn {
            border: 0;
            background: transparent;
            padding: 0;
        }

        .note-editor.note-airframe .note-editing-area .note-editable,
        .note-editor.note-frame .note-editing-area .note-editable {
            background: #fff;
        }
    </style>

    @yield('styles')

</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('admin.layouts.inc.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('admin.layouts.inc.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        {{-- <div class="header-navbar-shadow"></div> --}}
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('admin.layouts.inc.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin') }}/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <!-- Datatable -->
    <script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('admin') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="{{ asset('admin') }}/app-assets/js/core/app-menu.min.js"></script>
    <script src="{{ asset('admin') }}/app-assets/js/core/app.min.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('admin') }}/app-assets/js/scripts/forms/form-select2.min.js"></script>

    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- No image -->
    <script src="{{ asset('defaults/noimage/no-image.js') }}"></script>
    <!-- Sweetalert -->
    <script src="{{ asset('defaults/sweetalert/sweetalert2@9.js') }}"></script>

    <script src="{{ asset('defaults/sweetalert/sweetalertjs.js') }}"></script>
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
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });

        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('.example').DataTable({
                responsive: true,
            });
        });

        $(document).ready(function() {
            $(".summernote").summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'Enter description...',
                tabsize: 2,
                height: 200,
            });

        });
    </script>

    @yield('scripts')
</body>

</html>
