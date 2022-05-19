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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/importListExcel', 'HomeController@import')->name('usersImportExcel');
Route::get('/studentList', 'HomeController@studentList');


/*Route::get('/inicio', function () {
    return view('inicio');
});
*/