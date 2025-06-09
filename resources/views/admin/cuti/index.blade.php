@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Permohonan Cuti</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Jenis Cuti</th>
                <th>Terhitung Mulai</th>
                <th>Terhitung Hingga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cutis as $cuti)
            <tr>
                <td>{{ $cuti->nama }}</td>
                <td>{{ ucfirst($cuti->tipe) }}</td>
                <td>{{ $cuti->jenis_cuti }}</td>
                <td>{{ $cuti->terhitung_mulai }}</td>
                <td>{{ $cuti->terhitung_hingga }}</td>
                <td>
                    @if($cuti->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($cuti->status == 'terima')
                        <span class="badge bg-success">Diterima</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
                <td>
                    @if($cuti->status == 'pending')
                    <form action="{{ route('admin.cuti.validate', $cuti->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="status" value="terima">
                        <button type="submit" class="btn btn-success btn-sm">Terima</button>
                    </form>
                    <form action="{{ route('admin.cuti.validate', $cuti->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="status" value="tolak">
                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                    </form>
                    @else
                        <em>-</em>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection