<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\Penyaluran;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $mitraId = Mitra::where('email', auth()->user()->email)->first()->id;
        $penyalurans = Penyaluran::where('mitra_id', $mitraId)->get();
        foreach ($penyalurans as $penyaluran) {
            $penyaluran->image = json_decode($penyaluran->image, true);
        }
        return view('mitra.feedback.index', compact('penyalurans'));
    }

    public function create($id)
    {
        $penyaluran = Penyaluran::findOrFail($id);
        $mitraId = Mitra::where('email', auth()->user()->email)->first()->id;

        if ($penyaluran->feedback()->where('mitra_id', $mitraId)->exists()) {
            return redirect()->route('mitra.feedback.index')->with('error', 'Anda sudah memberikan feedback untuk penyaluran ini.');
        }

        return view('mitra.feedback.create', compact('penyaluran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyaluran_id' => 'required|exists:penyalurans,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:500',
        ]);

        $penyaluran = Penyaluran::findOrFail($request->penyaluran_id);
        $penyaluran->feedback()->create([
            'mitra_id' => Mitra::where('email', auth()->user()->email)->first()->id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('mitra.feedback.index')->with('success', 'Feedback berhasil diberikan.');
    }
}
