<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User as EloquentUser;
use App\Models\Dosen;
use App\Models\Karyawan;

class ProfileController extends Controller
{
   public function edit()
{
    $user = Auth::user();
    if (!$user instanceof \App\Models\User) {
        $user = EloquentUser::find($user->id);
    }
    $profile = null;

    if ($user->role === 'dosen') {
        $profile = Dosen::where('user_id', $user->id)->first();
    } elseif ($user->role === 'karyawan') {
        $profile = Karyawan::where('user_id', $user->id)->first();
    }

    // Pastikan $profile selalu objek
    if (!$profile) {
        $profile = (object)['alamat' => ''];
    }

    // Jika ada old('alamat'), timpa $profile->alamat
    if (old('alamat') !== null) {
        $profile->alamat = old('alamat');
    }

    return view('pegawai.profile', compact('user', 'profile'));
}

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = null;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'alamat' => 'nullable|string|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        if (!$user instanceof \App\Models\User) {
            $user = EloquentUser::find($user->id);
        }
        $user->save();

        // Update alamat di tabel dosen/karyawan
        if ($user->role === 'dosen') {
            $profile = Dosen::where('user_id', $user->id)->first();
        } elseif ($user->role === 'karyawan') {
            $profile = Karyawan::where('user_id', $user->id)->first();
        }
        if ($profile) {
            $profile->alamat = $request->alamat;
            $profile->save();
        }

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}