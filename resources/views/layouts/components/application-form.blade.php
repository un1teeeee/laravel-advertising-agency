<section class="advantages container">
    <h2 class="section__title">Преимущества работы с нами</h2>
    <div class="advantages-list">
        <div class="advantages-card">
            <div class="advantages-card__image">
                <img src="../img/services/service/1.png" alt="">
            </div>
            <div class="advantages-card__title">
                Широкий охват
            </div>
            <div class="advantages-card__info">
                Широкий региональный охват, работаем по всей России
            </div>
        </div>
        <div class="advantages-card">
            <div class="advantages-card__image">
                <img src="../img/services/service/2.png" alt="">
            </div>
            <div class="advantages-card__title">
                Комплексный подход
            </div>
            <div class="advantages-card__info">
                Комплексный подход от идеи до качественной реализации
            </div>
        </div>
        <div class="advantages-card">
            <div class="advantages-card__image">
                <img src="../img/services/service/3.png" alt="">
            </div>
            <div class="advantages-card__title">
                Опытный персонал
            </div>
            <div class="advantages-card__info">
                Проверенный временем персонал, мотивированный на результат
            </div>
        </div>
        <div class="advantages-card">
            <div class="advantages-card__image">
                <img src="../img/services/service/4.png" alt="">
            </div>
            <div class="advantages-card__title">
                Довольные клиенты
            </div>
            <div class="advantages-card__info">
                Лучший клиентский сервис
            </div>
        </div>
    </div>
</section>

<section class="application container">
    <div class="application__image">
        <img src="../img/main/tel.png" alt="">
        <a href="tel:79999999999" class="nav__item-btn link">
            + 7 999 999 99 99
        </a>
    </div>

    <form action="{{ route('application.store') }}" method="POST" class="application__form">
        @csrf
        <h2 class="section__title">Получите консультацию</h2>
        <div class="form__group">
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form__input" placeholder="Имя">
            @error('name')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form__group">
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form__input" placeholder="Номер">
            @error('phone')
            <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="application__btn btn">Отправить</button>
        </div>
    </form>
</section>
