<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="{{Request::is('/') ? 'active menu__item--current' : ''}} menu__item "><a class="menu__link" href="{{route('home')}}">Главная </a></li>
                            <li class=" menu__item"><a class="menu__link" href="about.html">About</a></li>
                            <li class="menu__item">
                                <a href="#" class=" menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Men's wear </a>
                            </li>

                            @guest
                                <li class="{{Request::is('login') ? 'active menu__item--current' : ''}} menu__item ">
                                    <a class="menu__link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                </li>
                                <li class="{{Request::is('register') ? 'active menu__item--current' : ''}} menu__item ">
                                    @if (Route::has('register'))
                                        <a class="menu__link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                    @endif
                                </li>
                                @else
                                    <li class="menu__item">
                                        <a class="menu__link" href="{{ route('my_review') }}">{{ __('Мои отзывы') }}</a>
                                    </li>
                                    <li class=" menu__item ">
                                        <a class="menu__link" href="{{ route('logout') }}">
                                            {{ __('Выход') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    @endguest

                            <li class=" menu__item"><a class="menu__link" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="clearfix"></div>
    </div>
</div>