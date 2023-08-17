@extends('layout.main')
@extends('menu')
@section('title')
Список Завдань
@endsection

@section('content')
<div class="container mt-5">
    <div class="m-3 h1">
      <a href="{{ route('create'); }}"><i class="bi bi-file-earmark-plus"></i></a>
    </div>
    @Error('no_id')
      <div class="alert alert-danger" role="alert">Спроба редактування запису, id якого нема</div>
    @enderror
    @if($tasks->isEmpty())
    <div class="card my-3">
        <div class="card-header">
          <div class="container-fluid d-flex justify-content-center">
            <div class="align-self-center">
              Масив пустий
            </div>
          </div>
        </div>
    </div>
    @endif
    @foreach($tasks as $task)
      <div class="card my-3">
          <div class="card-header">
            <div class="row">
              <div class="col-10">
                Завдання {{ $task->id }}
              </div>
              <div class="col-2">
                <div class="row">
                  <div class="col-6">
                    <a href="{{ action('App\Http\Controllers\TaskController@update', ['id' => $task->id]); }}"><i class="bi bi-pencil-fill mx-1"></i></a>
                  </div>
                  <div class="col-6">
                    <a href="{{ action('App\Http\Controllers\TaskController@delet', ['id' => $task->id]); }}"><i class="bi bi-trash mx-1"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
              <h5 class="card-title">{{ $task->title }}</h5>
              <p class="card-text">Опис завдання: {{ $task->description }}</p>
              <p class="card-text">
                <div class="row">
                  <div class="col-md-1 my-3">
                    Статус:
                  </div>
                  <div class="col-md-3">
                    @if ($task->status == 1)
                    <div class="alert alert-warning" role="alert">Не розпочато</div>
                    @endif
                    @if ($task->status == 2)
                    <div class="alert alert-primary" role="alert">В процесі</div>
                    @endif
                    @if ($task->status == 3)
                    <div class="alert alert-success" role="alert">Завершено</div>
                    @endif
                  </div>
              </div>
              </p>
              <p class="card-text">Дата: {{ $task->deadline }}</p>
          </div>
      </div>
    @endforeach
</div>
@endsection
