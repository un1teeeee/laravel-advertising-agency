@extends('layouts.app')

@section('title', 'Заявки')

@section('main')
    <section class="admin-nav container">
        <nav>
            <a href="{{ route('admin.applications') }}">Заявки</a>
            <a href="{{ route('admin.services') }}">Услуги</a>
        </nav>
    </section>

    <section class="application-list container">

            <table class="services-table">
                <thead>
                <tr class="services-table__header">
                    <th class="services-table__cell">Имя</th>
                    <th class="services-table__cell">Телефон</th>
                    <th class="services-table__cell">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($applications as $application)
                    <tr class="services-table__row">
                        <td class="services-table__cell">{{ $application->name }}</td>
                        <td class="services-table__cell">{{ $application->phone }}</td>
                        <td class="services-table__cell">
                            <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="services-table__btn btn" onclick="return confirm('Вы уверены, что хотите удалить заявку?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

    </section>

@endsection

