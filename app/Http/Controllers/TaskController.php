<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Task;
use DB;
use Illuminate\Support\Facades\Storage;
class TaskController extends Controller
{
  public function create()
  {
    return view('create');
  }
  public function readTask()
  {
    $tasks = Task::all();
    return view('readTask',['tasks'=>$tasks]);
  }
  public function create_update(Request $request)
  {
    $request_data = $request->validate([
      "title"=>["required","string"],
      //"description"=>["required"],// В завданні не було вказано що осис це обовязкове поле
      "status"=>'required|integer|between:1,3',
      "request_date"=>'required|date_format:Y-m-d H:i:s'
    ]);
    $request_data['description']=$request['description'];
    //'DateTime'=> 'required|date_format:Y-m-d H:i|after_or_equal:' . date(DATE_ATOM),
    //$request_data['request_date']=str_replace("-","/",$request_data['request_date']);
    if($request['id']==0){
      $new=0;
    }else{
      $new=1;
    }
    if($new==0){
      Task::create([
        'title' => $request_data['title'],
        'description' =>$request_data['description'],
        'status' => $request_data['status'],
        'deadline' => $request_data['request_date']
      ]);
    }
    if($new==1){
      $task = Task::find($request['id']);
      if($task != null){
        $task->update($request_data);
      }else{
        return redirect('task')->withErrors(['no_id' => '1']);
      }

    }

    return redirect('task');
  }
  public function delet($id){
    Task::where('id', $id)->delete();
    return redirect('task');
  }
  public function update($id){
    $task = Task::where('id', $id)->first();
    return view('update',['task'=>$task]);
  }
  public function home()
  {
    $user = \Auth::user();
    if($user){
      return view('home',['user'=>$user['name']]);
    }else{
      return view('home');
    }

  }
}
