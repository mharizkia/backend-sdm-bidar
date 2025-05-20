<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Karyawan;

class LoginController extends Controller
{
    public function showloginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('kode', $request->kode)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['kode' => 'Kode atau password salah.']);
        }

        $statusAktif = optional($user->dosen)->status_aktivasi === 'aktif' ||
                    optional($user->karyawan)->status_aktivasi === 'aktif';

        if (!$statusAktif && !$user->hasRole('admin')) {
            return back()->withErrors(['kode' => 'Akun belum diaktifkan.']);
        }

        Auth::login($user);

        // Redirect berdasarkan role
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('dosen')) {
            return redirect()->route('pegawai.dashboard');
        } elseif ($user->hasRole('karyawan')) {
            return redirect()->route('pegawai.dashboard');
        }

        return redirect('/');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
