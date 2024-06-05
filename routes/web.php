<?php

use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PanduanController;
use App\Http\Controllers\Dokter\PanduanController as DokterPanduanController;
use Illuminate\Support\Facades\Auth;




/*------------------------ Route User ------------------------ */

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/home', function () {
    return view('frontend.home');
});
Route::get('/panduan', function () {
    return view('frontend.panduan');
});
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

    Route::prefix('/paramedik')->name('paramedik.')->group(function () {
        Route::get('/', function () {
            return view('dokter.paramedik.index');
        })->name('list');
    });
    Route::prefix('/konsultasi')->name('konsultasi.')->group(function () {
        Route::get('/', function () {
            return view('dokter.konsultasi.index');
        })->name('list');
    });
});

// ADMIN //
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



    Route::prefix('/paramedik')->name('paramedik.')->group(function () {
        Route::get('/', function () {
            return view('admin.paramedik.index');
        })->name('list');
    });
    Route::prefix('/konsultasi')->name('konsultasi.')->group(function () {
        Route::get('/', function () {
            return view('admin.konsultasi.index');
        })->name('list');
    });
});

// /*------------------------ Route Admin ------------------------ */
// Route::get('/dashboardadmin', function () {
//     return view ('admin.dashboard');
// });
// Route::get('/tableuser', function () {
//     return view ('admin.table_user');
// });
// Route::get('/tableadmin', function () {
//     return view ('admin.table_admin');
// });
// Route::get('/tabledokter', function () {
//     return view ('admin.table_dokter');
// });
// Route::get('/tablepanduan', function () {
//     return view ('admin.table_panduan');
// });

// Route::get('/tableparamedik', function () {
//     return view ('admin.table_paramedik');
// });

// Route::get('/tablekonsultasi', function () {
//     return view ('admin.table_konsultasi');
// });
// /*------------------------ End Route Admin ------------------------ */
// // Route::get('/dashboarddokter', function () {
// //     return view ('dokter.dashboard');
// // });
// /*------------------------ Route Dokter ------------------------ */
// Route::get('/dashboarddokter', function () {
//     return view ('dokter.dashboard_dokter');
// });
// Route::get('/panduantable', function () {
//     return view ('dokter.panduan_table');
// });
// Route::get('/paramediktable', function () {
//     return view ('dokter.paramedik_table');
// });
// Route::get('/konsultasitable', function () {
//     return view ('dokter.konsultasi_table');
// });
// /*------------------------ End Route Dokter ------------------------ */
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

require __DIR__ . '/auth.php';
