@extends('layout.main')
@extends('menu')
@section('title')
Реєстрація
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Реєстрація</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('registration'); }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Логін:</label>
                            @Error('username')
                              <div class="alert alert-danger" role="alert">Поле не заповнене Логін</div>
                            @enderror
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">пошта:</label>
                            @Error('email')
                              <div class="alert alert-danger" role="alert">Поле не заповнене email, або не співпадає синтаксис, користувач вже зареєстрований</div>
                            @enderror
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            @Error('password')
                              <div class="alert alert-danger" role="alert">Поле не заповнене Пароль, або не співпадає синтаксис</div>
                            @enderror
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Підтвердити пароль:</label>
                            @Error('password')
                              <div class="alert alert-danger" role="alert">Поле не заповнене Повторити Пароль, або не однакове з Паролем</div>
                            @enderror
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="pt-3">
                            <button type="submit" class="btn btn-primary btn-block w-100">Зареєструватися</button>
                        </div>
                    </form>
                    <a href="{{ route('login2'); }}"><button class="btn btn-primary btn-block w-100">Вхід</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
