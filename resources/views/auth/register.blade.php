@extends('../layouts/app')

@section('main')
    <div class="form-container container">
        <h2 class="form__title">Регистрация</h2>
        <form action="{{ route('register') }}" method="POST" class="form__auth">
            @csrf
            <div class="form__group">
                <input type="text" class="form__input" id="name" name="name" value="{{ old('name') }}" placeholder="Имя Фамилия" required>
                @error('name')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form__group">
                <input type="email" class="form__input" id="email" name="email" value="{{ old('email') }}" placeholder="Почта" required>
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
                <input type="password" class="form__input" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль" required>
                @error('password_confirmation')
                <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form__group">
                <button type="submit" class="form__btn btn">Зарегистрироваться</button>
            </div>
        </form>
    </div>
@endsection
