@extends('profile.layouts.layout')

@section('content')
    <section class="course-buy success">
        <img src="/index/img/main/Artwork.png" alt="" class="bg-result wow animated zoomIn">
        <div class="container">
            <h1 class="title-gradient wow animated zoomIn">Поздравляем !!!</h1>
            <p class="wow animated zoomIn">Вы ответили правильно на {{ $result }} из {{ $lesson->questions->count() }}</p>
            @php
                $next = $lesson->course->lessons()->where('id', '>', $lesson->id)->orderBy('id')->first();
                $max = $lesson->course->lessons()->max('id');
            @endphp
            @if ($lesson->id == $max)
                <a href="/profile" class="btn-plain wow animated zoomIn">Вернуться в профиль</a>
            @else
                <a href="/course/{{ $next->id }}/lessons" class="btn-plain btn-gradient wow animated zoomIn">Следющий урок</a>
            @endif
        </div>
    </section>
@endsection

@push('js')

@endpush
