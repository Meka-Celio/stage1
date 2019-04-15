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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
    'as'    =>  'index',
    'uses'  =>  'GuestController@index'
]);

Route::get('/admin', [
    'as'    =>  'dashboard',
    'uses'  =>  'Admin\IndexController@index'
]);

Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function(){
	Route::resource('projets', 'ProjetController');
	Route::resource('users', 'UserController');
	Route::resource('rubriques' ,'RubriqueController');
	Route::resource('lignes', 'LigneController')->only(['store','edit','update','destroy']);
	Route::resource('activites', 'ActiviteController');
	Route::resource('depenses', 'DepenseController');
	Route::resource('informations', 'InfoController')->only(['index']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
