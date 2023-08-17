<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home',             'TaskController@home')->name('home');
Route::get('/',             'TaskController@home')->name('home');



Route::middleware("auth2")->group(function(){
  Route::get('/loginOut',             'AuthController@loginOut')->name('loginOut');
  Route::get('/create',             'TaskController@create')->name('create');
  Route::get('/delet/{id}',             'TaskController@delet')->name('delet');
  Route::get('/update/{id}',             'TaskController@update')->name('update');
  Route::post('/create_update',             'TaskController@create_update')->name('create_update');
  Route::get('/task',             'TaskController@readTask')->name('task');
});
Route::middleware("guest")->group(function(){
  Route::get('/login2',           'AuthController@LoginForm')->name('login2');
  Route::get('/register',           'AuthController@RegisterForm')->name('register');
  Route::post('/registration',           'AuthController@registration')->name('registration');
  Route::post('/logination',           'AuthController@logination')->name('logination');
});
