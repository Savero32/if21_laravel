<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Sesi;
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
    public function store(Request $request) {
        $data = $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'sesi_id' => 'required|exists:sesis,id',
            'ruang' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        Jadwal::create($data);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }
    public function edit(Jadwal $jadwal) {
        $mataKuliah = MataKuliah::all();
        $sesi = Sesi::all();
        return view('jadwal.edit', compact('jadwal', 'mataKuliah', 'sesi'));
    }
    public function update(Request $request, Jadwal $jadwal) {
        $data = $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'sesi_id' => 'required|exists:sesis,id',
            'ruang' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        $jadwal->update($data);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate');
    }
    public function destroy(Jadwal $jadwal) {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
