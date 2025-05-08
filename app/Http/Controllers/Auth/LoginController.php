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

        $kode = $request->kode;
        $password = $request->password;

        // Admin
        $user = User::where('kode', $kode)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        }

        // Dosen
        $dosen = Dosen::where('kode', $kode)->first();
        if ($dosen && Hash::check($password, $dosen->password)) {
            $user = User::firstOrCreate(['kode' => $dosen->kode], [
                'name' => $dosen->nama,
                'email' => $dosen->kode . '@dosen.fake',
                'password' => bcrypt($password),
            ]);
            $user->assignRole('dosen');
            Auth::login($user);
            return redirect('/dashboard');
        }

        // Karyawan
        $karyawan = Karyawan::where('kode', $kode)->first();
        if ($karyawan && Hash::check($password, $karyawan->password)) {
            $user = User::firstOrCreate(['kode' => $karyawan->kode], [
                'name' => $karyawan->nama,
                'email' => $karyawan->kode . '@karyawan.fake',
                'password' => bcrypt($password),
            ]);
            $user->assignRole('karyawan');
            Auth::login($user);
            return redirect('/dashboard');
        }

        return back()->withErrors(['kode' => 'Kode atau password salah']);
    }
}
