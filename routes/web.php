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

 /*------------------------ Route Auth ------------------------ */

 Route::prefix('admin')->group(function (){

 Route::get('/login', [AdminController::class, 'Index'])->name('login_form');

 Route::get('login/owner', [AdminController::class, 'Login'])->name('admin.login');
 
 Route::get('dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard');
 });


 /*------------------------ End Route Auth ------------------------ */

 /*------------------------ Route User ------------------------ */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view ('frontend.home');
});
Route::get('/panduan', function () {
    return view ('frontend.panduan');
});
Route::get('/paramedik', function () {
    return view ('frontend.paramedik');
});
Route::get('/blog', function () {
    return view ('frontend.blog');
});
Route::get('/konsultasi', function () {
    return view ('frontend.konsultasi');
});
/*------------------------ End Route User ------------------------ */

/*------------------------ Route Login & Register ------------------------ */
Route::get('/loginfoms', function () {
    return view ('login.login');
});
Route::get('/registerfoms', function () {
    return view ('login.register');
});
/*------------------------ End Route Login & Register ------------------------ */

/*------------------------ Route Admin ------------------------ */
Route::get('/dashboardadmin', function () {
    return view ('admin.dashboard');
});
Route::get('/tableuser', function () {
    return view ('admin.table_user');
});
Route::get('/tableadmin', function () {
    return view ('admin.table_admin');
});
Route::get('/tabledokter', function () {
    return view ('admin.table_dokter');
});
Route::get('/tablepanduan', function () {
    return view ('admin.table_panduan');
});

Route::get('/tableparamedik', function () {
    return view ('admin.table_paramedik');
});

Route::get('/tablekonsultasi', function () {
    return view ('admin.table_konsultasi');
});
/*------------------------ End Route Admin ------------------------ */
// Route::get('/dashboarddokter', function () {
//     return view ('dokter.dashboard');
// });
/*------------------------ Route Dokter ------------------------ */
Route::get('/dashboarddokter', function () {
    return view ('dokter.dashboard_dokter');
});
Route::get('/panduantable', function () {
    return view ('dokter.panduan_table');
});
Route::get('/paramediktable', function () {
    return view ('dokter.paramedik_table');
});
Route::get('/konsultasitable', function () {
    return view ('dokter.konsultasi_table');
});
/*------------------------ End Route Dokter ------------------------ */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
