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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/superadmin', 'SuperadminController@index')->name('superadmin');
Route::get('/unitadmin', 'UnitadminController@index')->name('unitadmin');
Route::get('/teacher', 'TeacherController@index')->name('teacher');
Route::get('/manager', 'ManagerController@index')->name('manager');
Route::get('/email', 'HomeController@email')->name('sendEmail');

