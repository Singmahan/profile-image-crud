<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::controller(StudentController::class)->group(function(){
    Route::get('add-student','create');
    Route::post('create-student','store')->name('student.store');
    Route::get('all-students','index');
    Route::get('show-student/{id}','show');
    Route::get('edit-student/{id}','edit');
    Route::post('update-student','update')->name('student.update');
    Route::delete('delete-student/{id}','destroy')->name('student.delete');
});
