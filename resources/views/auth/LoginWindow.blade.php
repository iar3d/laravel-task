@extends('layout.main')
@extends('menu')
@section('title')
  Вхід
@endsection

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center pt-1">Авторизація</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('logination'); }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">пошта:</label>
                                @Error('email')
                                  <div class="alert alert-danger" role="alert">Поле не заповнене email, або не співпадає синтаксис, користувач з такою почтою ще ен зареєстрований</div>
                                @enderror
                                @Error('msg')
                                  <div class="alert alert-danger" role="alert">невірна пара логін, пароль</div>
                                @enderror
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль:</label>
                                @Error('password')
                                  <div class="alert alert-danger" role="alert">Поле не заповнене , або невірна пара логін пароль</div>
                                @enderror
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="pt-3">
                                <button type="submit" class="btn btn-primary btn-block w-100">Увійти</button>
                            </div>
                        </form>
                        <button class="btn btn-primary btn-block w-100" onclick="location.href='{{ route('register'); }}';">Реєстрація</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
