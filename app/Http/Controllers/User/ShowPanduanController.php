<?php

// ShowPanduanController.php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panduan;
use Dompdf\Dompdf;

class ShowPanduanController extends Controller
{
    public function showUserPanduans()
    {
        $panduans = Panduan::all();
        return view('frontend.panduan', compact('panduans'));
    }
    public function showPdf($filename)
    {
        // Path file PDF yang disimpan di folder public
        $path = public_path('panduans/' . $filename);

        // Pastikan file ada
        if (!file_exists($path)) {
            abort(404, 'File not found');
        }

        // Load file PDF menggunakan Dompdf
        $pdf = new Dompdf();
        $pdf->loadHtml(file_get_contents($path));
        $pdf->setPaper('A4', 'portrait');

        // Render PDF
        $pdf->render();

        // Output PDF
        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf');
        return $pdf->stream();
    }
}
