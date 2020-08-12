@extends('profile.layouts.layout')

@section('content')
<section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8  col-md-11 offset-xl-2 offset-md-1">
                <ul class="profile-nav nav nav-tabs">
                    <li>
                        <a href="#tab-1" data-toggle="tab" class="{{ !request()->has('tab') ? 'active' : '' }}">
                            Профиль
                        </a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="#tab-2" data-toggle="tab" class="{{ request()->has('tab') && request()->tab == 2 ? 'active' : '' }}">--}}
{{--                            История платежей--}}
{{--                        </a>--}}
{{--                    </li>--}}
                </ul>
                <div class="tab-content profile-content">
                    <div class="tab-pane {{ !request()->has('tab') ? 'active' : '' }}" id="tab-1">
                        <div class="avatar">
                            <div class="avatar-img">
                                <img src="{{ auth()->user()->avatar }}" alt="">
                            </div>
                            <div class="avatar-caption">
                                <h4>{{ auth()->user()->name}}</h4>
                                <p>{{ auth()->user()->email}}</p>
                            </div>
                        </div>
                        <h3 class="title-bordered">Уроки</h3>
                        <div class="lesson-cover">
                            @foreach ($courses as $course)

                                @php
                                    $lesson = App\Models\UserLesson::latest()->first();
                                    $next = $course->lessons()->where('id', '>', $lesson->id)->orderBy('id')->first();
                                @endphp

                                <div class="lesson">
                                    <h4>{{ $course['name_'.$lang] }}</h4>
                                    <p>
                                        {{ auth()->user()->coursePassedlessons($course->id)->count() }}<span>/{{ $course->lessons->count() }}</span>
                                    </p>
                                    <a href="/course/{{ is_null($next) ? $lesson->id : $next->id }}/lessons">
                                        Перейти
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <h3 class="title-bordered">Настройки</h3>
                        <ul class="set-links">
                            <li><a href="/profile-edit">Редактировать профиль</a></li>
                            <li><a href="/change-password">Изменить пароль</a></li>
                            <li><a href="{{ route('logout') }}" class="red-colored" id="logout">Выйти</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
{{--                    <div class="tab-pane {{ request()->has('tab') && request()->tab == 2 ? 'active' : '' }}" id="tab-2">--}}
{{--                        <table class="table  table-responsive-stack" id="tableOne">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th scope="col">Номер</th>--}}
{{--                                <th scope="col" class="td-long">Атауы</th>--}}
{{--                                <th scope="col">Сома</th>--}}
{{--                                <th scope="col">Күні</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <th scope="row" data-label="Номер">114121</th>--}}
{{--                                <td data-label="Атауы" class="td-long">Курстың 1 топтамасын сатып алу: <a href="#">От бол!</a></td>--}}
{{--                                <td data-label="Сома">63000.00 ₸</td>--}}
{{--                                <td data-label="Күні">2019-12-07 / 15:34:12</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th scope="row" data-label="Номер">114121</th>--}}
{{--                                <td data-label="Атауы" class="td-long">Курстың 1 топтамасын сатып алу: <a href="#">От бол!</a></td>--}}
{{--                                <td data-label="Сома">63000.00 ₸</td>--}}
{{--                                <td data-label="Күні">2019-12-07 / 15:34:12</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th scope="row" data-label="Номер">114121</th>--}}
{{--                                <td data-label="Атауы" class="td-long">Курстың 1 топтамасын сатып алу: <a href="#">От бол!</a></td>--}}
{{--                                <td data-label="Сома">63000.00 ₸</td>--}}
{{--                                <td data-label="Күні">2019-12-07 / 15:34:12</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script>
        $('#logout').click(function (e) {
            e.preventDefault();
            $('#logout-form').submit();
        })
    </script>
@endpush
