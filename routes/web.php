<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::group([
    'prefix' => 'users',
    'namespace' => 'App\Http\Controllers\API'
], function(){

    Route::group([
        'as' => 'user-',
    ], function(){
        Route::get('/list','UserController@index')->name('index');
        Route::get('/create','UserController@create')->name('create');
        Route::get('/store','UserController@store')->name('store');
        Route::get('/edit/{id}','UserController@show')->name('edit');
        Route::get('/update/{id}','UserController@update')->name('update');
        Route::get('/delete/{id}','UserController@destroy')->name('destroy');
    });

});

Route::group([
    'prefix' => 'houses',
    'namespace' => 'App\Http\Controllers\API'
], function(){

    Route::group([
        'as' => 'house-',
    ], function(){
        Route::get('/list','HouseController@index')->name('index');
        Route::get('/create','HouseController@create')->name('create');
        Route::post('/store','HouseController@store')->name('store');
        Route::get('/edit/{id}','HouseController@edit')->name('edit');
        Route::post('/update/{id}','HouseController@update')->name('update');
        Route::get('/delete/{id}','HouseController@destroy')->name('destroy');
    });

});

Route::get('/todos', function () {

    $url = 'https://jsonplaceholder.typicode.com/todos';
    
    $response = Http::get($url);

    dd($response->json());
});

