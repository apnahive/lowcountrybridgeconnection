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
Route::get('/manager', 'ManagerController@index')->name('manager');
Route::get('/email', 'HomeController@email')->name('sendEmail');
Route::get('/superadmin/login', 'SuperAdminLoginController@showLoginForm')->name('superadmin.login');
Route::post('/superadmin/login', 'SuperAdminLoginController@login')->name('superadmin.login.submit');
Route::get('/superadmin', 'SuperadminController@index')->name('superadmin');
Route::get('/unitadmin/login', 'UnitAdminLoginController@showLoginForm')->name('unitadmin.login');
Route::post('/unitadmin/login', 'UnitAdminLoginController@login')->name('unitadmin.login.submit');
Route::get('/unitadmin', 'UnitadminController@index')->name('unitadmin');
Route::get('/teacher/login', 'TeacherLoginController@showLoginForm')->name('teacher.login');
Route::post('/teacher/login', 'TeacherLoginController@login')->name('teacher.login.submit');
Route::get('/teacher', 'TeacherController@index')->name('teacher');
Route::get('/manager/login', 'ManagerLoginController@showLoginForm')->name('manager.login');
Route::post('/manager/login', 'ManagerLoginController@login')->name('manager.login.submit');
Route::get('/manager', 'ManagerController@index')->name('manager');