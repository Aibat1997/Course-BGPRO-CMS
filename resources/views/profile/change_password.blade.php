@extends('profile.layouts.layout')

@section('content')
    <section class="login pass-edit">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-6 offset-md-3">
                    <h1>Изменить пароль</h1>
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
                    <form action="profile-password" method="POST">
                        @csrf
                        <label class="label-form">
                            <span>Старый пароль</span>
                            <input type="password" name="old_password" required>
                        </label>
                        <label class="label-form">
                            <span>Новый пароль</span>
                            <input type="password" name="password" required>
                        </label>
                        <label class="label-form">
                            <span>Подтвердите пароль</span>
                            <input type="password" name="confirm_password" required>
                        </label>
                        <div class="btn-box tar">
                            {{-- <button class="btn-plain btn-cancel">Болдырмау</button> --}}
                            <button class="btn-plain btn-black" type="submit">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="/index/js/jquery.datetimepicker.full.min.js"></script>
@endpush
