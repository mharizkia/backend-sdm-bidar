@extends('layouts.admin')

@section('title', 'Profil Admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-text-dark">Profil Admin</h1>
</div>
@if(session('success'))
    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>
@endif
<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-6 md:p-8">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 items-start">
        <div class="md:col-span-1 flex flex-col items-center space-y-4">
            <img class="rounded-full h-36 w-36 object-cover border-4 border-gray-200 shadow-sm"
                 src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('images/pp.png') }}"
                 alt="Foto Profil {{ $user->name }}">
            <input type="file" name="profile_photo" id="profile_photo" accept="image/*"
                   class="block w-full max-w-xs mx-auto text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <p class="mt-1 text-xs text-gray-500 text-center">File Png, Jpg, Max. 2MB</p>
        </div>
        <div class="md:col-span-2 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-500">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
        </div>
    </div>
    <div class="mt-6 flex justify-end">
        <button type="submit" class="bg-[#1D3F8E] hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-md shadow-sm ">
            Simpan Perubahan
        </button>
    </div>
</form>
@endsection