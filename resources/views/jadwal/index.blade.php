@extends('main')

@section('title', 'Manajemen Jadwal')

@section('content')
<div class="container mt-4">
    <h2>Manajemen Jadwal</h2>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Mata Kuliah</th>
                <th>Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ $jadwal->sesi->jam_mulai }} - {{ $jadwal->sesi->jam_selesai }}</td>
                    <td>{{ $jadwal->mataKuliah->nama }}</td>
                    <td>{{ $jadwal->ruangan }}</td>
                    <td>
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
