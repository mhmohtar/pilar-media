<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

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
//     return view('employee');
// });

Route::get('/', [EmployeeController::class, 'index']);
Route::get('data_employee', [EmployeeController::class, 'dataEmployee']);
Route::get('delete/{id}', [EmployeeController::class, 'destroy']);
Route::get('edit/{id}', [EmployeeController::class, 'edit']);

Route::post('save_employee', [EmployeeController::class, 'store']);
Route::post('update/{id}', [EmployeeController::class, 'update'])->name('update');

