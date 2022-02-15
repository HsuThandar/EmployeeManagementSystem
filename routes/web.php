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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/company', 'CompanyController@index')->name('company');
Route::get('/companyceate', 'CompanyController@create')->name('company.create');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::get('/company/delete/{id}', 'CompanyController@delete')->name('company.delete');
Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.editlist');
Route::post('/company/update/{id}', 'CompanyController@update')->name('company.update');
Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::get('/employeeceate', 'EmployeeController@create')->name('employee.create');
Route::post('/employee/store', 'EmployeeController@store')->name('employee.store');
Route::get('/employee/delete/{id}', 'EmployeeController@delete')->name('employee.delete');
Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employee.editlist');
Route::post('/employee/update/{id}', 'EmployeeController@update')->name('employee.update');
