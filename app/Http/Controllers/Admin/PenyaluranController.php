<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\PenawaranSisaMakanan;
use App\Models\Penyaluran;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyalurans = Penyaluran::latest()->paginate(10);
        return view('admin.penyaluran.index', compact('penyalurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mitras = Mitra::all();
        $penawarans = PenawaranSisaMakanan::where('status', 'Tersedia')->get();
        return view('admin.penyaluran.create', compact('mitras', 'penawarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mitra_id' => 'required|exists:mitras,id',
            'penawaran_id' => 'required|exists:penawaran_sisa_makanan,id',
            'tanggal_penyaluran' => 'required|date',
            'status_pengiriman' => 'required|string|in:Proses,Selesai,Dibatalkan',
            'catatan' => 'nullable|string|max:255',
        ]);

        Penyaluran::create([
            'mitra_id' => $request->mitra_id,
            'penawaran_id' => $request->penawaran_id,
            'kuantitas_diterima' => PenawaranSisaMakanan::find($request->penawaran_id)->kuantitas,
            'tanggal_penyaluran' => $request->tanggal_penyaluran,
            'status_pengiriman' => $request->status_pengiriman,
            'catatan' => $request->catatan,
        ]);

        $penawaran = PenawaranSisaMakanan::find($request->penawaran_id);
        $penawaran->status = 'Sudah Dialokasikan';
        $penawaran->save();

        return redirect()->route('penyaluran.index')->with('success', 'Penyaluran berhasil dibuat.');
    }

    public function show($id)
    {
        $penyaluran = Penyaluran::findOrFail($id);
        $penyaluran->image = json_decode($penyaluran->image, true);
        return view('admin.penyaluran.show', compact('penyaluran'));
    }

    public function penawaran()
    {
        $penawarans = PenawaranSisaMakanan::all();
        return view('admin.penawaran.index', compact('penawarans'));
    }

    public function buatPenawaran()
    {
        $produks = Produk::all();
        return view('admin.penawaran.create', compact('produks'));
    }

    public function storePenawaran(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'kuantitas' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'tanggal_penawaran' => 'required|date',
            'waktu_kadaluarsa' => 'required|date|after_or_equal:tanggal_penawaran',
        ]);

        PenawaranSisaMakanan::create([
            'produk_id' => $request->produk_id,
            'kuantitas' => $request->kuantitas,
            'satuan' => $request->satuan,
            'tanggal_penawaran' => $request->tanggal_penawaran,
            'waktu_kadaluarsa' => $request->waktu_kadaluarsa,
        ]);

        return redirect()->route('penyaluran.penawaran')->with('success', 'Penawaran berhasil dibuat.');
    }

    /**
     * Upload dokumentasi for the specified penyaluran.
     */
    public function uploadDokumentasi(Request $request, string $id)
    {
        $request->validate([
            'dokumentasi' => 'required|array',
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $penyaluran = Penyaluran::findOrFail($id);
        $dokumentasiPaths = [];

        foreach ($request->file('dokumentasi') as $file) {
            $path = $file->store('dokumentasi', 'public');
            $dokumentasiPaths[] = $path;
        }

        $penyaluran->image = $dokumentasiPaths;
        if (count($penyaluran->image) >= 4) {
            return redirect()->route('penyaluran.show', $id)->with('error', 'Anda sudah mencapai batas maksimal upload dokumentasi (3 foto).');
        } else if (count($penyaluran->image) >= 3) {
            $penyaluran->penawaranSisaMakanan->status = 'Sudah Dialokasikan';
            $penyaluran->penawaranSisaMakanan->save();
            $penyaluran->status_pengiriman = 'Selesai';
            $penyaluran->catatan = 'Dokumentasi telah diunggah.';
            $penyaluran->image = json_encode($penyaluran->image);
        } else {
            $penyaluran->image = json_encode($penyaluran->image);
            $penyaluran->status_pengiriman = 'Proses';
            $penyaluran->catatan = 'Dokumentasi belum lengkap.';
        }

        $penyaluran->save();

        return redirect()->route('penyaluran.show', $id)->with('success', 'Dokumentasi berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     */
    public function detailPenawaran(string $id)
    {
        $penawarans = PenawaranSisaMakanan::findOrFail($id);
        $penawarans->image = json_decode($penawarans->image, true);
        return view('admin.penawaran.show', compact('penawarans'));
    }

    /**
     * Remove the specified resource from storage.
     */ public function destroy(string $id)
    {
        //
    }
}
