<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('comentario/{idMovie}','ComentarioController@show');
Route::post('comentario','ComentarioController@store');
Route::resource('user','UserController');
Route::get('user/{nombre}/{pass}','UserController@show');
Route::get('usuarios/{iduser}','UserController@obtenerusuario');
Route::get('comentarios','ComentarioController@mostrarComent');