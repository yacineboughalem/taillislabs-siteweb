<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title> {{ config('app.name') }} Admin - @yield('title') </title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="">
    <meta name="keywords"
        content="">
    <meta name="author" content="">

    <!-- [Favicon] icon -->
    <link rel="icon" href="/admin/images/favicon.webp" type="image/x-icon">
    <!-- [Font] Family -->
    <link rel="stylesheet" href="/admin/fonts/inter/inter.css" id="main-font-link" />

    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="/admin/fonts/tabler-icons.min.css" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="/admin/fonts/feather.css" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="/admin/fonts/fontawesome.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="/admin/fonts/material.css" />
    @yield('css')

    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="/admin/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="/admin/css/style-preset.css" />
</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>


    @include('admin/layouts/components/sidebar')

    @include('admin/layouts/components/navbar')

    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">@yield('title')</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>
    @include('admin/layouts/components/footer')
 
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- [Page Specific JS] start -->
    <script src="/admin/js/plugins/apexcharts.min.js"></script>
    <script src="/admin/js/pages/dashboard-default.js"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
    <script src="/admin/js/plugins/popper.min.js"></script>
    <script src="/admin/js/plugins/simplebar.min.js"></script>
    <script src="/admin/js/plugins/bootstrap.min.js"></script>
    <script src="/admin/js/fonts/custom-font.js"></script>
    <script src="/admin/js/config.js"></script>
    <script src="/admin/js/pcoded.js"></script>
    <script src="/admin/js/plugins/feather.min.js"></script>
    @yield('javascript')
    @include('admin.layouts.globaljs')
</body>
</html>
