<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

 /*------------------------ Admin Route ------------------------ */

 Route::prefix('admin')->group(function (){

 Route::get('/login', [AdminController::class, 'Index'])->name('login_form');

 Route::get('login/owner', [AdminController::class, 'Login'])->name('admin.login');
 
 Route::get('dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard');
 });


 /*------------------------ End Admin Route ------------------------ */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view ('frontend.master');
});
Route::get('/panduan', function () {
    return view ('frontend.panduan');
});
Route::get('/blog', function () {
    return view ('frontend.blog');
});

Route::get('/loginfoms', function () {
    return view ('backend.login');
});
Route::get('/registerfoms', function () {
    return view ('backend.register');
});
Route::get('/dashboardfoms', function () {
    return view ('backend.dashboard');
});
Route::get('/cek', function () {
    return view ('backend.table_user');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
