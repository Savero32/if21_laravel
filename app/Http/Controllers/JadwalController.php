<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Sesi;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index() {
        $jadwal = Jadwal::with(['mataKuliah', 'sesi'])->get();
        return view('jadwal.index', compact('jadwal'));
    }
    public function create() {
        $mataKuliah = MataKuliah::all();
        $sesi = Sesi::all();
        return view('jadwal.create', compact('mataKuliah', 'sesi'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_akademik' => 'required|string|max:20',
            'kode_smt' => 'required|in:Gasal,Genap',
            'kelas' => 'required|string|max:10',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => 'required|exists:users,id',
            'sesi_id' => 'required|exists:sesis,id',
        ]);

        Jadwal::create($validated);

        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $mata_kuliah = MataKuliah::all();
        $dosen = User::where('role', 'dosen')->get();
        $sesi = Sesi::all();

        return view('jadwals.edit', compact('jadwal', 'mata_kuliah', 'dosen', 'sesi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tahun_akademik' => 'required|string|max:20',
            'kode_smt' => 'required|in:Gasal,Genap',
            'kelas' => 'required|string|max:10',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => 'required|exists:users,id',
            'sesi_id' => 'required|exists:sesis,id',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil diperbarui.');
    }
    public function destroy(Jadwal $jadwal) {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
