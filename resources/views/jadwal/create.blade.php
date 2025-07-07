@extends('main')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="container mt-4">
    <h2>Tambah Jadwal</h2>

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jam (Sesi)</label>
            <select name="sesi_id" class="form-control" required>
                @foreach ($sesis as $sesi)
                    <option value="{{ $sesi->id }}">{{ $sesi->jam_mulai }} - {{ $sesi->jam_selesai }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control" required>
                @foreach ($mataKuliahs as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Ruangan</label>
            <input type="text" name="ruangan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
