<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\DokterParamedik;
use Illuminate\Http\Request;

class ShowParamedikController extends Controller
{
    
    public function index()

    {
    
        $kecamatan = Kecamatan::all();
        $paramedik = DokterParamedik::with('domisiliId')->get();
// return response()->json(
//             [
//                 // 'kecamatan' => $kecamatan,
//                 'paramedik' => $paramedik,
//                     ]
//         );
        return view('frontend.paramedik', compact('kecamatan', 'paramedik'));
    }
}
