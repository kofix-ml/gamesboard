<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('game', 'GameController', ['only' => ['index', 'show', 'update', 'destroy', 'store']]);
Route::resource('gameagent', 'GameAgentController', ['only' => ['index', 'update', 'destroy', 'store']]);
Route::resource('gameroute', 'GameRouteController', ['only' => ['update', 'store']]);
Route::resource('live', 'GameLiveController', ['only' => ['show']]);
Route::resource('player', 'PlayerController', ['only' => ['update', 'destroy', 'store']]);

Route::resource('publish', 'PublishController', ['only' => ['update']]);
Route::resource('mark', 'MarksController', ['only' => ['update']]);