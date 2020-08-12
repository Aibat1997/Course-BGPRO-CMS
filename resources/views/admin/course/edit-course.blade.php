@extends('admin.layouts.layout')

@push('css')
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/switchery.min.css">
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/bootstrap-tagsinput.css" />
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/datedropper.min.css" />
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/spectrum.css" />
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/jquery.minicolors.css" />
<link rel="stylesheet" href="/admin_vendor/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/bootstrap-multiselect.css" />
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/multi-select.css" />
<link rel="stylesheet" type="text/css" href="/admin_vendor/css/jquery.steps.css">
@endpush

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Добавить/Редактировать курс</h5>
                                    <div class="col-sm-10" style="display: flex;justify-content: flex-end;color:#fff">
                                        <a href="/admin/courses" class="btn btn-danger m-b-0">Назад</a>
                                    </div>
                                </div>
                                <div class="card-block">
                                    @if (!empty($course))
                                    <form action="/admin/courses/{{ $course->id }}" method="POST" enctype="multipart/form-data" class="col-lg-12 col-xl-12 row">
                                        @method('PUT')
                                    @else
                                    <form action="/admin/courses" method="POST" enctype="multipart/form-data" class="col-lg-12 col-xl-12 row">
                                    @endif
                                        @csrf
                                        <div class="col-lg-12 col-xl-8">
                                            <ul class="nav nav-tabs  tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab" href="#rus"
                                                        role="tab" aria-selected="true">Руский</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kaz" role="tab"
                                                        aria-selected="false">Казахский</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#eng"
                                                        role="tab">Английский</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content tabs card-block">
                                                <div class="tab-pane active show" id="rus" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-lg-10">
                                                            <div class="input-group">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text">Название</label>
                                                                </span>
                                                                <input type="text" name="name_ru"
                                                                    placeholder="Название (Рус)" class="form-control" value="{{ !empty($course) ? $course->name_ru : old('name_ru') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="kaz" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-lg-10">
                                                            <div class="input-group">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text">Название</label>
                                                                </span>
                                                                <input type="text" name="name_kz"
                                                                    placeholder="Название (Каз)" class="form-control" value="{{ !empty($course) ? $course->name_kz : old('name_kz') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="eng" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-lg-10">
                                                            <div class="input-group">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text">Название</label>
                                                                </span>
                                                                <input type="text" name="name_en"
                                                                    placeholder="Название (Анг)" class="form-control" value="{{ !empty($course) ? $course->name_en : old('name_en') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <label class="input-group-text">Стоимость</label>
                                                        </span>
                                                        <input type="number" name="price" placeholder="Стоимость"
                                                            class="form-control" value="{{ !empty($course) ? $course->price : old('price') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Изображение</h5>
                                                </div>
                                                <div class="card-block">
                                                    <label class="panel panel-flat" for="image" style="width: 100%;height:100%;">
                                                        <img src="{{ !empty($course) ? $course->image : '/img/default-image.jpg' }}" alt="" class="crop-modal img-fluid cropper-hidden" style="max-height: 342px;width:100%;">
                                                    </label>
                                                    <input type="file" name="image" id="image" class="d-none" onchange="readURL(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10" style="display: flex;justify-content: center;">
                                            <button type="submit" class="btn btn-primary m-b-0">Сохранить</button>
                                        </div>
                                    </form>
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
<script src="/admin_vendor/js/modernizr.js"></script>
<script src="/admin_vendor/js/css-scrollbars.js"></script>
<script src="/admin_vendor/js/jquery.mcustomscrollbar.concat.min.js"></script>
<script src="/admin_vendor/js/script.js"></script>
<script src="/admin_vendor/js/switchery.min.js"></script>
<script src="/admin_vendor/js/bootstrap-tagsinput.js"></script>
<script src="/admin_vendor/js/typeahead.bundle.min.js"></script>
<script src="/admin_vendor/js/bootstrap-maxlength.js"></script>
<script src="/admin_vendor/js/swithces.js"></script>
<script src="/admin_vendor/js/moment-with-locales.min.js"></script>
<script src="/admin_vendor/js/bootstrap-datepicker.min.js"></script>
<script src="/admin_vendor/js/bootstrap-datetimepicker.min.js"></script>
<script src="/admin_vendor/js/daterangepicker.js"></script>
<script src="/admin_vendor/js/datedropper.min.js"></script>
<script src="/admin_vendor/js/spectrum.js"></script>
<script src="/admin_vendor/js/jscolor.js"></script>
<script src="/admin_vendor/js/jquery.minicolors.min.js"></script>
<script src="/admin_vendor/js/custom-picker.js"></script>
<script src="/admin_vendor/js/select2.full.min.js"></script>
<script src="/admin_vendor/js/bootstrap-multiselect.js"></script>
<script src="/admin_vendor/js/jquery.multi-select.js"></script>
<script src="/admin_vendor/js/jquery.quicksearch.js"></script>
<script src="/admin_vendor/js/select2-custom.js"></script>
<script src="/admin_vendor/js/inputmask.js"></script>
<script src="/admin_vendor/js/jquery.inputmask.js"></script>
<script src="/admin_vendor/js/autonumeric.js"></script>
<script src="/admin_vendor/js/form-mask.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).siblings().find('img').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush