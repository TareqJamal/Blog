<!doctype html>
<html lang="en">

<!-- Mirrored from bootstrap.gallery/elite-admin-dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Jun 2021 21:11:46 GMT -->
<head>
    <!-- Required meta tags -->
    @include('Admin.Includes.meta')
    <title>@yield('title') | Dashboard</title>
    @include('Admin.Includes.css')

</head>
<body>

<!-- Loading start -->
<div id="loading-wrapper">
    <div id="loader"></div>
</div>
<!-- Loading end -->

<!-- BEGIN .app-wrap -->
<div class="app-wrap">

    <!-- BEGIN .app-heading -->
 @include('Admin.Layouts.header')
    <!-- END: .app-heading -->
    <!-- BEGIN .app-container -->
    <div class="app-container">
        <!-- BEGIN .app-side -->
        @include('Admin.Layouts.sidebar')
        <!-- END: .app-side -->
        <!-- BEGIN .app-main -->
        <div class="app-main">
            <!-- BEGIN .main-heading -->
            <header class="main-heading">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="page-icon">
                                <i class="icon-laptop_windows"></i>
                            </div>
                            <div class="page-title">
                                <h3>Dashboard</h3>
                                <h6 class="sub-heading">Welcome to Elite Admin Template</h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="daterange-container">
                                <div id="reportrange" class="form-control">
                                    <span></span> <i class="icon-chevron-down down-arrow"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: .main-heading -->
            <!-- BEGIN .main-content -->
            <div class="main-content">
                <!-- Row start -->
                @yield('content-dashboard')
                <!-- Row end -->
                @yield('main-content')
            </div>
            <!-- END: .main-content -->

            <!-- BEGIN .main-footer -->
            @include('Admin.Layouts.footer')
            <!-- END: .main-footer -->

        </div>
        <!-- END: .app-main -->

    </div>
    <!-- END: .app-container -->

</div>
@include('Admin.Includes.js')
@include('sweetalert::alert')
</body>
@yield('js')
<!-- Mirrored from bootstrap.gallery/elite-admin-dashboard/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Jun 2021 21:13:38 GMT -->
</html>
