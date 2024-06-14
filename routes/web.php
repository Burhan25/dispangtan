<?php

use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PanduanController;
use App\Http\Controllers\Dokter\PanduanController as DokterPanduanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\ShowPanduanController;
use App\Http\Controllers\Admin\ParamedikController;
use App\Http\Controllers\Dokter\ParamedikController as DokterParamedikController;

/*------------------------ Route User ------------------------ */

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/home', function () {
    return view('frontend.home');
});
Route::get('/client-panduan', [ShowPanduanController::class, 'showUserPanduans'])->name('user.panduan');

Route::get('/paramedik', function () {
    return view('frontend.paramedik');
});
Route::get('/blog', function () {
    return view('frontend.blog');
});
Route::get('/konsultasi', function () {
    return view('frontend.konsultasi');
});
/*------------------------ End Route User ------------------------ */

/*------------------------ Route Login & Register ------------------------ */
Route::get('/loginfoms', function () {
    return view('login.login');
});
Route::get('/registerfoms', function () {
    return view('login.register');
});
/*------------------------ End Route Login & Register ------------------------ */

/*------------------------ Route Dokter ------------------------ */
Route::prefix('/dokter')->name('dokter.')->middleware('dokter')->group(function () {
    Route::get('/', function () { 
        return redirect()->route('dokter.panduan.list');
    })->name('dashboard');
    
    Route::prefix('/panduan')->name('panduan.')->group(function () {
        Route::get('/', [DokterPanduanController::class, 'index'])->name('list');
        Route::get('/create', [DokterPanduanController::class, 'create'])->name('create');
        Route::post('/store', [DokterPanduanController::class, 'store'])->name('store');
        Route::get('/{panduan}/edit', [DokterPanduanController::class, 'edit'])->name('edit');
        Route::post('/{panduan}/update', [DokterPanduanController::class, 'update'])->name('update');
        Route::delete('/{panduan}/delete', [DokterPanduanController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/kecamatan-paramedik')->name('paramedik.')->group(function () {
        Route::get('/', [DokterParamedikController::class, 'index'])->name('list');
        Route::get('/create', [DokterParamedikController::class, 'create'])->name('create');
        Route::post('/store', [DokterParamedikController::class, 'store'])->name('store');
        Route::get('/{lokasi}/edit', [DokterParamedikController::class, 'edit'])->name('edit');
        Route::post('/{lokasi}/update', [DokterParamedikController::class, 'update'])->name('update');
        Route::delete('/{lokasi}/delete', [DokterParamedikController::class, 'destroy'])->name('delete'); 
    });

    Route::prefix('/konsultasi')->name('konsultasi.')->group(function () {
        Route::get('/', function () {
            return view('dokter.konsultasi.index');
        })->name('list');
    });
});
/*------------------------ End Route Dokter ------------------------ */

/*------------------------ Route Admin ------------------------ */
Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dokter.list');
    })->name('dashboard');

    Route::prefix('/dokter')->name('dokter.')->group(function () {
        Route::get('/', [DokterController::class, 'index'])->name('list');
    });

    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', function () {
            return view('admin.user.index');
        })->name('list');
    });

    Route::prefix('/panduan')->name('panduan.')->group(function () {
        Route::get('/', [PanduanController::class, 'index'])->name('list');
        Route::get('/create', [PanduanController::class, 'create'])->name('create');
        Route::post('/store', [PanduanController::class, 'store'])->name('store');
        Route::get('/{panduan}/edit', [PanduanController::class, 'edit'])->name('edit');
        Route::post('/{panduan}/update', [PanduanController::class, 'update'])->name('update');
        Route::delete('/{panduan}/delete', [PanduanController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/kecamatan-paramedik')->name('paramedik.')->group(function () {
       Route::get('/', [ParamedikController::class, 'index'])->name('list');
       Route::get('/create', [ParamedikController::class, 'create'])->name('create');
       Route::post('/store', [ParamedikController::class, 'store'])->name('store');
       Route::get('/show-lokasi', [ParamedikController::class, 'show-loasi'])->name('show');
       Route::get('/edit/{id}', [ParamedikController::class, 'edit'])->name('edit');
       Route::post('/update/{id}', [ParamedikController::class, 'update'])->name('update');
       Route::delete('/delete{id}', [ParamedikController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/dokter-paramedik')->name('dokter-paramedik.')->group(function () {
        // Route::get('/', [ParamedikController::class, 'indexDokterParamedik'])->name('list');
        Route::get('/create', [ParamedikController::class, 'create'])->name('create');
        Route::post('/store', [ParamedikController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ParamedikController::class, 'edit'])->name('edit');
        Route::post('/update{id}', [ParamedikController::class, 'update'])->name('update');
        Route::delete('/{lokasi}/delete', [ParamedikController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/konsultasi')->name('konsultasi.')->group(function () {
        Route::get('/', function () {
            return view('admin.konsultasi.index');
        })->name('list');
    });
});
/*------------------------ End Route Admin ------------------------ */

/*------------------------ Route Profile ------------------------ */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/*------------------------ End Route Profile ------------------------ */

require __DIR__ . '/auth.php';

/*------------------------ Route Authenticated Dashboard ------------------------ */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/*------------------------ End Route Authenticated Dashboard ------------------------ */
