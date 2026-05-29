<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/signup', [AuthController::class,'showRegister']);

Route::post('/signup', [AuthController::class,'signup']);

Route::get('/login', [AuthController::class,'showLogin'])->name('login');

Route::post('/login', [AuthController::class,'login']);

Route::get('/users', [UserController::class,'showDashboard'])->name('dashboard');

Route::post('/addUser', [UserController::class,'addUser']);

Route::get('/logout', [AuthController::class,'logout']);

Route::post('/editUser/{id}', [UserController::class,'editUser']);

Route::get('/deleteUser/{id}', [UserController::class,'deleteUser']);

Route::get('/profile', [ProfileController::class,'showProfile']);

Route::get('/menu', [MenuController::class,'showMenu']);

Route::get('/manageMenu', [MenuController::class,'showmanageMenu']);

Route::post('/addMenu', [MenuController::class,'addMenu']);

Route::post('/editMenu/{id}', [MenuController::class,'editMenu']);

Route::post('/deleteMenu', [MenuController::class,'deleteMenu']);

Route::get('/selectAll', [MenuController::class,'showMenu']);

Route::get('/selectFoods', [MenuController::class,'showMenuFoods']);

Route::get('/selectDrinks', [MenuController::class,'showMenuDrinks']);

Route::get('/home', [MenuController::class,'showDashboard']);

Route::post('/editPicture', [ProfileController::class,'editPicture']);
