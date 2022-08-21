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

Route::get('/', function () {
    return view('welcome');
});

/**
 * PARA URL BECAS
 */
Route::post('/api/login', [
    'middleware' => ['PermisoApp', 'Cors'],
    'uses' => 'MyUsersController@login'
]);

/**
 * PARA MENSAJES
 */
Route::get('/api/unread/{username}',[
    'middleware' => ['PermisoApp', 'Cors'],
    'uses' => 'MessageController@unread'
]);

Route::get('/api/detailmessage/{id}',[
    'middleware' => ['PermisoApp', 'Cors'],
    'uses' => 'MessageController@detail'
]);

// Route::get('/api/parentdata/{cedula}',[
//     'middleware' => ['Cors'],
//     'uses' => 'BecasController@parentdata'
// ]);