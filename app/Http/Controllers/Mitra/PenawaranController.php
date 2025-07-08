<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\PenawaranSisaMakanan;

class PenawaranController extends Controller
{
    public function penawaranMitra()
    {
        $penawarans = PenawaranSisaMakanan::where('status', 'Tersedia')->orWhere('status', 'Sudah Dialokasikan')->latest()->paginate(10);

        foreach ($penawarans as $penawaran) {
            $penawaran->image = json_decode($penawaran->image, true);
        }

        return view('mitra.penawaran.index', compact('penawarans'));
    }
}
