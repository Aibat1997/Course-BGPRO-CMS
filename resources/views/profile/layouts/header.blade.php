<header class="header-white">
    <div class="header-nav">
        <a href="#main" class="logo">
            {{-- <img src="/profile_vendor/img/logo/logo-black.svg" alt="logo"> --}}
        </a>
        <div class="menu-xs">
            <div class="menu-xs-head">
                <button class="btn-plain close-menu"><img src="/profile_vendor/img/icon/x-black.svg" alt=""></button>
            </div>
            <ul class="menu">
                <li class="{{ request()->path() == 'profile' ? 'active' : '' }}"><a href="/profile">Личный кабинет<i class="icon arr-down"></i></a></li>
                <li class="{{ request()->path() == 'user-courses' ? 'active' : '' }}"><a href="/user-courses">Мой курсы<i class="icon arr-down"></i></a></li>
            </ul>
        </div>
    </div>
    <button class="btn-plain call-menu"><img src="/profile_vendor/img/icon/burger-black.svg" alt=""></button>
</header>
