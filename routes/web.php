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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//User
Route::get('user/select2', 'Select2\UserSelect2Controller@index');
Route::get('user/datatables','Datatables\UserDatatablesController@index');
Route::resource('user','UserController');

//Role
Route::get('role/datatables','Datatables\RoleDatatablesController@index');
Route::post('role/synchronize-permission','RoleController@synchronizePermission');
Route::resource('role', 'RoleController');

//Vehicle Type
Route::get('vehicle-type/datatables','Datatables\VehicleTypeDatatablesController@index');
Route::resource('vehicle-type', 'VehicleTypeController');
