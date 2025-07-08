<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\PenawaranSisaMakanan;
use App\Models\Penyaluran;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalMitra = Mitra::count();
        $totalProduk = Produk::count();
        $totalPenyaluran = Penyaluran::count();
        // $totalFeedback = Feedback::count();
        $totalPenawaran = PenawaranSisaMakanan::count();
        $totalPenyaluranSelesai = Penyaluran::where('status_pengiriman', 'Selesai')->count();

        return view(
            'admin.dashboard',
            compact(
                'totalMitra',
                'totalProduk',
                'totalPenyaluran',
                // 'totalFeedback',
                'totalPenawaran',
                'totalPenyaluranSelesai',
            ),
        );
    }

    /**
     * Display a listing of the resource for mitra.
     */
    public function mitraIndex()
    {
        return view('mitra.dashboard');
    }
}
