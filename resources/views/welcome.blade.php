@extends('layouts.app')

@section('content')

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('pewawancara.create') }}'">pewawancara</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('pelamar.create')}}'">input pelamar</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('wawancara.create')}}'">input data wawancara</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('wawancara.index')}}'">wawancara</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('psikologi.create')}}'">input psikologi</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('psikologi.index')}}'">psikologi</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('pelamar.index')}}'">pelamar</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('dosen.create')}}'">input dosen</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('dosen.index')}}'">dosen</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('karyawan.index')}}'">karyawan</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('karyawan.create')}}'">input karyawan</button>

<livewire:index.dosen-index />
@endsection