@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tambah Jadwal</h1>
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control" required>
                @foreach($mataKuliah as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Sesi</label>
            <select name="sesi_id" class="form-control" required>
                @foreach($sesi as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Ruang</label>
            <input type="text" name="ruang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
