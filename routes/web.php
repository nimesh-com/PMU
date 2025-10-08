<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\backend\HomeController as BackendHomeController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\RoleManageController as RoleController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/activity/create', [ActivityController::class, 'create'])->name('activity.create');

Route::post('/activity', [ActivityController::class, 'store'])->name('activity.store');

Route::get('/dashboard', [BackendHomeController::class, 'index'])->name('dashboard');

Route::get('/userlist', [UserController::class, 'index'])->name('userlist');

Route::get('/user/{id}/edit', [UserController::class, 'userEdit'])->name('userEdit');

Route::put('/user/{id}', [UserController::class, 'userUpdate'])->name('userUpdate');

Route::delete('/user/{id}', [UserController::class, 'userDelete'])->name('userDelete');

Route::get('/rolelist', [RoleController::class, 'index'])->name('rolelist');

Route::get('/activity/report', [ActivityController::class, 'report'])->name('activity.report');
