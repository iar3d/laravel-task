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
           <input type="hidden" name="id" id="id" value="{{ $task->id }}">
           <div class="form-group">
               <label for="title">Заголовок завдання:</label>
               @Error('title')
                <div class="alert alert-danger" role="alert">Заголовок це  обовязкове поле для введення</div>
               @enderror
               <input type="text" class="form-control" id="title" name="title" placeholder="Введіть заголовок завдання" value="{{ $task->title }}">

           </div>
           <div class="form-group">
               <label for="description">Опис завдання:</label>
               <textarea class="form-control" id="description" name="description" rows="3" placeholder="Введіть опис завдання">{{ $task->description}}</textarea>
           </div>
           <div class="form-group">
               <label for="status">Статус:</label>
               @Error('status')
                <div class="alert alert-danger" role="alert">Підробляти дані не можна</div>
               @enderror
               <select class="form-control" id="status" name="status" >
                   <option value="1"
                   @if ($task->status == 1)
                   selected
                   @endif
                   >Не розпочато</option>
                   <option value="2"
                   @if ($task->status == 2)
                   selected
                   @endif
                   >В процесі</option>
                   <option value="3"
                   @if ($task->status == 3)
                   selected
                   @endif
                   >Завершено</option>
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
           <input type="hidden" class="form-control" id="request_date" name="request_date" value="{{ $task->deadline }}">
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
     function time_recogn(){//функція роділяє поле datetime на два поля дати і часу
       var str='{{ $task->deadline }}';
       var data_time = str.split(' ');
       $("#date").val(data_time[0]);
       $("#time").val(data_time[1]);
     }
     time_recogn();
   </script>
@endsection
