@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar Mata Kuliah</h1>
    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-2">Tambah Mata Kuliah</a>
    <table class="table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mataKuliah as $mk)
            <tr>
                <td>{{ $mk->kode }}</td>
                <td>{{ $mk->nama }}</td>
                <td>{{ $mk->sks }}</td>
                <td>
                    <a href="{{ route('matakuliah.edit', $mk) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('matakuliah.destroy', $mk) }}" method="POST" style="display:inline-block">
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
