<?php
use App\Http\Middleware\LogMiddleware;
use App\Http\Middleware\HogeMiddleware;
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

//Route::get('/', 'MainController@index');
Route::get('/{any?}', fn() => view('index'))->where('any', '.+');

// Route::resource('save', 'SaveController');

// フォールバックルート
// Route::fallback(function () {
//     return view('route.error');
// });



