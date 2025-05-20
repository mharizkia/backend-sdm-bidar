@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Data Dosen</h1>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('dosen.create') }}'">Tambah Dosen</button>
        <livewire:form.form-dosen />
    </div>
@endsection