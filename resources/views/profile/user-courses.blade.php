@extends('profile.layouts.layout')

@section('content')
<section class="login lesson-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8  col-md-11 offset-xl-2 offset-md-1">
                <ul class="profile-nav nav nav-tabs">
                    <li>
                        <a href="#tab-1" data-toggle="tab" class="{{ !request()->has('tab') ? 'active' : '' }}">
                            Доступные мне
                        </a>
                    </li>
                    <li>
                        <a href="#tab-2" data-toggle="tab" class="{{ request()->has('tab') && request()->tab == 2 ? 'active' : '' }}">
                            Все курсы
                        </a>
                    </li>
                </ul>
                <div class="tab-content profile-content">
                    <div class="tab-pane {{ !request()->has('tab') ? 'active' : '' }}" id="tab-1">
                        <div class="col-xl-8  col-md-11 offset-xl-2 offset-md-1">
                            <div class="faq">
                                @foreach ($courses as $course)
                                <div class="item">
                                    <div class="ask"><h3>{{ $course['name_'.$lang] }}</h3> <i class="icon i-faq"></i></div>
                                    <div class="answer">
                                       <ul>
                                           @foreach ($course->lessons as $item)
                                                <li class="{{ is_null(auth()->user()->lesson($item->id)) ? 'will-pass' : auth()->user()->lesson($item->id)->status->class }}"><a href="course/{{ $item->id }}/lessons">{{ $item['name_'.$lang] }}</a></li>
                                           @endforeach
                                       </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane {{ request()->has('tab') && request()->tab == 2 ? 'active' : '' }}" id="tab-2">
                        @foreach ($courses as $item)
                        <a href="#">
                            <div class="lessonItem">
                                <div class="lessonItem-head">
                                    <h3>{{ $item['name_'.$lang] }}</h3>
                                    <h3>{{ number_format($item->price, 0, ".", " ") }} ₸!</h3>
                                </div>
                                <div class="lessonItem-base">
                                    <i class="icon i-playlist"></i>
                                    <span>{{ $item->lessons->count() }} урок(ов) </span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script type="text/javascript">
    $('.faq .ask').on('click', function () {
        var answer = $(this).next();
        $('.faq .answer').not(answer).slideUp(400);
        answer.slideToggle(400);
        $(this).find('.i-faq').toggleClass('i-faq-current');
    });
</script>
@endpush
