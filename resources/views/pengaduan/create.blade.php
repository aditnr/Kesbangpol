<!-- resources/views/home/pengaduan.blade.php -->
@extends('layouts.template')

@section('title', 'Form Pengaduan')

@section('content')
<section id="pengaduan" class="portfolio section">
    <div class="container">
        <h2>Form Pengaduan</h2>
        
        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Pengaduan -->
        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf

            <!-- Nama Pelapor -->
            <div class="form-group">
                <label for="nama_pelapor">Nama Pelapor</label>
                <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" required>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <!-- Judul Pengaduan -->
            <div class="form-group">
                <label for="judul_pengaduan">Judul Pengaduan</label>
                <input type="text" class="form-control" id="judul_pengaduan" name="judul_pengaduan" required>
            </div>

            <!-- Kategori Pengaduan -->
            <div class="form-group">
                <label for="kategori_pengaduan">Kategori Pengaduan</label>
                <input type="text" class="form-control" id="kategori_pengaduan" name="kategori_pengaduan" required>
            </div>

            <!-- Deskripsi Pengaduan -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi Pengaduan</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
        </form>
    </div>
    </section>
@endsection
