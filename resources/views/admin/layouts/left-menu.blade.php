@php
$courses = App\Models\Course::all();
@endphp


<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu active pcoded-trigger">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-book"></i>
                        </span>
                        <span class="pcoded-mtext">Курсы</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ request()->path() == 'admin/courses/create' ? 'active' : '' }}">
                            <a href="/admin/courses/create" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Добавить курс</span>
                            </a>
                        </li>
                        <li class="{{ request()->path() == 'admin/courses' ? 'active' : '' }}">
                            <a href="/admin/courses" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Все курсы</span> 
                            </a>
                        </li>
                        @foreach ($courses as $course)
                        <li class="pcoded-hasmenu {{ preg_match("[lessons|questions|answers|courses]", request()->path()) === 1 ? 'active pcoded-trigger' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{ $course->name_ru }}
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="{{ request()->path() == 'admin/'.$course->id.'/lessons/create' ? 'active' : '' }}">
                                    <a href="/admin/{{ $course->id }}/lessons/create" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Добавить урок</span>
                                    </a>
                                </li>
                                <li class="{{ request()->path() == 'admin/courses/'.$course->id.'/edit' ? 'active' : '' }}">
                                    <a href="/admin/courses/{{ $course->id }}/edit" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Редактировать</span> 
                                    </a>
                                </li>
                                <li class="{{ request()->path() == 'admin/'.$course->id.'/lessons' ? 'active' : '' }}">
                                    <a href="/admin/{{ $course->id }}/lessons" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Все уроки</span> 
                                    </a>
                                </li>
                                @foreach ($course->lessons as $lesson)
                                <li class="{{ request()->path() == 'admin/'.$lesson->id.'/questions' ? 'active' : '' }}">
                                    <a href="/admin/{{ $lesson->id }}/questions" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">{{ $lesson->name_ru }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{ request()->path() == 'admin/users' ? 'active' : '' }}">
                    <a href="/admin/users" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-users"></i>
                        </span>
                        <span class="pcoded-mtext">Пользователи</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>