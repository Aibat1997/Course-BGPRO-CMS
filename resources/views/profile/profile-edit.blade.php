@extends('profile.layouts.layout')

@section('content')
<section class="login profile-edit">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-11 offset-lg-1">
                <h1 class="title-bordered">Редактировать профиль</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$errors->first()}}</li>
                        </ul>
                    </div>
                @endif
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                <form action="/update-profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="avatar">
                        <div class="avatar-img">
                            <img src="{{ auth()->user()->avatar }}" id="avatar" alt="">
                        </div>
                        <div class="avatar-caption">
                            <label class="file-label">
                                <span>Изменить аватар профиля</span>
                                <input type="file" name="avatar" onchange="readURL(this)">
                            </label>
                            <br>
                        </div>
                    </div>
                    <div class="form-half">
                        <label class="label-form">
                            <span>ФИО</span>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" required>
                        </label>
                        <label class="label-form">
                            <span>E-mail</span>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" required>
                        </label>
                    </div>
                    <div class="btn-box tar">
                        <button class="btn-plain btn-black" type="submit">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#avatar').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
