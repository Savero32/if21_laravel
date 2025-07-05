<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index() {
        $mataKuliah = MataKuliah::all();
        return view('matakuliah.index', compact('mataKuliah'));
    }
    public function create() {
        return view('matakuliah.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'kode' => 'required|unique:mata_kuliah',
            'nama' => 'required',
            'sks' => 'required|integer',
        ]);
        MataKuliah::create($data);
        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan');
    }
    public function edit(MataKuliah $matakuliah) {
        return view('matakuliah.edit', compact('matakuliah'));
    }
    public function update(Request $request, MataKuliah $matakuliah) {
        $data = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'sks' => 'required|integer',
        ]);
        $matakuliah->update($data);
        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil diupdate');
    }
    public function destroy(MataKuliah $matakuliah) {
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus');
    }
}
