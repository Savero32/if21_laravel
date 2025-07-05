@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar Jadwal Perkuliahan</h1>
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-2">Tambah Jadwal</a>
    <table class="table">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Sesi</th>
                <th>Ruang</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $item)
            <tr>
                <td>{{ $item->mataKuliah->nama ?? '-' }}</td>
                <td>{{ $item->sesi->nama ?? '-' }}</td>
                <td>{{ $item->ruang }}</td>
                <td>{{ $item->hari }}</td>
                <td>{{ $item->jam_mulai }}</td>
                <td>{{ $item->jam_selesai }}</td>
                <td>
                    <a href="{{ route('jadwal.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('jadwal.destroy', $item) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
