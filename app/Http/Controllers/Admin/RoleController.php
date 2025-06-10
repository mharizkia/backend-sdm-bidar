<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class RoleController extends Controller
{
    // Data dummy awal, akan disalin ke session untuk simulasi
    private static $initialRoleData = [
        ['id' => 1, 'nama_role' => 'Admin', 'deskripsi' => 'Administrator memiliki akses penuh ke sistem.'],
        ['id' => 2, 'nama_role' => 'Dosen', 'deskripsi' => 'Peran untuk dosen pengajar.'],
        ['id' => 3, 'nama_role' => 'Karyawan', 'deskripsi' => 'Peran untuk karyawan atau staff.'],
    ];

    private function getSessionData($key, $initialData) {
        if (!session()->has($key)) {
            session([$key => $initialData]);
        }
        return session($key);
    }
    private function setSessionData($key, $data) {
        session([$key => $data]);
    }

    private function getRoleData() {
        return collect($this->getSessionData('roles_dummy', self::$initialRoleData))->map(fn($item) => (object)$item);
    }
    private function findRoleById($id) {
        return $this->getRoleData()->firstWhere('id', (int)$id);
    }

    public function index(Request $request)
    {
        $roles = $this->getRoleData();
        // Simulasi pencarian sederhana
        if ($request->has('search')) {
            $searchTerm = strtolower($request->search);
            $roles = $roles->filter(function ($role) use ($searchTerm) {
                return str_contains(strtolower($role->nama_role), $searchTerm) ||
                       str_contains(strtolower($role->deskripsi), $searchTerm);
            });
        }
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
  
        $currentData = $this->getSessionData('roles_dummy', self::$initialRoleData);
        $newId = count($currentData) > 0 ? max(array_column($currentData, 'id')) + 1 : 1;

        $newRole = [
            'id' => $newId,
            'nama_role' => $request->input('nama_role'),
            'deskripsi' => $request->input('deskripsi'),
        ];
        $currentData[] = $newRole;
        $this->setSessionData('roles_dummy', $currentData);

        return redirect()->route('admin.roles.index')->with('success', 'Role berhasil ditambahkan (simulasi).');
    }

    public function edit($id)
    {
        $role = $this->findRoleById($id);
        if (!$role) {
            return redirect()->route('admin.roles.index')->with('error', 'Role tidak ditemukan.');
        }
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_role' => 'required|string|max:255|unique:roles_table_name,nama_role_column,'.$id,
        //     'deskripsi' => 'nullable|string',
        // ]);

        $currentData = $this->getSessionData('roles_dummy', self::$initialRoleData);
        $updated = false;
        foreach ($currentData as $key => $data) {
            if ($data['id'] == $id) {
                $currentData[$key]['nama_role'] = $request->input('nama_role', $data['nama_role']);
                $currentData[$key]['deskripsi'] = $request->input('deskripsi', $data['deskripsi']);
                $updated = true;
                break;
            }
        }
        if ($updated) {
            $this->setSessionData('roles_dummy', $currentData);
            return redirect()->route('admin.roles.index')->with('success', 'Role berhasil diupdate (simulasi).');
        }
        return redirect()->route('admin.roles.index')->with('error', 'Gagal mengupdate role atau role tidak ditemukan.');
    }

    public function destroy($id)
    {
        $currentData = $this->getSessionData('roles_dummy', self::$initialRoleData);
        $originalCount = count($currentData);
        $filteredData = array_filter($currentData, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        if (count($filteredData) < $originalCount) {
            $this->setSessionData('roles_dummy', array_values($filteredData));
            return redirect()->route('admin.roles.index')->with('success', 'Role berhasil dihapus (simulasi).');
        }
        return redirect()->route('admin.roles.index')->with('error', 'Gagal menghapus role atau role tidak ditemukan.');
    }
}