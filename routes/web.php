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

Auth::routes();

Route::get('/', 'HomeController@index')
    ->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::group(['prefix' => 'pessoa'], function () {
        Route::get('/', 'PessoaController@index');
        Route::get('/novo', 'PessoaController@create');
        Route::post('/', 'PessoaController@store');
        Route::get('/editar/{id}', 'PessoaController@edit');
        Route::put('{id}', 'PessoaController@update');
        Route::delete('{id}', 'PessoaController@destroy');
    });

    Route::group(['prefix' => 'agendamento'], function () {
        Route::get('/', 'AgendamentoController@index');
        Route::get('/novo', 'AgendamentoController@create');
        Route::post('/', 'AgendamentoController@store');
        Route::get('/editar/{id}', 'AgendamentoController@edit');
        Route::put('{id}', 'AgendamentoController@update');
        Route::delete('{id}', 'AgendamentoController@destroy');
    });
});
