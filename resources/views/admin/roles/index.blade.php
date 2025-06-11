@extends('layouts.admin')

@section('title', 'Manajemen Role Pengguna')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-text-dark">Manajemen Role Pengguna</h1>
        <p class="text-sm text-text-muted">Kelola peran pengguna dalam sistem.</p>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-[#1D3F8E] text-white p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">Daftar Role</h2>
            <a href="{{ route('roles.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-3 rounded-md shadow-sm inline-flex items-center text-xs">
                <i class="fas fa-plus mr-2"></i> Tambah Role Baru
            </a>
        </div>

        <div class="p-4 border-b border-gray-200">
            <form action="{{ route('roles.index') }}" method="GET">
                <input type="text" name="search" placeholder="Cari berdasarkan nama role..." 
                       value="{{ request('search') }}"
                       class="form-input w-full sm:w-1/3 rounded-md border-gray-300 shadow-sm text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 py-2">
                {{-- <button type="submit" class="ml-2 py-2 px-4 bg-blue-500 text-white rounded-md text-sm">Cari</button> --}}
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Nama Role</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-800 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                    @forelse ($roles ?? [] as $role)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $role->nama_role }}</td>
                        <td class="px-6 py-4 ">{{ $role->deskripsi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="inline-flex items-center space-x-2">
                                <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit Role">
                                    <i class="fas fa-edit text-lg"></i>
                                </a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus role ini? Role yang sudah digunakan mungkin tidak bisa dihapus.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus Role">
                                        <i class="fas fa-trash-alt text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data role ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4">
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Script untuk filter atau interaksi lainnya bisa ditambahkan di sini
</script>
@endpush