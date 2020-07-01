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

// App\User::create([
//     "name" => "estudiante",
//     "email" => "estudiante@gmail.com",
//     "password" => bcrypt('estudiante'),
// ]);

DB::listen(function($query){
 echo "<pre>{{$query->sql}}</pre>";
});


Route::get('/home', function () {
    return view('home');
});



Auth::routes();

Route::resource('usuarios','UsuarioController');
Route::resource('mensajes','MensajeController');