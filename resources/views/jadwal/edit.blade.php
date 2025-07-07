@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Jadwal Perkuliahan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control" value="{{ $jadwal->tahun_akademik }}">
        </div>

        <div class="mb-3">
            <label>Semester</label>
            <select name="kode_smt" class="form-control">
                <option value="Gasal" {{ $jadwal->kode_smt == 'Gasal' ? 'selected' : '' }}>Gasal</option>
                <option value="Genap" {{ $jadwal->kode_smt == 'Genap' ? 'selected' : '' }}>Genap</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ $jadwal->kelas }}">
        </div>

        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control">
                @foreach($mata_kuliah as $mk)
                    <option value="{{ $mk->id }}" {{ $jadwal->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                        {{ $mk->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Dosen</label>
            <select name="dosen_id" class="form-control">
                @foreach($dosen as $d)
                    <option value="{{ $d->id }}" {{ $jadwal->dosen_id == $d->id ? 'selected' : '' }}>
                        {{ $d->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Sesi</label>
            <select name="sesi_id" class="form-control">
                @foreach($sesi as $s)
                    <option value="{{ $s->id }}" {{ $jadwal->sesi_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('jadwals.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
