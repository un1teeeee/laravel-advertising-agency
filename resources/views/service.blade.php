@extends('layouts.app')

@section('title', 'Добавление услуги')

@section('main')

    <section class="welcome__banner container">
        <div class="banner__text">
            <p class="banner__text-service">{{ $service->title }}</p>
        </div>
        <div class="banner__image">
            @if ($service->image)
                <img src="../img/services/{{ $service->image }}" alt="{{ $service->title }}" width="400px">
            @else
                <p>Изображение отсутствует</p>
            @endif
        </div>
    </section>

    <section class="services container">
        <h2 class="section__title">Описание</h2>
        <p class="section__description">{{ $service->description ?? 'Описание отсутствует' }}</p>
    </section>

    @include('../layouts/components/application-form')
@endsection

