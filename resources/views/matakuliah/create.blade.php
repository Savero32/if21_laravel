@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tambah Mata Kuliah</h1>
    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
