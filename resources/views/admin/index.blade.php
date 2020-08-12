@extends('admin.layouts.layout')

@push('css')
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/widget.css">
<link rel="stylesheet" href="/admin_vendor/css/chartist.css" type="text/css" media="all">
@endpush

@section('content')
<div class="pcoded-content">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Главная</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-red">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Курсов на сайте</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $courses->count() }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-book text-c-red f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Уроков на сайте</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $lessons->count() }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-briefcase text-c-blue f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-green">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Пользователей на сайте</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $users->count() }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users text-c-green f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Прибыль</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $users->count() }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users text-c-yellow f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>New Products</h5>
                                </div>
                                <div class="card-block p-b-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Product Code</th>
                                                    <th>Customer</th>
                                                    <th>Status</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Sofa</td>
                                                    <td>#PHD001</td>
                                                    <td><a href="https://colorlib.com/cdn-cgi/l/email-protection"
                                                            class="__cf_email__"
                                                            data-cfemail="29484b4a694e44484045074a4644">[email&#160;protected]</a>
                                                    </td>
                                                    <td><label class="label label-danger">Out
                                                            Stock</label></td>
                                                    <td>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                        <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                                    </td>
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
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="/admin_vendor/js/custom-dashboard.min.js"></script>
<script data-cfasync="false" src="/admin_vendor/js/email-decode.min.js"></script>
<script src="/admin_vendor/js/jquery.flot.js"></script>
<script src="/admin_vendor/js/jquery.flot.categories.js"></script>
<script src="/admin_vendor/js/curvedlines.js"></script>
<script src="/admin_vendor/js/jquery.flot.tooltip.min.js"></script>
<script src="/admin_vendor/js/chartist.js"></script>
<script src="/admin_vendor/js/amcharts.js"></script>
<script src="/admin_vendor/js/serial.js"></script>
<script src="/admin_vendor/js/light.js"></script>
@endpush