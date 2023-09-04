<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/logout', function () {
    Auth::logout();
});

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('landing');
    });
    
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::get('/register',[RegisterController::class,'index']);
    
    Route::post('/login/process',[LoginController::class,'login']);
    Route::post('/register/process',[RegisterController::class,'register']);
    
    Route::get('/pengaduan',[HomeController::class,'pengaduan']);
    Route::get('/cek-status',[HomeController::class,'status']);
    
    Route::post('/pengaduan/store',[HomeController::class,'storePengaduan']);
    Route::post('/cek-status',[HomeController::class,'cekStatus'])->name('status');
});

Route::middleware('auth')->group(function () {
});
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/dashboard/report',[DashboardController::class,'report']);
Route::get('/dashboard/report/{id}',[DashboardController::class,'reportDetail']);
Route::post('/dashboard/report/edit',[DashboardController::class,'reportEdit']);
Route::get('/dashboard/activity-log',[DashboardController::class,'log']);
Route::get('/dashboard/report/tracker/{$id}',[DashboardController::class,'reportTracker']);