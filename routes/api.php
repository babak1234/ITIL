<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Department Routes
|--------------------------------------------------------------------------
|
|
*/
Route::prefix('department')->group(function () {
	Route::get('/', 'Department\DepartmentController@index')
		->name('department.index')
		;
	Route::get('/{departmentId}', 'Department\DepartmentController@show')
		->where('departmentId', '[0-9]+')
		->name('department.show')
	;
	Route::post('/', 'Department\DepartmentController@store')
		->name('department.store')
	;
	Route::put('/{departmentId}', 'Department\DepartmentController@update')
		->where('departmentId', '[0-9]+')
		->name('department.update')
	;
	Route::delete('/{departmentId}', 'Department\DepartmentController@destroy')
		->where('departmentId', '[0-9]+')
		->name('department.destroy')
	;
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
|
*/
Route::prefix('user')->group(function () {
//	Route::get('/', 'Departments\DepartmentController@index')
//		->name('department.index')
//		;
//	Route::get('/{departmentId}', 'Departments\DepartmentController@show')
//		->where('departmentId', '[0-9]+')
//		->name('department.show')
//	;
	Route::post('/', 'User\UserController@store')
		->name('user.store')
	;
//	Route::put('/{departmentId}', 'Departments\DepartmentController@update')
//		->where('departmentId', '[0-9]+')
//		->name('department.update')
//	;
//	Route::delete('/{departmentId}', 'Departments\DepartmentController@destroy')
//		->where('departmentId', '[0-9]+')
//		->name('department.destroy')
//	;
});