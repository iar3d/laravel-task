@extends('layout.main')
@extends('menu')
@section('title')
  Створити
@endsection

@section('content')
<div class="container mt-5">
       <button  class="btn btn-primary" onclick="location.href='{{ route("task"); }}';">Назад</button>
       <form action="{{ route('create_update'); }}" method="POST">
           @csrf
           <input type="hidden" name="id" id="id">
           <div class="form-group">
               <label for="title">Заголовок завдання:</label>
               @Error('title')
                <div class="alert alert-danger" role="alert">Заголовок це  обовязкове поле для введення</div>
               @enderror
               <input type="text" class="form-control" id="title" name="title" placeholder="Введіть заголовок завдання">

           </div>
           <div class="form-group">
               <label for="description">Опис завдання:</label>
               <textarea class="form-control" id="description" name="description" rows="3" placeholder="Введіть опис завдання"></textarea>
           </div>
           <div class="form-group">
               <label for="status">Статус:</label>
               <select class="form-control" id="status" name="status" >
                   <option value="1">Не розпочато</option>
                   <option value="2">В процесі</option>
                   <option value="3">Завершено</option>
               </select>

           </div>
           @Error('request_date')
            <div class="alert alert-danger" role="alert">Дата не вірна</div>
           @enderror
           <div class="form-group">
               <label for="date">Дата:</label>
               <input type="date" class="form-control" id="date" name="date">
           </div>
           <div class="form-group">
               <label for="time">Час:</label>
               <input type="time" class="form-control" id="time" name="time">
           </div>
           <input type="hidden" class="form-control" id="request_date" name="request_date">
           <div class="mt-3">
           <button type="submit" class="btn btn-primary">Зберегти</button>
         </div>
       </form>
   </div>
   <script>
     $("#time").on("change", function() {//обєднує дату і час разом коли користувач водить ці дані
      $("#request_date").val($("#date").val()+' '+$("#time").val()+':00');
     });
     $("#date").on("change", function() {//обєднує дату і час разом коли користувач водить ці дані
       $("#request_date").val($("#date").val()+' '+$("#time").val()+':00');
     });
   </script>
@endsection
