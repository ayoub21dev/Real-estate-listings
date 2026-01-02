<?php

use App\Http\Controllers\PublicController;
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

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/properties', [PublicController::class, 'properties'])->name('properties.index');
Route::get('/properties/{slug}', [PublicController::class, 'showProperty'])->name('properties.show');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');

// AJAX Search Route
Route::post('/api/properties/search', [PublicController::class, 'searchProperties'])->name('properties.search');

// Auth Routes (placeholder - you can add authentication later)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
