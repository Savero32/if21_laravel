@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Jadwal</h1>
    <form action="{{ route('jadwal.update', $jadwal) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control" required>
                @foreach($mataKuliah as $mk)
                    <option value="{{ $mk->id }}" @if($mk->id == $jadwal->mata_kuliah_id) selected @endif>{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Sesi</label>
            <select name="sesi_id" class="form-control" required>
                @foreach($sesi as $s)
                    <option value="{{ $s->id }}" @if($s->id == $jadwal->sesi_id) selected @endif>{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Ruang</label>
            <input type="text" name="ruang" class="form-control" value="{{ $jadwal->ruang }}" required>
        </div>
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" value="{{ $jadwal->hari }}" required>
        </div>
        <div class="mb-3">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}" required>
        </div>
        <div class="mb-3">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
