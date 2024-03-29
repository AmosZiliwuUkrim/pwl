<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/verify', [AuthController::class, 'verify']);
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'teacher'
], function () {
    Route::get('/', [TeacherController::class, 'list']);
//    Route::get('/{id}',[TeacherController::class,'detail']);
    Route::get('/add', [TeacherController::class, 'add']);
    Route::get('/edit/{id}', [TeacherController::class, 'edit']);

    Route::post('/update', [TeacherController::class, 'update']);
    Route::post('/insert', [TeacherController::class, 'insert']);
    Route::post('/delete', [TeacherController::class, 'delete']);
});

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
    Route::get('/change-password', [TestController::class, 'changePassword']);

    Route::post('/change-password', [TestController::class, 'updatePassword']);
});















//Route::get('/latihan', function () {
//    echo "Hello World";
//});
//
//Route::get('/read/{judul}', [TestController::class, 'read']);
//
//Route::get('/test', [TestController::class, 'index']);
//
//Route::get('/teacher', [TestController::class, 'teacher']);
//
//Route::get('/student', [TestController::class, 'student']);
