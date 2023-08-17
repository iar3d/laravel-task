@extends('layout.main')
@extends('menu')
@section('title')
  Головна
@endsection

@section('content')
<div class="container-fluid d-flex justify-content-center" style="height: 100vh;">
  <div class="align-self-center col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center pt-1">Система керування завданнями</h4>
        </div>
        <div class="card-body">
            @guest('web')
              <div class="alert alert-primary" role="alert">Тільки зареєстрований користувач може редагувати завдання</div>
              <button type="submit" class="btn btn-primary btn-block w-100" onclick="location.href='{{ route('login2'); }}';">Увійти</button>
            @endguest
            @auth('web')
              <div class="alert alert-success" role="alert">Доброго дня {{ $user }}</div>
              <button type="submit" class="btn btn-primary btn-block w-100" onclick="location.href='{{ route('task'); }}';">Керування завданнями</button>
            @endauth
        </div>
    </div>
  </div>
</div>


@endsection
