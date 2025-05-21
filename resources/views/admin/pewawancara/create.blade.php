@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Tambah Pewawancara</h1>

                    <form action="{{ route('pewawancara.store') }}" method="POST" enctype="multipart/form-data">
                        {{-- CSRF Token --}}
                        @csrf
                        <div class="mb-4">
                            <label for="jabatan_pewawancara" class="block text-gray-700 text-sm font-bold mb-2">jabatan:</label>
                            <input type="text" name="jabatan_pewawancara" id="jabatan_pewawancara" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="dokumen_pewawancara" class="block text-gray-700 text-sm font-bold mb-2">Dokumen_pewawancara:</label>
                            <input type="file" name="dokumen_pewawancara" id="dokumen_pewawancara" accept="application/pdf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection