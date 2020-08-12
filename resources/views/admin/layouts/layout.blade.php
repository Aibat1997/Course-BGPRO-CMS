<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Admindek | Admin Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin_vendor/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/feather.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/font-awesome.min.css">
    <script src="/admin_vendor/ckeditor/ckeditor.js"></script>
    <script src="/admin_vendor/ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="/admin_vendor/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="/admin_vendor/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    @stack('css')
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/style.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/pages.css">
</head>

<body>
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="/admin">
                            <img class="img-fluid" src="/admin_vendor/png/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('admin.layouts.left-menu')
                    @yield('content')
                    <div id="styleSelector">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/admin_vendor/js/jquery.min.js"></script>
    <script src="/admin_vendor/js/jquery-ui.min.js"></script>
    <script src="/admin_vendor/js/popper.min.js"></script>
    <script src="/admin_vendor/js/bootstrap.min.js"></script>
    <script src="/admin_vendor/js/waves.min.js"></script>
    <script src="/admin_vendor/js/jquery.slimscroll.js"></script>
    <script src="/admin_vendor/js/pcoded.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="/admin_vendor/js/vertical-layout.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="/admin_vendor/js/rocket-loader.min.js" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49"
        defer=""></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="/admin_vendor/js/script.min.js"></script>
    @stack('js')
</body>

</html>