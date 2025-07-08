<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitras = Mitra::where('status_verifikasi', '=', 'Terverifikasi')->latest()->paginate(10);
        return view('admin.mitra.index', compact('mitras'));
    }

    public function pengajuanMitra()
    {
        $mitras = Mitra::where('status_verifikasi', '=', 'Menunggu')->latest()->paginate(10);

        return view('admin.mitra.pengajuan', compact('mitras'));
    }

    public function verifikasiMitra(Request $request, string $id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->status_verifikasi = $request->input('status_verifikasi', 'Terverifikasi');
        $mitra->save();

        return redirect()->route('pengajuan.mitra')->with('success', 'Mitra berhasil diverifikasi.');
    }

    public function show(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('admin.mitra.show', compact('mitra'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
