<!-- resources/views/pengaduan/index.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Pengaduan')

@section('content')
    <div class="container">
        <h2>Daftar Pengaduan</h2>
        
        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Tabel Daftar Pengaduan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pelapor</th>
                    <th>Jenis Kelamin</th>
                    <th>Judul Pengaduan</th>
                    <th>Kategori Pengaduan</th>
                    <th>Status Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Petugas Penanganan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengaduans as $pengaduan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengaduan->nama_pelapor }}</td>
                        <td>{{ $pengaduan->jenis_kelamin }}</td>
                        <td>{{ $pengaduan->judul_pengaduan }}</td>
                        <td>{{ $pengaduan->kategori_pengaduan }}</td>
                        <td>{{ $pengaduan->status_pengaduan }}</td>
                        <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                        <td>{{ $pengaduan->petugas_penanganan }}</td>
                        <td>
                            <!-- Tombol untuk melihat detail pengaduan -->
                            <a href="{{ route('pengaduan.show', $pengaduan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            
                            <!-- Tombol untuk mengedit pengaduan -->
                            <a href="{{ route('pengaduan.edit', $pengaduan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <!-- Tombol untuk menghapus pengaduan -->
                            <form action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol untuk menambah pengaduan baru -->
        <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mt-3">Tambah Pengaduan</a>
    </div>
@endsection
