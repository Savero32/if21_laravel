@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Mata Kuliah</h1>
    <form action="{{ route('matakuliah.update', $matakuliah) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $matakuliah->kode }}" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $matakuliah->nama }}" required>
        </div>
        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" value="{{ $matakuliah->sks }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
