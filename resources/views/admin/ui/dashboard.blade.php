@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Pencarian Dosen & Karyawan</h2>

    <input type="text" id="search" placeholder="Cari nama / kode / email..."
        class="w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 mb-6">

    <div id="result">
        @include('admin.ui.result', ['dosens' => $dosens, 'karyawans' => $karyawans])
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#search').on('input', function () {
            let keyword = $(this).val();

            if (keyword.length > 0) {
                $.ajax({
                    url: '{{ route("pegawai.search") }}',
                    method: 'GET',
                    data: { search: keyword },
                    success: function (res) {
                        $('#result').html(res.html);
                    }
                });
            } else {
                location.reload();
            }
        });
    });
</script>

@endsection