<?php

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

Route::get('/', function (\Illuminate\Http\Request $request) {
    return view('layouts.main', ['request' => $request]);
})->name('home');

Route::get('/login', function () {
    return view('LoginForm');
})->name('login');
Route::post('/auth', [\App\Http\Controllers\UserController::class, 'auth'])->name('auth');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/animals', function (\App\Models\Animal $animals) {
    return view('components.animals.animals', ['animals' => $animals->all()->sortBy('name')]);
})->name('animals');

Route::middleware('isUser')->get('/add-animal', function () {
    return view('components.animals.add');
})->name('add-animal');

Route::post('/add', [\App\Http\Controllers\AnimalController::class, 'add'])->name('add');
Route::get('/show/{id}', [\App\Http\Controllers\AnimalController::class, 'show'])->name('show');
Route::middleware('isUser')->get('/delete/{id}', [\App\Http\Controllers\AnimalController::class, 'destroy'])->name(
    'destroy'
);
