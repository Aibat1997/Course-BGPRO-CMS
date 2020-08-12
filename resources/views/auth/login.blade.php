<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>Войти</title>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description"
          content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs."/>
    <meta name="keywords"
          content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive"/>
    <meta name="author" content="colorlib"/>
    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin_vendor/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/feather.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/style.css">
    <link rel="stylesheet" type="text/css" href="/admin_vendor/css/pages.css">
</head>
<body themebg-pattern="theme1">
<section class="login-block">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form method="POST" action="{{ route('login') }}" class="md-float-material form-material">
                    @csrf
                    <div class="text-center">
{{--                        <img src="png/logo.png" alt="logo.png">--}}
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Войти</h3>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group form-primary">
                                <input type="email" name="email" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Email</label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Пароль</label>
                            </div>
{{--                            <div class="row m-t-25 text-left">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="checkbox-fade fade-in-primary">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox" value="">--}}
{{--                                            <span class="cr"><i--}}
{{--                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>--}}
{{--                                            <span class="text-inverse">Remember me</span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="forgot-phone text-right float-right">--}}
{{--                                        <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot--}}
{{--                                            Password?</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                        Войти
                                    </button>
                                </div>
                            </div>
                            <p class="text-inverse text-left">Вы еще не зарегистрированы?<a href="/register">
                                    <b>Зарегестрируйтесь здесь </b></a>!</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="/admin_vendor/js/jquery.min.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="/admin_vendor/js/jquery-ui.min.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="/admin_vendor/js/popper.min.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="/admin_vendor/js/bootstrap.min.js"></script>
<script src="/admin_vendor/js/waves.min.js" type="4878d7dfa7bc22a8dfa99416-text/javascript"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="/admin_vendor/js/jquery.slimscroll.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="/admin_vendor/js/modernizr.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="/admin_vendor/js/css-scrollbars.js"></script>
<script type="4878d7dfa7bc22a8dfa99416-text/javascript" src="/admin_vendor/js/common-pages.js"></script>
<script src="/admin_vendor/js/rocket-loader.min.js" data-cf-settings="4878d7dfa7bc22a8dfa99416-|49" defer=""></script>
</body>
</html>
