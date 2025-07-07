@extends('main')

@section('title', 'Edit Jadwal')

@section('content')
<div class="container mt-4">
    <h2>Edit Jadwal</h2>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" value="{{ $jadwal->hari }}" required>
        </div>
        <div class="mb-3">
            <label>Jam (Sesi)</label>
            <select name="sesi_id" class="form-control" required>
                @foreach ($sesis as $sesi)
                    <option value="{{ $sesi->id }}" @if($jadwal->sesi_id == $sesi->id) selected @endif>
                        {{ $sesi->jam_mulai }} - {{ $sesi->jam_selesai }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control" required>
                @foreach ($mataKuliahs as $mk)
                    <option value="{{ $mk->id }}" @if($jadwal->mata_kuliah_id == $mk->id) selected @endif>
                        {{ $mk->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Ruangan</label>
            <input type="text" name="ruangan" class="form-control" value="{{ $jadwal->ruangan }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
