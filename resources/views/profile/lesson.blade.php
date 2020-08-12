@extends('profile.layouts.layout')

@push('css')
    <style>
        .test-link{
            padding: 25px 0;
            font-size: 22px;
            display: flex;
            justify-content: flex-end;
        }
    </style>
@endpush

@section('content')
<section class="lesson-inside">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8  col-md-11 offset-xl-2 offset-md-1">
                <h1>{{ $lesson->course['name_'.$lang] }}</h1>
                <div class="lesson-theme">
                    <h3>Урок {{ $lesson->sort_num }} <span>/{{ $lesson->course->lessons->count() }}</span></h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="lesson-video-cover">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8  offset-xl-2 ">
                <div class="lesson-video">
                    {!! $lesson['video_'.$lang] !!}
                </div>
                <div class="test-link">
                    @if (!is_null($lesson->questions))
                        <a href="/lesson/{{ $lesson->questions->first()->id }}/test">Пройти тест</a>
                    @endif
                </div>
                {!! $lesson['content_'.$lang] !!}
            </div>
        </div>
    </div>

    @php
        $previous = $lesson->course->lessons()->where('id', '<', $lesson->id)->orderBy('id', 'desc')->first();
        $next = $lesson->course->lessons()->where('id', '>', $lesson->id)->orderBy('id')->first();
    @endphp

    @if (!is_null($previous))
        <a href="/course/{{ $previous->id }}/lessons" class="link-prev">
            <img src="/profile_vendor/img/icon/link-prev.svg" alt="">
        </a>
    @endif
    @if (!is_null($next))
        <a href="/course/{{ $next->id }}/lessons" class="link-next">
            <img src="/profile_vendor/img/icon/link-next.svg" alt="">
        </a>
    @endif
</section>
@endsection
