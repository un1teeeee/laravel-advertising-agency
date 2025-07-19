@extends('layouts.app')

@section('title', 'Добавление услуги')

@section('main')
    <section class="welcome__banner container">
        <div class="banner__text">
            <p class="banner__text-service">Контакты</p>
        </div>
        <div class="banner__image">
                <img src="../img/main/contact.png" alt="" width="300px">
        </div>
    </section>

    <div class="contact-block container">
        <div class="contact-info">
            <h2 class="contact-title">МОСКВА</h2>
            <p class="contact-address">
                <span class="icon-location"></span> 107140, Москва, ул. Дубнинская 26, 4 этаж
            </p>
            <p class="contact-time">
                <span class="icon-clock"></span> Пн-Пт с 08:00 до 23:00
            </p>
            <p class="contact-phone">
                <span class="icon-phone"></span> <a href="tel:+79999999999">+7 (999) 999-99-99</a>
            </p>
            <p class="contact-email">
                <span class="icon-email"></span> <a href="mailto:360marketing@mail.ru">360marketing@mail.ru</a>
            </p>
        </div>
        <div class="contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2243.925135614947!2d37.71661421569356!3d55.78162378049535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a5f4a3b5f7f%3A0x2e1e9a8e4b8d4e4c!2z0J_RgNC-0YHQutCy0LAsIDEzLCDQodCy0LXRgNGB0LjRgtC-0LLRgdC60LDRjyDQvtCx0LsuLCAxMDcxNDAsINCe0LTQu9C-0Lwg0KDQvtGB0YLQstGD0YHRgtCy0YHQutC40Y8!5e0!3m2!1sru!2sru!4v1623456789!5m2!1sru!2sru"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
@endsection

