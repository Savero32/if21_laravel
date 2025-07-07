@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jadwal Perkuliahan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwals.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control" placeholder="Contoh: 2024/2025">
        </div>

        <div class="mb-3">
            <label>Semester</label>
            <select name="kode_smt" class="form-control">
                <option value="Gasal">Gasal</option>
                <option value="Genap">Genap</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" placeholder="Contoh: SI-4A">
        </div>

        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control">
                @foreach($mata_kuliah as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Dosen</label>
            <select name="dosen_id" class="form-control">
                @foreach($dosen as $d)
                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Sesi</label>
            <select name="sesi_id" class="form-control">
                @foreach($sesi as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('jadwals.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
