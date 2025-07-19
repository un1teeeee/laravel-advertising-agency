@extends('layouts.app')

@section('title', 'Добавление услуги')

@section('main')
    <section class="admin-nav container">
        <nav>
            <a href="{{ route('admin.applications') }}">Заявки</a>
            <a href="{{ route('admin.services') }}">Услуги</a>
        </nav>
    </section>

    <section class="services-container container">

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="service-add">
            @csrf

            <div class="form__group">
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form__input" placeholder="Название">
                @error('title')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form__group">
                <label for="image">Изображение:</label>
                <input type="file" id="image" name="image">
                @error('image')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form__group">
                <textarea id="description" name="description" rows="5" class="form__description" placeholder="Описание">{{ old('description') }}</textarea>
                @error('description')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="form__btn btn">Добавить услугу</button>
            </div>
        </form>
        <div class="services-list__admin">
            <table class="services-table">
                <thead>
                <tr class="services-table__header">
                    <th class="services-table__cell">Название</th>
                    <th class="services-table__cell">Изображение</th>
                    <th class="services-table__cell">Описание</th>
                    <th class="services-table__cell">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr class="services-table__row">
                        <td class="services-table__cell">{{ $service->title }}</td>
                        <td class="services-table__cell">
                            @if ($service->image)
                                <img src="{{ asset('img/services/' . $service->image) }}" alt="{{ $service->title }}" class="services-table__image">
                            @else
                                <span>Нет изображения</span>
                            @endif
                        </td>
                        <td class="services-table__cell">{{ $service->description ?? 'Нет описания' }}</td>
                        <td class="services-table__cell">
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="services-table__btn btn" onclick="return confirm('Вы уверены?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
