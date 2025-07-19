@extends('../layouts/app')

@section('main')
    <div class="form-container container">
        @if (session('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <h2 class="form__title">Вход в админ панель</h2>
        <form action="{{ route('login') }}" method="POST" class="form__auth">
            @csrf
            <div class="form__group">
                <input type="email" class="form__input" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form__group">
                <input type="password" class="form__input" id="password" name="password" placeholder="Пароль" required>
                @error('password')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form__group">
                <button type="submit" class="form__btn btn">Войти</button>
            </div>
        </form>
    </div>
@endsection
