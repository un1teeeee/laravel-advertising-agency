<header>
    <div class="header-container container">
        <div class="header__logo">
            <a href="/" class="header__logo-link link">360°</a>
        </div>
        <nav class="header__menu">
            <div class="nav__item-wrapper">
                <a href="#" class="nav__item link">Услуги</a>
                <div class="services-dropdown">
                    <ul class="services-list">
                        @if ($services->isEmpty())
                            <li class="services-list__item">Услуги отсутствуют</li>
                        @endif
                        @foreach ($services as $service)
                            <li class="services-list__item">
                                <a href="{{ route('service.index', $service->id) }}" class="services-list__link link">
                                    {{ $service->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a href="{{ route('about') }}" class="nav__item link">О компании</a>
            <a href="{{ route('contact') }}" class="nav__item link">Контакты</a>
            <a href="#" class="nav__item-btn link" id="callback-btn">Обратный звонок</a>
            @if(Auth::check())
                <a href="{{ route('admin.services') }}" class="nav__item link">Админ</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="services-table__btn btn" onclick="return confirm('Вы уверены?')">Выйти</button>
                </form>
            @endif
        </nav>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="modal-close">&times;</span>
            <h2 class="modal__title">Получите консультацию</h2>
            <form action="{{ route('application.store') }}" method="POST" class="modal__form">
                @csrf
                <div class="form__group">
                    <input type="text" id="modal-name" name="name" value="{{ old('name') }}" class="form__input" placeholder="Имя">
                    @error('name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form__group">
                    <input type="text" id="modal-phone" name="phone" value="{{ old('phone') }}" class="form__input" placeholder="Номер телефона">
                    @error('phone')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="form__btn btn">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</header>
