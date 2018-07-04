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
    return redirect('login');
});

Route::get('home', 'HomeController@index')->middleware('auth');

Auth::routes();

Route::resource('owners', 'OwnerController')->middleware('auth');
Route::resource('vets', 'VetController')->middleware('auth');

Route::resource('patients', 'PatientController')->middleware('auth');
Route::get('patients/create/owner/{owner}', 'PatientController@create')->name('patient.controller.with.owner');
