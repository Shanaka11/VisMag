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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', 'VisitorsController@index');
// Use a Dashboard Controller in the future for now use the Visitor list as the landing page
//Removed earlier dummy route added the index of the homecontroller as the landing page
Route::get('/', 'HomeController@index')->name('home');

Route::resource('Visitor', 'VisitorsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
