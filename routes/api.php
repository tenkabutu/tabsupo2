<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::domain('ict-ss.com')->group(function(){
//    Route::redirect('/api/{any}','/quick-laravel/public/api/{any}');
//});

Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/devices', 'ipadController@list')->name('device.list');
Route::get('/devices/{id}', 'ipadController@show')->name('device.show');
Route::get('/tasks', 'taskController@list')->name('task.list');
Route::get('/tasks/{id}', 'ipadController@show')->name('task.show');
Route::get('/school', 'SchoolController@list')->name('school.list');
Route::get('/school/{id}', 'SchoolController@show')->name('school.show');
Route::get('/teacher', 'TeacherController@list')->name('teacher.list');
Route::get('/devicesSuggest1', 'ipadController@suggest1')->name('device.suggest1');
Route::get('/devicesSuggest2', 'ipadController@suggest2')->name('device.suggest2');


Route::get('/user', fn() => Auth::user())->name('user');
/* Route::post('/login', 'AuthController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/me', 'AuthController@me');
    Route::post('/logout', 'AuthController@logout');
}); */

/* Route::get('/tasks', 'TaskController@index');
Route::post('/tasks', 'TaskController@store');
Route::get('/tasks/{task}', 'TaskController@show');
Route::put('/tasks/{task}', 'TaskController@update');
Route::delete('/tasks/{task}', 'TaskController@destroy'); */