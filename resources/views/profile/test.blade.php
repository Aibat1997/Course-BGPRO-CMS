@extends('profile.layouts.layout')

@section('content')
    <section class="course-buy lesson-inside">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-2 col-md-10 col-lg-8 col-sm-10">
                    <a href="/course/{{ $question->lesson->id }}/lessons" class="back-link d-flex">
                        Назад
                    </a>
                    <p class="text-purple">Вопросы теста: <span>{{ $question->sort_num }}/{{ $question->lesson->questions->count() }}</span></p>
                    <form action="/answer/{{ $question->id }}" method="POST" class="test">
                        @csrf
                        <h1 class="lesson-title">{{ $question['name_'.$lang] }}</h1>
                        <ul>
                            @foreach($question->answers as $item)
                                <li class="d-flex">
                                    <label class="radio-container">
                                        <input type="radio" name="answer" value="{{ $item->id }}" {{ !is_null($old_answer) && $old_answer->answer_id == $item->id ? 'checked' : ''}}>
                                        <span class="checkmark"></span>
                                    </label>
                                    {{ $item['name_'.$lang] }}
                                </li>
                            @endforeach
                        </ul>

                        @php
                            $previous = $question->lesson->questions()->where('id', '<', $question->id)->orderBy('id', 'desc')->first();
                            $next = $question->lesson->questions()->where('id', '>', $question->id)->orderBy('id')->first();
                            $max = $question->lesson->questions->max('id');
                        @endphp

                        @if (!empty($previous))
                            <a href="/lesson/{{ $previous->id }}/test" class="btn-plain btn-purple">Алдыңғы сұрақ</a>
                        @endif
                        @if (!empty($next))
                            <button type="submit" class="btn-plain btn-purple">Келесі сұрақ</button>
                        @endif
                        @if ($question->id == $max)
                            <button type="submit" class="btn-plain btn-purple">Аяқтау</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
