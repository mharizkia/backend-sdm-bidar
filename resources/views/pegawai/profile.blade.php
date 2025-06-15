@extends('layouts.pegawai')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded shadow p-6 mt-8">
    <h2 class="text-2xl font-bold mb-4">Edit Profil</h2>
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2" required>
            @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2" required>
            @error('email') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Foto Profil</label>
            <input type="file" name="profile_photo" class="w-full border rounded px-3 py-2">
            @if($user->profile_photo)
                <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Foto Profil" class="h-20 w-20 rounded-full mt-2 object-cover">
            @endif
            @error('profile_photo') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', isset($profile) ? $profile->alamat : '') }}" class="w-full border rounded px-3 py-2">
            @error('alamat') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection