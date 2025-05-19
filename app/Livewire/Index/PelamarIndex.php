<?php

namespace App\Livewire\Index;

use Livewire\Component;
use App\Models\Pelamar;
use App\Models\Dosen;
use App\Models\Karyawan;

class PelamarIndex extends Component
{
    public $pelamars;
    public $statuses = [];

    public function mount()
    {
        $this->loadPelamars();
    }

    public function loadPelamars()
    {
        $this->pelamars = Pelamar::whereNull('status')->get();
    }

    public function konfirmasi($id)
    {
        $status = $this->statuses[$id] ?? null;

        if (!$status) {
            session()->flash('message', 'Silakan pilih status terlebih dahulu.');
            return;
        }

        $pelamar = Pelamar::findOrFail($id);

        if ($status === 'terima') {
            // Cegah duplikasi data
            if ($pelamar->pilihan_lamaran === 'dosen' && !$pelamar->dosen) {
                Dosen::create([
                    'pelamar_id' => $pelamar->id,
                    'nama_dosen' => $pelamar->nama_pelamar,
                    'kode_dosen' => '',
                    'nik_ktp' => '',
                    'nip' => '',
                    'nidn' => '',
                    'umur' => $pelamar->umur,
                    'gelar_depan' => '',
                    'gelar_belakang' => '',
                    'email' => $pelamar->email,
                    'no_hp' => $pelamar->no_hp,
                    'no_npwp' => '',
                    'tempat_lahir' => $pelamar->tempat_lahir,
                    'tanggal_lahir' => $pelamar->tanggal_lahir,
                    'jenis_kelamin' => $pelamar->jenis_kelamin,
                    'alamat' => $pelamar->alamat,
                    'agama' => '',
                    'golongan_darah' => null,
                    'fakultas_id' => null,
                    'prodi_id' => null,
                    'bidang_ilmu_kompetensi' => $pelamar->bidang_ilmu_kompetensi,
                    'ikatan_kerja' => '',
                    'tanggal_mulai_kerja' => null,
                    'pendidikan_tertinggi' => $pelamar->pendidikan_tertinggi,
                    'jabatan_akademik_id' => null,
                    'golongan_id' => null,
                    'status_aktivasi' => '',
                    'foto_dosen' => '',
                    'dokumen_dosen' => '',
                ]);
            } elseif ($pelamar->pilihan_lamaran === 'karyawan' && !$pelamar->karyawan) {
                Karyawan::create([
                    'pelamar_id' => $pelamar->id,
                    'nama_karyawan' => $pelamar->nama_pelamar,
                    'jabatan' => '',
                ]);
            }
        }

        $pelamar->update(['status' => $status]);

        session()->flash('message', "Pelamar berhasil dikonfirmasi sebagai: $status.");

        $this->loadPelamars();
    }

    public function render()
    {
        return view('livewire.index.pelamar-index');
    }
}