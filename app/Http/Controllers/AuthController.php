<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function regist_mitra_form()
    {
        return view('auth.regist_mitra');
    }

    public function login_form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Selamat datang di dashboard admin.');
            } elseif (auth()->user()->role === 'mitra') {
                return redirect()->route('mitra.dashboard')->with('success', 'Selamat datang di dashboard mitra.');
            }
        } else {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
                'password' => 'Email atau password salah.',
            ]);
        }
    }

    public function regist_mitra(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'penanggung_jawab' => 'required|string|max:255',
            'email' => 'required|email|unique:mitras,email',
            'nomor_telepon' => 'required|string|max:15',
            'alamat_lengkap' => 'required|string|max:255',
            'dokumen_verifikasi' => 'required|array',
            'dokumen_verifikasi.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string|max:500',
            'terms' => 'accepted',
        ]);

        $mitra = new Mitra();
        $mitra->nama_mitra = $request->first_name . ' ' . $request->last_name;
        $mitra->penanggung_jawab = $request->penanggung_jawab;
        $mitra->email = $request->email;
        $mitra->nomor_telepon = $request->nomor_telepon;
        $mitra->alamat_lengkap = $request->alamat_lengkap;
        $mitra->status_verifikasi = 'Menunggu';
        $mitra->dokumen_verifikasi = array_map(
            fn($file) => $file->store('dokumen_verifikasi', 'public'),
            $request->file('dokumen_verifikasi')
        );
        $mitra->keterangan = $request->keterangan;
        $mitra->save();

        $user = User::create([
            'name' => $mitra->nama_mitra,
            'email' => $mitra->email,
            'password' => bcrypt('default_password'),
            'role' => 'mitra',
        ]);

        auth()->login($user);

        return redirect()->route('mitra.dashboard')->with('success', 'Registrasi mitra berhasil. Silakan tunggu verifikasi dari admin.');
    }

    public function account()
    {
        $user = auth()->user();

        if ($user->role === 'mitra') {
            $mitra = Mitra::where('email', $user->email)->first();
            return view('auth.account', compact('user', 'mitra'));
        }

        return view('auth.account');
    }

    public function updateAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'nomor_telepon' => 'required|string|max:15',
            'alamat_lengkap' => 'required|string|max:255',
        ]);

        return redirect()->route('account.profile')->with('success', 'Profil Anda telah diperbarui.');
    }

    public function changePassword()
    {
        return view('auth.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('account.profile')->with('success', 'Kata sandi Anda telah diperbarui.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Anda telah berhasil logout.');
    }
}