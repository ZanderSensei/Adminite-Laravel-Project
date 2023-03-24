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

// Class
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/admin/add/class',[App\Http\Controllers\ClasController::class, 'store'])->name('addClass');
Route::post('/admin/update/class',[App\Http\Controllers\ClasController::class, 'update'])->name('updateClass');
Route::post('/admin/delete/class',[App\Http\Controllers\ClasController::class, 'delete'])->name('deleteClass');

//Profile
Route::get('/home/profile', [App\Http\Controllers\HomeController::class, 'viewProfile'])->name('viewProfile');

// Student
Route::get('/home/student', [App\Http\Controllers\HomeController::class, 'viewStudent'])->name('viewStudent');
Route::post('/admin/add/student',[App\Http\Controllers\StudentController::class, 'store'])->name('addStudent');
Route::post('/admin/delete/student',[App\Http\Controllers\StudentController::class, 'delete'])->name('deleteStudent');
Route::post('/admin/update/student',[App\Http\Controllers\StudentController::class, 'update'])->name('updateStudent');

