@extends('layouts.app')

@section('title', 'Главная')

@section('main')
    <section class="welcome__banner container">
        <div class="banner__text">
            <p class="banner__text-logo">360°</p>
            <p class="banner__text-info"><strong>Рекламное агентство</strong></p>
            <p class="banner__text-info2">Ваш надежный партнер для успешного бизнеса!</p>
        </div>
        <div class="banner__image">
            <img src="../img/main/3D-360-marketing.png" alt="">
        </div>
    </section>

    <section class="marketing__cycl container">
        <h2 class="section__title">Маркетинговое агентство полного цикла</h2>
        <div class="marketing__cycl-list">
            <div class="cycle-card">
                <div class="cycle__image">
                    <img src="../img/main/ATL.svg" alt="">
                </div>
                <div class="cycle__title">
                    ATL-реклама
                </div>
            </div>
            <div class="cycle-card">
                <div class="cycle__image">
                    <img src="../img/main/btl.svg" alt="">
                </div>
                <div class="cycle__title">
                    BTL-реклама
                </div>
            </div>
            <div class="cycle-card">
                <div class="cycle__image">
                    <img src="../img/main/digital.svg" alt="">
                </div>
                <div class="cycle__title">
                    Digital-Marketing
                </div>
            </div>
            <div class="cycle-card">
                <div class="cycle__image">
                    <img src="../img/main/flesh.svg" alt="">
                </div>
                <div class="cycle__title">
                    Сувенирная продукция
                </div>
            </div>
        </div>
    </section>

    <section class="services container">
        <h2 class="section__title">Услуги рекламного агенства</h2>
        <ul class="services-list">
            @foreach($services as $service)
                <li class="services-list__item">
                    <a href="{{ route('service.index', $service->id) }}" class="services-list__link">
                        <div class="services-list__icon">
                            <img src="../img/main/check.svg" alt="Иконка">
                        </div>
                        <span class="services-list__title">
                        {{ $service->title }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="about container">
        <h2 class="section__title">О компании</h2>
        <p class="about-info">Рекламное агентство полного цикла "360°"
            предоставляет широкий спектр услуг по разработке и
            проведению рекламных кампаний. Мы специализируемся
            на создании эффективных рекламных стратегий, дизайне
            и разработке рекламных материалов, медийном планировании
            и закупке рекламного пространства, а также на интернет-маркетинге
            и продвижении в социальных сетях.</p>
    </section>

    <section class="map container">
        <div class="map__image1">
            <img src="../img/main/map.svg" alt="">
        </div>
        <div class="map__text">
            Работаем по всем городам России
        </div>
        <div class="map__image1">
            <img src="../img/main/icon-map.svg" alt="">
        </div>
    </section>

    @include('../layouts/components/application-form')
@endsection
