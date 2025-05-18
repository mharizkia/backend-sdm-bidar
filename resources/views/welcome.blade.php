@extends('layouts.app')

@section('content')

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='{{ route('pewawancara.create') }}'">pewawancara</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='/pelamar'">input pelamar</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='/wawancara/input'">input data wawancara</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='/wawancara'">wawancara</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='/psikologi/input'">input psikologi</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='/psikologi'">psikologi</button>

<button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4" onclick="window.location.href='/pelamar/index'">pelamar</button>

@endsection