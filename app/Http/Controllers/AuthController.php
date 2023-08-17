<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
  public function LoginForm()
  {
    return view('auth.LoginWindow');
  }
  public function RegisterForm()
  {
    return view('auth.RegisterWindow');
  }
  public function registration(Request $request)
  {
    $request_data = $request->validate([
      "username"=>["required","string"],
      "email"=>["required","email","string","unique:users,email"],
      "password"=>["required","confirmed"],
      "confirm-password"=>[]
    ]);
    $user = User::create([
      "name" => $request_data["username"],
      "email" => $request_data["email"],
      "password" => bcrypt($request_data["password"]),
    ]);
    if($user){
      auth("web")->login($user);
    }
    return redirect("home");
  }
  public function loginOut()
  {
    auth('web')->logout();
    return redirect("home");
  }
  public function logination(Request $request){
    $request_data = $request->validate([
      "email"=>["required","email","string"],
      "password"=>["required"]
    ]);
    if(auth("web")->attempt($request_data)){
      return redirect("home");
    }else{
      //return view("login",["error"=>"1"]);
      return redirect('login')->withErrors(['msg' => '1']);
    }
  }
}
