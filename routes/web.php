<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
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



Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/test-auth', function () {
    return Auth::check() ? "Logged In" : "Not Logged In";
})->withoutMiddleware(['auth', 'role:admin']);


Route::resource('products', ProductController::class)->except(['show']);

Route::middleware(['auth', 'role:admin,web'])->group(function () {
    Route::resource('employees', EmployeeController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
});
Route::middleware(['auth', 'role:employee,web'])->group(function () {
    Route::resource('products', ProductController::class)->except(['show']);
});

Route::get('/product/{name}', [ProductController::class, 'show'])->name('product.show');


// require __DIR__.'/auth.php';
